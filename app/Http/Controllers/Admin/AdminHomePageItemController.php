<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeOnePageItem;
use App\Models\HomeTwoPageItem;
use App\Models\HomeThreePageItem;
use App\Models\HomeFourPageItem;
use App\Models\HomeContactPhoto;

class AdminHomePageItemController extends Controller
{
    public function home1()
    {
        $page_data = HomeOnePageItem::where('id', 1)->first();
        return view('admin.home_pages.home1', compact('page_data'));
    }

    public function home1_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'service_on_slider_how_many' => ['numeric'],
            'service_how_many' => ['numeric'],
            'portfolio_how_many' => ['numeric'],
            'blog_how_many' => ['numeric']
        ],[
            'service_on_slider_how_many.numeric' => __('The service on slider how many must be a number'),
            'service_how_many.numeric' => __('The service how many must be a number'),
            'portfolio_how_many.numeric' => __('The portfolio how many must be a number'),
            'blog_how_many.numeric' => __('The blog how many must be a number'),
        ]);

        $obj = HomeOnePageItem::where('id', 1)->first();
        $obj->service_on_slider_how_many = (int)$request->service_on_slider_how_many;
        $obj->service_on_slider_status = $request->service_on_slider_status;
        $obj->welcome_status = $request->welcome_status;
        $obj->service_heading = $request->service_heading;
        $obj->service_subheading = $request->service_subheading;
        $obj->service_how_many = (int)$request->service_how_many;
        $obj->service_status = $request->service_status;
        $obj->video_one_status = $request->video_one_status;
        $obj->fun_fact_status = $request->fun_fact_status;
        $obj->portfolio_heading = $request->portfolio_heading;
        $obj->portfolio_subheading = $request->portfolio_subheading;
        $obj->portfolio_how_many = (int)$request->portfolio_how_many;
        $obj->portfolio_status = $request->portfolio_status;
        $obj->contact_heading = $request->contact_heading;
        $obj->contact_subheading = $request->contact_subheading;
        $obj->contact_status = $request->contact_status;
        $obj->blog_heading = $request->blog_heading;
        $obj->blog_subheading = $request->blog_subheading;
        $obj->blog_how_many = (int)$request->blog_how_many;
        $obj->blog_status = $request->blog_status;
        $obj->video_two_status = $request->video_two_status;
        $obj->feature_status = $request->feature_status;
        $obj->testimonial_heading = $request->testimonial_heading;
        $obj->testimonial_subheading = $request->testimonial_subheading;
        $obj->testimonial_text = $request->testimonial_text;
        $obj->testimonial_status = $request->testimonial_status;
        $obj->why_choose_status = $request->why_choose_status;
        $obj->client_status = $request->client_status;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function home2()
    {
        $page_data = HomeTwoPageItem::where('id', 1)->first();
        return view('admin.home_pages.home2', compact('page_data'));
    }

    public function home2_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'service_how_many' => ['numeric'],
            'portfolio_how_many' => ['numeric'],
            'team_member_how_many' => ['numeric'],
            'blog_how_many' => ['numeric'],
        ],[
            'service_how_many.numeric' => __('The service how many must be a number'),
            'portfolio_how_many.numeric' => __('The portfolio how many must be a number'),
            'team_member_how_many.numeric' => __('The team member how many must be a number'),
            'blog_how_many.numeric' => __('The blog how many must be a number'),
        ]);
        
        $obj = HomeTwoPageItem::where('id', 1)->first();
        $obj->service_heading = $request->service_heading;
        $obj->service_subheading = $request->service_subheading;
        $obj->service_how_many = (int)$request->service_how_many;
        $obj->service_status = $request->service_status;
        $obj->marquee_status = $request->marquee_status;
        $obj->welcome_status = $request->welcome_status;
        $obj->portfolio_heading = $request->portfolio_heading;
        $obj->portfolio_subheading = $request->portfolio_subheading;
        $obj->portfolio_how_many = (int)$request->portfolio_how_many;
        $obj->portfolio_status = $request->portfolio_status;
        $obj->why_choose_status = $request->why_choose_status;
        $obj->testimonial_heading = $request->testimonial_heading;
        $obj->testimonial_subheading = $request->testimonial_subheading;
        $obj->testimonial_text = $request->testimonial_text;
        $obj->testimonial_status = $request->testimonial_status;
        $obj->team_member_heading = $request->team_member_heading;
        $obj->team_member_subheading = $request->team_member_subheading;
        $obj->team_member_how_many = (int)$request->team_member_how_many;
        $obj->team_member_status = $request->team_member_status;
        $obj->client_status = $request->client_status;
        $obj->contact_heading = $request->contact_heading;
        $obj->contact_subheading = $request->contact_subheading;
        $obj->contact_status = $request->contact_status;
        $obj->blog_heading = $request->blog_heading;
        $obj->blog_subheading = $request->blog_subheading;
        $obj->blog_how_many = (int)$request->blog_how_many;
        $obj->blog_status = $request->blog_status;
        $obj->map_status = $request->map_status;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function home3()
    {
        $page_data = HomeThreePageItem::where('id', 1)->first();
        return view('admin.home_pages.home3', compact('page_data'));
    }

    public function home3_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'service_how_many' => ['numeric'],
            'portfolio_how_many' => ['numeric'],
            'team_member_how_many' => ['numeric'],
        ],[
            'service_how_many.numeric' => __('The service how many must be a number'),
            'portfolio_how_many.numeric' => __('The portfolio how many must be a number'),
            'team_member_how_many.numeric' => __('The team member how many must be a number'),
        ]);
        
        $obj = HomeThreePageItem::where('id', 1)->first();
        $obj->service_how_many = (int)$request->service_how_many;
        $obj->service_status = $request->service_status;
        $obj->welcome_status = $request->welcome_status;
        $obj->offer_status = $request->offer_status;
        $obj->portfolio_heading = $request->portfolio_heading;
        $obj->portfolio_subheading = $request->portfolio_subheading;
        $obj->portfolio_how_many = (int)$request->portfolio_how_many;
        $obj->portfolio_text = $request->portfolio_text;
        $obj->portfolio_status = $request->portfolio_status;
        $obj->video_status = $request->video_status;
        $obj->feature_status = $request->feature_status;
        $obj->call_to_action_status = $request->call_to_action_status;
        $obj->client_status = $request->client_status;
        $obj->team_member_heading = $request->team_member_heading;
        $obj->team_member_subheading = $request->team_member_subheading;
        $obj->team_member_how_many = (int)$request->team_member_how_many;
        $obj->team_member_status = $request->team_member_status;
        $obj->contact_heading = $request->contact_heading;
        $obj->contact_subheading = $request->contact_subheading;
        $obj->contact_status = $request->contact_status;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function home4()
    {
        $page_data = HomeFourPageItem::where('id', 1)->first();
        return view('admin.home_pages.home4', compact('page_data'));
    }

    public function home4_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'service_how_many' => ['numeric'],
            'portfolio_how_many' => ['numeric'],
            'team_member_how_many' => ['numeric'],
            'blog_how_many' => ['numeric'],
        ],[
            'service_how_many.numeric' => __('The service how many must be a number'),
            'portfolio_how_many.numeric' => __('The portfolio how many must be a number'),
            'team_member_how_many.numeric' => __('The team member how many must be a number'),
            'blog_how_many.numeric' => __('The blog how many must be a number'),
        ]);
        
        $obj = HomeFourPageItem::where('id', 1)->first();
        $obj->service_heading = $request->service_heading;
        $obj->service_subheading = $request->service_subheading;
        $obj->service_how_many = (int)$request->service_how_many;
        $obj->service_status = $request->service_status;
        $obj->marquee_status = $request->marquee_status;
        $obj->welcome_status = $request->welcome_status;
        $obj->portfolio_heading = $request->portfolio_heading;
        $obj->portfolio_subheading = $request->portfolio_subheading;
        $obj->portfolio_how_many = (int)$request->portfolio_how_many;
        $obj->portfolio_status = $request->portfolio_status;
        $obj->why_choose_status = $request->why_choose_status;
        $obj->testimonial_heading = $request->testimonial_heading;
        $obj->testimonial_subheading = $request->testimonial_subheading;
        $obj->testimonial_text = $request->testimonial_text;
        $obj->testimonial_status = $request->testimonial_status;
        $obj->team_member_heading = $request->team_member_heading;
        $obj->team_member_subheading = $request->team_member_subheading;
        $obj->team_member_how_many = (int)$request->team_member_how_many;
        $obj->team_member_status = $request->team_member_status;
        $obj->client_status = $request->client_status;
        $obj->contact_heading = $request->contact_heading;
        $obj->contact_subheading = $request->contact_subheading;
        $obj->contact_status = $request->contact_status;
        $obj->blog_heading = $request->blog_heading;
        $obj->blog_subheading = $request->blog_subheading;
        $obj->blog_how_many = (int)$request->blog_how_many;
        $obj->blog_status = $request->blog_status;
        $obj->map_status = $request->map_status;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function contact_photo()
    {
        $page_data = HomeContactPhoto::where('id', 1)->first();
        return view('admin.home_pages.contact_photo', compact('page_data'));
    }

    public function contact_photo_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = HomeContactPhoto::find(1);
        
        if($request->home_1_contact_photo != null) {
            $request->validate([
                'home_1_contact_photo' => ['mimes:jpeg,png,gif'],
            ],[
                'home_1_contact_photo.mimes' => __('Photo 1 must be jpeg, png, jpg or gif'),
            ]);
            if($obj->home_1_contact_photo) {
                unlink(public_path('uploads/'.$obj->home_1_contact_photo));
            }
            $final_name = 'home_1_contact_'.time().'.'.$request->home_1_contact_photo->extension();
            $request->home_1_contact_photo->move(public_path('uploads'), $final_name);
            $obj->home_1_contact_photo = $final_name;
        }

        if($request->home_2_contact_photo != null) {
            $request->validate([
                'home_2_contact_photo' => ['mimes:jpeg,png,gif'],
            ],[
                'home_2_contact_photo.mimes' => __('Photo 2 must be jpeg, png, jpg or gif'),
            ]);
            if($obj->home_2_contact_photo) {
                unlink(public_path('uploads/'.$obj->home_2_contact_photo));
            }
            $final_name = 'home_2_contact_'.time().'.'.$request->home_2_contact_photo->extension();
            $request->home_2_contact_photo->move(public_path('uploads'), $final_name);
            $obj->home_2_contact_photo = $final_name;
        }


        if($request->home_3_contact_photo != null) {
            $request->validate([
                'home_3_contact_photo' => ['mimes:jpeg,png,gif'],
            ],[
                'home_3_contact_photo.mimes' => __('Photo 3 must be jpeg, png, jpg or gif'),
            ]);
            if($obj->home_3_contact_photo) {
                unlink(public_path('uploads/'.$obj->home_3_contact_photo));
            }
            $final_name = 'home_3_contact_'.time().'.'.$request->home_3_contact_photo->extension();
            $request->home_3_contact_photo->move(public_path('uploads'), $final_name);
            $obj->home_3_contact_photo = $final_name;
        }

        if($request->home_4_contact_photo != null) {
            $request->validate([
                'home_4_contact_photo' => ['mimes:jpeg,png,gif'],
            ],[
                'home_4_contact_photo.mimes' => __('Photo 4 must be jpeg, png, jpg or gif'),
            ]);
            if($obj->home_4_contact_photo) {
                unlink(public_path('uploads/'.$obj->home_4_contact_photo));
            }
            $final_name = 'home_4_contact_'.time().'.'.$request->home_4_contact_photo->extension();
            $request->home_4_contact_photo->move(public_path('uploads'), $final_name);
            $obj->home_4_contact_photo = $final_name;
        }
        
        $obj->update();

        return redirect()->route('admin_home_contact_photo_index')->with('success', __('Data is updated successfully'));
    }
}
