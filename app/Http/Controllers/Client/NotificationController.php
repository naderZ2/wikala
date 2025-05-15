<?php

namespace App\Http\Controllers\Client;

use App\Models\{Notification,UserNotification};
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use ResponsesTrait;
    public function index(Request $request){
        $this->lang();

    $notifications = Notification::leftJoin('user_notifications', 'notifications.id', '=', 'user_notifications.notification_id')
        ->select(
            'notifications.id',
            'notifications.' . $this->name,
            'notifications.' . $this->description,
            'notifications.type',
            'notifications.updated_at',
        DB::raw('IF(user_notifications.is_seen = 1, true, false) as `read`') // Ensure it returns true/false
        )
        ->where('notifications.user_id',auth()->id())
        ->orWhereNull('notifications.user_id')
        ->orderByDesc('notifications.created_at')
        ->limit(50)
        ->get();

        return $this->success($notifications);
    }

    public function readNotification(Request $request){
        UserNotification::create(['notification_id'=>$request->id,'user_id'=>auth()->id(),'is_seen'=>1]);
        return $this->success();
    }

    public function delete(Request $request){
        $this->lang();
        $notification = Notification::where('id',$request->id)
        ->where('user_id',auth()->id())
        ->first();
        if(!$notification){
            return $this->error('not_found');
        }
        $notification->delete();
        return $this->success();
    }
    
}
