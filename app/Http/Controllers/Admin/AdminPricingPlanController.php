<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PricingPlan;
use App\Models\PricingPlanOption;
use Illuminate\Validation\Rule;

class AdminPricingPlanController extends Controller
{
    public function index()
    {
        $pricing_plans = PricingPlan::orderBy('id','asc')->get();
        return view('admin.pricing_plan.index',compact('pricing_plans'));
    }

    public function create()
    {
        return view('admin.pricing_plan.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'period' => ['required'],
            'button_text' => ['required'],
            'button_url' => ['required'],
            'photo' => ['required','mimes:jpeg,png,gif'],
        ],[
            'name.required' => __('Name is required'),
            'name.unique' => __('Name already exists'),
            'price.required' => __('Price is required'),
            'price.numeric' => __('Price must be numeric'),
            'price.min' => __('Price must be greater than 0'),
            'period.required' => __('Period is required'),
            'button_text.required' => __('Button text is required'),
            'button_url.required' => __('Button url is required'),
            'photo.required' => __('Photo is required'),
            'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
        ]);

        $obj = new PricingPlan();

        $final_name = 'pricing_plan_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $obj->photo = $final_name;

        $obj->name = $request->name;
        $obj->price = (int)$request->price;
        $obj->period = $request->period;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->save();

        return redirect()->route('admin_pricing_plan_index')->with('success', __('Data is added successfully'));
    }

    public function edit($id)
    {
        $pricing_plan = PricingPlan::find($id);
        return view('admin.pricing_plan.edit', compact('pricing_plan'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = PricingPlan::find($id);
        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'period' => ['required'],
            'button_text' => ['required'],
            'button_url' => ['required'],
        ],[
            'name.required' => __('Name is required'),
            'name.unique' => __('Name already exists'),
            'price.required' => __('Price is required'),
            'price.numeric' => __('Price must be numeric'),
            'price.min' => __('Price must be greater than 0'),
            'period.required' => __('Period is required'),
            'button_text.required' => __('Button text is required'),
            'button_url.required' => __('Button url is required'),
        ]);
        if($request->photo != null) {
            $request->validate([
                'photo' => ['mimes:jpeg,png,gif'],
            ],[
                'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
            ]);
            if($obj->photo) {
                unlink(public_path('uploads/'.$obj->photo));
            }
            $final_name = 'pricing_plan_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->price = (int)$request->price;
        $obj->period = $request->period;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->update();

        return redirect()->route('admin_pricing_plan_index')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = PricingPlan::find($id);
        if($obj->photo) {
            unlink(public_path('uploads/'.$obj->photo));
        }
        $obj->delete();

        PricingPlanOption::where('pricing_plan_id',$id)->delete();

        return redirect()->route('admin_pricing_plan_index')->with('success', __('Data is deleted successfully'));
    }

    public function option($id)
    {
        $pricing_plan = PricingPlan::find($id);
        $options = PricingPlanOption::where('pricing_plan_id',$id)->orderBy('id','asc')->get();
        return view('admin.pricing_plan.option',compact('pricing_plan','options'));
    }

    public function option_store(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name' => ['required']
        ],[
            'name.required' => __('Name is required')
        ]);
        $obj = new PricingPlanOption();
        $obj->pricing_plan_id = $id;
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', __('Data is added successfully'));
    }

    public function option_update(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = PricingPlanOption::find($id);
        $request->validate([
            'name' => ['required']
        ],[
            'name.required' => __('Name is required')
        ]);
        $obj->name = $request->name;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function option_destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = PricingPlanOption::find($id);
        $obj->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }
}
