@extends('layouts.admin.app')
@section('content')
        {{-- start main content --}}
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://w3.org">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Ubah Data User</h1>
                    <p class="mb-0">Formulir pembaruan data user</p>
                </div>
            </div>
        </div>

        {{-- Menampilkan alert jika ada error global --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Pemberitahuan:</strong> Mohon periksa kembali isian form Anda.
            </div>
        @endif

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Input Nama -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Info tentang password -->
                            <div class="alert alert-info py-2 mb-3 small" role="alert">
                                * Biarkan kolom di bawah ini kosong jika Anda tidak ingin mengubah password user.
                            </div>

                            <!-- Input Password Baru -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru (Opsional)</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Minimal 8 karakter">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input Konfirmasi Password Baru -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control"
                                    id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru">
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('users.index') }}" class="btn btn-light me-2">Kembali</a>
                                <button type="submit" class="btn btn-info">Perbarui Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end main content --}}
@endsection
