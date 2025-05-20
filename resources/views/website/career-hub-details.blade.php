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
                        <li class="breadcrumb-item" aria-current="page">Applicants </li>
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
    <!-- main-body -->
    <div class="main-body">
        <section class="career-dtls-section section-padding pb-0">
            <div class="custom-container">
                <div class="col-lg-12 order order-md-1" data-aos="fade-right">

                    <div class="career-dtls">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="career-detail-img">
                                    <img src="@if ($career->InnerImages) {{ $career->InnerImages->getUrl('preview') }} @else {{ asset('admin/images/no-image.png') }} @endif" alt="People working">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="content">
                                    <div class="career-dtls-head">
                                        <div class="career-dtls-head-item1">{{ optional($career)->date }} </div>
                                        <div class="career-dtls-head-item2">Share : <a href="#">Facebook</a> / <a
                                                href="#">Instagram</a> / <a href="#">x</a> </div>
                                    </div>
                                    <div class="career-dtls-description">
                                        {!! optional($career)->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="career-dtls-cont">
                        <h2>Our top tips</h2>
                        <div class="career-dtls-tips">
                            {!! optional($career)->description_1 !!}
                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="career-hub-dts-img">
                        <img src="@if ($career->Inner1Images) {{ $career->Inner1Images->getUrl('preview') }} @else {{ asset('admin/images/no-image.png') }} @endif" alt="Teaching Team">
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



      
    </div>
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
