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
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-2 d-flex justify-content-end border border-1 py-2">
        {{-- <h5 class="my-auto mr-2">
            Total Keranjang Peminjaman : 0
        </h5> --}}
        <form action="{{ route('post-tambah-pinjaman') }}" method="post">
            @csrf
            <input type="hidden" name="id_buku" value="">
            {{-- <button class="btn btn-info btn-md ml-2" id="sendrequest">Pinjam Sekarang</button> --}}
            <button class="btn btn-info btn-md ml-2" id="sendrequest">
                Total Keranjang Peminjaman :
                <span class="badge badge-light py-auto counterbadges" id="counterbadges">0</span>
            </button>
        </form>
    </div>
</div>
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
            <form action="{{ route('post-search') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="text" class="form-control" id="searchbox" placeholder="Contoh : Buku Bahasa Indonesia" name="search">
            </form>
        </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
    </div>
    {{-- <div class="col-sm-2 col-md-2 col-lg-2">
        <button type="submit" class="btn btn-md btn-info btn-block">Cari</button>
    </div> --}}
</div>
<div class="row mt-2" id="displaycontainer">

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
                        <td class="fontubah">&nbsp;: {{ $item->buku_support_rekomendasi }} Kali di pinjam
                            @switch($item->buku_support_rekomendasi)

                                @case($item->buku_support_rekomendasi <= 10)
                                <span class="badge badge-primary py-auto" id="">
                                    Rekomendasi
                                </span>
                                    @break

                                @case($item->buku_support_rekomendasi >= 11 && $item->buku_support_rekomendasi <= 20 )
                                <span class="badge badge-secondary py-auto" id="">
                                    Populer
                                </span>
                                    @break

                                @case($item->buku_support_rekomendasi >= 21 && $item->buku_support_rekomendasi < 40 )
                                <span class="badge badge-warning py-auto" id="">
                                    Terpopuler
                                </span>
                                    @break

                                @case($item->buku_support_rekomendasi >= 41 && $item->buku_support_rekomendasi < 60 )
                                <span class="badge badge-success py-auto" id="">
                                    Paling Populer
                                </span>
                                    @break

                                @case($item->buku_support_rekomendasi >= 61 && $item->buku_support_rekomendasi < 100 )
                                <span class="badge badge-lg badge-danger py-auto" id="">
                                    Paling diminati
                                </span>
                                    @break

                            @endswitch
                        </td>
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
            <button class="btn btn-md rounded btn-success mt-auto mx-4 mb-3 counters" value="{{ $item->id }}">Tambah Pinjaman</button>
        </div>
    </div>
    @endforeach

</div>

@endsection

@push('js')

<script>
    let array_pinjaman = [];
    var token = $('meta[name="csrf-token"]').attr('content');

    var count = 0;
    var counterbadges = document.getElementById("counterbadges");

    $('.counters').click(function(){
        count++;
        counterbadges.innerHTML = count;
    });

    $("button").click(function() {
        var pinjaman = $(this).val();
        array_pinjaman.push(pinjaman);
        console.log(array_pinjaman);
        console.log(pinjaman);
    });

    $('#sendrequest').click(function() {
        $('input:hidden[name=id_buku]').val(array_pinjaman);

    });

    // Live Search Function
    $('#searchbox').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'POST',
            url : '{{route('post-search')}}',
            data:{
                '_token' : '{{ csrf_token() }}',
                'search':$value,
            },
            success:function(data) {
                $('tbody').html(data);
            }
        });
    })
</script>

@endpush
