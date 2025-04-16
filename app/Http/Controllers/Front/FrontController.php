<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Mail\Websitemail;
use App\Models\User;
use App\Models\Admin;
use App\Models\Slider;
use App\Models\Service;
use App\Models\ServiceFaq;
use App\Models\Setting;
use App\Models\Portfolio;
use App\Models\TeamMember;
use App\Models\TeamMemberExperience;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\CustomPage;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PricingPlan;
use App\Models\WelcomeOneItem;
use App\Models\WelcomeOneItemElement;
use App\Models\WelcomeTwoItem;
use App\Models\WelcomeTwoItemElement;
use App\Models\WelcomeTwoItemSkill;
use App\Models\VideoOneItem;
use App\Models\VideoTwoItem;
use App\Models\FunFact;
use App\Models\FunFactElement;
use App\Models\FeatureOneItem;
use App\Models\FeatureOneItemElement;
use App\Models\FeatureTwoItem;
use App\Models\FeatureTwoItemElement;
use App\Models\CallToAction;
use App\Models\WhyChooseOneItem;
use App\Models\WhyChooseOneItemElement;
use App\Models\WhyChooseTwoItem;
use App\Models\WhyChooseTwoItemElement;
use App\Models\Marquee;
use App\Models\Offer;
use App\Models\OfferElement;
use App\Models\Client;
use App\Models\Subscriber;
use App\Models\HomeOnePageItem;
use App\Models\HomeTwoPageItem;
use App\Models\HomeThreePageItem;
use App\Models\HomeFourPageItem;
use App\Models\HomeContactPhoto;
use App\Models\Language;

class FrontController extends Controller
{
    protected $sliders;
    protected $services;
    protected $portfolios;
    protected $testimonials;
    protected $posts;
    protected $welcome_one_items;
    protected $welcome_one_item_elements;
    protected $welcome_two_items;
    protected $welcome_two_item_elements;
    protected $welcome_two_item_skills;
    protected $video_one_items;
    protected $video_two_items;
    protected $fun_facts;
    protected $fun_fact_elements;
    protected $feature_one_items;
    protected $feature_one_item_elements;
    protected $feature_two_items;
    protected $feature_two_item_elements;
    protected $call_to_action;
    protected $why_choose_one_items;
    protected $why_choose_one_item_elements;
    protected $why_choose_two_items;
    protected $why_choose_two_item_elements;
    protected $marquees;
    protected $offers;
    protected $offer_elements;
    protected $clients;
    protected $home_contact_photos;

    public function __construct()
    {
        $this->sliders = Slider::get();
        $this->services = Service::orderBy('id','asc')->get();
        $this->portfolios = Portfolio::orderBy('id','asc')->get();
        $this->testimonials = Testimonial::orderBy('id','asc')->get();
        $this->posts = Post::orderBy('id','desc')->get();
        $this->team_members = TeamMember::orderBy('id','asc')->get();
        $this->welcome_one_items = WelcomeOneItem::where('id',1)->first();
        $this->welcome_one_item_elements = WelcomeOneItemElement::get();
        $this->welcome_two_items = WelcomeTwoItem::where('id',1)->first();
        $this->welcome_two_item_elements = WelcomeTwoItemElement::get();
        $this->welcome_two_item_skills = WelcomeTwoItemSkill::get();
        $this->video_one_items = VideoOneItem::where('id',1)->first();
        $this->video_two_items = VideoTwoItem::where('id',1)->first();
        $this->fun_facts = FunFact::where('id',1)->first();
        $this->fun_fact_elements = FunFactElement::get();
        $this->feature_one_items = FeatureOneItem::where('id',1)->first();
        $this->feature_one_item_elements = FeatureOneItemElement::get();
        $this->feature_two_items = FeatureTwoItem::where('id',1)->first();
        $this->feature_two_item_elements = FeatureTwoItemElement::get();
        $this->call_to_action = CallToAction::where('id',1)->first();
        $this->why_choose_one_items = WhyChooseOneItem::where('id',1)->first();
        $this->why_choose_one_item_elements = WhyChooseOneItemElement::get();
        $this->why_choose_two_items = WhyChooseTwoItem::where('id',1)->first();
        $this->why_choose_two_item_elements = WhyChooseTwoItemElement::get();
        $this->marquees = Marquee::get();
        $this->offers = Offer::where('id',1)->first();
        $this->offer_elements = OfferElement::get();
        $this->clients = Client::get();
        $this->home_1_page_items = HomeOnePageItem::where('id',1)->first();
        $this->home_2_page_items = HomeTwoPageItem::where('id',1)->first();
        $this->home_3_page_items = HomeThreePageItem::where('id',1)->first();
        $this->home_4_page_items = HomeFourPageItem::where('id',1)->first();
        $this->home_contact_photos = HomeContactPhoto::where('id',1)->first();
    }
    private function home_data()
    {
        return [
            'sliders' => $this->sliders, 
            'services' => $this->services,
            'portfolios' => $this->portfolios,
            'testimonials' => $this->testimonials,
            'posts' => $this->posts,
            'team_members' => $this->team_members,
            'welcome_one_items' => $this->welcome_one_items,
            'welcome_one_item_elements' => $this->welcome_one_item_elements,
            'welcome_two_items' => $this->welcome_two_items,
            'welcome_two_item_elements' => $this->welcome_two_item_elements,
            'welcome_two_item_skills' => $this->welcome_two_item_skills,
            'video_one_items' => $this->video_one_items,
            'video_two_items' => $this->video_two_items,
            'fun_facts' => $this->fun_facts,
            'fun_fact_elements' => $this->fun_fact_elements,
            'feature_one_items' => $this->feature_one_items,
            'feature_one_item_elements' => $this->feature_one_item_elements,
            'feature_two_items' => $this->feature_two_items,
            'feature_two_item_elements' => $this->feature_two_item_elements,
            'call_to_action' => $this->call_to_action,
            'why_choose_one_items' => $this->why_choose_one_items,
            'why_choose_one_item_elements' => $this->why_choose_one_item_elements,
            'why_choose_two_items' => $this->why_choose_two_items,
            'why_choose_two_item_elements' => $this->why_choose_two_item_elements,
            'marquees' => $this->marquees,
            'offers' => $this->offers,
            'offer_elements' => $this->offer_elements,
            'clients' => $this->clients,
            'home_1_page_items' => $this->home_1_page_items,
            'home_2_page_items' => $this->home_2_page_items,
            'home_3_page_items' => $this->home_3_page_items,
            'home_4_page_items' => $this->home_4_page_items,
            'home_contact_photos' => $this->home_contact_photos,
        ];
    }

