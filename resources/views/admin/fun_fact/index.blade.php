@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Fun Facts') }}</h1>
</div>


<div class="row">
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin_fun_fact_update') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Heading') }}</label>
                        <input type="text" name="heading" class="form-control" value="{{ $fun_facts->heading }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Subheading') }}</label>
                        <input type="text" name="subheading" class="form-control" value="{{ $fun_facts->subheading }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Text') }}</label>
                        <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ $fun_facts->text }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h4><b>{{ __('Elements') }}</b></h4>
                <div class="mb_10">
                    <a href="" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fas fa-plus"></i> {{ __('Add Item') }}</a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Add Element') }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin_fun_fact_element_submit') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Name') }} *</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Number') }}*</label>
                                        <input type="text" name="number" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Icon') }}*</label>
                                        <select id="iconSelect" name="icon" class="form-select">
                                            <option value="">{{ __('Select Icon') }}</option>
                                            @foreach($icons as $icon)
                                            <option value="{{ $icon->icon_code }}">{{ $icon->icon_code }}</option>
                                            @endforeach
                                        </select>
                                        <div id="iconPreview"></i></div>
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


                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>{{ __('Icon') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Number') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fun_fact_elements as $item)
                            <tr>
                                <td>
                                    <i class="{{ $item->icon }} fz_40"></i>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->number }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm btn-block" data-bs-toggle="modal" data-bs-target="#edit_modal_{{ $loop->iteration }}"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin_fun_fact_element_delete',$item->id) }}" class="btn btn-danger btn-sm btn-block" onClick="return confirm('{{ __('Are you sure?') }}')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="edit_modal_{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Edit Element') }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin_fun_fact_element_update',$item->id) }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Name') }} *</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Number') }}*</label>
                                                    <input type="text" name="number" class="form-control" value="{{ $item->number }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Icon') }}*</label>
                                                    <select id="iconSelectEdit" name="icon" class="form-select">
                                                        @foreach($icons as $icon)
                                                        <option value="{{ $icon->icon_code }}" @if($icon->icon_code==$item->icon) selected @endif>{{ $icon->icon_code }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div id="iconPreviewEdit"><i class="icon {{ $item->icon }}"></i></div>
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
    </div>
</div>
       
<script>
    window.onload = function () {
        document.getElementById('iconSelect').addEventListener('change', function () {
            var selectedValue = this.value;
            var previewElement = document.getElementById('iconPreview');
            previewElement.innerHTML = '<i class="icon ' + selectedValue + '"></i>';
        });
        document.getElementById('iconSelectEdit').addEventListener('change', function () {
            var selectedValueEdit = this.value;
            var previewElementEdit = document.getElementById('iconPreviewEdit');
            previewElementEdit.innerHTML = '<i class="icon ' + selectedValueEdit + '"></i>';
        });
    };
</script>
@endsection