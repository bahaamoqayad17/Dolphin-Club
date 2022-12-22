<!doctype html>
@if (app()->isLocale('ar'))
    <html lang="ar" dir="rtl">
@else
    <html lang="en">
@endif

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap RTL CSS -->

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
    @if (app()->isLocale('ar'))
        <link rel="stylesheet" href="{{ asset('siteassets/css/rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('siteassets/css/bootstrap.rtl.min.css') }}">
    @endif
    @if (app()->isLocale('en'))
        <link rel="stylesheet" href="{{ asset('siteassets/css/bootstrap.min.css') }}">
    @endif

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('siteassets/img/dolphin.png') }}">
    <style>
        .swal2-title {
            color: #000 !important;
        }

        .pagination {
            justify-content: center;
        }
    </style>
    @yield('styles')
</head>

<body>
    <!-- Start Preloader -->
    {{-- <div class="preloader">
        <div class="preloader-wave"></div>
    </div> --}}
    <!-- End Preloader -->

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="{{ route('site.index') }}" class="logo">
                <img src="{{ asset('siteassets/img/dolphin.png') }}" alt="Logo">
            </a>
        </div>
        @php
            $locale = App::getLocale();
        @endphp
        <!-- Menu For Desktop Device -->
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light ">
                    <a class="navbar-brand" href="{{ route('site.index') }}">
                        <img width="250" src="{{ asset('siteassets/img/dolphin.png') }}" alt="Logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="{{ route('site.index') }}" class="nav-link active">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('site.about') }}" class="nav-link">
                                    {{ __('About') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('site.services') }}" class="nav-link">
                                    {{ __('Services') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('site.courses') }}" class="nav-link">
                                    {{ __('Courses') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('site.news') }}" class="nav-link">
                                    {{ __('Articles') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('subscriptions.create') }}" class="nav-link">
                                    {{ __('Subscription') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('site.testimonials') }}" class="nav-link">
                                    {{ __('Testimonials') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('site.gallery') }}" class="nav-link">
                                    {{ __('Gallery') }}
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->
    @yield('content')
    <!-- Footer Area -->
    <footer class="footer-area">
        <div class="footer-top pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="footer-content">
                            <div class="footer-conten-title">
                                <a href="#home"><img src="{{ asset('siteassets/img/dolphin-logo-white.png') }}"
                                        alt="Logo"></a>
                                <p>
                                    {{ __('We are not the only but we are the best') }}
                                </p>
                            </div>

                            <div class="footer-social">
                                <ul>
                                    <li>
                                        <a href="{{ isset($data['contact']['value']['facebook']) ? $data['contact']['value']['facebook'] : '' }}"
                                            target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ isset($data['contact']['value']['tiktok']) ? $data['contact']['value']['tiktok'] : '' }}"
                                            target="_blank">
                                            <i class="fab fa-tiktok"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ isset($data['contact']['value']['instagram']) ? $data['contact']['value']['instagram'] : '' }}"
                                            target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:{{ isset($data['contact']['value']['email']) ? $data['contact']['value']['email'] : '' }}"
                                            target="_blank">
                                            <i class="fa-brands fa-google"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <div class="footer-list">
                            <h3>{{ __('Language') }}</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('site.lang', 'ar') }}">{{ __('Arabic') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.lang', 'en') }}">{{ __('English') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-list ml-50">
                            <h3>{{ __('Quick Links') }}</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('subscriptions.create') }}">{{ __('Subscribe Here') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.services') }}">{{ __('Services') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.about') }}">{{ __('About') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.gallery') }}">{{ __('Gallery') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.testimonials') }}">{{ __('Testimonials') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.shop') }}">{{ __('Products') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-list">
                            <h3>{{ __('Contacts') }}</h3>
                            <ul>
                                <li>
                                    <a
                                        href="http://wa.me/{{ isset($data['contact']['value']['whatsapp']) ? $data['contact']['value']['whatsapp'] : '' }}">
                                        <i class="fab fa-whatsapp"></i>
                                        {{ isset($data['contact']['value']['whatsapp']) ? $data['contact']['value']['whatsapp'] : '' }}
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        <i class="fas fa-mobile-alt"></i>
                                        {{ isset($data['contact']['value']['number']) ? $data['contact']['value']['number'] : '' }}
                                    </a>
                                </li>

                                <li>
                                    <a
                                        href="mailto:{{ isset($data['contact']['value']['email']) ? $data['contact']['value']['email'] : '' }}">
                                        <i class="far fa-envelope"></i>
                                        {{ isset($data['contact']['value']['email']) ? $data['contact']['value']['email'] : '' }}
                                    </a>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ isset($data['contact']['value']['location'][$locale]) ? $data['contact']['value']['location'][$locale] : '' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="bottom-list">
                            <ul>
                                <li>
                                    <a href="#home">{{ __('Home') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.news') }}">{{ __('Articles') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('site.contact') }}">{{ __('Contact') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}" class="nav-link">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                                @auth
                                    @if (Auth::user()->type !== 'user')
                                        <li>
                                            <a href="{{ route('dashboard.settings.index') }}" class="nav-link">
                                                {{ __('Dashboard') }}
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if (session('msg'))
            Toast.fire({
                icon: '{{ session('type') }}',
                title: '{{ __(session('msg')) }}'
            })
        @endif
    </script>
    @yield('scripts')
</body>

</html>
