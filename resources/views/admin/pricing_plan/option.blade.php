@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Options') }} - {{ $pricing_plan->name }}</h1>
    <div>
        <a href="{{ route('admin_pricing_plan_index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-backward"></i> {{ __('Back to Pricing Plans') }}</a>
        <a href="" class="d-none d-sm-inline-block btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#option_add_modal"><i class="fas fa-plus"></i> {{ __('Add Option') }}</a>
        
        
        <!-- Modal -->
        <div class="modal fade" id="option_add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Add Option') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin_pricing_plan_option_store',$pricing_plan->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Name') }} *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-sm">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Modal -->


    </div>
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
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=0; @endphp
                    @foreach($options as $item)
                    @php $i++; @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#option_edit_modal_{{ $i }}"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin_pricing_plan_option_destroy',$item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="option_edit_modal_{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Edit Option') }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin_pricing_plan_option_update',$item->id) }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Name') }} *</label>
                                            <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary btn-sm">{{ __('Update') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection