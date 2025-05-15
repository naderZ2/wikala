<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\SpecialRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SpecialRequestDetails;
use App\Services\SpecialRequestService;
use App\Http\Requests\Admin\SpecialRequest\SpecialRequestDetailsRequest;

class SpecialRequestController extends Controller
{




    public function index(){
        $this->lang();
        $specialRequests=SpecialRequest::with('category','area')->get();
        return view('admin.specialRequests.index',compact('specialRequests'));
    }
    public function create(int $id){
        $this->lang();
        return view('admin.specialRequests.create',compact('id'));
    }
    
    public function details(int $id){
        $this->lang();

        $specialRequest = SpecialRequest::find($id);

        $specialRequestDetails = SpecialRequestDetails::where('special_requests_id','=',$id)->get();

        // Log::info($specialRequestDetails);
        foreach($specialRequestDetails as $Request ){
            
            
            if($Request->role == 'admin'){
                $Request::with('admin');
                Log::info($Request->admin);
            }else{
                $Request::with('user');
                Log::info($Request->user);

            }
        }
        // Log::info($specialRequestDetails);
        // Log::info($specialRequestDetails);
        return view('admin.specialRequests.details',compact('specialRequest','specialRequestDetails'));  
    }


    public function store(SpecialRequestDetailsRequest $request,SpecialRequestService $service){
        $validatedData = $request->validated();

        // SpecialRequestDetails::create($request->validated());
        $specialRequest = $service->createSpecialRequestDetails($validatedData,'admin');
        // return response()->json($specialRequest);
        return  to_route('admin.specialRequest.details',$validatedData['special_requests_id'])->with('success',trans('lang.created')); 
    }



    //   public function rejection(Request $request){
    //     // Log::info($request->rejection_reason);
    //     // Log::info($request);
    //     // Log::info($request->id);
    //     $dailyevent= DailyEvents::find($request->id);
    //     $dailyevent->update([
    //         'rejection_reason' => $request->rejection_reason,
    //     ]);
    //     return redirect('events/daily_events?eventiFlter=rejected');
        
    //   }

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


    $dailyEvents = $dailyEvents->whereNotNull('rejection_reason',);


}






    $dailyEvents = $dailyEvents->with("eventCategory:id,$this->name,image")->get();
    // Log::info($request);
    // Log::info($dailyEvents);
    return view('admin.events.daily_events',compact('dailyEvents'));  





    }
    

    
    public function changeStatus($id){
         $dailyEvent = DailyEvents::where('id',$id)->first();
         $status=!$dailyEvent->active;
        $dailyEvent->update(['active'=>$status]);
        return  to_route('daily_events.index');  
    }


    
    
    // public function update(EditRequest $request){
    //     $Category=EventCategory::find($request->id);
    //     $Category->update($request->validated());
    //     return  to_route('event_category.index')->with('success',trans('lang.updated')); 
    // }
}
