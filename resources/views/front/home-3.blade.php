@extends('front.layouts.master')

@section('seo_title', $global_setting->home_seo_title)
@section('seo_meta_description', $global_setting->home_seo_meta_description)

@section('content')

<!-- Slider Section -->
<section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme default-navs">
        @foreach($sliders as $slider)
        <div class="slide-item">
            <div class="bg-image" style="background-image: url({{ asset('uploads/'.$slider->photo) }});"></div>
            <div class="auto-container">
                <div class="content-box">
                    @if($slider->text!='')
                    <h1 class="title animate-1">
                        {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($slider->text))) !!}
                    </h1>
                    @endif
                    @if($slider->button_text!='')
                    <div class="btn-box animate-2">
                        <a href="{{ $slider->button_url }}" class="theme-btn btn-style-one hover-light"><span class="btn-title">{{ $slider->button_text }}</span></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- End Slider Section -->


@if($home_3_page_items->service_status == 'Show')
<section class="services-section-two border-top-1 bg-f7">
    <div class="auto-container">
        <div class="outer-box">
            <div class="row">
                @foreach($services->take($home_3_page_items->service_how_many) as $service)
                @php
                $num = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
                @endphp
                <div class="service-block-home4 col-sm-6 col-lg-4 wow fadeInUp">
                    <div class="inner-box">
                        <span class="count"><em>{{ $num }}</em></span>
                        <i class="icon {{ $service->icon }}"></i>
                        <h4 class="title"><a href="{{ route('service',$service->slug) }}">{{ $service->name }}</a></h4>
                        <div class="text">{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($service->short_description))) !!}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif


