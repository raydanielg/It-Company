@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Pricing Plan') }}</h1>
    <a href="{{ route('admin_pricing_plan_index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-bars"></i> {{ __('All Items') }}
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin_pricing_plan_update',$pricing_plan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Name') }} *</label>
                        <input type="text" name="name" class="form-control" value="{{ $pricing_plan->name }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Price') }} *</label>
                        <input type="text" name="price" class="form-control" value="{{ $pricing_plan->price }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Period') }} *</label>
                        <input type="text" name="period" class="form-control" value="{{ $pricing_plan->period }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Button Text') }} *</label>
                        <input type="text" name="button_text" class="form-control" value="{{ $pricing_plan->button_text }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Button URL') }} *</label>
                        <input type="text" name="button_url" class="form-control" value="{{ $pricing_plan->button_url }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                        <div class="photo-container">
                            <a href="{{ asset('uploads/'.$pricing_plan->photo) }}" class="magnific"><img src="{{ asset('uploads/'.$pricing_plan->photo) }}" alt=""></a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Change Photo') }}</label>
                        <div><input type="file" name="photo"></div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
        </form>
    </div>
</div>
@endsection