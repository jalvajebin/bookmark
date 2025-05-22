@extends('admin.layout.app')
@section('title', 'Edit Service We Provide | Veuz')

@section('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css"
        rel="stylesheet">
    <style>
        .logo-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 2px solid #ccc;
            border-radius: 10px;
        }

        .error-validation {
            color: red;
            font-size: 0.875rem;
        }

        .ck-editor__editable_inline {
            min-height: 150px;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Title and Breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Service We Provide</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="formUpdate" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $service->id }}">
                                <div class="row">
                                    <!-- Title -->
                                    <div class="col-md-12 mb-3">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $service->title }}">
                                        <span class="error-validation title-validation"></span>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-12 mb-3">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" class="form-control">{!! $service->description !!}</textarea>
                                        <span class="error-validation description-validation"></span>
                                    </div>

                                    <!-- Icon -->
                                    <div class="col-md-12 mb-3">
                                        <label>Icon</label>
                                        <input type="file" name="icon" id="icon" class="form-control"
                                            accept="image/*">
                                        <span class="error-validation icon-validation"></span>
                                        <div class="mt-2">
                                            @if ($service->Icon)
                                                <img id="iconPreview" class="logo-image"
                                                    src="{{ $service->Icon->getUrl('preview') }}" alt="Preview Icon">
                                            @else
                                                <img id="iconPreview" class="logo-image d-none" src="#"
                                                    alt="Preview Icon">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            accept="image/*">
                                        <span class="error-validation icon-validation"></span>
                                        <div class="mt-2">
                                            @if ($service->Images)
                                                <img id="imagePreview" class="logo-image"
                                                    src="{{ $service->Images->preview }}" alt="Preview Image">
                                            @else
                                                <img id="imagePreview" class="logo-image d-none" src="#"
                                                    alt="Preview Image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('services.index') }}" class="btn btn-danger me-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        let editor;

        $(document).ready(function() {
            // CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // CKEditor init
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(newEditor => editor = newEditor)
                .catch(error => console.error('CKEditor Error:', error));

            // Preview icon
            $('#icon').on('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#iconPreview').attr('src', e.target.result).removeClass('d-none');
                    };
                    reader.readAsDataURL(file);
                }
            });

             $('#image').on('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result).removeClass('d-none');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Update AJAX
            $('#formUpdate').on('submit', function(e) {
                e.preventDefault();
                $('#updateBtn').attr('disabled', true).text('Updating...');
                $('.error-validation').text('');

                const id = $('input[name="id"]').val();
                const formData = new FormData(this);
                formData.set('description', editor.getData());

                $.ajax({
                    url: "/admin/serviceweprovide/service-we-provide/" + id,
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-HTTP-Method-Override': 'PUT'
                    },
                    success: function(res) {
                        Swal.fire({
                            icon: res.icon,
                            title: res.title,
                            text: res.message
                        }).then(() => {
                            window.location.href = "{{ route('services.index') }}";
                        });
                    },
                    error: function(err) {
                        $('#updateBtn').attr('disabled', false).text('Update');
                        const errors = err.responseJSON.errors;
                        if (errors) {
                            if (errors.title) $('.title-validation').text(errors.title[0]);
                            if (errors.description) $('.description-validation').text(errors
                                .description[0]);
                            if (errors.icon) $('.icon-validation').text(errors.icon[0]);
                        }
                    }
                });
            });



        });
    </script>


@endsection
