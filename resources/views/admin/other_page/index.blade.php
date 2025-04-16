@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Other Pages') }}</h1>
</div>


    <div class="card shadow mb-4 t-left">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                    <ul class="nav flex-column nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab__about" data-bs-toggle="pill" href="#item__about" role="tab" aria-controls="item__about" aria-selected="true">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__team_members" data-bs-toggle="pill" href="#item__team_members" role="tab" aria-controls="item__team_members" aria-selected="false">{{ __('Team Members') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__testimonials" data-bs-toggle="pill" href="#item__testimonials" role="tab" aria-controls="item__testimonials" aria-selected="false">{{ __('Testimonials') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__pricing" data-bs-toggle="pill" href="#item__pricing" role="tab" aria-controls="item__pricing" aria-selected="false">{{ __('Pricing') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__faq" data-bs-toggle="pill" href="#item__faq" role="tab" aria-controls="item__faq" aria-selected="false">{{ __('FAQ') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__services" data-bs-toggle="pill" href="#item__services" role="tab" aria-controls="item__services" aria-selected="false">{{ __('Services') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__portfolios" data-bs-toggle="pill" href="#item__portfolios" role="tab" aria-controls="item__portfolios" aria-selected="false">{{ __('Portfolios') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__blog" data-bs-toggle="pill" href="#item__blog" role="tab" aria-controls="item__blog" aria-selected="false">{{ __('Blog') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__contact" data-bs-toggle="pill" href="#item__contact" role="tab" aria-controls="item__contact" aria-selected="false">{{ __('Contact') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__terms" data-bs-toggle="pill" href="#item__terms" role="tab" aria-controls="item__terms" aria-selected="false">{{ __('Terms') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__privacy" data-bs-toggle="pill" href="#item__privacy" role="tab" aria-controls="item__privacy" aria-selected="false">{{ __('Privacy') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__search" data-bs-toggle="pill" href="#item__search" role="tab" aria-controls="item__search" aria-selected="false">{{ __('Search') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__tag" data-bs-toggle="pill" href="#item__tag" role="tab" aria-controls="item__tag" aria-selected="false">{{ __('Tag') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__custom_page" data-bs-toggle="pill" href="#item__custom_page" role="tab" aria-controls="item__custom_page" aria-selected="false">{{ __('Custom Pages') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="item__about" role="tabpanel" aria-labelledby="tab__about">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">

                                    <form action="{{ route('admin_other_page_item_about_update') }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_about_title" class="form-control" value="{{ $other_page_items->page_about_title }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Welcome - Status') }}</label>
                                            <select name="page_about_welcome_status" class="form-select">
                                                <option value="Show" @if($other_page_items->page_about_welcome_status == 'Show') selected @endif>{{ __('Show') }}</option>
                                                <option value="Hide" @if($other_page_items->page_about_welcome_status == 'Hide') selected @endif>{{ __('Hide') }}</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Service - Heading') }}</label>
                                            <textarea name="page_about_service_heading" class="form-control h_100" cols="30" rows="10">{{ $other_page_items->page_about_service_heading }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Service - SubHeading') }}</label>
                                            <input type="text" name="page_about_service_subheading" class="form-control" value="{{ $other_page_items->page_about_service_subheading }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Service - Text') }}</label>
                                            <textarea name="page_about_service_text" class="form-control h_100" cols="30" rows="10">{{ $other_page_items->page_about_service_text }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Service - How Many') }}</label>
                                            <input type="text" name="page_about_service_how_many" class="form-control" value="{{ $other_page_items->page_about_service_how_many }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Service - Status') }}</label>
                                            <select name="page_about_service_status" class="form-select">
                                                <option value="Show" @if($other_page_items->page_about_service_status == 'Show') selected @endif>{{ __('Show') }}</option>
                                                <option value="Hide" @if($other_page_items->page_about_service_status == 'Hide') selected @endif>{{ __('Hide') }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Team Members - Heading') }}</label>
                                            <textarea name="page_about_team_members_heading" class="form-control h_100" cols="30" rows="10">{{ $other_page_items->page_about_team_members_heading }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Team Members - SubHeading') }}</label>
                                            <input type="text" name="page_about_team_members_subheading" class="form-control" value="{{ $other_page_items->page_about_team_members_subheading }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Team Members - How Many') }}</label>
                                            <input type="text" name="page_about_team_members_how_many" class="form-control" value="{{ $other_page_items->page_about_team_members_how_many }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Team Members - Status') }}</label>
                                            <select name="page_about_team_members_status" class="form-select">
                                                <option value="Show" @if($other_page_items->page_about_team_members_status == 'Show') selected @endif>{{ __('Show') }}</option>
                                                <option value="Hide" @if($other_page_items->page_about_team_members_status == 'Hide') selected @endif>{{ __('Hide') }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_about_seo_title" class="form-control" value="{{ $other_page_items->page_about_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_about_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_about_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>

                                    
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__team_members" role="tabpanel" aria-labelledby="tab__team_members">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_team_member_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_team_members_title" class="form-control" value="{{ $other_page_items->page_team_members_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_team_members_seo_title" class="form-control" value="{{ $other_page_items->page_team_members_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_team_members_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_team_members_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__testimonials" role="tabpanel" aria-labelledby="tab__testimonials">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_testimonial_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_testimonials_title" class="form-control" value="{{ $other_page_items->page_testimonials_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_testimonials_seo_title" class="form-control" value="{{ $other_page_items->page_testimonials_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_testimonials_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_testimonials_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__pricing" role="tabpanel" aria-labelledby="tab__pricing">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_pricing_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_pricing_title" class="form-control" value="{{ $other_page_items->page_pricing_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_pricing_seo_title" class="form-control" value="{{ $other_page_items->page_pricing_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_pricing_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_pricing_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__faq" role="tabpanel" aria-labelledby="tab__faq">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_faq_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_faq_title" class="form-control" value="{{ $other_page_items->page_faq_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_faq_seo_title" class="form-control" value="{{ $other_page_items->page_faq_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_faq_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_faq_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__services" role="tabpanel" aria-labelledby="tab__services">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_services_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_services_title" class="form-control" value="{{ $other_page_items->page_services_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_services_seo_title" class="form-control" value="{{ $other_page_items->page_services_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_services_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_services_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>




                        <div class="tab-pane fade" id="item__portfolios" role="tabpanel" aria-labelledby="tab__portfolios">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_portfolios_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_portfolios_title" class="form-control" value="{{ $other_page_items->page_portfolios_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_portfolios_seo_title" class="form-control" value="{{ $other_page_items->page_portfolios_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_portfolios_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_portfolios_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__blog" role="tabpanel" aria-labelledby="tab__blog">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_blog_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_blog_title" class="form-control" value="{{ $other_page_items->page_blog_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_blog_seo_title" class="form-control" value="{{ $other_page_items->page_blog_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_blog_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_blog_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__contact" role="tabpanel" aria-labelledby="tab__contact">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_contact_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_contact_title" class="form-control" value="{{ $other_page_items->page_contact_title }}">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Send Mail Heading') }}</label>
                                                    <input type="text" name="page_contact_send_mail_heading" class="form-control" value="{{ $other_page_items->page_contact_send_mail_heading }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Send Mail Subheading') }}</label>
                                                    <input type="text" name="page_contact_send_mail_subheading" class="form-control" value="{{ $other_page_items->page_contact_send_mail_subheading }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Information - Heading') }}</label>
                                                    <input type="text" name="page_contact_info_heading" class="form-control" value="{{ $other_page_items->page_contact_info_heading }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Information - SubHeading') }}</label>
                                                    <input type="text" name="page_contact_info_subheading" class="form-control" value="{{ $other_page_items->page_contact_info_subheading }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Information - Text') }}</label>
                                            <textarea name="page_contact_info_text" class="form-control h_100" cols="30" rows="10">{{ $other_page_items->page_contact_info_text }}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Information - Phone Title') }}</label>
                                                    <input type="text" name="page_contact_info_phone_title" class="form-control" value="{{ $other_page_items->page_contact_info_phone_title }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Information - Phone Value') }}</label>
                                                    <input type="text" name="page_contact_info_phone_value" class="form-control" value="{{ $other_page_items->page_contact_info_phone_value }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Information - Email Title') }}</label>
                                                    <input type="text" name="page_contact_info_email_title" class="form-control" value="{{ $other_page_items->page_contact_info_email_title }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Information - Email Value') }}</label>
                                                    <input type="text" name="page_contact_info_email_value" class="form-control" value="{{ $other_page_items->page_contact_info_email_value }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Information - Address Title') }}</label>
                                                    <input type="text" name="page_contact_info_address_title" class="form-control" value="{{ $other_page_items->page_contact_info_address_title }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Information - Address Value') }}</label>
                                                    <input type="text" name="page_contact_info_address_value" class="form-control" value="{{ $other_page_items->page_contact_info_address_value }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_contact_seo_title" class="form-control" value="{{ $other_page_items->page_contact_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_contact_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_contact_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__terms" role="tabpanel" aria-labelledby="tab__terms">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 gap-1">
                                    <form action="{{ route('admin_other_page_item_terms_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_terms_title" class="form-control" value="{{ $other_page_items->page_terms_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Content') }}</label>
                                            <textarea name="page_terms_content" class="form-control editor" cols="30" rows="10">{{ $other_page_items->page_terms_content }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_terms_seo_title" class="form-control" value="{{ $other_page_items->page_terms_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_terms_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_terms_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__privacy" role="tabpanel" aria-labelledby="tab__privacy">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_privacy_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Title') }}</label>
                                            <input type="text" name="page_privacy_title" class="form-control" value="{{ $other_page_items->page_privacy_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Content') }}</label>
                                            <textarea name="page_privacy_content" class="form-control editor" cols="30" rows="10">{{ $other_page_items->page_privacy_content }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_privacy_seo_title" class="form-control" value="{{ $other_page_items->page_privacy_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_privacy_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_privacy_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__search" role="tabpanel" aria-labelledby="tab__search">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_search_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_search_seo_title" class="form-control" value="{{ $other_page_items->page_search_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_search_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_search_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__tag" role="tabpanel" aria-labelledby="tab__tag">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <form action="{{ route('admin_other_page_item_tag_update') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                            <input type="text" name="page_tag_seo_title" class="form-control" value="{{ $other_page_items->page_tag_seo_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                            <textarea name="page_tag_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $other_page_items->page_tag_seo_meta_description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__custom_page" role="tabpanel" aria-labelledby="tab__custom_page">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 gap-1">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#add_modal" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm mb_30"><i class="fas fa-plus"></i> {{ __('Add Item') }}
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Add Item') }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin_other_page_item_custom_page_store') }}" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">{{ __('Name') }} *</label>
                                                                    <input type="text" name="name" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">{{ __('Slug') }}*</label>
                                                                    <input type="text" name="slug" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ __('Content') }}*</label>
                                                            <textarea name="content" class="form-control editor" cols="30" rows="10"></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                                            <input type="text" name="seo_title" class="form-control" value="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                                            <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Submit') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- // Modal -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm" id="dtable">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('SL') }}</th>
                                                    <th>{{ __('Name') }}</th>
                                                    <th>{{ __('Slug') }}</th>
                                                    <th>{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($custom_pages as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->slug }}</td>
                                                    <td>
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#edit_modal_{{ $loop->iteration }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_other_page_item_custom_page_destroy',$item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}')"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal fade" id="edit_modal_{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Edit Item') }}</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin_other_page_item_custom_page_update',$item->id) }}" method="post">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="" class="form-label">{{ __('Name') }} *</label>
                                                                                <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="" class="form-label">{{ __('Slug') }}*</label>
                                                                                <input type="text" name="slug" class="form-control" value="{{ $item->slug }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">{{ __('Content') }}*</label>
                                                                        <textarea name="content" class="form-control editor" cols="30" rows="10">{{ $item->content }}</textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                                                        <input type="text" name="seo_title" class="form-control" value="{{ $item->seo_title }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                                                        <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $item->seo_meta_description }}</textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <button type="submit" class="btn btn-primary btn-sm">{{ __('Update') }}</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- // Modal -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection