@extends('front.layouts.master')

@section('seo_title', $post->seo_title)
@section('seo_meta_description', $post->seo_meta_description)

@section('content')

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons' async='async'></script>

<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $post->title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li><a href="{{ route('blog') }}">{{ $global_other_page_items->page_blog_title }}</a></li>
                <li>{{ $post->title }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="blog-details__left">
                    <div class="blog-details__img">
                        <img src="{{ asset('uploads/'.$post->photo) }}" alt="">
                        <div class="blog-details__date">
                            <span class="day">
                                {{ $post->created_at->format('d') }}
                            </span>
                            <span class="month">
                                {{ $post->created_at->format('M') }}
                            </span>
                        </div>
                    </div>
                    <div class="blog-details__content">
                        <ul class="list-unstyled blog-details__meta">
                            <li><a href="javascript:void;"><i class="fas fa-user-circle"></i> {{ __('Admin') }}</a></li>
                        </ul>
                        <p class="blog-details__text-2">
                            {!! clean($post->description) !!}
                        </p>
                    </div>
                    <div class="blog-details__bottom">
                        @if(count($post_tags) != 0)
                        <p class="blog-details__tags"> <span>{{ __('Tags') }}</span> 
                            @for($i=0;$i<count($post_tags);$i++)
                            <a href="{{ route('tag',$post_tags[$i]) }}">{{ $post_tags[$i] }}</a>
                            @endfor
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search">
                        <form action="{{ route('search') }}" class="sidebar__search-form" method="get">
                            <input name="search_text" type="search" placeholder="Search here" required>
                            <button type="submit"><i class="lnr-icon-search"></i></button>
                        </form>
                    </div>
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">{{ __('Latest Posts') }}</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @foreach($latest_posts as $item)
                            <li>
                                <div class="sidebar__post-image"> <img src="{{ asset('uploads/'.$item->photo) }}" alt=""> </div>
                                <div class="sidebar__post-content">
                                    <h3> <span class="sidebar__post-content-meta"><i
                                        class="fas fa-user-circle"></i>{{ __('Admin') }}</span> <a href="{{ route('post',$item->slug) }}">{{ $item->title }}</a>
                                    </h3>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__single sidebar__category">
                        <h3 class="sidebar__title mb-20">{{ __('Categories') }}</h3>
                        <ul class="sidebar__category-list list-unstyled">
                            @foreach($post_categories as $item)
                            <li>
                                <a href="{{ route('category', $item->slug) }}">{{ $item->name }}<span
                                class="icon-right-arrow"></span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    @if(count($tags) != 0)
                    <div class="sidebar__single sidebar__tags">
                        <h3 class="sidebar__title">{{ __('Tags') }}</h3>
                        <div class="sidebar__tags-list">
                            @for($i=0;$i<count($tags);$i++)
                            <a href="{{ route('tag', $tags[$i]) }}">{{ $tags[$i] }}</a>
                            @endfor
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endsection