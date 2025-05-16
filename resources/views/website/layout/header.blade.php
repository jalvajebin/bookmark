<header>
    <div class="nav-top">
        <div class="social-icons">
            <a href="#" class=""><i class="fab fa-youtube"></i></a>
            <a href="#" class=""><i class="fab fa-facebook"></i></a>
            <a href="#" class=""><i class="fab fa-instagram"></i></a>
        </div>
        <div class="nav-right">
            <div class="call-info">
                <i class="fas fa-phone"></i>
                <span>+1 234 567 8900</span>
            </div>


        </div>
    </div>

    <div class="main-nav" id="navbar">
        <div>
            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="logo-width"></a>
        </div>

        <div>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggle-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto mb-lg-0 w-100 justify-content-center gap-3 main-nav-links">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.about.index') }}">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.service.index') }}">Service</a>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="applicant.html" role="button">
                                    Applicants
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="find-job.html">Find a Job</a></li>
                                    <li><a class="dropdown-item" href='submit-cv.html'>Submit your CV</a></li>
                                    <li><a class="dropdown-item" href='career-hub.html'>Career Hub</a></li>
                                    <li><a class="dropdown-item"
                                            href='{{ route('web.destination.index') }}'>Destinations</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.employers.index') }}">Employers</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blogs') }}">Blogs</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.contact.index') }}">Contact Us</a>
                            </li>
                        </ul>


                    </div>
                </div>
            </nav>
        </div>

        <div class="main-nav-right sm-hide-logo">

            <div>
                <a href="submit-cv.html">
                    <button class="head-btn"> <span>Submit Your CV</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</header>
