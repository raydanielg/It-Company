@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Create Post Category') }}</h1>
    <a href="{{ route('admin_post_category_index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-bars"></i> {{ __('All Items') }}
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin_post_category_store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">{{ __('Name') }} *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ __('Slug') }}*</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ __('SEO Title') }}</label>
                <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ old('seo_meta_description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Submit') }}</button>
        </form>
    </div>
</div>
@endsection