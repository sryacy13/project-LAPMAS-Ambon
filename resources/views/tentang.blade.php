@extends('layouts.app-tentang')

@section('title', 'Tentang Layanan Pengaduan Masyarakat Ambon')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card card-custom p-4">
            <h2 class="text-center mb-4">
                <i class="fa-solid fa-circle-info text-primary me-2"></i>
                Tentang Layanan Pengaduan Masyarakat Ambon
            </h2>
            
            <p>
                <i class="fa-solid fa-users-line text-success me-2"></i>
                Layanan Pengaduan Masyarakat Ambon merupakan sarana yang disediakan oleh pemerintah atau lembaga terkait untuk menampung laporan, keluhan, saran, atau kritik dari masyarakat Kota Ambon. Sistem ini bertujuan untuk meningkatkan transparansi, partisipasi publik, dan perbaikan layanan publik di wilayah Kota Ambon.
            </p>
            <p>
                <i class="fa-solid fa-lock text-warning me-2"></i>
                Setiap laporan yang masuk akan diproses secara profesional, dijaga kerahasiaannya, dan ditindaklanjuti sesuai prosedur yang berlaku. Masyarakat dapat melaporkan berbagai hal seperti layanan publik yang kurang baik, penyimpangan administrasi, fasilitas umum yang rusak, maupun kasus-kasus sosial lainnya.
            </p>

            <hr>

            <h4><i class="fa-solid fa-bullseye text-danger me-2"></i>Tujuan Layanan Pengaduan:</h4>
            <ul class="mb-3">
                <li><i class="fa-solid fa-check-circle text-success me-2"></i> Memberikan ruang bagi masyarakat untuk menyampaikan keluhan secara langsung.</li>
                <li><i class="fa-solid fa-check-circle text-success me-2"></i> Mempercepat penanganan masalah yang terjadi di lingkungan masyarakat.</li>
                <li><i class="fa-solid fa-check-circle text-success me-2"></i> Meningkatkan kualitas pelayanan publik pemerintah di Ambon.</li>
                <li><i class="fa-solid fa-check-circle text-success me-2"></i> Mendorong partisipasi aktif masyarakat dalam pengawasan pembangunan daerah.</li>
            </ul>

            <div class="alert alert-info d-flex align-items-center">
                <i class="fa-solid fa-circle-exclamation fa-lg me-2"></i>
                <strong>Catatan:</strong> Laporan yang tidak disertai data atau informasi yang memadai dapat menyebabkan keterlambatan penanganan.
            </div>

            <hr>

            <h4><i class="fa-solid fa-paper-plane text-primary me-2"></i>Cara Menyampaikan Pengaduan</h4>
            <p>
                <i class="fa-solid fa-envelope-open-text text-secondary me-2"></i>
                Pengaduan dapat disampaikan melalui halaman <a href="{{ route('kontak') }}">Kontak</a> pada website ini atau secara langsung ke kantor layanan pengaduan masyarakat Ambon. Silakan sertakan informasi yang jelas dan lengkap agar dapat segera ditindaklanjuti.
            </p>

            <p>
                <i class="fa-solid fa-thumbs-up text-success me-2"></i>
                Kami berkomitmen untuk menindaklanjuti setiap laporan yang masuk secara cepat, objektif, dan bertanggung jawab.
            </p>
        </div>
    </div>
</div>
@endsection
