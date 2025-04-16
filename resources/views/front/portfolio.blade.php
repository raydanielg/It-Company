@extends('front.layouts.master')

@section('seo_title', $portfolio->seo_title)
@section('seo_meta_description', $portfolio->seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $portfolio->name }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li><a href="{{ route('portfolios') }}">{{ $global_other_page_items->page_portfolios_title }}</a></li>
                <li>{{ $portfolio->name }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="project-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="project-details__top">
                    <div class="project-details__img">
                        <img src="{{ asset('uploads/'.$portfolio->banner) }}" alt="{{ $portfolio->name }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="project-details__content-right">
                    <div class="project-details__details-box">
                        <div class="row">
                            <div class="col">
                                <p class="project-details__client">{{ __('Date') }}</p>
                                <h4 class="project-details__name">{{ $portfolio->date }}</h4>
                            </div>
                            <div class="col">
                                <p class="project-details__client">{{ __('Client') }}</p>
                                <h4 class="project-details__name">{{ $portfolio->client }}</h4>
                            </div>
                            <div class="col">
                                <p class="project-details__client">{{ __('Website') }}</p>
                                <h4 class="project-details__name">{{ $portfolio->website }}</h4>
                            </div>
                            <div class="col">
                                <p class="project-details__client">{{ __('Location') }}</p>
                                <h4 class="project-details__name">{{ $portfolio->location }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-details__content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__content-left">
                        <h3 class="mb-4 mt-5">{{ __('About this project') }}</h3>
                        <p>
                            {!! clean($portfolio->description) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="project-details__pagination-box">
                    <ul class="project-details__pagination list-unstyled clearfix">
                        <li class="next">
                            <div class="icon">
                                @if($previous_slug == '')
                                <a href="javascript:;" aria-label="Previous"><i class="lnr lnr-icon-arrow-left"></i></a>
                                @else
                                <a href="{{ route('portfolio',$previous_slug) }}" aria-label="Previous"><i class="lnr lnr-icon-arrow-left"></i></a>
                                @endif
                            </div>
                            <div class="content">{{ __('Previous') }}</div>
                        </li>
                        <li class="count"><a href="#"></a></li>
                        <li class="count"><a href="#"></a></li>
                        <li class="count"><a href="#"></a></li>
                        <li class="count"><a href="#"></a></li>
                        <li class="previous">
                            <div class="content">{{ __('Next') }}</div>
                            <div class="icon">
                                @if($next_slug == '')
                                <a href="javascript:;" aria-label="Previous"><i class="lnr lnr-icon-arrow-right"></i></a>
                                @else
                                <a href="{{ route('portfolio',$next_slug) }}" aria-label="Previous"><i class="lnr lnr-icon-arrow-right"></i></a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection