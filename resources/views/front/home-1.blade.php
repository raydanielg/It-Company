@extends('front.layouts.master')

@section('seo_title', $global_setting->home_seo_title)
@section('seo_meta_description', $global_setting->home_seo_meta_description)

@section('content')

<!-- Slider Section -->
<section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme default-navs">
        @foreach($sliders as $item)
        <div class="slide-item">
            <div class="bg-image" style="background-image: url({{ asset('uploads/'.$item->photo) }});"></div>
            <div class="auto-container">
                <div class="content-box">
                    @if($item->text!='')
                    <h1 class="title animate-1">
                        {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($item->text))) !!}
                    </h1>
                    @endif
                    @if($item->button_text!='')
                    <div class="btn-box animate-2">
                        <a href="{{ $item->button_url }}" class="theme-btn btn-style-one hover-light"><span class="btn-title">{{ $item->button_text }}</span></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- End Slider Section -->


@if($home_1_page_items->service_on_slider_status == 'Show')
<section class="services-section-home3 pt-0 pb-90">
    <div class="auto-container">
        <div class="outer-box">
            <div class="row row-cols-sm-2 row-cols-md-3 row-cols-xl-5 justify-content-center">
                @foreach($services->take($home_1_page_items->service_on_slider_how_many) as $service)
                <div class="service-block-new-3 at-home6 col wow fadeInUp">
                    <div class="inner-box ">
                        <i class="icon {{ $service->icon }}"></i>
                        <h6 class="title"><a href="{{ route('service',$service->slug) }}">{{ $service->name }}</a></h6>
                        <div class="text">{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($service->short_description))) !!}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif


@if($home_1_page_items->welcome_status == 'Show')
<section class="about-section pt-0">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2 wow fadeInRight">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="sub-title">{{ $welcome_one_items->subheading }}</span>
                        <h2>{{ $welcome_one_items->heading }}</h2>
                        <div class="text">
                            {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($welcome_one_items->text))) !!}
                        </div>
                    </div>
                    @foreach($welcome_one_item_elements as $item)
                    <div class="info-box">
                        <div class="inner">
                            <i class="icon {{ $item->icon }}"></i>
                            <h5 class="title">{{ $item->heading }}</h5>
                            <div class="text">
                                {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($item->text))) !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{ $welcome_one_items->button_url }}" class="theme-btn btn-style-one"><span class="btn-title">{{ $welcome_one_items->button_text }}</span></a>
                </div>
            </div>
            <div class="image-column col-lg-6 col-md-12 col-sm-12 wow fadeInLeft">
                <div class="image-box">
                    <span class="icon-dots bounce-y"></span>
                    <span class="icon-circle zoom-one"></span>
                    <figure class="image-1 wow fadeIn"><img src="{{ asset('uploads/'.$welcome_one_items->photo1) }}" alt=""></figure>
                    <figure class="image-2 wow fadeIn" data-wow-delay="600ms"><img src="{{ asset('uploads/'.$welcome_one_items->photo2) }}" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


@if($home_1_page_items->service_status == 'Show')
<section class="services-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">{{ $home_1_page_items->service_subheading }}</span>
            <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_1_page_items->service_heading))) !!}</h2>
        </div>
        <div class="row">
            @foreach($services->take($home_1_page_items->service_how_many) as $service)
            <div class="service-block-new-1 col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><a href="{{ route('service',$service->slug) }}"><img src="{{ asset('uploads/'.$service->photo) }}" alt="{{ $service->name }}"></a></figure>
                        <div class="icon-box"><i class="icon {{ $service->icon }}"></i></div>
                    </div>
                    <div class="content-box">
                        <h5 class="title"><a href="{{ route('service',$service->slug) }}">{{ $service->name }}</a></h5>
                        <div class="text">
                            {!! clean(nl2br($service->short_description)) !!}
                        </div>
                        <a href="{{ route('service',$service->slug) }}" class="read-more">{{ __('Read More') }} <i class="@if(session('sess_lang_direction') == 'Right to Left (RTL)') fa fa-long-arrow-alt-left @else fa fa-long-arrow-alt-right @endif"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@if($home_1_page_items->video_one_status == 'Show')
<section class="video-section-new-3">
    <div class="auto-container">
        <div class="video-box-new-3">
            <div class="bg">
                <div class="bg bg-image" style="background-image: url({{ asset('uploads/'.$video_one_items->photo) }})"></div>
                <div class="overlay"></div>
            </div>
            <div class="content">
                <div class="btn-box">
                    <a href="https://www.youtube.com/watch?v={{ $video_one_items->youtube_video_id }}" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon fa fa-play" aria-hidden="true"></i><span class="ripple"></span></a>
                </div>
                <h2 class="title">{{ $video_one_items->heading }}</h2>
            </div>
        </div>
    </div>
</section>
@endif


@if($home_1_page_items->fun_fact_status == 'Show')
<section class="fun-fact-section-new-3">
    <div class="auto-container">
        <div class="outer-box">
            <div class="row">
                <div class="title-column col-lg-6">
                    <div class="inner-column">
                        <div class="sec-title light">
                            <span class="sub-title">{{ $fun_facts->subheading }}</span>
                            <h2>{{ $fun_facts->heading }}</h2>
                            <div class="text">
                                {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($fun_facts->text))) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column col-lg-6">
                    <div class="fact-counter">
                        <div class="row">
                            @foreach($fun_fact_elements as $item)
                            <div class="counter-block-new-3 col-lg-4 col-md-4 col-sm-6 wow fadeInUp">
                                <div class="inner">
                                    <div class="content">
                                        <i class="icon {{ $item->icon }}"></i>
                                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="{{ $item->number }}">0</span></div>
                                        <h6 class="counter-title">{{ $item->name }}</h6>
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
@endif


@if($home_1_page_items->portfolio_status == 'Show')
<section class="projects-section-home3">
    <div class="upper-box">
        <div class="auto-container">
            <div class="sec-title">
                <span class="sub-title">{{ $home_1_page_items->portfolio_subheading }}</span>
                <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_1_page_items->portfolio_heading))) !!}</h2>
            </div>
        </div>
    </div>
    <div class="carousel-outer">
        <div class="projects-carousel owl-carousel owl-theme default-navs">
            @foreach($portfolios->take($home_1_page_items->portfolio_how_many) as $portfolio)
            <div class="project-block-home3">
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
</section>
@endif


@if($home_1_page_items->contact_status == 'Show')
<section class="contact-section pt-120">
    <div class="anim-icons">
        <span class="icon icon-line3"></span>
        <span class="icon icon-arrow1"></span>
        <span class="icon icon-arrow2"></span>
    </div>
    <div class="auto-container">
        <div class="outer-box">
            <div class="bg bg-pattern-5"></div>

            <div class="sec-title">
                <span class="sub-title">{{ $home_1_page_items->contact_subheading }}</span>
                <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_1_page_items->contact_heading))) !!}</h2>
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
                        <div class="form-group col-lg-12">
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
            <figure class="image"><img src="{{ asset('uploads/'.$home_contact_photos->home_1_contact_photo) }}" alt=""></figure>
        </div>
    </div>
</section>
@endif


@if($home_1_page_items->blog_status == 'Show')
<section class="news-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">{{ $home_1_page_items->blog_subheading }}</span>
            <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_1_page_items->blog_heading))) !!}</h2>
        </div>
        <div class="row">
            @foreach($posts->take($home_1_page_items->blog_how_many) as $post)
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
                        <a href="{{ route('post',$post->slug) }}" class="read-more">{{ __('Read More') }} <i class="@if(session('sess_lang_direction') == 'Right to Left (RTL)') fa fa fa-long-arrow-alt-left @else fa fa-long-arrow-alt-right @endif"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@if($home_1_page_items->video_two_status == 'Show')
