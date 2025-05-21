@extends('admin.layout.app')
@section('title')
    {{ 'Jobs | Veuz' }}
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css"
        rel="stylesheet">
    <style>
        .switch.btn.btn-primary {
            width: 65.4688px !important;
        }

        .select2-container .select2-selection--single {
            height: 37px !important;
        }

        .select2-container .select2-selection--multiple {
            min-height: 37px !important;
        }

        .logo-container {
            text-align: center;
            margin-top: 20px;
        }

        .logo-wrapper {
            position: relative;
            display: inline-block;
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

        ul {
            list-style: none;
        }

        .tab-list {
            margin-left: 10px;
        }

        .tab-list.active {
            border-bottom: 2px solid #14b0c4;
            height: 36px;
        }

        .tab-list.active a {
            color: #14b0c4;
        }

        .tab-list a {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 26px !important;
            color: #0c6d78;
        }

        .tab-list:hover {
            border-bottom: 2px solid #14b0c4;
            height: 36px;
        }

        .tab-list a:hover {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 26px !important;
            color: #14b0c4;
        }
    </style>
    <style>
        /* Make the editor wider */
        .ck-editor__editable_inline {
            min-height: 150px;

        }

        /* If you want to control the container width as well */
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create Job</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Create Job</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="formSubmit" id="formSubmit" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body p-4">
                                    <div class="row">
                                        <!-- Job Title -->
                                        <div class="col-md-6 mb-3">
                                            <label for="title">Job Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" id="title" class="form-control title"  placeholder="Enter Job Title">
                                            <span class="title-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Company Name -->
                                        <div class="col-md-6 mb-3">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" name="company_name" id="company_name" class="form-control company_name" placeholder="Enter Company Name">
                                            <span class="company_name-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Location -->
                                        <div class="col-md-6 mb-3">
                                            <label for="location">Location</label>
                                            <select name="location" id="location" class="form-control location">
                                                <option value="">Select Location</option>
                                                @foreach($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->title }}</option>
                                                @endforeach
                                            </select>
                                            <span class="location-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Category -->
                                        <div class="col-md-6 mb-3">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control category">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                            <span class="category-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Salary Range -->
                                        <div class="col-md-6 mb-3">
                                            <label for="salary_rang">Salary Range</label>
                                            <input type="text" name="salary_rang" id="salary_rang" class="form-control salary_rang" placeholder="e.g. £30,000 - £40,000">
                                            <span class="salary_rang-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Date -->
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="date"> Date<span
                                                        style="color:#ff0000">*</span></label>
                                                <input id="date" name="date" type="date"
                                                       class="form-control date" placeholder="DD-MM-YYYY">
                                                <span class="date-validation error-validation" style="color:red;"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="type">Job Type</label>
                                            <select name="type" id="type" class="form-control type">
                                                <option value="">Select Job Type</option>
                                                    <option value="Full-Time">Full Time</option>
                                                    <option value="Part-Time">Part Time</option>
                                            </select>
                                            <span class="type-validation error-validation text-danger"></span>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="destination">Destinations</label>
                                            <select name="destination" id="destination" class="form-control destination">
                                                <option value="">Select Destination</option>
                                                @foreach($destinations as $destination)
                                                    <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="category-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-12 mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control description" rows="4"></textarea>
                                            <span class="description-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- School Type -->
                                        <div class="col-md-6 mb-3">
                                            <label for="school_type">School Type</label>
                                            <select name="school_type" id="school_type" class="form-control school_type">
                                                <option value="">Select School Type</option>
                                                @foreach($schoolTypes as $type)
                                                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                                                @endforeach
                                            </select>
                                            <span class="school_type-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Specialism -->
                                        <div class="col-md-6 mb-3">
                                            <label for="specialism">Specialism</label>
                                            <select name="specialism" id="specialism" class="form-control specialism">
                                                <option value="">Select Specialism</option>
                                                @foreach($specialisms as $specialism)
                                                    <option value="{{ $specialism->id }}">{{ $specialism->title }}</option>
                                                @endforeach
                                            </select>
                                            <span class="specialism-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Position Type -->
                                        <div class="col-md-6 mb-3">
                                            <label for="position_type">Position Type</label>
                                            <select name="position_type" id="position_type" class="form-control position_type">
                                                <option value="">Select Position Type</option>
                                                @foreach($positionTypes as $position)
                                                    <option value="{{ $position->id }}">{{ $position->title }}</option>
                                                @endforeach
                                            </select>
                                            <span class="position_type-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Main Image -->
                                        <div class="col-sm-6 col-6">
                                            <label for="formFile" class="form-label">Main Image<span
                                                    style="color:#ff0000">*</span></label>
                                            <br>
                                            <small class="text-red">Size Recommended:380x250px <br> Maximum File Size Limit
                                                is 2MB</small>
                                            <div class="logo-wrapper mb-4">
                                                <img alt="Logo" src="{{ asset('admin/images/no-image.png') }}"
                                                     class="logo-image avatar-md img-thumbnail image_class mainPreview"
                                                     id="mainPreview" style="object-fit: contain;">
                                                <div class="edit-icon" onclick="triggerMainFileInput()">
                                                    <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                                         alt="Edit">
                                                </div>
                                                <span class="main_image-validation error-validation"
                                                      style="color:red;"></span>
                                            </div>
                                            <input type="file" id="main-input" name="main_image" class="file-input"
                                                   accept="image/*" onchange="previewMain(event)">
                                        </div>
                                    </div>
                                    <div class="modal-footer p-4">
                                        <a href="" class="btn btn-danger" style="margin-right: 20px;">Close</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light" id="job-btn">Save</button>
                                    </div>
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
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js">
    </script>


    <script>
        function triggerMainFileInput() {
            document.getElementById('main-input').click();
        }

        function previewMain(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('mainPreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            CKEDITOR.replace('description');



            $('#formSubmit').submit(function(e) {
                e.preventDefault();
                $("#loader").show();
                var description = CKEDITOR.instances['description'].getData();
                $('#formSubmit').data('content', 'admin/jobs/store');
                var dataContent = $(this).data('content');
                var formData = new FormData(this);
                formData.append('description', description);
                $('.error-validation').html('');

                $.ajax({
                    type: 'POST',
                    url: base_url + dataContent,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function(data) {
                        $("#formSubmit")[0].reset();
                        $("#loader").hide();
                        Swal.fire({
                            title: data.title,
                            text: data.message,
                            icon: data.icon,
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/jobs';
                            }
                        });
                    },
                    error: function(data) {
                        $("#loader").hide();
                        console.log(data.responseJSON.errors);
                        var title = data.responseJSON.errors.title;
                     
                        $('.title-validation').html(title);
                       
                    }
                });
            });

        });
    </script>
@endsection



