@extends('admin.layout.app')
@section('title', 'Create Service We Provide | Veuz')

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
                        <h4 class="mb-sm-0">Create Service We Provide</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Create</li>
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
                            <form id="formSubmit" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Title -->
                                    <div class="col-md-12 mb-3">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter title">
                                        <span class="error-validation title-validation"></span>
                                    </div>

                                    <!-- Description -->
                                    {{-- <div class="col-md-12 mb-3">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                    <span class="error-validation description-validation"></span>
                                </div> --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control description" rows="4"></textarea>
                                        <span class="description-validation error-validation text-danger"></span>
                                    </div>

                                    <!-- Icon -->
                                    <div class="col-md-12 mb-3">
                                        <label>Icon <span class="text-danger">*</span></label>
                                        <input type="file" name="icon" id="icon" class="form-control"
                                            accept="image/*">
                                        <span class="error-validation icon-validation"></span>
                                        <div class="mt-2">
                                            <img id="iconPreview" class="logo-image d-none" src="#"
                                                alt="Preview Icon">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            accept="image/*">
                                        <span class="error-validation icon-validation"></span>
                                        <div class="mt-2">
                                            <img id="imagePreview" class="logo-image d-none" src="#"
                                                alt="Preview Image">
                                        </div>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('services.index') }}" class="btn btn-danger me-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
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
            // CSRF setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Initialize CKEditor
            // ClassicEditor
            //     .create(document.querySelector('#description'))
            //     .then(newEditor => editor = newEditor)
            //     .catch(error => console.error('CKEditor Error:', error));
                        CKEDITOR.replace('description');


            // Icon preview
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

            // Submit form
            $('#formSubmit').on('submit', function(e) {
                e.preventDefault();
                $('#saveBtn').attr('disabled', true).text('Saving...');
                $('.error-validation').text('');
                var description = CKEDITOR.instances['description'].getData();
                const formData = new FormData(this);
                formData.append('description', description);
                if (editor) {
                    formData.set('description', editor.getData());
                }

                $.ajax({
                    url: "{{ route('storeServiceWeprovide') }}",

                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
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
                        $('#saveBtn').attr('disabled', false).text('Save');
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
