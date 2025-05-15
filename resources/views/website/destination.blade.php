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
                <h1>Abu Dhabi</h1>
                <p>Not just a millionaire’s playground, Abu Dhabi has something for everyone and is sympathetic to western
                    life, unlike some of the slightly more conservative
                    rulers in the region. Its rapid rise to being one of the leading employment hubs in the world makes it
                    an attractive proposition for those with a busy and
                    social lifestyle.</p>
            </div>
        </div>
    </div>
    <!-- banner  -->
    <!-- main-body -->
    <div class="main-body">
        <!-- top destination -->
        <section class="section-padding">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="section-title text-center">
                    <h2>Top Destinations</h2>
                </div>
                <!-- <div class="more-buttons">
                      <a href="all-jobs.html">Show all jobs <span><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div> -->
            </div>
            <div class="gallery-container">
                <div class="row g-4">
                  @php
                  $destinations = \App\Models\Destination::take(2)->get(); 
                  $destinationsTwo = \App\Models\Destination::skip(2)->take(3)->get(); 
                  @endphp
                  @if ($destinations->isNotEmpty())
                    @foreach ($destinations as $destination)
                        <div class="col-lg-6">
                            <a href="destination-details.html">
                                <div class="gallery-item item2">
                                    <img src="assets/img/g-saudi-arabia.png">
                                    <div class="city-name">
                                        <h2>{{ $destination->name }}</h2>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    @endif
                    @if ($destinationsTwo->isNotEmpty())
                    @foreach ($destinationsTwo as $destinationTwo)
                    <div class="col-lg-4">
                        <!-- Item 1: Kuwait -->
                        <a href="destination-details.html">
                            <div class="gallery-item item3">
                                <img src="assets/img/g-kuwait.jpg">
                                <div class="city-name">
                                    <h2>{{ $destinationTwo->name }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif
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
