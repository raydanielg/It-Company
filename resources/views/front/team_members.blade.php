@extends('front.layouts.master')

@section('seo_title', $global_other_page_items->page_team_members_seo_title)
@section('seo_meta_description', $global_other_page_items->page_team_members_seo_meta_description)

@section('content')
<section class="page-title" style="background-image: url({{ asset('uploads/'.$global_setting->banner) }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">{{ $global_other_page_items->page_team_members_title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li>{{ $global_other_page_items->page_team_members_title }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="team-section">    
    <div class="auto-container">
        <div class="row">
            @foreach($team_members as $item)
            <div class="team-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="info-box">
                        <h4 class="name"><a href="{{ route('team_member',$item->slug) }}">{{ $item->name }}</a></h4>
                        <span class="designation">{{ $item->designation }}</span>
                    </div>
                    <div class="image-box">
                        <figure class="image"><a href="{{ route('team_member',$item->slug) }}"><img src="{{ asset('uploads/'.$item->photo) }}" alt=""></a></figure> 
                        <div class="social-links">
                            @if($item->facebook != '')
                                <a href="{{ $item->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($item->twitter != '')
                                <a href="{{ $item->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($item->linkedin != '')
                                <a href="{{ $item->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if($item->instagram != '')
                                <a href="{{ $item->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($item->youtube != '')
                                <a href="{{ $item->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if($item->pinterest != '')
                                <a href="{{ $item->pinterest }}" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                            @endif
                        </div>
                        <span class="share-icon fas fa-plus"></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection