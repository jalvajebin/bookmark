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
        <section class="blog-details-section section-padding">
            <div class="custom-container">
                <div class="row">
                    <!-- Blog Content -->
                    <div class="col-lg-8" data-aos="fade-right">
                        <div class="blog-detail-content">
                            <div class="blog-detail-image">
                                <img src="assets/img/blog-main.png" alt="Blog Detail">
                            </div>
                            <div class="blog-meta">
                                <span><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}</span>
                                <span><i class="fas fa-user"></i> {{ optional($blog)->author }}</span>
                                <span><i class="fas fa-comments"></i> 2 Comments</span>
                            </div>
                            <h2>{{ optional($blog)->title }}</h2>
                            <div class="blog-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elementum sem ligula. Phasellus eleifend vel justo sit amet volutpat. Duis vitae maximus ligula, nec mattis libero...</p>
                                <h3>Why Choose International Teaching?</h3>
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula...</p>
                                <blockquote>
                                    "Education is not preparation for life; education is life itself."
                                    <cite>- John Dewey</cite>
                                </blockquote>
                                <h3>Key Benefits</h3>
                                <ul>
                                    <li>Professional growth opportunities</li>
                                    <li>Cultural immersion experience</li>
                                    <li>Competitive salary packages</li>
                                    <li>Global networking possibilities</li>
                                </ul>
                            </div>
                            <!-- Tags -->
                            <div class="blog-tags">
                                <h4>Tags:</h4>
                                <div class="tags">
                                    <a href="#">Teaching</a>
                                    <a href="#">Education</a>
                                    <a href="#">Career</a>
                                    <a href="#">International</a>
                                </div>
                            </div>
                            <!-- Comments -->
                            <div class="comments-section">
                                <h3>2 Comments</h3>
                                <div class="comment">
                                    <div class="comment-avatar">
                                        <img src="assets/img/team-1.png" alt="User">
                                    </div>
                                    <div class="comment-content">
                                        <h5>John Doe</h5>
                                        <span class="date">March 24, 2025</span>
                                        <p>Great article! Very informative and well-written.</p>
                                        <a href="#" class="reply-btn">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Form -->
                            <div class="comment-form">
                                <h3>Leave a Comment</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" placeholder="Email" required>
                                        </div>
                                        <div class="col-12">
                                            <textarea placeholder="Your Comment" required></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="submit-btn">Post Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-left">
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
