@extends('layouts.app-tentang')

@section('title', 'Kontak Kami')

@section('content')
<div class="row justify-content-center mb-4">
    <div class="col-lg-10">
        <!-- Google Maps -->
        <div class="ratio ratio-16x9 rounded shadow">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63777.86192092078!2d128.13458363406115!3d-3.6851744473070503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6c1d00e04a0c2d%3A0x73d22c0a4a161bc4!2sAmbon%2C%20Kota%20Ambon%2C%20Maluku!5e0!3m2!1sid!2sid!4v1610000000000" 
                width="600" height="450" style="border:0;" 
                allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>
</div>

<!-- Kontak & Form -->
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card card-custom p-4">
            <div class="row">
                <!-- Info Kontak -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <h4 class="mb-4">Hubungi Kami</h4>
                    <p><i class="bi bi-geo-alt-fill text-primary me-2"></i><strong>Alamat:</strong><br>
                    Jl. Pendidikan No.10, Ambon, Maluku</p>

                    <p><i class="bi bi-telephone-fill text-primary me-2"></i><strong>Call Us:</strong><br>
                    (0911) 123456</p>

                    <p><i class="bi bi-envelope-fill text-primary me-2"></i><strong>Email Us:</strong><br>
                    info@masambon.sch.id</p>
                </div>

                <!-- Form -->
                <div class="col-md-6">
                    <form id="waForm">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-whatsapp"></i> Kirim lewat WhatsApp
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
    document.getElementById('waForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const nama = document.getElementById('nama').value;
        const email = document.getElementById('email').value;
        const pesan = document.getElementById('pesan').value;

        const nomorWhatsApp = '6281234567890'; // Ganti dengan nomor WhatsApp Anda
        const text = `Halo, saya ${nama} (%0AEmail: ${email}) ingin menyampaikan pesan:%0A%0A${pesan}`;

        const url = `https://wa.me/${nomorWhatsApp}?text=${encodeURIComponent(text)}`;
        window.open(url, '_blank');
    });
</script>
@endsection
