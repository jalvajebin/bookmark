@extends('admin.layout.app')
@section('title', 'Create What We Do / Easy Step')

@section('css')
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

        <!-- Title & Breadcrumb -->
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="mb-0">Create What We Do / Easy Step</h4>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Section</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="formSubmit" enctype="multipart/form-data">
                            @csrf

                            <!-- Type -->
                            <div class="mb-3">
                                <label for="type">Section Type <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control">
                                    <option value="whatwedo">What We Do</option>
                                    <option value="easystep">Easy Step</option>
                                </select>
                                <span class="error-validation type-validation"></span>
                            </div>

                            <!-- Title -->
                            <div class="mb-3">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Enter title">
                                <span class="error-validation title-validation"></span>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                                <span class="error-validation description-validation"></span>
                            </div>

                            <!-- Icon Upload -->
                            <div class="mb-3">
                                <label>Image <span class="text-danger">*</span></label>
                                <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
                                <span class="error-validation icon-validation"></span>
                                <div class="mt-2">
                                    <img id="iconPreview" class="logo-preview d-none" src="#" alt="Preview">
                                </div>
                            </div>

                            <!-- Easy Step Fields -->
                            <div id="easyStepFields" style="display: none;">
                                <div class="mb-3">
                                    <label>Title One</label>
                                    <input type="text" name="title_one" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Paragraph One</label>
                                    <textarea name="para_one" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Title Two</label>
                                    <input type="text" name="title_two" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Paragraph Two</label>
                                    <textarea name="para_two" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Title Three</label>
                                    <input type="text" name="title_three" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Paragraph Three</label>
                                    <textarea name="para_three" class="form-control"></textarea>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('whatwedo.index') }}" class="btn btn-secondary me-2">Cancel</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    let editor;

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // CKEditor Init
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

        // Toggle EasyStep Fields
        $('#type').on('change', function () {
            if ($(this).val() === 'easystep') {
                $('#easyStepFields').slideDown();
            } else {
                $('#easyStepFields').slideUp();
            }
        }).trigger('change');

        // Form Submit
        $('#formSubmit').on('submit', function (e) {
            e.preventDefault();
            $('#saveBtn').prop('disabled', true).text('Saving...');
            $('.error-validation').text('');

            const formData = new FormData(this);
            if (editor) formData.set('description', editor.getData());

            $.ajax({
                url: "{{ route('storeWhatWeDo') }}", // adjust as needed
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
                        window.location.href = "{{ route('whatwedo.index') }}";
                    });
                },
                error: function (err) {
                    $('#saveBtn').prop('disabled', false).text('Save');
                    const errors = err.responseJSON.errors;
                    if (errors) {
                        if (errors.type) $('.type-validation').text(errors.type[0]);
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
