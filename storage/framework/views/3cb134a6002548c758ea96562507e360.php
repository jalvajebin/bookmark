<?php $__env->startSection('content'); ?>

 <!-- banner  -->
 <div class="inner-banner" style="background-image: url(<?php echo e($banner->images->url); ?>)">
    <div class="inner-banner-overlay"></div>
    <div class="inner-banner-cntnt " data-aos="fade-up">
      <div class="custom-container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
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

    <!-- inner about -->
    <section class="section-padding">
      <div class="custom-container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-6" data-aos="fade-right">
            <div class="inner-about-div">
              <img src="<?php echo e($about->Images->url ?? 'null'); ?>" alt="<?php echo e($about->image1_alt); ?>">

              <div class="support-box">
                <div class="icon-circle">
                  <i class="fa-solid fa-phone"></i>
                </div>
                <div class="support-text">
                  <span class="label">ONLINE SUPPORT</span>
                  <h4 class="number"><?php echo e($about->online_support_number); ?></h4>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left">
            <div class="section-title about-title">
              <h2><?php echo e($about->title ?? "About-Us"); ?></h2>
              <p class="main-para">
               <?php echo e($about->description); ?>

              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- inner about -->

    <!-- Proffessions section -->
    <!-- <section class="hiring-section">
      <div class="hiring-card left" data-aos="fade-right">
        <div class="hiring-content">
          <h2>Professions Hiring</h2>
          <p>This dynamic hiring landscape presents a wealth of opportunities for professionals across</p>
          <a href="#" class="hiring-button">Professions</a>
        </div>
        <div class="hiring-image">
          <img src="assets/img/candidate-2.png">
        </div>
      </div>

      <div class="hiring-card right" data-aos="fade-left">
        <div class="hiring-content hiring-content-right">
          <h2>Industries Hiring</h2>
          <p>The current job market is dynamic, with numerous industries actively seeking new talent</p>
          <a href="#" class="hiring-button">Industries</a>
        </div>
        <div class="hiring-image">
          <img src="assets/img/employer-2.png">
        </div>
      </div>
    </section> -->
    <!-- Proffessions section -->

    <!-- learn about agency -->

    
    <section class="learn-about-agency">
      <div class="custom-container">
        <div class="row hero-content">
          <div class="col-lg-5" data-aos="fade-right">
            <div class="hero-text">
              <div class="agency-label"><?php echo e($learAboutUs->title ?? "Title"); ?></div>
              <h1 class="hero-heading"><?php echo e($learAboutUs->heading ?? "We're Reliable & Cost Efficient Recruitment Agency"); ?></h1>
              
            </div>
          </div>
          <div class="col-lg-7" data-aos="fade-left">
            <div class="tab-container">
              <div class="tabs ab-tabs">
                <button class="tab ab-tab active" data-tab="tab1"> For Employees</button>
                <button class="tab ab-tab" data-tab="tab2"> For Employer</button>
              </div>

              <div class="tab-content ab-tab-cntnt active" id="tab1">
                <div class="d-flex flex-column flex-md-row align-items-start gap-5">
                  <div class="image-container">
                    <img src="<?php echo e($learAboutUs->EmployeeImageName->url); ?>">                  </div>

                  <div>
                    <p class="description">
                    <?php echo e($learAboutUs->employee_description ?? "There are many simply free text available variations of passages of but the majority have in some."); ?> 
                    </p>

                    <ul class="features">
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                       <?php echo e($learAboutUs->employee_content_1 ?? "Support on hiring employeers"); ?> 
                      </li>
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                       <?php echo e($learAboutUs->employee_content_2 ?? 'Get Exceptional service for growth'); ?> 
                      </li>
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                        <?php echo e($learAboutUs->employee_content_3 ?? 'Outsourced consulting business'); ?> 
                        
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="tab-content ab-tab-cntnt" id="tab2">
                <div class="d-flex flex-column flex-md-row align-items-start gap-5">
                  <div class="image-container">
                    <img src="<?php echo e($learAboutUs->EmployerImageName->url ?? 'assets/img/applicant-cta.png'); ?>">
                  </div>

                  <div>
                    <p class="description">
                        <?php echo e($learAboutUs->employee_description ?? "There are many simply free text available variations of passages of but the majority have in some."); ?> 
                    </p>

                    <ul class="features">
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                         <?php echo e($learAboutUs->employee_content_1 ?? "Support on hiring employeers"); ?> 
                      </li>
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                        <?php echo e($learAboutUs->employee_content_2 ?? 'Get Exceptional service for growth'); ?> 
                      </li>
                      <li class="feature-item">
                        <span class="check-icon">✓</span>
                        <?php echo e($learAboutUs->employee_content_3 ?? 'Outsourced consulting business'); ?> 
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>



    <div class="stats-container" data-aos="fade-up">
      <div class="stat-box">
        <img src="<?php echo e($counters->Count1Image->url ?? "assets/img/why-offices.png"); ?>" alt="">
        <div class="stat-number"> <?php echo e($counters->count1 ?? '8'); ?></div>
        <div class="stat-label"><?php echo e($counters->counter_1_name ?? 'Offices Worldwide'); ?></div>
      </div>

      <div class="stat-box">
        <img src="<?php echo e($counters->Count2Image->url ?? "assets/img/why-consultant.png"); ?>" alt="">
        <div class="stat-number"><?php echo e($counters->count2 ?? '16'); ?></div>
        <div class="stat-label"><?php echo e($counters->counter_2_name ?? 'Consultants across the world'); ?></div>
      </div>

      <div class="stat-box">
        <img src="<?php echo e($counters->Count3Image->url ?? "assets/img/why-country.png"); ?>" alt="">
        <div class="stat-number"><?php echo e($counters->count3 ?? '28'); ?></div>
        <div class="stat-label"><?php echo e($counters->counter_3_name ?? "Countries placed in 2024"); ?></div>
      </div>

      <div class="stat-box">
        <img src=" <?php echo e($counters->Count4Image->url ?? "assets/img/why-teacher.png"); ?>" alt="">
        <div class="stat-number"><?php echo e($counters->count4?? '266'); ?></div>
        <div class="stat-label"><?php echo e($counters->counter_4_name ?? "Teachers placed in 2024"); ?></div>
      </div>
    </div>
    <!-- learn about agency -->

    <!-- Counter section -->
    <section class="counter-section" data-aos="zoom-in">
      <div class="counter-box">
        <div class="counter ab-counter" data-target="<?php echo e($counters->count5?? '0'); ?>"><?php echo e($counters->count5?? '0'); ?></div>
        <p><span class="ab-dot"></span><?php echo e($counters->counter_5_name ?? 'Live Jobs'); ?></p>
      </div>
      <div class="counter-box">
        <div class="counter ab-counter" data-target="<?php echo e($counters->count6?? '0'); ?>"><?php echo e($counters->count6?? '0'); ?></div>
        <p><span class="ab-dot"></span><?php echo e($counters->counter_6_name ?? 'Companies'); ?></p>
      </div>
      <div class="counter-box">
        <div class="counter ab-counter" data-target="<?php echo e($counters->count7?? '0'); ?>"><?php echo e($counters->count7?? '0'); ?></div>
        <p><span class="ab-dot"></span><?php echo e($counters->counter_7_name ?? 'Candidates'); ?></p>
      </div>
      <div class="counter-box">
        <div class="counter ab-counter" data-target="<?php echo e($counters->count8?? '0'); ?>"><?php echo e($counters->count8 ?? '0'); ?></div>
        <p><span class="ab-dot"></span><?php echo e($counters->counter_7_name ?? 'New Jobs'); ?></p>
      </div>
    </section>

    <section class="section-padding" data-aos="fade-up">
        <div class="custom-container">
          <div class="testimonial-main">
            <div class="section-title text-center">
              <h2>What Our Clients Say <span>About Us</span></h2>
            </div>
      
            <div class="owl-carousel" id="testimonial-carousel">
              <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                  <div class="testimonial-box">
                    <div class="testimonial-img">
                      <img src="<?php echo e($testimonial->Images->url); ?>" alt="<?php echo e($testimonial->alt); ?>">
                    </div>
      
                    <div class="testmonial-cntnt">
                      <h6><?php echo e(\Carbon\Carbon::parse($testimonial->date)->format('F j, Y')); ?></h6>
                      <h4><?php echo e($testimonial->heading); ?></h4>
                      <p><?php echo e($testimonial->description); ?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </section>
      
    <!-- Testimonials -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
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
  
<?php $__env->stopPush(); ?>
<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jal/Herd/bookmark/resources/views/website/about.blade.php ENDPATH**/ ?>