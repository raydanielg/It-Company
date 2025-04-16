<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherPageItem;
use App\Models\CustomPage;
use Illuminate\Validation\Rule;

class AdminOtherPageItemController extends Controller
{
    public function index()
    {
        $other_page_items = OtherPageItem::where('id',1)->first();
        $custom_pages = CustomPage::orderBy('id','asc')->get();
        return view('admin.other_page.index', compact('other_page_items','custom_pages'));
    }

    public function about_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'page_about_service_how_many' => ['numeric'],
            'page_about_team_members_how_many' => ['numeric'],
        ],[
            'page_about_service_how_many.numeric' => __('The service how many must be a number'),
            'page_about_team_members_how_many.numeric' => __('The team member how many must be a number'),
        ]);

        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_about_title = $request->page_about_title;
        $obj->page_about_welcome_status = $request->page_about_welcome_status;
        $obj->page_about_service_heading = $request->page_about_service_heading;
        $obj->page_about_service_subheading = $request->page_about_service_subheading;
        $obj->page_about_service_text = $request->page_about_service_text;
        $obj->page_about_service_how_many = (int)$request->page_about_service_how_many;
        $obj->page_about_service_status = $request->page_about_service_status;
        $obj->page_about_team_members_heading = $request->page_about_team_members_heading;
        $obj->page_about_team_members_subheading = $request->page_about_team_members_subheading;
        $obj->page_about_team_members_how_many = (int)$request->page_about_team_members_how_many;
        $obj->page_about_team_members_status = $request->page_about_team_members_status;
        $obj->page_about_seo_title = $request->page_about_seo_title;
        $obj->page_about_seo_meta_description = $request->page_about_seo_meta_description;
        
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function team_member_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_team_members_title = $request->page_team_members_title;
        $obj->page_team_members_seo_title = $request->page_team_members_seo_title;
        $obj->page_team_members_seo_meta_description = $request->page_team_members_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function testimonial_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_testimonials_title = $request->page_testimonials_title;
        $obj->page_testimonials_seo_title = $request->page_testimonials_seo_title;
        $obj->page_testimonials_seo_meta_description = $request->page_testimonials_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function pricing_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_pricing_title = $request->page_pricing_title;
        $obj->page_pricing_seo_title = $request->page_pricing_seo_title;
        $obj->page_pricing_seo_meta_description = $request->page_pricing_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function faq_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_faq_title = $request->page_faq_title;
        $obj->page_faq_seo_title = $request->page_faq_seo_title;
        $obj->page_faq_seo_meta_description = $request->page_faq_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function services_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_services_title = $request->page_services_title;
        $obj->page_services_seo_title = $request->page_services_seo_title;
        $obj->page_services_seo_meta_description = $request->page_services_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function portfolios_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_portfolios_title = $request->page_portfolios_title;
        $obj->page_portfolios_seo_title = $request->page_portfolios_seo_title;
        $obj->page_portfolios_seo_meta_description = $request->page_portfolios_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function blog_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_blog_title = $request->page_blog_title;
        $obj->page_blog_seo_title = $request->page_blog_seo_title;
        $obj->page_blog_seo_meta_description = $request->page_blog_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function contact_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_contact_title = $request->page_contact_title;
        $obj->page_contact_send_mail_heading = $request->page_contact_send_mail_heading;
        $obj->page_contact_send_mail_subheading = $request->page_contact_send_mail_subheading;
        $obj->page_contact_info_heading = $request->page_contact_info_heading;
        $obj->page_contact_info_subheading = $request->page_contact_info_subheading;
        $obj->page_contact_info_text = $request->page_contact_info_text;
        $obj->page_contact_info_phone_title = $request->page_contact_info_phone_title;
        $obj->page_contact_info_phone_value = $request->page_contact_info_phone_value;
        $obj->page_contact_info_email_title = $request->page_contact_info_email_title;
        $obj->page_contact_info_email_value = $request->page_contact_info_email_value;
        $obj->page_contact_info_address_title = $request->page_contact_info_address_title;
        $obj->page_contact_info_address_value = $request->page_contact_info_address_value;
        $obj->page_contact_seo_title = $request->page_contact_seo_title;
        $obj->page_contact_seo_meta_description = $request->page_contact_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function terms_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_terms_title = $request->page_terms_title;
        $obj->page_terms_content = $request->page_terms_content;
        $obj->page_terms_seo_title = $request->page_terms_seo_title;
        $obj->page_terms_seo_meta_description = $request->page_terms_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function privacy_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_privacy_title = $request->page_privacy_title;
        $obj->page_privacy_content = $request->page_privacy_content;
        $obj->page_privacy_seo_title = $request->page_privacy_seo_title;
        $obj->page_privacy_seo_meta_description = $request->page_privacy_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function search_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_search_seo_title = $request->page_search_seo_title;
        $obj->page_search_seo_meta_description = $request->page_search_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function tag_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = OtherPageItem::where('id', 1)->first();
        $obj->page_tag_seo_title = $request->page_tag_seo_title;
        $obj->page_tag_seo_meta_description = $request->page_tag_seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function custom_page_store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'name' => ['required', 'unique:custom_pages'],
            'slug' => ['required', 'alpha_dash', 'unique:custom_pages'],
            'content' => ['required']
        ],[
            'name.required' => __('Name is required'),
            'name.unique' => __('Name already exists'),
            'slug.required' => __('Slug is required'),
            'slug.alpha_dash' =>  __('Slug can contain only letters, numbers, hyphens, and underscores'),
            'slug.unique' => __('Slug already exists'),
            'content.required' => __('Content is required')
        ]);

        $obj = new CustomPage();
        $obj->name = $request->name;
        $obj->slug = strtolower($request->slug);
        $obj->content = $request->content;
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->save();

        return redirect()->back()->with('success', __('Data is added successfully'));
    }

    public function custom_page_update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = CustomPage::find($id);
        $request->validate([
            'name' => ['required', Rule::unique('custom_pages')->ignore($id)],
            'slug' => ['required', 'alpha_dash', Rule::unique('custom_pages')->ignore($id)],
            'content' => ['required']
        ],[
            'name.required' => __('Name is required'),
            'name.unique' => __('Name already exists'),
            'slug.required' => __('Slug is required'),
            'slug.alpha_dash' =>  __('Slug can contain only letters, numbers, hyphens, and underscores'),
            'slug.unique' => __('Slug already exists'),
            'content.required' => __('Content is required')
        ]);
        $obj->name = $request->name;
        $obj->slug = strtolower($request->slug);
        $obj->content = $request->content;
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function custom_page_destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = CustomPage::find($id);
        $obj->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }
}
