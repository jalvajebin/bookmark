<div id="tab5" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Banner</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(route('about.index')); ?>">About</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Banner
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
                    <form class="contactBannerFormSubmit" id="contactBannerFormSubmit">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" class="banner_contact_id" name="banner_contact_id" id="banner_contact_id"
                            value="<?php echo e($contactBanner->id ?? ''); ?>">
                        <input type="hidden" class="page" name="page" id="page" value="homeContact">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="banner_title">Title</label>
                                    <input id="title" name="title" type="text"
                                        class="form-control banner_title" placeholder="Title"
                                        value="<?php echo e($contactBanner->title ?? ''); ?>">
                                    <span class="contact-title-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-4">
                                    <label for="description">Description<span
                                            style="color:#ff0000">*</span></label>
                                    <textarea id="contact_description" name="contact_description" rows="5" class="form-control contact_description"
                                        placeholder="Enter Description"><?php echo e(optional($contactBanner)->description); ?>

                                    </textarea>
                                    <span class="contact-description-validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-12">
                                <label for="formFile" class="form-label">Image<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                        src="<?php echo e($contactBanner->images->preview ?? asset('admin/images/no-image.png')); ?>"
                                        class="logo-image avatar-md img-thumbnail image_class ContactPreview1"
                                        id="ContactPreview1" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="triggerContactBanner1FileInput()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <span class="contact-image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="banner-contact-input" name="contact_image" class="file-input"
                                    accept="image/*" onchange="previewContactBanner1(event)">
                                <div class="mb-4 mt-3">
                                    <label for="name">Image Alt</label>
                                    <input name="contact_alt" type="text" value="<?php echo e($contactBanner->alt ?? ''); ?>"
                                        class="form-control" id="contact_alt" placeholder="Enter Alt">
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
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/home/home-contact-banner.blade.php ENDPATH**/ ?>