@if($home_3_page_items->welcome_status == 'Show')
<section class="about-section-two">
    <div class="anim-icons">
        <span class="icon icon-line4"></span>
        <span class="icon icon-line5"></span>
        <span class="icon icon-arrow1 bounce-x"></span>
        <span class="icon icon-speaker zoom-one"></span>
    </div>
    <div class="auto-container">
        <div class="outer-box">
            <div class="row">
                <div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12 order-2 wow fadeInRight" data-wow-delay="600ms">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="sub-title">{{ $welcome_two_items->subheading }}</span>
                            <h2>{{ $welcome_two_items->heading }}</h2>
                            <div class="text">
                                {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($welcome_two_items->text))) !!}
                            </div>
                        </div>
                        <div class="row">
                            @foreach($welcome_two_item_elements as $item)
                            <div class="info-box col-lg-6 col-md-6">
                                <div class="inner">
                                    <h5 class="title"><i class="icon fa @if(session('sess_lang_direction') == 'Right to Left (RTL)') fa-circle-arrow-left @else fa-circle-arrow-right @endif"></i> {{ $item->heading }}</h5>
                                    <div class="text">
                                        {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($item->text))) !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="skills">
                            @foreach($welcome_two_item_skills as $item)
                            <div class="skill-item">
                                <div class="skill-header">
                                    <h5 class="skill-title">{{ $item->name }}</h5>
                                </div>
                                <div class="skill-bar">
                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="{{ $item->percentage }}">
                                            <div class="skill-percentage">
                                                <div class="count-box"><span class="count-text" data-speed="3000" data-stop="{{ $item->percentage }}">0</span>%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="bottom-box">
                            <a href="{{ $welcome_two_items->button_url }}" class="theme-btn btn-style-one hvr-dark"><span class="btn-title">{{ $welcome_two_items->button_text }}</span></a>
                        </div>
                    </div>
                </div>
                <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft">
                        <div class="image-box">
                            <span class="icon-dots2"></span>
                            <figure class="image-1 overlay-anim wow fadeInUp"><img src="{{ asset('uploads/'.$welcome_two_items->photo1) }}" alt=""></figure>
                            <figure class="image-2 overlay-anim wow fadeInRight"><img src="{{ asset('uploads/'.$welcome_two_items->photo2) }}" alt=""></figure>
                            <div class="exp-box">
                                <div class="inner">
                                    <i class="icon flaticon-promotion"></i>
                                    <span class="count">{{ $welcome_two_items->experience_year }}</span>
                                    <h6 class="title">{{ __('Work Experience') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


@if($home_3_page_items->offer_status == 'Show')
<section class="offer-section-home4">
    <div class="auto-container">
        <div class="row">
            <div class="content-column position-relative col-lg-6 col-md-12">
                <div class="inner-column">
                    <div class="sec-title light">
                        <span class="sub-title">{{ $offers->subheading }}</span>
                        <h2>{{ $offers->heading }}</h2>
                        <div class="text">
                            {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($offers->text))) !!}
                        </div>
                    </div>
                    <div class="info-box">
                        <i class="icon {{ $offers->icon }}"></i>
                        <h5 class="title">
                            {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($offers->tagline))) !!}
                        </h5>
                    </div>
                    <ul class="list-style-two">
                        @foreach($offer_elements as $item)
                        <li><i class="fa fa-check-circle"></i> {{ $item->item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="image-column position-relative col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="image-box">
                        <figure class="image"><img src="{{ asset('uploads/'.$offers->photo ) }}" alt=""></figure>
                        <div class="caption-box wow slideInRight">
                            <div class="icon-box">
                                <a href="https://www.youtube.com/watch?v={{ $offers->youtube_video_id }}" class="play-now-home4 lightbox-image"><i class="icon fa fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


@if($home_3_page_items->portfolio_status == 'Show')
<section class="home4-projects-section pt-120">
    <div class="upper-box">
        <div class="auto-container">
            <div class="sec-title">
                <div class="row">
                    <div class="col-lg-7">
                        <span class="sub-title">{{ $home_3_page_items->portfolio_subheading }}</span>
                        <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_3_page_items->portfolio_heading))) !!}</h2>
                    </div>
                    <div class="col-lg-5">
                        <div class="text">{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_3_page_items->portfolio_text))) !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-0">
        <div class="row">
            <div class="col-12">
                <div class="carousel-outer">
                    <div class="projects-carousel-home4 owl-carousel owl-theme default-navs">
                        @foreach($portfolios->take($home_3_page_items->portfolio_how_many) as $portfolio)
                        <div class="project-block-home4">
                            <div class="image-box">
                                <figure class="image"><a href="{{ asset('uploads/'.$portfolio->photo) }}" class="lightbox-image"><img src="{{ asset('uploads/'.$portfolio->photo) }}" alt=""></a> </figure>
                                <div class="caption-box">
                                    <h4 class="title"><a href="{{ route('portfolio',$portfolio->slug) }}">{{ $portfolio->name }}</a></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


@if($home_3_page_items->video_status == 'Show')
<section class="video-section p-0">
    <div class="auto-container">
        <div class="video-box video-box1">
            <div class="bg bg-image" style="background-image: url({{ asset('uploads/'.$video_one_items->photo) }})"></div>
            <div class="bg bg-overlay"></div>
            <a href="https://www.youtube.com/watch?v={{ $video_one_items->youtube_video_id }}" class="play-btn" data-fancybox="gallery" data-caption=""><i class="icon fa fa-play" aria-hidden="true"></i></a>
        </div>
    </div>
</section>
@endif


