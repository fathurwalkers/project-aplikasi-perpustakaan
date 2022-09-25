@extends('layouts.admin-layout')

@section('title', 'Daftar Pinjaman')

@push('css')
    {{--  --}}
@endpush

@section('main-header', 'Daftar Pinjaman')

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
                    <td class="">Kode Pinjaman</td>
                    <td class="">Nama Peminjam</td>
                    <td class="">Tanggal Pinjam</td>
                    <td class="">Tanggal Kembali</td>
                    <td class="">Status Pinjaman</td>
                    <td class="">Aksi</td>
                </tr>
            </thead>

            <tbody class="text-dark">
                @foreach ($pinjaman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pinjaman_kode }}</td>
                        <td>{{ $item->pinjaman_pengguna }}</td>
                        <td>{{ date("D / m / Y", strtotime($item->tanggal_pinjam)) }}</td>

                        @if ($item->tanggal_kembali == null)
                            <td>Belum Kembali</td>
                        @else
                            <td>{{ date("D / m / Y", strtotime($item->tanggal_kembali)) }}</td>
                        @endif

                        @if ($item->pinjaman_status == "PENDING")
                            <td class="">
                                <div class="row mx-auto d-flex justify-content-center">
                                <button class="badge badge-danger" type="button">{{ $item->pinjaman_status }}</button>
                                </div>
                            </td>
                        @elseif ($item->pinjaman_status == "AKTIF")
                            <td>
                                <div class="row mx-auto d-flex justify-content-center">
                                <button class="badge badge-success" type="button">{{ $item->pinjaman_status }}</button>
                                </div>
                            </td>
                        @elseif ($item->pinjaman_status == "BERAKHIR")
                            <td>
                                <div class="row mx-auto d-flex justify-content-center">
                                <button class="badge badge-primary" type="button">{{ $item->pinjaman_status }}</button>
                                </div>
                            </td>
                        @endif

                        <td>
                            <div class="row mx-auto d-flex justify-content-center">

                                @if ($item->pinjaman_status == "PENDING")
                                    @if ($users->login_level == 'admin')
                                        <form action="{{ route('konfirmasi-pinjaman') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="pinjaman_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-sm btn-info rounded mr-1">Konfirmasi</button>
                                        </form>
                                    @endif
                                @endif

                                @if ($users->login_level == 'user')
                                    @if ($item->pinjaman_status !== "BERAKHIR" && $item->pinjaman_status !== "PENDING")
                                    <form action="{{ route('konfirmasi-pengembalian') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="pinjaman_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-sm btn-primary rounded mr-1">Pengembalian</button>
                                    </form>
                                    @endif
                                @endif

                                @if ($users->login_level == 'admin')
                                    <form action="{{ route('hapus-pinjaman') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="pinjaman_id" value="{{ $item->id }}">
                                        <button class="btn btn-sm btn-danger rounded">Hapus</button>
                                    </form>
                                @endif
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
