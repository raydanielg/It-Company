<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>{{ env('APP_NAME') }}</title>

    <link rel="shortcut icon" href="{{ asset('uploads/'.$global_setting->favicon) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('uploads/'.$global_setting->favicon) }}" type="image/x-icon">

    <link href="{{ asset('dist-front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist-front/css/style.css') }}" rel="stylesheet">
</head>

<body>

<div class="page-wrapper">
	<section class="">
		<div class="auto-container pt-30 pb-30">
			<div class="row">
				<div class="col-xl-12">
					<div class="error-page__inner">
						<div class="error-page__title-box">
							<div>
                                <img src="{{ asset('uploads/'.$global_setting->image_404) }}" alt="">
                            </div>
							<h3 class="error-page__sub-title">{{ __('Page not found') }}</h3>
						</div>
						<p class="error-page__text">
                            {{ __('Sorry, we can not find the page you are looking for or it was never existed') }}
                        </p>
						<a href="{{ route('home') }}" class="theme-btn btn-style-one shop-now"><span class="btn-title">{{ __('Back to Home') }}</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

</body>
</html>