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
                    <a href="" class="waves-effect">
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
                <li class="{{ Request::is('employer*') ? 'mm-active' : '' }}">
                    <a href="{{ route('employer.index') }}" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Employer</span>
                    </a>
                </li>
                <li class="{{ Request::is('services*') ? 'mm-active' : '' }}">
                    <a href="{{ route('services.index') }}" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Services</span>
                    </a>
                </li>
                <li class="{{ Request::is('serviceWeProvide*') ? 'mm-active' : '' }}">
                        <a href="{{ route('index') }}" class="waves-effect">
                            <i class="fas fa-address-book"></i>
                            <span key="t-dollar">Service we provide</span>
                        </a>
                    </li>
 
 
                      <li class="{{ Request::is('whyworkwith*') ? 'mm-active' : '' }}">
                        <a href="{{ route('whyworkwith.index') }}" class="waves-effect">
                            <i class="fas fa-address-book"></i>
                            <span key="t-dollar">Why work with Us</span>
                        </a>
                    </li>
                    
                    <li class="{{ Request::is('whatwedo*') ? 'mm-active' : '' }}">
                        <a href="{{ route('whatwedo.index') }}" class="waves-effect">
                            <i class="fas fa-address-book"></i>
                            <span key="t-dollar">what we do and easy</span>
                        </a>
                    </li>

                  <!-- Applicants Dropdown -->
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users"></i>
                        <span key="t-applicants">Applicants</span>
                    </a>
                </li>

                <li class="{{ Request::is('destination*') ? 'mm-active' : '' }}">
                    <a href="{{ route('destination.index') }}" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Destinations</span>
                    </a>
                </li>
                <li class="{{ Request::is('jobs*') ? 'mm-active' : '' }}">
                    <a href="{{ route('jobs.index') }}" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Job</span>
                    </a>
                </li>

                {{-- <li class="{{ Request::is('career*') ? 'mm-active' : '' }}">
                    <a href="{{ route('careers.index') }}" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Careers</span>
                    </a>
                </li> --}}

                <li class="{{ Request::is('contact*') ? 'mm-active' : '' }}">
                    <a href="{{ route('contact.index') }}" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span key="t-dollar">Contact</span>
                    </a>
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
