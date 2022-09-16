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
<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand">Aplikasi Perpustakaan Digital</a>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <button class="btn btn-info btn-md ml-2" onclick="location.href = '{{ route('home') }}';">Home</button>
                <button class="btn btn-info btn-md ml-2" onclick="location.href = '{{ route('dashboard') }}';">Dashboard</button>
                <button class="btn btn-info btn-md ml-2">Pinjaman</button>
            </div>
        </div>
    </nav>

    <div class="container">

        @yield('body')

    </div>

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
