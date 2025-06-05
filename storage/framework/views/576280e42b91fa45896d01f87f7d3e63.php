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
                <span><?php echo e(contactUs()->phone); ?></span>
            </div>


        </div>
    </div>

    <div class="main-nav" id="navbar">
        <div>
            <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="" class="logo-width"></a>
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
                                <a class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>"" aria-current="page" href="<?php echo e(url('/')); ?>">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?php echo e(request()->routeIs('web.about.index') ? 'active' : ''); ?> " href="<?php echo e(route('web.about.index')); ?>">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?php echo e(request()->routeIs('web.service.index') ? 'active' : ''); ?>" href="<?php echo e(route('web.service.index')); ?>">Service</a>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle  <?php echo e(request()->routeIs('web.applicants.*') || request()->routeIs('web.find-job.index') || request()->routeIs('web.applicants.submit-cv') || request()->routeIs('web.applicants.career-hub') || request()->routeIs('web.destination.index') ? 'active' : ''); ?>" " href='<?php echo e(route('web.applicants.index')); ?>' role="button">
                                    Applicants
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"  href="<?php echo e(route('web.find-job.index')); ?>">Find a Job</a></li>
                                    <li><a class="dropdown-item"  href="<?php echo e(route('web.applicants.submit-cv')); ?>">Submit your CV</a></li>
                                    <li><a class="dropdown-item"  href="<?php echo e(route('web.applicants.career-hub')); ?>">Career Hub</a></li>
                                    <li><a class="dropdown-item"  href='<?php echo e(route('web.destination.index')); ?>'>Destinations</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(request()->routeIs('web.employers.index') ? 'active' : ''); ?>" href="<?php echo e(route('web.employers.index')); ?>">Employers</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  <?php echo e(request()->routeIs('blogs') ? 'active' : ''); ?>" href="<?php echo e(route('blogs')); ?>">Blogs</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?php echo e(request()->routeIs('web.contact.index') ? 'active' : ''); ?> " href="<?php echo e(route('web.contact.index')); ?>">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>


      

        <div class="main-nav-right sm-hide-logo">

            <div>
                <a href="<?php echo e(route('web.applicants.submit-cv')); ?>">
                    <button class="head-btn"> <span>Submit Your CV</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/website/layout/header.blade.php ENDPATH**/ ?>