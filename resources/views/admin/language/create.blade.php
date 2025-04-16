@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Create Language') }}</h1>
    <a href="{{ route('admin_language_index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-bars"></i> {{ __('All Items') }}
    </a>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin_language_store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Name') }}*</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Code') }}*</label>
                        <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Direction') }}*</label>
                        <select name="direction" class="form-select">
                            <option value="Left to Right (LTR)">{{ __('Left to Right (LTR)') }}</option>
                            <option value="Right to Left (RTL)">{{ __('Right to Left (RTL)') }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Default') }}*</label>
                        <select name="default" class="form-select">
                            <option value="0">{{ __('No') }}</option>
                            <option value="1">{{ __('Yes') }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection