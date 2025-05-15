<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMark Recruitment</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/fav.png">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css//owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    @stack('css')
</head>

<body>

    <!-- loader -->
    <div class="loader">
        <div class="loader-content">
            <img src="assets/img/fav.png" alt="Loader" class="loader-icon">
        </div>
    </div>
    <!-- loader -->

    <!-- to top -->
    <button id="back-to-top" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <!-- to top -->

    @include('website.layout.header')


    @yield('content')


    @include('website.layout.footer')



    <!-- main-body -->


    <!-- Place these scripts right before closing body tag -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/font-awsome.js"></script>
    <!-- Other scripts can follow -->
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="assets/js/lenis.min.js"></script>
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
    
    @stack('js')
</body>

</html>
