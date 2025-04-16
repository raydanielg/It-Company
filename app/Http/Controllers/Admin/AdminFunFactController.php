<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FunFact;
use App\Models\FunFactElement;
use App\Models\FlatIcon;

class AdminFunFactController extends Controller
{
    public function index()
    {
        $fun_facts = FunFact::where('id',1)->first();
        $fun_fact_elements = FunFactElement::get();
        $icons = FlatIcon::orderBy('icon_code','asc')->get();
        return view('admin.fun_fact.index', compact('fun_facts', 'fun_fact_elements', 'icons'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = FunFact::where('id',1)->first();
        $obj->subheading = $request->subheading;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function element_submit(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'icon' => 'required',
            'number' => 'required',
            'name' => 'required',
        ], [
            'icon.required' => __('Icon is required'),
            'number.required' => __('Number is required'),
            'name.required' => __('Name is required'),
        ]);

        $obj = new FunFactElement();
        $obj->icon = $request->icon;
        $obj->number = $request->number;
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', __('Data is added successfully'));
    }

    public function element_update(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'icon' => 'required',
            'number' => 'required',
            'name' => 'required',
        ] , [
            'icon.required' => __('Icon is required'),
            'number.required' => __('Number is required'),
            'name.required' => __('Name is required'),
        ]);

        $obj = FunFactElement::where('id',$id)->first();
        $obj->icon = $request->icon;
        $obj->number = $request->number;
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function element_delete(Request $request,$id) 
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = FunFactElement::where('id',$id)->first();
        $obj->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }
}
