
@extends('website.layout.app')

@section('content')



 <!-- banner  -->
 <div class="inner-banner" style="background-image: url({{ $banner->images->url }})">
    <div class="inner-banner-overlay"></div>
    <div class="inner-banner-cntnt " data-aos="fade-up">
      <div class="custom-container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ol>
        </nav>
        <h1>{{$banner->title ?? 'About' }}</h1>
        <p>{{$banner->description ?? "Description"}}</p>
      </div>
    </div>
  </div>
  <!-- banner  -->
  <!-- main-body -->
  <div class="main-body">

    <section class="contact-section section-padding">
      <div class="custom-container">
          <div class="row">
              <div class="col-lg-5"  data-aos="fade-right">
                  <div class="contact-info">
                      <h2>{{ $contact->title ?? "Get in Touch"}}</h2>
                      <p> {{ $contact->description ?? "We're here to help! Fill out the form and we'll get back to you."}}</p>
                      
                      <div class="contact-details">
                          <div class="contact-item">
                              <div class="icon">
                                  <i class="fas fa-map-marker-alt"></i>
                              </div>
                              <div class="info">
                                  <h4>Our Location</h4>
                                  <p>{{ $contact->address ?? "SR No.98 lorem, ipsum<br>West Java, Canada"}}</p>
                              </div>
                          </div>
                          
                          <div class="contact-item">
                              <div class="icon">
                                  <i class="fas fa-phone"></i>
                              </div>
                              <div class="info">
                                  <h4>Call Us</h4>
                                  <p>{{ $contact->phone  ?? "+1 234 567 8900"}}</p>
                              </div>
                          </div>
                          
                          <div class="contact-item">
                              <div class="icon">
                                  <i class="fas fa-envelope"></i>
                              </div>
                              <div class="info">
                                  <h4>Email Us</h4>
                                  <p>{{ $contact->email ?? "hello@bookmark.com"}}</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="col-lg-7"  data-aos="fade-left">
                  <div class="contact-form">
                      <form id="contactForm">

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <select class="form-control" required>
                                  <option value="" selected disabled>Are you a job seeker or client</option>
                                  <option value="seeker">Job Seeker</option>
                                  <option value="client">Client</option>
                              </select>
                              <span class="focus-border"></span>
                          </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="First Name" required>
                              <span class="focus-border"></span>
                          </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Last Name" required>
                              <span class="focus-border"></span>
                          </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" name="country" required>
                                    <option value="" selected disabled>Select Country</option>
                                    <option value="CA">Canada</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="AU">Australia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="QA">Qatar</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="OM">Oman</option>
                                    <option value="SG">Singapore</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="JP">Japan</option>
                                    <option value="KR">South Korea</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="CN">China</option>
                                    <option value="IN">India</option>
                                    <option value="DE">Germany</option>
                                    <option value="FR">France</option>
                                    <option value="ES">Spain</option>
                                    <option value="IT">Italy</option>
                                    <option value="NL">Netherlands</option>
                                </select>
                                <span class="focus-border"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email*" required>
                            <span class="focus-border"></span>
                        </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" required>
                            <span class="focus-border"></span>
                        </div>
                        </div>

                        <div class="col-lg-12">
                          <div class="form-group">
                            <textarea class="form-control" placeholder="Your Message*" rows="5" required></textarea>
                            <span class="focus-border"></span>
                        </div>
                        </div>
                        </div>

                      
                          <button type="submit" class="submit-btn">
                              <span>Send Message</span>
                              <i class="fas fa-paper-plane"></i>
                          </button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>
    


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