@extends('private.layouts.app')

@section('title', 'Tambah User')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="pb-3">
                        <h4>Tambah data user</h4>
                        <p class="mb-4">Silahkan isi data-data berikut untuk menambahkan data user baru.</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="POST">
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
                                           value="{{ old('name') }}" 
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
                                           value="{{ old('email') }}" 
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
                                    <select class="form-control form-control-user @error('role') is-invalid @enderror"
                                            name="role" id="role">
                                        <option value="">- Pilih Role -</option>
                                        @foreach($roles as $key => $value)
                                            <option value="{{ $key }}" {{ old('role') == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">
                                        Password:
                                    </label>
                                    <input type="password" 
                                           class="form-control form-control-user @error('password') is-invalid @enderror"
                                           id="password" 
                                           name="password" 
                                           placeholder="Masukkan password">
                                    
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
                                           placeholder="Konfirmasi password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Tambah User
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
