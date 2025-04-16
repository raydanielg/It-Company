@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Create Marquee') }}</h1>
    <a href="{{ route('admin_marquee_index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-bars"></i> {{ __('All Items') }}
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin_marquee_store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">{{ __('Item') }}*</label>
                <input type="text" name="item" class="form-control" value="{{ old('item') }}">
            </div>
            <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Submit') }}</button>
        </form>
    </div>
</div>
@endsection