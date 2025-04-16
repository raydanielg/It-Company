@extends('admin.layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Service') }}</h1>
    <a href="{{ route('admin_service_index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-bars"></i> {{ __('All Items') }}
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin_service_update',$service->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Name') }} *</label>
                        <input type="text" name="name" class="form-control" value="{{ $service->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Slug') }}*</label>
                        <input type="text" name="slug" class="form-control" value="{{ $service->slug }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ __('Short Description') }} *</label>
                <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ $service->short_description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ __('Description') }} * </label>
                <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $service->description }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Icon') }}*</label>
                        <select id="iconSelect" name="icon" class="form-select">
                            @foreach($icons as $icon)
                            <option value="{{ $icon->icon_code }}" @if($icon->icon_code==$service->icon) selected @endif>{{ $icon->icon_code }}</option>
                            @endforeach
                        </select>
                        <div id="iconPreview"><i class="icon {{ $service->icon }}"></i></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Phone') }}</label>
                        <input type="text" name="phone" class="form-control" value="{{ $service->phone }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ __('SEO Title') }}</label>
                <input type="text" name="seo_title" class="form-control" value="{{ $service->seo_title }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">{{ __('SEO Meta Description') }}</label>
                <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $service->seo_meta_description }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Existing Photo') }}</label>
                        <div class="photo-container">
                            <a href="{{ asset('uploads/'.$service->photo) }}" class="magnific"><img src="{{ asset('uploads/'.$service->photo) }}" alt=""></a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Change Photo') }}</label>
                        <div><input type="file" name="photo"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Existing Banner') }}</label>
                        <div class="photo-container">
                            @if($service->banner==null)
                                <img src="{{ asset('uploads/no_photo.png') }}" alt="">
                            @else
                                <a href="{{ asset('uploads/'.$service->banner) }}" class="magnific"><img src="{{ asset('uploads/'.$service->banner) }}" alt=""></a>
                                <div><a href="{{ route('admin_service_destroy_banner',$service->id) }}" class="text-danger" onClick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete Banner') }}</a></div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Change Banner') }}</label>
                        <div><input type="file" name="banner"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Existing PDF') }}</label>
                        <div class="photo-container">
                            @if($service->pdf==null)
                                <img src="{{ asset('uploads/no_pdf.png') }}" alt="">
                            @else
                                <a href="{{ asset('uploads/'.$service->pdf) }}"><img src="{{ asset('uploads/pdf.svg') }}" alt=""></a>
                                <div><a href="{{ route('admin_service_destroy_pdf',$service->id) }}" class="text-danger" onClick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete PDF') }}</a></div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">{{ __('Change PDF') }}</label>
                        <div><input type="file" name="pdf"></div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mb-50 btn-common">{{ __('Update') }}</button>
        </form>
    </div>
</div>
<script>
    window.onload = function () {
        document.getElementById('iconSelect').addEventListener('change', function () {
            var selectedValue = this.value;
            var previewElement = document.getElementById('iconPreview');
            previewElement.innerHTML = '<i class="icon ' + selectedValue + '"></i>';
        });
    };
</script>
@endsection