@extends('website.layout.app')
{{-- @section('title', isset($seo->meta_title) ? $seo->meta_title : 'Fit Solution')
@section('meta_keyword', isset($seo->meta_keyword) ? $seo->meta_keyword : 'Fit Solution')
@section('meta_description', isset($seo->meta_description) ? $seo->meta_description : 'Fit Solution') --}}
@section('content')
    <!-- banner  -->
    <div class="inner-banner applicant-banner">
        <div class="inner-banner-overlay"></div>
        <div class="inner-banner-cntnt">
            <div class="banner-countries" data-aos="fade-up">
                <div class="d-flex justify-content-center gap-2">
                    <div class="">
                        @foreach( $destinations as $key => $destination)
                        <a href="#" class="country-box">
                            <h6>{{ $destination->name }} <span>(54)</span></h6>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        @endforeach
{{-- 
                        <a href="#" class="country-box">
                            <h6>Kuwait <span>(44)</span></h6>
                            <i class="fas fa-chevron-right"></i>
                        </a>

                        <a href="#" class="country-box">
                            <h6>Qatar <span>(26)</span></h6>
                            <i class="fas fa-chevron-right"></i>
                        </a>

                        <a href="#" class="country-box">
                            <h6>Slovakia <span>(13)</span></h6>
                            <i class="fas fa-chevron-right"></i>
                        </a>

                        <a href="#" class="country-box">
                            <h6>Hong Kong Sar <span>(16)</span></h6>
                            <i class="fas fa-chevron-right"></i>
                        </a> --}}
                    </div>
                    <div class="">
                        <a href="#" class="country-box">
                            <h6>United Arab Emirates <span>(54)</span></h6>
                            <i class="fas fa-chevron-right"></i>
                        </a>

                        <a href="#" class="country-box">
                            <h6>Oman <span>(44)</span></h6>
                            <i class="fas fa-chevron-right"></i>
                        </a>

                        <a href="#" class="country-box">
                            <h6>Saudi arabia <span>(26)</span></h6>
                            <i class="fas fa-chevron-right"></i>
                        </a>

                        <a href="#" class="country-box">
                            <h6>Indonesia <span>(13)</span></h6>
                            <i class="fas fa-chevron-right"></i>
                        </a>

                        <a href="#" class="country-box">
                            <h6>More Countries <span>(16)</span></h6>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="more-buttons d-flex justify-content-center">
                <a href="{{ route('web.find-job.index') }}">Show all jobs <span><i class="fa-solid fa-arrow-right"></i></span></a>
            </div>


            {{-- <div class="job-search-main" data-aos="fade-up">
                <div class="search-div">
                    <input type="text" placeholder="Job Title or Company">
                </div>
                <div class="dropdown-div">
                    <div class="dropdown-container">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Location <i class="bi bi-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Canada</a></li>
                            <li><a class="dropdown-item" href="#">United States</a></li>
                            <li><a class="dropdown-item" href="#">United Kingdom</a></li>
                            <li><a class="dropdown-item" href="#">Australia</a></li>
                            <li><a class="dropdown-item" href="#">Remote</a></li>
                        </ul>
                    </div>

                    <div class="dropdown-container">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Category <i class="bi bi-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Teaching</a></li>
                            <li><a class="dropdown-item" href="#">Administration</a></li>
                            <li><a class="dropdown-item" href="#">IT &amp; Technology</a></li>
                            <li><a class="dropdown-item" href="#">Management</a></li>
                            <li><a class="dropdown-item" href="#">Support Staff</a></li>
                        </ul>
                    </div>

                    <button type="button" class="search-button">
                        <svg class="svg-inline--fa fa-magnifying-glass" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                            </path>
                        </svg><!-- <i class="fas fa-search"></i> Font Awesome fontawesome.com --> Search
                    </button>
                </div>
            </div> --}}
        </div>
    </div>



    <!-- banner  -->

    <!-- main-body -->
    <div class="main-body">


        <section class="section-padding">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="section-title">
                        <h2> {{ optional($weRecruitFor)->heading }}</h2>
                    </div>
                    <p class="main-para">
                        {{ optional($weRecruitFor)->description }}
                    </p>
                </div>
                <div class="col-lg-12 text-center" data-aos="fade-left">
                    <button class="head-btn"> <span>More Top Employers</span>
                    </button>
                    <div class="cl-logo-box-outr mt-4">
                        <div class="row g-1 justify-content-center">
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="cl-logo-box">
                                    <img src="assets/img/ncx.jpeg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="cl-logo-box">
                                    <img src="assets/img/logo2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="section-title text-center">
                <h2><span>Areas of expertise</span></h2>
            </div>
            <div class="expertise-loc-wrapper" data-aos="fade-up">
                <a href="">
                    <div class="expertise-box">
                        Far East & Asia Jobs <span><i class="fas fa-chevron-right"></i></span>
                    </div>
                </a>
                <a href="">
                    <div class="expertise-box">
                        Middle East & Africa jobs <span><i class="fas fa-chevron-right"></i></span>
                    </div>
                </a>
                <a href="">
                    <div class="expertise-box">
                        Leadership Jobs <span><i class="fas fa-chevron-right"></i></span>
                    </div>
                </a>
                <a href="">
                    <div class="expertise-box">
                        Teach In Australia <span><i class="fas fa-chevron-right"></i></span>
                    </div>
                </a>
            </div>

            <div class="row mb-3" data-aos="fade-up">
                <div class="col-lg-4">
                    <div class="expertise-cntnt exp-black">
                        <h2>Your nearest Bookmark office</h2>
                        <p>Wherever you are in the world,
                            find your nearest contact point</p>
                        <div class="more-buttons">
                            <a href="{{ route('web.find-job.index') }}">Show all jobs <span><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="expertise-cntnt help-box">
                        <h2>Need help today?</h2>
                        <p>Searching for your next teaching job abroad, one of our dedicated specialists is available to
                            support
                            your next teaching step.</p>
                        <div class="more-buttons">
                            <a href="{{ route('web.find-job.index') }}">Show all jobs <span><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="expertise-cntnt expertise-cntnt-img">
                        <img src="assets/img/exp-img.png" alt="">
                    </div>
                </div>
            </div>

            <div class="row gx-2" data-aos="fade-up">
                <div class="col-lg-10">
                    <div class="expertise-box-blue">
                        <div>
                            <h4>In Person Interviews for top schools In China and Hongkong</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div>
                            <h4>In Person Interviews for top schools In China and Hongkong</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div>
                            <h4>In Person Interviews for top schools In China and Hongkong</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="row gy-2">
                        <div class="col-lg-12 col-md-6 col-6">
                            <a href="{{ route('web.applicants.submit-cv') }}">
                                <div
                                    class="expertise-box-white d-flex align-items-center justify-content-center flex-md-column gap-1">
                                    <img src="assets/img/submit-cv.svg" alt="">
                                    <h6>Submit Your CV</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-12 col-md-6 col-6">
                            <a href="tel:{{ contactUs()->phone }}">
                                <div
                                    class="expertise-box-white d-flex align-items-center justify-content-center flex-md-column gap-1">
                                    <img src="assets/img/call.svg" alt="">
                                    <h6>Contact Us</h6>
                                    <span>{{ contactUs()->phone }}</span>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="exllence-main applicant-cta">
                <div class="ab-rectangle"></div>
                <div class="ab-circle"></div>
                <div data-aos="fade-up">
                    <h3><span>Got a friend looking for an international </span>Teaching job? <span>Refer them to us
                            today!</span>
                    </h3>
                    <button class="head-btn"> <span>Contact US</span>
                    </button>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="row g-5 d-flex align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="section-title">
                        <h2>Naadirah's Teaching <span>Odyssey: From <br> South Africa to the UAE</span></h2>
                    </div>
                    <p class="main-para">
                        Bookmark recruitment is a leading teacher recruitment agency based in Canada
                        and different regions of the Middle East. At Bookmark, we specialize in building
                        strong partnerships with schools to connect them with exceptional educators.
                        Our missions is to support educational institutions by providing qualified,
                        passionate teachers who align with their values and academic goals. Whether
                        you’re looking for long-term staff or temporary placements, we are committed to
                        helping you build a thriving learning environment. We offer the best teacher talent
                        sourcing for international schools and educational institutes across Canada and
                        the Middle East. Bookmark recruitments support clients to find educational
                        professionals from within the Middle East and overseas locations.
                    </p>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="video-image-wrapper">
                        <img src="assets/img/applicant-ab.png" alt="">
                        <div class="play-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- top destination -->
        <section class="section-padding">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="section-title text-center">
                    <h2>Top Destinations</h2>
                </div>
                <div class="more-buttons">
                    <a href="all-jobs.html">Show all jobs <span><i class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>

            <div class="gallery-container">
                <div class="row g-4">
                    @if ($destinations->isNotEmpty())
                        @foreach ($destinations as $destination)
                            <div class="col-lg-4">
                                <a href="{{ route('destination.details', $destination->slug) }}">
                                    <div class="gallery-item item2">
                                        <img
                                            src="@if ($destination->MainImages) {{ $destination->MainImages->getUrl('preview') }} @else {{ asset('admin/images/no-image.png') }} @endif">
                                        <div class="city-name">
                                            <h2>{{ $destination->name }}</h2>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!-- top destination -->

        <!-- latest job opening -->

        <section class="section-padding">
            <div class="custom-container">
                <div class="d-flex justify-content-between">
                    <div class="section-title">
                        <h2>Latest <span>job openings</span></h2>
                    </div>

                    <div class="more-buttons">
                        <a href="">Show all jobs <span><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($latestJobs as $job)
                        <div class="col-lg-3 col-md-6">
                            <div class="job-card">
                                <div class="job-header">
                                    <img src="{{ $job->Images->url ?? 'assets/img/nomad.png' }}  "
                                        alt="{{ $job->alt }}" class="company-logo">
                                    <div class="job-info">
                                        <h3>{{ $job->title }}</h3>
                                        <p>Company Name &bull; <span class="location">{{ $job->location }}</span></p>
                                        <div class="job-tags">
                                            <span class="tag active">Full-Time</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
