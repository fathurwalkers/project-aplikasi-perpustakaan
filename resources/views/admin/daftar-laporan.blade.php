@extends('layouts.admin-layout')

@section('title', 'Daftar Laporan')

@push('css')
    {{--  --}}
@endpush

@section('main-header', 'Daftar Laporan')

@section('main-content')

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <table id="table1" class="table table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <td class="text-center">No</td>
                    <td class="">Kategori</td>
                    <td class="">Kode Kategori</td>
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
                    <td>Teknologi</td>
                    <td>600-TEKNOLOGI</td>
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
                    <td>Pendidikan</td>
                    <td>700-PENDIDIKAN</td>
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
                    <td>Sejarah</td>
                    <td>500-SEJARAH</td>
                    <td>
                        <div class="row mx-auto d-flex justify-content-center">
                            <button class="btn btn-sm btn-info rounded mr-1">Lihat</button>
                            <button class="btn btn-sm btn-primary rounded mr-1">Edit</button>
                            <button class="btn btn-sm btn-danger rounded">Hapus</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Komunikasi</td>
                    <td>100-KOMUNIKASI</td>
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