<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoOneItem;

class AdminVideoOneController extends Controller
{
    public function item()
    {
        $video_one_items = VideoOneItem::where('id',1)->first();
        return view('admin.video.one', compact('video_one_items'));
    }

    public function item_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = VideoOneItem::where('id',1)->first();
        $request->validate([
            'heading' => 'required',
            'youtube_video_id' => 'required',
        ],[
            'heading.required' => __('Heading is required'),
            'youtube_video_id.required' => __('Youtube Video ID is required'),
        ]);
        if($request->photo != null) {
            $request->validate([
                'photo' => 'mimes:jpg,jpeg,png,gif',
            ],[
                'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
            ]);

            if($obj->photo!=null) {
                unlink(public_path('uploads/'.$obj->photo));
            }
            
            $final_name = 'video_one_photo_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $obj->photo = $final_name;
        }

        $obj->heading = $request->heading;
        $obj->youtube_video_id = $request->youtube_video_id;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }
}
