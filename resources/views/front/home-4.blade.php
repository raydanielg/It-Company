@extends('front.layouts.master')

@section('seo_title', $global_setting->home_seo_title)
@section('seo_meta_description', $global_setting->home_seo_meta_description)

@section('dark_mode')
<link href="{{ asset('dist-front/css/style-dark.css') }}" rel="stylesheet">
@endsection

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

@if($home_4_page_items->service_status == 'Show')
<section class="services-section-two">
    <div class="bg bg-pattern-12"></div>
    <div class="auto-container">
        <div class="sec-title text-center light">
            <span class="sub-title">{{ $home_4_page_items->service_subheading }}</span>
            <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_4_page_items->service_heading))) !!}</h2>
        </div>
        <div class="row">
            @foreach($services->take(3) as $service)
            <div class="service-block-two col-lg-4 col-md-6 coll-md-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="{{ asset('uploads/'.$service->photo) }}" alt=""></figure>
                    </div>
                    <div class="title-box">
                        <h5 class="title"><a href="{{ route('service',$service->slug) }}">{{ $service->name }}</a></h5>
                    </div>
                    <div class="content-box">
                        <i class="icon {{ $service->icon }}"></i>
                        <div class="text">{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($service->short_description))) !!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@if($home_4_page_items->marquee_status == 'Show')
<div class="marquee-section">
    <div class="marquee">
        <div class="marquee-group">
            @foreach($marquees as $item)
            <div class="text">{{ $item->item }}</div>
            @endforeach
        </div>
        <div aria-hidden="true" class="marquee-group">
            @foreach($marquees as $item)
            <div class="text">{{ $item->item }}</div>
            @endforeach
        </div>
    </div>
</div>
@endif


@if($home_4_page_items->welcome_status == 'Show')
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


@if($home_4_page_items->portfolio_status == 'Show')
<section class="projects-section pt-0">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">{{ $home_4_page_items->portfolio_subheading }}</span>
            <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_4_page_items->portfolio_heading))) !!}</h2>
        </div>
        <div class="outer-box">
            <div class="row">
                @foreach($portfolios->take(4) as $portfolio)
                <div class=" project-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="{{ route('portfolio',$portfolio->slug) }}"><img src="{{ asset('uploads/'.$portfolio->photo) }}" alt=""></a></figure>
                        </div>
                        <div class="content-box">
                            <a href="{{ route('portfolio',$portfolio->slug) }}" class="icon"><i class="fa @if(session('sess_lang_direction') == 'Right to Left (RTL)') fa-long-arrow-alt-left @else fa-long-arrow-alt-right @endif"></i></a>
                            <h4 class="title"><a href="{{ route('portfolio',$portfolio->slug) }}" title="">{{ $portfolio->name }}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif


@if($home_4_page_items->why_choose_status == 'Show')
<section class="why-choose-us-two">
    <div class="anim-icons">
        <span class="icon icon-arrow1"></span>
    </div>
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-lg-6 col-md-12">
                <div class="inner-column wow fadeInRight">
                    <div class="sec-title">
                        <i class="sub-title">{{ $why_choose_two_items->subheading }}</i>
                        <h2>{{ $why_choose_two_items->heading }}</h2>
                    </div>
                    <div class="row">
                        @foreach($why_choose_two_item_elements as $item)
                        <div class="info-box col-lg-6 col-md-6">
                            <div class="inner">
                                <div class="title-box">
                                    <i class="icon {{ $item->icon }}"></i>
                                    <h5 class="title">
                                        {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($item->heading))) !!}
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="image-column col-lg-6 col-md-12">
                <div class="inner-column">
                    <div class="image-box">
                        <figure class="image anim-overlay"><img src="{{ asset('uploads/'.$why_choose_two_items->photo) }}" alt=""></figure>
                        <div class="content-box">
                            <div class="text">
                                {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($why_choose_two_items->photo_over_text))) !!}
                            </div>
                            <div class="caption">{{ $why_choose_two_items->photo_over_heading }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


@if($home_4_page_items->testimonial_status == 'Show')
<section class="testimonial-section-two">
    <div class="bg bg-pattern-9"></div>
    <div class="auto-container">
        <div class="row">
            <div class="title-column col-xl-3 col-lg-4 col-md-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="sub-title">{{ $home_4_page_items->testimonial_subheading }}</span>
                        <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_4_page_items->testimonial_heading))) !!}</h2>
                        <div class="text">{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_4_page_items->testimonial_text))) !!}</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-column col-xl-9 col-lg-8 col-md-12">
                <div class="inner-column">
                    <div class="testimonial-carousel-two owl-carousel default-navs">
                        @foreach($testimonials as $testimonial)
                        <div class="testimonial-block-two">
                            <div class="inner-box">
                                <div class="content-box">
                                    <figure class="thumb"><img src="{{ asset('uploads/'.$testimonial->photo) }}" alt=""></figure>
                                    <div class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $testimonial->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="text">{!! clean(nl2br($testimonial->comment)) !!}</div>
                                    <div class="info-box">
                                        <h6 class="name">{{ $testimonial->name }}</h6>
                                        <span class="designation">{{ $testimonial->designation }}</span>
                                    </div>
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


@if($home_4_page_items->team_member_status == 'Show')
<section class="team-section pb-0">    
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">{{ $home_4_page_items->team_member_subheading }}</span>
            <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_4_page_items->team_member_heading))) !!}</h2>
        </div>
        <div class="row">
            @foreach($team_members->take(3) as $item)
            <div class="team-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="info-box">
                        <h4 class="name"><a href="{{ route('team_member',$item->slug) }}">{{ $item->name }}</a></h4>
                        <span class="designation">{{ $item->designation }}</span>
                    </div>
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
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@if($home_4_page_items->client_status == 'Show')
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


@if($home_4_page_items->contact_status == 'Show')
<section class="contact-section-two">
    <div class="bg bg-pattern-11"></div>
    <div class="image-box">
        <div class="image"><img src="{{ asset('uploads/'.$home_contact_photos->home_4_contact_photo) }}" alt=""></div>
        <div class="image-overlay"></div>
    </div>
    <div class="auto-container">
        <div class="row">
            <div class="form-column col-lg-7 col-md-12">
                <div class="inner-column">
                    <div class="sec-title light">
                        <span class="sub-title">{{ $home_4_page_items->contact_subheading }}</span>
                        <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_4_page_items->contact_heading))) !!}</h2>
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


@if($home_4_page_items->blog_status == 'Show')
<section class="news-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">{{ $home_4_page_items->blog_subheading }}</span>
            <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_4_page_items->blog_heading))) !!}</h2>
        </div>
        <div class="row">
            @foreach($posts->take(3) as $post)
            <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><a href="{{ route('post',$post->slug) }}"><img src="{{ asset('uploads/'.$post->photo) }}" alt=""></a></figure>
                    </div>
                    <div class="content-box">
                        <span class="date">{{ $post->created_at->format('d M, Y') }}</span>
                        <ul class="post-info">
                            <li><i class="fa fa-user-circle"></i> {{ __('by Admin') }}</li>
                        </ul>
                        <h4 class="title"><a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a></h4>
                        <a href="{{ route('post',$post->slug) }}" class="read-more">{{ __('Read More') }} <i class="fa @if(session('sess_lang_direction') == 'Right to Left (RTL)') fa-long-arrow-alt-left @else fa-long-arrow-alt-right @endif"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@if($home_4_page_items->map_status == 'Show')
@if($global_setting->map != '')
<section class="map-section">
    {!! $global_setting->map !!}
</section>
@endif
@endif

@endsection