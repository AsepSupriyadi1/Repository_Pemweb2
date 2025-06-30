@extends('private.layouts.app')

@section('title', 'Edit Kampus')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="pb-3">
                        <h4>Edit Data Kampus</h4>
                        <p class="mb-4">Silahkan ubah data-data berikut untuk memperbarui data kampus.</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('kampus.update', $kampus->id) }}" method="POST">
                        @csrf
                        <div class="row gap-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_pt">Kode Perguruan Tinggi:</label>
                                    <input type="text"
                                        class="form-control form-control-user @error('kode_pt') is-invalid @enderror"
                                        name="kode_pt" id="kode_pt" placeholder="Contoh: 041134"
                                        value="{{ old('kode_pt', $kampus->kode_pt) }}">
                                    @error('kode_pt')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_kampus">Nama Perguruan Tinggi:</label>
                                    <input type="text"
                                        class="form-control form-control-user @error('nama_kampus') is-invalid @enderror"
                                        name="nama_kampus" id="nama_kampus"
                                        placeholder="Contoh: Universitas Teknologi Bandung"
                                        value="{{ old('nama_kampus', $kampus->nama_kampus) }}">
                                    @error('nama_kampus')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provinsi">Provinsi:</label>
                                    <input type="text"
                                        class="form-control form-control-user @error('provinsi') is-invalid @enderror"
                                        name="provinsi" id="provinsi" placeholder="Contoh: Jawa Barat"
                                        value="{{ old('provinsi', $kampus->provinsi) }}">
                                    @error('provinsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kota">Kota:</label>
                                    <input type="text"
                                        class="form-control form-control-user @error('kota') is-invalid @enderror"
                                        name="kota" id="kota" placeholder="Contoh: Bandung"
                                        value="{{ old('kota', $kampus->kota) }}">
                                    @error('kota')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="notelp">Nomor Telp:</label>
                                    <input type="text"
                                        class="form-control form-control-user @error('notelp') is-invalid @enderror"
                                        name="notelp" id="notelp" placeholder="Contoh: 08321441241"
                                        value="{{ old('notelp', $kampus->telepon) }}">
                                    @error('notelp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Contoh: aku@gmail.com"
                                        value="{{ old('email', $kampus->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="website">Website:</label>
                                    <input type="text"
                                        class="form-control form-control-user @error('website') is-invalid @enderror"
                                        name="website" id="website" placeholder="Contoh: universitasaya.ac.id"
                                        value="{{ old('website', $kampus->website) }}">
                                    @error('website')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text"
                                        class="form-control form-control-user @error('alamat') is-invalid @enderror"
                                        name="alamat" id="alamat"
                                        placeholder="Masukan URL: https://www.google.com/maps?q=-6.9482173,107.6011169"
                                        value="{{ old('alamat', $kampus->alamat) }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection