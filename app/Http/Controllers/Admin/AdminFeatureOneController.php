<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeatureOneItem;
use App\Models\FeatureOneItemElement;
use App\Models\FlatIcon;

class AdminFeatureOneController extends Controller
{
    public function item()
    {
        $feature_one_items = FeatureOneItem::where('id',1)->first();
        $feature_one_item_elements = FeatureOneItemElement::get();
        $icons = FlatIcon::orderBy('icon_code','asc')->get();
        return view('admin.feature.one', compact('feature_one_items', 'feature_one_item_elements', 'icons'));
    }

    public function item_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = FeatureOneItem::where('id',1)->first();
        if($request->photo != null) {
            $request->validate([
                'photo' => 'mimes:jpg,jpeg,png,gif',
            ],[
                'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
            ]);

            if($obj->photo!=null) {
                unlink(public_path('uploads/'.$obj->photo));
            }
            
            $final_name = 'feature_one_photo_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $obj->photo = $final_name;
        }

        $obj->text = $request->text;
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

        $obj = new FeatureOneItemElement();
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

        $obj = FeatureOneItemElement::where('id',$id)->first();
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
        
        $obj = FeatureOneItemElement::where('id',$id)->first();
        $obj->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }
}
