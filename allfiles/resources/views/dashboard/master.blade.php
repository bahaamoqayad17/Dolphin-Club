<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('dashboardassets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('siteassets/fonts/flaticon.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('dashboardassets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .table th,
        .table td {
            /* vertical-align: middle; */
        }

        textarea {
            resize: none
        }
    </style>
    @yield('styles')

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.index') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-swimmer"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.settings.index') }} ">
                    <i class="fas fa-cog"></i></i>
                    <span>{{ __('Settings') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-newspaper"></i>
                    <span>{{ __('Articles') }}</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="{{ route('dashboard.articles.index') }}">{{ __('All Articles') }}</a>
                        <a class="collapse-item"
                            href="{{ route('dashboard.articles.create') }}">{{ __('Create New Article') }}</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#services"
                    aria-expanded="true" aria-controls="services">
                    <i class="fas fa-users-cog"></i>
                    <span>{{ __('Services') }}</span>
                </a>
                <div id="services" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="{{ route('dashboard.services.index') }}">{{ __('All Services') }}</a>
                        <a class="collapse-item"
                            href="{{ route('dashboard.services.create') }}">{{ __('Create New Service') }}</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Trainers"
                    aria-expanded="true" aria-controls="Trainers">
                    <i class="fas fa-user-circle"></i>
                    <span>{{ __('Trainers') }}</span>
                </a>
                <div id="Trainers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="{{ route('dashboard.trainers.index') }}">{{ __('All Trainers') }}</a>
                        <a class="collapse-item"
                            href="{{ route('dashboard.trainers.create') }}">{{ __('Create New Trainer') }}</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Courses"
                    aria-expanded="true" aria-controls="Courses">
                    <i class="fab fa-discourse"></i>
                    <span>{{ __('Courses') }}</span>
                </a>
                <div id="Courses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="{{ route('dashboard.courses.index') }}">{{ __('All Courses') }}</a>
                        <a class="collapse-item"
                            href="{{ route('dashboard.courses.create') }}">{{ __('Create New Course') }}</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Products"
                    aria-expanded="true" aria-controls="Products">
                    <i class="fas fa-tag"></i>
                    <span>{{ __('Products') }}</span>
                </a>
                <div id="Products" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="{{ route('dashboard.products.index') }}">{{ __('All Products') }}</a>
                        <a class="collapse-item"
                            href="{{ route('dashboard.products.create') }}">{{ __('Create New Product') }}</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sliders"
                    aria-expanded="true" aria-controls="sliders">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ __('Sliders') }}</span>
                </a>
                <div id="sliders" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="{{ route('dashboard.sliders.index') }}">{{ __('All Sliders') }}</a>
                        <a class="collapse-item"
                            href="{{ route('dashboard.sliders.create') }}">{{ __('Create New Slider') }}</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Gallery"
                    aria-expanded="true" aria-controls="Gallery">
                    <i class="fas fa-image"></i>
                    <span>{{ __('Gallery') }}</span>
                </a>
                <div id="Gallery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="{{ route('dashboard.galleries.index') }}">{{ __('Gallery') }}</a>
                        <a class="collapse-item"
                            href="{{ route('dashboard.galleries.create') }}">{{ __('Add New Photo') }}</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Pictures"
                    aria-expanded="true" aria-controls="Pictures">
                    <i class="fas fa-camera"></i>
                    <span>{{ __('Pictures') }}</span>
                </a>
                <div id="Pictures" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('dashboard.pics.index') }}">{{ __('Pictures') }}</a>
                        <a class="collapse-item"
                            href="{{ route('dashboard.pics.create') }}">{{ __('Add New Picture') }}</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Testimonials"
                    aria-expanded="true" aria-controls="Testimonials">
                    <i class="fas fa-users"></i>
                    <span>{{ __('Testimonials') }}</span>
                </a>
                <div id="Testimonials" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="{{ route('dashboard.testimonials.index') }}">{{ __('All Testimonials') }}</a>
                        <a class="collapse-item"
                            href="{{ route('dashboard.testimonials.create') }}">{{ __('Add New Testimonial') }}</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.contacts.index') }} ">
                    <i class="fas fa-address-book"></i></i>
                    <span>{{ __('Contacts') }}</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('subscriptions.index') }} ">
                    <i class="fas fa-bell"></i></i>
                    <span>{{ __('Subscriptions') }}</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}</span>
                                <img class="img-profile rounded-circle"
                                    src="https://ui-avatars.com/api/?name={{ isset(Auth::user()->name) ? Auth::user()->name : '' }}&background=random">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('site.lang', 'ar') }}">
                                    {{ __('Arabic') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('site.lang', 'en') }}">
                                    {{ __('English') }}
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ config('app.name') }} 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{ __('Select Logout below if you are ready to end your current session') }}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button"
                        data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit()"
                        class="btn btn-primary" href="">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('dashboardassets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboardassets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('dashboardassets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dashboardassets/js/sb-admin-2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.2/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.tinytext',
            plugins: ['code']
        });
    </script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 7000,
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
