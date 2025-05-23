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
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
                <h1>{{ $banner->title ?? 'About' }}</h1>
                <p>{{ $banner->description ?? 'Description' }}</p>
            </div>
        </div>
    </div>
    <!-- banner  -->
    <!-- main-body -->
    <div class="main-body">

        <section class="contact-section section-padding">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-5" data-aos="fade-right">
                        <div class="contact-info">
                            <h2>{{ $contact->title ?? 'Get in Touch' }}</h2>
                            <p>{{ $contact->description ?? "We're here to help! Fill out the form and we'll get back to you." }}
                            </p>

                            <div class="contact-details">
                                <!-- Location -->
                                <div class="contact-item">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="info">
                                        <h4>Our Location</h4>
                                        @php
                                            $address = $contact->address ?? 'SR No.98 lorem, ipsum, West Java, Canada';
                                            $mapUrl = $contact->map_link;

                                        @endphp
                                        <p><a href="{{ $mapUrl }}" target="_blank">{{ $address }}</a></p>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="contact-item">
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="info">
                                        <h4>Call Us</h4>
                                        @php
                                            $phone = $contact->phone ?? '+1 234 567 8900';
                                            $tel = 'tel:' . preg_replace('/\s+/', '', $phone); // removes spaces
                                        @endphp
                                        <p><a href="{{ $tel }}">{{ $phone }}</a></p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="contact-item">
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="info">
                                        <h4>Email Us</h4>
                                        @php
                                            $email = $contact->email ?? 'hello@bookmark.com';
                                        @endphp
                                        <p><a href="mailto:{{ $email }}">{{ $email }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-7" data-aos="fade-left">
                        <div class="contact-form">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <div class="required_item">
                                            <select name="type" class="form-control" required>
                                                <option value="" selected disabled>Are you a job seeker or client
                                                </option>
                                                <option value="seeker">Job Seeker</option>
                                                <option value="client">Client</option>
                                            </select>
                                        </div>
                                        <span class="type-validation error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="required_item">
                                            <input type="text" name="name" class="form-control" placeholder="Name"
                                                required>
                                        </div>
                                        <span class="name-validation error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="required_item">
                                            <input type="tel" name="phone" class="form-control" placeholder="Phone"
                                                required pattern="[0-9]{10,}">
                                        </div>
                                        <span class="phone-validation error"></span>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
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
                                    </div> --}}

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="required_item">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Your Email*" required>
                                        </div>
                                        <span class="email-validation error"></span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="required_item">
                                            <input type="text" name="subject" class="form-control" placeholder="Subject"
                                                required>
                                        </div>
                                        <span class="subject-validation error"></span>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="required_item">
                                            <textarea class="form-control" name="message" placeholder="Your Message*" rows="5" required></textarea>
                                        </div>
                                        <span class="message-validation error"></span>
                                    </div>
                                </div>
                        </div>


                        <button type="submit" id="submitButton" class="submit-btn" onclick="submitEnquiry(event)">
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
        $.validator.addMethod("phone", function(value, element) {
            return this.optional(element) || /^[0-9\-\+\s\(\)]+$/.test(value);
        }, "Please enter a valid phone number");
    </script>

    <script>
        function submitEnquiry(e) {
            e.preventDefault();
            e.stopPropagation();
            $("#loader").show();

            $('#contactForm').validate({
                rules: {
                    type: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        phone: true
                    },
                    subject: {
                        required: true
                    },
                    message: {
                        required: true
                    }
                },
                messages: {
                    type: {
                        required: "Type is required",
                    },
                    name: {
                        required: "Name is required",
                    },
                    email: {
                        required: "Email Address is required",
                    },
                    phone: {
                        required: "Phone no is required",
                    },
                    subject: {
                        required: "Subject is required",
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
            if ($('#contactForm').valid()) {
                $(".error").html('');
                $("#submitButton").text("Storing...");

                var formData = new FormData($("#contactForm")[0]);

                $.ajax({
                    url: "{{ route('request.contact') }}",
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
                        $("#submitButton").text("Submit");

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
                        $("#submitButton").text("Submit");

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            if (errors.type) {
                                $(".type-validation").html(errors.type[0]);
                            }
                            if (errors.name) {
                                $(".name-validation").html(errors.name[0]);
                            }
                            if (errors.email) {
                                $(".email-validation").html(errors.email[0]);
                            }
                            if (errors.email) {
                                $(".phone-validation").html(errors.email[0]);
                            }
                            if (errors.subject) {
                                $(".subject-validation").html(errors.subject[0]);
                            }
                            if (errors.email) {
                                $(".message-validation").html(errors.email[0]);
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
