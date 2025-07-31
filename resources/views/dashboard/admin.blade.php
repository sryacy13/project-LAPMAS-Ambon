@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Selamat Datang, Admin!</h4>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('img/admin.png') }}" alt="Admin Icon" width="100" class="mb-3">
                    <p class="lead">Anda telah berhasil masuk ke dashboard administrator.</p>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <i class="fas fa-users fa-2x text-primary"></i>
                            <h5 class="mt-2">Manajemen Pengguna</h5>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-database fa-2x text-success"></i>
                            <h5 class="mt-2">Data Sistem</h5>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-cogs fa-2x text-warning"></i>
                            <h5 class="mt-2">Pengaturan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection
