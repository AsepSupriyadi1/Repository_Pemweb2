@extends('private.layouts.app')

@section('title', 'Detail User')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="pb-3">
                        <h4>Detail Data User</h4>
                        <p class="mb-4">Berikut adalah informasi lengkap dari data user yang dipilih.</p>
                    </div>

                    <div class="row gap-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>ID:</strong></label>
                                <p class="form-control-plaintext">{{ $user->id }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Nama:</strong></label>
                                <p class="form-control-plaintext">{{ $user->name }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Email:</strong></label>
                                <p class="form-control-plaintext">{{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Role:</strong></label>
                                <p class="form-control-plaintext">
                                    <span class="badge badge-{{ $user->role == 'ADMIN' ? 'success' : 'info' }}">
                                        {{ $user->role }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Tanggal Dibuat:</strong></label>
                                <p class="form-control-plaintext">{{ $user->created_at->format('d-m-Y H:i:s') }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Terakhir Diupdate:</strong></label>
                                <p class="form-control-plaintext">{{ $user->updated_at->format('d-m-Y H:i:s') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-user btn-block">
                                Edit User
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-user btn-block">
                                Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
