<!DOCTYPE html>
<html @if(session('sess_lang_direction') == 'Right to Left (RTL)') dir="rtl" @endif lang="{{ session('sess_lang_code') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="uploads/favicon.png">
    
    <title>{{ __('Admin Panel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @include('admin.layouts.styles')
    @include('admin.layouts.scripts')
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin_dashboard') }}">
                <div class="sidebar-brand-text mx-3 ttn">
                    <div class="right">
                        {{ env('APP_NAME') }}
                    </div>
                </div>
            </a>

            <hr class="sidebar-divider my-0">

            @include('admin.layouts.sidebar')

            <hr class="sidebar-divider">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column pb_50">
            <div id="content">

                @include('admin.layouts.nav')

                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('admin.layouts.scripts_footer')
    
</body>
</html>
