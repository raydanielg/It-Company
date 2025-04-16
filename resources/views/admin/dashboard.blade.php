@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Dashboard') }}</h1>
</div>

<div class="row dashboard-page">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Post Categories') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_post_categories }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Posts') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_posts }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Testimonials') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_testimonials }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Team Members') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_team_members }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Services') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_services }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Portfolios') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_portfolios }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Sliders') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_sliders }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total FAQs') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_faqs }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Subscribers') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_subscribers }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Pricing Plans') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_pricing_plans }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Custom Pages') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_custom_pages }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success mb-1">{{ __('Total Marquees') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_marquees }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-th-large fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection