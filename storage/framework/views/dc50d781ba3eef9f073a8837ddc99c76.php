<?php if($jobs->isEmpty()): ?>
    <div class="no-jobs-found text-center p-4">
        <h4>No jobs found</h4>
        <p>Please adjust your filters or try again later.</p>
    </div>
<?php else: ?>
    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('job.details', $job->slug)); ?>" class="text-decoration-none text-dark">
            <div class="sub-job-card p-4 mb-3 border rounded shadow-sm hover-shadow transition-all">
                <!-- Header Section -->
                <div class="sub-job-header d-flex justify-content-between align-items-start mb-3">
                    <h3 class="sub-job-title m-0">
                        <?php echo e($job->title); ?>

                    </h3>
                    <span class="sub-job-date ms-3"><?php echo e(\Carbon\Carbon::parse($job->date)->format('d M Y')); ?></span>
                </div>

                <!-- Details Section -->
                <div class="sub-job-details d-flex gap-4 mb-3">
                    <div class="sub-job-location d-flex align-items-center">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        <span><?php echo e($job->locationModel->title ?? 'N/A'); ?></span>
                    </div>
                    <?php if($job->salary_rang): ?>
                    <div class="sub-job-salary d-flex align-items-center">
                        <i class="fas fa-pound-sign me-2"></i>
                        <span>£<?php echo e($job->salary_rang); ?> per month</span>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Description Section -->
                <div class="sub-job-description mb-2">
                    <p class="text-secondary mb-0">
                        <?php echo Str::limit(strip_tags($job->description), 150); ?>

                    </p>
                </div>

                <a href="<?php echo e(route('job.details', $job->slug)); ?>"
                    class="read-more d-inline-flex align-items-center text-decoration-none">
                    read more
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/website/partials/job_list.blade.php ENDPATH**/ ?>