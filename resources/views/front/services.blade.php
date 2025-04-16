@extends('front.layouts.master')

@section('seo_title', $global_other_page_items->page_services_seo_title)
@section('seo_meta_description', $global_other_page_items->page_services_seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $global_other_page_items->page_services_title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li>{{ $global_other_page_items->page_services_title }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="services-section">
    <div class="auto-container">
        <div class="row">
            @foreach($services as $service)
            <div class="service-block col-lg-3 col-md-6 coll-md-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="{{ asset('uploads/'.$service->photo) }}" alt="{{ $service->name }}"></figure>
                    </div>
                    <div class="content-box">
                        <i class="icon {{ $service->icon }}"></i>
                        <h5 class="title">{{ $service->name }}</h5>
                    </div>
                    <div class="hover-content">
                        <i class="icon {{ $service->icon }}"></i>
                        <h5 class="title"><a href="{{ route('service',$service->slug) }}">{{ $service->name }}</a></h5>
                        <div class="text">
                            {!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($service->short_description))) !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection