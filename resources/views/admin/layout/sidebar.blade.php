<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ url('/dashboard') }}"
                        class="waves-effect {{ Request::is('dashboard*') ? 'mm-active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="{{ Request::is('home*') ? 'mm-active' : '' }}">
                    <a href="{{ route('home.index') }}" class="waves-effect">
                        <i class="fas fa-home"></i>
                        <span key="t-dollar">Home</span>
                    </a>
                </li>
                <li class="{{ Request::is('about*') ? 'mm-active' : '' }}">
                    <a href="{{ route('about.index') }}" class="waves-effect">
                        <i class="fas fa-info-circle"></i>
                        <span key="t-dollar">About</span>
                    </a>
                </li>
                <li class="{{ Request::is('blog*') ? 'mm-active' : '' }}">
                    <a href="{{ route('blog.index') }}" class="waves-effect">
                        <i class="fas fa-book"></i>
                        <span key="t-dollar">Blog</span>
                    </a>
                </li>
                <li class="{{ Request::is('contact*') ? 'mm-active' : '' }}">
                    <a href="{{ route('contact.index') }}" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Contact</span>
                    </a>
                </li>
                <li class="{{ Request::is('services*') ? 'mm-active' : '' }}">
                    <a href="{{ route('services.index') }}" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Services</span>
                    </a>
                </li>

                  <!-- Applicants Dropdown -->
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users"></i>
                        <span key="t-applicants">Applicants</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Find a Job</a></li>
                        <li><a href="#">Submit your CV</a></li>
                        <li><a href="#">Career Hub</a></li>
                        <li><a href="{{ route('destination.index') }}">Destinations</a></li>
                    </ul>
                </li>



                <li class="{{ Request::is('email-settings*') ? 'mm-active' : '' }}">
                    <a href="{{ route('email.index') }}" class="waves-effect">
                        <i class="fas fa-envelope"></i>
                        <span key="t-dollar">Email Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
