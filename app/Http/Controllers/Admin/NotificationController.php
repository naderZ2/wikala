<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Seller,Product,City,User,Notification,UserDailyEvent};
use App\Http\Requests\Admin\AddNotificationRequest;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->model="App\Models\Notification";
        $this->User="App\Models\User";
    }
    
    public function reminder(){
        $this->lang();
        $reminders=UserDailyEvent::join("daliy_events","daliy_events.id","daily_event_id")
        ->where("active",1)
        ->whereDate("daliy_events.date", Carbon::today())
        ->with("user")
        ->get();
        
        foreach($reminders as $reminder){
            
            if($reminder->user!=null && $reminder->user->device_id !=null){
                $notification=
                [
                    'type' => "1",
                    'title' => $reminder->name_en,
                    'message' => $reminder->description_en,
                    'title_ar' => $reminder->name_ar,
                    'message_ar' => $reminder->description_ar
                ];
                $data=[
                        "user_id"=>$reminder->user->id,
                        "name_ar"=>$reminder->name_ar,
                        "name_en"=>$reminder->name_en,
                        "type"=>2,
                        "description_ar"=>$reminder->description_ar,
                        "description_en"=>$reminder->description_en
                        
                    ];
                     Notification::create($data);
                    $this->sendNotification($data_send=$notification,$users=[$reminder->user->id]);
                            

               
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
        $data=$request->validated();
        Notification::create($data);
        $notification=
        [
            'type' => "1",
            'title' => $request->name_en,
            'title_ar' => $request->name_ar,
            'message' => $request->description_en,
            'message_ar' => $request->description_ar,
            'region_id' =>$request->region_id ,
            'product_id' =>$request->product_id ,
            'seller_id' =>$request->seller_id ,
        ];
        $subscribers=[];
        if($request->region_id){
            $subscribers = User::whereRegionId($request->region_id)->pluck('device_id');
        }
 
        $this->sendNotification($data_send=$notification,$users=$subscribers);
        return  to_route('admin.notifications.index')->with('success',trans('lang.created'));
    }

    public function destroy(Request $request){
        Notification::destroy($request->id);
        return  to_route('admin.notifications.index')->with('success',trans('lang.deleted'));
    }

    function sendNotification($data_send=array(),$users=array()){
        #TODO complete
        
        $content = ["en" => $data_send["message"],"ar" => $data_send["message_ar"]];
        $headings= ["en" => $data_send["title"],"ar" => $data_send["title_ar"]]; //<---- this will add heading
        $fields = array(
            'app_id' => 'dd3cdd89-0c51-4e25-98ca-5b131a25044a',
            'data' => $data_send,
            'isAndroid'=>true,
            'isIos'=>true,
            'content_available'=>true,
            'small_icon'    => 'ic_launcher-web',
            //'large_icon' =>"ic_launcher_round.png",
            'contents' => $content,
            'headings'=> $headings //<---- include it to request
        );

        if(empty($users) || count($users)==0)
        
        {
           
            $fields['included_segments']=array('All');
        }else
        {
            $fields['include_player_ids']=$users;
        }

        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic NDg4Yjk3OTEtNzA1Yi00NWE3LWFlYzItZjI3NDYyODlmODBm'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}
