@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Menu Manage') }}</h1>
</div>

<form action="{{ route('admin_menu_update') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Menu Name') }}</th>
                                <th>{{ __('Menu Status') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($menus as $row)
                                <input type="hidden" name="menu_id[]" value="{{ $row->id }}">
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <select name="status[]" class="form-select">
                                            <option value="Show" @if($row->status == 'Show') selected @endif>{{ __('Show') }}</option>
                                            <option value="Hide" @if($row->status == 'Hide') selected @endif>{{ __('Hide') }}</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection