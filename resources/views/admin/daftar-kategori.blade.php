@extends('layouts.admin-layout')

@section('title', 'Daftar Kategori')

@push('css')
    {{--  --}}
@endpush

@section('main-header', 'Daftar Kategori')

@section('main-content')

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        @if (session('berhasil_tambah'))
            <div class="alert alert-info">
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
                    <td class="">Kategori</td>
                    <td class="">Kode Kategori</td>
                    <td class="">Aksi</td>
                </tr>
            </thead>

            <tbody class="text-dark">
                @foreach ($kategori as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kategori_nama }}</td>
                        <td class="text-center">{{ $item->kategori_kode }}</td>
                        <td>
                            <div class="row mx-auto d-flex justify-content-center">
                                {{-- <button class="btn btn-sm btn-info rounded mr-1">Lihat</button> --}}
                                {{-- <button class="btn btn-sm btn-primary rounded mr-1">Edit</button> --}}
                                <button class="btn btn-sm btn-danger rounded" data-toggle="modal" data-target="#hapusModal{{ $item->id }}">Hapus</button>
                            </div>
                        </td>

                        <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah anda yakin ingin keluar dari panel ini?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-info" type="button" data-dismiss="modal">Tidak</button>
                                        <form action="{{ route('hapus-kategori', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Ya</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
