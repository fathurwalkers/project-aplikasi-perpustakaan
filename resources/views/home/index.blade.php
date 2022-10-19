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
        <form action="{{ route('post-tambah-pinjaman') }}" method="post">
            @csrf
            <input type="hidden" name="id_buku" value="">
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
            <form action="{{ route('post-search') }}" enctype="multipart/form-data" method="POST" onsubmit="return false;">
                @csrf
                <input type="text" class="form-control" id="searchbox" placeholder="Contoh : Buku Bahasa Indonesia" name="search">
            </form>
        </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
    </div>
</div>
<div class="row mt-2" id="displaycontainer">

    @foreach ($buku as $item)
    <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
        <div class="card h-100 w-100" style="s">
            <div class="card-body">
                {{-- <h5 class="card-title">{{ $item->buku_judul }}</h5> --}}
                <h6 class="card-subtitle mb-2 text-muted text-dark text-center bukujudul">{{ $item->buku_judul }}</h6>

                <table>
                    <tr>
                        <td class="fontubah">Penulis </td>
                        <td class="fontubah bukupenulis">&nbsp; : {{ $item->buku_penulis }}</td>
                    </tr>
                    <tr>
                        <td class="fontubah">Penerbit </td>
                        <td class="fontubah bukupenerbit">&nbsp;: {{ $item->buku_penerbit }}</td>
                    </tr>
                    <tr>
                        <td class="fontubah">Tahun Terbit </td>
                        <td class="fontubah bukutahunterbit">&nbsp;: {{ $item->buku_tahunterbit }}</td>
                    </tr>
                    <tr>
                        <td class="fontubah">Jumlah Halaman </td>
                        <td class="fontubah bukujumlahhalaman">&nbsp;: {{ $item->buku_jumlahhalaman }} Halaman</td>
                    </tr>
                    <tr>
                        <td class="fontubah">Total Peminjam </td>
                        <td class="fontubah bukutotalpinjam">&nbsp;: {{ $item->buku_support_rekomendasi }} Kali di pinjam
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

                                @case($item->buku_support_rekomendasi >= 21 && $item->buku_support_rekomendasi <= 40 )
                                <span class="badge badge-warning py-auto" id="">
                                    Terpopuler
                                </span>
                                    @break

                                @case($item->buku_support_rekomendasi >= 41 && $item->buku_support_rekomendasi <= 60 )
                                <span class="badge badge-success py-auto" id="">
                                    Paling Populer
                                </span>
                                    @break

                                @case($item->buku_support_rekomendasi >= 61 && $item->buku_support_rekomendasi <= 100 )
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
                    {{-- <tr>
                        <td class="fontubah">Kategori </td>
                        <td class="fontubah">&nbsp;: {{ $item->kategori->kategori_nama }}</td>
                    </tr> --}}
                </table>
            </div>
            <button class="btn btn-md rounded btn-success mt-auto mx-4 mb-3 counters bukuid" value="{{ $item->id }}">Tambah Pinjaman</button>
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
        $token = $('input[name="_token"]').val();
        $.ajax({
            type : 'POST',
            url : '{{route('post-search')}}',
            data: {
                '_token' :$token,
                'search':$value,
            },
            success:function(data) {

                let buku_ukuran = data.buku.length;
                console.log(buku_ukuran);
                var output = '';
                if (buku_ukuran == 0) {
                    output += '<div class="row d-flex justify-content-center mx-auto">';
                    output += '    <div class="col-sm-12 col-md-12 col-lg-12">';
                    output += '        <h2> Buku yang anda cari tidak ditemukan. </h2>';
                    output += '    </div>';
                    output += '</div>';
                    $('#displaycontainer').html(output);
                } else {
                    for (let i = 0; i < buku_ukuran; i++) {
                        let buku_get = data.buku[i];

                        output += '<div class="col-sm-6 col-md-6 col-lg-6 mb-4">';
                        output += '<div class="card h-100 w-100" style="s">';
                        output += '<div class="card-body">';
                        output += '<h6 class="card-subtitle mb-2 text-muted text-dark text-center bukujudul">'+buku_get['buku_judul']+'</h6>';
                        output += '<table>';
                        output += '     <tr>';
                        output += '     <td class="fontubah">Penulis </td>';
                        output += '                  <td class="fontubah bukupenulis">&nbsp; : '+buku_get['buku_penulis']+'</td>';
                        output += '        </tr>';
                        output += '        <tr>';
                        output += '            <td class="fontubah">Penerbit </td>';
                        output += '            <td class="fontubah bukupenerbit">&nbsp;: '+buku_get['buku_penerbit']+'</td>';
                        output += '        </tr>';
                        output += '            <tr>';
                        output += '                <td class="fontubah">Tahun Terbit </td>';
                        output += '                <td class="fontubah bukutahunterbit">&nbsp;: '+buku_get['buku_tahunterbit']+'</td>';
                        output += '            </tr>';
                        output += '            <tr>';
                        output += '                <td class="fontubah">Jumlah Halaman </td>';
                        output += '                <td class="fontubah bukujumlahhalaman">&nbsp;: '+buku_get['buku_jumlahhalaman']+' Halaman</td>';
                        output += '            </tr>';
                        output += '            <tr>';
                        output += '                <td class="fontubah">Total Peminjam </td>';
                        output += '<td class="fontubah bukutotalpinjam">&nbsp;: '+buku_get['buku_support_rekomendasi']+' Kali di pinjam';

                        if (buku_get['buku_support_rekomendasi'] <= 10) {
                            output += '<span class="badge badge-primary py-auto" id="">';
                            output += ' Rekomendasi';
                            output += '</span>';
                        }

                        if (buku_get['buku_support_rekomendasi'] >= 11 && buku_get['buku_support_rekomendasi'] <= 20) {
                            output += '<span class="badge badge-secondary py-auto" id="">';
                            output += ' Populer';
                            output += '</span>';
                        }

                        if (buku_get['buku_support_rekomendasi'] >= 21 && buku_get['buku_support_rekomendasi'] <= 40) {
                            output += '<span class="badge badge-warning py-auto" id="">';
                            output += ' Terpopuler';
                            output += '</span>';
                        }

                        if (buku_get['buku_support_rekomendasi'] >= 41 && buku_get['buku_support_rekomendasi'] <= 60) {
                            output += '<span class="badge badge-success py-auto" id="">';
                            output += ' Paling Populer';
                            output += '</span>';
                        }

                        if (buku_get['buku_support_rekomendasi'] >= 61 && buku_get['buku_support_rekomendasi'] <= 100) {
                            output += '<span class="badge badge-danger py-auto" id="">';
                            output += ' Paling Diminati';
                            output += '</span>';
                        }

                        output += '</td>';
                        output += '</tr>';
                        output += '<tr>';
                        output += '    <td class="fontubah">Kode Kategori </td>';
                        output += '     <td class="fontubah">&nbsp;: '+buku_get['buku_kodekategori']+'</td>';
                        output += ' </tr>';
                        // output += '  <tr>';
                        // output += '      <td class="fontubah">Kategori </td>';
                        // output += '      <td class="fontubah">&nbsp;: '+data.kategori[buku_get['kategori_id']]['kategori_nama']+'</td>';
                        // output += '  </tr>';
                        output += '</table>';
                        output += '</div>';
                        output += '<button class="btn btn-md rounded btn-success mt-auto mx-4 mb-3 counters bukuid" value="{{ $item->id }}">Tambah Pinjaman</button>';
                        output += '</div>';
                        output += '</div>';

                        $('#displaycontainer').html(output);
                    }
                }
            }
        });
    })
</script>

@endpush
