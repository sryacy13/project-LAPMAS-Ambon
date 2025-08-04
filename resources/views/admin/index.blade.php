@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<style>
    .dashboard-card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        border-radius: 15px;
        min-height: 170px;
    }
    .dashboard-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    .dashboard-card .card-body i {
        font-size: 3.5rem;
    }
    .dashboard-card .card-body h3 {
        font-size: 2.2rem;
    }
    .dashboard-card .card-body p {
        font-size: 1.2rem;
    }
</style>

<div class="container-fluid mt-4">
    <h1 class="mb-4 fw-bold">Dashboard Admin</h1>

   {{-- Statistik Pengaduan --}}
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card dashboard-card shadow-lg border-0">
            <div class="card-header bg-primary text-white fw-bold fs-5">
                Status Pengaduan
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush fs-5">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-hourglass-split text-warning me-2"></i> Belum Diproses</span>
                        <span class="badge bg-warning text-dark fs-6">{{ $belumDiproses }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-gear-fill text-primary me-2"></i> Sedang Diproses</span>
                        <span class="badge bg-primary fs-6">{{ $sedangDiproses }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-check-circle-fill text-success me-2"></i> Selesai</span>
                        <span class="badge bg-success fs-6">{{ $selesai }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-x-circle-fill text-danger me-2"></i> Dibatalkan</span>
                        <span class="badge bg-danger fs-6">{{ $pengaduanDibatalkan }}</span>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center fw-bold fs-5">
                Total Pengaduan: {{ $totalPengaduan }}
            </div>
        </div>
    </div>

    {{-- Statistik Akun --}}
    <div class="col-md-6">
        <div class="card dashboard-card shadow-lg border-0">
            <div class="card-header bg-info text-white fw-bold fs-5">
                Data Akun
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush fs-5">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-people-fill text-info me-2"></i> Total User</span>
                        <span class="badge bg-info text-white fs-6">{{ $totalUser }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-person-check-fill text-dark me-2"></i> Total Admin</span>
                        <span class="badge bg-dark text-white fs-6">{{ $totalAdmin }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-people text-warning me-2"></i> Total Semua Akun</span>
                        <span class="badge bg-warning text-dark fs-6">{{ $totalSemuaAkun }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


</div>
@endsection
