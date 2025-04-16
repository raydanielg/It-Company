<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WelcomeTwoItem;
use App\Models\WelcomeTwoItemElement;
use App\Models\WelcomeTwoItemSkill;

class AdminWelcomeTwoController extends Controller
{
    public function item()
    {
        $welcome_two_items = WelcomeTwoItem::where('id',1)->first();
        $welcome_two_item_elements = WelcomeTwoItemElement::get();
        $welcome_two_item_skills = WelcomeTwoItemSkill::get();
        return view('admin.welcome.two', compact('welcome_two_items', 'welcome_two_item_elements', 'welcome_two_item_skills'));
    }

    public function item_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = WelcomeTwoItem::where('id',1)->first();
        if($request->photo1 != null) {
            $request->validate([
                'photo1' => 'mimes:jpg,jpeg,png,gif',
            ],[
                'photo1.mimes' => __('Photo 1 must be jpeg, png, jpg or gif'),
            ]);

            if($obj->photo1!=null) {
                unlink(public_path('uploads/'.$obj->photo1));
            }
            
            $final_name = 'welcome_two_photo1_'.time().'.'.$request->photo1->extension();
            $request->photo1->move(public_path('uploads'), $final_name);
            $obj->photo1 = $final_name;
        }
        if($request->photo2 != null) {
            $request->validate([
                'photo2' => 'mimes:jpg,jpeg,png,gif',
            ],[
                'photo2.mimes' => __('Photo 2 must be jpeg, png, jpg or gif'),
            ]);

            if($obj->photo2!=null) {
                unlink(public_path('uploads/'.$obj->photo2));
            }
            
            $final_name = 'welcome_two_photo2_'.time().'.'.$request->photo2->extension();
            $request->photo2->move(public_path('uploads'), $final_name);
            $obj->photo2 = $final_name;
        }

        $obj->subheading = $request->subheading;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->experience_year = $request->experience_year;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function item_element_submit(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'heading' => 'required',
            'text' => 'required',
        ], [
            'heading.required' => __('Heading is required'),
            'text.required' => __('Text is required')
        ]);

        $obj = new WelcomeTwoItemElement();
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->save();

        return redirect()->back()->with('success', __('Data is added successfully'));
    }

    public function item_element_update(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'heading' => 'required',
            'text' => 'required',
        ], [
            'heading.required' => __('Heading is required'),
            'text.required' => __('Text is required')
        ]);

        $obj = WelcomeTwoItemElement::where('id',$id)->first();
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function item_element_delete(Request $request,$id) 
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = WelcomeTwoItemElement::where('id',$id)->first();
        $obj->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }


    public function item_skill_submit(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name' => 'required',
            'percentage' => 'required',
        ], [
            'name.required' => __('Name is required'),
            'percentage.required' => __('Percentage is required')
        ]);

        $obj = new WelcomeTwoItemSkill();
        $obj->name = $request->name;
        $obj->percentage = $request->percentage;
        $obj->save();

        return redirect()->back()->with('success', __('Data is added successfully'));
    }

    public function item_skill_update(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name' => 'required',
            'percentage' => 'required',
        ], [
            'name.required' => __('Name is required'),
            'percentage.required' => __('Percentage is required')
        ]);

        $obj = WelcomeTwoItemSkill::where('id',$id)->first();
        $obj->name = $request->name;
        $obj->percentage = $request->percentage;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function item_skill_delete(Request $request,$id) 
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = WelcomeTwoItemSkill::where('id',$id)->first();
        $obj->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }

    
}
