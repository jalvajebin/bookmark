//jquery




// Navbar text change


// header
const navbar = document.getElementById('navbar');
  
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

//   service-box


//  tab


document.addEventListener('DOMContentLoaded', function () {
  const tabBtns = document.querySelectorAll('.tab-btn');
  const tabPanes = document.querySelectorAll('.tab-pane');

  function animatePartnerImages(targetTab) {
    const partners = targetTab.querySelectorAll('.partner-img');
    partners.forEach((partner, index) => {
      // Reset initial state
      partner.style.opacity = '0';
      partner.style.transform = 'translateY(30px)';

      // Animate each partner with delay
      setTimeout(() => {
        partner.style.opacity = '1';
        partner.style.transform = 'translateY(0)';
      }, 300 + (index * 200)); // 200ms delay between each partner
    });
  }

  tabBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      // Remove active class from all buttons
      tabBtns.forEach(btn => btn.classList.remove('active'));
      // Add active class to clicked button
      this.classList.add('active');

      // Get target tab
      const targetTab = document.getElementById(this.dataset.tab);

      // Remove active class from all panes
      tabPanes.forEach(pane => {
        pane.classList.remove('active');
        pane.style.opacity = '0';
        pane.style.transform = 'translateY(20px)';
      });

      // Add active class to target pane
      setTimeout(() => {
        targetTab.classList.add('active');
        targetTab.style.opacity = '1';
        targetTab.style.transform = 'translateY(0)';

        // Animate partner images after tab transition
        animatePartnerImages(targetTab);
      }, 300);
    });
  });

  // Animate initial tab's partner images
  const activeTab = document.querySelector('.tab-pane.active');
  if (activeTab) {
    animatePartnerImages(activeTab);
  }
});



// team slider




$(document).ready(function () {
  $('#partner-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplaySpeed: 1000,
    autoplayHoverPause: true,
    smartSpeed: 500,
    fluidSpeed: true,
    dragEndSpeed: 350,
    navSpeed: 500,
    dotsSpeed: 500,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      768: {
        items: 3
      },
      992: {
        items: 4
      }
    },
    animateOut: 'fadeOut',
    animateIn: 'fadeIn'
  });
});




$(document).ready(function () {
  $('#blog-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplaySpeed: 1000,
    autoplayHoverPause: true,
    smartSpeed: 500,
    fluidSpeed: true,
    dragEndSpeed: 350,
    navSpeed: 500,
    dotsSpeed: 500,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 2
      }
    },
    animateOut: 'fadeOut',
    animateIn: 'fadeIn'
  });
});





// testimonial slider


$(document).ready(function () {
  $('#testimonial-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplaySpeed: 1000,
    autoplayHoverPause: true,
    smartSpeed: 500,
    fluidSpeed: true,
    dragEndSpeed: 350,
    navSpeed: 500,
    dotsSpeed: 500,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 1
      },
      992: {
        items: 2
      }
    },
    animateOut: 'fadeOut',
    animateIn: 'fadeIn'
  });
});




// Smooth Scrolling
const lenis = new Lenis({
  duration: 1.2, // Scroll animation duration
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Ease function
  smoothWheel: true
});

let isScrolling = false;
const scrollDelay = 100; // Delay in milliseconds

lenis.on('scroll', (e) => {
  if (!isScrolling) {
    isScrolling = true;
    setTimeout(() => {
      isScrolling = false;
    }, scrollDelay);
  }
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);


// counter
gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".counter").forEach(counter => {
    const target = +counter.dataset.target;

    const animate = () => {
      gsap.fromTo(counter, {
        innerText: 0
      }, {
        innerText: target,
        duration: 2,
        ease: "power1.out",
        snap: {
          innerText: 1
        },
        onUpdate: () => counter.innerText = Math.floor(counter.innerText)
      });
    };

    ScrollTrigger.create({
      trigger: counter,
      start: "top 80%",
      onEnter: () => (counter.innerText = "0", animate()),
      onEnterBack: () => (counter.innerText = "0", animate())
    });
  });
});



document.querySelectorAll('.dropdown-item').forEach(item => {
  item.addEventListener('click', function (e) {
    // e.preventDefault();
    const buttonText = this.textContent;
    // const dropdownButton = this.closest('.dropdown-container').querySelector('.btn');
    // dropdownButton.innerHTML = buttonText + ' <i class="bi bi-chevron-down"></i>';
  });
});


// Job Cards Animation

