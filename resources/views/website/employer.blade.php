
@extends('website.layout.app')

@section('content')


 <!-- banner  -->
 <div class="inner-banner applicant-banner">
    <div class="inner-banner-overlay"></div>
    <div class="inner-banner-cntnt">
      <div class="custom-container">
        <h1>Looking for the <br>
          Right candidate?</h1>
        <p>Bookmark skilled and dedicated teams work hard to add value and efficiency ensuring every candidate we
          recruit is the right match, and every service we provide is of the highest quality.</p>
        <div class="employer-banner-link">
          <a href="#" class="country-box">
            <h6>Submit a Vacancy</h6>
            <i class="fas fa-chevron-right"></i>
          </a>
          <a href="#" class="country-box">
            <h6>Leadership positions</h6>
            <i class="fas fa-chevron-right"></i>
          </a>
          <a href="#" class="country-box">
            <h6>Contact Us</h6>
            <i class="fas fa-chevron-right"></i>
          </a>
          <a href="#" class="country-box">
            <h6>Our Service</h6>
            <i class="fas fa-chevron-right"></i>
          </a>
          <a href="#" class="country-box">
            <h6>How to conduct virtual Interviews</h6>
            <i class="fas fa-chevron-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>



  <!-- banner  -->

  <!-- main-body -->
  <div class="main-body">



    <section class="section-padding"  data-aos="fade-up">
      <div class="section-title text-center">
        <h2><span>International teacher recruitment</span></h2>
      </div>
      <div class="expertise-loc-wrapper">
        <a href="">
          <div class="expertise-box">
            Leadership Positions <span><i class="fas fa-chevron-right"></i></span>
          </div>
        </a>
        <a href="">
          <div class="expertise-box">
            Submit a Vacency <span><i class="fas fa-chevron-right"></i></span>
          </div>
        </a>
        <a href="">
          <div class="expertise-box">
            Meet the team <span><i class="fas fa-chevron-right"></i></span>
          </div>
        </a>
        <a href="">
          <div class="expertise-box">
            Our Recruitment Proccess <span><i class="fas fa-chevron-right"></i></span>
          </div>
        </a>
      </div>
      <div class="custom-container">
        <div class="testimonial-main"  data-aos="fade-up">

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


    <section class="section-padding">
      <div class="exllence-main employer-cta">
        <div class="ab-rectangle"></div>
        <div class="ab-circle"></div>
        <div data-aos="fade-up">
          <h3><span>{{$contact->heading ?? "Contact our head office"}}</span></h3>
          <a href=""><h2>{{ $contact->phone ?? "+971 1245678"}}</h2></a>
          <p>{{$contact->description ?? "As an international recruitment agency, we work across time <br>
            zones and working days to suit the needs of clients and candidates."}}</p>
          <div class="d-flex justify-content-center gap-2">
            <button class="head-btn"> <span>Contact US</span>
            </button>
            <button class="head-btn emp-cta-button"> <span>Submit Your Vacancy</span>
            </button>
          </div>
        </div>
      </div>
    </section>

{{-- we recruite --}}
    <section class="section-padding">
      <div class="row">
        <div class="col-lg-6"  data-aos="fade-right">
          <div class="section-title">
            <h2>{{ $recruit->heading ?? "We recruit for"}}</h2>
          </div>
          <p class="main-para">
            {{  $recruit->description ?? " Bookmark recruitments guarantees to discover élite teaching talent for
            reputable institute through a tailored and specialized recruitment process.
            Our intention is to improve the reputation and eminence of educational
            institutions by connecting you with great educators." }}
           
          </p>
          <button class="head-btn"> <span>More Top Employers</span>
          </button>
        </div>
        <div class="col-lg-6"  data-aos="fade-left">
          <div class="client-wrapper">
            <div class="row g-1">
              <div class="col-lg-4 col-md-6 col-6">
                <div class="cl-logo-box">
                  <img src="assets/img/cl-1.png" alt="">
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-6">
                <div class="cl-logo-box">
                  <img src="assets/img/cl-2.png" alt="">
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-6">
                <div class="cl-logo-box">
                  <img src="assets/img/cl-3.png" alt="">
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-6">
                <div class="cl-logo-box">
                  <img src="assets/img/cl-4.png" alt="">
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-6">
                <div class="cl-logo-box">
                  <img src="assets/img/cl-5.png" alt="">
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-6">
                <div class="cl-logo-box">
                  <img src="assets/img/cl-1.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


{{-- 
    <section class="section-padding employer-stats-container">
      <div class="stats-container" data-aos="fade-up">
        <div class="stat-box">
          <img src="assets/img/why-offices.png" alt="">
          <div class="stat-number">8</div>
          <div class="stat-label">Offices Worldwide</div>
        </div>
  
        <div class="stat-box">
          <img src="assets/img/why-consultant.png" alt="">
          <div class="stat-number">16</div>
          <div class="stat-label">Consultants across the world</div>
        </div>
  
        <div class="stat-box">
          <img src="assets/img/why-country.png" alt="">
          <div class="stat-number">28</div>
          <div class="stat-label">Countries placed in 2024</div>
        </div>
  
        <div class="stat-box">
          <img src="assets/img/why-teacher.png" alt="">
          <div class="stat-number">266</div>
          <div class="stat-label">Teachers placed in 2024</div>
        </div>
      </div>
    </section> --}}

    {{-- conter data --}}
    <section class="section-padding employer-stats-container">
    <div class="stats-container" data-aos="fade-up">
      <div class="stat-box">
        <img src="{{ $counters->Count1Image->url ?? "assets/img/why-offices.png"}}" alt="">
        <div class="stat-number"> {{$counters->count1 ?? '8'}}</div>
        <div class="stat-label">{{ $counters->counter_1_name ?? 'Offices Worldwide'}}</div>
      </div>

      <div class="stat-box">
        <img src="{{ $counters->Count2Image->url ?? "assets/img/why-consultant.png"}}" alt="">
        <div class="stat-number">{{$counters->count2 ?? '16'}}</div>
        <div class="stat-label">{{ $counters->counter_2_name ?? 'Consultants across the world'}}</div>
      </div>

      <div class="stat-box">
        <img src="{{ $counters->Count3Image->url ?? "assets/img/why-country.png"}}" alt="">
        <div class="stat-number">{{ $counters->count3 ?? '28'}}</div>
        <div class="stat-label">{{$counters->counter_3_name ?? "Countries placed in 2024"}}</div>
      </div>

      <div class="stat-box">
        <img src=" {{ $counters->Count4Image->url ?? "assets/img/why-teacher.png"}}" alt="">
        <div class="stat-number">{{$counters->count4?? '266'}}</div>
        <div class="stat-label">{{$counters->counter_4_name ?? "Teachers placed in 2024"}}</div>
      </div>
    </div>
    </section>
     {{-- end conter data --}}





   
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
