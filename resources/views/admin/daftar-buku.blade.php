@extends('layouts.admin-layout')

@section('title', 'Daftar Buku')

@push('css')
    {{--  --}}
@endpush

@section('main-header', 'Daftar Buku')

@section('main-content')
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        @if (session('berhasil_tambah'))
            <div class="alert alert-success">
                {{ session('berhasil_tambah') }}
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <table id="table1" class="table table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <td class="text-center">No</td>
                    <td class="">Judul Buku</td>
                    <td class="">Kode Buku</td>
                    <td class="">Penulis</td>
                    <td class="">Penerbit</td>
                    <td class="">Tahun Terbit</td>
                    <td class="">Kategori</td>
                    <td class="">Aksi</td>
                </tr>
            </thead>
            
            <tbody class="text-dark">

                @foreach ($buku as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->buku_judul }}</td>
                        <td class="text-center">{{ $item->buku_kodekategori }}</td>
                        <td>{{ $item->buku_penulis }}</td>
                        <td>{{ $item->buku_penerbit }}</td>
                        <td class="text-center">{{ $item->buku_tahunterbit }}</td>
                        @foreach ($item->kategori as $kategori_buku)
                            <td>{{ $kategori_buku->kategori_nama }}</td>
                        @endforeach
                        <td>
                            <div class="row mx-auto d-flex justify-content-center">
                                <button class="btn btn-sm btn-info rounded mr-1">Lihat</button>
                                <button class="btn btn-sm btn-primary rounded mr-1">Edit</button>
                                <button class="btn btn-sm btn-danger rounded">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            
        </table>

    </div>
</div>

@endsection



@push('js')
<script>
    $(document).ready( function () {
        $('#table1').DataTable();
    } );
</script>
@endpush