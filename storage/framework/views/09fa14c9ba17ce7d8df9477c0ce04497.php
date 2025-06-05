<?php $__env->startSection('title'); ?>
    <?php echo e('Jobs | Veuz'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Job</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
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
                            <form class="formSubmit" data-content=" " id="formSubmit">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" class="job_id" name="job_id" value="<?php echo e($job->id); ?>">
                                <div class="modal-body p-4">
                                    <div class="row">
                                        <!-- Job Title -->
                                        <div class="col-md-6 mb-3">
                                            <label for="title">Job Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" id="title" class="form-control title"
                                                placeholder="Enter Job Title" value="<?php echo e(old('title', $job->title)); ?>">
                                            <span class="title-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Company Name -->
                                        <div class="col-md-6 mb-3">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" name="company_name" id="company_name"
                                                class="form-control company_name" placeholder="Enter Company Name"
                                                value="<?php echo e(old('company_name', $job->company_name)); ?>">
                                            <span class="company_name-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Location -->
                                        <div class="col-md-6 mb-3">
                                            <label for="location">Location</label>
                                            <select name="location" id="location" class="form-control location">
                                                <option value="">Select Location</option>
                                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($location->id); ?>"
                                                        <?php echo e(old('location', $job->location) == $location->id ? 'selected' : ''); ?>>
                                                        <?php echo e($location->title); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="location-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Category -->
                                        <div class="col-md-6 mb-3">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control category">
                                                <option value="">Select Category</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"
                                                        <?php echo e(old('category', $job->category) == $category->id ? 'selected' : ''); ?>>
                                                        <?php echo e($category->title); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="category-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Salary Range -->
                                        <div class="col-md-6 mb-3">
                                            <label for="salary_rang">Salary Range</label>
                                            <input type="text" name="salary_rang" id="salary_rang"
                                                class="form-control salary_rang" placeholder="e.g. £30,000 - £40,000"
                                                value="<?php echo e(old('salary_rang', $job->salary_rang)); ?>">
                                            <span class="salary_rang-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Date -->
                                        <div class="col-md-6 mb-3">
                                            <label for="date">Date</label>
                                            <input id="date" name="date" type="date" class="form-control date"
                                                value="<?php echo e(\Carbon\Carbon::parse($job->date)->format('Y-m-d')); ?>"
                                                placeholder="DD-MM-YYYY">
                                            <span class="date-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Job Type -->
                                        <div class="col-md-6 mb-3">
                                            <label for="type">Job Type</label>
                                            <select name="type" id="type" class="form-control type">
                                                <option value="">Select Job Type</option>
                                                <option value="Full-Time"
                                                    <?php echo e(old('type', $job->job_type) == 'Full-Time' ? 'selected' : ''); ?>>Full
                                                    Time</option>
                                                <option value="Part-Time"
                                                    <?php echo e(old('type', $job->job_type) == 'Part-Time' ? 'selected' : ''); ?>>Part
                                                    Time</option>
                                            </select>
                                            <span class="type-validation error-validation text-danger"></span>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="destination">Destinations</label>
                                            <select name="destination" id="destination" class="form-control destination">
                                                <option value="">Select Destination</option>
                                                <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($destination->id); ?>"
                                                        <?php echo e(old('destination', $job->destination_id) == $destination->id ? 'selected' : ''); ?>>
                                                        <?php echo e($destination->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="category-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-12 mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control description" rows="4"><?php echo e(old('description', $job->description)); ?></textarea>
                                            <span class="description-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- School Type -->
                                        <div class="col-md-6 mb-3">
                                            <label for="school_type">School Type</label>
                                            <select name="school_type" id="school_type" class="form-control school_type">
                                                <option value="">Select School Type</option>
                                                <?php $__currentLoopData = $schoolTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($type->id); ?>"
                                                        <?php echo e(old('school_type', $job->school_type) == $type->id ? 'selected' : ''); ?>>
                                                        <?php echo e($type->title); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="school_type-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Specialism -->
                                        <div class="col-md-6 mb-3">
                                            <label for="specialism">Specialism</label>
                                            <select name="specialism" id="specialism" class="form-control specialism">
                                                <option value="">Select Specialism</option>
                                                <?php $__currentLoopData = $specialisms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialism): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($specialism->id); ?>"
                                                        <?php echo e(old('specialism', $job->specialism) == $specialism->id ? 'selected' : ''); ?>>
                                                        <?php echo e($specialism->title); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="specialism-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Position Type -->
                                        <div class="col-md-6 mb-3">
                                            <label for="position_type">Position Type</label>
                                            <select name="position_type" id="position_type"
                                                class="form-control position_type">
                                                <option value="">Select Position Type</option>
                                                <?php $__currentLoopData = $positionTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($position->id); ?>"
                                                        <?php echo e(old('position_type', $job->position_type) == $position->id ? 'selected' : ''); ?>>
                                                        <?php echo e($position->title); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="position_type-validation error-validation text-danger"></span>
                                        </div>

                                        <!-- Main Image -->
                                        <div class="col-sm-6 col-6">
                                            <label for="formFile" class="form-label">Main Image<span
                                                    style="color:#ff0000">*</span></label><br>
                                            <small class="text-red">Size Recommended:380x250px <br> Maximum File Size Limit
                                                is 2MB</small>
                                            <div class="logo-wrapper mb-4">
                                                <img alt="Logo"
                                                    src="<?php if($job->MainImages): ?> <?php echo e($job->MainImages->getUrl('preview')); ?> <?php else: ?> <?php echo e(asset('admin/images/no-image.png')); ?> <?php endif; ?>"
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

                                    <!-- Footer -->
                                    <div class="modal-footer p-4">
                                        <a href="" class="btn btn-danger" style="margin-right: 20px;">Close</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"
                                            id="job-btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
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
                $('#formSubmit').data('content', 'admin/jobs/update');
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
                        // var priority = data.responseJSON.errors.priority;
                        // var main_image = data.responseJSON.errors.main_image;
                        // var inner_image = data.responseJSON.errors.inner_image;
                        // var tag = data.responseJSON.errors.tag_ids;
                        // var category = data.responseJSON.errors.category_ids;
                        // var author = data.responseJSON.errors.author;
                        // var date = data.responseJSON.errors.date;
                        // var description = data.responseJSON.errors.description;

                        $('.title-validation').html(title);
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/jobs/edit.blade.php ENDPATH**/ ?>