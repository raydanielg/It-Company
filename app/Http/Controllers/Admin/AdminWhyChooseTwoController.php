<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseTwoItem;
use App\Models\WhyChooseTwoItemElement;
use App\Models\FlatIcon;

class AdminWhyChooseTwoController extends Controller
{
    public function item()
    {
        $why_choose_two_items = WhyChooseTwoItem::where('id',1)->first();
        $why_choose_two_item_elements = WhyChooseTwoItemElement::get();
        $icons = FlatIcon::orderBy('icon_code','asc')->get();
        return view('admin.why_choose.two', compact('why_choose_two_items', 'why_choose_two_item_elements', 'icons'));
    }

    public function item_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = WhyChooseTwoItem::where('id',1)->first();
        if($request->photo != null) {
            $request->validate([
                'photo' => 'mimes:jpg,jpeg,png,gif',
            ],[
                'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
            ]);

            if($obj->photo!=null) {
                unlink(public_path('uploads/'.$obj->photo));
            }
            
            $final_name = 'why_choose_two_photo_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $obj->photo = $final_name;
        }
        $obj->heading = $request->heading;
        $obj->subheading = $request->subheading;
        $obj->photo_over_text = $request->photo_over_text;
        $obj->photo_over_heading = $request->photo_over_heading;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function item_element_submit(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
        ], [
            'icon.required' => __('Icon is required'),
            'heading.required' => __('Heading is required'),
        ]);

        $obj = new WhyChooseTwoItemElement();
        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->save();

        return redirect()->back()->with('success', __('Data is added successfully'));
    }

    public function item_element_update(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
        ], [
            'icon.required' => __('Icon is required'),
            'heading.required' => __('Heading is required'),
        ]);

        $obj = WhyChooseTwoItemElement::where('id',$id)->first();
        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function item_element_delete(Request $request,$id) 
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = WhyChooseTwoItemElement::where('id',$id)->first();
        $obj->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }
}
