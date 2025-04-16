@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('FAQs') }} - {{ $service->name }}</h1>
    <div>
        <a href="{{ route('admin_service_index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-backward"></i> {{ __('Back to Service') }}</a>
        <a href="" class="d-none d-sm-inline-block btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#faq_add_modal"><i class="fas fa-plus"></i> {{ __('Add FAQ') }}</a>
        
        
        <!-- Modal -->
        <div class="modal fade" id="faq_add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Add FAQ') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin_service_faq_store',$service->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Question') }}*</label>
                                <input type="text" name="question" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Answer') }}*</label>
                                <textarea name="answer" class="form-control h_100" cols="30" rows="10"></textarea>
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
                        <th>{{ __('Question') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=0; @endphp
                    @foreach($faqs as $faq)
                    @php $i++; @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $faq->question }}
                        </td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#faq_edit_modal_{{ $i }}"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin_service_faq_destroy',$faq->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="faq_edit_modal_{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Edit FAQ') }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin_service_faq_update',$faq->id) }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Question') }}*</label>
                                            <input type="text" name="question" class="form-control" value="{{ $faq->question }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ __('Answer') }}*</label>
                                            <textarea name="answer" class="form-control h_100" cols="30" rows="10">{{ $faq->answer }}</textarea>
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