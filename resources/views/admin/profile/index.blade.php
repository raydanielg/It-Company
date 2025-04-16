@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Profile') }}</h1>
</div>

<form action="{{ route('admin_profile_update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card shadow mb-4 t-left">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                        <div>
                            @if(Auth::guard('admin')->user()->photo == '')
                            <img src="{{ asset('uploads/default_photo.jpg') }}" alt="" class="w_200">
                            @else
                            <img src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" alt="" class="w_200">
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Change Photo') }}</label>
                        <div>
                            <input type="file" name="photo">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::guard('admin')->user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Email') }}</label>
                        <input type="text" name="email" class="form-control" value="{{ Auth::guard('admin')->user()->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Password') }}</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Confirm Password') }}</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success btn-block mb_50 btn-common">{{ __('Update') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection