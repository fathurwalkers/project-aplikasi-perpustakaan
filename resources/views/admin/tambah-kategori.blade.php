@extends('layouts.admin-layout')

@section('title', 'Halaman Tambah Kategori')

@push('css')
    
@endpush

@section('main-header', 'Tambah Kategori')

@section('main-content')

{{-- <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h4 class="text-bold text-dark">Tambah Data Buku</h4>
    </div>
</div> --}}
<form action="{{ route('post-tambah-kategori') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="kategori_nama" class="text-bold text-dark"><span style="color:#ff0000">* </span>Nama Kategori : </label>
                <input type="text" class="form-control text-bold text-dark border-1 border-dark" id="kategori_nama" aria-describedby="kategori_nama" placeholder="Masukkan Nama Kategori..." name="kategori_nama" autofocus>
                <small id="kategori_nama" class="form-text text-muted text-bold text-dark">Contoh : Teknologi dan Informasi </small>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="kategori_kode" class="text-bold text-dark"><span style="color:#ff0000">* </span>Kode Kategori : </label>
                <input type="text" class="form-control text-bold text-dark border-1 border-dark" id="kategori_kode" aria-describedby="kategori_kode" placeholder="Masukkan Kode Kategori..." name="kategori_kode">
                <small id="kategori_kode" class="form-text text-muted text-bold text-dark">Contoh : 700</small>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-md btn-success border-dark shadow">KONFIRMASI</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                        <small id="" class="form-text text-muted text-bold text-dark">Tekan tombol "KONFIRMASI" untuk menyelesaikan proses input data Kategori baru.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

@endsection



@push('js')
    
@endpush