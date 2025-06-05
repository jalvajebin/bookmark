<div id="tab3" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Contact</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(route('about.index')); ?>">About</a>
                        </li>
                        <li class="breadcrumb-item active">
                            We Recruit For
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
                    <form class="weRecruitForFormSubmit" id="weRecruitForFormSubmit">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="recruit_id" id="recruit_id"
                            value="<?php echo e($weRecruitFor->id ?? ''); ?>">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="heading" class="form-label">Heading</label>
                                <input type="text" id="heading" name="heading" class="form-control"
                                    placeholder="Heading" value="<?php echo e($weRecruitFor->heading ?? ''); ?>">
                                <span class="text-danger heading-validation error-validation"></span>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" rows="5" class="form-control description"
                                        placeholder="Enter Description"><?php echo e($weRecruitFor->description ?? ''); ?></textarea>
                                    <span class="description_validation error-validation" style="color:red;"></span>
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
</div>
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/employer/we-recruit-for.blade.php ENDPATH**/ ?>