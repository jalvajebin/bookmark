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

                        <div class="form-group cv-form">
                            <label for="">What is your full name? <span>*</span></label>
                            <input name="name" type="text" class="form-control"
                                placeholder="[First then your last name, please, e.g. Jane Doe]" required>
                            <span class="focus-border"></span>
                            <span class="name-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label for="">What is your date of birth? <span>*</span></label>
                            <input name="date" type="date" class="form-control" placeholder="dd/mm/yyyy" required>
                            <span class="focus-border"></span>
                            <span class="date-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label for="">What is your gender? <span>*</span></label>
                            <select name="gender" class="form-control" required>
                                <option value="" selected disabled>Please Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="Prefer not to say">Prefer not to say</option>
                            </select>
                            <span class="focus-border"></span>
                            <span class="gender-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label for="">What is your email address? <span>*</span></label>
                            <input name="email" type="email" class="form-control" placeholder="Your Email*" required>
                            <span class="focus-border"></span>
                            <span class="email-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label for="phone">What is your phone number? <span>*</span></label>
                            <input type="tel" id="phone" name="phone"
                                placeholder="Please include international dialling code such as +971 123456789"
                                class="form-control" required>
                            <span class="focus-border"></span>
                            <span class="phone-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label for="passport">Which of these passports do you hold? <span>*</span></label>
                            <select name="passport" class="form-control" required>
                                <option value="" selected disabled>Please Select</option>
                                <option value="American">American</option>
                                <option value="Australian">Australian</option>
                                <option value="British">British</option>
                                <option value="Canadian">Canadian</option>
                                <option value="European Union nation">European Union nation</option>
                                <option value="Irish">Irish</option>
                                <option value="New Zealander">New Zealander</option>
                                <option value="South African">South African</option>
                                <option value="Other">Other</option>
                            </select>
                            <span class="focus-border"></span>
                            <span class="passport-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label for="birth_country">What country were you born in? <span>*</span></label>
                            <select name="birth_country" class="form-control" required>
                                <option value="" selected disabled>Please Select</option>
                                <option value="American">America</option>
                                <option value="Australian">Australia</option>
                                <option value="Canadian">Canada</option>
                                <option value="European Union nation">Ireland</option>
                                <option value="New Zealander">New Zealand</option>
                                <option value="South African">South Africa</option>
                                <option value="Other">Other</option>
                            </select>
                            <span class="focus-border"></span>
                            <span class="birth_country-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label for="current_country">What is your current country of residence? <span>*</span></label>
                            <input name="current_country" type="text" class="form-control" required>
                            <span class="focus-border"></span>
                            <span class="current_country-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label>What destinations are you interested in teaching in? <span>*</span></label>
                            <div class="radio-group">
                                <label class="custom-radio square">
                                    <input type="radio" name="teaching_destination" value="Australia" required>
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">Australia</span>
                                </label>
                                <label class="custom-radio square">
                                    <input type="radio" name="teaching_destination"
                                        value="UK (QTS/GTC/EWC registered)">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">UK (QTS/GTC/EWC registered)</span>
                                </label>
                                <label class="custom-radio square">
                                    <input type="radio" name="teaching_destination"
                                        value="Canada (Provincial Licence Holder)">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">Canada (Provincial Licence Holder)</span>
                                </label>
                                <label class="custom-radio square">
                                    <input type="radio" name="teaching_destination" value="South Africa">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">South Africa</span>
                                </label>
                                <label class="custom-radio square">
                                    <input type="radio" name="teaching_destination" value="New Zealand">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">New Zealand</span>
                                </label>
                                <label class="custom-radio square">
                                    <input type="radio" name="teaching_destination" value="US (State Licence Holder)">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">US (State Licence Holder)</span>
                                </label>
                                <label class="custom-radio square">
                                    <input type="radio" name="teaching_destination" value="Other">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">Other</span>
                                </label>
                            </div>
                            <span class="teaching_destination-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label for="undergrad_subject">What was your major subject in your undergraduate degree?
                                <span>*</span></label>
                            <textarea name="undergrad_subject" class="form-control" placeholder="Your Message*" rows="5" required></textarea>
                            <span class="focus-border"></span>
                            <span class="undergrad_subject-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label for="teaching_qualification_subject">What was your major subject in your teaching
                                qualification? <span>*</span></label>
                            <textarea name="teaching_qualification_subject" class="form-control" placeholder="Your Message*" rows="5"
                                required></textarea>
                            <span class="focus-border"></span>
                            <span class="teaching_qualification_subject-validation error-validation"
                                style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label>Please can you confirm where you are licensed to teach? [Select all that
                                apply]<span>*</span></label>
                            <div class="checkbox-group">
                                <label class="custom-checkbox square">
                                    <input type="checkbox" name="licensed_to_teach[]" value="Australia" required>
                                    <span class="checkbox-checkmark"></span>
                                    <span class="checkbox-label">Australia</span>
                                </label>
                                <label class="custom-checkbox square">
                                    <input type="checkbox" name="licensed_to_teach[]"
                                        value="UK (QTS/GTC/EWC registered)">
                                    <span class="checkbox-checkmark"></span>
                                    <span class="checkbox-label">UK (QTS/GTC/EWC registered)</span>
                                </label>
                                <label class="custom-checkbox square">
                                    <input type="checkbox" name="licensed_to_teach[]"
                                        value="Canada (Provincial Licence Holder)">
                                    <span class="checkbox-checkmark"></span>
                                    <span class="checkbox-label">Canada (Provincial Licence Holder)</span>
                                </label>
                                <label class="custom-checkbox square">
                                    <input type="checkbox" name="licensed_to_teach[]" value="South Africa">
                                    <span class="checkbox-checkmark"></span>
                                    <span class="checkbox-label">South Africa</span>
                                </label>
                                <label class="custom-checkbox square">
                                    <input type="checkbox" name="licensed_to_teach[]" value="New Zealand">
                                    <span class="checkbox-checkmark"></span>
                                    <span class="checkbox-label">New Zealand</span>
                                </label>
                                <label class="custom-checkbox square">
                                    <input type="checkbox" name="licensed_to_teach[]" value="US (State Licence Holder)">
                                    <span class="checkbox-checkmark"></span>
                                    <span class="checkbox-label">US (State Licence Holder)</span>
                                </label>
                                <label class="custom-checkbox square">
                                    <input type="checkbox" name="licensed_to_teach[]" value="Other">
                                    <span class="checkbox-checkmark"></span>
                                    <span class="checkbox-label">Other</span>
                                </label>
                            </div>
                            <span class="licensed_to_teach-validation error-validation" style="color:red;"></span>
                        </div>

                        <!-- ... previous form fields ... -->

                        <div class="form-group cv-form">
                            <label for="current_job_title">What is your current job title? <span>*</span></label>
                            <input name="current_job_title" type="text" class="form-control" required>
                            <span class="focus-border"></span>
                            <span class="current_job_title-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label for="seeking_role">What role are you seeking? <span>*</span></label>
                            <input name="seeking_role" type="text" class="form-control" required>
                            <span class="focus-border"></span>
                            <span class="seeking_role-validation error-validation" style="color:red;"></span>
                        </div>

                        <div class="form-group cv-form">
                            <label>Do you have international teaching experience? <span>*</span></label>
                            <div class="radio-group">
                                <label class="custom-radio square">
                                    <input type="radio" name="international_experience" value="Yes" required>
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">Yes</span>
                                </label>
                                <label class="custom-radio square">
                                    <input type="radio" name="international_experience" value="No">
                                    <span class="radio-checkmark"></span>
                                    <span class="radio-label">No</span>
                                </label>
                            </div>
                            <span class="international_experience-validation error-validation" style="color:red;"></span>
                        </div>

                        <!-- Submit button and closing tags -->



                        <div class="form-group cv-form">
                            <label for="cv">Please upload your CV <span>*</span></label>
                            <input name="cv" type="file" class="form-control" required>
                            <span class="focus-border"></span>
                            <span class="cv-validation error-validation" style="color:red;"></span>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

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
    @endpush
