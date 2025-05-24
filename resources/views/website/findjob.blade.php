@extends('website.layout.app')
{{-- @section('title', isset($seo->meta_title) ? $seo->meta_title : 'Fit Solution')
@section('meta_keyword', isset($seo->meta_keyword) ? $seo->meta_keyword : 'Fit Solution')
@section('meta_description', isset($seo->meta_description) ? $seo->meta_description : 'Fit Solution') --}}
@section('content')
    <!-- banner  -->
    <div class="inner-banner">
        <div class="inner-banner-overlay"></div>
        <div class="inner-banner-cntnt">
            <div class="custom-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Find Job</li>
                    </ol>
                </nav>
                <h1>Find Job</h1>
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


                    <!-- Sidebar -->
                    <div class="col-lg-4 order-1 order-md-1" data-aos="fade-left">
                        <!-- Search Widget -->


                        <!-- Categories Widget -->
                        <div class="sidebar-widget">
                            <h4>Find job</h4>
                            <form action="{{ route('jobs.list') }}" id="searchForm" class="search-form">
                                <input type="text" id="search_job" name="search"
                                    value="{{ request()->query('search') }}" placeholder="Enter Keywords">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>

                        <!-- Recent Posts Widget -->
                        @php
                            $currentQuery = request()->query();
                        @endphp

                        <div class="sidebar-widget">
                            <h4>Refine Your Search</h4>

                            {{-- School Type --}}
                            {{-- <div>
                                <h6>School Type</h6>
                                <div class="tags">
                                    @foreach ($schoolTypes as $schoolType)
                                        <a href="#" class="filter-tag" data-filter="school_type"
                                            data-id="{{ $schoolType->id }}">
                                            {{ $schoolType->title }} <span>({{ $location->jobs->count() }})</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div> --}}

                            {{-- Location --}}
                            <div>
                                <h6>Location</h6>
                                <div class="tags">
                                    @foreach ($locations as $location)
                                        <a href="#" class="filter-tag" data-filter="location"
                                            data-id="{{ $location->id }}">
                                            {{ $location->title }} <span>({{ $location->jobs->count() }})</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Specialism --}}
                            <div>
                                <h6>Specialism</h6>
                                <div class="tags">
                                    @foreach ($specialisms as $specialism)
                                        <a href="#" class="filter-tag" data-filter="specialism"
                                            data-id="{{ $specialism->id }}">
                                            {{ $specialism->title }} <span>({{ $specialism->jobs->count() }})</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Position Type --}}
                            <div>
                                <h6>Position Type</h6>
                                <div class="tags">
                                    @foreach ($positionTypes as $positionType)
                                        <a href="#" class="filter-tag" data-filter="position_type"
                                            data-id="{{ $positionType->id }}">
                                            {{ $positionType->title }} <span>({{ $positionType->jobs->count() }})</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <!-- Tags Widget -->

                    </div>

                    <div class="col-lg-8 order-2 order-md-2" data-aos="fade-right">
                        {{-- @php
                            $titles = $jobs->pluck('title');
                            $displayed = $titles->take(2);
                            $totalCount = $titles->count();
                            $displayedCount = $displayed->count();
                        @endphp --}}
                        <!-- Blog Post Card -->
                        <div class="job-description">
                            <h4>Jobs</h4>
                            {{-- <p>Boomark has {{ $jobs->count() }} jobs. Our {{ $jobs->count() }} jobs available include the
                                following types of jobs:
                                {{ $displayed->join(', ') }}
                                {{ $totalCount > 2 ? ' and ' . ($totalCount - 2) . ' more' : '' }}</p>
                                  --}}

                            <p>Bookmark has 225 jobs. Our 225
                                jobs available include the following types of jobs: Permanent
                                (200) and Temporary (25).
                            </p>
                            <h4>Get new jobs for this search in your inbox!</h4>
                            <div class="d-flex gap-2">
                                <div class="form-group mb-2">
                                    <input type="email" class="form-control" placeholder="Your Email*" required>
                                    <span class="focus-border"></span>
                                </div>
                                {{-- <div class="form-group mb-2">
                                    <select class="form-control" required="">
                                        <option value="" selected="" disabled="">Frequency</option>
                                        <option value="seeker">Daily</option>
                                        <option value="client">Weekly</option>
                                        <option value="client">Monthly</option>
                                    </select>
                                    <span class="focus-border"></span>
                                </div> --}}
                            </div>
                            <label class="custom-radio square">
                                <input type="radio" name="teaching_license" value="no">
                                <span class="radio-checkmark"></span>
                                <span class="radio-label">I consent to the use of my information for the purpose of sending
                                    me job alerts. <span>*</span></span>
                            </label>


                            <button type="submit" class="find-submit-btn mt-3">
                                <i class="fa-regular fa-envelope-open"></i>
                                <span>Send Message</span>
                            </button>

                            {{-- <div class="sorting mt-4 mb-4">
                                <div class="d-flex justify-content-between align-items-center flex-wrap">

                                    <div class="sorting-buttons">
                                        <span>Sort by:</span>
                                        <button class="sort-btn" data-sort="date">date</button>
                                        <button class="sort-btn" data-sort="location">location</button>
                                        <button class="sort-btn active" data-sort="title">title</button>
                                    </div>
                                </div>
                            </div> --}}
                            <div id="job-list-container"></div>
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

        <script>
            $(document).ready(function() {
                // Initial filter data
                let filters = {
                    search: '',
                    school_type: null,
                    location: null,
                    specialism: null,
                    position_type: null
                };

                // Load default jobs
                loadJobs();

                // Search input handler (if you have #search_job input)
                $('#searchForm').on('submit', function(e) {
                    e.preventDefault();
                    filters.search = $('#search_job').val().trim();
                    // $("#loader").show();
                    $("#loader").css("opacity", 1);
                    loadJobs();
                });
                // Filter link click handler
                $('.filter-tag').on('click', function(e) {
                    e.preventDefault();

                    const filterKey = $(this).data('filter');
                    const filterValue = $(this).data('id');

                    // Set the selected filter
                    filters[filterKey] = filterValue;

                    // Load jobs with filters
                    loadJobs();
                });

                // AJAX job loader
                function loadJobs() {
                    $.ajax({
                        url: '{{ route('jobs.list') }}',
                        type: 'GET',
                        data: filters,
                        success: function(response) {
                            $('#job-list-container').html(response.html);
                        },
                        error: function(xhr) {
                            console.error('Error loading jobs:', xhr);
                        }
                    });
                }
            });
        </script>
    @endpush
