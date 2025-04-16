@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Languages') }}</h1>
    <a href="{{ route('admin_language_create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus"></i> {{ __('Add Item') }}
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm" id="dtable">
                <thead>
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Code') }}</th>
                        <th>{{ __('Direction') }}</th>
                        <th>{{ __('Default') }}</th>
                        <th>{{ __('Translate') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($languages as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->direction }}</td>
                        <td>
                            @if($item->default == 1)
                            <span class="badge badge-success">{{ __('Yes') }}</span>
                            @else
                            <span class="badge badge-danger">{{ __('No') }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin_language_translate',$item->id) }}" class="btn btn-info btn-sm">Translate</a>
                        </td>
                        <td>
                            <a href="{{ route('admin_language_edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            @if($item->id!=1)
                            <a href="{{ route('admin_language_destroy',$item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}')"><i class="fas fa-trash"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection