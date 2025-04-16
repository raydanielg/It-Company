@extends('front.layouts.master')

@section('seo_title', $global_other_page_items->page_terms_seo_title)
@section('seo_meta_description', $global_other_page_items->page_terms_seo_meta_description)

@section('content')
<!-- Start main-content -->
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $global_other_page_items->page_terms_title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li>{{ $global_other_page_items->page_terms_title }}</li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->

<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! clean($global_other_page_items->page_terms_content) !!}
            </div>
        </div>
    </div>
</section>
@endsection