<section class="video-section pull-down">
    <div class="bg bg-pattern-4"></div>
    <div class="auto-container">
        <div class="sec-title text-center light">
            <a href="https://www.youtube.com/watch?v={{ $video_two_items->youtube_video_id }}" class="play-btn" data-fancybox="gallery" data-caption=""><i class="icon fa fa-play" aria-hidden="true"></i></a>
            <h2>
                {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($video_two_items->heading))) !!}
            </h2>
        </div>
    </div>
</section>
@endif


@if($home_1_page_items->feature_status == 'Show')
<section class="features-section-two pt-0">
    <div class="auto-container">
        <div class="outer-box">
            <div class="row">
                <div class="title-column col-lg-3">
                    <div class="inner-column">
                        <h4 class="title">
                            {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($feature_one_items->text))) !!}
                        </h4>
                        <figure class="image"><img src="{{ asset('uploads/'.$feature_one_items->photo) }}" alt=""></figure>
                    </div>
                </div>
                @foreach($feature_one_item_elements as $item)
                <div class="feature-block-two col-lg-3 col-md-4 col-sm-6">
                    <div class="inner-box">
                        <i class="icon {{ $item->icon }}"></i>
                        <h5 class="title">{{ $item->heading }}</h5>
                        <div class="text">
                            {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($item->text))) !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif


@if($home_1_page_items->testimonial_status == 'Show')
<section class="testimonial-section-home5-v2">
    <div class="bg bg-pattern-7"></div>
    <div class="auto-container">
        <div class="row">
            <div class="title-column col-xl-3 col-lg-12">
                <div class="sec-title">
                    <span class="sub-title">{{ $home_1_page_items->testimonial_subheading }}</span>
                    <h2>{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_1_page_items->testimonial_heading))) !!}</h2>
                    <div class="text">
                        {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($home_1_page_items->testimonial_text))) !!}
                    </div>
                </div>
            </div>
            <div class="testimonial-column col-xl-9 col-lg-12">
                <div class="inner-column">
                    <div class="testimonial-carousel owl-carousel owl-theme">
                        @foreach($testimonials as $testimonial)
                        <div class="testimonial-block-home5-v2">
                            <div class="inner-box">
                                <div class="content-box">
                                    <div class="thumb"><img src="{{ asset('uploads/'.$testimonial->photo) }}" alt=""></div>
                                    <div class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $testimonial->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="text">
                                        {!! clean(nl2br($testimonial->comment)) !!}
                                    </div>
                                </div>
                                <div class="info-box">
                                    <h6 class="name">{{ $testimonial->name }}</h6>
                                    <span class="designation">{{ $testimonial->designation }}</span>
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


@if($home_1_page_items->why_choose_status == 'Show')
<section class="why-choose-us-home5 py-0">
    <div class="auto-container">
        <div class="outer-box">
            <div class="row align-items-center">
                <div class="content-column mb-0 col-xl-6 col-lg-7 order-2 wow fadeInRight" data-wow-delay="600ms">
                    <div class="inner-column mb-5 mb-xl-0">
                        <div class="sec-title">
                            <span class="sub-title">{{ $why_choose_one_items->subheading }}</span>
                            <h2>{{ $why_choose_one_items->heading }}</h2>
                            <div class="text">
                                {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($why_choose_one_items->text))) !!}
                            </div>
                        </div>
                        <div class="row">
                            @foreach($why_choose_one_item_elements as $item)
                            <div class="col-md-6">
                                <div class="feature-box">
                                    <i class="icon {{ $item->icon }}"></i>
                                    <h6 class="title">{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($item->heading))) !!}</h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="image-column mb-0 col-xl-6 col-lg-5">
                    <div class="inner-column wow fadeInLeft">
                        <div class="image-box">
                            <figure class="image overlay-anim wow fadeInUp"><img src="{{ asset('uploads/'.$why_choose_one_items->photo) }}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($home_1_page_items->client_status == 'Show')
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

@endsection