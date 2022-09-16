@extends('layouts.home-layout')

@section('title', 'Home')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('css')
<style>
    .card-subtitle {
        color: black!important;
        font-size: 105%!important;
    }
    .fontubah {
        color: rgb(48, 48, 48)!important;
        font-size: 90%!important;
    }
</style>
@endpush

@section('body')

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
        <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
            <div class="card h-100 w-100" style="s">
                <div class="card-body">
                    {{-- <h5 class="card-title">{{ $item->buku_judul }}</h5> --}}
                    <h6 class="card-subtitle mb-2 text-muted text-dark text-center">{{ $item->buku_judul }}</h6>

                    <table>
                        <tr>
                            <td class="fontubah">Penulis </td>
                            <td class="fontubah">&nbsp; : {{ $item->buku_penulis }}</td>
                        </tr>
                        <tr>
                            <td class="fontubah">Penerbit </td>
                            <td class="fontubah">&nbsp;: {{ $item->buku_penerbit }}</td>
                        </tr>
                        <tr>
                            <td class="fontubah">Tahun Terbit </td>
                            <td class="fontubah">&nbsp;: {{ $item->buku_tahunterbit }}</td>
                        </tr>
                        <tr>
                            <td class="fontubah">Jumlah Halaman </td>
                            <td class="fontubah">&nbsp;: {{ $item->buku_jumlahhalaman }} Halaman</td>
                        </tr>
                        <tr>
                            <td class="fontubah">Total Peminjam </td>
                            <td class="fontubah">&nbsp;: {{ $item->buku_support_rekomendasi }} Kali di pinjam</td>
                        </tr>
                        <tr>
                            <td class="fontubah">Kode Kategori </td>
                            <td class="fontubah">&nbsp;: {{ $item->buku_kodekategori }}</td>
                        </tr>
                        <tr>
                            <td class="fontubah">Kategori </td>
                            <td class="fontubah">&nbsp;: {{ $item->kategori->kategori_nama }}</td>
                        </tr>
                    </table>

                    {{-- <div class="row"> --}}
                        {{-- <div class="col-sm-12 col-md-12 col-lg"> --}}
                            {{-- <button class="btn btn-sm rounded btn-info float-left">Selengkapnya</button> --}}
                            {{-- <button class="btn btn-sm rounded btn-success btn-block mt-auto">Tambah Pinjaman</button> --}}
                        {{-- </div> --}}
                    {{-- </div> --}}
                </div>
                <button class="btn btn-md rounded btn-success mt-auto mx-4 mb-3" value="{{ $item->id }}">Tambah Pinjaman</button>
            </div>
        </div>
    @endforeach
</div>

@endsection

@push('js')

<script>
    let array_pinjaman = [];
    var token = $('meta[name="csrf-token"]').attr('content');
    $("button").click(function() {
        var pinjaman = $(this).val();
        array_pinjaman.push(pinjaman);
        console.log(array_pinjaman);
        console.log(pinjaman);
    });

    $('#sendrequest').click(
        $.ajax({
            'type':'POST',
            'data': ({
                _token : $('input[name="_token"]').val(),
                buku_id : array_pinjaman
            }),
            'url':'{{ route('post-tambah-pinjaman') }}',
        })
    );
</script>

@endpush
