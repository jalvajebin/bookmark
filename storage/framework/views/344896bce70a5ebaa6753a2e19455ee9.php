<div id="tab2" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Contact Details</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Contact Details</li>
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
                    <form id="contactFormSubmit">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="contact_id" id="contact_id" value="<?php echo e($contact->id ?? ''); ?>">
                        <div class="row">
                           
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        value="<?php echo e($contact->title ?? ''); ?>" class="form-control title"
                                        placeholder="Enter title">
                                    <span class="title_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input type="phone" name="phone" id="phone"
                                        value="<?php echo e($contact->phone ?? ''); ?>" class="form-control phone"
                                        placeholder="Enter phone number">
                                    <span class="phone_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="<?php echo e($contact->email ?? ''); ?>" placeholder="Enter email address">
                                    <span class="email_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>

                          
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="address">Address</label>
                                    <textarea id="address" name="address" class="form-control" placeholder="Enter address"><?php echo e($contact->address ?? ''); ?></textarea>
                                    <span class="address_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="discription">Discription</label>
                                    <textarea id="discription" name="description" class="form-control" placeholder="Enter discription"><?php echo e($contact->description ?? ''); ?></textarea>
                                    <span class="discription_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email">Map link</label>
                                    <input type="text" name="map_link" id="map_link" class="form-control"
                                        value="<?php echo e($contact->map_link ?? ''); ?>" placeholder="Enter Map link ">
                                    <span class="map_link_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>

                           
                          
                            <div class="col-sm-6 col-md-6 col-6">
                                <label for="formFile" class="form-label">Logo<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <small class="text-red"> Maximum File Size Limit is 2MB</small>
                                <div class="logo-wrapper mb-3">
                                    <img alt="Logo"
                                        src="<?php echo e($contact->logo->url ?? asset('admin/images/no-image.png')); ?>"
                                        class="logo-image avatar-md img-thumbnail image_class logo1" id="logo1"
                                        style="object-fit: contain;">
                                    <div class="edit-icon" onclick="logo1InputTrigger()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <span class="banner_image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="contact1_input" name="logo_image" class="file-input"
                                    accept="image/*" onchange="previewContact1(event)">
                                
                                <span class="logo1_validation error-validation" style="color:red;"></span>
                            </div>
                            

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="alt">Image Alt</label>
                                    <input id="logo_alt" name="alt" type="text" class="form-control"
                                        value="<?php echo e($contact->alt ?? ''); ?>" placeholder="Enter alt">
                                </div>
                            </div>

                        </div>
                        <div class="d-flex flex-wrap left_side gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light"
                                onclick="addContact(event)"><?php echo e(isset($contact) ? 'Update' : 'Save'); ?>

                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/contact/contact.blade.php ENDPATH**/ ?>