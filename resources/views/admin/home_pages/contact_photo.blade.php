@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Home Page Contact Photos') }}</h1>
</div>


<form action="{{ route('admin_home_contact_photo_update') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="border-1"><b>{{ __('Home Page 1') }}</b></h5>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                        <div class="photo-container">
                            <a href="{{ asset('uploads/'.$page_data->home_1_contact_photo) }}" class="magnific"><img src="{{ asset('uploads/'.$page_data->home_1_contact_photo) }}" alt=""></a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Change Photo') }}</label>
                        <div>
                            <input type="file" name="home_1_contact_photo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="border-1"><b>{{ __('Home Page 2') }}</b></h5>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                        <div class="photo-container">
                            <a href="{{ asset('uploads/'.$page_data->home_2_contact_photo) }}" class="magnific"><img src="{{ asset('uploads/'.$page_data->home_2_contact_photo) }}" alt=""></a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Change Photo') }}</label>
                        <div>
                            <input type="file" name="home_2_contact_photo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="border-1"><b>{{ __('Home Page 3') }}</b></h5>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                        <div class="photo-container">
                            <a href="{{ asset('uploads/'.$page_data->home_3_contact_photo) }}" class="magnific"><img src="{{ asset('uploads/'.$page_data->home_3_contact_photo) }}" alt=""></a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Change Photo') }}</label>
                        <div>
                            <input type="file" name="home_3_contact_photo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="border-1"><b>{{ __('Home Page 4') }}</b></h5>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                        <div class="photo-container">
                            <a href="{{ asset('uploads/'.$page_data->home_4_contact_photo) }}" class="magnific"><img src="{{ asset('uploads/'.$page_data->home_4_contact_photo) }}" alt=""></a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Change Photo') }}</label>
                        <div>
                            <input type="file" name="home_4_contact_photo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
    
</form>
@endsection