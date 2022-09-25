<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Perpustakaan - @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/panel') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/panel') }}/css/sb-admin-2.min.css" rel="stylesheet">

    {{-- DataTables  --}}
    <link href="{{ asset('assets/datatables') }}/datatables.min.css" rel="stylesheet">

    @stack('css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> PENELUSURAN BUKU</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>BERANDA</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Profile Pengguna</span></a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tentang Dinas</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Navigasi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola Buku</span>
                </a>
                <div id="collapseOne" class="collapse Show" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Navigasi Buku :</h6>
                        {{-- <a class="collapse-item" href="{{ route('lihat-buku') }}">Profil Buku</a> --}}
                        <a class="collapse-item" href="{{ route('daftar-buku') }}">Daftar Buku</a>
                        {{-- <a class="collapse-item" href="CariBuku.html">Cari Buku</a> --}}
                        <a class="collapse-item" href="{{ route('tambah-buku') }}">Tambah Buku</a>

                        @if ($users->login_level == 'admin')
                        <h6 class="collapse-header">Navigasi Kategori :</h6>
                        <a class="collapse-item" href="{{ route('daftar-kategori') }}">Daftar Kategori</a>
                        <a class="collapse-item" href="{{ route('tambah-kategori') }}">Tambah Kategori</a>
                        @endif
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            @if ($users->login_level == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Kelola Pengguna</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('daftar-pengguna') }}">Daftar Pengguna</a>
                        </div>
                    </div>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Pinjaman</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTheree"
                    data-parent="#accordionSidebar">
                    <div class="bg-white e py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('daftar-pinjaman') }}">Daftar Pinjaman</a>
                        <a class="collapse-item" href="{{ route('tambah-pinjaman') }}">Tambah Pinjaman</a>
                        @if ($users->login_level == 'admin')
                        <a class="collapse-item" href="{{ route('daftar-laporan') }}">Laporan</a>
                        @endif
                    </div>
                </div>
            </li>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <a href="#" class="btn btn-sm btn-danger my-2 d-flex justify-content-center mx-2" data-toggle="modal" data-target="#logoutModal1">
                        Keluar
                    </a>
                </div>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                    <div class="sidebar-brand-text text-primary font-weight-bold mx-3">SISTEM REKOMENDASI PENULUSURAN BUKU</div>

                <!-- Topbar Navbar -->
                </nav>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card">
                        {{-- Card Header  --}}
                        <div class="card-header">

                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <h1 class="h5 text-bold text-dark font-weight-bold">@yield('main-header')</h1>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                                    <form action="{{ route('dashboard') }}" method="GET">
                                        <button type="submit" class="btn btn-sm rounded btn-info text-bold shadow btn-outline-dark text-white">Kembali</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Card Body  --}}
                        <div class="card-body">
                            @yield('main-content')
                        </div>
                    </div>
                    <!-- Page Heading -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            {{-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer> --}}
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
    <div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin keluar dari panel ini?</div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" data-dismiss="modal">Tidak</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/panel') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/panel') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/panel') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/panel') }}/js/sb-admin-2.min.js"></script>

    {{-- DataTables  --}}
    <script src="{{ asset('assets/datatables') }}/datatables.min.js"></script>

    @stack('js')

</body>

</html>