@if($home_3_page_items->feature_status == 'Show')
<section class="features-section-three pull-up">
    <div class="bg bg-pattern-8"></div>
    <div class="auto-container">
        <div class="row">
            <div class="title-column col-lg-6 col-md-12">
                <div class="inner-column">
                    <div class="sec-title light">
                        <span class="sub-title">{{ $feature_two_items->subheading }}</span>
                        <h2>{{ $feature_two_items->heading }}</h2>
                    </div>
                    <div class="info-box">
                        <figure class="image"><img src="{{ asset('uploads/'.$feature_two_items->photo) }}" alt=""></figure>
                        <div class="text">
                            {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($feature_two_items->text))) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-column col-lg-6 col-md-12">
                <div class="inner-column">
                    <ul class="info-list">
                        @foreach($feature_two_item_elements as $item)
                        <li>{{ $item->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


@if($home_3_page_items->call_to_action_status == 'Show')
<section class="call-to-action-two">
    <div class="auto-container">
        <div class="outer-box wow fadeIn">
            <div class="bg bg-pattern-10"></div>
            <div class="title-box">
                <h4 class="title">
                    {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($call_to_action->text))) !!}
                </h4>
            </div>
            <div class="icon-box">
                <i class="icon {{ $call_to_action->icon }}"></i>
            </div>
            <div class="info-box">
                <a href="tel:{{ $call_to_action->phone }}" class="num">{{ $call_to_action->phone }}</a>
                <a href="mailto:{{ $call_to_action->email }}" class="mail">{{ $call_to_action->email }}</a>
            </div>
        </div>
    </div>
</section>
@endif


@if($home_3_page_items->client_status == 'Show')
<section class="clients-section">
    <div class="auto-container">
        <div class="sponsors-outer">
            <ul class="clients-carousel owl-carousel owl-theme">
                @foreach($clients as $item)
                <li class="client-block">
                    @if($item->url!='')
                    <a href="{{ $item->url }}">
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="">
                    </a>
                    @else
                    <a href="javascript:void;">
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="">
                    </a>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endif


@if($home_3_page_items->team_member_status == 'Show')
<section class="team-section bg-f7 pb-30">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">{{ $home_3_page_items->team_member_subheading }}</span>
            <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_3_page_items->team_member_heading))) !!}</h2>
        </div>

        <div class="row">
            @foreach($team_members->take($home_3_page_items->team_member_how_many) as $item)
            <div class="col-lg-4 col-sm-6 wow fadeInUp">
                <div class="team-block-home4">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="{{ route('team_member',$item->slug) }}"><img src="{{ asset('uploads/'.$item->photo) }}" alt=""></a></figure>
                            <div class="social-links">
                                @if($item->facebook != '')
                                <a href="{{ $item->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($item->twitter != '')
                                <a href="{{ $item->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($item->linkedin != '')
                                <a href="{{ $item->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if($item->instagram != '')
                                <a href="{{ $item->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($item->youtube != '')
                                <a href="{{ $item->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if($item->pinterest != '')
                                <a href="{{ $item->pinterest }}" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                            @endif
                            </div>
                            <span class="share-icon fas fa-plus"></span>
                        </div>
                        <div class="info-box">
                            <span class="designation">{{ $item->designation }}</span>
                            <h4 class="name"><a href="{{ route('team_member',$item->slug) }}">{{ $item->name }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@if($home_3_page_items->contact_status == 'Show')
<section class="contact-section-two">
    <div class="bg bg-pattern-11"></div>
    <div class="image-box">
        <div class="image"><img src="{{ asset('uploads/'.$home_contact_photos->home_3_contact_photo) }}" alt=""></div>
        <div class="image-overlay"></div>
    </div>
    <div class="auto-container">
        <div class="row">
            <div class="form-column col-lg-7 col-md-12">
                <div class="inner-column">
                    <div class="sec-title light">
                        <span class="sub-title">{{ $home_3_page_items->contact_subheading }}</span>
                        <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_3_page_items->contact_heading))) !!}</h2>
                    </div>
                    <div class="contact-form wow fadeInLeft">
                        <form method="post" action="{{ route('contact_send_message') }}" id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <input type="text" name="name" placeholder="{{ __('Full Name') }}" required>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <input type="email" name="email" placeholder="{{ __('Email Address') }}" required>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="subject" placeholder="{{ __('Subject') }}" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea name="message" placeholder="{{ __('Message') }}" required></textarea>
                                </div>
                                @if($global_setting->google_recaptcha_status == 'Show')
                                <div class="form-group col-lg-12">
                                    <div class="g-recaptcha" data-sitekey="{{ $global_setting->google_recaptcha_site_key }}"></div>
                                </div>
                                @endif
                                <div class="form-group col-lg-12">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">{{ __('Send Message') }}</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection