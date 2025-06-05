<?php if($tags): ?>
    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td><?php echo e($data->tag_title_en); ?></td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input statusTag" type="checkbox" role="switch" value="<?php echo e($data->id); ?>"
                        <?php if($data->status == 1): ?> checked <?php endif; ?>>
                </div>
            </td>
            <td>
                <ul class="list-unstyled hstack gap-1 mb-0">
                    <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                        <a href="#" class="btn btn-sm btn-soft-info editTagIcon" data-id="<?php echo e($data->id); ?>"><i
                                class="mdi mdi-pencil-outline"></i></a>
                    </li>
                    <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                        <a href="#" class="btn btn-sm btn-soft-danger deleteTagIcon"
                            data-id="<?php echo e($data->id); ?>"><i class="mdi mdi-delete-outline"></i></a>
                    </li>
                </ul>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <tr>
        <td colspan="4">There are no data.</td>
    </tr>
<?php endif; ?>
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/blog/tagResult.blade.php ENDPATH**/ ?>