@extends('layouts.home-layout')

@section('title', 'Home')

@push('css')
<style>
    .card-subtitle {
        color: black!important;
        font-size: 105%!important;
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
        <div class="col-sm-4 col-md-4 col-lg-4 mb-4 d-flex align-items-stretch">
            <div class="card" style="s">
                <div class="card-body">
                    {{-- <h5 class="card-title">{{ $item->buku_judul }}</h5> --}}
                    <h6 class="card-subtitle mb-2 text-muted text-dark">{{ $item->buku_judul }}</h6>
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

@endsection
