@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Video Two - Items') }}</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin_video_two_item_update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Heading') }}*</label>
                                <textarea name="heading" class="form-control h_70" cols="30" rows="10">{{ $video_two_items->heading }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Youtube Video Id') }} *</label>
                                <input type="text" name="youtube_video_id" class="form-control" value="{{ $video_two_items->youtube_video_id }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection