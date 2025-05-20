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
                                <input type="text" class="form-control " placeholder="Company Name" required>
                                <span class="focus-border"></span>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for=""> School Name<span>*</span></label>
                                    <input type="text" class="form-control " placeholder="School Name" required>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for=""> First Name <span>*</span></label>
                                    <input type="text" class="form-control " placeholder=" First Name" required>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for=""> Job Title <span>*</span></label>
                                    <input type="text" class="form-control " placeholder="Job Title" required>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone"> Website Address <span>*</span></label>
                                    <textarea type="tel" id="phone" placeholder=" Website Address " class="form-control " required></textarea>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for=""> City <span>*</span></label>
                                    <input type="text" class="form-control " placeholder="City" required>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone"> Country <span>*</span></label>
                                    <select class="form-control " name="country" required>
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
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for="">What is your email address? <span>*</span></label>
                                    <input type="email" class="form-control " placeholder="Your Email*" required>
                                    <span class="focus-border"></span>
                                </div>
                            </div>


                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">What is your phone number? <span>*</span></label>
                                    <input type="tel" id="phone"
                                        placeholder="Please include international dialling code such as +971 123456789"
                                        class="form-control " required>
                                    <span class="focus-border"></span>

                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="curriculum">Curriculum <span class="text-danger">*</span></label>
                                    <select class="form-control" name="curriculum" id="curriculum" required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="American">America</option>
                                        <option value="Australian">Australia</option>
                                        <option value="Canadian">Canada</option>
                                        <option value="European Union">Ireland</option>
                                        <option value="New Zealander">New Zealand</option>
                                        <option value="South African">South Africa</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <span class="focus-border"></span>
                                </div>

                                <div class="form-group cv-form mt-3">
                                    <label></label>
                                    <div class="radio-group">
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="Australia" required>
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Australia</span>
                                        </label>
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="UK">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">UK (QTS/GTC/EWC registered)</span>
                                        </label>
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="Canada">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Canada (Provincial Licence Holder)</span>
                                        </label>
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="South Africa">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">South Africa</span>
                                        </label>
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="New Zealand">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">New Zealand</span>
                                        </label>
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="US">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">US (State Licence Holder)</span>
                                        </label>
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="Other">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Other</span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">No of Vacancy<span>*</span></label>
                                    <input type="tel" id="phone"
                                        placeholder="No of Vacancy"
                                        class="form-control " required>
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">Privacy Notice<span>*</span></label>
                                    <div class="radio-group">
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="Australia" required>
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label"> I accept the privacy notice</span>
                                        </label>
                                    </div>
                                </div>
                            </div>    
                            <div>
                                <button type="submit" class="submit-btn">
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
    @endpush
