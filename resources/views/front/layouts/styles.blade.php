<!-- Stylesheets -->
<link href="{{ asset('dist-front/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('dist-front/css/style.css') }}" rel="stylesheet">
@if(session('sess_lang_direction') == 'Right to Left (RTL)')
<link href="{{ asset('dist-front/css/rtl.css') }}" rel="stylesheet">
@endif
<style>
    .preloader:after {
        background-image: url({{ asset('uploads/'.$global_setting->favicon) }});
    }
    .dark-layout .preloader:after {
        background-image: url({{ asset('uploads/'.$global_setting->logo) }});
    }
</style>