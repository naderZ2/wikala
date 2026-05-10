<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Seller,Product,City,User,Notification,UserDailyEvent};
use App\Http\Requests\Admin\AddNotificationRequest;
use Carbon\Carbon;
use App\Services\OneSignalService;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    protected $oneSignalService;

    public function __construct(OneSignalService $oneSignalService)
    {
        $this->model ="App\Models\Notification";
        $this->User ="App\Models\User";
        $this->oneSignalService = $oneSignalService;
    }
    
    public function reminder(){
        $this->lang();
        $reminders=UserDailyEvent::join("daliy_events","daliy_events.id","daily_event_id")
        ->where("active",1)
        ->whereDate("daliy_events.date", Carbon::today())
        ->with("user")
        ->get();

        foreach($reminders as $reminder){
            if($reminder->user!=null){
                $notification = [
                    'title' => $reminder->name_en,
                    'message' => $reminder->description_en,
                    'title_ar' => $reminder->name_ar,
                    'message_ar' => $reminder->description_ar,
                    'data' => [
                        "user_id" => $reminder->user->id,
                        "name_ar" => $reminder->name_ar,
                        "name_en" => $reminder->name_en,
                        "type" => 2,
                        "description_ar" => $reminder->description_ar,
                        "description_en" => $reminder->description_en
                    ]
                ];

                Notification::create([
                    "user_id" => $reminder->user->id,
                    "name_ar" => $reminder->name_ar,
                    "name_en" => $reminder->name_en,
                    "type" => 2,
                    "description_ar" => $reminder->description_ar,
                    "description_en" => $reminder->description_en
                ]);

                try {
                    $this->oneSignalService->sendToUser($notification, $reminder->user->id);
                } catch (\Exception $e) {
                    Log::error('OneSignal reminder error: ' . $e->getMessage());
                }
            }
        }
    }

    public function index(){
        #TODO complete
        $this->lang();
        $notifications=Notification::with(['seller:id,name',"region:id,$this->name","product:id,$this->name"])
        ->get();
        return view('admin.notifications.index',compact('notifications'));
    }

    public function create(){
        $this->lang();
        $sellers=Seller::get(['id','name']);
        $products=Product::get(['id',$this->name]);
        $regions = City::whereNotNull('parent_id')->get(['id',$this->name]);
        return view('admin.notifications.add',compact('sellers','products','regions'));
    }

    public function store(AddNotificationRequest $request){
        $data = $request->validated();
        Notification::create($data);

        $notification = [
            'title' => $request->name_en,
            'title_ar' => $request->name_ar,
            'message' => $request->description_en,
            'message_ar' => $request->description_ar,
            'data' => [
                'type' => "1",
                'region_id' => $request->region_id,
                'product_id' => $request->product_id,
                'seller_id' => $request->seller_id,
            ]
        ];

        $recipientType = $request->recipient_type;

        try {
            if ($recipientType === 'all') {
                $this->oneSignalService->send($notification);
            } elseif ($recipientType === 'clients') {
                $this->oneSignalService->sendToClients($notification);
            } elseif ($recipientType === 'sellers') {
                $this->oneSignalService->sendToSellers($notification);
            } elseif ($recipientType === 'specific_seller' && $request->seller_id) {
                $this->oneSignalService->sendToSeller($notification, $request->seller_id);
            }
        } catch (\Exception $e) {
            Log::error('OneSignal notification error: ' . $e->getMessage());
        }

        return to_route('admin.notifications.index')->with('success', trans('lang.created'));
    }

    public function destroy(Request $request){
        Notification::destroy($request->id);
        return  to_route('admin.notifications.index')->with('success',trans('lang.deleted'));
    }
}
