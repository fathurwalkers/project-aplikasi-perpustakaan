@extends('layouts.admin-layout')

@section('title', 'Daftar Pengguna')

@push('css')
    {{--  --}}
@endpush

@section('main-header', 'Daftar Pengguna')

@section('main-content')

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
                {{-- @foreach ($pengguna as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="">{{ $item->login_nama }}</td>
                    <td class="">{{ $item->login_username }}</td>
                    <td class="">{{ $item->login_email }}</td>
                    <td class="">{{ $item->login_telepon }}</td>
                    <td>
                        <div class="row mx-auto d-flex justify-content-center">
                            <button class="btn btn-sm btn-info rounded mr-1">Lihat</button>
                            <button class="btn btn-sm btn-primary rounded mr-1">Edit</button>
                            <button class="btn btn-sm btn-danger rounded">Hapus</button>
                        </div>
                    </td>
                </tr>
                @endforeach --}}

                <tr>
                    <td>1</td>
                    <td>Belajar Web Programming</td>
                    <td>622-TMP</td>
                    <td>Candra Wijayanto</td>
                    <td>Media Informatika</td>
                    <td>2021</td>
                    <td>Teknologi - 622</td>
                    <td>
                        <div class="row mx-auto d-flex justify-content-center">
                            <button class="btn btn-sm btn-info rounded mr-1">Lihat</button>
                            <button class="btn btn-sm btn-primary rounded mr-1">Edit</button>
                            <button class="btn btn-sm btn-danger rounded">Hapus</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Advance Web Programming</td>
                    <td>625-TMP</td>
                    <td>Fathur Walkers</td>
                    <td>Informatika Info</td>
                    <td>2015</td>
                    <td>Teknologi - 524</td>
                    <td>
                        <div class="row mx-auto d-flex justify-content-center">
                            <button class="btn btn-sm btn-info rounded mr-1">Lihat</button>
                            <button class="btn btn-sm btn-primary rounded mr-1">Edit</button>
                            <button class="btn btn-sm btn-danger rounded">Hapus</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bahasa Inggris Dasar</td>
                    <td>573-TMP</td>
                    <td>Kate Winsley</td>
                    <td>PT. Komunikasi Inc</td>
                    <td>2020</td>
                    <td>Pendidikan - 568</td>
                    <td>
                        <div class="row mx-auto d-flex justify-content-center">
                            <button class="btn btn-sm btn-info rounded mr-1">Lihat</button>
                            <button class="btn btn-sm btn-primary rounded mr-1">Edit</button>
                            <button class="btn btn-sm btn-danger rounded">Hapus</button>
                        </div>
                    </td>
                </tr>
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