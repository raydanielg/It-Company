@extends('front.layouts.master')

@section('seo_title', $global_other_page_items->page_testimonials_seo_title)
@section('seo_meta_description', $global_other_page_items->page_testimonials_seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $global_other_page_items->page_testimonials_title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li>{{ $global_other_page_items->page_testimonials_title }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="pt-120 pb-120">
    <div class="auto-container">
        <div class="row">
            <div class="testimonial-column col-xl-12 col-lg-12">
                <div class="inner-column">
                    <div class="testimonial-carousel-one owl-carousel default-navs">
                        @foreach($testimonials as $testimonial)
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="content-box">
                                    <div class="text">
                                        {!! clean(nl2br($testimonial->comment)) !!}
                                    </div>
                                </div>
                                <div class="info-box">
                                    <div class="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $testimonial->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <figure class="thumb"><img src="{{ asset('uploads/'.$testimonial->photo) }}" alt=""></figure>
                                    <h5 class="name">{{ $testimonial->name }}</h5>
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
@endsection