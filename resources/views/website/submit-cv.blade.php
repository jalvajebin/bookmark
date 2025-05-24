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
                        <li class="breadcrumb-item active" aria-current="page">Submit your CV</li>
                    </ol>
                </nav>
                <h1>Bookmark Registration</h1>
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
                    <form id="contactForm" enctype="multipart/form-data">
                        <h6 class="mandatory-text">Fields marked with an * are mandatory fields</h6>

                        <div class="col-lg-12">
                            <div class="form-group cv-form required_item">
                                {{-- <div class=""> --}}
                                <label for="">What is your full name? <span>*</span></label>
                                <div class="w-100">
                                    <input name="name" type="text" class="form-control"
                                        placeholder="[First then your last name, please, e.g. Jane Doe]" required>
                                    <span class="name-validation error-validation" style="color:red;"></span>
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>

                        <div class="form-group cv-form required_item">
                            <label for="">What is your date of birth? <span>*</span></label>
                            <div class="w-100">
                                <input name="date" type="date" class="form-control" placeholder="dd/mm/yyyy" required>
                                <span class="date-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>


                        <div class="form-group cv-form required_item">
                            <label for="">What is your gender? <span>*</span></label>
                            <div class="w-100">
                                <select name="gender" class="form-control" required>
                                    <option value="" selected disabled>Please Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="Prefer not to say">Prefer not to say</option>
                                </select>
                                <span class="gender-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group cv-form required_item">
                            <label for="">What is your email address? <span>*</span></label>
                            <div class="w-100">
                                <input name="email" type="email" class="form-control" placeholder="Your Email*"
                                    required>
                                <span class="email-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group cv-form required_item">
                            <label for="phone">What is your phone number? <span>*</span></label>
                            <div class="w-100">
                                <input type="tel" id="phone" name="phone"
                                    placeholder="Please include international dialling code such as +971 123456789"
                                    class="form-control" required>
                                <span class="phone-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group cv-form required_item">
                            <label for="passport">Which of these passports do you hold? <span>*</span></label>
                            <div class="w-100">
                                <select name="passport" class="form-control" required>
                                    <option value="" selected disabled>Please Select</option>
                                    @foreach ($destinations as $key => $destination)
                                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                    @endforeach
                                    <option value="other"> Other </option>
                                </select>
                                <span class="passport-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group cv-form required_item">
                            <label for="birth_country">What country were you born in? <span>*</span></label>
                            <div class="w-100">
                                <select name="birth_country" class="form-control" required>
                                    <option value="" selected disabled>Please Select</option>
                                    @foreach ($destinations as $key => $destination)
                                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                    @endforeach
                                    <option value="other"> Other </option>
                                </select>
                                <span class="birth_country-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group cv-form required_item">
                            <label for="current_country">What is your current country of residence? <span>*</span></label>
                            <div class="w-100">
                                <input name="current_country" type="text" class="form-control" required>
                                <span class="current_country-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group cv-form">
                            <label>What destinations are you interested in teaching in?</label>
                            {{-- <div class="w-100"> --}}
                            <div class="radio-group">
                                @foreach ($destinations as $key => $destination)
                                    <label class="custom-radio square">
                                        <input type="radio" name="teaching_destination" value="{{ $destination->id }}">
                                        <span class="radio-checkmark"></span>
                                        <span class="radio-label">{{ $destination->name }}</span>
                                    </label>
                                @endforeach
                                <label class="custom-radio square">
                                    <input type="radio" name="teaching_destination" value="Other">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">Other</span>
                                </label>
                                {{-- </div> --}}
                                {{-- <span class="teaching_destination-validation error-validation" style="color:red;"></span> --}}
                            </div>
                        </div>
                        <div class="form-group cv-form required_item">
                            <label for="undergrad_subject">What was your major subject in your undergraduate degree?
                                <span>*</span></label>
                            <div class="w-100">
                                <textarea name="undergrad_subject" class="form-control" placeholder="Your Message*" rows="5" required></textarea>
                                <span class="undergrad_subject-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group cv-form required_item">
                            <label for="teaching_qualification_subject">What was your major subject in your teaching
                                qualification? <span>*</span></label>
                            <div class="w-100">
                                <textarea name="teaching_qualification_subject" class="form-control" placeholder="Your Message*" rows="5"
                                    required></textarea>
                                <span class="teaching_qualification_subject-validation error-validation"
                                    style="color:red;"></span>
                            </div>
                        </div>

                        <div class="form-group cv-form">
                            <label>Please can you confirm where you are licensed to teach?
                            </label>
                            <div class="radio-group">
                                @foreach ($destinations as $key => $destination)
                                    <label class="custom-radio square">
                                        <input type="radio" name="teaching_license" value="{{ $destination->id }}">
                                        <span class="radio-checkmark"></span>
                                        <span class="radio-label">{{ $destination->name }}</span>
                                    </label>
                                @endforeach
                                <label class="custom-radio square">
                                    <input type="radio" name="teaching_license" value="Other">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">Other</span>
                                </label>
                            </div>
                        </div>
                        <!-- ... previous form fields ... -->
                        <div class="form-group cv-form">
                            <label for="current_job_title">What is your current job title? <span>*</span></label>
                            <div class="w-100">
                                <input name="current_job_title" type="text" class="form-control" required>
                                <span class="current_job_title-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>

                        <div class="form-group cv-form">
                            <label for="seeking_role">What role are you seeking? <span>*</span></label>
                            <div class="w-100">
                                <input name="seeking_role" type="text" class="form-control" required>
                                <span class="seeking_role-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>

                        <div class="form-group cv-form">
                            <label>Do you have international teaching experience? </label>
                            <div class="radio-group">
                                <label class="custom-radio square">
                                    <input type="radio" name="international_experience" value="Yes">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">Yes</span>
                                </label>
                                <label class="custom-radio square">
                                    <input type="radio" name="international_experience" value="No">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">No</span>
                                </label>
                            </div>
                            {{-- Optional: remove this validation message span if not needed --}}
                            {{-- <span class="international_experience-validation error-validation" style="color:red;"></span> --}}
                        </div>
                        <!-- Submit button and closing tags -->
                        <div class="form-group cv-form">
                            <label for="cv">Please upload your CV <span>*</span></label>
                            <div class="w-100">
                                <input name="cv" type="file" class="form-control" required>
                                <span class="cv-validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <button type="submit" id="contactButton" class="btn btn-primary"
                            onclick="submitCv(event)">Submit</button>
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
            function submitCv(e) {
                e.preventDefault();
                e.stopPropagation();
                $("#loader").show();
                $('#contactForm').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        date: {
                            required: true,
                            date: true
                        },
                        gender: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            required: true
                        },
                        passport: {
                            required: true
                        },
                        birth_country: {
                            required: true
                        },
                        current_country: {
                            required: true
                        },

                        undergrad_subject: {
                            required: true
                        },
                        teaching_qualification_subject: {
                            required: true
                        },
                        
                        current_job_title: {
                            required: true
                        },
                        seeking_role: {
                            required: true
                        },
                        cv: {
                            required: true,
                            extension: "pdf|doc|docx" // optional: restrict to CV file types
                        }
                    },
                    messages: {
                        name: {
                            required: "Name is required",
                        },
                        date: {
                            required: "Date of birth is required",
                            date: "Please enter a valid date"
                        },
                        gender: {
                            required: "Gender is required"
                        },
                        email: {
                            required: "Email address is required",
                            email: "Please enter a valid email address"
                        },
                        phone: {
                            required: "Phone number is required"
                        },
                        passport: {
                            required: "Passport information is required"
                        },
                        birth_country: {
                            required: "Birth country is required"
                        },
                        current_country: {
                            required: "Current country is required"
                        },

                        undergrad_subject: {
                            required: "Undergraduate subject is required"
                        },
                        teaching_qualification_subject: {
                            required: "Teaching qualification subject is required"
                        },
                        current_job_title: {
                            required: "Current job title is required"
                        },
                        seeking_role: {
                            required: "Seeking role is required"
                        },

                        cv: {
                            required: "Please upload your CV",
                            extension: "Allowed file types: pdf, doc, docx"
                        }
                    },

                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        $(element).siblings("span").text(error.text())
                        $(error).hide()
                    }
                });
                if ($('#contactForm').valid()) {
                    $(".error").html('');
                    $("#contactButton").text("Posting...");

                    var formData = new FormData($("#contactForm")[0]);

                    $.ajax({
                        url: "{{ route('request.cv') }}",
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

                                if (errors.name) {
                                    $(".name-validation").html(errors.name[0]);
                                }
                                if (errors.date) {
                                    $(".date-validation").html(errors.date[0]);
                                }
                                if (errors.gender) {
                                    $(".gender-validation").html(errors.gender[0]);
                                }
                                if (errors.email) {
                                    $(".email-validation").html(errors.email[0]);
                                }
                                if (errors.phone) {
                                    $(".phone-validation").html(errors.phone[0]);
                                }
                                if (errors.passport) {
                                    $(".passport-validation").html(errors.passport[0]);
                                }
                                if (errors.birth_country) {
                                    $(".birth_country-validation").html(errors.birth_country[0]);
                                }
                                if (errors.current_country) {
                                    $(".current_country-validation").html(errors.current_country[0]);
                                }

                                if (errors.undergrad_subject) {
                                    $(".undergrad_subject-validation").html(errors.undergrad_subject[0]);
                                }
                                if (errors.teaching_qualification_subject) {
                                    $(".teaching_qualification_subject-validation").html(errors
                                        .teaching_qualification_subject[0]);
                                }
                                if (errors.teaching_license) {
                                    $(".teaching_license-validation").html(errors.teaching_license[0]);
                                }
                                if (errors.current_job_title) {
                                    $(".current_job_title-validation").html(errors.current_job_title[0]);
                                }
                                if (errors.seeking_role) {
                                    $(".seeking_role-validation").html(errors.seeking_role[0]);
                                }

                                if (errors.cv) {
                                    $(".cv-validation").html(errors.cv[0]);
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
    @endpush
