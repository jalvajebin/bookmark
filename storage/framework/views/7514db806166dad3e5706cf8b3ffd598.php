<?php $__env->startSection('title'); ?>
    <?php echo e('Dashboard | Bookmark'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .title {
            font-size: 1rem
        }

        .icon i {
            font-size: 1.8rem;
        }

        .count h4 {
            font-size: 1.5rem;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="container-fluid">
            <?php echo $__env->make('admin.dashboard.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>