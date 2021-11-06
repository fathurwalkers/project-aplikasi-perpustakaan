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
            
            {{-- @foreach ($buku->kategori as $item)
                @if ($item->kategori_nama == null)
                    : TIDAK ADA KATEGORI <br>
                @else
                    : {{ $item->kategori_nama }} <br>
                @endif

            @endforeach --}}
            {{-- @php
                $kategoriBuku = KategoriBuku::where('buku_id', $buku->id)->first();
            @endphp --}}
            : {{ $kategoriBuku->kategori->kategori_nama }}
            
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