@extends('layouts.user')

@section('content')
<div class="container">
    <h1>Selamat Datang, {{ auth()->user()->name }}</h1>
    <a href="#" class="btn btn-danger mt-3">Buat Pengaduan</a>
    <div class="mt-4">
        <h3>Peta Pengaduan</h3>
        <div id="map" style="height: 400px;"></div>
    </div>
</div>
@endsection
