@extends('layouts.admin-layout')

@section('title', 'Daftar Pengguna')

@push('css')
    {{--  --}}
@endpush

@section('main-header', 'Daftar Pengguna')

@section('main-content')

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
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
                            {{-- <button class="btn btn-sm btn-info rounded mr-1">Lihat</button> --}}
                            <button class="btn btn-sm btn-primary rounded mr-1" data-toggle="modal" data-target="#modal_update{{ $item->id }}">Edit</button>
                            <button class="btn btn-sm btn-danger rounded" data-toggle="modal" data-target="#modal_hapus{{ $item->id }}">Hapus</button>

                            {{-- MODAL UPDATE --}}
                            <div class="modal fade" id="modal_update{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah data Pengguna</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('update-pengguna', $item->id) }}" method="POST">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label for="login_nama" class="text-bold text-dark">
                                                            Nama Pengguna
                                                        </label>
                                                        <input type="text" class="form-control text-bold text-dark border-1 border-dark" id="login_nama" aria-describedby="login_nama" name="login_nama" autofocus value="{{ $item->login_nama }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label for="login_email" class="text-bold text-dark">
                                                            Email
                                                        </label>
                                                        <input type="text" class="form-control text-bold text-dark border-1 border-dark" id="login_email" aria-describedby="login_email" name="login_email" autofocus value="{{ $item->login_email }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label for="login_telepon" class="text-bold text-dark">
                                                            No. HP / Telepon
                                                        </label>
                                                        <input type="text" class="form-control text-bold text-dark border-1 border-dark" id="login_telepon" aria-describedby="login_telepon" name="login_telepon" autofocus value="{{ $item->login_telepon }}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-info" type="button" data-dismiss="modal">Tidak</button>

                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Ya</button>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            {{-- MODAL HAPUS --}}
                            <div class="modal fade" id="modal_hapus{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ingin meghapus Buku ini?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Apakah anda yakin ingin menghapus buku ini?</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-info" type="button" data-dismiss="modal">Tidak</button>
                                            <form action="{{ route('hapus-pengguna', $item->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Ya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


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
