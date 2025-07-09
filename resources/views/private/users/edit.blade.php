@extends('private.layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="pb-3">
                        <h4>Edit Data User</h4>
                        <p class="mb-4">Silahkan ubah data-data berikut untuk memperbarui data user.</p>
                        
                        @if($user->role === 'ADMIN')
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Perhatian:</strong> Anda sedang mengedit akun Admin. Role tidak dapat diubah.
                            </div>
                        @endif
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        <div class="row gap-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Nama:
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-user @error('name') is-invalid @enderror"
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $user->name) }}" 
                                           placeholder="Masukkan nama lengkap">
                                    
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">
                                        Email:
                                    </label>
                                    <input type="email" 
                                           class="form-control form-control-user @error('email') is-invalid @enderror"
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email', $user->email) }}" 
                                           placeholder="Masukkan email">
                                    
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">
                                        Role:
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-user"
                                           value="{{ $user->role === 'ADMIN' ? 'Admin' : 'Staff' }}" 
                                           readonly>
                                    <small class="form-text text-muted">Role tidak dapat diubah</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">
                                        Password (Kosongkan jika tidak ingin diubah):
                                    </label>
                                    <input type="password" 
                                           class="form-control form-control-user @error('password') is-invalid @enderror"
                                           id="password" 
                                           name="password" 
                                           placeholder="Masukkan password baru">
                                    
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">
                                        Konfirmasi Password:
                                    </label>
                                    <input type="password" 
                                           class="form-control form-control-user"
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           placeholder="Konfirmasi password baru">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update User
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-user btn-block">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
