<div id="tab2" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Why Work With Us</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(route('about.index')); ?>">About</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Why Work With Us
                        </li>
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
                    <form id="formSubmit" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type ="hidden" id ="why_work_with_us_id" name="why_work_with_us_id"
                            class="why_work_with_us_id" value="<?php echo e(optional($why)->id); ?>">
                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control title" placeholder="Enter title" value= "<?php echo e(optional($why)->title); ?>">
                                
                            <span class="title-validation error-validation" style="color:red;" "></span>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description">Description <span class="style="color:red;"">*</span></label>
                            <textarea name="description" id="why_description" class="form-control why_description"><?php echo e(optional($why)->description); ?></textarea>
                            <span class="error-validation why-description-validation" style="color:red;""></span>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image<span style="color:#ff0000">*</span></label>
                            <br>
                            <div class="logo-wrapper">
                                <img alt="Logo"
                                    src="<?php echo e($why->Images['preview'] ?? asset('admin/images/no-image.png')); ?>"
                                    class="logo-image avatar-md img-thumbnail image_class Image" id="Image"
                                    style="object-fit: contain;">
                                <div class="edit-icon" onclick="triggerImageFileInput()">
                                    <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                        alt="Edit">
                                </div>
                            </div>
                            <span class="icon-validation error-validation" style="color:red;"></span>
                            <input type="file" id="image" name="image" class="file-input" accept="image/*"
                                onchange="previewImage(event)">

                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end">
                            <a href="<?php echo e(route('index')); ?>" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/home/why-work-with-us.blade.php ENDPATH**/ ?>