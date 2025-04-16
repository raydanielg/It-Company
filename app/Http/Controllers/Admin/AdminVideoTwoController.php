<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoTwoItem;

class AdminVideoTwoController extends Controller
{
    public function item()
    {
        $video_two_items = VideoTwoItem::where('id',1)->first();
        return view('admin.video.two', compact('video_two_items'));
    }

    public function item_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = VideoTwoItem::where('id',1)->first();
        $request->validate([
            'heading' => 'required',
            'youtube_video_id' => 'required',
        ],[
            'heading.required' => __('Heading is required'),
            'youtube_video_id.required' => __('Youtube Video ID is required'),
        ]);

        $obj->heading = $request->heading;
        $obj->youtube_video_id = $request->youtube_video_id;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }
}
