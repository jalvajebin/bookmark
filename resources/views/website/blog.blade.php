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
                    <div class="col-lg-8 order-2 order-md-1" data-aos="fade-right" id="blogs">
                        <!-- Blog Post Card -->
                        <div class="row gx-5">
                            @if ($blogs->count())
                                @foreach ($blogs as $blog)
                                    <div class="col-lg-6">
                                        <a href="{{ route('blog.details', $blog->slug) }}"
                                            class="text-decoration-none text-dark">
                                            <div class="blog-card-2">
                                                <div class="date-tag">
                                                    {{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}
                                                </div>

                                                <img src="@if ($blog->MainImages) {{ $blog->MainImages->getUrl('preview') }} @else {{ asset('assets/img/blog.png') }} @endif"
                                                    alt="{{ $blog->title }}">
                                                <div class="content">
                                                    <div class="author">
                                                        By {{ $blog->author ?? 'Admin' }}
                                                    </div>

                                                    <div class="title">
                                                        {{ $blog->title }}
                                                    </div>

                                                    <div class="blog-card-description">
                                                        {{ \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 100) }}
                                                    </div>

                                                    <span class="read-more">Read More</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <div class="alert alert-warning text-center mt-4">
                                        No blogs found.
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Pagination -->
                        <div class="pagination-wrap">
                            {{ $blogs->links() }}
                        </div>

                    </div>
                    <!-- Sidebar -->
                    <div class="col-lg-4 order-1 order-md-2" data-aos="fade-left">
                        <!-- Search Widget -->
                        <!-- Categories Widget -->
                        <div class="sidebar-widget">
                            <h4>Categories</h4>
                            <form id="searchForm" class="search-form">
                                <input type="text" class="form-control search-input" placeholder="Search..."
                                    name="search" id="searchValue"">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                            @if ($categories->count() > 0)
                                <ul class="category-list">
                                    @foreach ($categories as $data)
                                        <li><a href="#">{{ $data->title_en }}
                                                <span>{{ $data->getBlogCount->count() }} </span></a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- Recent Posts Widget -->
                        <div class="sidebar-widget">
                            <h4>Recent Posts</h4>
                            @foreach ($blogRecents as $key => $blogRecent)
                                <div class="recent-post">
                                    <div class="recent-post-thumb">
                                        <img src="{{ $blogRecent->InnerImages->getUrl('preview') ?? '' }}" alt="">
                                    </div>
                                    <div class="recent-post-content">
                                        {{-- <h6><a href="#">{{ optional($blogRecent)->title }}</a></h6> --}}
                                        <h6><a href="{{ route('blog.details', $blogRecent->slug) }}">{{ optional($blogRecent)->title }}</a></h6>
                                        <span class="date"><i class="far fa-calendar-alt"></i> April 24, 2025</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Tags Widget -->
                        <div class="sidebar-widget">
                            <h4>Popular Tags</h4>
                            @if ($tags->count() > 0)
                                <div class="tags">
                                    @foreach ($tags as $key => $tag)
                                        <a class="tagData" data-tag="{{ $tag->id }}">{{ optional($tag)->tag_title_en }}</a>
                                    @endforeach
                                </div>
                            @endif
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
        $(document).ready(function() {
            makeActive();
        });

        function makeActive() {
            $('.page-item .page-link').css({
                'background-color': '',
                'color': ''
            });
            $('.page-item.active .page-link').css({
                'background-color': '#8AF135',
                'color': 'white'
            });

            $('.zq_blog-widget-category li:first-child a').addClass('active');

            $('.zq_blog-widget-category li a').click(function() {
                $('.zq_blog-widget-tag a').removeClass('active');
                $('.zq_blog-widget-category li a').removeClass('active');
                $(this).addClass('active');
            });

            $('.zq_blog-widget-tag a').click(function() {
                $('.zq_blog-widget-category li a').removeClass('active');
                $('.zq_blog-widget-tag a').removeClass('active');
                $(this).addClass('active');
            });
        }

        $(document).on('click', '#blogs .page-link', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var url = $(this).attr('href');
            fetchData('', url);
            // $('html, body').animate({
            //     scrollTop: $('.zq_inner_blog-area').offset().top
            // }, 400);
        })


        $(document).on('submit', '#searchForm', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const value = $("#searchValue").val();
            fetchData(value)
        });

        $("#searchValue").on('keyup input', debounce(function() {
            let txt = $(this).val();
            fetchData(txt);
        }, 500));

        function fetchData(value, url = "{{ route('blogs') }}") {
            $("#loader").show();
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    search: value
                },
                beforeSend: function() {
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(res) {
                    $('#blogs').html($(res).find('#blogs').html());
                    setTimeout(function() {
                        $(this).closest('.page-link').addClass('active');
                    }, 300)
                },
                error: function(result) {
                    $("#loader").hide();
                }

            })
        }

        function debounce(func, delay) {
            let timer;
            return function() {
                const context = this;
                const args = arguments;
                clearTimeout(timer);
                timer = setTimeout(() => func.apply(context, args), delay);
            };
        }

        $(document).on('click', '.categoryData', function(e) {
            e.preventDefault();
            let category_id = $(this).data("category");

            $("#loader").show();
            $.ajax({
                url: '{{ route('blogs') }}',
                method: 'GET',
                data: {
                    category: category_id
                },
                beforeSend: function() {
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(res) {
                    console.log(res);
                    $('#blogs').html($(res).find('#blogs').html());
                    $('html, body').animate({
                        scrollTop: $('.inner-about-section').offset().top
                    }, 300);
                    setTimeout(function() {}, 300)
                },
                error: function(result) {
                    $("#loader").hide();
                }

            })

        });

        $(document).on('click', '.tagData', function(e) {
            e.preventDefault();
            let tag_id = $(this).data("tag");

            $("#loader").show();
            $.ajax({
                url: '{{ route('blogs') }}',
                method: 'GET',
                data: {
                    tag: tag_id
                },
                beforeSend: function() {
                    $("#loader").show();
                },
                complete: function() {
                    $("#loader").hide();
                },
                success: function(res) {
                    $('#blogs').html($(res).find('#blogs').html());
                    $('html, body').animate({
                        scrollTop: $('.inner-about-section').offset().top
                    }, 300);
                    setTimeout(function() {}, 300)
                },
                error: function(result) {
                    $("#loader").hide();
                }

            })

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
