<div id="tab3" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Seo Settings</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Seo Settings</li>
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
                    <form class="seoFormSubmit" data-id="<?php echo e($seo->id ?? ''); ?>" id="seoFormSubmit">
                        <input type=hidden class="page" name="page" value="service">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="meta_title">Meta Title</label>
                                    <input id="meta_title" name="meta_title" type="text"
                                        class="form-control meta_title" value="<?php echo e($seo->meta_title ?? ''); ?>"
                                        placeholder="Meta Title">
                                    <span class="meta_title-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input id="meta_keyword" name="meta_keyword" type="text"
                                        class="form-control meta_keyword" value="<?php echo e($seo->meta_keyword ?? ''); ?>"
                                        placeholder="Meta Keyword">
                                    <span class="meta_keyword-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-4">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea id="meta_description" name="meta_description" rows="5" class="form-control meta_description"
                                        placeholder="Enter Meta Description"><?php echo e($seo->meta_description ?? ''); ?></textarea>
                                    <span class="meta_description-validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap left_side gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/services/seo.blade.php ENDPATH**/ ?>