
<footer class="footer">
    <div class="footer-container custom-container">
      <div class="footer-col">
        <img src="<?php echo e(contactUs()->logo->url); ?>" alt="<?php echo e(contactUs()->logoalt); ?>" class="footer-logo">
        <p class="footer-dis">Let’s build the future of education together. <span>Partner with us today!</span></p>
      </div>
      <div class="footer-col">
        <h4>Employer</h4>
        <ul>
          <li><a href="<?php echo e(route('web.about.index')); ?>">About Us</a></li>
          <li><a href="<?php echo e(route('web.service.index')); ?>">Services</a></li>
          
          <li><a href="<?php echo e(route('blogs')); ?>">Blog</a></li>
          <li><a href="<?php echo e(route('web.contact.index')); ?>">Contact Us</a></li>
        </ul>
      </div>
      
      <div class="footer-col">
        <h4>Address</h4>
        <ul>
          <li><a href=" <?php echo e(contactUs()->email); ?>"><strong> <?php echo e(contactUs()->email); ?> </strong></a></li>
          <li><?php echo e(contactUs()->address); ?></li>
          
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2025 Bookmark – All rights reserved.</p>
    </div>
  </footer><?php /**PATH /Users/jal/Herd/bookmark/resources/views/website/layout/footer.blade.php ENDPATH**/ ?>