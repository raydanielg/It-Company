@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Call to Action') }}</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin_call_to_action_update') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Text') }}</label>
                        <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ $call_to_action->text }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Phone') }}</label>
                                <input type="text" name="phone" class="form-control" value="{{ $call_to_action->phone }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Email') }}</label>
                                <input type="text" name="email" class="form-control" value="{{ $call_to_action->email }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Icon') }}</label>
                                <select id="iconSelectEdit" name="icon" class="form-select">
                                    @foreach($icons as $icon)
                                    <option value="{{ $icon->icon_code }}" @if($icon->icon_code==$call_to_action->icon) selected @endif>{{ $icon->icon_code }}</option>
                                    @endforeach
                                </select>
                                <div id="iconPreviewEdit"><i class="icon {{ $call_to_action->icon }}"></i></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
       
<script>
    window.onload = function () {
        document.getElementById('iconSelectEdit').addEventListener('change', function () {
            var selectedValueEdit = this.value;
            var previewElementEdit = document.getElementById('iconPreviewEdit');
            previewElementEdit.innerHTML = '<i class="icon ' + selectedValueEdit + '"></i>';
        });
    };
</script>
@endsection