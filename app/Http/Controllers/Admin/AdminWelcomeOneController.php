<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WelcomeOneItem;
use App\Models\WelcomeOneItemElement;
use App\Models\FlatIcon;

class AdminWelcomeOneController extends Controller
{
    public function item()
    {
        $welcome_one_items = WelcomeOneItem::where('id',1)->first();
        $welcome_one_item_elements = WelcomeOneItemElement::get();
        $icons = FlatIcon::orderBy('icon_code','asc')->get();
        return view('admin.welcome.one', compact('welcome_one_items', 'welcome_one_item_elements', 'icons'));
    }

    public function item_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = WelcomeOneItem::where('id',1)->first();
        if($request->person_photo != null) {
            $request->validate([
                'person_photo' => 'mimes:jpg,jpeg,png,gif',
            ],[
                'person_photo.mimes' => __('Person Photo must be in jpg, jpeg, png or gif'),
            ]);

            if($obj->person_photo!=null) {
                unlink(public_path('uploads/'.$obj->person_photo));
            }
            
            $final_name = 'welcome_one_person_photo_'.time().'.'.$request->person_photo->extension();
            $request->person_photo->move(public_path('uploads'), $final_name);
            $obj->person_photo = $final_name;
        }
        if($request->photo1 != null) {
            $request->validate([
                'photo1' => 'mimes:jpg,jpeg,png,gif',
            ],[
                'photo1.mimes' => __('Photo 1 must be jpeg, png, jpg or gif'),
            ]);

            if($obj->photo1!=null) {
                unlink(public_path('uploads/'.$obj->photo1));
            }
            
            $final_name = 'welcome_one_photo1_'.time().'.'.$request->photo1->extension();
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
            
            $final_name = 'welcome_one_photo2_'.time().'.'.$request->photo2->extension();
            $request->photo2->move(public_path('uploads'), $final_name);
            $obj->photo2 = $final_name;
        }

        $obj->subheading = $request->subheading;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->experience_year = $request->experience_year;
        $obj->person_name = $request->person_name;
        $obj->person_designation = $request->person_designation;
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
            'text' => 'required',
        ], [
            'icon.required' => __('Icon is required'),
            'heading.required' => __('Heading is required'),
            'text.required' => __('Text is required'),
        ]);

        $obj = new WelcomeOneItemElement();
        $obj->icon = $request->icon;
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
            'icon' => 'required',
            'heading' => 'required',
            'text' => 'required',
        ], [
            'icon.required' => __('Icon is required'),
            'heading.required' => __('Heading is required'),
            'text.required' => __('Text is required'),
        ]);

        $obj = WelcomeOneItemElement::where('id',$id)->first();
        $obj->icon = $request->icon;
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
        
        $obj = WelcomeOneItemElement::where('id',$id)->first();
        $obj->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }
}
