@extends('layouts.dashboard')

@section('title', 'Detail Pengaduan')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">📝 Detail Pengaduan</h2>
                    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Left Column - Complaint Details -->
                        <div class="col-lg-7">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="mb-0">{{ $pengaduan->judul }}</h4>
                                <span class="badge rounded-pill 
                                    @if($pengaduan->status === 'Selesai') bg-success
                                    @elseif($pengaduan->status === 'Sedang diproses') bg-warning text-dark
                                    @else bg-secondary @endif">
                                    {{ $pengaduan->status }}
                                </span>
                            </div>

                            <div class="mb-4">
                                <p class="text-muted mb-1">
                                    <i class="fas fa-user-circle me-2"></i>
                                    Dilaporkan oleh: {{ optional($pengaduan->user)->name ?? 'User tidak ditemukan' }}
                                </p>
                                <p class="text-muted mb-1">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    Tanggal: {{ $pengaduan->created_at->format('d M Y, H:i') }}
                                </p>
                                <p class="text-muted">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    Lokasi: {{ $pengaduan->lokasi }}
                                </p>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-dark font-weight-bolder">Deskripsi</h6>
                                <p class="text-dark">{{ $pengaduan->deskripsi }}</p>
                            </div>

                            @if($pengaduan->tanggapan)
                            <div class="card bg-light border-0 mb-4">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-success font-weight-bolder">
                                        <i class="fas fa-check-circle me-2"></i>Tanggapan Admin
                                    </h6>
                                    <p class="mb-2">{{ $pengaduan->tanggapan }}</p>
                                    <small class="text-muted">
                                        Diperbarui: {{ $pengaduan->updated_at->format('d M Y, H:i') }}
                                    </small>
                                </div>
                            </div>
                            @endif

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">
                                <i class="fas fa-edit me-2"></i>Perbarui Status & Tanggapan
                            </button>
                        </div>

                        <!-- Right Column - Image -->
                        <div class="col-lg-5">
                            @if ($pengaduan->gambar)
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-white">
                                    <h6 class="mb-0">
                                        <i class="fas fa-image me-2"></i>Bukti Foto
                                    </h6>
                                </div>
                                <div class="card-body p-0">
                                    <img src="{{ asset('storage/' . $pengaduan->gambar) }}" 
                                         alt="Gambar Pengaduan" 
                                         class="img-fluid w-100 rounded-bottom"
                                         style="max-height: 400px; object-fit: cover;">
                                    <div class="p-3 text-center">
                                        <button class="btn btn-sm btn-outline-primary" 
                                                onclick="window.open('{{ asset('storage/' . $pengaduan->gambar) }}', '_blank')">
                                            <i class="fas fa-expand me-1"></i>Lihat Full Size
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="card border-0 bg-light">
                                <div class="card-body text-center py-5">
                                    <i class="fas fa-image fa-4x text-muted mb-3"></i>
                                    <p class="text-muted">Tidak ada gambar yang dilampirkan</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('admin.pengaduan.update', $pengaduan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="updateModalLabel">
              <i class="fas fa-edit me-2"></i>Update Status & Tanggapan
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="status" class="form-label">
                <i class="fas fa-tag me-2"></i>Status
            </label>
            <select name="status" id="status" class="form-select" required>
              <option value="Belum diproses" {{ $pengaduan->status == 'Belum diproses' ? 'selected' : '' }}>Belum diproses</option>
              <option value="Sedang diproses" {{ $pengaduan->status == 'Sedang diproses' ? 'selected' : '' }}>Sedang diproses</option>
              <option value="Selesai" {{ $pengaduan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
             <option value="Pengaduan Dibatalkan" {{ $pengaduan->status == 'Pengaduan Dibatalkan' ? 'selected' : '' }}>Pengaduan Dibatalkan</option>

            </select>
          </div>

          <div class="mb-3">
            <label for="tanggapan" class="form-label">
                <i class="fas fa-comment-dots me-2"></i>Tanggapan
            </label>
            <textarea name="tanggapan" id="tanggapan" class="form-control" rows="5" 
                      placeholder="Tulis tanggapan atau tindakan yang telah dilakukan...">{{ old('tanggapan', $pengaduan->tanggapan) }}</textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times me-1"></i>Tutup
          </button>
          <button type="submit" class="btn btn-primary">
              <i class="fas fa-save me-1"></i>Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection