<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Admin;
use App\Models\User;
use App\Mail\Websitemail;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Slider;
use App\Models\Faq;
use App\Models\Subscriber;
use App\Models\PricingPlan;
use App\Models\CustomPage;
use App\Models\Marquee;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_post_categories = PostCategory::count();
        $total_posts = Post::count();
        $total_testimonials = Testimonial::count();
        $total_team_members = TeamMember::count();
        $total_services = Service::count();
        $total_portfolios = Portfolio::count();
        $total_sliders = Slider::count();
        $total_faqs = Faq::count();
        $total_subscribers = Subscriber::where('status',1)->count();
        $total_pricing_plans = PricingPlan::count();
        $total_custom_pages = CustomPage::count();
        $total_marquees = Marquee::count();
        return view('admin.dashboard', compact('total_posts', 'total_post_categories', 'total_testimonials', 'total_team_members', 'total_services', 'total_portfolios', 'total_sliders', 'total_faqs', 'total_subscribers', 'total_pricing_plans', 'total_custom_pages', 'total_marquees'));
    }

    public function login()
    {
        if(Auth::guard('admin')->user()) {
            return redirect()->route('admin_dashboard');
        }
        return view('admin.auth.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/'],
            'password' => ['required'],
        ], [
            'email.required' => __('Email is required'),
            'email.regex' => __('Email is invalid'),
            'password.required' => __('Password is required')
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password']
        ];
        
        if(Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin_dashboard')->with('success', __('Login is successful'));
        } else {
            return redirect()->route('admin_login')->with('error', __('Incorrect Information. Please try again.'));
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success', __('Logout is successful'));
    }

    public function forget_password()
    {
        if(Auth::guard('admin')->user()) {
            return redirect()->route('admin_dashboard');
        }
        return view('admin.auth.forget-password');
    }

    public function forget_password_submit(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'email' => ['required', 'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/'],
        ], [
            'email.required' => __('Email is required'),
            'email.regex' => __('Email is invalid')
        ]);

        $admin = Admin::where('email',$request->email)->first();
        if(!$admin) {
            return redirect()->back()->with('error', __('Email not found'));
        }

        $token = hash('sha256',time());
        $admin->token = $token;
        $admin->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = "Password Reset";
        $message = "Click in the following link to reset password<br>";
        $message .= "<a href='".$reset_link."'>Click here and verify</a>";

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', __('Forget Password Submit'));
    }

    public function reset_password($token,$email)
    {
        if(Auth::guard('admin')->user()) {
            return redirect()->route('admin_dashboard');
        }
        $admin = Admin::where('email',$email)->where('token',$token)->first();
        if(!$admin) {
            return redirect()->route('admin_login');
        }
        return view('admin.auth.reset-password', compact('token','email'));
    }

    public function reset_password_submit(Request $request, $token, $email)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'password' => ['required'],
            'password_confirmation' => ['required','same:password'],
        ], [
            'password.required' => __('Password is required'),
            'password_confirmation.required' => __('Confirm Password is required'),
            'password_confirmation.same' => __('Passwords do not match'),
        ]);

        $admin = Admin::where('email',$request->email)->where('token',$request->token)->first();
        $admin->password = Hash::make($request->password);
        $admin->token = "";
        $admin->update();

        return redirect()->route('admin_login')->with('success', __('Reset Password Success'));
    }

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function profile_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/'],
        ], [
            'name.required' => __('Name is required'),
            'email.required' => __('Email is required'),
            'email.regex' => __('Email is invalid')
        ]);

        $admin = Admin::find(Auth::guard('admin')->user()->id);
        if($request->password != '' || $request->password_confirmation != '') {
            $request->validate([
                'password' => ['required'],
                'password_confirmation' => ['required','same:password'],
            ],[
                'password.required' => __('Password is required'),
                'password_confirmation.required' => __('Confirm Password is required'),
                'password_confirmation.same' => __('Passwords do not match'),
            ]);
            $admin->password = Hash::make($request->password);
        }

        if($request->photo != null) {
            $request->validate([
                'photo' => ['required','mimes:jpeg,png,gif'],
            ],[
                'photo.required' => __('Photo is required'),
                'photo.mimes' => __('Photo must be jpeg, png, jpg or gif')
            ]);
            if($admin->photo) {
                unlink(public_path('uploads/'.$admin->photo));
            }
            $final_name = 'admin_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $admin->photo = $final_name;
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

}
