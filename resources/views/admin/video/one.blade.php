@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Video One - Items') }}</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin_video_one_item_update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Heading') }}*</label>
                                <input type="text" name="heading" class="form-control" value="{{ $video_one_items->heading }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Youtube Video Id') }} *</label>
                                <input type="text" name="youtube_video_id" class="form-control" value="{{ $video_one_items->youtube_video_id }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                                <div class="photo-container">
                                    <a href="{{ asset('uploads/'.$video_one_items->photo) }}" class="magnific"><img src="{{ asset('uploads/'.$video_one_items->photo) }}" alt=""></a>
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
    </div>
</div>
@endsection