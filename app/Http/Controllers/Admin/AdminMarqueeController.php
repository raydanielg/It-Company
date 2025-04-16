<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marquee;

class AdminMarqueeController extends Controller
{
    public function index()
    {
        $marquees = Marquee::orderBy('id','asc')->get();
        return view('admin.marquee.index',compact('marquees'));
    }

    public function create()
    {
        return view('admin.marquee.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'item' => ['required']
        ],[
            'item.required' => __('Item is required'),
        ]);

        $obj = new Marquee();
        $obj->item = $request->item;
        $obj->save();

        return redirect()->route('admin_marquee_index')->with('success', __('Data is added successfully'));
    }

    public function edit($id)
    {
        $marquee = Marquee::find($id);
        return view('admin.marquee.edit', compact('marquee'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = Marquee::find($id);
        $request->validate([
            'item' => ['required']
        ],[
            'item.required' => __('Item is required'),
        ]);
        $obj->item = $request->item;
        $obj->update();

        return redirect()->route('admin_marquee_index')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = Marquee::find($id);
        $obj->delete();

        return redirect()->route('admin_marquee_index')->with('success', __('Data is deleted successfully'));
    }
}
