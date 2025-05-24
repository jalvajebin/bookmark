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
                        <li class="breadcrumb-item active" aria-current="page">Post a vacancy</li>
                    </ol>
                </nav>
                <h1>We are ready to help</h1>
                <p>Your trusted partner in educational recruitment, connecting exceptional educators with outstanding
                    institutions.</p>
            </div>
        </div>
    </div>
    <!-- banner  -->
    <!-- main-body -->
    <div class="main-body">
        <!-- Services list -->
        <section class="contact-section section-padding">
            <div class="custom-container">
                <div class="contact-form">
                    <form id="contactForm">
                        <h6 class="mandatory-text">Fields marked with an * are mandatory fields</h6>
                        <div class="">
                            <div class="form-group cv-form">
                                <label for=""> Company Name <span>*</span></label>
                                <div class="w-100">
                                    <input type="text" class="form-control" name="company_name"
                                        placeholder="Company Name" required>
                                </div>
                                <span class="focus-border"></span>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for=""> School Name<span>*</span></label>
                                    <div class="w-100">
                                        <input type="text" class="form-control " name="school_name"
                                            placeholder="School Name" required>
                                    </div>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for=""> First Name <span>*</span></label>
                                    <div class="w-100">
                                        <input type="text" class="form-control " name="name" placeholder=" First Name"
                                            required>
                                    </div>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for=""> Job Title <span>*</span></label>
                                    <div class="w-100">
                                        <input type="text" class="form-control " name="job_title" placeholder="Job Title"
                                            required>
                                    </div>

                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">

                                    <label for="phone"> Website Address <span>*</span></label>
                                    <div class="w-100">
                                        <textarea type="tel" id="phone" name="address" placeholder=" Website Address " class="form-control " required></textarea>

                                    </div>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for=""> City <span>*</span></label>
                                    <div class="w-100">
                                        <input type="text" class="form-control " name="city" placeholder="City"
                                            required>
                                    </div>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone"> Country <span>*</span></label>
                                    <div class="w-100">
                                        <select class="form-control " name="country" required>
                                            <option value="" selected disabled>Please Select</option>
                                            @foreach ($destinations as $key => $destination)
                                                <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                            @endforeach
                                            <option value="other"> Other </option>
                                        </select>
                                    </div>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for="">What is your email address? <span>*</span></label>
                                    <div class="w-100">
                                        <input type="email" class="form-control " name="email" placeholder="Your Email*"
                                            required>
                                    </div>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">What is your phone number? <span>*</span></label>
                                    <div class="w-100">
                                        <input type="tel" name="phone" id="phone"
                                            placeholder="Please include international dialling code such as +971 123456789"
                                            class="form-control " required>
                                    </div>
                                    <span class="focus-border"></span>

                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="curriculum">Curriculum <span class="text-danger">*</span></label>
                                    <div class="w-100">
                                        <select class="form-control" name="curriculum" id="curriculum" required>
                                            <option value="" selected disabled>Please Select</option>
                                            @foreach ($destinations as $key => $destination)
                                                <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                            @endforeach
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">No of Vacancy<span>*</span></label>
                                    <div class="w-100">
                                        <input type="tel" name="vacancy" id="phone" placeholder="No of Vacancy"
                                            class="form-control " required>
                                    </div>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">Privacy Notice<span>*</span></label>
                                    <div class="w-100">
                                        <div class="radio-group">
                                            <label class="custom-radio square">
                                                <input type="radio" name="privacy_notice_accepted" value="1" required>
                                                <span class="radio-checkmark"></span>
                                                <span class="radio-label"> I accept the privacy notice</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" id="contactButton" class="submit-btn" onclick="postVacancy(event)">
                                <span>Send Message</span>
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                </div>

                </form>
            </div>
    </div>
    </section>
    <!-- Services list -->
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
        function postVacancy(e) {
            e.preventDefault();
            e.stopPropagation();
            $("#loader").show();

            $('#contactForm').validate({
                rules: {
                    school_name: {
                        required: true,
                        maxlength: 255
                    },
                    name: {
                        required: true,
                        maxlength: 255
                    },
                    job_title: {
                        required: true,
                        maxlength: 255
                    },
                    address: {
                        required: true
                    },
                    city: {
                        required: true,
                        maxlength: 255
                    },
                    country: {
                        required: true,
                        maxlength: 255
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        minlength: 8,
                        maxlength: 14
                    },
                    curriculum: {
                        required: true,
                        maxlength: 255
                    },
                    vacancy: {
                        required: true,
                        digits: true,
                        min: 1
                    },
                    privacy_notice_accepted: {
                        required: true
                    }
                },
                messages: {
                    school_name: {
                        required: "School Name is required",
                        maxlength: "Max 255 characters"
                    },
                    name: {
                        required: "Name is required",
                        maxlength: "Max 255 characters"
                    },
                    job_title: {
                        required: "Job Title is required",
                        maxlength: "Max 255 characters"
                    },
                    address: {
                        required: "Address is required"
                    },
                    city: {
                        required: "City is required",
                        maxlength: "Max 255 characters"
                    },
                    country: {
                        required: "Country is required",
                        maxlength: "Max 255 characters"
                    },
                    email: {
                        required: "Email address is required",
                        email: "Please enter a valid email"
                    },
                    phone: {
                        required: "Phone number is required",
                        minlength: "Minimum 8 digits",
                        maxlength: "Maximum 14 digits"
                    },
                    curriculum: {
                        required: "Curriculum selection is required",
                        maxlength: "Max 255 characters"
                    },
                    vacancy: {
                        required: "Number of vacancies is required",
                        digits: "Please enter a valid number",
                        min: "At least 1 vacancy required"
                    },
                    privacy_notice_accepted: {
                        required: "You must accept the privacy notice"
                    }
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    // Place the error message right after the input/select/radio group
                    if (element.attr("name") === "privacy_notice_accepted") {
                        error.insertAfter(element.closest('.radio-group'));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            if ($('#contactForm').valid()) {
                $(".error").html('');
                $("#contactButton").text("Posting...");

                var formData = new FormData($("#contactForm")[0]);

                $.ajax({
                    url: "{{ route('request.vacancy') }}", // Make sure this is your vacancy post route
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
                        $("#contactButton").text("Post contact");

                        if (response.success === true) {
                            $("#contactForm")[0].reset();
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
                        $("#contactButton").text("Post contact");

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;

                            // Clear previous errors
                            $(".error").html("");

                            // Display each validation error next to the field
                            $.each(errors, function(key, value) {
                                $("input[name='" + key + "'], select[name='" + key + "']").next('span')
                                    .html(value[0]);
                                // For privacy notice (radio), target differently:
                                if (key === 'privacy_notice_accepted') {
                                    $(".privacy_notice_accepted-validation").html(value[0]);
                                }
                            });
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
@endpush