    public function home()
    {
        $setting = Setting::find(1);
        if($setting->home_show == 'Home 1') {
            return view('front.home-1', $this->home_data());
        } elseif($setting->home_show == 'Home 2') {
            return view('front.home-2', $this->home_data());
        } elseif($setting->home_show == 'Home 3') {
            return view('front.home-3', $this->home_data());
        } elseif($setting->home_show == 'Home 4') {
            return view('front.home-4', $this->home_data());
        } else {
            return view('front.home-1', $this->home_data());
        }
    }

    public function home_1()
    {
        return view('front.home-1', $this->home_data());
    }
    public function home_2()
    {
        return view('front.home-2', $this->home_data());
    }
    public function home_3()
    {
        return view('front.home-3', $this->home_data());
    }
    public function home_4()
    {
        return view('front.home-4', $this->home_data());
    }

    public function about()
    {
        $services = Service::orderBy('name','asc')->get();
        $team_members = TeamMember::orderBy('id','asc')->get();
        $welcome_one_items = WelcomeOneItem::where('id',1)->first();
        $welcome_one_item_elements = WelcomeOneItemElement::get();
        return view('front.about', compact('services', 'team_members', 'welcome_one_items', 'welcome_one_item_elements'));
    }

    public function services()
    {
        $services = Service::orderBy('name','asc')->get();
        return view('front.services', compact('services'));
    }

    public function service($slug)
    {
        $services = Service::orderBy('name','asc')->get();
        $service = Service::where('slug',$slug)->first();
        $faqs = ServiceFaq::where('service_id',$service->id)->get();
        return view('front.service', compact('services', 'service', 'faqs'));
    }

    public function portfolios()
    {
        $portfolios = Portfolio::orderBy('name','asc')->get();
        return view('front.portfolios', compact('portfolios'));
    }

    public function portfolio($slug)
    {
        $portfolios = Portfolio::orderBy('name','asc')->get();
        $portfolio = Portfolio::where('slug',$slug)->first();

        $next = Portfolio::where('id','>',$portfolio->id)->orderBy('id')->first();
        if($next) {
            $next_slug = $next->slug;
        } else {
            $next_slug = '';
        }

        $previous = Portfolio::where('id','<',$portfolio->id)->orderBy('id', 'desc')->first();
        if($previous) {
            $previous_slug = $previous->slug;
        } else {
            $previous_slug = '';
        }

        return view('front.portfolio', compact('portfolios', 'portfolio', 'next_slug', 'previous_slug'));
    }

    public function team_members()
    {
        $team_members = TeamMember::orderBy('id','asc')->get();
        return view('front.team_members', compact('team_members'));
    }

    public function team_member($slug)
    {
        $team_member = TeamMember::where('slug',$slug)->first();
        $experiences = TeamMemberExperience::where('team_member_id',$team_member->id)->get();
        return view('front.team_member', compact('team_member', 'experiences'));
    }

