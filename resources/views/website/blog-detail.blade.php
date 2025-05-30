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
                                <img src="{{ $blog->InnerImages->getUrl('preview') ?? '' }}" alt="Blog Detail">
                            </div>
                            <div class="blog-meta">
                                <span><i class="fas fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}</span>
                                <span><i class="fas fa-user"></i> {{ optional($blog)->author }}</span>
                                {{-- <span><i class="fas fa-comments"></i> 2 Comments</span> --}}
                            </div>
                            <h2>{{ optional($blog)->title }}</h2>
                            <div class="blog-content">
                                {!! optional($blog)->description !!}
                            </div>
                            <!-- Tags -->
                            <div class="blog-tags">
                                <h4>Tags:</h4>
                                <div class="tags-inner">
                                    @foreach ($tags as $key => $tag)
                                        <a>{{ optional($tag)->tag_title_en }}</a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="comment-form">
                                <h3>Leave a Comment</h3>

                                <form id="commentForm">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id ?? null }}">
                                    <div class="row gx-2">
                                        <div class="col-md-6">
                                            <div class="required_item">
                                                <input id="name" name="name" class="form-control" type="text"
                                                    placeholder="Name" required="required">
                                            </div>
                                            <span class="name_validation error"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="required_item">
                                                <input id="email" type="email" class="form-control" name="email"
                                                    placeholder="Email" required="required">
                                            </div>
                                            <span class="email_validation error"></span>
                                        </div>
                                        <div class="col-12">
                                            <div class="required_item">
                                                <textarea id="message" name="message" class="form-control" placeholder="Message" rows="4" required="required"></textarea>
                                            </div>
                                            <span class="message_validation error"></span>
                                        </div>

                                        <div class="main-button">
                                            <button type="submit" class="submit-btn" onclick="postComment(event)">
                                                <span class="button__spotlight"
                                                    style="transform: translate(-721.083px, -104.9px) scale(0);"></span>
                                                <span class="button__wrapper">
                                                    <span class="button__text" id="commentButton">
                                                        Post comment <img
                                                            src="{{ asset('web/assets/img/arrow-right.svg') }}"
                                                            alt="" class="button-arrow">
                                                    </span>
                                                </span>
                                            </button>
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
                            {{-- <form class="search-form">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form> --}}
                            @if ($categories->count() > 0)
                                <ul class="category-list">
                                    @foreach ($categories as $data)
                                        <li><a href="#">{{ $data->title_en }} <span>{{ $data->getBlogCount->count() }}
                                                </span></a></li>
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
                                        <h6><a
                                                href="{{ route('blog.details', $blogRecent->slug) }}">{{ optional($blogRecent)->title }}</a>
                                        </h6>
                                        <span class="date"><i class="far fa-calendar-alt"></i> April 24, 2025</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Tags Widget -->
                        <div class="sidebar-widget">
                            <h4>Popular Tags</h4>
                            @if ($tags->count() > 0)
                                <div class="tags-inner">
                                    @foreach ($tags as $key => $tag)
                                        <a>{{ optional($tag)->tag_title_en }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
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
            function postComment(e) {
                e.preventDefault();
                e.stopPropagation();
                $("#loader").show();

                $('#commentForm').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        message: {
                            required: true
                        }
                    },
                    messages: {
                        name: {
                            required: "Name is required",
                        },
                        email: {
                            required: "Email Address is required",
                        },
                        message: {
                            required: "Message is required"
                        }
                    },
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        error.insertAfter($(element).closest('.required_item'));
                    }
                });
                if ($('#commentForm').valid()) {
                    $(".error").html('');
                    $("#commentButton").text("Posting...");

                    var formData = new FormData($("#commentForm")[0]);

                    $.ajax({
                        url: "{{ route('leaveAComment') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            $(".error").html("");
                            $("#loader").hide();
                            $("#commentButton").text("Post Comment");

                            if (response.success === true) {
                                $("#commentForm")[0].reset();
                                alertify.set('notifier', 'position', 'top-center');
                                alertify.set('notifier', 'delay', 2);
                                alertify.success(response.message);
                            } else {
                                alertify.set('notifier', 'position', 'top-center');
                                alertify.set('notifier', 'delay', 2);
                                alertify.error(response.message);
                            }
                        },
                        error: function(xhr) {
                            $("#loader").hide();
                            $("#commentButton").text("Post Comment");

                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                const errors = xhr.responseJSON.errors;

                                if (errors.name) {
                                    $(".name_validation").html(errors.name[0]);
                                }
                                if (errors.email) {
                                    $(".email_validation").html(errors.email[0]);
                                }
                                if (errors.message) {
                                    $(".message_validation").html(errors.message[0]);
                                }
                            } else {
                                alertify.set('notifier', 'position', 'top-center');
                                alertify.set('notifier', 'delay', 2);
                                alertify.error("Something went wrong. Try again!");
                            }
                        }
                    });
                } else {
                    $("#loader").hide();

                }
            }
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
