<?php

namespace App\Http\Controllers\Client;

use PgSql\Lob;
use App\Models\Chat;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Services\ChatService;
use App\Traits\ResponsesTrait;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Chat\StoreRequest;

class ChatController extends Controller
{

    use ResponsesTrait , FileUploadTrait;
    protected $chatService;

    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }


    public function index(Request $request)
    {
        $userId = auth()->id(); 
        $data['chats'] = $this->chatService->getUserMessages($userId);
        
        return $this->success($data);
    }
    
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['sender_id'] = auth()->id();


        
        if (in_array($data['message_type'], ['file', 'audio'])) {
            $uploadedPath = $this->uploadFile($request->file('message'), 'chats');
            $data['message'] = $uploadedPath;
        }
       

        $result =$this->chatService->sendMessage($data);

        event(new MessageSent($result));
        return $this->success($result,trans('lang.success_send'));

    }



    public function destroy($id)
    {
        $chat = Chat::findOrFail($id);

        if ($chat->sender_id !== auth()->id()) {
            return $this->failed(Null,trans('lang.not_found') );
        }

        $chat->delete();

        return $this->success(Null,trans('lang.deleted'));
        
    }


}
