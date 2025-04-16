<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminTeamMemberController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPostCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPricingPlanController;
use App\Http\Controllers\Admin\AdminWelcomeOneController;
use App\Http\Controllers\Admin\AdminWelcomeTwoController;
use App\Http\Controllers\Admin\AdminVideoOneController;
use App\Http\Controllers\Admin\AdminVideoTwoController;
use App\Http\Controllers\Admin\AdminFunFactController;
use App\Http\Controllers\Admin\AdminFeatureOneController;
use App\Http\Controllers\Admin\AdminFeatureTwoController;
use App\Http\Controllers\Admin\AdminCallToActionController;
use App\Http\Controllers\Admin\AdminWhyChooseOneController;
use App\Http\Controllers\Admin\AdminWhyChooseTwoController;
use App\Http\Controllers\Admin\AdminMarqueeController;
use App\Http\Controllers\Admin\AdminOfferController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminHomePageItemController;
use App\Http\Controllers\Admin\AdminOtherPageItemController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminTranslationController;
use App\Http\Controllers\Admin\AdminLanguageController;



Route::group(['middleware' => ['XssSanitize']], function () {

/* Front */
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/home/layout/1', [FrontController::class, 'home_1'])->name('home_1');
Route::get('/home/layout/2', [FrontController::class, 'home_2'])->name('home_2');
Route::get('/home/layout/3', [FrontController::class, 'home_3'])->name('home_3');
Route::get('/home/layout/4', [FrontController::class, 'home_4'])->name('home_4');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/services', [FrontController::class, 'services'])->name('services');
Route::get('/service/{slug}', [FrontController::class, 'service'])->name('service');
Route::get('/portfolios', [FrontController::class, 'portfolios'])->name('portfolios');
Route::get('/portfolio/{slug}', [FrontController::class, 'portfolio'])->name('portfolio');
Route::get('/team-members', [FrontController::class, 'team_members'])->name('team_members');
Route::get('/team-member/{slug}', [FrontController::class, 'team_member'])->name('team_member');
Route::post('/team-member/send-message', [FrontController::class, 'team_member_send_message'])->name('team_member_send_message');
Route::get('/testimonials', [FrontController::class, 'testimonials'])->name('testimonials');
Route::get('/faq', [FrontController::class, 'faqs'])->name('faqs');
Route::get('/page/{slug}', [FrontController::class, 'page'])->name('custom_page');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/post/{slug}', [FrontController::class, 'post'])->name('post');
Route::get('/category/{slug}', [FrontController::class, 'category'])->name('category');
Route::get('/tag/{name}', [FrontController::class, 'tag'])->name('tag');
Route::get('/search', [FrontController::class, 'search'])->name('search');
Route::get('/pricing', [FrontController::class, 'pricing_plans'])->name('pricing_plans');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::post('/contact/send-message', [FrontController::class, 'contact_send_message'])->name('contact_send_message');
Route::get('/terms-of-use', [FrontController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [FrontController::class, 'privacy'])->name('privacy');
Route::post('/subscriber-submit', [FrontController::class, 'subscriber_submit'])->name('subscriber_submit');
Route::get('/subscriber-verify/{email}/{token}', [FrontController::class, 'subscriber_verify'])->name('subscriber_verify');
Route::post('/language-switch', [FrontController::class, 'language_switch'])->name('language_switch');


/* Admin */
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin_dashboard');
    Route::get('/profile',[AdminController::class,'profile'])->name('admin_profile');
    Route::post('/profile',[AdminController::class,'profile_update'])->name('admin_profile_update');
    
    Route::get('/setting/general',[AdminSettingController::class,'general'])->name('admin_setting_general');
    Route::post('/setting/general/update',[AdminSettingController::class,'general_update'])->name('admin_setting_general_update');


    Route::get('/slider/index',[AdminSliderController::class,'index'])->name('admin_slider_index');
    Route::get('/slider/create',[AdminSliderController::class,'create'])->name('admin_slider_create');
    Route::post('/slider/store',[AdminSliderController::class,'store'])->name('admin_slider_store');
    Route::get('/slider/edit/{id}',[AdminSliderController::class,'edit'])->name('admin_slider_edit');
    Route::post('/slider/update/{id}',[AdminSliderController::class,'update'])->name('admin_slider_update');
    Route::get('/slider/destroy/{id}',[AdminSliderController::class,'destroy'])->name('admin_slider_destroy');


    Route::get('/service/index',[AdminServiceController::class,'index'])->name('admin_service_index');
    Route::get('/service/create',[AdminServiceController::class,'create'])->name('admin_service_create');
    Route::post('/service/store',[AdminServiceController::class,'store'])->name('admin_service_store');
    Route::get('/service/edit/{id}',[AdminServiceController::class,'edit'])->name('admin_service_edit');
    Route::post('/service/update/{id}',[AdminServiceController::class,'update'])->name('admin_service_update');
    Route::get('/service/destroy/{id}',[AdminServiceController::class,'destroy'])->name('admin_service_destroy');
    Route::get('/service/destroy-banner/{id}',[AdminServiceController::class,'destroy_banner'])->name('admin_service_destroy_banner');
    Route::get('/service/destroy-pdf/{id}',[AdminServiceController::class,'destroy_pdf'])->name('admin_service_destroy_pdf');
    Route::get('/service/faq/{id}',[AdminServiceController::class,'service_faq'])->name('admin_service_faq');
    Route::post('/service/faq/store/{service_id}',[AdminServiceController::class,'service_faq_store'])->name('admin_service_faq_store');
    Route::post('/service/faq/update/{faq_id}',[AdminServiceController::class,'service_faq_update'])->name('admin_service_faq_update');
    Route::get('/service/faq/destroy/{faq_id}',[AdminServiceController::class,'service_faq_destroy'])->name('admin_service_faq_destroy');


    Route::get('/portfolio/index',[AdminPortfolioController::class,'index'])->name('admin_portfolio_index');
    Route::get('/portfolio/create',[AdminPortfolioController::class,'create'])->name('admin_portfolio_create');
    Route::post('/portfolio/store',[AdminPortfolioController::class,'store'])->name('admin_portfolio_store');
    Route::get('/portfolio/edit/{id}',[AdminPortfolioController::class,'edit'])->name('admin_portfolio_edit');
    Route::post('/portfolio/update/{id}',[AdminPortfolioController::class,'update'])->name('admin_portfolio_update');
    Route::get('/portfolio/destroy/{id}',[AdminPortfolioController::class,'destroy'])->name('admin_portfolio_destroy');


    Route::get('/team-member/index',[AdminTeamMemberController::class,'index'])->name('admin_team_member_index');
    Route::get('/team-member/create',[AdminTeamMemberController::class,'create'])->name('admin_team_member_create');
    Route::post('/team-member/store',[AdminTeamMemberController::class,'store'])->name('admin_team_member_store');
    Route::get('/team-member/edit/{id}',[AdminTeamMemberController::class,'edit'])->name('admin_team_member_edit');
    Route::post('/team-member/update/{id}',[AdminTeamMemberController::class,'update'])->name('admin_team_member_update');
    Route::get('/team-member/destroy/{id}',[AdminTeamMemberController::class,'destroy'])->name('admin_team_member_destroy');
    Route::get('/team-member/experience/{id}',[AdminTeamMemberController::class,'experience'])->name('admin_team_member_experience');
    Route::post('/team-member/experience/store/{team_member_id}',[AdminTeamMemberController::class,'experience_store'])->name('admin_team_member_experience_store');
    Route::post('/team-member/experience/update/{experience_id}',[AdminTeamMemberController::class,'experience_update'])->name('admin_team_member_experience_update');
    Route::get('/team-member/experience/destroy/{experience_id}',[AdminTeamMemberController::class,'experience_destroy'])->name('admin_team_member_experience_destroy');

    Route::get('/testimonial/index',[AdminTestimonialController::class,'index'])->name('admin_testimonial_index');
    Route::get('/testimonial/create',[AdminTestimonialController::class,'create'])->name('admin_testimonial_create');
    Route::post('/testimonial/store',[AdminTestimonialController::class,'store'])->name('admin_testimonial_store');
    Route::get('/testimonial/edit/{id}',[AdminTestimonialController::class,'edit'])->name('admin_testimonial_edit');
    Route::post('/testimonial/update/{id}',[AdminTestimonialController::class,'update'])->name('admin_testimonial_update');
    Route::get('/testimonial/destroy/{id}',[AdminTestimonialController::class,'destroy'])->name('admin_testimonial_destroy');

    Route::get('/faq/index',[AdminFaqController::class,'index'])->name('admin_faq_index');
    Route::get('/faq/create',[AdminFaqController::class,'create'])->name('admin_faq_create');
    Route::post('/faq/store',[AdminFaqController::class,'store'])->name('admin_faq_store');
    Route::get('/faq/edit/{id}',[AdminFaqController::class,'edit'])->name('admin_faq_edit');
    Route::post('/faq/update/{id}',[AdminFaqController::class,'update'])->name('admin_faq_update');
    Route::get('/faq/destroy/{id}',[AdminFaqController::class,'destroy'])->name('admin_faq_destroy');


    Route::get('/language/index',[AdminLanguageController::class,'index'])->name('admin_language_index');
    Route::get('/language/create',[AdminLanguageController::class,'create'])->name('admin_language_create');
    Route::post('/language/store',[AdminLanguageController::class,'store'])->name('admin_language_store');
    Route::get('/language/edit/{id}',[AdminLanguageController::class,'edit'])->name('admin_language_edit');
    Route::post('/language/update/{id}',[AdminLanguageController::class,'update'])->name('admin_language_update');
    Route::get('/language/destroy/{id}',[AdminLanguageController::class,'destroy'])->name('admin_language_destroy');
    Route::get('/language/translate/{id}',[AdminLanguageController::class,'translate'])->name('admin_language_translate');
    Route::post('/language/translate/update/{id}',[AdminLanguageController::class,'translate_update'])->name('admin_language_translate_update');
    Route::get('/language/translate/auto/{id}',[AdminLanguageController::class,'auto_translate'])->name('admin_language_auto_translate');



    Route::get('/post-category/index',[AdminPostCategoryController::class,'index'])->name('admin_post_category_index');
    Route::get('/post-category/create',[AdminPostCategoryController::class,'create'])->name('admin_post_category_create');
    Route::post('/post-category/store',[AdminPostCategoryController::class,'store'])->name('admin_post_category_store');
    Route::get('/post-category/edit/{id}',[AdminPostCategoryController::class,'edit'])->name('admin_post_category_edit');
    Route::post('/post-category/update/{id}',[AdminPostCategoryController::class,'update'])->name('admin_post_category_update');
    Route::get('/post-category/destroy/{id}',[AdminPostCategoryController::class,'destroy'])->name('admin_post_category_destroy');

    Route::get('/post/index',[AdminPostController::class,'index'])->name('admin_post_index');
    Route::get('/post/create',[AdminPostController::class,'create'])->name('admin_post_create');
    Route::post('/post/store',[AdminPostController::class,'store'])->name('admin_post_store');
    Route::get('/post/edit/{id}',[AdminPostController::class,'edit'])->name('admin_post_edit');
    Route::post('/post/update/{id}',[AdminPostController::class,'update'])->name('admin_post_update');
    Route::get('/post/destroy/{id}',[AdminPostController::class,'destroy'])->name('admin_post_destroy');


    Route::get('/pricing-plan/index',[AdminPricingPlanController::class,'index'])->name('admin_pricing_plan_index');
    Route::get('/pricing-plan/create',[AdminPricingPlanController::class,'create'])->name('admin_pricing_plan_create');
    Route::post('/pricing-plan/store',[AdminPricingPlanController::class,'store'])->name('admin_pricing_plan_store');
    Route::get('/pricing-plan/edit/{id}',[AdminPricingPlanController::class,'edit'])->name('admin_pricing_plan_edit');
    Route::post('/pricing-plan/update/{id}',[AdminPricingPlanController::class,'update'])->name('admin_pricing_plan_update');
    Route::get('/pricing-plan/destroy/{id}',[AdminPricingPlanController::class,'destroy'])->name('admin_pricing_plan_destroy');
    Route::get('/pricing-plan/option/{id}',[AdminPricingPlanController::class,'option'])->name('admin_pricing_plan_option');
    Route::post('/pricing-plan/option/store/{option_id}',[AdminPricingPlanController::class,'option_store'])->name('admin_pricing_plan_option_store');
    Route::post('/pricing-plan/option/update/{option_id}',[AdminPricingPlanController::class,'option_update'])->name('admin_pricing_plan_option_update');
    Route::get('/pricing-plan/option/destroy/{option_id}',[AdminPricingPlanController::class,'option_destroy'])->name('admin_pricing_plan_option_destroy');


    Route::get('/welcome-one/item',[AdminWelcomeOneController::class,'item'])->name('admin_welcome_one_item');
    Route::post('/welcome-one/item/update',[AdminWelcomeOneController::class,'item_update'])->name('admin_welcome_one_item_update');
    Route::post('/welcome-one/item/element/submit',[AdminWelcomeOneController::class,'item_element_submit'])->name('admin_welcome_one_item_element_submit');
    Route::post('/welcome-one/item/element/update/{id}',[AdminWelcomeOneController::class,'item_element_update'])->name('admin_welcome_one_item_element_update');
    Route::get('/welcome-one/item/element/delete/{id}',[AdminWelcomeOneController::class,'item_element_delete'])->name('admin_welcome_one_item_element_delete');

    Route::get('/welcome-two/item',[AdminWelcomeTwoController::class,'item'])->name('admin_welcome_two_item');
    Route::post('/welcome-two/item/update',[AdminWelcomeTwoController::class,'item_update'])->name('admin_welcome_two_item_update');
    Route::post('/welcome-two/item/element/submit',[AdminWelcomeTwoController::class,'item_element_submit'])->name('admin_welcome_two_item_element_submit');
    Route::post('/welcome-two/item/element/update/{id}',[AdminWelcomeTwoController::class,'item_element_update'])->name('admin_welcome_two_item_element_update');
    Route::get('/welcome-two/item/element/delete/{id}',[AdminWelcomeTwoController::class,'item_element_delete'])->name('admin_welcome_two_item_element_delete');
    Route::post('/welcome-two/item/skill/submit',[AdminWelcomeTwoController::class,'item_skill_submit'])->name('admin_welcome_two_item_skill_submit');
    Route::post('/welcome-two/item/skill/update/{id}',[AdminWelcomeTwoController::class,'item_skill_update'])->name('admin_welcome_two_item_skill_update');
    Route::get('/welcome-two/item/skill/delete/{id}',[AdminWelcomeTwoController::class,'item_skill_delete'])->name('admin_welcome_two_item_skill_delete');

    Route::get('/video-one/item',[AdminVideoOneController::class,'item'])->name('admin_video_one_item');
    Route::post('/video-one/item/update',[AdminVideoOneController::class,'item_update'])->name('admin_video_one_item_update');

    Route::get('/video-two/item',[AdminVideoTwoController::class,'item'])->name('admin_video_two_item');
    Route::post('/video-two/item/update',[AdminVideoTwoController::class,'item_update'])->name('admin_video_two_item_update');


    Route::get('/fun-fact/index',[AdminFunFactController::class,'index'])->name('admin_fun_fact_index');
    Route::post('/fun-fact/update',[AdminFunFactController::class,'update'])->name('admin_fun_fact_update');
    Route::post('/fun-fact/element/submit',[AdminFunFactController::class,'element_submit'])->name('admin_fun_fact_element_submit');
    Route::post('/fun-fact/element/update/{id}',[AdminFunFactController::class,'element_update'])->name('admin_fun_fact_element_update');
    Route::get('/fun-fact/element/delete/{id}',[AdminFunFactController::class,'element_delete'])->name('admin_fun_fact_element_delete');


    Route::get('/feature-one/item',[AdminFeatureOneController::class,'item'])->name('admin_feature_one_item');
    Route::post('/feature-one/item/update',[AdminFeatureOneController::class,'item_update'])->name('admin_feature_one_item_update');
    Route::post('/feature-one/item/element/submit',[AdminFeatureOneController::class,'item_element_submit'])->name('admin_feature_one_item_element_submit');
    Route::post('/feature-one/item/element/update/{id}',[AdminFeatureOneController::class,'item_element_update'])->name('admin_feature_one_item_element_update');
    Route::get('/feature-one/item/element/delete/{id}',[AdminFeatureOneController::class,'item_element_delete'])->name('admin_feature_one_item_element_delete');


    Route::get('/feature-two/item',[AdminFeatureTwoController::class,'item'])->name('admin_feature_two_item');
    Route::post('/feature-two/item/update',[AdminFeatureTwoController::class,'item_update'])->name('admin_feature_two_item_update');
    Route::post('/feature-two/item/element/submit',[AdminFeatureTwoController::class,'item_element_submit'])->name('admin_feature_two_item_element_submit');
    Route::post('/feature-two/item/element/update/{id}',[AdminFeatureTwoController::class,'item_element_update'])->name('admin_feature_two_item_element_update');
    Route::get('/feature-two/item/element/delete/{id}',[AdminFeatureTwoController::class,'item_element_delete'])->name('admin_feature_two_item_element_delete');

    Route::get('/call-to-action/index',[AdminCallToActionController::class,'index'])->name('admin_call_to_action_index');
    Route::post('/call-to-action/update',[AdminCallToActionController::class,'update'])->name('admin_call_to_action_update');


    Route::get('/why-choose-one/item',[AdminWhyChooseOneController::class,'item'])->name('admin_why_choose_one_item');
    Route::post('/why-choose-one/item/update',[AdminWhyChooseOneController::class,'item_update'])->name('admin_why_choose_one_item_update');
    Route::post('/why-choose-one/item/element/submit',[AdminWhyChooseOneController::class,'item_element_submit'])->name('admin_why_choose_one_item_element_submit');
    Route::post('/why-choose-one/item/element/update/{id}',[AdminWhyChooseOneController::class,'item_element_update'])->name('admin_why_choose_one_item_element_update');
    Route::get('/why-choose-one/item/element/delete/{id}',[AdminWhyChooseOneController::class,'item_element_delete'])->name('admin_why_choose_one_item_element_delete');

    Route::get('/why-choose-two/item',[AdminWhyChooseTwoController::class,'item'])->name('admin_why_choose_two_item');
    Route::post('/why-choose-two/item/update',[AdminWhyChooseTwoController::class,'item_update'])->name('admin_why_choose_two_item_update');
    Route::post('/why-choose-two/item/element/submit',[AdminWhyChooseTwoController::class,'item_element_submit'])->name('admin_why_choose_two_item_element_submit');
    Route::post('/why-choose-two/item/element/update/{id}',[AdminWhyChooseTwoController::class,'item_element_update'])->name('admin_why_choose_two_item_element_update');
    Route::get('/why-choose-two/item/element/delete/{id}',[AdminWhyChooseTwoController::class,'item_element_delete'])->name('admin_why_choose_two_item_element_delete');

    Route::get('/marquee/index',[AdminMarqueeController::class,'index'])->name('admin_marquee_index');
    Route::get('/marquee/create',[AdminMarqueeController::class,'create'])->name('admin_marquee_create');
    Route::post('/marquee/store',[AdminMarqueeController::class,'store'])->name('admin_marquee_store');
    Route::get('/marquee/edit/{id}',[AdminMarqueeController::class,'edit'])->name('admin_marquee_edit');
    Route::post('/marquee/update/{id}',[AdminMarqueeController::class,'update'])->name('admin_marquee_update');
    Route::get('/marquee/destroy/{id}',[AdminMarqueeController::class,'destroy'])->name('admin_marquee_destroy');

    Route::get('/offer/index',[AdminOfferController::class,'index'])->name('admin_offer_index');
    Route::post('/offer/update',[AdminOfferController::class,'update'])->name('admin_offer_update');
    Route::post('/offer/element/submit',[AdminOfferController::class,'element_submit'])->name('admin_offer_element_submit');
    Route::post('/offer/element/update/{id}',[AdminOfferController::class,'element_update'])->name('admin_offer_element_update');
    Route::get('/offer/element/delete/{id}',[AdminOfferController::class,'element_delete'])->name('admin_offer_element_delete');

    Route::get('/subscriber/index', [AdminSubscriberController::class, 'index'])->name('admin_subscriber_index');
    Route::get('/subscriber/send-message', [AdminSubscriberController::class, 'send_message'])->name('admin_subscriber_send_message');
    Route::post('/subscriber/send-message/submit', [AdminSubscriberController::class, 'send_message_submit'])->name('admin_subscriber_send_message_submit');
    Route::get('/subscriber/delete/{id}', [AdminSubscriberController::class, 'delete'])->name('admin_subscriber_delete');


    Route::get('/home-page/1/index',[AdminHomePageItemController::class,'home1'])->name('admin_home1_page_item_index');
    Route::post('/home-page/1/update',[AdminHomePageItemController::class,'home1_update'])->name('admin_home1_page_item_update');
    Route::get('/home-page/2/index',[AdminHomePageItemController::class,'home2'])->name('admin_home2_page_item_index');
    Route::post('/home-page/2/update',[AdminHomePageItemController::class,'home2_update'])->name('admin_home2_page_item_update');
    Route::get('/home-page/3/index',[AdminHomePageItemController::class,'home3'])->name('admin_home3_page_item_index');
    Route::post('/home-page/3/update',[AdminHomePageItemController::class,'home3_update'])->name('admin_home3_page_item_update');
    Route::get('/home-page/4/index',[AdminHomePageItemController::class,'home4'])->name('admin_home4_page_item_index');
    Route::post('/home-page/4/update',[AdminHomePageItemController::class,'home4_update'])->name('admin_home4_page_item_update');

    Route::get('/home-page/contact/photo/index',[AdminHomePageItemController::class,'contact_photo'])->name('admin_home_contact_photo_index');
    Route::post('/home-page/contact/photo/update',[AdminHomePageItemController::class,'contact_photo_update'])->name('admin_home_contact_photo_update');


    Route::get('/other-page/index',[AdminOtherPageItemController::class,'index'])->name('admin_other_page_item_index');
    Route::post('/other-page/about/update',[AdminOtherPageItemController::class,'about_update'])->name('admin_other_page_item_about_update');
    Route::post('/other-page/team-member/update',[AdminOtherPageItemController::class,'team_member_update'])->name('admin_other_page_item_team_member_update');
    Route::post('/other-page/testimonial/update',[AdminOtherPageItemController::class,'testimonial_update'])->name('admin_other_page_item_testimonial_update');
    Route::post('/other-page/pricing/update',[AdminOtherPageItemController::class,'pricing_update'])->name('admin_other_page_item_pricing_update');
    Route::post('/other-page/faq/update',[AdminOtherPageItemController::class,'faq_update'])->name('admin_other_page_item_faq_update');
    Route::post('/other-page/services/update',[AdminOtherPageItemController::class,'services_update'])->name('admin_other_page_item_services_update');
    Route::post('/other-page/portfolios/update',[AdminOtherPageItemController::class,'portfolios_update'])->name('admin_other_page_item_portfolios_update');
    Route::post('/other-page/blog/update',[AdminOtherPageItemController::class,'blog_update'])->name('admin_other_page_item_blog_update');
    Route::post('/other-page/contact/update',[AdminOtherPageItemController::class,'contact_update'])->name('admin_other_page_item_contact_update');
    Route::post('/other-page/terms/update',[AdminOtherPageItemController::class,'terms_update'])->name('admin_other_page_item_terms_update');
    Route::post('/other-page/privacy/update',[AdminOtherPageItemController::class,'privacy_update'])->name('admin_other_page_item_privacy_update');
    Route::post('/other-page/search/update',[AdminOtherPageItemController::class,'search_update'])->name('admin_other_page_item_search_update');
    Route::post('/other-page/tag/update',[AdminOtherPageItemController::class,'tag_update'])->name('admin_other_page_item_tag_update');

    Route::post('/other-page/custom/store',[AdminOtherPageItemController::class,'custom_page_store'])->name('admin_other_page_item_custom_page_store');
    Route::post('/other-page/custom/update/{id}',[AdminOtherPageItemController::class,'custom_page_update'])->name('admin_other_page_item_custom_page_update');
    Route::get('/other-page/custom/destroy/{id}',[AdminOtherPageItemController::class,'custom_page_destroy'])->name('admin_other_page_item_custom_page_destroy');


    

    Route::get('/menu/index',[AdminMenuController::class,'index'])->name('admin_menu_index');
    Route::post('/menu/update',[AdminMenuController::class,'update'])->name('admin_menu_update');

    Route::get('/client/index',[AdminClientController::class,'index'])->name('admin_client_index');
    Route::get('/client/create',[AdminClientController::class,'create'])->name('admin_client_create');
    Route::post('/client/store',[AdminClientController::class,'store'])->name('admin_client_store');
    Route::get('/client/edit/{id}',[AdminClientController::class,'edit'])->name('admin_client_edit');
    Route::post('/client/update/{id}',[AdminClientController::class,'update'])->name('admin_client_update');
    Route::get('/client/destroy/{id}',[AdminClientController::class,'destroy'])->name('admin_client_destroy');

    Route::get('/translation/website-text/index', [AdminTranslationController::class,'website_text_index'])->name('admin_translation_website_text_index');

    Route::post('/translation/website-text/update', [AdminTranslationController::class,'website_text_update'])->name('admin_translation_website_text_update');

});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {return redirect('/admin/login');});
    Route::get('/login',[AdminController::class,'login'])->name('admin_login');
    Route::post('/login',[AdminController::class,'login_submit'])->name('admin_login_submit');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin_logout');
    Route::get('/forget-password',[AdminController::class,'forget_password'])->name('admin_forget_password');
    Route::post('/forget_password_submit',[AdminController::class,'forget_password_submit'])->name('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}',[AdminController::class,'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password/{token}/{email}',[AdminController::class,'reset_password_submit'])->name('admin_reset_password_submit');
});

});