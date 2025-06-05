<div class="vertical-menu">

    <div data-simplebar class="h-100">

       <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="<?php echo e(url('/dashboard')); ?>"
                        class="waves-effect <?php echo e(Request::is('dashboard*') ? 'mm-active' : ''); ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="<?php echo e(Request::is('home*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('home.index')); ?>" class="waves-effect">
                        <i class="fas fa-home"></i>
                        <span key="t-dollar">Home</span>
                    </a>
                </li>
                <li class="<?php echo e(Request::is('about*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('about.index')); ?>" class="waves-effect">
                        <i class="fas fa-info-circle"></i>
                        <span key="t-dollar">About</span>
                    </a>
                </li>
                <li class="<?php echo e(Request::is('blog*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('blog.index')); ?>" class="waves-effect">
                        <i class="fas fa-book"></i>
                        <span key="t-dollar">Blog</span>
                    </a>
                </li>
                <li class="<?php echo e(Request::is('employer*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('employer.index')); ?>" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Employer</span>
                    </a>
                </li>
                <li class="<?php echo e(Request::is('services*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('services.index')); ?>" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Services</span>
                    </a>
                </li>

                <li class="<?php echo e(Request::is('destination*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('destination.index')); ?>" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Destinations</span>
                    </a>
                </li>
                <li class="<?php echo e(Request::is('jobs*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('jobs.index')); ?>" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Job</span>
                    </a>
                </li>

                <li class="<?php echo e(Request::is('career*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('career.index')); ?>" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Careers</span>
                    </a>
                </li>

                <li class="<?php echo e(Request::is('contact*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('contact.index')); ?>" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Contact</span>
                    </a>
                </li>

                <li class="<?php echo e(Request::is('applications*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('submit-cv.index')); ?>" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Applications</span>
                    </a>
                </li>

                
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/layout/sidebar.blade.php ENDPATH**/ ?>