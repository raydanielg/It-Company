@extends('admin.layouts.master')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Translation') }} - {{ $language_data->name }}</h1>
    <a href="" class="d-none d-sm-inline-block btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-globe"></i> {{ __('Auto Translate') }}
    </a>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Auto Translate Confirmation') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ __('Are you sure? Remember, it may take a little longer to do so.') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('No') }}</button>
                    <a href="{{ route('admin_language_auto_translate',$language_data->id) }}" class="btn btn-success">{{ __('Yes') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin_language_translate_update',$language_data->id) }}" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="w_50_p">{{ __('Key') }}</th>
                        <th>{{ __('Value') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($translation_data as $key=>$value)
                        <input type="hidden" class="form-control" name="key_arr[]" value="{{ $key }}">
                        <tr>
                            <td>
                                {{ $key }}
                            </td>
                            <td>
                                <input type="text" name="value_arr[]" class="form-control" value="{{ $value }}">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
        </form>
    </div>
</div>
@endsection