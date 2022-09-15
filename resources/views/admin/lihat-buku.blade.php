@extends('layouts.admin-layout')

@section('title', 'Beranda')

@push('css')
    
@endpush

@section('main-header', 'Profile - Pengguna')

@section('main-content')

<div class="row mx-auto">
    <div class="col-sm-2 col-md-2 col-lg-2">
        {{-- ​<img src="{{ asset('assets/default-avatar.jpg') }}" class="img-fluid img-thumbnail" width="200px"> --}}
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
        <P class="text-dark"> 
            Judul Buku <br>
            Kode Buku <br>
            Kategori <br>
            Penulis <br>
            Penerbit <br>                                
            Tahun Terbit <br>                                
            Jumlah Halaman <br>                                
        </P>    
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <p class="text-dark">
            : {{ $buku->buku_judul }} <br>
            : {{ $buku->buku_kodekategori }} <br>
            : {{ $buku->kategori->kategori_nama }} <br>
            : {{ $buku->buku_penulis }} <br>
            : {{ $buku->buku_penerbit }} <br>
            : {{ $buku->buku_tahunterbit }} <br>
            : {{ $buku->buku_jumlahhalaman }} <br>
            {{-- : <span class="badge badge-success">{{ $buku->login_status }}</span> --}}
        </p>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">

    </div>
</div>

@endsection



@push('js')
    
@endpush