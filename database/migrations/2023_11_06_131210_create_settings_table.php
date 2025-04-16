<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->text('logo_dark')->nullable();
            $table->text('favicon')->nullable();
            $table->text('home_show')->nullable();
            $table->text('image_404')->nullable();
            $table->text('banner')->nullable();
            $table->text('login_page_photo')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('instagram')->nullable();
            $table->text('youtube')->nullable();
            $table->text('pinterest')->nullable();
            $table->text('top_bar_email')->nullable();
            $table->text('top_bar_address')->nullable();
            $table->text('top_bar_phone')->nullable();
            $table->text('map')->nullable();
            $table->text('footer_email')->nullable();
            $table->text('footer_phone')->nullable();
            $table->text('footer_address')->nullable();
            $table->text('footer_copyright')->nullable();

            $table->text('footer_text')->nullable();
            $table->text('footer_links_heading')->nullable();
            $table->text('footer_subscriber_heading')->nullable();
            $table->text('footer_subscriber_text')->nullable();
            
            $table->text('sticky_header')->nullable();
            $table->text('preloader')->nullable();
            $table->text('layout_direction')->nullable();
            $table->text('theme_color')->nullable();

            $table->text('cookie_consent_message')->nullable();
            $table->text('cookie_consent_button_text')->nullable();
            $table->text('cookie_consent_text_color')->nullable();
            $table->text('cookie_consent_bg_color')->nullable();
            $table->text('cookie_consent_button_text_color')->nullable();
            $table->text('cookie_consent_button_bg_color')->nullable();
            $table->text('cookie_consent_status')->nullable();
            
            $table->text('tawk_live_chat_property_id')->nullable();
            $table->text('tawk_live_chat_status')->nullable();

            $table->text('google_analytic_id')->nullable();
            $table->text('google_analytic_status')->nullable();

            $table->text('google_recaptcha_site_key')->nullable();
            $table->text('google_recaptcha_status')->nullable();
            
            $table->text('home_seo_title')->nullable();
            $table->text('home_seo_meta_description')->nullable();
            $table->text('about_seo_title')->nullable();
            $table->text('about_seo_meta_description')->nullable();
            $table->text('team_members_seo_title')->nullable();
            $table->text('team_members_seo_meta_description')->nullable();
            $table->text('testimonial_seo_title')->nullable();
            $table->text('testimonial_seo_meta_description')->nullable();
            $table->text('pricing_seo_title')->nullable();
            $table->text('pricing_seo_meta_description')->nullable();
            $table->text('faq_seo_title')->nullable();
            $table->text('faq_seo_meta_description')->nullable();
            $table->text('services_seo_title')->nullable();
            $table->text('services_seo_meta_description')->nullable();
            $table->text('portfolios_seo_title')->nullable();
            $table->text('portfolios_seo_meta_description')->nullable();
            $table->text('blog_seo_title')->nullable();
            $table->text('blog_seo_meta_description')->nullable();
            $table->text('contact_seo_title')->nullable();
            $table->text('contact_seo_meta_description')->nullable();
            $table->text('search_seo_title')->nullable();
            $table->text('search_seo_meta_description')->nullable();
            $table->text('tag_seo_title')->nullable();
            $table->text('tag_seo_meta_description')->nullable();
            $table->text('terms_seo_title')->nullable();
            $table->text('terms_seo_meta_description')->nullable();
            $table->text('privacy_seo_title')->nullable();
            $table->text('privacy_seo_meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
