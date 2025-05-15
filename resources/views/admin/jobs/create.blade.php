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
                        <h4 class="mb-sm-0 font-size-18">Create Jobs</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Create job</li>
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
                            <form class="formSubmit"  id="formSubmit">
                                @csrf
                                <input type="hidden" class="blog_id" name="blog_id" id="blog_id">
                                <div class="modal-body p-4">
                                    <div class="row">
                                        <!-- Title -->
                                        <div class="col-12 mb-3">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input id="title" name="title" type="text" class="form-control title" placeholder="Enter Title">
                                            <span class="title-validation error-validation text-danger"></span>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="destination">destination<span style="color:#ff0000">*</span></label>
                                                <select class="select2 form-control category"
                                                    id="destination" name="destination"
                                                    data-placeholder="Select destination" aria-placeholder="Select destination">
                                                    @if ($destinations)
                                                        @foreach ($destinations as $destination)
                                                            <option value="{{ $destination->id }}">
                                                                {{ $destination->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="category-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                            
                                        <!-- Main Image -->
                                        <div class="col-md-6 mb-3">
                                            <label for="main-input" class="form-label">Main Image <span class="text-danger">*</span></label>
                                            <small class="text-danger d-block">Recommended: 380x250px | Max: 2MB</small>
                                            <div class="logo-wrapper mb-2">
                                                <img src="{{ asset('admin/images/no-image.png') }}" alt="Logo"
                                                     class="logo-image avatar-md img-thumbnail image_class mainPreview"
                                                     id="mainPreview" style="object-fit: contain;">
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
                                            <input type="text" name="location" class="form-control" required>
                                        </div>
                            
                                        <!-- Salary Min / Max -->
                                        <div class="col-md-6 mb-3">
                                            <label for="salary_min" class="form-label">Minimum Salary (£)</label>
                                            <input type="number" name="salary_min" class="form-control" required>
                                        </div>
                            
                                        <div class="col-md-6 mb-3">
                                            <label for="salary_max" class="form-label">Maximum Salary (£)</label>
                                            <input type="number" name="salary_max" class="form-control" required>
                                        </div>
                            
                                        <!-- Posted Date / Start Date -->
                                        <div class="col-md-6 mb-3">
                                            <label for="posted_date" class="form-label">Posted Date</label>
                                            <input type="date" name="posted_date" class="form-control" required>
                                        </div>
                            
                                        <div class="col-md-6 mb-3">
                                            <label for="start_date" class="form-label">Start Date</label>
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                            
                                        <!-- Image Alt -->
                                        <div class="col-md-6 mb-3">
                                            <label for="alt" class="form-label">Image Alt</label>
                                            <input id="alt" name="alt" type="text" class="form-control alt" placeholder="Enter Alt">
                                        </div>
                            
                                        <!-- Description -->
                                        <div class="col-12 mb-3">
                                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea id="description" name="description" rows="5" class="form-control description" placeholder="Enter Description"></textarea>
                                            <span class="description-validation error-validation text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Footer -->
                                <div class="modal-footer p-4">
                                    <a href="{{ route('jobs.index') }}" class="btn btn-danger me-3" data-bs-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-primary" id="job-btn">Save</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
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
    <script>
        function triggerInnerFileInput() {
            document.getElementById('inner-input').click();
        }

        function previewInner(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('innerPreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script>
        function triggerInner1FileInput() {
            document.getElementById('inner1-input').click();
        }

        function previewInner1(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('inner1Preview');
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

            $('#date').datetimepicker({
                format: 'DD-MM-YYYY',
            });

            CKEDITOR.replace('description');
           


            $('#formSubmit').submit(function(e) {
                e.preventDefault();

        const form = $(this)[0];
        const formData = new FormData(form);
         const description = CKEDITOR.instances['description'].getData();
         formData.set('description', description);

        // Clear old errors
        $('.error-validation').html('');

        // Disable submit button
        $('#job-btn').prop('disabled', false).text('Saving...');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('job.store') }}",  // Laravel route
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function(data) {
                        console.log(data,'sfs');

                        $("#formSubmit")[0].reset();
                        $("#loader").hide();
                        $('#job-btn').prop('enebled', false).text('Save');
                        Swal.fire({
                            title: data.title || 'Success',
                            text: data.message || 'Job saved successfully.',
                            icon: data.icon || 'success',
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
                        // var title = data.responseJSON.errors.title;
                        // var priority = data.responseJSON.errors.priority;
                        // var main_image = data.responseJSON.errors.main_image;
                        // var inner_image = data.responseJSON.errors.inner_image;
                        // var tag = data.responseJSON.errors.tag_ids;
                        // var category = data.responseJSON.errors.category_ids;
                        // var author = data.responseJSON.errors.author;
                        // var date = data.responseJSON.errors.date;
                        // var description = data.responseJSON.errors.description;

                        // $('.title-validation').html(title);
                        // $('.priority-validation').html(priority);
                        // $('.main_image-validation').html(main_image);
                        // $('.inner_image-validation').html(inner_image);
                        // $('.tag-validation').html(tag);
                        // $('.category-validation').html(category);
                        // $('.author-validation').html(author);
                        // $('.date-validation').html(date);
                        // $('.description-validation').html(description);
                    }
                });
            });
        });
    </script>
@endsection
