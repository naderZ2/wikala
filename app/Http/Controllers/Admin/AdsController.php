<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Models\User;
use App\Models\AdsType;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\RejectedReason;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ads\EditRequest;
use App\Http\Requests\Admin\Ads\StoreRequest;

class AdsController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'all');

        $query = Ad::select('id', 'ad_number', 'title', 'start_date', 'end_date');

        if ($status === 'outdated') {
            $query->where('end_date', '<', now());
        } elseif (in_array($status, ['under_review', 'accepted', 'rejected'])) {
            $query->where('status', $status);
        }

        $ads = $query->latest()->get();

        return view('admin.ads.index', compact('ads', 'status'));
    }




    public function details(Request $request, $id)
    {
        $this->lang();
        $ad = Ad::with(['user', "category:id,$this->name", "attributes.attribute:id,$this->name,type,image", 'rejectedReason','images',"city:id,$this->name","region:id,$this->name"])->findOrFail($id);
        Log::info($ad->rejectedReason);

        return view('admin.ads.details', compact('ad'));
    }

    public function editStatus(Request $request, $id)
    {
        $this->lang();
        $ad = Ad::findOrFail($id);
        $rejectedReasons = RejectedReason::all();
        // return view('admin.ads.editStatus', compact('ad', 'ads', 'rejectedReasons'));
        $ads = Ad::select('id','ad_number','title')->get();
        $rejectedReasons = RejectedReason::where('enable',1)->get();
        return view('admin.ads.editStatus', compact('ad','rejectedReasons'));
    }


    public function changeStatus(Request $request, $id)
    {
        $this->lang();
        // Log::info($request->all(), ['id' => $id]);


        $request->validate([
            'status' => 'required|in:under_review,accepted,rejected',
            'rejected_id' => 'nullable|required_if:status,rejected|exists:rejected_reason,id',
        ], [
            'rejected_id.required_if' => __('lang.rejected_reason_required'),
        ]);

        $ad = Ad::findOrFail($id);

        $ad->status = $request->status;

        // Handle rejected reason logic
        if ($request->status === 'rejected') {
            $ad->rejected_id = $request->rejected_id;
        } else {
            $ad->rejected_id = null; // Clear it if not rejected
        }

        $ad->save();

        // return redirect()->route('ads.index')->with('success', trans('lang.updated'));
        return redirect()->route('ads.details',$id)->with('success', trans('lang.updated'));
    }


}
