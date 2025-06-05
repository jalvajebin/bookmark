<?php $__env->startSection('content'); ?>
    <!-- banner  -->

    <div class="banner"
        style="background-image: url('<?php echo e($banner->images->preview ?? asset('admin/images/no-image.png')); ?>') !important ; ">
        <div class="banner-overlay"></div>
        <div class="banner-cntnt fade-left">
            <div>
                <h2><?php echo e(optional($banner)->title); ?></h2>
                <P><?php echo e(optional($banner)->description); ?></P>
            </div>

            <form method="GET" action="<?php echo e(route('web.find-job.index')); ?>">

                <div class="job-search-main">
                    <div class="search-div">
                        <input type="text" name="search" placeholder="Job Title" value="<?php echo e(request('search')); ?>">
                    </div>
                    <div class="dropdown-div">
                        
                        <div class="dropdown-container">
                            <button class="btn dropdown-toggle" type="button" id="locationDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span id="selectedLocation"><?php echo e(request('location') ?? 'Select Location'); ?></span> <i
                                    class="bi bi-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="selectDropdown('selectedLocation', 'locationInput', '<?php echo e($location->title); ?>')">
                                            <?php echo e($location->title); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <input type="hidden" name="location" id="locationInput" value="<?php echo e(request('location')); ?>">
                        </div>
                        
                        <div class="dropdown-container">
                            <button class="btn dropdown-toggle" type="button" id="categoryDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span id="selectedCategory"><?php echo e(request('category') ?? 'Select Category'); ?></span> <i
                                    class="bi bi-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="selectDropdown('selectedCategory', 'categoryInput', '<?php echo e($category->title); ?>')">
                                            <?php echo e($category->title); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <input type="hidden" name="category" id="categoryInput" value="<?php echo e(request('category')); ?>">
                        </div>

                        <button type="submit" class="search-button">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </form>

            <div class="banner-counter">
                <div class="counter-div">
                    <div class="d-flex align-items-start">
                        <div class="counter" data-target="16">16</div>
                    </div>
                    <h6>Live Jobs</h6>
                </div>

                <div class="counter-div">
                    <div class="d-flex align-items-start">
                        <div class="counter" data-target="10">10</div>
                    </div>
                    <h6>Companies</h6>
                </div>

                <div class="counter-div">
                    <div class="d-flex align-items-start">
                        <div class="counter" data-target="69">69</div>
                    </div>
                    <h6>Candidates</h6>
                </div>

                <div class="counter-div">
                    <div class="d-flex align-items-start">
                        <div class="counter" data-target="22">22</div>
                    </div>
                    <h6>New Jobs</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- banner  -->

    <!-- main-body -->
    <div class="main-body">

        <!-- service -->
        <section class="service-section section-padding">
            <div class="section-title">
                <h2>Services We <span>Provide</span></h2>
            </div>
            <div class="row g-3">
                <?php $__currentLoopData = $serviceWeProvides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceWeProvide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xxl-3 col-md-6">
                        <div class="service-box">
                            <div class="service-img-box">
                                <img src="<?php echo e($serviceWeProvide->Icon->preview ?? asset('assets/img/teacher.png')); ?>"
                                    alt="">
                            </div>
                            <h5><?php echo e($serviceWeProvide->title); ?></h5>
                            <p><?php echo optional($serviceWeProvide)->description; ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <!-- service -->
        <!-- why work with us -->
        <section class="section-padding">

            <div class="row gx-5">
                <div class="col-lg-6 fade-left">
                    <div class="why-img-main">
                        <img src="<?php echo e($why->Images['preview'] ?? asset('admin/images/no-image.png')); ?>" alt=""
                            class="why-main-img">
                        <div class="job-vacancy-div">
                            <img src="assets/img/briefcase.png" alt="">
                            <h6>10.5K</h6>
                            <h6>Job Vacancy</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 fade-right">
                    <div class="section-title">
                        <h2><?php echo e(optional($why)->title); ?></span></h2>
                    </div>
                    <p class="main-para"><?php echo e(optional($why)->description); ?></p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="why-points">
                                <div class="why-icons">
                                    <img src="assets/img/why-offices.png" alt="">
                                </div>
                                <div class="why-contents">
                                    <h3><?php echo e($counters->count1 ?? '8'); ?></h3>
                                    <h6><?php echo e($counters->count1_name ?? '8'); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="why-points">
                                <div class="why-icons">
                                    <img src="assets/img/why-consultant.png" alt="">
                                </div>
                                <div class="why-contents">
                                    <h3><?php echo e($counters->count2 ?? '16'); ?></h3>
                                    <h6>Consultants across the world</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="why-points">
                                <div class="why-icons">
                                    <img src="assets/img/why-country.png" alt="">
                                </div>
                                <div class="why-contents">
                                    <h3><?php echo e($counters->count3 ?? '28'); ?></h3>
                                    <h6>Countries placed in 2024</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="why-points">
                                <div class="why-icons">
                                    <img src="assets/img/why-teacher.png" alt="">
                                </div>
                                <div class="why-contents">
                                    <h3><?php echo e($counters->count4 ?? '266'); ?> </h3>
                                    <h6>Teachers placed in 2024</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- why work with us -->


        <!-- Explore -->
        <section class="section-padding">

            <div class="row">
                <div class="col-lg-6 fade-left">
                    <div class="section-title">
                        <h2><?php echo e(optional($whatWedo)->title); ?></span></h2>
                    </div>
                    <p class="main-para"><?php echo e(optional($whatWedo)->description); ?></p>

                    <div class="explore-pt">
                        <div>
                            <h3><?php echo e(optional($whatWedo)->title_one); ?></h3>
                            <h6><?php echo e(optional($whatWedo)->para_one); ?></h6>
                        </div>

                        <div>
                            <h3><?php echo e(optional($whatWedo)->title_two); ?></h3>
                            <h6><?php echo e(optional($whatWedo)->para_two); ?></h6>
                        </div>

                        <div>
                            <h3><?php echo e(optional($whatWedo)->title_three); ?></h3>
                            <h6><?php echo e(optional($whatWedo)->para_three); ?></h6>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 fade-right">
                    <img src="<?php echo e($whatWedo->WhatImages['preview'] ?? asset('admin/images/no-image.png')); ?>"
                        alt="" class="explore-img">
                </div>
            </div>

        </section>
        <!-- Explore -->
        <!-- top destination -->
        <section class="section-padding">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="section-title text-center">
                    <h2>Top Destinations</h2>
                </div>
                <div class="more-buttons">
                    <a href="<?php echo e(route('web.destination.index')); ?>">Show all <span><i
                                class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>

            <div class="gallery-container">
                <div class="row g-4">
                    <?php if($destinations->isNotEmpty()): ?>
                        <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-sm-6">
                                <a href="<?php echo e(route('destination.details', $destination->slug)); ?>">
                                    <div class="gallery-item item2">
                                        <img
                                            src="<?php if($destination->MainImages): ?> <?php echo e($destination->MainImages->getUrl('preview')); ?> <?php else: ?> <?php echo e(asset('admin/images/no-image.png')); ?> <?php endif; ?>">
                                        <div class="city-name">
                                            <h2><?php echo e($destination->name); ?></h2>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- top destination -->
        <!-- latest job opening -->
        <section id="resultSection" class="section-padding">
            <div class="custom-container">
                <div class="d-sm-flex justify-content-between">
                    <div class="section-title">
                        <h2>Latest <span>job openings</span></h2>
                    </div>

                    <div class="more-buttons">
                        <a href="<?php echo e(route('web.find-job.index')); ?>">
                            Show all jobs <span><i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $latestJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-lg-3 col-md-6">
                            <a href="<?php echo e(route('web.find-job.index')); ?>">
                                <div class="job-card">
                                    <div class="job-header">
                                        <img src="<?php echo e($job->MainImages->url ?? asset('assets/img/nomad.png')); ?>"
                                            alt="<?php echo e($job->alt); ?>" class="company-logo">
                                        <div class="job-info">
                                            <h3><?php echo e($job->title); ?></h3>
                                            <p><?php echo e($job->company_name); ?>&bull; <span
                                                    class="location"><?php echo e($job->locationModel->title); ?></span></p>
                                            <div class="job-tags">
                                                <span class="tag active"> <?php echo e($job->job_type); ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 text-center py-5">
                            <h4>No job found</h4>
                            <p>Please try adjusting your search filters.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- latest job opening -->
    </div>

    <!-- Excellence -->
    <section class="section-padding">
        <div class="exllence-main"
            style="background-image: url('<?php echo e($contactBanner->images->preview ?? asset('admin/images/no-image.png')); ?>') !important ; ">
            <div class="ab-rectangle"></div>
            <div class="ab-circle"></div>
            <div class="fade-up">
                <h3><span><?php echo e(optional($contactBanner)->title); ?></h3>
                <p><?php echo e(optional($contactBanner)->description); ?></p>
                <a href="<?php echo e(route('web.contact.index')); ?>">
                    <button class="head-btn"> <span>Contact US</span>
                    </button>
                </a>
            </div>
        </div>
    </section>
    <!-- Excellence -->
    <div class="main-body">
        <!-- partner with us -->
        <section class="section-padding section-no-bottom-padding">
            <div class="process-section">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-title">
                            <h2>How To Partner <span>With Us</span></h2>
                        </div>
                        <div class="globe-container">
                            <img src="assets/img/globe.png" alt="Globe" class="globe-img">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="process-steps">

                            <div class="step">
                                <div class="step-content">
                                    <div class="step-left">
                                        <img src="assets/img/consultation.png" alt="Consultation meeting"
                                            class="step-image fade-right">
                                    </div>
                                    <div class="timeline-cntnt step-right">
                                        <div class="step-icon primary-color">
                                            <span class="consultation-icon">
                                                <img src="assets/img/consultation-icon.png" alt="">
                                            </span>
                                        </div>
                                        <div class="time-line-text fade-left">
                                            <h2>Consultation</h2>
                                            <p>Tell us about your staffing needs and educational goals.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="step ">
                                <div class="step-content mobile-step-2">
                                    <div class="step-left">
                                        <div class="time-line-text fade-right">
                                            <h2>Candidate Matching</h2>
                                            <p>We present you with top-tier candidates suited to your School's
                                                requirements.</p>
                                        </div>
                                    </div>
                                    <div class="timeline-cntnt step-right">
                                        <div class="step-icon yellow-icon">
                                            <span class="matching-icon">
                                                <img src="assets/img/candidate matching-icon.png" alt="">
                                            </span>
                                        </div>
                                        <img src="assets/img/candidate matching.png" alt="Consultation meeting"
                                            class="step-image fade-left">
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-content">
                                    <div class="step-left">
                                        <img src="assets/img/hiring-support.png" alt="Hiring process"
                                            class="step-image fade-right">
                                    </div>
                                    <div class="timeline-cntnt step-right">
                                        <div class="step-icon blue-icon">
                                            <span class="hiring-icon">
                                                <img src="assets/img/hiring-support-icon.png" alt="">
                                            </span>
                                        </div>
                                        <div class="time-line-text fade-left">
                                            <h2>Hiring & Support</h2>
                                            <p>Finalize hiring with our seamless onboarding process and receive ongoing
                                                support as needed.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- partner with us -->

        <!-- dream job -->
        <section class="section-padding">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-6 fade-left">
                        <div class="section-title ">
                            <h2>Easy Step To Find and <br>
                                Apply Your Dream Job</h2>
                            <p>We will help you to find your dream job easily, let us <br>
                                help you manage everything you need</p>
                        </div>
                        <div class="explore-pt">
                            <div>
                                <h3><?php echo e(optional($whatWedo)->title_one); ?></h3>
                                <h6><?php echo e(optional($whatWedo)->para_one); ?></h6>
                            </div>

                            <div>
                                <h3><?php echo e(optional($whatWedo)->title_two); ?></h3>
                                <h6><?php echo e(optional($whatWedo)->para_two); ?></h6>
                            </div>

                            <div>
                                <h3><?php echo e(optional($whatWedo)->title_three); ?></h3>
                                <h6><?php echo e(optional($whatWedo)->para_three); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 fade-right">
                        <div class="dream-job">
                            <img src="assets/img/dream-job.png" alt="" class="dream-job-main">
                            <div class="dream-box dream-pos-top">
                                <img src="assets/img/upload.png" alt="">
                                <p>Upload your CV</p>
                            </div>

                            <div class="dream-box dream-pos-bottom">
                                <img src="assets/img/done.png" alt="">
                                <div>
                                    <p>You Are Hired</p>
                                    <p style="font-size: 10px;">Congrats you got the job <br>
                                        as English Teacher at Nibras International School.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- dream job -->


        <!-- Hire slider -->
        <section class="hire-slider-section">

            <div class="blue-box"></div>

            <div class="slider-container fade-up">
                <div class="hire-social-icons">
                    <div class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <div class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <div class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>

                <div class="slider">
                    <button class="nav-button prev-button">&#10094;</button>
                    <button class="nav-button next-button">&#10095;</button>

                    <div class="slides">
                        <div class="slide">
                            <img src="assets/img/hire-slider-img.png" class="slide-image">
                            <div class="slide-text">
                                <h2><span>Let's</span> build the future education together.</h2>
                            </div>
                            <div class="slide-number">01</div>
                        </div>

                        <div class="slide">
                            <img src="assets/img/hire-slider-img.png" class="slide-image">
                            <div class="slide-text">
                                <h2><span>Discover</span> innovative learning strategies.</h2>
                            </div>
                            <div class="slide-number">02</div>
                        </div>

                        <div class="slide">
                            <img src="assets/img/hire-slider-img.png" class="slide-image">
                            <div class="slide-text">
                                <h2><span>Create</span> your path to success.</h2>
                            </div>
                            <div class="slide-number">03</div>
                        </div>
                    </div>



                    <div class="indicator-dots">
                        <div class="dot" data-index="0"></div>
                        <div class="dot" data-index="1"></div>
                        <div class="dot" data-index="2"></div>
                    </div>
                </div>

                <div class="stats-bar">
                    <div class="stats-left">
                        <div class="stats-number">10,000</div>
                        <div class="stats-text">people are getting hired with us</div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Hire slider -->

    </div>

    <div class="main-body">

        <!-- Meet Exprets -->
        <section class="section-padding">

            <div class="custom-container">
                <div class="section-title text-center">
                    <h2><span>Meet Our</span> Experts</h2>
                </div>

                <div class="owl-carousel" id="partner-carousel">
                    <?php $__currentLoopData = $meetOurTeams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $meetOurTeam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="team-div">
                                <div class="team-img">
                                    <img src="<?php echo e(optional($meetOurTeam)->TeamImages->url); ?>" alt="">
                                    <img src="assets/img/blue-done.png" alt="" class="team-done">
                                </div>
                                <h6><?php echo e(optional($meetOurTeam)->name); ?></h6>
                                <p><?php echo e(optional($meetOurTeam)->description); ?> </p>
                                <div class="team-social-media d-flex gap-2 align-items-center justify-content-center">
                                    <?php if(optional($meetOurTeam)->facebook): ?>
                                        <a href="<?php echo e($meetOurTeam->facebook); ?>" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a>
                                    <?php endif; ?>

                                    <?php if(optional($meetOurTeam)->instagram): ?>
                                        <a href="<?php echo e($meetOurTeam->instagram); ?>" target="_blank"><i
                                                class="fab fa-instagram"></i></a>
                                    <?php endif; ?>

                                    <?php if(optional($meetOurTeam)->linkedin): ?>
                                        <a href="<?php echo e($meetOurTeam->linkedin); ?>" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </section>
        <!-- Meet Exprets -->

        <!-- Meet Exprets -->
        
        <!-- Meet Exprets -->
        <section class="section-padding pt-0">
            <div class="custom-container">
                <div class="d-sm-flex justify-content-between">
                    <div class="section-title">
                        <h2>News and Blog</h2>
                        <p>Explore the latest in
                            international teaching — tips, trends, and stories to guide
                            and inspire educators and schools alike.</p>
                    </div>
                    <div class="more-buttons">
                        <a href="<?php echo e(route('blogs')); ?>">View all <span><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                </div>

                <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('blog.details', $blogs->slug)); ?>" target="_blank" class="blog-link-wrapper">
                        <div class="blog-div fade-up">
                            <div class="blog-img">
                                <img src="<?php echo e($blogs->MainImages->url ?? asset('assets/img/blog.png')); ?>"
                                    alt="<?php echo e($blogs->alt); ?>">
                            </div>
                            <div>
                                <div class="meta-info">
                                    <span>By <?php echo e($blogs->author); ?></span>
                                    <span class="dot"></span>
                                    <span><?php echo e(\Carbon\Carbon::parse($blogs->date)->format('F d, Y')); ?></span>
                                </div>

                                <h6><?php echo $blogs->title; ?></h6>

                                <div class="more-buttons">
                                    Read More <span><i class="fa-solid fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <!-- Testimonials -->
        <section class="section-padding">

            <div class="custom-container">
                <div class="testimonial-main">

                    <div class="section-title text-center">
                        <h2>What Our Clients Say <span>About Us</span></h2>
                    </div>

                    <div class="owl-carousel" id="testimonial-carousel">
                        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <div class="testimonial-box">
                                    <div class="testimonial-img">
                                        <img src="<?php echo e($testimonial->Images->url); ?>" alt="<?php echo e($testimonial->alt); ?>">
                                    </div>

                                    <div class="testmonial-cntnt">
                                        <h6><?php echo e(\Carbon\Carbon::parse($testimonial->date)->format('F j, Y')); ?></h6>
                                        <h4><?php echo e($testimonial->heading); ?></h4>
                                        <p><?php echo e($testimonial->description); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials -->
        <!-- Testimonials -->
        <section class="section-padding pt-0">

            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-6 fade-left">
                        <div class="register-bg">
                            <div>
                                <h3>Apply For A Job?</h3>
                                <p>Find your perfect teaching role
                                    overseas with top schools and full support every step of the
                                    way.</p>
                                <a href="<?php echo e(route('web.applicants.submit-cv')); ?>"><button type="button"
                                        class="register-button">Register now <span><i
                                                class="fa-solid fa-arrow-right-long"></i></span></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 fade-right">
                        <div class="register-bg employer-bg">
                            <div>
                                <h3>Post A Vacancy?</h3>
                                <p>Reach qualified, experienced educators who are ready to
                                    join your school. Share your vacancy and let us help you find
                                    the perfect match.</p>
                                <a href="<?php echo e(route('web.applicants.post-vacancy')); ?>"><button type="button"
                                        class="register-button">Register now <span><i
                                                class="fa-solid fa-arrow-right-long"></i></span></button></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('js'); ?>
        <script>
            function selectDropdown(displayId, inputId, value) {
                document.getElementById(displayId).innerText = value;
                document.getElementById(inputId).value = value;
            }
        </script>
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                document.querySelector('input[name="search"]').value = '';
                document.getElementById('locationInput').value = '';
                document.getElementById('selectedLocation').textContent = 'Select Location';
                document.getElementById('categoryInput').value = '';
                document.getElementById('selectedCategory').textContent = 'Select Category';

                if (window.location.search) {
                    const newUrl = window.location.origin + window.location.pathname + '#resultSection';
                    window.history.replaceState({}, document.title, newUrl);
                }
            });
        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jal/Herd/bookmark/resources/views/website/home.blade.php ENDPATH**/ ?>