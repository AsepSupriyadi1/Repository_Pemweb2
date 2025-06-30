@extends('private.layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="pb-3">
                        <h4>Tambah data mahasiswa</h4>
                        <p class="mb-4">Silahkan isi data-data berikut untuk menambahkan data mahasiswa baru.</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route(name: 'mahasiswa.store') }}" method="POST">
                        @csrf
                        <div class="row gap-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kampus_id">
                                        Perguruan Tinggi:
                                    </label>
                                    <select class="form-control form-control-user @error('kampus_id') is-invalid @enderror"
                                        name="kampus_id" id="kampus_id">
                                        <option value="">- Pilih Perguruan Tinggi -</option>

                                        @forelse($list_kampus as $item)
                                            <option value="{{ $item->id }}" {{ old('kampus_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama_kampus }}
                                            </option>

                                        @empty
                                            <option value="">Tidak ada data</option>
                                        @endforelse
                                    </select>

                                    @error('kampus_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nim">
                                        Nomor Induk Mahasiswa (NIM):
                                    </label>
                                    <input type="number"
                                        class="form-control form-control-user @error('nim') is-invalid @enderror" name="nim"
                                        id="nim" placeholder="Contoh: 22552011203" value="{{ old('nim') }}">
                                    @error('nim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">
                                        Nama:
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-user @error('nama') is-invalid @enderror"
                                        name="nama" id="nama" placeholder="Contoh: Fulan" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin">
                                        Jenis Kelamin:
                                    </label>
                                    <select
                                        class="form-control form-control-user @error('jenis_kelamin') is-invalid @enderror"
                                        name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>

                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">
                                        Tanggal Lahir:
                                    </label>
                                    <input type="date"
                                        class="form-control form-control-user @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">
                                        Tempat Lahir:
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-user @error('tempat_lahir') is-invalid @enderror"
                                        name="tempat_lahir" id="tempat_lahir" placeholder="Contoh: Bandung"
                                        value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="program_studi">
                                        Program Studi:
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-user @error('program_studi') is-invalid @enderror"
                                        name="program_studi" id="program_studi" placeholder="Contoh: Teknik Informatika"
                                        value="{{ old('program_studi') }}">
                                    @error('program_studi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fakultas">
                                        Fakultas:
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-user @error('fakultas') is-invalid @enderror"
                                        name="fakultas" id="fakultas" placeholder="Contoh: Fakultas Teknik"
                                        value="{{ old('fakultas') }}">
                                    @error('fakultas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="angkatan">
                                        Angkatan:
                                    </label>
                                    <input type="number"
                                        class="form-control form-control-user @error('angkatan') is-invalid @enderror"
                                        name="angkatan" id="angkatan" value="{{ old('angkatan') }}"
                                        placeholder="Contoh: 2023">
                                    @error('angkatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_mahasiswa">
                                        Status Mahasiswa:
                                    </label>
                                    <select
                                        class="form-control form-control-user @error('status_mahasiswa') is-invalid @enderror"
                                        name="status_mahasiswa" id="status_mahasiswa">
                                        <option value="">Pilih Status Mahasiswa</option>
                                        <option value="Aktif" {{ old('status_mahasiswa') == 'Aktif' ? 'selected' : '' }}>
                                            Aktif
                                        </option>
                                        <option value="Cuti" {{ old('status_mahasiswa') == 'Cuti' ? 'selected' : '' }}>
                                            Cuti
                                        </option>
                                        <option value="Lulus" {{ old('status_mahasiswa') == 'Lulus' ? 'selected' : '' }}>
                                            Lulus
                                        </option>
                                        <option value="DO" {{ old('status_mahasiswa') == 'DO' ? 'selected' : '' }}>
                                            Dropout
                                        </option>
                                    </select>

                                    @error('status_mahasiswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection