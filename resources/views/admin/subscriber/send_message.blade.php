@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Send Message to All Subscribers') }}</h1>
    <a href="{{ route('admin_subscriber_index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-bars"></i> {{ __('All Subscribers') }}
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin_subscriber_send_message_submit') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">{{ __('Name') }} *</label>
                <input type="text" class="form-control" name="subject">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ __('Content') }}*</label>
                <textarea name="content" class="form-control h_200" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Send Email') }}</button>
        </form>
    </div>
</div>
@endsection