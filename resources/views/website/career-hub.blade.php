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



    <section class="career-section section-padding pb-0">
      <div class="custom-container">
          <div class="col-lg-12 order order-md-1">

            <div class="row gx-5">
              <div class="col-md-6 col-lg-6 fade-left">
                <div class="career-card">
                  <img src="assets/img/career01.jpg" alt="People working">
                  <div class="content">
                    <div class="left-career-card">
                      <div class="title">UX review presentations</div>
                      <div class="career-card-description">
                        How do you create compelling presentations that wow your colleagues and impress your managers?
                      </div>
                      <div class="career-tags">
                        <a href="#" class="first-tags">Design</a>
                        <a href="#" class="second-tags">Lifestyle</a>
                        <a href="#" class="third-tags">Location reports</a>
                      </div>
                    </div>
                    <div class="right-career-card">
                      <a href="career-hub-details.html" class="card-read-more"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-6 fade-right">
                <div class="career-card">
                  <img src="assets/img/career02.jpg" alt="People working">
                  <div class="content">
                    <div class="left-career-card">
                      <div class="title">UX review presentations</div>
                      <div class="career-card-description">
                        How do you create compelling presentations that wow your colleagues and impress your managers?
                      </div>
                      <div class="career-tags">
                        <a href="#" class="first-tags">Design</a>
                        <a href="#" class="second-tags">Lifestyle</a>
                        <a href="#" class="third-tags">Location reports</a>
                      </div>
                    </div>
                    <div class="right-career-card">
                      <a href="career-hub-details.html" class="card-read-more"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-6 fade-left">
                <div class="career-card">
                  <img src="assets/img/career03.jpg" alt="People working">
                  <div class="content">
                    <div class="left-career-card">
                      <div class="title">UX review presentations</div>
                      <div class="career-card-description">
                        How do you create compelling presentations that wow your colleagues and impress your managers?
                      </div>
                      <div class="career-tags">
                        <a href="#" class="first-tags">Design</a>
                        <a href="#" class="second-tags">Lifestyle</a>
                        <a href="#" class="third-tags">Location reports</a>
                      </div>
                    </div>
                    <div class="right-career-card">
                      <a href="career-hub-details.html" class="card-read-more"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-6 fade-right">
                <div class="career-card">
                  <img src="assets/img/career04.jpg" alt="People working">
                  <div class="content">
                    <div class="left-career-card">
                      <div class="title">UX review presentations</div>
                      <div class="career-card-description">
                        How do you create compelling presentations that wow your colleagues and impress your managers?
                      </div>
                      <div class="career-tags">
                        <a href="#" class="first-tags">Design</a>
                        <a href="#" class="second-tags">Lifestyle</a>
                        <a href="#" class="third-tags">Location reports</a>
                      </div>
                    </div>
                    <div class="right-career-card">
                      <a href="career-hub-details.html" class="card-read-more"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
          
        <!-- </div> -->
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus a dolor convallis efficitur.</p>
                    <button type="button" class="register-button">Register now <span><i
                          class="fa-solid fa-arrow-right-long"></i></span></button>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 fade-right">
                <div class="register-bg employer-bg">
                  <div>
                    <h3>Post A Vacancy?</h3>
                    <p>Cras in massa pellentesque, mollis ligula non, luctus dui. Morbi sed efficitur dolor. Pelque augue
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
