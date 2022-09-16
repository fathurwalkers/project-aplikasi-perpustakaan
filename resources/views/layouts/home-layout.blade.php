<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Perpustakaan - Home</title>

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
                <button class="btn btn-info btn-md ml-2">Home</button>
                <button class="btn btn-info btn-md ml-2">Dashboard</button>
                <button class="btn btn-info btn-md ml-2">Pinjaman</button>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row mt-4">
            <div class="col-sm-2 col-md-2 col-lg-2">
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 float-center d-flex justify-content-center">
                            <h4>
                                Cari Buku apa ?
                            </h4>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="searchbox" placeholder="Contoh : Buku Bahasa Indonesia">
                </div>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
            </div>
            {{-- <div class="col-sm-2 col-md-2 col-lg-2">
                <button type="submit" class="btn btn-md btn-info btn-block">Cari</button>
            </div> --}}
        </div>
        <div class="row mt-2">
            @foreach ($buku as $item)
                <div class="col-sm-4 col-md-4 col-lg-4 mb-4 d-flex align-items-stretch">
                    <div class="card" style="s">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->buku_judul }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg">
                                    <button class="btn btn-sm rounded btn-info float-left">Selengkapnya</button>
                                    <button class="btn btn-sm rounded btn-success float-right">Tambah Pinjaman</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

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
