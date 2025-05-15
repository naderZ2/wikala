<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\DailyEvents;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventCategory\{StoreRequest,EditRequest};

class DailyEventController extends Controller
{
      public function rejection(Request $request){
        // Log::info($request->rejection_reason);
        // Log::info($request);
        // Log::info($request->id);
        $dailyevent= DailyEvents::find($request->id);
        $dailyevent->update([
            'rejection_reason' => $request->rejection_reason,
        ]);
        return redirect('events/daily_events?eventiFlter=rejected');
        
      }
      
       public function save_event(Request $request){
       
        // Log::info($request->id);
        $data=$request->all();
        $data['active']=1;
        $dailyevent= DailyEvents::create($data);
        
        return redirect('events/daily_events?eventiFlter=approved');
        
      }

      public function events(Request $request){
            $this->lang();


            $dailyEvents = DailyEvents::select('id',$this->name,$this->description,
            "event_category_id",	"phone",
               "whatsApp_number",	"date"	,"time",
               "address",	"family_name",
               "longitude"	, "latitude" ,'type','f_phone','f_whatsApp_number',
               'f_address','f_latitude','f_longitude','image','active','rejection_reason');
        
    
               if($request->eventiFlter=='approved'){
    
    
    
                $dailyEvents = $dailyEvents
                ->where('active', 1)
                ->where(function ($query) {
                    $query->where('date', '>', Carbon::now()->toDateString())
                          ->orWhere(function ($query) {
                              $query->where('date', '=', Carbon::now()->toDateString())
                                    ->where('time', '>', Carbon::now()->toTimeString())
                                    ->where('rejection_reason', Null);
                          });
                });
            
            }elseif($request->eventiFlter=='under_review'){
        
               
               $dailyEvents = $dailyEvents->where('active',0)->where('rejection_reason', Null);
            
               
            }elseif($request->eventiFlter=='expired')
            {
        
                $dailyEvents = $dailyEvents
            ->where('active', 1)
            ->where(function ($query) {
                $query->where('date', '<', Carbon::now()->toDateString())
                    ->orWhere(function ($query) {
                        $query->where('date', '=', Carbon::now()->toDateString())
                                ->where('time', '<', Carbon::now()->toTimeString())
                                ->where('rejection_reason', Null);
                    });
            });
                
            
        }elseif($request->eventiFlter=='rejected'){
        
        
            $dailyEvents = $dailyEvents->whereNotNull('rejection_reason');


    }


    $dailyEvents = $dailyEvents->with("eventCategory:id,$this->name,image")->get();
    // Log::info($request);
    // Log::info($dailyEvents);
    return view('admin.events.daily_events',compact('dailyEvents'));  

    }
    
      public function addEvent(){
            $this->lang();
                $categories=EventCategory::select('id',$this->name,'image')
                ->get();
            $cities = City::whereNull('parent_id')->get(['id','parent_id',$this->name]);
              return view('admin.events.add_daily_event',compact('categories','cities'));  

      }
    
    public function details($id){
          $this->lang();
         $dailyEvents = DailyEvents::where('id',$id)
         
         ->select('id','name_ar','name_en','description_ar','description_en',
        "event_category_id",	"phone",
       	"whatsApp_number",	"date"	,"time",
       	"address",	"family_name",
       	"longitude"	, "latitude" ,'type','f_phone','f_whatsApp_number',
       	'f_address','f_latitude','f_longitude','image','active');
       	
        // Eager load eventCategory relationship
        $dailyEvents = $dailyEvents->with("eventCategory:id,$this->name,image")->first();
        return view('admin.events.daily_events_details',compact('dailyEvents'));  
    }
    
    public function changeStatus($id){
         $dailyEvent = DailyEvents::where('id',$id)->first();
         $status=!$dailyEvent->active;
        $dailyEvent->update(['active'=>$status]);
        return  to_route('daily_events.index');  
    }

    public function create(){
        $this->lang();
        return view('admin.events.add_category');  
    }
    
    public function store(StoreRequest $request){
        EventCategory::create($request->validated());
        return  to_route('event_category.index')->with('success',trans('lang.created')); 
    }

    public function update(EditRequest $request){
        $Category=EventCategory::find($request->id);
        $Category->update($request->validated());
        return  to_route('event_category.index')->with('success',trans('lang.updated')); 
    }
    public function destroy ($id){
        $event=DailyEvents::find($id);
        $event->delete();
        return  to_route('daily_events.index')->with('success');
}
}