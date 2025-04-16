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
        Schema::create('other_page_items', function (Blueprint $table) {
            $table->id();
            $table->text('page_about_title')->nullable();
            $table->text('page_about_welcome_status')->nullable();
            $table->text('page_about_service_heading')->nullable();
            $table->text('page_about_service_subheading')->nullable();
            $table->text('page_about_service_text')->nullable();
            $table->text('page_about_service_how_many')->nullable();
            $table->text('page_about_service_status')->nullable();
            $table->text('page_about_team_members_heading')->nullable();
            $table->text('page_about_team_members_subheading')->nullable();
            $table->text('page_about_team_members_how_many')->nullable();
            $table->text('page_about_team_members_status')->nullable();
            $table->text('page_team_members_title')->nullable();
            $table->text('page_testimonials_title')->nullable();
            $table->text('page_pricing_title')->nullable();
            $table->text('page_faq_title')->nullable();
            $table->text('page_services_title')->nullable();
            $table->text('page_portfolios_title')->nullable();
            $table->text('page_blog_title')->nullable();
            $table->text('page_contact_title')->nullable();
            $table->text('page_contact_send_mail_heading')->nullable();
            $table->text('page_contact_send_mail_subheading')->nullable();
            $table->text('page_contact_info_heading')->nullable();
            $table->text('page_contact_info_subheading')->nullable();
            $table->text('page_contact_info_text')->nullable();
            $table->text('page_contact_info_phone_title')->nullable();
            $table->text('page_contact_info_phone_value')->nullable();
            $table->text('page_contact_info_email_title')->nullable();
            $table->text('page_contact_info_email_value')->nullable();
            $table->text('page_contact_info_address_title')->nullable();
            $table->text('page_contact_info_address_value')->nullable();
            $table->text('page_terms_title')->nullable();
            $table->text('page_terms_content')->nullable();
            $table->text('page_privacy_title')->nullable();
            $table->text('page_privacy_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_page_items');
    }
};
