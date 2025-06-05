<?php $__env->startSection('content'); ?>
    <!-- banner  -->
    <div class="inner-banner">
        <div class="inner-banner-overlay"></div>
        <div class="inner-banner-cntnt">
            <div class="custom-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Find Job</li>
                    </ol>
                </nav>
                <h1>Find Job</h1>
                <p>Your trusted partner in educational recruitment, connecting exceptional educators with outstanding
                    institutions.</p>
            </div>
        </div>
    </div>
    <!-- banner  -->

    <!-- main-body -->
    <div class="main-body">

        <section class="blog-section section-padding">
            <div class="custom-container">
                <div class="row">
                    <!-- Blog Posts Column -->


                    <!-- Sidebar -->
                    <div class="col-lg-4 order-1 order-md-1" data-aos="fade-left">
                        <!-- Search Widget -->


                        <!-- Categories Widget -->
                        <div class="sidebar-widget">
                            <h4>Find job</h4>
                            <form action="<?php echo e(route('jobs.list')); ?>" id="searchForm" class="search-form">
                                <input type="text" id="search_job" name="search"
                                    value="<?php echo e(request()->query('search')); ?>" placeholder="Enter Keywords">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Recent Posts Widget -->
                        <?php
                            $currentQuery = request()->query();
                        ?>

                        <div class="sidebar-widget">
                            <h4>Refine Your Search</h4>

                            
                            

                            
                            <div>
                                <h6>Location</h6>
                                <div class="tags">
                                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" class="filter-tag" data-filter="location"
                                            data-id="<?php echo e($location->id); ?>">
                                            <?php echo e($location->title); ?> <span>(<?php echo e($location->jobs->count()); ?>)</span>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            
                            <div>
                                <h6>Specialism</h6>
                                <div class="tags">
                                    <?php $__currentLoopData = $specialisms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialism): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" class="filter-tag" data-filter="specialism"
                                            data-id="<?php echo e($specialism->id); ?>">
                                            <?php echo e($specialism->title); ?> <span>(<?php echo e($specialism->jobs->count()); ?>)</span>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            
                            <div>
                                <h6>Position Type</h6>
                                <div class="tags">
                                    <?php $__currentLoopData = $positionTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $positionType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" class="filter-tag" data-filter="position_type"
                                            data-id="<?php echo e($positionType->id); ?>">
                                            <?php echo e($positionType->title); ?> <span>(<?php echo e($positionType->jobs->count()); ?>)</span>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>


                        <!-- Tags Widget -->

                    </div>

                    <div class="col-lg-8 order-2 order-md-2" data-aos="fade-right">
                        
                        <!-- Blog Post Card -->
                        <div class="job-description">
                            <h4>Jobs</h4>
                            

                            <p>Bookmark has 225 jobs. Our 225
                                jobs available include the following types of jobs: Permanent
                                (200) and Temporary (25).
                            </p>
                            <h4>Get new jobs for this search in your inbox!</h4>
                            <div class="d-flex gap-2">
                                <div class="form-group mb-2">
                                    <input type="email" class="form-control" placeholder="Your Email*" required>
                                    <span class="focus-border"></span>
                                </div>
                                
                            </div>
                            <label class="custom-radio square">
                                <input type="radio" name="teaching_license" value="no">
                                <span class="radio-checkmark"></span>
                                <span class="radio-label">I consent to the use of my information for the purpose of sending
                                    me job alerts. <span>*</span></span>
                            </label>


                            <button type="submit" class="find-submit-btn mt-3">
                                <i class="fa-regular fa-envelope-open"></i>
                                <span>Send Message</span>
                            </button>

                            
                            <div id="job-list-container"></div>
                        </div>

                        <!-- Pagination -->
                        <?php if($jobs->lastPage() > 1): ?>
                            <div class="pagination-wrap">
                                <ul class="pagination">
                
                                    <?php if($jobs->onFirstPage()): ?>
                                        <li><span><i class="fas fa-angle-left"></i></span></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo e($jobs->previousPageUrl()); ?>"><i class="fas fa-angle-left"></i></a>
                                        </li>
                                    <?php endif; ?>
                            
                                    <?php for($i = 1; $i <= $jobs->lastPage(); $i++): ?>
                                        <li>
                                            <a href="<?php echo e($jobs->url($i)); ?>"
                                                class="<?php echo e($jobs->currentPage() == $i ? 'active' : ''); ?>"><?php echo e($i); ?></a>
                                        </li>
                                    <?php endfor; ?> 
                                    <?php if($jobs->hasMorePages()): ?>
                                        <li><a href="<?php echo e($jobs->nextPageUrl()); ?>"><i class="fas fa-angle-right"></i></a>
                                        </li>
                                    <?php else: ?>
                                        <li><span><i class="fas fa-angle-right"></i></span></li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
        <script>
            AOS.init({
                duration: 2000,
                once: false
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const tabs = document.querySelectorAll('.tab');
                const contents = document.querySelectorAll('.tab-content');

                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        // Remove active classes
                        tabs.forEach(t => t.classList.remove('active'));

                        // Fade out all content
                        contents.forEach(content => {
                            content.style.opacity = '0';
                            content.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                content.classList.remove('active');
                            }, 300);
                        });

                        // Add active class to clicked tab
                        tab.classList.add('active');

                        // Fade in selected content
                        const targetContent = document.getElementById(tab.dataset.tab);
                        setTimeout(() => {
                            targetContent.classList.add('active');
                            setTimeout(() => {
                                targetContent.style.opacity = '1';
                                targetContent.style.transform = 'translateY(0)';
                            }, 50);
                        }, 300);
                    });
                });
            });
        </script>
        <script>
            // Add this at the beginning of your script
            document.addEventListener('DOMContentLoaded', function() {
                const loader = document.querySelector('.loader');

                // Hide loader after content loads
                window.addEventListener('load', function() {
                    setTimeout(() => {
                        gsap.to(loader, {
                            opacity: 0,
                            duration: 0.5,
                            onComplete: () => {
                                loader.style.display = 'none';
                            }
                        });
                    }, 2000); // Adjust time as needed
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                // Initial filter data
                let filters = {
                    search: '',
                    school_type: null,
                    location: null,
                    specialism: null,
                    position_type: null
                };

                // Load default jobs
                loadJobs();

                // Search input handler (if you have #search_job input)
                $('#searchForm').on('submit', function(e) {
                    e.preventDefault();
                    filters.search = $('#search_job').val().trim();
                    // $("#loader").show();
                    $("#loader").css("opacity", 1);
                    loadJobs();
                });
                // Filter link click handler
                $('.filter-tag').on('click', function(e) {
                    e.preventDefault();

                    const filterKey = $(this).data('filter');
                    const filterValue = $(this).data('id');

                    // Set the selected filter
                    filters[filterKey] = filterValue;

                    // Load jobs with filters
                    loadJobs();
                });

                // AJAX job loader
                function loadJobs() {
                    $.ajax({
                        url: '<?php echo e(route('jobs.list')); ?>',
                        type: 'GET',
                        data: filters,
                        success: function(response) {
                            $('#job-list-container').html(response.html);
                        },
                        error: function(xhr) {
                            console.error('Error loading jobs:', xhr);
                        }
                    });
                }
            });
        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jal/Herd/bookmark/resources/views/website/findjob.blade.php ENDPATH**/ ?>