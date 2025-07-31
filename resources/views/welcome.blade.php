@extends('layouts.app')

@section('content')
    <header class="bg-header">
        <div class="overlay"></div>
        <div class="container header-content">
            <h1 class="display-4 fw-bold">SELAMAT DATANG DI SISTEM PELAYANAN PENGADUAN MASYARAKAT  AMBON</h1>
            <p class="lead">Menuju Pelayanan Publik yang Lebih Cepat, Efisien, dan Modern</p>
            <a href="{{ route('tentang') }}" class="btn btn-read-more">Read More</a>
        </div>
    </header>
@endsection
