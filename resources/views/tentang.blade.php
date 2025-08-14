@extends('layouts.app-tentang')

@section('title', 'Tentang Layanan Pengaduan Masyarakat Ambon')

@section('content')
    <div class="row justify-content-center animate-on-scroll">
        <div class="col-lg-10">
            <div class="card card-custom p-4 p-md-5">
                <h2 class="text-center mb-4 section-heading">
                    <i class="fa-solid fa-circle-info me-2" style="color: var(--primary-color);"></i>
                    Tentang Layanan Pengaduan Masyarakat Ambon
                </h2>

                <div class="row">
                    <div class="col-md-6 mb-4 animate-on-scroll">
                        <div class="h-100 p-4 bg-light rounded-3">
                            <i class="fa-solid fa-users-line fa-2x mb-3" style="color: var(--primary-color);"></i>
                            <p class="mb-0">
                                Layanan Pengaduan Masyarakat Ambon merupakan sarana yang disediakan oleh pemerintah atau
                                lembaga terkait untuk menampung laporan, keluhan, saran, atau kritik dari masyarakat Kota
                                Ambon. Sistem ini bertujuan untuk meningkatkan transparansi, partisipasi publik, dan
                                perbaikan layanan publik di wilayah Kota Ambon.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4 animate-on-scroll">
                        <div class="h-100 p-4 bg-light rounded-3">
                            <i class="fa-solid fa-lock fa-2x mb-3" style="color: var(--accent-color);"></i>
                            <p class="mb-0">
                                Setiap laporan yang masuk akan diproses secara profesional, dijaga kerahasiaannya, dan
                                ditindaklanjuti sesuai prosedur yang berlaku. Masyarakat dapat melaporkan berbagai hal
                                seperti layanan publik yang kurang baik, penyimpangan administrasi, fasilitas umum yang
                                rusak, maupun kasus-kasus sosial lainnya.
                            </p>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row animate-on-scroll">
                    <div class="col-lg-8 mx-auto">
                        <h4 class="mb-4 text-center">
                            <i class="fa-solid fa-bullseye me-2" style="color: var(--accent-color);"></i>
                            Tujuan Layanan Pengaduan
                        </h4>

                        <ul class="modern-list mb-4">
                            <li>Memberikan ruang bagi masyarakat untuk menyampaikan keluhan secara langsung.</li>
                            <li>Mempercepat penanganan masalah yang terjadi di lingkungan masyarakat.</li>
                            <li>Meningkatkan kualitas pelayanan publik pemerintah di Ambon.</li>
                            <li>Mendorong partisipasi aktif masyarakat dalam pengawasan pembangunan daerah.</li>
                            <li>Menciptakan sistem pengaduan yang transparan dan akuntabel.</li>
                            <li>Membangun komunikasi dua arah antara pemerintah dan masyarakat.</li>
                        </ul>
                    </div>
                </div>

                <div class="alert alert-custom alert-info d-flex align-items-center animate-on-scroll">
                    <i class="fa-solid fa-circle-exclamation fa-2x me-3" style="color: var(--accent-color);"></i>
                    <div>
                        <strong>Catatan Penting:</strong> Laporan yang tidak disertai data atau informasi yang memadai dapat
                        menyebabkan keterlambatan penanganan. Pastikan Anda memberikan informasi yang jelas dan lengkap
                        untuk mempermudah proses verifikasi.
                    </div>
                </div>

                <hr class="my-4">

                <div class="row animate-on-scroll">
                    <div class="col-lg-10 mx-auto">
                        <h4 class="text-center mb-4">
                            <i class="fa-solid fa-paper-plane me-2" style="color: var(--primary-color);"></i>
                            Cara Menyampaikan Pengaduan
                        </h4>

                        <div class="row text-center">
                            <div class="col-md-4 mb-4">
                                <div class="p-3 h-100 border rounded-3">
                                    <i class="fa-solid fa-1 fa-2x mb-3" style="color: var(--primary-color);"></i>
                                    <h5>Registrasi Akun</h5>
                                    <p>Daftarkan diri Anda melalui halaman registrasi untuk mendapatkan akses penuh ke
                                        sistem pengaduan.</p>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="p-3 h-100 border rounded-3">
                                    <i class="fa-solid fa-2 fa-2x mb-3" style="color: var(--primary-color);"></i>
                                    <h5>Isi Formulir</h5>
                                    <p>Lengkapi formulir pengaduan dengan data yang akurat dan jelas untuk mempermudah
                                        proses verifikasi.</p>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="p-3 h-100 border rounded-3">
                                    <i class="fa-solid fa-3 fa-2x mb-3" style="color: var(--primary-color);"></i>
                                    <h5>Kirim Pengaduan</h5>
                                    <p>Setelah formulir terisi lengkap, kirim pengaduan Anda dan dapatkan nomor referensi
                                        untuk tracking.</p>
                                </div>
                            </div>
                        </div>

                        <p class="text-center mt-3">
                            <i class="fa-solid fa-envelope-open-text me-2"></i>
                            Pengaduan juga dapat disampaikan melalui halaman <a href="{{ route('kontak') }}"
                                class="text-decoration-none fw-bold">Kontak</a> pada website ini atau secara langsung ke
                            kantor layanan pengaduan masyarakat Ambon.
                        </p>
                    </div>
                </div>

                <div class="text-center mt-5 animate-on-scroll">
                    <div class="p-4 bg-primary text-white rounded-3">
                        <i class="fa-solid fa-thumbs-up fa-2x mb-3"></i>
                        <h4>Komitmen Kami</h4>
                        <p class="mb-0">Kami berkomitmen untuk menindaklanjuti setiap laporan yang masuk secara cepat,
                            objektif, dan bertanggung jawab demi terwujudnya pelayanan publik yang lebih baik di Kota Ambon.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
