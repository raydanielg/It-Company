@extends('front.layouts.master')

@section('seo_title', $global_other_page_items->page_faq_seo_title)
@section('seo_meta_description', $global_other_page_items->page_faq_seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $global_other_page_items->page_faq_title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li>{{ $global_other_page_items->page_faq_title }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="accordion-box wow fadeInRight">
                    @foreach($faqs as $faq)
                    <li class="accordion block @if($loop->iteration == 1) active-block @endif">
                        <div class="acc-btn @if($loop->iteration == 1) active @endif">{{ $faq->question }}
                            <div class="icon fa fa-plus"></div>
                        </div>
                        <div class="acc-content @if($loop->iteration == 1) current @endif">
                            <div class="content">
                                <div class="text">
                                    {!! clean($faq->answer) !!}
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection