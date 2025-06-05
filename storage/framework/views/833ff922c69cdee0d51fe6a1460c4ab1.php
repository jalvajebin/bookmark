<div id="tab4" class="tab-content">
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
                    <form class="counterFormSubmit" id="counterFormSubmit">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="counter_id" id="counter_id"
                            value="<?php echo e($counter->id ?? ''); ?>">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="counter_1_name">Count 1 Name</label>
                                    <input id="counter_1_name" name="counter_1_name" type="text"
                                        class="form-control counter_1_name" placeholder="Count 1 Name"
                                        value="<?php echo e($counter->counter_1_name ?? ''); ?>">
                                    <span class="counter_1_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="count1 ">Count 1</label>
                                    <input id="count1" name="count1" type="text" class="form-control count1"
                                        placeholder="Count 1" value="<?php echo e($counter->count1 ?? ''); ?>">
                                    <span class="count1_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="formFile" class="form-label">Count 1 Image<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                        src="<?php echo e($counter->count1Image->url ?? asset('admin/images/no-image.png')); ?>"
                                        class="logo-image avatar-md img-thumbnail image_class counter1ImagePreview"
                                        id="counter1ImagePreview" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="triggerCounter1FileInput()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <span class="counter1_image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="counter1_image_name" name="counter1_image_name" class="file-input"
                                    accept="image/*" onchange="previewCounter1(event)">
                                <div class="mb-4 mt-3">
                                    <label for="counter_1_alt">Counter 1 Alt</label>
                                    <input id="counter_1_alt" name="counter_1_alt" type="text" class="form-control"
                                        value="<?php echo e($counter->counter_1_alt ?? ''); ?>" placeholder="Enter alt">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="counter_2_name">Count 2 Name</label>
                                    <input id="counter_2_name" name="counter_2_name" type="text"
                                        class="form-control counter_2_name" placeholder="Count 2 Name"
                                        value="<?php echo e($counter->counter_2_name ?? ''); ?>">
                                    <span class="counter_2_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="count2">Count 2</label>
                                    <input id="count2" name="count2" type="text" class="form-control count2"
                                        placeholder="Count 2" value="<?php echo e($counter->count2 ?? ''); ?>">
                                    <span class="count2_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="formFile" class="form-label">Count 2 Image<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                        src="<?php echo e($counter->count2Image->url ?? asset('admin/images/no-image.png')); ?>"
                                        class="logo-image avatar-md img-thumbnail image_class counter2ImagePreview"
                                        id="counter2ImagePreview" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="triggerCounter2FileInput()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <span class="counter2_image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="counter2_image_name" name="counter2_image_name" class="file-input"
                                    accept="image/*" onchange="previewCounter2(event)">
                                <div class="mb-4 mt-3">
                                    <label for="counter_2_alt">Counter 2 Alt</label>
                                    <input id="counter_2_alt" name="counter_2_alt" type="text" class="form-control"
                                        value="<?php echo e($counter->counter_2_alt ?? ''); ?>" placeholder="Enter alt">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="counter_3_name">Count 3 Name</label>
                                    <input id="counter_3_name" name="counter_3_name" type="text"
                                        class="form-control counter_3_name" placeholder="Count 3 Name"
                                        value="<?php echo e($counter->counter_3_name ?? ''); ?>">
                                    <span class="counter_3_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="count3">Count 3</label>
                                    <input id="count3" name="count3" type="text" class="form-control count3"
                                        placeholder="Count 3" value="<?php echo e($counter->count3 ?? ''); ?>">
                                    <span class="count3_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="formFile" class="form-label">Count 3 Image<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                        src="<?php echo e($counter->count3Image->url ?? asset('admin/images/no-image.png')); ?>"
                                        class="logo-image avatar-md img-thumbnail image_class counter3ImagePreview"
                                        id="counter3ImagePreview" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="triggerCounter3FileInput()">
                                        <img src="https://img.icons8.com/material-outlined/34/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <span class="counter3_image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="counter3_image_name" name="counter3_image_name" class="file-input"
                                    accept="image/*" onchange="previewCounter3(event)">
                                <div class="mb-4 mt-3">
                                    <label for="counter_3_alt">Counter 3 Alt</label>
                                    <input id="counter_3_alt" name="counter_3_alt" type="text" class="form-control"
                                        value="<?php echo e($counter->counter_3_alt ?? ''); ?>" placeholder="Enter alt">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="counter_4_name">Count 4 Name</label>
                                    <input id="counter_4_name" name="counter_4_name" type="text"
                                        class="form-control counter_4_name" placeholder="Count 4 Name"
                                        value="<?php echo e($counter->counter_4_name ?? ''); ?>">
                                    <span class="counter_4_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="count4">Count 4</label>
                                    <input id="count4" name="count4" type="text" class="form-control count4"
                                        placeholder="Count 4" value="<?php echo e($counter->count4 ?? ''); ?>">
                                    <span class="count4_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="formFile" class="form-label">Count 4 Image<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                        src="<?php echo e($counter->count4Image->url ?? asset('admin/images/no-image.png')); ?>"
                                        class="logo-image avatar-md img-thumbnail image_class counter4ImagePreview"
                                        id="counter4ImagePreview" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="triggerCounter4FileInput()">
                                        <img src="https://img.icons8.com/material-outlined/44/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <span class="counter4_image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="counter4_image_name" name="counter4_image_name" class="file-input"
                                    accept="image/*" onchange="previewCounter4(event)">
                                <div class="mb-4 mt-4">
                                    <label for="counter_4_alt">Counter 4 Alt</label>
                                    <input id="counter_4_alt" name="counter_4_alt" type="text" class="form-control"
                                        value="<?php echo e($counter->counter_4_alt ?? ''); ?>" placeholder="Enter alt">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="counter_5_name">Count 5 Name</label>
                                    <input id="counter_5_name" name="counter_5_name" type="text"
                                        class="form-control counter_5_name" placeholder="Count 5 Name"
                                        value="<?php echo e($counter->counter_5_name ?? ''); ?>">
                                    <span class="counter_5_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="count5">Count 5</label>
                                    <input id="count5" name="count5" type="text" class="form-control count"
                                        placeholder="Count 5" value="<?php echo e($counter->count5 ?? ''); ?>">
                                    <span class="count5_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="counter_6_name">Count 6 Name</label>
                                    <input id="counter_6_name" name="counter_6_name" type="text"
                                        class="form-control counter_6_name" placeholder="Count 6 Name"
                                        value="<?php echo e($counter->counter_6_name ?? ''); ?>">
                                    <span class="counter_6_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="count6">Count 6</label>
                                    <input id="count6" name="count6" type="text" class="form-control count"
                                        placeholder="Count 6" value="<?php echo e($counter->count6 ?? ''); ?>">
                                    <span class="count6_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="counter_7_name">Count 7 Name</label>
                                    <input id="counter_7_name" name="counter_7_name" type="text"
                                        class="form-control counter_7_name" placeholder="Count 7 Name"
                                        value="<?php echo e($counter->counter_7_name ?? ''); ?>">
                                    <span class="counter_7_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="count7">Count 7</label>
                                    <input id="count7" name="count7" type="text" class="form-control count"
                                        placeholder="Count 7" value="<?php echo e($counter->count7 ?? ''); ?>">
                                    <span class="count7_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="counter_8_name">Count 8 Name</label>
                                    <input id="counter_8_name" name="counter_8_name" type="text"
                                        class="form-control counter_8_name" placeholder="Count 8 Name"
                                        value="<?php echo e($counter->counter_8_name ?? ''); ?>">
                                    <span class="counter_8_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="count8">Count 8</label>
                                    <input id="count8" name="count8" type="text" class="form-control count"
                                        placeholder="Count 8" value="<?php echo e($counter->count8 ?? ''); ?>">
                                    <span class="count8_validation error-validation" style="color:red;"></span>
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
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/about/counters.blade.php ENDPATH**/ ?>