@extends('layouts.admin-layout')

@section('title', 'MAILER')

@push('css')
    
@endpush

@section('main-header', 'MAILER')

@section('main-content')
<form action="{{ route('sendmail', $otpkode) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
            <div class="form-group">
                <label for="cek_otp" class="text-bold text-dark"><span style="color:#ff0000">* </span>KODE OTP</label>
                <input type="text" class="form-control text-bold text-dark border-1 border-dark" id="cek_otp" aria-describedby="cek_otp" placeholder="Masukkan judul buku..." name="cek_otp" autofocus>
                {{-- <small id="buku_judul" class="form-text text-muted text-bold text-dark"></small> --}}
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-md btn-success border-dark shadow">KONFIRMASI</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                        <small id="" class="form-text text-muted text-bold text-dark">Tekan tombol "KONFIRMASI" untuk menyelesaikan proses input data buku baru.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection



@push('js')
    
@endpush