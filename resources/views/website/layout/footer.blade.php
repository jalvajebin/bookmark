
<footer class="footer">
    <div class="footer-container custom-container">
      <div class="footer-col">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Bookmark Logo" class="footer-logo">
        <p class="footer-dis">Let’s build the future of education together. <span>Partner with us today!</span></p>
      </div>
      <div class="footer-col">
        <h4>Employer</h4>
        <ul>
          <li><a href="{{ route('web.about.index') }}">About Us</a></li>
          <li><a href="{{ route('web.service.index') }}">Services</a></li>
          {{-- <li><a href="employers.html">Emlpoyees</a></li> --}}
          <li><a href="{{ route('blogs') }}">Blog</a></li>
          <li><a href="{{ route('web.contact.index') }}">Contact Us</a></li>
        </ul>
      </div>
      {{-- <div class="footer-col">
        <h4>Find Vacancy Based On</h4>
        <ul>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Job Location</a></li>
          <li><a href="#">Company Name</a></li>
        </ul>
      </div> --}}
      <div class="footer-col">
        <h4>Address</h4>
        <ul>
          <li><a href="mailto:hello@bookmark.com"><strong>hello@bookmark.com</strong></a></li>
          <li>SR No.98 lorem, ipsum</li>
          <li>West Java, Canada</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2025 Bookmark – All rights reserved.</p>
    </div>
  </footer>