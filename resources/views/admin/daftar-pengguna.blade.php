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
                    <td class="">Nama Pengguna</td>
                    <td class="">Username</td>
                    <td class="">Email</td>
                    <td class="">No Telepon</td>
                    <td class="">Menu Kelola</td>
                </tr>
            </thead>
            
            <tbody class="text-dark">
                @foreach ($pengguna as $item)
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