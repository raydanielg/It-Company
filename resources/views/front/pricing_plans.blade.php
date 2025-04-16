@extends('front.layouts.master')

@section('seo_title', $global_other_page_items->page_pricing_seo_title)
@section('seo_meta_description', $global_other_page_items->page_pricing_seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $global_other_page_items->page_pricing_title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li>{{ $global_other_page_items->page_pricing_title }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="">
    <div class="container pb-70">
        <div class="row">
            @foreach($pricing_plans as $item)
            <div class="col-xl-4 col-lg-4">
                <div class="pricing-block">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('uploads/'.$item->photo) }}" alt=""></figure>
                        <div class="price-box">
                            <h4 class="price"><sup>{{ $global_setting->currency_symbol }}</sup>{{ $item->price }}</h4>
                            <span class="validaty">/ {{ $item->period }}</span>
                        </div>
                        <h4 class="title">{{ $item->name }}</h4>
                        <ul class="features">
                            @php
                                $option_list = DB::table('pricing_plan_options')->where('pricing_plan_id', $item->id)->get();
                            @endphp
                            @foreach($option_list as $item1)
                                <li>{{ $item1->name }}</li>
                            @endforeach
                        </ul>
                        <div class="btn-box">
                            <a href="{{ $item->button_url }}" class="theme-btn btn-style-one hvr-light"><span class="btn-title">{{ $item->button_text }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection