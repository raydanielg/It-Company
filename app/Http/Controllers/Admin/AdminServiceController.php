<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceFaq;
use App\Models\FlatIcon;
use Illuminate\Validation\Rule;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id','desc')->get();
        return view('admin.service.index',compact('services'));
    }

    public function create()
    {
        $icons = FlatIcon::orderBy('icon_code','asc')->get();
        return view('admin.service.create', compact('icons'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'name' => ['required', 'unique:services'],
            'slug' => ['required', 'alpha_dash', 'unique:services'],
            'short_description' => ['required'],
            'description' => ['required'],
            'icon' => ['required'],
            'photo' => ['required','mimes:jpeg,png,gif'],
        ],[
            'name.required' => __('Name is required'),
            'name.unique' => __('Name already exists'),
            'slug.required' => __('Slug is required'),
            'slug.alpha_dash' =>  __('Slug can contain only letters, numbers, hyphens, and underscores'),
            'slug.unique' => __('Slug already exists'),
            'short_description.required' => __('Short Description is required'),
            'description.required' => __('Description is required'),
            'icon.required' => __('Icon is required'),
            'photo.required' => __('Photo is required'),
            'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
        ]);

        $service = new Service();

        if($request->banner != null) {
            $request->validate([
                'banner' => ['mimes:jpeg,png,gif'],
            ],[
                'banner.mimes' => __('Banner must be jpeg, png, jpg or gif'),
            ]);
            $final_name1 = 'service_banner_'.time().'.'.$request->banner->extension();
            $request->banner->move(public_path('uploads'), $final_name1);
            $service->banner = $final_name1;
        }

        if($request->pdf != null) {
            $request->validate([
                'pdf' => ['mimes:pdf'],
            ],[
                'pdf.mimes' => __('PDF must be pdf'),
            ]);
            $final_name2 = 'service_pdf_'.time().'.'.$request->pdf->extension();
            $request->pdf->move(public_path('uploads'), $final_name1);
            $service->pdf = $final_name2;
        }

        $final_name = 'service_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $service->photo = $final_name;

        $service->name = $request->name;
        $service->slug = strtolower($request->slug);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->phone = $request->phone;
        $service->seo_title = $request->seo_title;
        $service->seo_meta_description = $request->seo_meta_description;
        $service->save();

        return redirect()->route('admin_service_index')->with('success', __('Data is added successfully'));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        $icons = FlatIcon::orderBy('icon_code','asc')->get();
        return view('admin.service.edit', compact('service', 'icons'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $service = Service::find($id);
        $request->validate([
            'name' => ['required', Rule::unique('services')->ignore($id)],
            'slug' => ['required', 'alpha_dash', Rule::unique('services')->ignore($id)],
            'short_description' => ['required'],
            'description' => ['required'],
            'icon' => ['required'],
        ],[
            'name.required' => __('Name is required'),
            'name.unique' => __('Name already exists'),
            'slug.required' => __('Slug is required'),
            'slug.alpha_dash' =>  __('Slug can contain only letters, numbers, hyphens, and underscores'),
            'slug.unique' => __('Slug already exists'),
            'short_description.required' => __('Short Description is required'),
            'description.required' => __('Description is required'),
            'icon.required' => __('Icon is required'),
        ]);
        if($request->photo != null) {
            $request->validate([
                'photo' => ['mimes:jpeg,png,gif'],
            ],[
                'photo.mimes' => __('Photo must be jpeg, png, jpg or gif')
            ]);
            if($service->photo) {
                unlink(public_path('uploads/'.$service->photo));
            }
            $final_name = 'service_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $service->photo = $final_name;
        }

        if($request->banner != null) {
            $request->validate([
                'banner' => ['mimes:jpeg,png,gif'],
            ],[
                'banner.mimes' => __('Banner must be jpeg, png, jpg or gif'),
            ]);
            if($service->banner) {
                unlink(public_path('uploads/'.$service->banner));
            }
            $final_name1 = 'service_banner_'.time().'.'.$request->banner->extension();
            $request->banner->move(public_path('uploads'), $final_name1);
            $service->banner = $final_name1;
        }

        if($request->pdf != null) {
            $request->validate([
                'pdf' => ['mimes:pdf'],
            ],[
                'pdf.mimes' => __('PDF must be pdf'),
            ]);
            if($service->pdf) {
                unlink(public_path('uploads/'.$service->pdf));
            }
            $final_name2 = 'service_pdf_'.time().'.'.$request->pdf->extension();
            $request->pdf->move(public_path('uploads'), $final_name2);
            $service->pdf = $final_name2;
        }

        $service->name = $request->name;
        $service->slug = strtolower($request->slug);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->phone = $request->phone;
        $service->seo_title = $request->seo_title;
        $service->seo_meta_description = $request->seo_meta_description;
        $service->update();

        return redirect()->route('admin_service_index')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $service = Service::find($id);
        if($service->photo) {
            unlink(public_path('uploads/'.$service->photo));
        }
        if($service->banner) {
            unlink(public_path('uploads/'.$service->banner));
        }
        if($service->pdf) {
            unlink(public_path('uploads/'.$service->pdf));
        }
        $service->delete();

        ServiceFaq::where('service_id',$id)->delete();

        return redirect()->route('admin_service_index')->with('success', __('Data is deleted successfully'));
    }

    public function destroy_banner($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $service = Service::find($id);
        unlink(public_path('uploads/'.$service->banner));
        $service->banner = null;
        $service->update();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }

    public function destroy_pdf($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $service = Service::find($id);
        unlink(public_path('uploads/'.$service->pdf));
        $service->pdf = null;
        $service->update();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }

    public function service_faq($id)
    {
        $service = Service::find($id);
        $faqs = ServiceFaq::where('service_id',$id)->orderBy('id','asc')->get();
        return view('admin.service.faq',compact('service','faqs'));
    }

    public function service_faq_store(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ],[
            'question.required' => __('Question is required'),
            'answer.required' => __('Answer is required'),
        ]);
        $faq = new ServiceFaq();
        $faq->service_id = $id;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->back()->with('success', __('Data is added successfully'));
    }

    public function service_faq_update(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $faq = ServiceFaq::find($id);
        $request->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ],[
            'question.required' => __('Question is required'),
            'answer.required' => __('Answer is required'),
        ]);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function service_faq_destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $faq = ServiceFaq::find($id);
        $faq->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }
}
