<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class AdminSliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'photo' => ['required','mimes:jpeg,png,pdf'],
        ],[
            'photo.required' => __('Photo is required'),
            'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
        ]);
        $slider = new Slider();
        $final_name = 'slider_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $slider->photo = $final_name;
        $slider->text = $request->text;
        $slider->button_text = $request->button_text;
        $slider->button_url = $request->button_url;
        $slider->save();

        return redirect()->route('admin_slider_index')->with('success', __('Data is added successfully'));
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $slider = Slider::find($id);
        if($request->photo != null) {
            $request->validate([
                'photo' => ['required','mimes:jpeg,png,pdf'],
            ],[
                'photo.required' => __('Photo is required'),
                'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
            ]);
            if($slider->photo) {
                unlink(public_path('uploads/'.$slider->photo));
            }
            $final_name = 'slider_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $slider->photo = $final_name;
        }
        $slider->text = $request->text;
        $slider->button_text = $request->button_text;
        $slider->button_url = $request->button_url;
        $slider->update();

        return redirect()->route('admin_slider_index')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $slider = Slider::find($id);
        if($slider->photo) {
            unlink(public_path('uploads/'.$slider->photo));
        }
        $slider->delete();

        return redirect()->route('admin_slider_index')->with('success', __('Data is deleted successfully'));
    }
}