ScrollTrigger.matchMedia({
  // Desktop only
  "(min-width: 769px)": function () {
    const jobCards = gsap.utils.toArray('.job-card');

    jobCards.forEach((card, i) => {
      ScrollTrigger.create({
        trigger: card,
        start: "top bottom-=100",
        end: "bottom top+=100",
        onEnter: () => {
          gsap.to(card, {
            y: 0,
            opacity: 1,
            duration: 0.8,
            ease: "power3.out",
            delay: i * 0.2,
          });
        },
        onLeave: () => {
          gsap.to(card, {
            y: 60,
            opacity: 0,
            duration: 0.6,
            ease: "power2.in"
          });
        },
        onEnterBack: () => {
          gsap.to(card, {
            y: 0,
            opacity: 1,
            duration: 0.8,
            ease: "power3.out",
            delay: i * 0.1,
          });
        },
        onLeaveBack: () => {
          gsap.to(card, {
            y: 60,
            opacity: 0,
            duration: 0.6,
            ease: "power2.in"
          });
        },
        toggleActions: "play reverse play reverse"
      });

      // Set initial state
      gsap.set(card, {
        y: 60,
        opacity: 0
      });
    });

    ScrollTrigger.addEventListener("refresh", () => {
      jobCards.forEach((card, i) => {
        gsap.set(card, {
          y: 60,
          opacity: 0
        });
      });
    });
  }
});
ScrollTrigger.matchMedia({
  // Desktop only
  "(min-width: 769px)": function () {
    const jobCards = gsap.utils.toArray('.job-card');

    jobCards.forEach((card, i) => {
      ScrollTrigger.create({
        trigger: card,
        start: "top bottom-=100",
        end: "bottom top+=100",
        onEnter: () => {
          gsap.to(card, {
            y: 0,
            opacity: 1,
            duration: 0.8,
            ease: "power3.out",
            delay: i * 0.2,
          });
        },
        onLeave: () => {
          gsap.to(card, {
            y: 60,
            opacity: 0,
            duration: 0.6,
            ease: "power2.in"
          });
        },
        onEnterBack: () => {
          gsap.to(card, {
            y: 0,
            opacity: 1,
            duration: 0.8,
            ease: "power3.out",
            delay: i * 0.1,
          });
        },
        onLeaveBack: () => {
          gsap.to(card, {
            y: 60,
            opacity: 0,
            duration: 0.6,
            ease: "power2.in"
          });
        },
        toggleActions: "play reverse play reverse"
      });

      // Set initial state
      gsap.set(card, {
        y: 60,
        opacity: 0
      });
    });

    ScrollTrigger.addEventListener("refresh", () => {
      jobCards.forEach((card, i) => {
        gsap.set(card, {
          y: 60,
          opacity: 0
        });
      });
    });
  }
});




// Hire slider

document.addEventListener('DOMContentLoaded', function() {
  const slides = document.querySelector('.slides');
  const slideElements = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.dot');
  const prevButton = document.querySelector('.prev-button');
  const nextButton = document.querySelector('.next-button');
  let currentIndex = 0;
  const totalSlides = slideElements.length;
  let autoplayInterval;
  
  // Initialize the slider
  function initSlider() {
      updateSlidePosition();
      updateDots();
      startAutoplay();
  }
  
  // Update slide position
  function updateSlidePosition() {
      slides.style.transform = `translateX(-${currentIndex * 100}%)`;
  }
  
  // Update active dot
  function updateDots() {
      dots.forEach((dot, index) => {
          dot.classList.toggle('active', index === currentIndex);
      });
  }
  
  // Go to specific slide
  function goToSlide(index) {
      // Ensure the index is within valid range
      currentIndex = (index + totalSlides) % totalSlides;
      updateSlidePosition();
      updateDots();
      resetAutoplay();
  }
  
  // Next slide
  function nextSlide() {
      goToSlide(currentIndex + 1);
  }
  
  // Previous slide
  function prevSlide() {
      goToSlide(currentIndex - 1);
  }
  
  // Start autoplay
  function startAutoplay() {
      stopAutoplay();
      autoplayInterval = setInterval(nextSlide, 5000);
  }
  
  // Stop autoplay
  function stopAutoplay() {
      if (autoplayInterval) {
          clearInterval(autoplayInterval);
      }
  }
  
  // Reset autoplay
  function resetAutoplay() {
      stopAutoplay();
      startAutoplay();
  }
  
  // Event listeners
  prevButton.addEventListener('click', prevSlide);
  nextButton.addEventListener('click', nextSlide);
  
  dots.forEach((dot) => {
      dot.addEventListener('click', function() {
          const index = parseInt(this.getAttribute('data-index'));
          goToSlide(index);
      });
  });
  
  // Touch events for swipe support
  let touchStartX = 0;
  let touchEndX = 0;
  
  slides.addEventListener('touchstart', function(e) {
      touchStartX = e.changedTouches[0].screenX;
      stopAutoplay();
  }, { passive: true });
  
  slides.addEventListener('touchend', function(e) {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
      startAutoplay();
  }, { passive: true });
  
  function handleSwipe() {
      const swipeThreshold = 50;
      if (touchEndX < touchStartX - swipeThreshold) {
          // Swipe left
          nextSlide();
      } else if (touchEndX > touchStartX + swipeThreshold) {
          // Swipe right
          prevSlide();
      }
  }
  
  // Pause autoplay when hovering over the slider
  document.querySelector('.slider').addEventListener('mouseenter', stopAutoplay);
  document.querySelector('.slider').addEventListener('mouseleave', startAutoplay);
  
  // Initialize the slider
  initSlider();
});

