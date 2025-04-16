<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="uploads/favicon.png">
    
    <title>{{ __('Reset Password') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @include('admin.layouts.styles')
    @include('admin.layouts.scripts')
</head>

<body class="bg-gradient-primary d-flex align-items-center h_100_vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block login_bg" style="background-image:url({{ asset('uploads/'.$global_setting->login_page_photo) }})"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 fw-bold">{{ __('Reset Password') }}</h1>
                                    </div>
                                    <form action="{{ url('admin/reset-password/'.$token.'/'.$email) }}" class="user" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="{{ __('New Password') }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control form-control-user" placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Submit') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.scripts_footer')

</body>
</html>
