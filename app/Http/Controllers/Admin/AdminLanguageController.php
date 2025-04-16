<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\File;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminLanguageController extends Controller
{
    public function index()
    {
        $languages = Language::orderBy('id','asc')->get();
        return view('admin.language.index',compact('languages'));
    }

    public function create()
    {
        return view('admin.language.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'name' => ['required', 'unique:languages'],
            'code' => ['required', 'unique:languages']
        ],[
            'name.required' => __('Name is required'),
            'name.unique' => __('Name already exists'),
            'code.required' => __('Code is required'),
            'code.unique' => __('Code already exists')
        ]);

        $obj = new Language();
        $obj->name = $request->name;
        $obj->code = $request->code;
        $obj->direction = $request->direction;
        $obj->default = $request->default;
        $obj->save();

        if($request->default == 1) {
            // Update all other languages to default 0
            Language::where('id', '!=', $obj->id)->update(['default' => 0]);
        }

        // Create json file for this language
        $json_data_from_sample = file_get_contents(resource_path('lang/en.json'));
        file_put_contents(resource_path('lang/'.$request->code.'.json'), $json_data_from_sample);

        return redirect()->route('admin_language_index')->with('success', __('Data is added successfully'));
    }

    public function edit($id)
    {
        $language = Language::find($id);
        return view('admin.language.edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = Language::find($id);
        $request->validate([
            'name' => ['required', 'unique:languages,name,'.$id],
            'code' => ['required', 'unique:languages,code,'.$id]
        ],[
            'name.required' => __('Name is required'),
            'code.required' => __('Code is required'),
        ]);
        $obj->name = $request->name;
        $obj->code = $request->code;
        $obj->direction = $request->direction;
        $obj->default = $request->default;
        $obj->update();

        if($request->default == 1) {
            // Update all other languages to default 0
            Language::where('id', '!=', $obj->id)->update(['default' => 0]);
        } else {
            // If this language is default, then make the first language as default
            $first_language = Language::orderBy('id','asc')->first();
            $first_language->default = 1;
            $first_language->update();
        }

        return redirect()->route('admin_language_index')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        if($id == 1) {
            return redirect()->route('admin_dashboard');
        }

        $obj = Language::find($id);
        $obj->delete();

        // Delete the json file
        unlink(resource_path('lang/'.$obj->code.'.json'));

        return redirect()->route('admin_language_index')->with('success', __('Data is deleted successfully'));
    }

    public function translate($id)
    {
        $language_data = Language::find($id);
        $translation_data = json_decode(file_get_contents(resource_path('lang/'.$language_data->code.'.json')));

        return view('admin.language.translate', compact('language_data','translation_data'));
    }

    public function translate_update(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $language_data = Language::find($id);
        
        $arr_key = [];
        foreach($request->key_arr as $item) {
            $arr_key[] = $item;
        }
        $arr_value = [];
        foreach($request->value_arr as $item) {
            $arr_value[] = $item;
        }
        for($i=0;$i<count($arr_key);$i++) {
            $data[$arr_key[$i]] = $arr_value[$i];
        }

        $new_json = json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents(resource_path('lang/'.$language_data->code.'.json'), $new_json);

        return redirect()->route('admin_language_index')->with('success', __('Data is updated successfully'));
    }

    public function auto_translate($id)
    {
        $language_data = Language::find($id);
        
        $json_data_from_sample = file_get_contents(resource_path('lang/'.$language_data->code.'.json'));
        $json_data_from_sample = json_decode($json_data_from_sample, true);

        $tr = new GoogleTranslate($language_data->code);

        $new_json = [];
        foreach($json_data_from_sample as $key => $value) {
            $new_json[$key] = $tr->translate($value);
        }

        $new_json = json_encode($new_json,JSON_PRETTY_PRINT);
        file_put_contents(resource_path('lang/'.$language_data->code.'.json'), $new_json);

        return redirect()->back()->with('success', __('Auto Translation is performed successfully'));
    }

}