// Back to top button
const backToTop = document.getElementById('back-to-top');

window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        backToTop.classList.add('show');
    } else {
        backToTop.classList.remove('show');
    }
});

backToTop.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});



// fade right and left animation

function initFadeAnimations() {
  // Common animation settings
  const animationSettings = {
    duration: 1,
    ease: "power3.out"
  };

  // Helper function to create animations
  function createScrollTrigger(element, direction) {
    const isMobile = window.innerWidth <= 991;
    const offset = isMobile ? "top 90%" : "top 80%";
    const distance = isMobile ? 30 : 50;
    
    let initialProps = {
      opacity: 0
    };

    if (direction === 'left') initialProps.x = -distance;
    if (direction === 'right') initialProps.x = distance;
    if (direction === 'up') initialProps.y = distance;

    gsap.set(element, initialProps);

    ScrollTrigger.create({
      trigger: element,
      start: offset,
      onEnter: () => {
        const animProps = {
          opacity: 1,
          duration: animationSettings.duration,
          ease: animationSettings.ease
        };

        if (direction === 'left' || direction === 'right') animProps.x = 0;
        if (direction === 'up') animProps.y = 0;

        gsap.to(element, animProps);
      },
      onLeave: () => {
        const animProps = {
          opacity: 0,
          duration: animationSettings.duration
        };

        if (direction === 'left') animProps.x = -distance;
        if (direction === 'right') animProps.x = distance;
        if (direction === 'up') animProps.y = distance;

        gsap.to(element, animProps);
      },
      onEnterBack: () => {
        const animProps = {
          opacity: 1,
          duration: animationSettings.duration,
          ease: animationSettings.ease
        };

        if (direction === 'left' || direction === 'right') animProps.x = 0;
        if (direction === 'up') animProps.y = 0;

        gsap.to(element, animProps);
      },
      onLeaveBack: () => {
        const animProps = {
          opacity: 0,
          duration: animationSettings.duration
        };

        if (direction === 'left') animProps.x = -distance;
        if (direction === 'right') animProps.x = distance;
        if (direction === 'up') animProps.y = distance;

        gsap.to(element, animProps);
      },
      toggleActions: "play reverse play reverse"
    });
  }

  // Apply animations
  document.querySelectorAll('.fade-left').forEach(element => {
    createScrollTrigger(element, 'left');
  });

  document.querySelectorAll('.fade-right').forEach(element => {
    createScrollTrigger(element, 'right');
  });

  document.querySelectorAll('.fade-up').forEach(element => {
    createScrollTrigger(element, 'up');
  });
}

// Initialize animations
document.addEventListener('DOMContentLoaded', () => {
  gsap.registerPlugin(ScrollTrigger);
  initFadeAnimations();

  // Handle resize and refresh
  let resizeTimer;
  window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      ScrollTrigger.getAll().forEach(trigger => trigger.kill());
      initFadeAnimations();
    }, 250);
  });
});

// header toggle

document.addEventListener('DOMContentLoaded', function() {
  const navbarToggler = document.querySelector('.navbar-toggler');
  const navItems = document.querySelectorAll('.nav-item');

  navbarToggler.addEventListener('click', function() {
      // Add stagger effect to nav items
      navItems.forEach((item, index) => {
          if (this.getAttribute('aria-expanded') === 'true') {
              item.style.transitionDelay = `${index * 0.1}s`;
          } else {
              item.style.transitionDelay = `${(navItems.length - index - 1) * 0.1}s`;
          }
      });
  });

  // Reset transitions when window is resized above mobile breakpoint
  window.addEventListener('resize', function() {
      if (window.innerWidth > 991) {
          navItems.forEach(item => {
              item.style.transitionDelay = '0s';
              item.style.transform = 'none';
              item.style.opacity = '1';
          });
      }
  });
});






// loader


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

// radio

document.addEventListener('DOMContentLoaded', function() {
  const tabButtons = document.querySelectorAll('.tab-btn');
  const sortSelect = document.querySelector('.sort-select');

  // Handle view switching
  tabButtons.forEach(button => {
      button.addEventListener('click', () => {
          // Remove active class from all buttons
          tabButtons.forEach(btn => btn.classList.remove('active'));
          // Add active class to clicked button
          button.classList.add('active');
          
          const view = button.dataset.view;
          // Add your view switching logic here
          console.log('Switching to', view, 'view');
      });
  });

  // Handle sorting
  sortSelect.addEventListener('change', (e) => {
      const sortValue = e.target.value;
      // Add your sorting logic here
      console.log('Sorting by', sortValue);
  });
});



// dropdown

document.addEventListener('DOMContentLoaded', function() {
  // Get all dropdown items
  const dropdownItems = document.querySelectorAll('.dropdown-item');
  
  dropdownItems.forEach(item => {
      item.addEventListener('click', function(e) {
          // Only prevent default if href is #
          if(this.getAttribute('href') === '#') {
              e.preventDefault();
          } else {
              // Allow navigation for real links
              window.location.href = this.getAttribute('href');
          }
      });
  });
});


// sort

