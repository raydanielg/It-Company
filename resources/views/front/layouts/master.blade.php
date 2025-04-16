<!DOCTYPE html>
<html @if(session('sess_lang_direction') == 'Right to Left (RTL)') dir="rtl" @endif lang="{{ session('sess_lang_code') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title >@yield('seo_title')</title>
    <meta name="description" content="@yield('seo_meta_description')">
    
    <link rel="shortcut icon" href="{{ asset('uploads/'.$global_setting->favicon) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('uploads/'.$global_setting->favicon) }}" type="image/x-icon">

    @include('front.layouts.styles')

    @yield('dark_mode')

    @if($global_setting->sticky_header == 'Hide')
    <style >
        .sticky-header.fixed-header {
            display: none;
        }
    </style>
    @endif

    @if($global_setting->tawk_live_chat_status == 'Show')
		<style >
		.scroll-to-top {
			bottom: 50px!important;
		}
		</style>
    @endif

    @if($global_setting->cookie_consent_status == 'Show')
        <script src="https://cdn.websitepolicies.io/lib/cookieconsent/1.0.3/cookieconsent.min.js" defer></script><script >window.addEventListener("load",function(){window.wpcc.init({"colors":{"popup":{"background":"#{{ $global_setting->cookie_consent_bg_color }}","text":"#{{ $global_setting->cookie_consent_text_color }}","border":"#b3d0e4"},"button":{"background":"#{{ $global_setting->cookie_consent_button_bg_color }}","text":"#{{ $global_setting->cookie_consent_button_text_color }}"}},"position":"bottom","padding":"large","margin":"none","content":{"message":"{{ $global_setting->cookie_consent_message }}","button":"{{ $global_setting->cookie_consent_button_text }}"}})});</script>
    @endif

    @if($global_setting->google_analytic_status == 'Show')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $global_setting->google_analytic_id }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ $global_setting->google_analytic_id }}');
    </script>
    @endif

    <style >
    :root {
        --theme-color1: #{{ $global_setting->theme_color }};
    }
    </style>

</head>

