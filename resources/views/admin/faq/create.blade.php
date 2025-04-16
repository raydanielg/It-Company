@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Create FAQ') }}</h1>
    <a href="{{ route('admin_faq_index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-bars"></i> {{ __('All Items') }}
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin_faq_store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">{{ __('Question') }}*</label>
                <input type="text" name="question" class="form-control" value="{{ old('question') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ __('Answer') }}*</label>
                <textarea name="answer" class="form-control editor" cols="30" rows="10">{{ old('answer') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Submit') }}</button>
        </form>
    </div>
</div>
@endsection