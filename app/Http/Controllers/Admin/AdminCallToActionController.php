<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CallToAction;
use App\Models\FlatIcon;

class AdminCallToActionController extends Controller
{
    public function index()
    {
        $call_to_action = CallToAction::where('id',1)->first();
        $icons = FlatIcon::orderBy('icon_code','asc')->get();
        return view('admin.call_to_action.index', compact('call_to_action', 'icons'));
    }

    public function update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = CallToAction::where('id',1)->first();
        $obj->text = $request->text;
        $obj->icon = $request->icon;
        $obj->phone = $request->phone;
        $obj->email = $request->email;
        $obj->save();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }
}
