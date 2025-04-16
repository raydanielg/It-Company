<li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_dashboard') }}">
        <i class="fas fa-home"></i>
        <span>{{ __('Dashboard') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/setting/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_setting_general') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Website Settings') }}</span>
    </a>
</li>


<li class="nav-item {{ Request::is('admin/language/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_language_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Language Settings') }}</span>
    </a>
</li>


<li class="nav-item dd {{ Request::is('admin/post-category/*')||Request::is('admin/post/*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse_blog" aria-expanded="true" aria-controls="collapse_blog">
        <i class="fas fa-folder"></i>
        <span>{{ __('Blog Section') }}</span>
    </a>
    <div id="collapse_blog" class="collapse {{ Request::is('admin/post-category/*')||Request::is('admin/post/*') ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin_post_category_index') }}">{{ __('Post Category') }}</a>
            <a class="collapse-item" href="{{ route('admin_post_index') }}">{{ __('Post') }}</a>
        </div>
    </div>
</li>


<li class="nav-item dd {{ Request::is('admin/subscriber/*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse_subscriber" aria-expanded="true" aria-controls="collapse_subscriber">
        <i class="fas fa-folder"></i>
        <span>{{ __('Subscribers') }}</span>
    </a>
    <div id="collapse_subscriber" class="collapse {{ Request::is('admin/subscriber/*') ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin_subscriber_index') }}">{{ __('All Subscribers') }}</a>
            <a class="collapse-item" href="{{ route('admin_subscriber_send_message') }}">{{ __('Send Message to All') }}</a>
        </div>
    </div>
</li>


<li class="nav-item dd {{ Request::is('admin/fun-fact/*')||Request::is('admin/marquee/*')||Request::is('admin/offer/*')||Request::is('admin/call-to-action/*')||Request::is('admin/welcome-one/*')||Request::is('admin/welcome-two/*')||Request::is('admin/video-one/*')||Request::is('admin/video-two/*')||Request::is('admin/feature-one/*')||Request::is('admin/feature-two/*')||Request::is('admin/why-choose-one/*')||Request::is('admin/why-choose-two/*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse_all_sections" aria-expanded="true" aria-controls="collapse_all_sections">
        <i class="fas fa-folder"></i>
        <span>{{ __('All Sections') }}</span>
    </a>
    <div id="collapse_all_sections" class="collapse {{ Request::is('admin/fun-fact/*')||Request::is('admin/marquee/*')||Request::is('admin/offer/*')||Request::is('admin/call-to-action/*')||Request::is('admin/welcome-one/*')||Request::is('admin/welcome-two/*')||Request::is('admin/video-one/*')||Request::is('admin/video-two/*')||Request::is('admin/feature-one/*')||Request::is('admin/feature-two/*')||Request::is('admin/why-choose-one/*')||Request::is('admin/why-choose-two/*') ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin_fun_fact_index') }}">{{ __('Fun Fact') }}</a>
            <a class="collapse-item" href="{{ route('admin_marquee_index') }}">{{ __('Marquee') }}</a>
            <a class="collapse-item" href="{{ route('admin_offer_index') }}">{{ __('Offer') }}</a>
            <a class="collapse-item" href="{{ route('admin_call_to_action_index') }}">{{ __('Call To Action') }}</a>
            <a class="collapse-item" href="{{ route('admin_welcome_one_item') }}">{{ __('Welcome One') }}</a>
            <a class="collapse-item" href="{{ route('admin_welcome_two_item') }}">{{ __('Welcome Two') }}</a>
            <a class="collapse-item" href="{{ route('admin_video_one_item') }}">{{ __('Video One') }}</a>
            <a class="collapse-item" href="{{ route('admin_video_two_item') }}">{{ __('Video Two') }}</a>
            <a class="collapse-item" href="{{ route('admin_feature_one_item') }}">{{ __('Feature One') }}</a>
            <a class="collapse-item" href="{{ route('admin_feature_two_item') }}">{{ __('Feature Two') }}</a>
            <a class="collapse-item" href="{{ route('admin_why_choose_one_item') }}">{{ __('Why Choose One') }}</a>
            <a class="collapse-item" href="{{ route('admin_why_choose_two_item') }}">{{ __('Why Choose Two') }}</a>
        </div>
    </div>
</li>

<li class="nav-item dd {{ Request::is('admin/home-page/*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse_home_pages" aria-expanded="true" aria-controls="collapse_home_pages">
        <i class="fas fa-folder"></i>
        <span>{{ __('Home Pages') }}</span>
    </a>
    <div id="collapse_home_pages" class="collapse {{ Request::is('admin/home-page/*') ? 'show' : '' }}" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin_home1_page_item_index') }}">{{ __('Home Page 1') }}</a>
            <a class="collapse-item" href="{{ route('admin_home2_page_item_index') }}">{{ __('Home Page 2') }}</a>
            <a class="collapse-item" href="{{ route('admin_home3_page_item_index') }}">{{ __('Home Page 3') }}</a>
            <a class="collapse-item" href="{{ route('admin_home4_page_item_index') }}">{{ __('Home Page 4') }}</a>
            <a class="collapse-item" href="{{ route('admin_home_contact_photo_index') }}">{{ __('Contact Photos') }}</a>
        </div>
    </div>
</li>


<li class="nav-item {{ Request::is('admin/other-page/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_other_page_item_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Other Pages') }}</span>
    </a>
</li>


<li class="nav-item {{ Request::is('admin/menu/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_menu_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Menu Manage') }}</span>
    </a>
</li>


<li class="nav-item {{ Request::is('admin/slider/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_slider_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Slider') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/service/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_service_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Service') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/portfolio/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_portfolio_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Portfolio') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/team-member/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_team_member_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Team Members') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/testimonial/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_testimonial_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Testimonial') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/faq/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_faq_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('FAQ') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/pricing-plan/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_pricing_plan_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Pricing Plan') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/client/*') ? 'active' : ''; }}">
    <a class="nav-link" href="{{ route('admin_client_index') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ __('Clients') }}</span>
    </a>
</li>