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
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
                <h1>Blog</h1>
                <p>Your trusted partner in educational recruitment, connecting exceptional educators with outstanding
                    institutions.</p>
            </div>
        </div>
    </div>
    <!-- banner  -->
    <!-- main-body -->

    <div class="main-body">

        <section class="blog-section section-padding">
            <div class="custom-container">
                <div class="row">
                    <!-- Blog Posts Column -->
                    <div class="col-lg-8 order-2 order-md-1" data-aos="fade-right">
                        <!-- Blog Post Card -->
                        {{-- <div class="blog-card">
                  <div class="blog-dt-img">
                    <img src="assets/img/blog-main.png" alt="Blog Image">
                    <div class="date-tag">March 05, 2023</div>
                  </div>
                  <div class="blog-content">
                    <div class="blog-meta">
                      <span><i class="fas fa-user"></i> By Admin</span>
                      <span><i class="fas fa-folder"></i> Education</span>
                      <span><i class="fas fa-comments"></i> 2 Comments</span>
                    </div>
                    <h3><a href="blog-inner.html">International Teaching: Your Guide to Global Opportunities</a></h3>
                    <p>Discover how international teaching can transform your career and impact students worldwide. Learn
                      about requirements, benefits, and top destinations...</p>
                    <a href="blog-inner.html" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div> --}}

                        <div class="row gx-5">
                            @foreach ($blogs as $blog)
                                <div class="col-lg-6">
                                    <div class="blog-card-2">
                                        <div class="date-tag">
                                            {{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}
                                        </div>

                                        <img src="@if ($blog->MainImages) {{ $blog->MainImages->getUrl('preview') }} @else {{ asset('assets/img/blog.png') }} @endif""
                                            alt="{{ $blog->title }}">

                                        <div class="content">
                                            <div class="author">
                                                By <a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->author ?? 'Admin' }}</a>
                                            </div>

                                            <div class="title">
                                                {{ $blog->title }}
                                            </div>

                                            <div class="blog-card-description">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 100) }}
                                            </div>

                                            <a href="{{ route('blog.details', $blog->slug) }}" class="read-more">Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Pagination -->
                        <div class="pagination-wrap">
                            <ul class="pagination">
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fas fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar -->
                    <div class="col-lg-4 order-1 order-md-2" data-aos="fade-left">
                        <!-- Search Widget -->
                        <!-- Categories Widget -->
                        <div class="sidebar-widget">
                            <h4>Categories</h4>
                            <form class="search-form">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                            <ul class="category-list">
                                <li><a href="#">Teaching Abroad <span>(15)</span></a></li>
                                <li><a href="#">Career Development <span>(23)</span></a></li>
                                <li><a href="#">Education News <span>(18)</span></a></li>
                                <li><a href="#">Teaching Tips <span>(32)</span></a></li>
                                <li><a href="#">Recruitment Guide <span>(14)</span></a></li>
                            </ul>
                        </div>
                        <!-- Recent Posts Widget -->
                        <div class="sidebar-widget">
                            <h4>Recent Posts</h4>
                            <div class="recent-post">
                                <div class="recent-post-thumb">
                                    <img src="assets/img/blog.png" alt="">
                                </div>
                                <div class="recent-post-content">
                                    <h6><a href="#">Best Practices for Teaching English Abroad</a></h6>
                                    <span class="date"><i class="far fa-calendar-alt"></i> April 24, 2025</span>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="recent-post-thumb">
                                    <img src="assets/img/blog2.png" alt="">
                                </div>
                                <div class="recent-post-content">
                                    <h6><a href="#">Best Practices for Teaching English Abroad</a></h6>
                                    <span class="date"><i class="far fa-calendar-alt"></i> April 24, 2025</span>
                                </div>
                            </div>

                        </div>
                        <!-- Tags Widget -->
                        <div class="sidebar-widget">
                            <h4>Popular Tags</h4>
                            <div class="tags">
                                <a href="#">Teaching</a>
                                <a href="#">Education</a>
                                <a href="#">Career</a>
                                <a href="#">Development</a>
                                <a href="#">Schools</a>
                                <a href="#">Learning</a>
                            </div>
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
