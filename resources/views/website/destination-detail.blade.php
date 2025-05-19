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
                        <li class="breadcrumb-item active" aria-current="page">Destinations</li>
                    </ol>
                </nav>
                <h1>{{ optional($banner)->title }}</h1>
                <p>{{ optional($banner)->description }}</p>
            </div>
        </div>
    </div>
    <!-- banner  -->
    <!-- main-body -->
    <!-- main-body -->
    <div class="main-body">
        <!-- inner about -->
        <section class="section-padding pb-0">
            <div class="custom-container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="dest-detail-title">
                            <h2>{{ optional($destination)->name }}</h2>
                            <p class="main-para">
                                {!! optional($destination)->description !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 first-dest-detail-bg" data-aos="fade-right">
                        <div class="dest-detail-bg">
                            <img src="@if ($destination->InnerImages) {{ $destination->InnerImages->getUrl('preview') }} @else {{ asset('admin/images/no-image.png') }} @endif"
                                alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="section-padding">
            <div class="custom-container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 second-dest-detail-bg" data-aos="fade-right">
                        <div class="dest-detail-bg">
                            <img src="@if ($destination->Inner1Images) {{ $destination->Inner1Images->getUrl('preview') }} @else {{ asset('admin/images/no-image.png') }} @endif"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="dest-detail-title">
                            <h2>Travel Highlights</h2>
                            <p>
                                {!! optional($destination)->description_1 !!}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- inner about -->
        <section class="section-padding pt-0">
            <div class="custom-container">
                <div class="lookingtowork-in">
                    <div class="left-lookingtowork">
                        <h2>Looking to work in {{ optional($destination)->name }}?</h2>
                    </div>
                    <div class="right-Lookingtowork">
                        <a href="{{ route('web.applicants.submit-cv') }}"><button class="head-btn"> <span>Submit your CV today</span></button></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- service -->
        <section class="service-section section-padding py-0">
            <div class="custom-container">
                <div class="destination-title">
                    <h2>Latest jobs</h2>
                </div>
                <div class="row">
                    @foreach ($jobs as $job)
                        <div class="col-lg-6 col-md-6">
                            <div class="destination-box">
                                <h5>{{ $job->title }}</h5>
                                <div class="date">{{ \Carbon\Carbon::parse($job->posted_date)->format('d/m/Y') }}</div>
                                <div class="contract">{{ $job->location }} {{ $job->contract_type }} {{ $job->salary }}
                                </div>
                                <p>
                                    {{ Str::limit(strip_tags($job->description), 150) }}
                                    <a href="#">read more</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- service -->
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
                                <button type="button" class="register-button">Register now <span><i
                                            class="fa-solid fa-arrow-right-long"></i></span></button>
                            </div>
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
