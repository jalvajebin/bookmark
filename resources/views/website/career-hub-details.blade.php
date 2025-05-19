@extends('website.layout.app')
{{-- @section('title', isset($seo->meta_title) ? $seo->meta_title : 'Fit Solution')
@section('meta_keyword', isset($seo->meta_keyword) ? $seo->meta_keyword : 'Fit Solution')
@section('meta_description', isset($seo->meta_description) ? $seo->meta_description : 'Fit Solution') --}}
@section('content')
    <!-- banner  -->
    <div class="inner-banner">
        <div class="inner-banner-overlay"></div>
        <div class="inner-banner-cntnt " data-aos="fade-up">
            <div class="custom-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Job seeker </li>
                        <li class="breadcrumb-item active" aria-current="page"> Career hub</li>
                    </ol>
                </nav>
                <h1>Find Your Dream Job Today!</h1>
                <p>Connecting Talent with Opportunity: Your Gateway to Career Success</p>
            </div>
        </div>
    </div>
    <!-- banner  -->

    <!-- main-body -->
    <div class="main-body">



        <section class="career-dtls-section section-padding pb-0">
            <div class="custom-container">
                <div class="col-lg-12 order order-md-1" data-aos="fade-right">

                    <div class="career-dtls">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="career-detail-img">
                                    <img src="{{ asset('assets/img/banner-img.png') }}" alt="People working">
                                </div>
                            </div>
                            {{-- <div class="col-lg-9">
                                <div class="content">
                                    <div class="career-dtls-head">
                                        <div class="career-dtls-head-item1">{{ $job->title }}</div>
                                        <div class="career-dtls-head-item2">Share : <a href="#">Facebook</a> / <a
                                                href="#">Instagram</a> / <a href="#">x</a> </div>
                                    </div>
                                    <div class="career-dtls-description">
                                        Is it time for change, new beginnings and taking a chance on an adventure?
                                        Are you looking for a chance to teach the world and of course, to live the dream?
                                        If you are at a crossroads and are looking for a change then why not move abroad to
                                        teach, travel and grow?  <br><br>
                                        We can help you with your leap abroad and make sure you find the right school,
                                        location and role for you. <br><br>s
                                        Most people don’t know their options or what is required for the schools and
                                        countries they are interested in teaching in. So, to help you out, here is what you
                                        need to know about visa restrictions, qualifications and what schools are looking
                                        for in your experience in order to gain an understanding of where you can go and
                                        what you can teach abroad!
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="career-dtls-cont">
                        <h2>Our top tips</h2>
                        <div class="career-dtls-tips">
                            <h5>Visa Restrictions</h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.
                                Non blandit massa enim nec. Scelerisque viverra mauris in aliquam sem. At risus viverra
                                adipiscing at in tellus. Sociis natoque penatibus et
                                magnis dis parturient montes. Ridiculus mus mauris vitae ultricies leo. Neque egestas congue
                                quisque egestas diam. Risus in hendrerit gravida
                                rutrum quisque non.
                            </p>
                        </div>
                        <div class="career-dtls-tips">
                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Non blandit massa enim nec.
                                Scelerisque viverra mauris in aliquam sem. At risus viverra adipiscing at in tellus. Sociis
                                natoque penatibus et magnis dis parturient montes.
                                Ridiculus mus mauris vitae ultricies leo. Neque egestas congue quisque egestas diam. Risus
                                in hendrerit gravida rutrum quisque non. <br><br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Non blandit massa enim nec.
                                Scelerisque viverra mauris in aliquam sem. At risus viverra adipiscing at in tellus. Sociis
                                natoque penatibus et magnis dis parturient montes.
                                Ridiculus mus mauris vitae ultricies leo. Neque egestas congue quisque egestas diam. Risus
                                in hendrerit gravida rutrum quisque non. <br><br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Non blandit massa enim nec.
                                Scelerisque viverra mauris in aliquam sem. At risus viverra adipiscing at in tellus. Sociis
                                natoque penatibus et magnis dis parturient montes.
                                Ridiculus mus mauris vitae ultricies leo. Neque egestas congue quisque egestas diam. Risus
                                in hendrerit gravida rutrum quisque non.
                            </p>
                        </div>
                        <div class="career-dtls-tips">
                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</h5>
                            <h6 class="mt-4">Acceptable Qualifications:</h6>

                            <div class="cd-details">Elementary/Primary Teachers</div>
                            <ul>
                                <li>1. Bachelors degree, major in Elementary / Primary Education (4 year degree) +
                                    Elementary Teaching license or QTS</li>
                                <li>2. Bachelors (BA/BS) Maths, English or Science + Elementary Teaching license</li>
                            </ul>

                            <div class="cd-details">Secondary/High School Teachers</div>
                            <ul>
                                <li>1. Bachelors degree, major in Secondary Education (4 year degree) + Teaching license in
                                    the same subject of study</li>
                                <li>2. Bachelors (BA/BS) in teaching subject combined with same subject teaching license
                                    (BA/BS Maths and Teaching license in Maths)</li>
                            </ul>
                            <p>
                                If your Bachelors degree doesn’t align with your teaching license you would not be able to
                                teach in the UAE or Kuwait.
                                There are always exceptions to the rule but this has been our experience with our partnered
                                schools. <br>
                                Luckily you can look at other locations such as: Oman, Qatar, Bahrain, China, South Korea
                                and  Southeast Asia as this same regulation does not apply in the main. <br>
                                Note: All our partnered schools require a valid teaching qualification or teaching license
                                within your home country to be considered. TEFL and TESOL alone would not suffice.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="career-hub-dts-img">
                        <img src="{{ asset('assets/img/career-dtls-bg.jpg') }}" alt="Teaching Team">
                    </div>
                </div>


            </div>
        </section>
        <!-- Testimonials -->
        <section class="section-padding">

            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-6 fade-left">
                        <div class="register-bg">
                            <div>
                                <h3>Apply For A Job?</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus a dolor convallis
                                    efficitur.</p>
                                <button type="button" class="register-button">Register now <span><i
                                            class="fa-solid fa-arrow-right-long"></i></span></button>
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
                                <button type="button" class="register-button">Register now <span><i
                                            class="fa-solid fa-arrow-right-long"></i></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- Testimonials -->
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
