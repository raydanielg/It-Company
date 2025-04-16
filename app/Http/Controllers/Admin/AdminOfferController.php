<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\OfferElement;
use App\Models\FlatIcon;

class AdminOfferController extends Controller
{
    public function index()
    {
        $offers = Offer::where('id',1)->first();
        $offer_elements = OfferElement::get();
        $icons = FlatIcon::orderBy('icon_code','asc')->get();
        return view('admin.offer.index', compact('offers', 'offer_elements', 'icons'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = Offer::where('id',1)->first();
        if($request->photo != null) {
            $request->validate([
                'photo' => 'mimes:jpg,jpeg,png,gif',
            ],[
                'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
            ]);

            if($obj->photo!=null) {
                unlink(public_path('uploads/'.$obj->photo));
            }
            
            $final_name = 'offer_photo_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $obj->photo = $final_name;
        }

        $obj->subheading = $request->subheading;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->icon = $request->icon;
        $obj->tagline = $request->tagline;
        $obj->youtube_video_id = $request->youtube_video_id;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function element_submit(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'item' => 'required',
        ], [
            'item.required' => __('Item is required'),
        ]);

        $obj = new OfferElement();
        $obj->item = $request->item;
        $obj->save();

        return redirect()->back()->with('success', __('Data is added successfully'));
    }

    public function element_update(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'item' => 'required',
        ], [
            'item.required' => __('Item is required'),
        ]);

        $obj = OfferElement::where('id',$id)->first();
        $obj->item = $request->item;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function element_delete(Request $request,$id) 
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = OfferElement::where('id',$id)->first();
        $obj->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }
}
