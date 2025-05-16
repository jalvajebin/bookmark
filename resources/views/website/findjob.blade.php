@extends('website.layout.app')
{{-- @section('title', isset($seo->meta_title) ? $seo->meta_title : 'Fit Solution')
@section('meta_keyword', isset($seo->meta_keyword) ? $seo->meta_keyword : 'Fit Solution')
@section('meta_description', isset($seo->meta_description) ? $seo->meta_description : 'Fit Solution') --}}
@section('content')
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
                            <form class="search-form">
                                <input type="text" placeholder="Enter Keywords">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                            <label class="custom-radio square">
                                <input type="radio" name="teaching_license" value="no">
                                <span class="radio-checkmark"></span>
                                <span class="radio-label">Search Job title Only</span>
                            </label>
                        </div>

                        <!-- Recent Posts Widget -->
                        <div class="sidebar-widget">
                            <h4>Rifine Your Search</h4>
                            <div>
                                <h6>School type</h6>
                                <div class="tags">
                                    <a href="#">Independent <span>(138)</span></a>
                                    <a href="#">Broadly International <span>(104)</span></a>
                                </div>
                            </div>

                            <div>
                                <h6>Region</h6>
                                <div class="tags">
                                    <a href="#">Dubai <span>(40)</span></a>
                                </div>
                            </div>

                            <div>
                                <h6>Country</h6>
                                <div class="tags">
                                    <a href="#">China <span>(4)</span></a>
                                    <a href="#">United Arab Emirates <span>(57)</span></a>
                                    <a href="#">Oman <span>(23)</span></a>
                                    <a href="#">Kuwait <span>(54)</span></a>
                                </div>
                            </div>

                            <div>
                                <h6>Specialism</h6>
                                <div class="tags">
                                    <a href="#">Secondary <span>(4)</span></a>
                                    <a href="#">Primary <span>(57)</span></a>
                                    <a href="#">Leadership & management <span>(23)</span></a>
                                    <a href="#">Early years <span>(54)</span></a>
                                </div>
                            </div>

                            <div>
                                <h6>Position type</h6>
                                <div class="tags">
                                    <a href="#">Private <span>(4)</span></a>
                                    <a href="#">Public <span>(57)</span></a>
                                </div>
                            </div>
                        </div>




                        <!-- Tags Widget -->

                    </div>

                    <div class="col-lg-8 order-2 order-md-2" data-aos="fade-right">
                        <!-- Blog Post Card -->
                        <div class="job-description">
                            <h4>Jobs</h4>
                            <p>Teachanywhere has 242 jobs. Our 242 jobs available include the following types of jobs:
                                Contract (241) and Permanent (1).</p>
                        </div>

                        <div class="job-description">
                            <h4>Get new jobs for this search in your inbox!</h4>
                            <div class="d-flex gap-2">
                                <div class="form-group mb-2">
                                    <input type="email" class="form-control" placeholder="Your Email*" required>
                                    <span class="focus-border"></span>
                                </div>

                                <div class="form-group mb-2">
                                    <select class="form-control" required="">
                                        <option value="" selected="" disabled="">Frequency</option>
                                        <option value="seeker">Daily</option>
                                        <option value="client">Weekly</option>
                                        <option value="client">Monthly</option>
                                    </select>
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

                            <div class="sorting mt-4 mb-4">
                                <div class="d-flex justify-content-between align-items-center flex-wrap">

                                    <div class="sorting-buttons">
                                        <span>Sort by:</span>
                                        <button class="sort-btn" data-sort="date">date</button>
                                        <button class="sort-btn" data-sort="location">location</button>
                                        <button class="sort-btn active" data-sort="title">title</button>
                                    </div>
                                </div>
                            </div>


                            <div class="sub-job-card p-4">
                                <!-- Header Section -->
                                <div class="sub-job-header d-flex justify-content-between align-items-start mb-3">
                                    <h3 class="sub-job-title m-0">
                                        <a href="#" class=" text-decoration-none">Primary (Year 3) Teacher</a>
                                    </h3>
                                    <span class="sub-job-date ms-3">02 May 2025</span>
                                </div>

                                <!-- Details Section -->
                                <div class="sub-job-details d-flex gap-4 mb-3">
                                    <div class="sub-job-location d-flex align-items-center">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <span>Kobe, 兵庫県</span>
                                    </div>
                                    <div class="sub-job-salary d-flex align-items-center">
                                        <i class="fas fa-pound-sign me-2"></i>
                                        <span>£1,700 - £2,600 per month</span>
                                    </div>
                                </div>

                                <!-- Description Section -->
                                <div class="sub-job-description mb-4">
                                    <p class="text-secondary mb-2">
                                        Primary (Year 3) Teacher, August 2025 Start Kobe, Japan Do you want to nurture the
                                        minds and hearts of young learners as they take their first steps in education? This
                                        is an excellent opportunity to join a welcoming international school in Kobe, Japan,
                                        and be part of a supportive and dynamic team!
                                    </p>
                                    <a href="#"
                                        class="read-more d-inline-flex align-items-center text-decoration-none">
                                        read more
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>

                                <!-- Actions Section -->
                                <div class="sub-job-actions d-flex justify-content-between align-items-center">
                                    <button class="sub-job-btn email-job d-inline-flex align-items-center">
                                        <i class="far fa-envelope me-2"></i>
                                        <span>Email this job</span>
                                    </button>
                                </div>
                            </div>

                            <div class="sub-job-card p-4">
                                <!-- Header Section -->
                                <div class="sub-job-header d-flex justify-content-between align-items-start mb-3">
                                    <h3 class="sub-job-title m-0">
                                        <a href="#" class=" text-decoration-none">Primary (Year 3) Teacher</a>
                                    </h3>
                                    <span class="sub-job-date ms-3">02 May 2025</span>
                                </div>

                                <!-- Details Section -->
                                <div class="sub-job-details d-flex gap-4 mb-3">
                                    <div class="sub-job-location d-flex align-items-center">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <span>Kobe, 兵庫県</span>
                                    </div>
                                    <div class="sub-job-salary d-flex align-items-center">
                                        <i class="fas fa-pound-sign me-2"></i>
                                        <span>£1,700 - £2,600 per month</span>
                                    </div>
                                </div>

                                <!-- Description Section -->
                                <div class="sub-job-description mb-4">
                                    <p class="text-secondary mb-2">
                                        Primary (Year 3) Teacher, August 2025 Start Kobe, Japan Do you want to nurture the
                                        minds and hearts of young learners as they take their first steps in education? This
                                        is an excellent opportunity to join a welcoming international school in Kobe, Japan,
                                        and be part of a supportive and dynamic team!
                                    </p>
                                    <a href="#"
                                        class="read-more d-inline-flex align-items-center text-decoration-none">
                                        read more
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>

                                <!-- Actions Section -->
                                <div class="sub-job-actions d-flex justify-content-between align-items-center">
                                    <button class="sub-job-btn email-job d-inline-flex align-items-center">
                                        <i class="far fa-envelope me-2"></i>
                                        <span>Email this job</span>
                                    </button>
                                </div>
                            </div>

                            <div class="sub-job-card p-4">
                                <!-- Header Section -->
                                <div class="sub-job-header d-flex justify-content-between align-items-start mb-3">
                                    <h3 class="sub-job-title m-0">
                                        <a href="#" class=" text-decoration-none">Primary (Year 3) Teacher</a>
                                    </h3>
                                    <span class="sub-job-date ms-3">02 May 2025</span>
                                </div>

                                <!-- Details Section -->
                                <div class="sub-job-details d-flex gap-4 mb-3">
                                    <div class="sub-job-location d-flex align-items-center">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <span>Kobe, 兵庫県</span>
                                    </div>
                                    <div class="sub-job-salary d-flex align-items-center">
                                        <i class="fas fa-pound-sign me-2"></i>
                                        <span>£1,700 - £2,600 per month</span>
                                    </div>
                                </div>

                                <!-- Description Section -->
                                <div class="sub-job-description mb-4">
                                    <p class="text-secondary mb-2">
                                        Primary (Year 3) Teacher, August 2025 Start Kobe, Japan Do you want to nurture the
                                        minds and hearts of young learners as they take their first steps in education? This
                                        is an excellent opportunity to join a welcoming international school in Kobe, Japan,
                                        and be part of a supportive and dynamic team!
                                    </p>
                                    <a href="#"
                                        class="read-more d-inline-flex align-items-center text-decoration-none">
                                        read more
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>

                                <!-- Actions Section -->
                                <div class="sub-job-actions d-flex justify-content-between align-items-center">
                                    <button class="sub-job-btn email-job d-inline-flex align-items-center">
                                        <i class="far fa-envelope me-2"></i>
                                        <span>Email this job</span>
                                    </button>
                                </div>
                            </div>



                        </div>


                        <!-- Pagination -->
                        <div class="pagination-wrap">
                            <ul class="pagination">
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fas fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@push('js')
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
@endpush
