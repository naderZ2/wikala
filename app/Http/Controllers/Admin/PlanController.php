<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    public function index()
    {
        $this->lang();
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'ads_limit' => 'required|integer|min:0',
        ]);

        Plan::create($validated);

        return redirect()->route('plans.index')->with('success', trans('lang.created'));
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);

        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'ads_limit' => 'required|integer|min:0',
        ]);

        $plan->update($validated);

        return redirect()->route('plans.index')->with('success', trans('lang.updated'));
    }

    public function destroy(Request $request)
    {
        $plan = Plan::findOrFail($request->id);
        $plan->delete();

        return redirect()->route('plans.index')->with('success', trans('lang.deleted'));
    }

    public function toggle($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->is_active = !$plan->is_active;
        $plan->save();

        return redirect()->route('plans.index')->with('success', trans('lang.updated'));
    }

    /**
     * View history of all seller subscription payments
     */
    public function paymentsHistory()
    {
        $this->lang();
        $payments = \App\Models\SellerSubscriptionPayment::with(['seller', 'plan'])->latest()->get();
        return view('admin.plans.payments', compact('payments'));
    }
}
