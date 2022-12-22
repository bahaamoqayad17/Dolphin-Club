<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap RTL CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/bootstrap.rtl.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('siteassets/css/owl.theme.default.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/magnific-popup.css') }}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/animate.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/fonts/flaticon.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/nice-select.min.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/fontawesome.min.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/meanmenu.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/responsive.css') }}">
    <!-- Theme Drak CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/theme-dark.css') }}">
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{ asset('siteassets/css/rtl.css') }}">
</head>

<body>
    <!-- Start Preloader -->
    <div class="preloader">
        <div class="preloader-wave"></div>
    </div>
    <!-- End Preloader -->

    <!-- Start 404 Error -->
    <div class="error-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="error-content">
                    <h1>4 <span>0</span> 4</h1>
                    <h3>{{ __('Oops! Page Not Found') }}</h3>
                    <p>{{ __('The page you are looking for might have been removed had its name changed or is temporarily unavailable') }}
                    </p>
                    <a href="{{ route('site.index') }}" class="default-btn1 page-btn">
                        {{ __('Return To Home Page') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 Error -->

    <!-- Jquery Min JS -->
    <script src="{{ asset('siteassets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Bundle Min JS -->
    <script src="{{ asset('siteassets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('siteassets/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('siteassets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Meanmenu JS -->
    <script src="{{ asset('siteassets/js/meanmenu.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('siteassets/js/jquery.nice-select.min.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('siteassets/js/wow.min.js') }}"></script>
    <!-- Ajaxchimp Min JS -->
    <script src="{{ asset('siteassets/js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Form Validator Min JS -->
    <script src="{{ asset('siteassets/js/form-validator.min.js') }}"></script>
    <!-- Contact Form JS -->
    <script src="{{ asset('siteassets/js/contact-form-script.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('siteassets/js/custom.js') }}"></script>

</body>

</html>
