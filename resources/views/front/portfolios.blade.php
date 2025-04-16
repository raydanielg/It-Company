@extends('front.layouts.master')

@section('seo_title', $global_other_page_items->page_portfolios_seo_title)
@section('seo_meta_description', $global_other_page_items->page_portfolios_seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $global_other_page_items->page_portfolios_title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li>{{ $global_other_page_items->page_portfolios_title }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="projects-section">
    <div class="auto-container">
        <div class="">
            <div class="row">
                @foreach($portfolios as $portfolio)
                <div class=" project-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="{{ route('portfolio',$portfolio->slug) }}"><img src="{{ asset('uploads/'.$portfolio->photo) }}" alt="{{ $portfolio->name }}"></a></figure>
                        </div>
                        <div class="content-box">
                            <a href="{{ route('portfolio',$portfolio->slug) }}" class="icon"><i class="fa @if(session('sess_lang_direction') == 'Right to Left (RTL)') fa-long-arrow-alt-left @else fa-long-arrow-alt-right @endif"></i></a>
                            <h4 class="title"><a href="{{ route('portfolio',$portfolio->slug) }}" title="{{ $portfolio->name }}">{{ $portfolio->name }}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection