@extends('admin.layout.app')
@section('title', 'Create Why Work With Us | Veuz')

@section('css')
<!-- Bootstrap Switch and Custom Styles -->
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
<style>
    .logo-preview {
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
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="mb-0">Create "Why Work With Us"</h4>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Why Work With Us</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Form Card -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="formSubmit" enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Enter title">
                                <span class="error-validation title-validation"></span>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                                <span class="error-validation description-validation"></span>
                            </div>

                            <!-- Icon Upload -->
                            <div class="mb-3">
                                <label for="icon">Image <span class="text-danger">*</span></label>
                                <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
                                <span class="error-validation icon-validation"></span>
                                <div class="mt-2">
                                    <img id="iconPreview" class="logo-preview d-none" src="#" alt="Preview">
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('index') }}" class="btn btn-secondary me-2">Cancel</a>
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

    $(document).ready(function () {
        // CSRF Setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Init CKEditor
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(newEditor => editor = newEditor)
            .catch(error => console.error('CKEditor error:', error));

        // Image Preview
        $('#icon').on('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#iconPreview').attr('src', e.target.result).removeClass('d-none');
                };
                reader.readAsDataURL(file);
            }
        });

        // Submit Form
        $('#formSubmit').on('submit', function (e) {
            e.preventDefault();

            $('#saveBtn').prop('disabled', true).text('Saving...');
            $('.error-validation').text('');

            const formData = new FormData(this);
            if (editor) {
                formData.set('description', editor.getData());
            }

            $.ajax({
                url: "{{ route('storeAjax') }}", // adjust route
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    Swal.fire({
                        icon: res.icon,
                        title: res.title,
                        text: res.message
                    }).then(() => {
                        window.location.href = "{{ route('whyworkwith.index') }}";
                    });
                },
                error: function (err) {
                    $('#saveBtn').prop('disabled', false).text('Save');
                    const errors = err.responseJSON.errors;
                    if (errors) {
                        if (errors.title) $('.title-validation').text(errors.title[0]);
                        if (errors.description) $('.description-validation').text(errors.description[0]);
                        if (errors.icon) $('.icon-validation').text(errors.icon[0]);
                    }
                }
            });
        });
    });
</script>
@endsection
