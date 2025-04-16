@extends('front.layouts.master')

@section('seo_title', $team_member->seo_title)
@section('seo_meta_description', $team_member->seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $team_member->name }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li><a href="{{ route('team_members') }}">{{ $global_other_page_items->page_team_members_title }}</a></li>
                <li>{{ $team_member->name }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="team-details">
    <div class=""></div>
    <div class="container pb-100">
        <div class="team-details__top pb-70">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="team-details__top-left">
                        <div class="team-details__top-img"> <img src="{{ asset('uploads/'.$team_member->photo) }}" alt="">
                            <div class="team-details__big-text"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="team-details__top-right">
                        <div class="team-details__top-content">
                            <h3 class="team-details__top-name">{{ $team_member->name }}</h3>
                            <p class="team-details__top-title">{{ $team_member->designation }}</p>
                            <p class="team-details__top-text-1">
                                {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($team_member->tagline))) !!}
                            </p>
                            <div class="team-details-contact mb-30">
                                <h5 class="mb-0">{{ __('Email Address') }}</h5>
                                <div class=""><span>{{ $team_member->email }}</span></div>
                            </div>
                            <div class="team-details-contact mb-30">
                                <h5 class="mb-0">{{ __('Phone Number') }}</h5>
                                <div class=""><span>{{ $team_member->phone }}</span></div>
                            </div>
                            <div class="team-details-contact">
                                <h5 class="mb-0">{{ __('Website') }}</h5>
                                <div class=""><span>{{ $team_member->website }}</span></div>
                            </div>

                            @if($team_member->facebook != '' || $team_member->twitter != '' || $team_member->linkedin != '' || $team_member->instagram != '' || $team_member->youtube != '' || $team_member->pinterest != '')
                            <div class="team-details__social">
                                @if($team_member->facebook != '')
                                    <a href="{{ $team_member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if($team_member->twitter != '')
                                    <a href="{{ $team_member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($team_member->linkedin != '')
                                    <a href="{{ $team_member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                                @if($team_member->instagram != '')
                                    <a href="{{ $team_member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if($team_member->youtube != '')
                                    <a href="{{ $team_member->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                                @endif
                                @if($team_member->pinterest != '')
                                    <a href="{{ $team_member->pinterest }}" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                @endif
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-details__bottom pt-100">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="team-details__bottom-left">
                        <h4 class="team-details__bottom-left-title">{{ __('Personal Experience') }}</h4>
                        <p class="team-details__bottom-left-text">
                            {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($team_member->experience_text))) !!}
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="team-details__bottom-right">
                        <div class="team-details__progress">
                            @foreach($experiences as $item)
                            <div class="team-details__progress-single">
                                <h4 class="team-details__progress-title">{{ $item->name }}</h4>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="{{ $item->percentage }}%">
                                        <div class="count-text">{{ $item->percentage }}%</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Team Details End--> 

<!--Contact Details Start-->
<section class="team-contact-form">
    <div class="container pb-100">
        <div class="sec-title text-center">
            <span class="sub-title">{{ __('Contact With Me') }}</span>
            <h2 class="section-title__title">{{ __('Feel Free to Contact with Me') }}</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form id="contact_form" name="contact_form" class="" action="{{ route('team_member_send_message') }}" method="post">
                    @csrf
                    <input type="hidden" name="team_member_email" value="{{ $team_member->email }}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="name" class="form-control" type="text" placeholder="{{ __('Full Name') }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="email" class="form-control required email" type="email" placeholder="{{ __('Email Address') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <input name="subject" class="form-control required" type="text" placeholder="{{ __('Subject') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea name="message" class="form-control required" rows="5" placeholder="{{ __('Message') }}" required></textarea>
                    </div>
                    @if($global_setting->google_recaptcha_status == 'Show')
                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="{{ $global_setting->google_recaptcha_site_key }}"></div>
                    </div>
                    @endif
                    <div class="mb-3 text-center">
                        <button type="submit" class="theme-btn btn-style-one" data-loading-text="{{ __('Please wait...') }}"><span class="btn-title">{{ __('Send Message') }}</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection