@extends('website.layout.app')
{{-- @section('title', isset($seo->meta_title) ? $seo->meta_title : 'Fit Solution')
@section('meta_keyword', isset($seo->meta_keyword) ? $seo->meta_keyword : 'Fit Solution')
@section('meta_description', isset($seo->meta_description) ? $seo->meta_description : 'Fit Solution') --}}
@section('content')
    <!-- banner  -->

    <div class="banner">
        <div class="banner-overlay"></div>
        <div class="banner-cntnt fade-left">
            <div>
                <h2>Find Your Dream <br>
                    Job Today!</h2>
                <P>Connecting Talent with Opportunity: Your Gateway to Career Success</P>
            </div>

            <form method="GET" action="{{ route('web.home') }}#resultSection">

                <div class="job-search-main">
                    <div class="search-div">
                        <input type="text" name="search" placeholder="Job Title" value="{{ request('search') }}">
                    </div>
                    <div class="dropdown-div">
                        {{-- Location Dropdown --}}
                        <div class="dropdown-container">
                            <button class="btn dropdown-toggle" type="button" id="locationDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span id="selectedLocation">{{ request('location') ?? 'Select Location' }}</span> <i
                                    class="bi bi-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($locations as $location)
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="selectDropdown('selectedLocation', 'locationInput', '{{ $location->title }}')">
                                            {{ $location->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <input type="hidden" name="location" id="locationInput" value="{{ request('location') }}">
                        </div>
                        {{-- Category Dropdown --}}
                        <div class="dropdown-container">
                            <button class="btn dropdown-toggle" type="button" id="categoryDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span id="selectedCategory">{{ request('category') ?? 'Select Category' }}</span> <i
                                    class="bi bi-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="selectDropdown('selectedCategory', 'categoryInput', '{{ $category->title }}')">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <input type="hidden" name="category" id="categoryInput" value="{{ request('category') }}">
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

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="service-box">
                        <div class="service-img-box">
                            <img src="assets/img/teacher.png" alt="">
                        </div>
                        <h5>permanent teacher placement</h5>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-box">
                        <div class="service-img-box">
                            <img src="assets/img/staffing.png" alt="">
                        </div>
                        <h5>substitute & temporary staffing</h5>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-box">
                        <div class="service-img-box">
                            <img src="assets/img/experts.png" alt="">
                        </div>
                        <h5>Specialzed Subject
                            Experts</h5>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-box">
                        <div class="service-img-box">
                            <img src="assets/img/training.png" alt="">
                        </div>
                        <h5>professional development
                            & training</h5>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- service -->

        <!-- why work with us -->
        <section class="section-padding">

            <div class="row gx-5">
                <div class="col-lg-6 fade-left">
                    <div class="why-img-main">
                        <img src="assets/img/why-work.png" alt="" class="why-main-img">
                        <div class="job-vacancy-div">
                            <img src="assets/img/briefcase.png" alt="">
                            <h6>10.5K</h6>
                            <h6>Job Vacancy</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 fade-right">
                    <div class="section-title">
                        <h2>Why Work <span>With Us?</span></h2>
                    </div>
                    <p class="main-para">Bookmark recruitment is a leading teacher recruitment agency based in Canada
                        and different regions of the Middle East. At Bookmark, we specialize in building
                        strong partnerships with schools to connect them with exceptional educators.
                        Our missions is to support educational institutions by providing qualified,
                        passionate teachers who align with their values and academic goals. Whether
                        you’re looking for long-term staff or temporary placements, we are committed to
                        helping you build a thriving learning environment. We offer the best teacher talent
                        sourcing for international schools and educational institutes across Canada and
                        the Middle East. Bookmark recruitments support clients to find educational
                        professionals from within the Middle East and overseas locations.  </p>


                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="why-points">
                                <div class="why-icons">
                                    <img src="assets/img/why-offices.png" alt="">
                                </div>
                                <div class="why-contents">
                                    <h3>{{ $counters->count1 ?? '8' }}</h3>
                                    <h6>Offices
                                        Worldwide</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="why-points">
                                <div class="why-icons">
                                    <img src="assets/img/why-consultant.png" alt="">
                                </div>
                                <div class="why-contents">
                                    <h3>{{ $counters->count2 ?? '16' }}</h3>
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
                                    <h3>{{ $counters->count3 ?? '28' }}</h3>
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
                                    <h3>{{ $counters->count4 ?? '266' }} </h3>
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
                        <h2>Explore <span>What We Do</span></h2>
                    </div>
                    <p class="main-para">Bookmark recruitments guarantees to discover élite teaching talent for
                        reputable institute through a tailored and specialized recruitment process.
                        Our intention is to improve the reputation and eminence of educational
                        institutions by connecting you with great educators. We find experienced
                        teaching professionals with the right expertise levels and ambition to teach abroad. At Bookmark
                        Recruitments, we recognize that teachers view the world as their classroom. With that in mind,
                        we want to
                        take your teaching career to a whole new horizon. Our customized solutions help schools attract
                        top talent,
                        teachers expand their career aspirations and foster a culture of educational excellence. Guiding
                        international schools to success with skilful teacher recruitment & development.   </p>

                    <div class="explore-pt">
                        <div>
                            <h3>Easy to upload Your Best CV and Portofolio</h3>
                            <h6>You can upload your resume, CV, and portfolio directly to Job.</h6>
                        </div>

                        <div>
                            <h3>You Will Be Notified With All Updates</h3>
                            <h6>Get notified about new job vacancies. scheduled interview and job application.</h6>
                        </div>

                        <div>
                            <h3>Apply for your dream job from the best company</h3>
                            <h6>We will provide recommendations for your choice companies from all over the world.</h6>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 fade-right">
                    <img src="assets/img/what-we-do.png" alt="" class="explore-img">
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
                    <a href="{{ route('web.destination.index') }}">Show all <span><i class="fa-solid fa-arrow-right"></i></span></a>
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
        <section id="resultSection" class="section-padding">
            <div class="custom-container">
                <div class="d-flex justify-content-between">
                    <div class="section-title">
                        <h2>Latest <span>job openings</span></h2>
                    </div>

                    <div class="more-buttons">
                        <a href="{{ route('web.find-job.index') }}">
                            Show all jobs <span><i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>

                <div class="row">
                    @forelse($latestJobs as $job)
                        <div class="col-lg-3 col-md-6">
                            <div class="job-card">
                                <div class="job-header">
                                    <img src="{{ $job->Images->url ?? asset('assets/img/nomad.png') }}"
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
                    @empty
                        <div class="col-12 text-center py-5">
                            <h4>No job found</h4>
                            <p>Please try adjusting your search filters.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- latest job opening -->
    </div>

    <!-- Excellence -->
    <section class="section-padding">
        <div class="exllence-main">
            <div class="ab-rectangle"></div>
            <div class="ab-circle"></div>
            <div class="fade-up">
                <h3><span>Partnered With</span> Excellence</h3>
                <p>we team up with top international schools to connect great talent with the right opportunities.</p>
                <a href="contact.html">
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
                                <h3>Easy To Upload Your Best CV And Portfolio</h3>
                                <h6>You can upload your resume, CV, and portfolio directly to Job.</h6>
                            </div>

                            <div>
                                <h3>You Will Be Notified With All Updates</h3>
                                <h6>Get notified about new job vacancies. scheduled interview and job application.</h6>
                            </div>

                            <div>
                                <h3>Apply for your dream job from the best company</h3>
                                <h6>We will provide recommendations for your choice companies from all over the world.
                                </h6>
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
                                        as Ui / UX Designer at CODE.ID</p>
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
                                <h2><span>Discover</span> innovative learning methods.</h2>
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
                        <div class="stats-number">250,998</div>
                        <div class="stats-text">people are getting hired with us</div>
                    </div>
                    {{-- <a href="about.html" class="read-more">
                        <span>READ MORE</span>
                        <span class="arrow">→</span>
                    </a> --}}
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
                    <div class="item">
                        <div class="team-div">
                            <div class="team-img">
                                <img src="assets/img/team-1.png" alt="">
                                <img src="assets/img/blue-done.png" alt="" class="team-done">
                            </div>
                            <h6>Jane Smith</h6>
                            <p>Lorem ipsum dolor sit amet consectetur. </p>
                            <div class="team-social-media d-flex gap-2 align-items-center justify-content-center">
                                <i class="fab fa-facebook-f"></i>
                                <i class="fa-brands fa-x-twitter"></i>
                                <i class="fa-brands fa-linkedin-in"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-div">
                            <div class="team-img">
                                <img src="assets/img/team-4.png" alt="">
                                <img src="assets/img/blue-done.png" alt="" class="team-done">
                            </div>
                            <h6>Jane Smith</h6>
                            <p>Lorem ipsum dolor sit amet consectetur. </p>
                            <div class="team-social-media d-flex gap-2 align-items-center justify-content-center">
                                <i class="fab fa-facebook-f"></i>
                                <i class="fa-brands fa-x-twitter"></i>
                                <i class="fa-brands fa-linkedin-in"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-div">
                            <div class="team-img">
                                <img src="assets/img/team-2.png" alt="">
                                <img src="assets/img/blue-done.png" alt="" class="team-done">
                            </div>
                            <h6>Jane Smith</h6>
                            <p>Lorem ipsum dolor sit amet consectetur. </p>
                            <div class="team-social-media d-flex gap-2 align-items-center justify-content-center">
                                <i class="fab fa-facebook-f"></i>
                                <i class="fa-brands fa-x-twitter"></i>
                                <i class="fa-brands fa-linkedin-in"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="team-div">
                            <div class="team-img">
                                <img src="assets/img/team-3.png" alt="">
                                <img src="assets/img/blue-done.png" alt="" class="team-done">
                            </div>
                            <h6>Jane Smith</h6>
                            <p>Lorem ipsum dolor sit amet consectetur. </p>
                            <div class="team-social-media d-flex gap-2 align-items-center justify-content-center">
                                <i class="fab fa-facebook-f"></i>
                                <i class="fa-brands fa-x-twitter"></i>
                                <i class="fa-brands fa-linkedin-in"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- Meet Exprets -->

        <!-- Meet Exprets -->
        {{-- <section class="section-padding">
            <div class="custom-container">
                <div class="d-flex justify-content-between">
                    <div class="section-title">
                        <h2>News and Blog</h2>
                        <p>Metus faucibus sed turpis lectus feugiat tincidunt. Rhoncus sed tristique in dolor</p>
                    </div>
                    <div class="more-buttons">
                        <a href="">View all <span><i class="fa-solid fa-arrow-right"></i> </span></a>
                    </div>
                </div>


                <div class="blog-div fade-up">
                    <div class="blog-img">
                        <img src="assets/img/blog.png" alt="">
                    </div>
                    <div>
                        <div class="meta-info">
                            <span>4 Min</span>
                            <span class="dot"></span>
                            <span>August 19, 2022</span>
                        </div>

                        <h6>Revitalizing Workplace Morale: Innovative Tactics for Boosting Employee Engagement in 2024
                        </h6>
                        <div class="more-buttons">
                            <a href="">Read more <span><i class="fa-solid fa-arrow-right"></i> </span></a>
                        </div>
                    </div>


                </div>

            </div>
        </section> --}}
        <!-- Meet Exprets -->

        <section class="section-padding">
            <div class="custom-container">
                <div class="d-flex justify-content-between">
                    <div class="section-title">
                        <h2>News and Blog</h2>
                        <p>Metus faucibus sed turpis lectus feugiat tincidunt. Rhoncus sed tristique in dolor</p>
                    </div>
                    <div class="more-buttons">
                        <a href="{{ route('blogs') }}">View all <span><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                </div>

                @foreach ($blog as $blogs)
                    <div class="blog-div fade-up">
                        <div class="blog-img">
                            <img src="{{ $blogs->MainImages->url ?? asset('assets/img/blog.png') }}"
                                alt="{{ $blogs->alt }}">
                        </div>

                        <div>
                            <div class="meta-info">
                                <span>By {{ $blogs->author }}</span>
                                <span class="dot"></span>
                                <span>{{ \Carbon\Carbon::parse($blogs->date)->format('F d, Y') }}</span>
                            </div>

                            <h6>{!! $blogs->description !!}</h6>

                            <div class="more-buttons">
                                <a href="{{ $blogs->meta_title }}" target="_blank">
                                    Read More <span><i class="fa-solid fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

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
                        @foreach ($testimonials as $testimonial)
                            <div class="item">
                                <div class="testimonial-box">
                                    <div class="testimonial-img">
                                        <img src="{{ $testimonial->Images->url }}" alt="{{ $testimonial->alt }}">
                                    </div>

                                    <div class="testmonial-cntnt">
                                        <h6>{{ \Carbon\Carbon::parse($testimonial->date)->format('F j, Y') }}</h6>
                                        <h4>{{ $testimonial->heading }}</h4>
                                        <p>{{ $testimonial->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials -->
        <!-- Testimonials -->
        <section class="section-padding">

            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-6 fade-left">
                        <div class="register-bg">
                            <div>
                                <h3>Apply For A Job?</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus a dolor
                                    convallis efficitur.</p>
                                <a href="{{ route('web.applicants.submit-cv') }}"><button type="button" class="register-button">Register now <span><i
                                            class="fa-solid fa-arrow-right-long"></i></span></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 fade-right">
                        <div class="register-bg employer-bg">
                            <div>
                                <h3>Post A Vacancy?</h3>
                                <p>Cras in massa pellentesque, mollis ligula non, luctus dui. Morbi sed efficitur dolor.
                                    Pelque augue
                                    risus, aliqu.</p>
                                <a href="{{ route('web.applicants.submit-cv') }}"><button type="button" class="register-button">Register now <span><i
                                            class="fa-solid fa-arrow-right-long"></i></span></button></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    @endsection
    @push('js')
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
    @endpush
