<?php $__env->startSection('content'); ?>


  <!-- banner  -->
  <div class="inner-banner" style="background-image: url(<?php echo e($banner->Images->url ?? asset('admin/images/no-image.png')); ?>)"> 
    <div class="inner-banner-overlay"></div>
    <div class="inner-banner-cntnt " data-aos="fade-up">
      <div class="custom-container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Service Us</li>
          </ol>
        </nav>
        <h1><?php echo e($banner->title ?? 'About'); ?></h1>
        <p><?php echo e($banner->description ?? "Description"); ?></p>
      </div>
    </div>
  </div>
  <!-- banner  -->

  <!-- main-body -->
  <div class="main-body">
    <!-- Services list -->
    <section class="section-padding">
      <div class="row g-3">
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-6" data-aos="fade-right">
          <div class="service-card">
            <div class="service-card-img">
              <img src="<?php echo e($service->Images->preview ?? "assets/img/teacher-recuitment.png"); ?>" alt="Teaching Team">
            </div>
            <div class="card-content">
              <h3><?php echo e($service->title ?? 'Teacher Recruitment'); ?> </h3>
              <p> <?php echo $service->description ?? "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis provident totam rem deserunt,"; ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
      </div>
    </section>  
  <?php $__env->stopSection(); ?>

  <?php $__env->startPush('js'); ?>
  <script>
    AOS.init({
      duration: 2000,
      once: false     
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

<?php $__env->stopPush(); ?>
  
<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jal/Herd/bookmark/resources/views/website/service.blade.php ENDPATH**/ ?>