<body>

    <div class="page-wrapper">
        
        @if($global_setting->preloader == 'Show')
        <div class="preloader"></div>
        @endif
        
        <!-- Main Header-->
        <header class="main-header header-style-two">
            
            @include('front.layouts.top')
            
            <div class="header-lower">
                <!-- Main box -->
                <div class="main-box">
                    <div class="logo-box">
                        <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('uploads/'.$global_setting->logo) }}" alt="{{ env('APP_NAME') }}"></a></div>
                    </div>

                    <!--Nav Box-->
                    <div class="nav-outer">    
                        <nav class="nav main-menu">
                            <ul class="navigation">

                                @if($global_setting->home_show == 'All')
                                <li class="{{ (Request::is('/')||Route::is('home_1')||Route::is('home_2')||Route::is('home_3')||Route::is('home_4')) ? 'current' : ''; }} dropdown"><a href="javascript:;">{{ __('Home') }}</a>
                                    <ul >
                                        <li ><a href="{{ route('home_1') }}">{{ __('Home Layout 1') }}</a></li>
                                        <li ><a href="{{ route('home_2') }}">{{ __('Home Layout 2') }}</a></li>
                                        <li ><a href="{{ route('home_3') }}">{{ __('Home Layout 3') }}</a></li>
                                        <li ><a href="{{ route('home_4') }}">{{ __('Home Layout 4') }}</a></li>
                                    </ul>
                                </li>
                                @endif

                                @if($global_setting->home_show == 'Home 1')
                                <li class="{{ Route::is('home_1') ? 'current' : ''; }}">
                                    <a href="{{ route('home_1') }}">{{ __('Home') }}</a>
                                </li>
                                @endif

                                @if($global_setting->home_show == 'Home 2')
                                <li class="{{ Route::is('home_2') ? 'current' : ''; }}">
                                    <a href="{{ route('home_2') }}">{{ __('Home') }}</a>
                                </li>
                                @endif

                                @if($global_setting->home_show == 'Home 3')
                                <li class="{{ Route::is('home_3') ? 'current' : ''; }}">
                                    <a href="{{ route('home_3') }}">{{ __('Home') }}</a>
                                </li>
                                @endif

                                @if($global_setting->home_show == 'Home 4')
                                <li class="{{ Route::is('home_4') ? 'current' : ''; }}">
                                    <a href="{{ route('home_4') }}">{{ __('Home') }}</a>
                                </li>
                                @endif


                                @foreach($global_menu as $item)
                                @php 
                                    $menu_arr[$item->name] = $item->status;
                                @endphp
                                @endforeach
                                <li class="dropdown"><a href="javascript:;">{{ __('Pages') }}</a>
                                    <ul >
                                        @if($menu_arr['About'] == 'Show')
                                        <li ><a href="{{ route('about') }}">{{ __('About Us') }}</a></li>
                                        @endif

                                        @if($menu_arr['Team Members'] == 'Show')
                                        <li ><a href="{{ route('team_members') }}">{{ __('Team') }}</a></li>
                                        @endif

                                        @if($menu_arr['Testimonials'] == 'Show')
                                        <li ><a href="{{ route('testimonials') }}">{{ __('Testimonial') }}</a></li>
                                        @endif

                                        @if($menu_arr['Pricing'] == 'Show')
                                        <li ><a href="{{ route('pricing_plans') }}">{{ __('Pricing') }}</a></li>
                                        @endif

                                        @if($menu_arr['FAQ'] == 'Show')
                                        <li ><a href="{{ route('faqs') }}">{{ __('FAQ') }}</a></li>
                                        @endif

                                        @foreach($global_custom_pages as $item)
                                        <li ><a href="{{ route('custom_page',$item->slug) }}">{{ $item->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                @if($menu_arr['Services'] == 'Show')
                                <li class="{{ Request::is('services') ? 'current' : ''; }}">
                                    <a href="{{ route('services') }}">{{ __('Services') }}</a>
                                </li>
                                @endif

                                @if($menu_arr['Portfolios'] == 'Show')
                                <li class="{{ Request::is('portfolios') ? 'current' : ''; }}">
                                    <a href="{{ route('portfolios') }}">{{ __('Portfolios') }}</a>
                                </li>
                                @endif

                                @if($menu_arr['Blog'] == 'Show')
                                <li class="{{ Request::is('blog') ? 'current' : ''; }}">
                                    <a href="{{ route('blog') }}">{{ __('Blog') }}</a>
                                </li>
                                @endif

                                @if($menu_arr['Contact'] == 'Show')
                                <li class="{{ Request::is('contact') ? 'current' : ''; }}">
                                    <a href="{{ route('contact') }}">{{ __('Contact') }}</a>
                                </li>
                                @endif
                                
                                @php
                                $total_lang = \App\Models\Language::count();
                                @endphp
                                @if($total_lang > 1)
                                <li class="lang">
                                    <img class="globe" src="{{ asset('uploads/globe.png') }}" alt="">
                                    <img class="globe-black" src="{{ asset('uploads/globe-black.png') }}" alt="">
                                    <form action="{{ route('language_switch') }}" method="post">
                                        @csrf
                                        <select name="code" class="form-control" onchange="this.form.submit()">
                                            @foreach($global_languages as $global_language)
                                                <option value="{{ $global_language->code }}" @if($global_language->name == session('sess_lang_name')) selected @endif>{{ $global_language->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </li>
                                @endif
                                
                            </ul>
                        </nav>
                    </div>

                    <div class="outer-box">
                        <!-- Header Search -->
                        <button class="ui-btn ui-btn search-btn">
                            <span class="icon lnr lnr-icon-search"></span>
                        </button>
                        @if($global_setting->top_bar_phone!='')
                        <a href="tel:{{ $global_setting->top_bar_phone }}" class="info-btn">
                            <i class="icon lnr-icon-phone-handset"></i>
                            <small >{{ __('Call Anytime') }}</small>
                            {{ $global_setting->top_bar_phone }}
                        </a>
                        @endif
                        <!-- Mobile Nav toggler -->
                        <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
            
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                <nav class="menu-box">
                    <div class="upper-box">
                        <div class="nav-logo"><a href="{{ route('home') }}"><img src="{{ asset('uploads/'.$global_setting->logo) }}" alt="{{ env('APP_NAME') }}" title=""></a></div>
                        <div class="close-btn"><i class="icon fa fa-times"></i></div>
                    </div>
            
                    <ul class="navigation clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </ul>

                    @if($global_setting->top_bar_phone!='' || $global_setting->top_bar_email!='')
                    <ul class="contact-list-one">
                        @if($global_setting->top_bar_phone != '')
                        <li >
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <span class="title">{{ __('Call Now') }}</span>
                                <a href="tel:{{ $global_setting->top_bar_phone }}">{{ $global_setting->top_bar_phone }}</a>
                            </div>
                        </li>
                        @endif
                        @if($global_setting->top_bar_email != '')
                        <li >
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <span class="icon lnr-icon-envelope1"></span>
                                <span class="title">{{ __('Send Email') }}</span>
                                <a href="mailto:{{ $global_setting->top_bar_email }}">{{ $global_setting->top_bar_email }}</a>
                            </div>
                        </li>
                        @endif
                    </ul>
                    @endif

                    @if($global_setting->twitter!=''||$global_setting->facebook!=''||$global_setting->linkedin!=''||$global_setting->instagram!=''||$global_setting->youtube!=''||$global_setting->pinterest)
                    <ul class="social-links">
                        @if($global_setting->twitter!='')
                        <li ><a href="{{ $global_setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                        @endif

                        @if($global_setting->facebook!='')
                        <li ><a href="{{ $global_setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                        @endif

                        @if($global_setting->linkedin!='')
                        <li ><a href="{{ $global_setting->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif

                        @if($global_setting->instagram!='')
                        <li ><a href="{{ $global_setting->instagram }}"><i class="fab fa-instagram"></i></a></li>
                        @endif

                        @if($global_setting->youtube!='')
                        <li ><a href="{{ $global_setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
                        @endif

                        @if($global_setting->pinterest!='')
                        <li ><a href="{{ $global_setting->pinterest }}"><i class="fab fa-pinterest-p"></i></a></li>
                        @endif
                    </ul>
                    @endif
                </nav>
            </div><!-- End Mobile Menu -->

            <!-- Header Search -->
            <div class="search-popup">
                <span class="search-back-drop"></span>
                <button class="close-search"><span class="fa fa-times"></span></button>
            
                <div class="search-inner">
                    <form method="get" action="{{ route('search') }}">
                        <div class="form-group">
                            <input type="search" name="search_text" value="" placeholder="Search..." required>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Header Search -->

            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                @if(Route::is('home_4'))
                                    <img src="{{ asset('uploads/'.$global_setting->logo) }}" alt="{{ env('APP_NAME') }}">
                                @else
                                    <img src="{{ asset('uploads/'.$global_setting->logo_sticky) }}" alt="{{ env('APP_NAME') }}">
                                @endif
                            </a>
                        </div>
            
                        <!--Right Col-->
                        <div class="nav-outer">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-collapse show collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <!--Keep This Empty / Menu will come through Javascript-->
                                    </ul>
                                </div>
                            </nav><!-- Main Menu End-->
            
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                        </div>
                    </div>
                </div>
            </div><!-- End Sticky Menu -->
        </header>
        <!--End Main Header -->


        @yield('content')

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="bg bg-pattern-6"></div>
            
            @if($global_setting->footer_phone != '' || $global_setting->footer_email != '' || $global_setting->footer_address != '')
            <div class="footer-upper">
                <div class="auto-container">
                    <div class="row">
                        @if($global_setting->footer_phone != '')
                        <div class="contact-info-block col-lg-4 col-md-6">
                            <div class="inner">
                                <i class="icon fa fa-phone-square"></i>
                                <span class="sub-title">{{ __('Call Anytime') }}</span>
                                <div class="text"><a href="tel:+{{ $global_setting->footer_phone }}">{{ $global_setting->footer_phone }}</a></div>
                            </div>
                        </div>
                        @endif
                        
                        @if($global_setting->footer_email != '')
                        <div class="contact-info-block col-lg-4 col-md-6">
                            <div class="inner">
                                <i class="icon fa fa-envelope"></i>
                                <span class="sub-title">{{ __('Send Email') }}</span>
                                <div class="text"><a href="mailto:{{ $global_setting->footer_email }}">{{ $global_setting->footer_email }}</a></div>
                            </div>
                        </div>
                        @endif

                        @if($global_setting->footer_address != '')
                        <div class="contact-info-block col-lg-4 col-md-6">
                            <div class="inner">
                                <i class="icon fa fa-map-marker"></i>
                                <span class="sub-title">{{ __('Address') }}</span>
                                <div class="text">{{ $global_setting->footer_address }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Widgets Section -->
            <div class="widgets-section">
                <div class="auto-container">
                    <div class="row">
                        <!-- Footer COlumn -->
                        <div class="footer-column col-xl-5 col-lg-4 col-md-12">
                            <div class="footer-widget about-widget">
                                <div class="widget-content">
                                    <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('uploads/'.$global_setting->logo) }}" alt="{{ env('APP_NAME') }}"></a></div>
                                    <div class="text">{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($global_setting->footer_text))) !!}</div>
                                    @if($global_setting->twitter!=''||$global_setting->facebook!=''||$global_setting->linkedin!=''||$global_setting->instagram!=''||$global_setting->youtube!=''||$global_setting->pinterest)
                                    <ul class="social-icon-two">
                                        @if($global_setting->twitter!='')
                                        <li ><a href="{{ $global_setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        @endif

                                        @if($global_setting->facebook!='')
                                        <li ><a href="{{ $global_setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif

                                        @if($global_setting->linkedin!='')
                                        <li ><a href="{{ $global_setting->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif

                                        @if($global_setting->instagram!='')
                                        <li ><a href="{{ $global_setting->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                        @endif

                                        @if($global_setting->youtube!='')
                                        <li ><a href="{{ $global_setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
                                        @endif

                                        @if($global_setting->pinterest!='')
                                        <li ><a href="{{ $global_setting->pinterest }}"><i class="fab fa-pinterest-p"></i></a></li>
                                        @endif
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Footer COlumn -->
                        <div class="footer-column col-xl-4 col-lg-4 col-md-6">
                            <div class="widget links-widget">
                                <h5 class="widget-title">{{ $global_setting->footer_links_heading }}</h5>
                                <div class="widget-content">
                                    <ul class="user-links two-column">
                                        <li ><a href="{{ route('about') }}">{{ __('About') }}</a></li>
                                        <li ><a href="{{ route('team_members') }}">{{ __('Team Members') }}</a></li>
                                        <li ><a href="{{ route('services') }}">{{ __('Services') }}</a></li>
                                        <li ><a href="{{ route('testimonials') }}">{{ __('Testimonials') }}</a></li>
                                        <li ><a href="{{ route('portfolios') }}">{{ __('Portfolios') }}</a></li>
                                        <li ><a href="{{ route('faqs') }}">{{ __('FAQ') }}</a></li>
                                        <li ><a href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                                        <li ><a href="{{ route('terms') }}">{{ __('Terms of Use') }}</a></li>
                                        <li ><a href="{{ route('pricing_plans') }}">{{ __('Pricing') }}</a></li>
                                        <li ><a href="{{ route('privacy') }}">{{ __('Privacy Policy') }}</a></li>
                                    </ul>                                
                                </div>
                            </div>
                        </div>
                        <div class="footer-column col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="widget newsletter-widget">
                                <h5 class="widget-title">{{ $global_setting->footer_subscriber_heading }}</h5>
                                <div class="widget-content">
                                    <div class="text">{!! str_replace(["<p>", "</p>"], ["", ""], clean(nl2br($global_setting->footer_subscriber_text))) !!}</div>
                                    <div class="subscribe-form">
                                        <form method="post" action="{{ route('subscriber_submit') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" name="email" class="email" value="" placeholder="{{ __('Email Address') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="theme-btn btn-style-one hover-light"><span class="btn-title">{{ __('Subscribe') }}</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="copyright-text">{{ $global_setting->footer_copyright }}</div>
                </div>
            </div>
        </footer>

    </div>
    
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    
    @include('front.layouts.scripts')

    @if($global_setting->tawk_live_chat_status == 'Show')
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/{{ $global_setting->tawk_live_chat_property_id }}/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    @endif

</body>
</html>