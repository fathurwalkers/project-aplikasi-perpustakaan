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
                        <td>{{ Str::limit($item->buku_judul, 15) }}</td>
                        <td class="text-center">{{ $item->buku_kodekategori }}</td>
                        <td>{{ $item->buku_penulis }}</td>
                        <td>{{ Str::limit($item->buku_penerbit, 15) }}</td>
                        <td class="text-center">{{ $item->buku_tahunterbit }}</td>
                        {{-- @foreach ($item->kategori as $kategori_buku) --}}
                            {{-- @foreach ($kategori_buku as $kat) --}}
                                {{-- <td>{{ $kat->kategori_nama }}</td> --}}
                            {{-- @endforeach --}}
                            {{-- <td>{{ $kategori_buku->kategori_nama }}</td> --}}
                            {{-- <td>{{ $item->kategori->kategori_nama }}</td> --}}
                        {{-- @endforeach --}}
                            <td>{{ $item->kategori->kategori_nama }}</td>
                        <td>
                            <div class="container">
                                <div class="row mx-auto d-flex justify-content-center btn-group">
                                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex justify-content-center btn-group">

                                        <button class="btn btn-sm btn-info rounded mr-1" onclick="location.href = '{{ route('lihat-buku', $item->id) }}';">
                                            <i class="fas fa-edit"></i>
                                            Lihat
                                        </button>

                                        <form action="{{ route('edit-buku', $item->id) }}" method="get">
                                            @csrf
                                            <button class="btn btn-sm btn-primary rounded mr-1">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                        </form>

                                        <a class="btn btn-sm btn-danger rounded" data-toggle="modal" data-target="#logoutModal{{ $item->id }}">
                                            <i class="fas fa-edit"></i>
                                            Hapus
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="logoutModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form action="{{ route('hapus-buku', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Ya</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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
