@extends('layouts.admin-layout')

@section('title', 'Halaman Buat Pinjaman')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
@endpush

@section('main-header', 'Buat Pinjaman')

@section('main-content')

{{-- <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h4 class="text-bold text-dark">Tambah Data Buku</h4>
    </div>
</div> --}}
<form action="{{ route('post-tambah-pinjaman') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="pinjaman_pengguna" class="text-bold text-dark"><span style="color:#ff0000">* </span>Nama Peminjam : </label>
                <input type="text" class="form-control text-bold text-dark border-1 border-dark" id="pinjaman_pengguna" aria-describedby="pinjaman_pengguna" placeholder="Masukkan Nama Kategori..." value="{{ $users->login_nama }}" name="pinjaman_pengguna" readonly>
                <small id="pinjaman_pengguna" class="form-text text-muted text-bold text-dark">Contoh : Teknologi dan Informasi </small>
            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6"> 
            <label for="id_buku" class="text-bold text-dark"><span style="color:#ff0000">* </span>Pilih Buku : </label>
            <select id="choices-multiple-remove-button" placeholder="Pilih buku yang akan dipinjam..." name="id_buku[]" multiple>
                @foreach ($buku as $item)
                    <option value="{{ $item->id }}">{{ $item->buku_judul }}</option>
                @endforeach
            </select> 
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
    <script>
        $(document).ready(function(){
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:100,
            searchResultLimit:100,
            renderChoiceLimit:100
            });
        });
    </script>
@endpush