@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Welcome One - Items') }}</h1>
</div>


<div class="row">
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin_welcome_one_item_update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Heading') }}</label>
                        <input type="text" name="heading" class="form-control" value="{{ $welcome_one_items->heading }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Subheading') }}</label>
                        <input type="text" name="subheading" class="form-control" value="{{ $welcome_one_items->subheading }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Text') }}</label>
                        <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ $welcome_one_items->text }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Button Text') }}</label>
                        <input type="text" name="button_text" class="form-control" value="{{ $welcome_one_items->button_text }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Button URL') }}</label>
                        <input type="text" name="button_url" class="form-control" value="{{ $welcome_one_items->button_url }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Experience Year') }}</label>
                        <input type="text" name="experience_year" class="form-control" value="{{ $welcome_one_items->experience_year }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Person Name') }}</label>
                        <input type="text" name="person_name" class="form-control" value="{{ $welcome_one_items->person_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Person Designation') }}</label>
                        <input type="text" name="person_designation" class="form-control" value="{{ $welcome_one_items->person_designation }}">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Existing Person Photo') }}</label>
                                <div class="photo-container">
                                    <a href="{{ asset('uploads/'.$welcome_one_items->person_photo) }}" class="magnific"><img src="{{ asset('uploads/'.$welcome_one_items->person_photo) }}" alt=""></a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Change Person Photo') }}</label>
                                <div><input type="file" name="person_photo"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Existing Photo 1') }}</label>
                                <div class="photo-container">
                                    <a href="{{ asset('uploads/'.$welcome_one_items->photo1) }}" class="magnific"><img src="{{ asset('uploads/'.$welcome_one_items->photo1) }}" alt=""></a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Change Photo 1') }}</label>
                                <div><input type="file" name="photo1"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Existing Photo 2') }}</label>
                                <div class="photo-container">
                                    <a href="{{ asset('uploads/'.$welcome_one_items->photo2) }}" class="magnific"><img src="{{ asset('uploads/'.$welcome_one_items->photo2) }}" alt=""></a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">{{ __('Change Photo 2') }}</label>
                                <div><input type="file" name="photo2"></div>
                            </div>
                        </div>
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
                                <form action="{{ route('admin_welcome_one_item_element_submit') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Heading') }}*</label>
                                        <input type="text" name="heading" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('Text') }}*</label>
                                        <textarea name="text" class="form-control h_70" cols="30" rows="10"></textarea>
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
                                <th>{{ __('Heading') }}</th>
                                <th>{{ __('Text') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($welcome_one_item_elements as $item)
                            <tr>
                                <td>
                                    <i class="{{ $item->icon }} fz_40"></i>
                                </td>
                                <td>{{ $item->heading }}</td>
                                <td>{{ $item->text }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm btn-block" data-bs-toggle="modal" data-bs-target="#edit_modal_{{ $loop->iteration }}"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin_welcome_one_item_element_delete',$item->id) }}" class="btn btn-danger btn-sm btn-block" onClick="return confirm('{{ __('Are you sure?') }}')"><i class="fas fa-trash"></i></a>
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
                                            <form action="{{ route('admin_welcome_one_item_element_update',$item->id) }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Heading') }}*</label>
                                                    <input type="text" name="heading" class="form-control" value="{{ $item->heading }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('Text') }}*</label>
                                                    <textarea name="text" class="form-control h_70" cols="30" rows="10">{{ $item->text }}</textarea>
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