    public function team_member_send_message(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'name.required' => __('Name is required'),
            'email.required' => __('Email is required'),
            'email.email' => __('Email is invalid'),
            'subject.required' => __('Subject is required'),
            'message.required' => __('Message is required'),
        ]);

        $setting = Setting::where('id', 1)->first();
        if($setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ], [
                'g-recaptcha-response.required' => __('Please check the reCAPTCHA box')
            ]);
        }

        $subject = "Team Page Message";
        $message = "<b>Name:</b><br>".strip_tags($request->name)."<br><br>";
        $message .= "<b>Email:</b><br>".strip_tags($request->email)."<br><br>";
        $message .= "<b>Subject:</b><br>".strip_tags($request->subject)."<br><br>";
        $message .= "<b>Message:</b><br>".strip_tags($request->message)."<br><br>";

        \Mail::to($request->team_member_email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', __('Message sent successfully'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::orderBy('id','asc')->get();
        return view('front.testimonials', compact('testimonials'));
    }

    public function faqs()
    {
        $faqs = Faq::orderBy('id','asc')->get();
        return view('front.faqs', compact('faqs'));
    }

    public function page($slug)
    {
        $custom_page = CustomPage::where('slug',$slug)->first();
        return view('front.custom_page', compact('custom_page'));
    }

    public function blog()
    {
        $posts = Post::orderBy('id','desc')->paginate(15);
        return view('front.blog', compact('posts'));
    }

    public function post($slug)
    {
        $latest_posts = Post::orderBy('id','desc')->take(5)->get();
        $post = Post::where('slug',$slug)->first();
        if($post == null) {
            return redirect()->route('home');
        }
        $post_categories = PostCategory::orderBy('name', 'asc')->get();
        if($post->tags!='') {
            $post_tags = explode(',', $post->tags);
        } else {
            $post_tags = [];
        }
        $tags = Post::pluck('tags')->flatMap(function ($item) {
            return explode(',', $item);
        })->unique()->values();
        return view('front.post', compact('latest_posts', 'post', 'post_categories', 'tags', 'post_tags'));
    }

    public function category($slug)
    {
        $post_category = PostCategory::where('slug', $slug)->first();
        $posts = Post::where('post_category_id', $post_category->id)->paginate(15);
        return view('front.category', compact('posts', 'post_category'));
    }

    public function tag($name)
    {
        $posts = Post::whereRaw("FIND_IN_SET(?, tags)", [$name])->paginate(15);
        $tag_name = $name;
        return view('front.tag', compact('posts', 'tag_name'));
    }

    public function search(Request $request)
    {
        $search_text = strip_tags($request->search_text);

        $posts = Post::where('title', 'like', '%' . $search_text . '%')
                ->orWhere('description', 'like', '%' . $search_text . '%')
                ->paginate(15);
        $search_by = $search_text;
        return view('front.search', compact('posts', 'search_by'));
    }

    public function pricing_plans()
    {
        $pricing_plans = PricingPlan::orderBy('id','asc')->get();
        return view('front.pricing_plans', compact('pricing_plans'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contact_send_message(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $admin_data = Admin::where('id',1)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'name.required' => __('Name is required'),
            'email.required' => __('Email is required'),
            'email.email' => __('Email is invalid'),
            'subject.required' => __('Subject is required'),
            'message.required' => __('Message is required'),
        ]);

        $setting = Setting::where('id', 1)->first();
        if($setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ], [
                'g-recaptcha-response.required' => __('Please check the reCAPTCHA box')
            ]);
        }

        $subject = "Contact Page Message";
        $message = "<b>Name:</b><br>".strip_tags($request->name)."<br><br>";
        $message .= "<b>Email:</b><br>".strip_tags($request->email)."<br><br>";
        $message .= "<b>Subject:</b><br>".strip_tags($request->subject)."<br><br>";
        $message .= "<b>Message:</b><br>".strip_tags($request->message)."<br><br>";

        \Mail::to($admin_data->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', __('Message sent successfully'));
    }

    public function subscriber_submit(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'email' => 'required|email|unique:subscribers'
        ], [
            'email.required' => __('Email is required'),
            'email.email' => __('Email is invalid'),
            'email.unique' => __('Email already exists')
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = strip_tags($request->email);
        $subscriber->token = md5(time().strip_tags($request->email));
        $subscriber->status = 0;
        $subscriber->save();

        $subject = "Subscriber Verification";
        $message = "Please verify your email address by clicking on the following link:<br><br>";
        $message .= "<a href='".route('subscriber_verify',[$request->email,$subscriber->token])."'>".route('subscriber_verify',[$request->email,$subscriber->token])."</a><br><br>";

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', __('Subscriber Submit Success'));
    }

    public function subscriber_verify($email,$token)
    {
        $subscriber = Subscriber::where('email',$email)->where('token',$token)->first();
        if($subscriber)
        {
            $subscriber->status = 1;
            $subscriber->token = '';
            $subscriber->save();
            
            return redirect()->route('home')->with('success', __('Subscriber Verify Success'));
        }
        else
        {
            return redirect()->route('home')->with('error', __('Invalid email or token'));
        }
    }

    public function terms()
    {
        return view('front.terms');
    }

    public function privacy()
    {
        return view('front.privacy');
    }

    public function language_switch(Request $request)
    {
        $language = Language::where('code',$request->code)->first();
        if($language) {
            session(['sess_lang_name' => $language->name]);
            session(['sess_lang_code' => $language->code]);
            session(['sess_lang_direction' => $language->direction]);
        }
        return redirect()->back();
    }
}
