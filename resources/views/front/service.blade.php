@extends('front.layouts.master')

@section('seo_title', $service->seo_title)
@section('seo_meta_description', $service->seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $service->name }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li><a href="{{ route('services') }}">{{ $global_other_page_items->page_services_title }}</a></li>
                <li>{{ $service->name }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="services-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="service-sidebar">
                    <div class="sidebar-widget service-sidebar-single">
                        <div class="sidebar-service-list">
                            <ul>
                                @foreach($services as $item)
                                <li><a href="{{ route('service',$item->slug) }}" class="current"><i class="fas @if(session('sess_lang_direction') == 'Right to Left (RTL)') fa-angle-left @else fa-angle-right @endif"></i><span>{{ $item->name }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>

                        @if($service->phone != null)
                        <div class="service-details-help">
                            <div class="help-shape-1"></div>
                            <div class="help-shape-2"></div>
                            <h2 class="help-title">{{ __('Contact with us for any advice') }}</h2>
                            <div class="help-icon">
                                <span class=" lnr-icon-phone-handset"></span>
                            </div>
                            <div class="help-contact">
                                <p>{{ __('Need help? Talk to an expert') }}</p>
                                <a href="tel:{{ $service->phone }}">{{ $service->phone }}</a>
                            </div>
                        </div>
                        @endif

                        @if($service->pdf != null)
                        <div class="sidebar-widget service-sidebar-single mt-4">
                            <div class="service-sidebar-single-btn wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1200m">
                                <a href="{{ asset('uploads/'.$service->pdf) }}" class="theme-btn btn-style-one d-grid"><span class="btn-title"><span class="fas fa-file-pdf"></span> {{ __('Download PDF File') }}</span></a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="services-details__content">
                    @if($service->banner != null)
                        <img src="{{ asset('uploads/'.$service->banner) }}" alt="">
                    @endif
                    <h3 class="mt-4">{{ __('Service Overview') }}</h3>
                    <div class="content mt-40">
                        <div class="text">
                            <p>
                                {!! clean($service->description) !!}
                            </p>
                        </div>
                    </div>
                    <div class=" mt-25">
                        <h3>{{ __('Frequently Asked Questions') }}</h3>
                        <ul class="accordion-box wow fadeInRight">                            
                            @foreach($faqs as $faq)
                            <li class="accordion block">
                                <div class="acc-btn">{{ $faq->question }}
                                    <div class="icon fa fa-plus"></div>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">
                                            <p>{!! clean($faq->answer) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection