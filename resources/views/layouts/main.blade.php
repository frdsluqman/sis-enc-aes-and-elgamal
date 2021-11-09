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

    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/css/app.css') }}">
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

                        <li class="sidebar-item ">
                            <a href="{{ route('logout') }}" class="btn d-grid btn-danger text-white" target="_blank"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-content">
                <section class="row">
                    @yield('content')
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">

                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('mazer/dist/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('mazer/dist/assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('mazer/dist/assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('mazer/dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{ asset('mazer/dist/assets/js/main.js') }}"></script>

</body>

</html>