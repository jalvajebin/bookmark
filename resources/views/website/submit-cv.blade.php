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
                    <form id="contactForm">
                        <h6 class="mandatory-text">Fields marked with an * are mandatory fields</h6>
                        <div class="">
                            <div class="form-group cv-form">
                                <label for="">What is your full name? <span>*</span></label>
                                <input type="text" class="form-control "
                                    placeholder=" [First then your last name, please, e.g. Jane Doe]" required>
                                <span class="focus-border"></span>
                            </div>


                            <div>
                                <div class="form-group cv-form">
                                    <label for="">What is your date of birth? <span>*</span></label>
                                    <input type="text" class="form-control " placeholder="dd/mm/yyyy" required>
                                    <span class="focus-border"></span>
                                </div>
                            </div>


                            <div>
                                <div class="form-group cv-form">
                                    <label for="">What is your gender? <span>*</span></label>
                                    <select class="form-control " required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="Prefer not to say">Prefer not to say</option>
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
                                    <label for="phone">Which of these passports do you hold?<span>*</span></label>
                                    <select class="form-control " name="country" required>
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
                                </div>
                            </div>


                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">What country were you born in?<span>*</span></label>
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
                                    <label for="phone">What is your current country of residence?<span>*</span></label>
                                    <input type="text" class="form-control " required>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">Visa question, marital status: Which of these would best fit your
                                        travel
                                        plan?<span>*</span></label>
                                    <select class="form-control " name="country" required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Travelling alone">Travelling alone</option>
                                        <option value="Single but travelling with another person on separate visas">
                                            Single but travelling with another person on separate visas
                                        </option>
                                        <option value="Married/Civil Partnership - partner travelling on their own Visa">
                                            Married/Civil Partnership - partner travelling on their own Visa
                                        </option>
                                        <option value="Married/Civil Partnership - travelling on dependent (joint) Visa">
                                            Married/Civil Partnership - travelling on dependent (joint) Visa
                                        </option>
                                        <option value="Unmarried Couple - partner travelling on their own Visa">
                                            Unmarried Couple - partner travelling on their own Visa
                                        </option>

                                    </select>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">If you are travelling with another person, are they a teacher
                                        seeking work?</label>
                                    <select class="form-control " name="country" required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="focus-border"></span>
                                </div>
                            </div>


                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">Visa question, children under 18: Would you wish to bring
                                        children with you?
                                        <span>*</span></label>
                                    <select class="form-control " name="country" required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="No dependants or dependant children not travelling with you">
                                            No dependants or dependant children not travelling with you
                                        </option>
                                        <option value="Dependant children travelling but on another person's visa">
                                            Dependant children travelling but on another person's visa
                                        </option>
                                        <option value="Travelling with 1 dependant child on your visa">
                                            Travelling with 1 dependant child on your visa
                                        </option>
                                        <option value="Travelling with 2 dependant children on your visa">
                                            Travelling with 2 dependant children on your visa
                                        </option>
                                        <option value="Travelling with 3+ dependant children on your visa">
                                            Travelling with 3+ dependant children on your visa
                                        </option>
                                    </select>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">What was your major subject in your undergraduate degree?
                                        <span>*</span></label>
                                    <select class="form-control " name="country" required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="">What was your major subject in your undergraduate degree?
                                        <span>*</span></label>
                                    <textarea class="form-control " placeholder="Your Message*" rows="5" required></textarea>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="">What was your major subject in your teaching qualification?
                                        <span>*</span></label>
                                    <textarea class="form-control" placeholder="Your Message*" rows="5" required></textarea>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label>Please can you confirm where you are licensed to teach? [Select all that
                                        apply]<span>*</span></label>
                                    <div class="radio-group">
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="yes" required>
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Australia</span>
                                        </label>
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">UK (QTS/GTC/EWC registered)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Canada (Provincial Licence Holder)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">South Africa</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">New Zealand</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">US (State Licence Holder)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Other</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="">What is your current job title? <span>*</span></label>
                                    <textarea class="form-control" placeholder="Your Message*" rows="5" required></textarea>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="">What role are you seeking? <span>*</span></label>
                                    <textarea class="form-control" placeholder="Your Message*" rows="5" required></textarea>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">Do you have international teaching experience?
                                        <span>*</span></label>
                                    <select class="form-control" name="country" required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label>Which of these curriculum have you taught? (Select as many as
                                        apply)<span>*</span></label>
                                    <div class="radio-group">
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="yes" required>
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Australian</span>
                                        </label>
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Canadian</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">International Baccalaureate (PYP, MYP, DP)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">International (eg IPC, IMYC, iGCSE)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Irish</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Montessori</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">New Zealand</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Scottish</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">South African</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">UK National Curriculum for England and Wales (EYFS,
                                                KS1-3, GCSE, A Level)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">US (Common Core, AP)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Other</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label for="phone">How many years of post-qualifying teaching experience do you
                                        have? <span>*</span></label>
                                    <select class="form-control" name="country" required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Yes">0-1</option>
                                        <option value="No">1-2</option>
                                        <option value="Yes">3-4</option>
                                        <option value="No">5-6</option>
                                        <option value="Yes">6-7</option>

                                    </select>
                                    <span class="focus-border"></span>
                                </div>
                            </div>

                            <div>
                                <div class="form-group cv-form">
                                    <label>What region would you be hoping to teach in?<span>*</span></label>
                                    <div class="radio-group">
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="yes" required>
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Australian</span>
                                        </label>
                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Canadian</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">International Baccalaureate (PYP, MYP, DP)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">International (eg IPC, IMYC, iGCSE)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Irish</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Montessori</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">New Zealand</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Scottish</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">South African</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">UK National Curriculum for England and Wales (EYFS,
                                                KS1-3, GCSE, A Level)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">US (Common Core, AP)</span>
                                        </label>

                                        <label class="custom-radio square">
                                            <input type="radio" name="teaching_license" value="no">
                                            <span class="radio-checkmark"></span>
                                            <span class="radio-label">Other</span>
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
