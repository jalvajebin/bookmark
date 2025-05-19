

@extends('website.layout.app')

@section('content')


  <!-- banner  -->
  <div class="inner-banner" style="background-image: url({{ $banners->Images->url ?? asset('admin/images/no-image.png') }})"> 
    <div class="inner-banner-overlay"></div>
    <div class="inner-banner-cntnt " data-aos="fade-up">
      <div class="custom-container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ol>
        </nav>
        <h1>{{$banners->title ?? 'About' }}</h1>
        <p>{{$banners->description ?? "Description"}}</p>
      </div>
    </div>
  </div>
  <!-- banner  -->

  <!-- main-body -->
  <div class="main-body">
    <!-- Services list -->
    <section class="section-padding">
      <div class="row">
        @foreach ($services as $service )
          <div class="col-lg-6" data-aos="fade-right">
          <div class="service-card">
            <div class="service-card-img">
              <img src="{{ $service->Images->url ?? "assets/img/teacher-recuitment.png"}}" alt="Teaching Team">
            </div>
            <div class="card-content">
              <h3>{{ $service->title ?? 'Teacher Recruitment'}} </h3>
              <p> {{ $service->description ?? "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis provident totam rem deserunt,"}}</p>
              {{-- <div class="more-buttons">
                <a href="{{$service->link ?? "#" }}">{{ $service->read_more ?? "Read more"}} <span><i class="fa-solid fa-arrow-right"></i> </span></a>
              </div> --}}
            </div>
          </div>
        </div>
        @endforeach  
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
  