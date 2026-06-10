<?php

namespace App\Http\Controllers\Client;

use App\Models\{City,UserAdress,EventCategory,DailyEvents,UserDailyEvent};
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\City\{CheckRequest,StoreRequest,EditRequest};
use Illuminate\Http\Request;
use Carbon;

use App\Http\Requests\Client\events\StoreEventRequest;
use App\Http\Requests\Client\events\EditEventRequest;
class EventController extends Controller
{
    use ResponsesTrait;
    public function index(){
        $this->lang();
        // $cities = EventCategory::select('id',$this->name,"image")->get();
        $cities = EventCategory::select('id',$this->name,"image")->orderBy('order')->get();
        return $this->success($cities);
    }
    
    public function families() {
    $this->lang();
    $cities = DailyEvents::select("family_name")->where("active",1)->distinct()->get();
    return $this->success($cities);
    }
    
    public function userDailyEvents(Request $request){
      $this->lang();
    
    // Get the logged-in user
    $user = auth()->user();

    // Get the daily events associated with the logged-in user
    $dailyEvents = UserDailyEvent::select(
            'user_daily_event.id as user_daily_event_id',
            'daliy_events.id as daily_event_id',
            'daliy_events.' . $this->name,
            'daliy_events.' . $this->description,
            'daliy_events.event_category_id',
            'daliy_events.phone',
            'daliy_events.whatsApp_number',
            'daliy_events.date',
            'daliy_events.address',
            'daliy_events.family_name',
            'daliy_events.longitude',
            'daliy_events.latitude',
            'daliy_events.type',
            'daliy_events.f_phone',
            'daliy_events.f_whatsApp_number',
            'daliy_events.f_address',
            'daliy_events.f_latitude',
            'daliy_events.f_longitude',
            'daliy_events.image'
        )
        ->join('daliy_events', 'user_daily_event.daily_event_id', '=', 'daliy_events.id')
        ->where('user_daily_event.user_id', $user->id)
        ->where('daliy_events.active',1)
        ->with("dailyEvent.eventCategory:id,$this->name,image")
        ->get();

    return $this->success($dailyEvents);
    }
    
    public function addUserDailyEvent(Request $request){
        UserDailyEvent::create(["user_id"=> auth()->user()->id,'daily_event_id'=>$request->daily_event_id]);
        return $this->success(null,trans('lang.created'));
    }
    
    public function addDailyEvents(StoreEventRequest $request){
        $data=$request->validated();
        $data['user_id']= auth()->user()->id;
        DailyEvents::create($data);
        return $this->success(null,trans('lang.created'));
    }
    
     public function editDailyEvents(EditEventRequest $request){
        $data=$request->validated();
        $data['active']=0;
        DailyEvents::where('id',$request->id)->update($data);
        return $this->success(null,trans('lang.updated'));
    }
    
    
    
    public function deleteDailyEvent(Request $request){
        $dailyEvent= DailyEvents::find($request->daily_event_id);
       if ($dailyEvent &&($dailyEvent->user_id == auth()->user()->id)){
           $dailyEvent->delete();
       }
        return $this->success(null,trans('lang.deleted'));
    }
    
    public function deleteUserDailyEvent(Request $request){
        UserDailyEvent::destroy([$request->user_daily_event_id]);
        return $this->success(null,trans('lang.deleted'));
    }

    public function events(Request $request){
        $this->lang();
        $dailyEvents = DailyEvents::where('active',1)
            ->select('id',$this->name,$this->description,
        "event_category_id",	"phone",
       	"whatsApp_number",	"date"	,"time",
       	"address",	"family_name",
       	"longitude"	, "latitude" ,'type','f_phone','f_whatsApp_number',
       	'f_address','f_latitude','f_longitude','image');
       	if($request->date){
       	    $dailyEvents=$dailyEvents->where('date',$request->date);
       	}
       	if($request->event_category_id){
       	    $dailyEvents=$dailyEvents->where('event_category_id',$request->event_category_id);
       	}
       	
       	if($request->family_name){
       	    $dailyEvents=$dailyEvents->where('family_name',$request->family_name);
       	}
       	  if ($request->gender) {
       	    $dailyEvents=$dailyEvents->where('type',$request->gender);

        // $dailyEvents = $dailyEvents->whereHas('eventCategory', function($query) use ($request) {
        //     $query->where('type', $request->gender);
        // });
        }
        
     	if($request->area_id){
       	    $dailyEvents=$dailyEvents->where('city_id',$request->area_id)->orWhere('city_id',null);
       	}

    // Eager load eventCategory relationship
    $dailyEvents = $dailyEvents->with("eventCategory:id,$this->name,image")->get();
        return $this->success($dailyEvents);
    }
    
    public function userEvents(Request $request){
        // return auth()->user()->id;
        $this->lang();
        $dailyEvents = DailyEvents::where('user_id',auth()->user()->id)
            ->select('id',$this->name,$this->description,
        "event_category_id",	"phone",
       	"whatsApp_number",	"date"	,"time",
       	"address",	"family_name",
       	"longitude"	, "latitude" ,'type','f_phone','f_whatsApp_number',
       	'f_address','f_latitude','f_longitude','image','active');
    
        $dailyEvents = $dailyEvents
        ->with("eventCategory:id,$this->name,image")
        ->get();
        $dailyEventsCategories=[];
        $dailyEventsCategories['underReview']=$dailyEvents->where('active',0)->values();;
         $dailyEventsCategories['approved'] = $dailyEvents->filter(function ($event) {
        $eventDateTime = Carbon\Carbon::parse($event->date . ' ' . $event->time);
        return $event->active == 1 && $eventDateTime->isFuture();
    })->values();;
    
     $dailyEventsCategories['expired']= $dailyEvents->filter(function ($event) {
        $eventDateTime = Carbon\Carbon::parse($event->date . ' ' . $event->time);
        return $event->active == 1 && $eventDateTime->isPast();
    })->values();;



        return $this->success($dailyEventsCategories);
    }
    
    public function regions(CheckRequest $request){
        $this->lang();
        $cities = City::where('parent_id',$request->id)->select('id',$this->name)->get();
        return $this->success($cities);
    }

    public function addClientRegion(StoreRequest $request){
        if(count( auth()->user()->address)==0){
            auth()->user()->update(['region_id' => $request->id]);
        }
        
        $data=$request->validated();
        $data['region_id'] = $request->id;
        unset($data['id']);
        auth()->user()->address()->create($data);
        return $this->success(null,trans('lang.created'));
    }

    public function editClientRegion(EditRequest $request){
        $data=$request->validated();
        auth()->user()->address()->whereId( $request->id)->update($data);
        return $this->success(null,trans('lang.updated'));
    }

    public function deleteClientRegion(CheckRequest $request){
        UserAdress::destroy($request->id);
        return $this->success(null,trans('lang.deleted'));
    }

    public function updateMainAddress(CheckRequest $request){
        $region_id = UserAdress::find($request->id);
        auth()->user()->update(['region_id' => $region_id]);
        return $this->success(null,trans('lang.updated'));
    }
}
