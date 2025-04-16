<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSettingController extends Controller
{
    public function general()
    {
        $setting = Setting::find(1);
        return view('admin.setting.general',compact('setting'));
    }

    public function general_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $setting = Setting::find(1);

        if($request->logo != null) {
            $request->validate([
                'logo' => ['required','mimes:jpeg,png,gif'],
            ],[
                'logo.required' => __('Logo is required'),
                'logo.mimes' => __('Logo must be jpeg, png, jpg or gif'),
            ]);
            if($setting->logo!='') {
                unlink(public_path('uploads/'.$setting->logo));
            }
            $final_name = 'logo_'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('uploads'), $final_name);
            $setting->logo = $final_name;
        }

        if($request->logo_sticky != null) {
            $request->validate([
                'logo_sticky' => ['required','mimes:jpeg,png,gif'],
            ],[
                'logo_sticky.required' => __('Sticky Logo is required'),
                'logo_sticky.mimes' => __('Sticky Logo must be jpeg, png, jpg or gif'),
            ]);
            if($setting->logo_sticky!='') {
                unlink(public_path('uploads/'.$setting->logo_sticky));
            }
            $final_name = 'logo_sticky_'.time().'.'.$request->logo_sticky->extension();
            $request->logo_sticky->move(public_path('uploads'), $final_name);
            $setting->logo_sticky = $final_name;
        }

        if($request->favicon != null) {
            $request->validate([
                'favicon' => ['required','mimes:jpeg,png,gif'],
            ],[
                'favicon.required' => __('Favicon is required'),
                'favicon.mimes' => __('Favicon must be jpeg, png, jpg or gif'),
            ]);
            if($setting->favicon!='') {
                unlink(public_path('uploads/'.$setting->favicon));
            }
            $final_name = 'favicon_'.time().'.'.$request->favicon->extension();
            $request->favicon->move(public_path('uploads'), $final_name);
            $setting->favicon = $final_name;
        }

        if($request->image_404 != null) {
            $request->validate([
                'image_404' => ['required','mimes:jpeg,png,gif'],
            ],[
                'image_404.required' => __('404 Image is required'),
                'image_404.mimes' => __('404 Image must be jpeg, png, jpg or gif')
            ]);
            if($setting->image_404!='') {
                unlink(public_path('uploads/'.$setting->image_404));
            }
            $final_name = '404_'.time().'.'.$request->image_404->extension();
            $request->image_404->move(public_path('uploads'), $final_name);
            $setting->image_404 = $final_name;
        }


        if($request->banner != null) {
            $request->validate([
                'banner' => ['required','mimes:jpeg,png,gif'],
            ],[
                'banner.required' => __('Banner is required'),
                'banner.mimes' => __('Banner must be jpeg, png, jpg or gif')
            ]);
            if($setting->banner!='') {
                unlink(public_path('uploads/'.$setting->banner));
            }
            $final_name = 'banner_'.time().'.'.$request->banner->extension();
            $request->banner->move(public_path('uploads'), $final_name);
            $setting->banner = $final_name;
        }

        if($request->login_page_photo != null) {
            $request->validate([
                'login_page_photo' => ['required','mimes:jpeg,png,gif'],
            ],[
                'login_page_photo.required' => __('Login Page Photo is required'),
                'login_page_photo.mimes' => __('Login Page Photo must be jpeg, png, jpg or gif')
            ]);
            if($setting->login_page_photo!='') {
                unlink(public_path('uploads/'.$setting->login_page_photo));
            }
            $final_name = 'login_page_photo_'.time().'.'.$request->login_page_photo->extension();
            $request->login_page_photo->move(public_path('uploads'), $final_name);
            $setting->login_page_photo = $final_name;
        }

        $setting->home_show = $request->home_show;
        $setting->home_seo_title = $request->home_seo_title;
        $setting->home_seo_meta_description = $request->home_seo_meta_description;

        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->linkedin = $request->linkedin;
        $setting->instagram = $request->instagram;
        $setting->youtube = $request->youtube;
        $setting->pinterest = $request->pinterest;
        $setting->top_bar_email = $request->top_bar_email;
        $setting->top_bar_address = $request->top_bar_address;
        $setting->top_bar_phone = $request->top_bar_phone;
        $setting->map = $request->map;
        $setting->footer_email = $request->footer_email;
        $setting->footer_phone = $request->footer_phone;
        $setting->footer_address = $request->footer_address;
        $setting->footer_copyright = $request->footer_copyright;

        $setting->footer_text = $request->footer_text;
        $setting->footer_links_heading = $request->footer_links_heading;
        $setting->footer_subscriber_heading = $request->footer_subscriber_heading;
        $setting->footer_subscriber_text = $request->footer_subscriber_text;

        $setting->sticky_header = $request->sticky_header;
        $setting->preloader = $request->preloader;
        $setting->layout_direction = $request->layout_direction;
        $setting->theme_color = $request->theme_color;
        $setting->currency_symbol = $request->currency_symbol;

        $setting->cookie_consent_message = $request->cookie_consent_message;
        $setting->cookie_consent_button_text = $request->cookie_consent_button_text;
        $setting->cookie_consent_text_color = $request->cookie_consent_text_color;
        $setting->cookie_consent_bg_color = $request->cookie_consent_bg_color;
        $setting->cookie_consent_button_text_color = $request->cookie_consent_button_text_color;
        $setting->cookie_consent_button_bg_color = $request->cookie_consent_button_bg_color;
        $setting->cookie_consent_status = $request->cookie_consent_status;

        $setting->tawk_live_chat_property_id = $request->tawk_live_chat_property_id;
        $setting->tawk_live_chat_status = $request->tawk_live_chat_status;

        $setting->google_analytic_id = $request->google_analytic_id;
        $setting->google_analytic_status = $request->google_analytic_status;

        $setting->google_recaptcha_site_key = $request->google_recaptcha_site_key;
        $setting->google_recaptcha_status = $request->google_recaptcha_status;

        $setting->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));

    }
}
