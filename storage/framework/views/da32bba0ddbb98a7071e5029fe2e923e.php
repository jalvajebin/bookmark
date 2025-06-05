<div id="tab3" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4>About Us</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
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
                    <form class="learnAboutUsFormSubmit" id="learnAboutUsFormSubmit">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="learn_about_us_id" id="learn_about_us_id"
                            value="<?php echo e($learnAboutUs->id ?? ''); ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="title">Title</label>
                                    <input id="title" name="title" type="text" class="form-control title"
                                        placeholder="Title" value="<?php echo e($learnAboutUs->title ?? ''); ?>">
                                    <span class="title-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="heading">Heading</label>
                                    <input id="heading" name="heading" type="text" class="form-control heading"
                                        placeholder="Heading" value="<?php echo e($learnAboutUs->heading ?? ''); ?>">
                                    <span class="heading-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-6 col-6">
                                <label for="formFile" class="form-label">Employee Image <span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <small class="text-red"> Maximum File Size Limit is 2MB</small>
                                <div class="logo-wrapper mb-3">
                                    <img alt="EmployeeImage"
                                        src="<?php echo e($learnAboutUs->employee_image_name->url ?? asset('admin/images/no-image.png')); ?>"
                                        class="logo-image avatar-md img-thumbnail EmployeeImagePreview"
                                        id="EmployeeImagePreview" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="EmployeeImageInputTrigger()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="employee_image" name="employee_image" class="file-input"
                                    accept="image/*" onchange="employeePreviewImage1(event)">
                                <span class="employee_image_validation error-validation" style="color:red;"></span>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="employee_description">Employee Description</label>
                                    <textarea id="employee_description" name="employee_description" rows="5" class="form-control employee_description"
                                        placeholder="Enter Employee Description"><?php echo e($learnAboutUs->employee_description ?? ''); ?></textarea>
                                    <span class="employee_description_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="employee_alt">Employee Image Alt</label>
                                    <input id="employee_alt" name="employee_alt" type="text" class="form-control"
                                        value="<?php echo e($learnAboutUs->employee_alt ?? ''); ?>" placeholder="Enter alt">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="employee_content_1">Employee Content 1</label>
                                    <input id="employee_content_1" name="employee_content_1" type="text"
                                        class="form-control employee_content_1" placeholder="Employee Content 1"
                                        value="<?php echo e($learnAboutUs->employee_content_1 ?? ''); ?>">
                                    <span class="employee_content_1_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="employee_content_2">Employee Content 2</label>
                                    <input id="employee_content_2" name="employee_content_2" type="text"
                                        class="form-control employee_content_2" placeholder="Employee Content 2"
                                        value="<?php echo e($learnAboutUs->employee_content_2 ?? ''); ?>">
                                    <span class="employee_content_2_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="employee_content_3">Employee Content 3</label>
                                    <input id="employee_content_3" name="employee_content_3" type="text"
                                        class="form-control employee_content_3" placeholder="Employee Content 3"
                                        value="<?php echo e($learnAboutUs->employee_content_3 ?? ''); ?>">
                                    <span class="employee_content_3_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-6">
                                <label for="formFile" class="form-label">Employer Image <span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <small class="text-red"> Maximum File Size Limit is 2MB</small>
                                <div class="logo-wrapper mb-3">
                                    <img alt="EmployerImage"
                                        src="<?php echo e($learnAboutUs->employer_image_name->url ?? asset('admin/images/no-image.png')); ?>"
                                        class="logo-image avatar-md img-thumbnail employerImagePreview"
                                        id="employerImagePreview" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="employerImageInputTrigger()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="employer_image" name="employer_image" class="file-input"
                                    accept="image/*" onchange="employerPreviewImage1(event)">
                                <span class="employer_image_validation error-validation" style="color:red;"></span>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="employer_description">Employer Description</label>
                                    <textarea id="employer_description" name="employer_description" rows="5"
                                        class="form-control employer_description" placeholder="Enter Employer Description"><?php echo e($learnAboutUs->employer_description ?? ''); ?></textarea>
                                    <span class="employer_description_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="employer_alt">Employer Image Alt</label>
                                    <input id="employer_alt" name="employer_alt" type="text" class="form-control"
                                        value="<?php echo e($learnAboutUs->employer_alt ?? ''); ?>" placeholder="Enter alt">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="employer_content_1">Employer Content 1</label>
                                    <input id="employer_content_1" name="employer_content_1" type="text"
                                        class="form-control employer_content_1" placeholder="Employer Content 1"
                                        value="<?php echo e($learnAboutUs->employer_content_1 ?? ''); ?>">
                                    <span class="employer_content_1_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="employer_content_2">Employer Content 2</label>
                                    <input id="employer_content_2" name="employer_content_2" type="text"
                                        class="form-control employer_content_2" placeholder="Employer Content 2"
                                        value="<?php echo e($learnAboutUs->employer_content_2 ?? ''); ?>">
                                    <span class="employer_content_2_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="employer_content_3">Employer Content 3</label>
                                    <input id="employer_content_3" name="employer_content_3" type="text"
                                        class="form-control employer_content_3" placeholder="Employer Content 3"
                                        value="<?php echo e($learnAboutUs->employer_content_3 ?? ''); ?>">
                                    <span class="employer_content_3_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap left_side gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/about/learn-about-agency.blade.php ENDPATH**/ ?>