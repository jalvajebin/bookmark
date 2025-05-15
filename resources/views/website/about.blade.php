@extends('website.layout.app')

@section('content')

 <!-- banner  -->
 <div class="inner-banner">
    <div class="inner-banner-overlay"></div>
    <div class="inner-banner-cntnt " data-aos="fade-up">
      <div class="custom-container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ol>
        </nav>
        <h1>About</h1>
        <p>Your trusted partner in educational recruitment, connecting exceptional educators with outstanding
          institutions.</p>
      </div>
    </div>
  </div>
  <!-- banner  -->

  <!-- main-body -->
  <div class="main-body">

    <!-- inner about -->
    <section class="section-padding">
      <div class="custom-container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-6" data-aos="fade-right">
            <div class="inner-about-div">
              <img src="assets/img/about-img.png" alt="">

              <div class="support-box">
                <div class="icon-circle">
                  <i class="fa-solid fa-phone"></i>
                </div>
                <div class="support-text">
                  <span class="label">ONLINE SUPPORT</span>
                  <h4 class="number">+912 (556) 889</h4>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left">
            <div class="section-title about-title">
              <h2>About Us</h2>
              <p class="main-para">
                Bookmark recruitments guarantees to discover élite teaching talent for
                reputable institute through a tailored and specialized recruitment process.
                Our intention is to improve the reputation and eminence of educational
                institutions by connecting you with great educators. We find experienced
                teaching professionals with the right expertise levels and ambition to teach abroad. At Bookmark
                Recruitments, we recognize that teachers view the world as their classroom. With that in mind, we want
                to take your teaching career to a whole new horizon. Our customized solutions help schools attract top
                talent, teachers expand their career aspirations and foster a culture of educational excellence. Guiding
                international schools to success with skilful teacher recruitment & development. 
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- inner about -->

    <!-- Proffessions section -->
    <!-- <section class="hiring-section">
      <div class="hiring-card left" data-aos="fade-right">
        <div class="hiring-content">
          <h2>Professions Hiring</h2>
          <p>This dynamic hiring landscape presents a wealth of opportunities for professionals across</p>
          <a href="#" class="hiring-button">Professions</a>
        </div>
        <div class="hiring-image">
          <img src="assets/img/candidate-2.png">
        </div>
      </div>

      <div class="hiring-card right" data-aos="fade-left">
        <div class="hiring-content hiring-content-right">
          <h2>Industries Hiring</h2>
          <p>The current job market is dynamic, with numerous industries actively seeking new talent</p>
          <a href="#" class="hiring-button">Industries</a>
        </div>
        <div class="hiring-image">
          <img src="assets/img/employer-2.png">
        </div>
      </div>
    </section> -->
    <!-- Proffessions section -->

    <!-- learn about agency -->

    <section class="learn-about-agency">
      <div class="custom-container">
        <div class="row hero-content">
          <div class="col-lg-5" data-aos="fade-right">
            <div class="hero-text">
              <div class="agency-label">Learn About Agency</div>
              <h1 class="hero-heading">We're Reliable & Cost Efficient Recruitment Agency</h1>
              <a href="#" class="cta-button">DISCOVER MORE</a>
            </div>
          </div>
          <div class="col-lg-7" data-aos="fade-left">
            <div class="tab-container">
              <div class="tabs ab-tabs">
                <button class="tab ab-tab active" data-tab="tab1">For Employees</button>
                <button class="tab ab-tab" data-tab="tab2">For Employers</button>
              </div>

              <div class="tab-content ab-tab-cntnt active" id="tab1">
                <div class="d-flex flex-column flex-md-row align-items-start gap-5">
                  <div class="image-container">
                    <img src="assets/img/applicant-cta.png">                  </div>

                  <div>
                    <p class="description">
                      There are many simply free text available variations of passages of but the majority have in some.
                    </p>

                    <ul class="features">
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                        Support on hiring employeers
                      </li>
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                        Get Exceptional service for growth
                      </li>
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                        Outsourced consulting business
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="tab-content ab-tab-cntnt" id="tab2">
                <div class="d-flex flex-column flex-md-row align-items-start gap-5">
                  <div class="image-container">
                    <img src="assets/img/applicant-cta.png">
                  </div>

                  <div>
                    <p class="description">
                      There are many simply free text available variations of passages of but the majority have in some.
                    </p>

                    <ul class="features">
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                        Support on hiring employeers
                      </li>
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                        Get Exceptional service for growth
                      </li>
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                        Outsourced consulting business
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>



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
    <!-- learn about agency -->

    <!-- Counter section -->
    <section class="counter-section" data-aos="zoom-in">
      <div class="counter-box">
        <div class="counter ab-counter" data-target="16">0</div>
        <p><span class="ab-dot"></span>Live Jobs</p>
      </div>
      <div class="counter-box">
        <div class="counter ab-counter" data-target="10">0</div>
        <p><span class="ab-dot"></span>Companies</p>
      </div>
      <div class="counter-box">
        <div class="counter ab-counter" data-target="69">0</div>
        <p><span class="ab-dot"></span>Candidates</p>
      </div>
      <div class="counter-box">
        <div class="counter ab-counter" data-target="22">0</div>
        <p><span class="ab-dot"></span>New Jobs</p>
      </div>
    </section>
    <!-- Counter section -->

    <!-- Testimonials -->
    <section class="section-padding" data-aos="fade-up">

      <div class="custom-container">
        <div class="testimonial-main">

          <div class="section-title text-center">
            <h2>What Our Clients Say <span>About Us</span></h2>
          </div>

          <div class="owl-carousel" id="testimonial-carousel">
            <div class="item">
              <div class="testimonial-box">
                <div class="testimonial-img">
                  <img src="assets/img/testimonial-1.png" alt="">
                </div>

                <div class="testmonial-cntnt">
                  <h6>May 8, 2020</h6>
                  <h4>Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cursus nibh mauris, nec turpis orci lectus
                    maecenas. Suspendisse sed magna eget nibh in turpis. Consequat duis diam lacus arcu. Faucibus
                    venenatis felis id augue sit cursus pellentesque enim arcu. Elementum felis magna pretium in
                    tincidunt.</p>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="testimonial-box">
                <div class="testimonial-img">
                  <img src="assets/img/testimonial-2.png" alt="">
                </div>

                <div class="testmonial-cntnt">
                  <h6>May 8, 2020</h6>
                  <h4>Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cursus nibh mauris, nec turpis orci lectus
                    maecenas. Suspendisse sed magna eget nibh in turpis. Consequat duis diam lacus arcu. Faucibus
                    venenatis felis id augue sit cursus pellentesque enim arcu. Elementum felis magna pretium in
                    tincidunt.</p>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="testimonial-box">
                <div class="testimonial-img">
                  <img src="assets/img/testimonial-1.png" alt="">
                </div>

                <div class="testmonial-cntnt">
                  <h6>May 8, 2020</h6>
                  <h4>Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cursus nibh mauris, nec turpis orci lectus
                    maecenas. Suspendisse sed magna eget nibh in turpis. Consequat duis diam lacus arcu. Faucibus
                    venenatis felis id augue sit cursus pellentesque enim arcu. Elementum felis magna pretium in
                    tincidunt.</p>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="testimonial-box">
                <div class="testimonial-img">
                  <img src="assets/img/testimonial-2.png" alt="">
                </div>

                <div class="testmonial-cntnt">
                  <h6>May 8, 2020</h6>
                  <h4>Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cursus nibh mauris, nec turpis orci lectus
                    maecenas. Suspendisse sed magna eget nibh in turpis. Consequat duis diam lacus arcu. Faucibus
                    venenatis felis id augue sit cursus pellentesque enim arcu. Elementum felis magna pretium in
                    tincidunt.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- Testimonials -->

    

   



@endsection