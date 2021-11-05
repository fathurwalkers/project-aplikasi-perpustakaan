@extends('layouts.admin-layout')

@section('title', 'Halaman Tambah Buku')

@push('css')
    
@endpush

@section('main-header', 'Tambah Buku')

@section('main-content')

{{-- <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h4 class="text-bold text-dark">Tambah Data Buku</h4>
    </div>
</div> --}}
<form action="{{ route('post-tambah-buku') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="buku_judul" class="text-bold text-dark"><span style="color:#ff0000">* </span>Judul Buku : </label>
                <input type="text" class="form-control text-bold text-dark border-1 border-dark" id="buku_judul" aria-describedby="buku_judul" placeholder="Masukkan judul buku..." name="buku_judul" autofocus>
                <small id="buku_judul" class="form-text text-muted text-bold text-dark">Contoh : Teknologi Informasi Dasar </small>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="buku_penulis" class="text-bold text-dark"><span style="color:#ff0000">* </span>Penulis : </label>
                <input type="text" class="form-control text-bold text-dark border-1 border-dark" id="buku_penulis" aria-describedby="buku_penulis" placeholder="Masukkan judul buku..." name="buku_penulis" autofocus>
                <small id="buku_penulis" class="form-text text-muted text-bold text-dark">Contoh : Muh. Radit</small>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="buku_penerbit" class="text-bold text-dark"><span style="color:#ff0000">* </span>Penerbit : </label>
                <input type="text" class="form-control text-bold text-dark border-1 border-dark" id="buku_penerbit" aria-describedby="buku_penerbit" placeholder="Masukkan judul buku..." name="buku_penerbit" autofocus>
                <small id="buku_penerbit" class="form-text text-muted text-bold text-dark">Contoh : Smart Media Inc.</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="buku_tahunterbit" class="text-bold text-dark"><span style="color:#ff0000">* </span>Tahun Terbit : </label>
                <input type="number" class="form-control text-bold text-dark border-1 border-dark" id="buku_tahunterbit" aria-describedby="buku_tahunterbit" placeholder="Masukkan judul buku..." name="buku_tahunterbit" autofocus>
                <small id="buku_tahunterbit" class="form-text text-muted text-bold text-dark">Contoh : 2015</small>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="buku_jumlahhalaman" class="text-bold text-dark"><span style="color:#ff0000">* </span>Jumlah Halaman : </label>
                <input type="number" class="form-control text-bold text-dark border-1 border-dark" id="buku_jumlahhalaman" aria-describedby="buku_jumlahhalaman" placeholder="Masukkan judul buku..." name="buku_jumlahhalaman" autofocus>
                <small id="buku_jumlahhalaman" class="form-text text-muted text-bold text-dark">Contoh : 254</small>
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
                        <small id="" class="form-text text-muted text-bold text-dark">Tekan tombol "KONFIRMASI" untuk menyelesaikan proses input data buku baru.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

@endsection



@push('js')
    
@endpush