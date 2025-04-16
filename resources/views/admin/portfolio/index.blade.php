@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Portfolios') }}</h1>
    <a href="{{ route('admin_portfolio_create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus"></i> {{ __('Add Item') }}
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm" id="dtable">
                <thead>
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th>{{ __('Photo') }}</th>
                        <th>{{ __('Banner') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portfolios as $portfolio)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="photo-container-small">
                                <a href="{{ asset('uploads/'.$portfolio->photo) }}" class="magnific"><img src="{{ asset('uploads/'.$portfolio->photo) }}" alt=""></a>
                            </div>
                        </td>
                        <td>
                            <div class="photo-container-small">
                                <a href="{{ asset('uploads/'.$portfolio->banner) }}" class="magnific"><img src="{{ asset('uploads/'.$portfolio->banner) }}" alt=""></a>
                            </div>
                        </td>
                        <td>
                            {{ $portfolio->name }}
                        </td>
                        <td>
                            <a href="{{ route('admin_portfolio_edit',$portfolio->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin_portfolio_destroy',$portfolio->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection