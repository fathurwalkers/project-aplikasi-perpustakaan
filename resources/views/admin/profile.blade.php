@extends('layouts.admin-layout')

@section('title', 'Beranda')

@push('css')
    
@endpush

@section('main-header', 'Profile - Pengguna')

@section('main-content')

<div class="row mx-auto">
    <div class="col-sm-2 col-md-2 col-lg-2">
        ​<img src="{{ asset('assets/default-avatar.jpg') }}" class="img-fluid img-thumbnail" width="200px">
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
        <P> 
            Nama Lengkap <br>
            Email <br>
            Username <br>
            Telepon <br>
            Status                                
        </P>    
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        : {{ $users->login_nama }} <br>
        : {{ $users->login_email }} <br>
        : {{ $users->login_username }} <br>
        : {{ $users->login_telepon }} <br>
        : <span class="badge badge-success">{{ $users->login_status }}</span>
    </div>
</div>

@endsection



@push('js')
    
@endpush