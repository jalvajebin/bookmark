@extends('admin.layout.app')
@section('title')
    {{ 'Edit Job | Veuz' }}
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
    <style>
        .logo-wrapper {
            position: relative;
            width: 100%;
            height: 150px;
        }

        .logo-image {
            width: 100%;
            height: 100%;
            border: 2px solid #ccc;
            border-radius: 10px;
            object-fit: cover;
        }

        .edit-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: white;
            border: 1px solid #b1b1b1;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
        }

        .edit-icon img {
            width: 16px;
            height: 16px;
        }

        .file-input {
            display: none;
        }

        .ck-editor__editable_inline {
            min-height: 150px;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Job</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Job</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form id="formSubmit" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="job_id" value="{{ $job->id }}">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Title -->
                            <div class="col-12 mb-3">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input id="title" name="title" type="text" class="form-control title" value="{{ $job->title }}" placeholder="Enter Title">
                                <span class="title-validation error-validation text-danger"></span>
                            </div>

                            <!-- Destination -->
                            <div class="col-sm-6 mb-3">
                                <label for="destination">Destination <span class="text-danger">*</span></label>
                                <select class="form-control select2 category" id="destination" name="destination">
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}" {{ $job->destination_id == $destination->id ? 'selected' : '' }}>
                                            {{ $destination->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="category-validation error-validation text-danger"></span>
                            </div>

                            <!-- Main Image -->
                            <div class="col-md-6 mb-3">
                                <label for="main-input" class="form-label">Main Image</label>
                                <small class="text-danger d-block">Recommended: 380x250px | Max: 2MB</small>
                                <div class="logo-wrapper mb-2">
                                    <img src="{{ asset($job->main_image ?? 'admin/images/no-image.png') }}" alt="Logo"
                                        class="logo-image mainPreview" id="mainPreview">
                                    <div class="edit-icon" onclick="triggerMainFileInput()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png" alt="Edit">
                                    </div>
                                    <span class="main_image-validation error-validation text-danger"></span>
                                </div>
                                <input type="file" id="main-input" name="main_image" class="file-input form-control" accept="image/*" onchange="previewMain(event)">
                            </div>

                            <!-- Location -->
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" value="{{ $job->location }}" required>
                            </div>

                            <!-- Salary Min -->
                            <div class="col-md-6 mb-3">
                                <label for="salary_min" class="form-label">Minimum Salary (£)</label>
                                <input type="number" name="salary_min" class="form-control" value="{{ $job->salary_min }}" required>
                            </div>

                            <!-- Salary Max -->
                            <div class="col-md-6 mb-3">
                                <label for="salary_max" class="form-label">Maximum Salary (£)</label>
                                <input type="number" name="salary_max" class="form-control" value="{{ $job->salary_max }}" required>
                            </div>

                            <!-- Posted Date -->
                            <div class="col-md-6 mb-3">
                                <label for="posted_date" class="form-label">Posted Date</label>
                                <input type="date" name="posted_date" class="form-control" value="{{ $job->posted_date }}" required>
                            </div>

                            <!-- Start Date -->
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" name="start_date" class="form-control" value="{{ $job->start_date }}">
                            </div>

                            <!-- Image Alt -->
                            <div class="col-md-6 mb-3">
                                <label for="alt" class="form-label">Image Alt</label>
                                <input id="alt" name="alt" type="text" class="form-control alt" value="{{ $job->alt }}">
                            </div>

                            <!-- Description -->
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea id="description" name="description" rows="5" class="form-control description">{{ $job->description }}</textarea>
                                <span class="description-validation error-validation text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('jobs.index') }}" class="btn btn-danger me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary" id="job-btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

<script>
    function triggerMainFileInput() {
        document.getElementById('main-input').click();
    }

    function previewMain(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('mainPreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    $(document).ready(function () {
        CKEDITOR.replace('description');

        $('#formSubmit').submit(function (e) {
            e.preventDefault();

            const form = $(this)[0];
            const formData = new FormData(form);
            const description = CKEDITOR.instances['description'].getData();
            formData.set('description', description);
            formData.append('_method', 'PUT');

            const jobId = $('#job_id').val();
            $('.error-validation').html('');
            $('#job-btn').prop('disabled', true).text('Updating...');

            $.ajax({
                type: 'POST',
                url: `/admin/jobs/update/${jobId}`,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    Swal.fire({
                        title: data.title || 'Success',
                        text: data.message || 'Job updated successfully.',
                        icon: data.icon || 'success',
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/admin/jobs';
                        }
                    });
                },
                error: function (data) {
                    $('#job-btn').prop('disabled', false).text('Update');
                    const errors = data.responseJSON.errors;
                    if (errors.title) $('.title-validation').text(errors.title[0]);
                    if (errors.main_image) $('.main_image-validation').text(errors.main_image[0]);
                    if (errors.description) $('.description-validation').text(errors.description[0]);
                    if (errors.destination) $('.category-validation').text(errors.destination[0]);
                }
            });
        });
    });
</script>
@endsection
