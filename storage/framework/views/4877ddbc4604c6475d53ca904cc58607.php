<?php if($blogs): ?>
    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="text-align: left;"><?php echo e($key + 1); ?></td>
            <td><?php echo e($blog->title); ?> </td>
            <td><a href="<?php echo e($blog->main_images->preview ?? ''); ?>" target="_blank"><img
                        src=" <?php echo e($blog->main_images->thumbnail ?? asset('admin/images/no-image.png')); ?>" alt="Blog Image"
                        width=70 height=50></a></td>
            <td><a href="<?php echo e($blog->inner_images->preview ?? ''); ?>" target="_blank"><img
                        src="<?php echo e($blog->inner_images->thumbnail ?? asset('admin/images/no-image.png')); ?>" alt="Blog Image"
                        width=70 height=50></a></td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input status" type="checkbox" role="switch" value="<?php echo e($blog->id); ?>"
                        <?php if($blog->status == 1): ?> checked <?php endif; ?>>
                </div>
            </td>
            <td>
                <ul class="list-unstyled hstack gap-1 mb-0">
                    <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                        <a href="/admin/blog/edit/<?php echo e($blog->id); ?>" class="btn btn-sm btn-soft-info editIcon"><i
                                class="mdi mdi-pencil-outline"></i></a>
                    </li>
                    <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                        <a href="#" class="btn btn-sm btn-soft-danger deleteIcon" data-id="<?php echo e($blog->id); ?>"><i
                                class="mdi mdi-delete-outline"></i></a>
                    </li>
                </ul>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <tr>
        <td colspan="10">There are no service.</td>
    </tr>
<?php endif; ?>
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/blog/blogResult.blade.php ENDPATH**/ ?>