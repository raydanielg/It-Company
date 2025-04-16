@extends('front.layouts.master')

@section('seo_title', $custom_page->seo_title)
@section('seo_meta_description', $custom_page->seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $custom_page->name }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li>{{ $custom_page->name }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col">
                {!! clean(nl2br($custom_page->content)) !!}
            </div>
        </div>
    </div>
</section>
@endsection