@extends('front.layouts.master')

@section('seo_title', $global_other_page_items->page_contact_seo_title)
@section('seo_meta_description', $global_other_page_items->page_contact_seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $global_other_page_items->page_contact_title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li>{{ $global_other_page_items->page_contact_title }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="contact-details">
    <div class="container ">
        <div class="row">
            <div class="col-xl-7 col-lg-6">
                <div class="sec-title">
                    <span class="sub-title">{{ $global_other_page_items->page_contact_send_mail_subheading }}</span>
                    <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($global_other_page_items->page_contact_send_mail_heading))) !!}</h2>
                </div>
                <form id="contact_form" name="contact_form" class="" action="{{ route('contact_send_message') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="name" class="form-control" type="text" placeholder="{{ __('Full Name') }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="email" class="form-control" type="email" placeholder="{{ __('Email Address') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input name="subject" class="form-control" type="text" placeholder="{{ __('Subject') }}" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="message" class="form-control" rows="7" placeholder="{{ __('Message') }}" required></textarea>
                    </div>
                    
                    @if($global_setting->google_recaptcha_status == 'Show')
                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="{{ $global_setting->google_recaptcha_site_key }}"></div>
                    </div>
                    @endif
                    
                    <div class="mb-3">
                        <input name="form_botcheck" class="form-control" type="hidden" value="" />
                        <button type="submit" class="theme-btn btn-style-one" data-loading-text="{{ __('Please wait...') }}"><span class="btn-title">{{ __('Send Message') }}</span></button>
                    </div>
                </form>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="contact-details__right">
                    <div class="sec-title">
                        <span class="sub-title">{{ $global_other_page_items->page_contact_info_subheading }}</span>
                        <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($global_other_page_items->page_contact_info_heading))) !!}</h2>
                        <div class="text">{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($global_other_page_items->page_contact_info_text))) !!}</div>
                    </div>
                    <ul class="list-unstyled contact-details__info">
                        <li>
                            <div class="icon bg-theme-color2">
                                <span class="lnr-icon-phone-plus"></span>
                            </div>
                            <div class="text">
                                <h6>{{ $global_other_page_items->page_contact_info_phone_title }}</h6>
                                <a href="tel:{{ $global_other_page_items->page_contact_info_phone_value }}">{{ $global_other_page_items->page_contact_info_phone_value }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="lnr-icon-envelope1"></span>
                            </div>
                            <div class="text">
                                <h6>{{ $global_other_page_items->page_contact_info_email_title }}</h6>
                                <a href="mailto:{{ $global_other_page_items->page_contact_info_email_value }}">{{ $global_other_page_items->page_contact_info_email_value }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="lnr-icon-location"></span>
                            </div>
                            <div class="text">
                                <h6>{{ $global_other_page_items->page_contact_info_address_title }}</h6>
                                <span>{{ $global_other_page_items->page_contact_info_address_value }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@if($global_setting->map != '')
<section class="map-section">
    {!! $global_setting->map !!}
</section>
@endif

@endsection