<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RejectedReason;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RejectedReasons\StoreRequest;
use App\Http\Requests\Admin\RejectedReasons\EditRequest;

class RejectedReasonController extends Controller
{
    public function index()
    {
        $reasons = RejectedReason::all();
        return view('admin.rejected_reason.index', compact('reasons'));
    }

    public function store(StoreRequest $request)
    {
        RejectedReason::create($request->validated());
        return redirect()->route('rejected-reasons.index')->with('success', trans('created'));
    }

    

    
    public function edit(RejectedReason $rejectedReason)
    {
        return view('rejected_reasons.edit', compact('rejectedReason'));
    }

    
    public function update(EditRequest $request)
    {
        $rejectedReason = RejectedReason::findOrFail($request->id);
        $rejectedReason->update($request->validated());
        return redirect()->route('rejected-reasons.index')->with('success', trans('updated'));
    }

    
    // public function destroy(RejectedReason $rejectedReason)
    // {
    //     $rejectedReason->delete();
    //     return redirect()->route('rejected-reasons.index')->with('success', trans('deleted'));
    // }
    


    public function enable($id)
    {
        $reason = RejectedReason::findOrFail($id);
        $reason->enable = !$reason->enable;
        $reason->save();

        return redirect()->route('rejected-reasons.index')->with('success', trans('updated'));
    }

}
