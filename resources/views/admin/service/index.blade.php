@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Services') }}</h1>
    <a href="{{ route('admin_service_create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus"></i> {{ __('Add Item') }}
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
                        <th>{{ __('Icon') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Manage FAQ') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="photo-container-small">
                                <a href="{{ asset('uploads/'.$service->photo) }}" class="magnific"><img src="{{ asset('uploads/'.$service->photo) }}" alt=""></a>
                            </div>
                        </td>
                        <td>
                            <div class="photo-container-small">
                                @if($service->banner==null)
                                    <img src="{{ asset('uploads/no_photo.png') }}" alt="">
                                @else
                                    <a href="{{ asset('uploads/'.$service->banner) }}" class="magnific"><img src="{{ asset('uploads/'.$service->banner) }}" alt=""></a>
                                @endif
                            </div>
                        </td>
                        <td>
                            <i class="{{ $service->icon }} fz_40"></i>
                        </td>
                        <td>
                            {{ $service->name }}
                        </td>
                        <td>
                            <a href="{{ route('admin_service_faq',$service->id) }}" class="btn btn-success btn-sm rounded-pill pl_20 pr_20">{{ __('Manage FAQ') }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin_service_edit',$service->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin_service_destroy',$service->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection