@extends('layouts.app') {{-- Sesuaikan dengan layout utama --}}

@section('content')
<div class="container">
    <h1 class="mb-4">Profil Saya</h1>

    <div class="card p-4 shadow-sm">
        <div class="d-flex align-items-center mb-3">
            <img src="{{ asset('img/profile.png') }}" alt="User" class="rounded-circle me-3" width="80">
            <div>
                <h4>{{ $user->name }}</h4>
                <p class="text-muted mb-0">{{ $user->email }}</p>
            </div>
        </div>

        <hr>

        <p><strong>Nama Lengkap:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Bergabung sejak:</strong> {{ $user->created_at->format('d M Y') }}</p>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profil</a>
    </div>
</div>
@endsection
