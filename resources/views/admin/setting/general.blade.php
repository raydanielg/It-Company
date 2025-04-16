@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Settings') }}</h1>
</div>

<form action="{{ route('admin_setting_general_update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4 t-left">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                    <ul class="nav flex-column nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab__logo_favicon" data-bs-toggle="pill" href="#item__logo_favicon" role="tab" aria-controls="item__logo_favicon" aria-selected="true">{{ __('Logo and Favicon') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__404" data-bs-toggle="pill" href="#item__404" role="tab" aria-controls="item__404" aria-selected="false">{{ __('404 Page Photo') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__banner" data-bs-toggle="pill" href="#item__banner" role="tab" aria-controls="item__banner" aria-selected="false">{{ __('Banner') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__login_page_photo" data-bs-toggle="pill" href="#item__login_page_photo" role="tab" aria-controls="item__login_page_photo" aria-selected="false">{{ __('Login Page Photo') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__home_page" data-bs-toggle="pill" href="#item__home_page" role="tab" aria-controls="item__home_page" aria-selected="false">{{ __('Home Page Setup') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__social_media" data-bs-toggle="pill" href="#item__social_media" role="tab" aria-controls="item__social_media" aria-selected="false">{{ __('Social Media') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__top_bar" data-bs-toggle="pill" href="#item__top_bar" role="tab" aria-controls="item__top_bar" aria-selected="false">{{ __('Top Bar') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__footer" data-bs-toggle="pill" href="#item__footer" role="tab" aria-controls="item__footer" aria-selected="false">{{ __('Footer') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__map" data-bs-toggle="pill" href="#item__map" role="tab" aria-controls="item__map" aria-selected="false">{{ __('Map') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__cookie_consent" data-bs-toggle="pill" href="#item__cookie_consent" role="tab" aria-controls="item__cookie_consent" aria-selected="false">{{ __('Cookie Consent') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__google_analytic" data-bs-toggle="pill" href="#item__google_analytic" role="tab" aria-controls="item__google_analytic" aria-selected="false">{{ __('Google Analytic') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__google_recaptcha" data-bs-toggle="pill" href="#item__google_recaptcha" role="tab" aria-controls="item__google_recaptcha" aria-selected="false">{{ __('Google Recaptcha') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__tawk_live_chat" data-bs-toggle="pill" href="#item__tawk_live_chat" role="tab" aria-controls="item__tawk_live_chat" aria-selected="false">{{ __('Tawk Live Chat') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab__other" data-bs-toggle="pill" href="#item__other" role="tab" aria-controls="item__other" aria-selected="false">{{ __('Other') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="item__logo_favicon" role="tabpanel" aria-labelledby="tab__logo_favicon">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="w_50_p">
                                        {{ __('Existing Logo') }}
                                    </td>
                                    <td>
                                        {{ __('Change Logo') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center bg_eeeeee">
                                        <img src="{{ asset('uploads/'.$setting->logo) }}" alt="" class="w_200">
                                    </td>
                                    <td>
                                        <input type="file" name="logo">
                                    </td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <tr>
                                    <td class="w_50_p">
                                        {{ __('Existing Logo - Sticky') }}
                                    </td>
                                    <td>
                                        {{ __('Change Logo - Sticky') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center bg_eeeeee">
                                        <img src="{{ asset('uploads/'.$setting->logo_sticky) }}" alt="" class="w_200">
                                    </td>
                                    <td>
                                        <input type="file" name="logo_sticky">
                                    </td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <tr>
                                    <td class="w_50_p">
                                        {{ __('Existing Favicon') }}
                                    </td>
                                    <td>
                                        {{ __('Change Favicon') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center bg_eeeeee">
                                        <img src="{{ asset('uploads/'.$global_setting->favicon) }}" alt="" class="w_100">
                                    </td>
                                    <td>
                                        <input type="file" name="favicon">
                                    </td>
                                </tr>
                            </table>
                        </div>


                        <div class="tab-pane fade" id="item__404" role="tabpanel" aria-labelledby="tab__404">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$setting->image_404) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Change Photo') }}</label>
                                        <div>
                                            <input type="file" name="image_404">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__banner" role="tabpanel" aria-labelledby="tab__banner">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$setting->banner) }}" alt="" class="w_300">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Change Photo') }}</label>
                                        <div>
                                            <input type="file" name="banner">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__login_page_photo" role="tabpanel" aria-labelledby="tab__login_page_photo">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$setting->login_page_photo) }}" alt="" class="w_300">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Change Photo') }}</label>
                                        <div>
                                            <input type="file" name="login_page_photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__home_page" role="tabpanel" aria-labelledby="tab__home_page">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <label for="" class="form-label">{{ __('Home Page Show') }}</label>
                                    <select name="home_show" class="form-control select2">
                                        <option value="All" {{ $setting->home_show == 'All' ? 'selected' : '' }}>{{ __('All') }}</option>
                                        <option value="Home 1" {{ $setting->home_show == 'Home 1' ? 'selected' : '' }}>{{ __('Home 1') }}</option>
                                        <option value="Home 2" {{ $setting->home_show == 'Home 2' ? 'selected' : '' }}>{{ __('Home 2') }}</option>
                                        <option value="Home 3" {{ $setting->home_show == 'Home 3' ? 'selected' : '' }}>{{ __('Home 3') }}</option>
                                        <option value="Home 4" {{ $setting->home_show == 'Home 4' ? 'selected' : '' }}>{{ __('Home 4') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('SEO Title') }}</label>
                                        <input type="text" name="home_seo_title" class="form-control" value="{{ $setting->home_seo_title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                                        <textarea name="home_seo_meta_description" class="form-control h_70" cols="30" rows="10">{{ $setting->home_seo_meta_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__social_media" role="tabpanel" aria-labelledby="tab__social_media">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Facebook') }}</label>
                                        <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Twitter') }}</label>
                                        <input type="text" name="twitter" class="form-control" value="{{ $setting->twitter }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Linkedin') }}</label>
                                        <input type="text" name="linkedin" class="form-control" value="{{ $setting->linkedin }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Instagram') }}</label>
                                        <input type="text" name="instagram" class="form-control" value="{{ $setting->instagram }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('YouTube') }}</label>
                                        <input type="text" name="youtube" class="form-control" value="{{ $setting->youtube }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Pinterest') }}</label>
                                        <input type="text" name="pinterest" class="form-control" value="{{ $setting->pinterest }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__top_bar" role="tabpanel" aria-labelledby="tab__top_bar">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Email') }}</label>
                                        <input type="text" name="top_bar_email" class="form-control" value="{{ $setting->top_bar_email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Address') }}</label>
                                        <input type="text" name="top_bar_address" class="form-control" value="{{ $setting->top_bar_address }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Phone') }}</label>
                                        <input type="text" name="top_bar_phone" class="form-control" value="{{ $setting->top_bar_phone }}">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="item__footer" role="tabpanel" aria-labelledby="tab__footer">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Email') }}</label>
                                        <input type="text" name="footer_email" class="form-control" value="{{ $setting->footer_email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Phone') }}</label>
                                        <input type="text" name="footer_phone" class="form-control" value="{{ $setting->footer_phone }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Address') }}</label>
                                        <input type="text" name="footer_address" class="form-control" value="{{ $setting->footer_address }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Copyright Text') }}</label>
                                        <input type="text" name="footer_copyright" class="form-control" value="{{ $setting->footer_copyright }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Footer Text') }}</label>
                                        <textarea name="footer_text" class="form-control h_100" cols="30" rows="10">{{ $setting->footer_text }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Links Heading') }}</label>
                                        <input type="text" name="footer_links_heading" class="form-control" value="{{ $setting->footer_links_heading }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Subscriber Heading') }}</label>
                                        <input type="text" name="footer_subscriber_heading" class="form-control" value="{{ $setting->footer_subscriber_heading }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Subscriber Text') }}</label>
                                        <textarea name="footer_subscriber_text" class="form-control h_100" cols="30" rows="10">{{ $setting->footer_subscriber_text }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__map" role="tabpanel" aria-labelledby="tab__map">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('iframe code') }}</label>
                                        <textarea name="map" class="form-control h_150" cols="30" rows="10">{{ $setting->map }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__cookie_consent" role="tabpanel" aria-labelledby="tab__cookie_consent">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Message') }}</label>
                                        <textarea name="cookie_consent_message" class="form-control h_70" cols="30" rows="10">{{ $setting->cookie_consent_message }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ __('Text Color') }}</label>
                                                <input type="text" name="cookie_consent_text_color" class="form-control jscolor" value="{{ $setting->cookie_consent_text_color }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ __('Background Color') }}</label>
                                                <input type="text" name="cookie_consent_bg_color" class="form-control jscolor" value="{{ $setting->cookie_consent_bg_color }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ __('Button Text Color') }}</label>
                                                <input type="text" name="cookie_consent_button_text_color" class="form-control jscolor" value="{{ $setting->cookie_consent_button_text_color }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ __('Button Background Color') }}</label>
                                                <input type="text" name="cookie_consent_button_bg_color" class="form-control jscolor" value="{{ $setting->cookie_consent_button_bg_color }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ __('Button Text') }}</label>
                                                <input type="text" name="cookie_consent_button_text" class="form-control" value="{{ $setting->cookie_consent_button_text }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">{{ __('Status') }}</label>
                                                <select name="cookie_consent_status" class="form-select">
                                                    <option value="Show" {{ $setting->cookie_consent_status == 'Show' ? 'selected' : '' }}>{{ __('Show') }}</option>
                                                    <option value="Hide" {{ $setting->cookie_consent_status == 'Hide' ? 'selected' : '' }}>{{ __('Hide') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__google_analytic" role="tabpanel" aria-labelledby="tab__google_analytic">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('Analytic Code') }}</label>
                                    <input type="text" name="google_analytic_id" class="form-control" value="{{ $setting->google_analytic_id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('Status') }}</label>
                                    <select name="google_analytic_status" class="form-select">
                                        <option value="Show" {{ $setting->google_analytic_status == 'Show' ? 'selected' : '' }}>{{ __('Show') }}</option>
                                        <option value="Hide" {{ $setting->google_analytic_status == 'Hide' ? 'selected' : '' }}>{{ __('Hide') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__google_recaptcha" role="tabpanel" aria-labelledby="tab__google_recaptcha">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('Recaptcha Site Key') }}</label>
                                    <input type="text" name="google_recaptcha_site_key" class="form-control" value="{{ $setting->google_recaptcha_site_key }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('Status') }}</label>
                                    <select name="google_recaptcha_status" class="form-select">
                                        <option value="Show" {{ $setting->google_recaptcha_status == 'Show' ? 'selected' : '' }}>{{ __('Show') }}</option>
                                        <option value="Hide" {{ $setting->google_recaptcha_status == 'Hide' ? 'selected' : '' }}>{{ __('Hide') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__tawk_live_chat" role="tabpanel" aria-labelledby="tab__tawk_live_chat">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('Property Id') }}</label>
                                    <input type="text" name="tawk_live_chat_property_id" class="form-control" value="{{ $setting->tawk_live_chat_property_id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('Status') }}</label>
                                    <select name="tawk_live_chat_status" class="form-select">
                                        <option value="Show" {{ $setting->tawk_live_chat_status == 'Show' ? 'selected' : '' }}>{{ __('Show') }}</option>
                                        <option value="Hide" {{ $setting->tawk_live_chat_status == 'Hide' ? 'selected' : '' }}>{{ __('Hide') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="item__other" role="tabpanel" aria-labelledby="tab__other">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Sticky Header') }}</label>
                                        <select name="sticky_header" class="form-select">
                                            <option value="Show" @if($setting->sticky_header == 'Show') selected @endif>{{ __('Show') }}</option>
                                            <option value="Hide" @if($setting->sticky_header == 'Hide') selected @endif>{{ __('Hide') }}</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Preloader') }}</label>
                                        <select name="preloader" class="form-select">
                                            <option value="Show" @if($setting->preloader == 'Show') selected @endif>{{ __('Show') }}</option>
                                            <option value="Hide" @if($setting->preloader == 'Hide') selected @endif>{{ __('Hide') }}</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Layout Direction') }}</label>
                                        <select name="layout_direction" class="form-select">
                                            <option value="LTR" @if($setting->layout_direction == 'LTR') selected @endif>{{ __('LTR') }}</option>
                                            <option value="RTL" @if($setting->layout_direction == 'RTL') selected @endif>{{ __('RTL') }}</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Theme Color') }}</label>
                                        <input type="text" name="theme_color" class="form-control jscolor" value="{{ $setting->theme_color }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Currency Symbol') }}</label>
                                        <input type="text" name="currency_symbol" class="form-control" value="{{ $setting->currency_symbol }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-block mb_50 btn-common">{{ __('Update') }}</button>
</form>
@endsection