<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/iconly/bold.css') }}">
    <link rel="shortcut icon" href="{{ asset('mazer/dist/assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('mazer/dist/assets/images/logo/logo.png') }}"
                                    alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->is('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('index-kecamatan') ? 'active' : '' }}">
                            <a href="{{ route('index-kecamatan') }}" class='sidebar-link'>
                                <i class="bi bi-door-open-fill"></i>
                                <span>Kecamatan</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('index-kelurahan') ? 'active' : '' }}">
                            <a href="{{ route('index-kelurahan') }}" class='sidebar-link'>
                                <i class="bi bi-house-fill"></i>
                                <span>Kelurahan</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('index-dpt') ? 'active' : '' }}">
                            <a href="{{ route('index-dpt') }}" class='sidebar-link'>
                                <i class="bi bi-folder-symlink-fill"></i>
                                <span>DPT</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('index-user') ? 'active' : '' }}">
                            <a href="{{ route('index-user') }}" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>User</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('foto') }}//{{ Auth::user()->foto }}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ Auth::user()->name }}</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('profile-user') }}"><i
                                                class="icon-mid bi bi-person me-2"></i>Profil Saya</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            class="btn d-grid btn-danger text-white" target="_blank" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">

                            </div>

                        </div>
                    </div>
                    <section class="section">
                        @yield('content')
                    </section>
                </div>

                <footer>

                </footer>
            </div>
        </div>
    </div>
    <script src="{{ asset('mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('mazer/dist/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('mazer/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="{{ asset('mazer/dist/assets/js/main.js') }}"></script>
</body>

</html>