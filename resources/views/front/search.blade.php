@extends('front.layouts.master')

@section('seo_title', $global_other_page_items->page_search_seo_title)
@section('seo_meta_description', $global_other_page_items->page_search_seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ __('Search By:') }} {{ $search_by }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li><a href="{{ route('blog') }}">{{ $global_other_page_items->page_blog_title }}</a></li>
                <li>{{ $search_by }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="news-section">
    <div class="auto-container">
        <div class="row">
            @forelse ($posts as $item)
                <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="{{ route('post',$item->slug) }}"><img src="{{ asset('uploads/'.$item->photo) }}" alt=""></a></figure>
                        </div>
                        <div class="content-box">
                            <span class="date">
                                {{ $item->created_at->format('d M, Y') }}
                            </span>
                            <ul class="post-info">
                                <li><i class="fa fa-user-circle"></i> {{ __('by Admin') }}</li>
                            </ul>
                            <h4 class="title"><a href="{{ route('post',$item->slug) }}">{{ $item->title }}</a></h4>
                            <a href="{{ route('post',$item->slug) }}" class="read-more">{{ __('Read More') }} <i class="fa fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-danger text-center">{{ __('No Post Found') }}</div>
            @endforelse
            <div class="col-md-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</section>
@endsection