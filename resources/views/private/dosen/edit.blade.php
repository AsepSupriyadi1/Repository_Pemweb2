@extends('private.layouts.app')

@section('title', 'Edit Dosen')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="pb-3">
                        <h4>Edit Data Dosen</h4>
                        <p class="mb-4">Silahkan ubah data-data berikut untuk memperbarui data dosen.</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
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
                                            <option value="{{ $item->id }}" {{ old('kampus_id') == $item->id || $dosen->kampus->id == $item->id ? 'selected' : '' }}>
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
                                    <label for="nidn">NIDN:</label>
                                    <input disabled type="text"
                                        class="form-control form-control-user @error('nidn') is-invalid @enderror" name="nidn"
                                        id="nidn" placeholder="Contoh: 0123456789" value="{{ old('nidn', $dosen->nidn) }}">
                                    @error('nidn')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Dosen:</label>
                                    <input type="text"
                                        class="form-control form-control-user @error('nama') is-invalid @enderror"
                                        name="nama" id="nama" placeholder="Contoh: Dr. Fulan, M.Kom"
                                        value="{{ old('nama', $dosen->nama) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gelar_akademik">Gelar Akademik:</label>
                                    <input type="text"
                                        class="form-control form-control-user @error('gelar_akademik') is-invalid @enderror"
                                        name="gelar_akademik" id="gelar_akademik" placeholder="Contoh: S.Kom, M.Kom"
                                        value="{{ old('gelar_akademik', $dosen->gelar_akademik) }}">
                                    @error('gelar_akademik')
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
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' || $dosen->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' || $dosen->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
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
                                        name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', $dosen->tanggal_lahir) }}">
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
                                        value="{{ old('tempat_lahir', $dosen->tempat_lahir) }}">
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
                                        value="{{ old('program_studi', $dosen->program_studi) }}">
                                    @error('program_studi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jabatan_fungsional">
                                        Jabatan Fungsional:
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-user @error('jabatan_fungsional') is-invalid @enderror"
                                        name="jabatan_fungsional" id="jabatan_fungsional" placeholder="Contoh: Asisten Ahli"
                                        value="{{ old('jabatan_fungsional', $dosen->jabatan_fungsional) }}">
                                    @error('jabatan_fungsional')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_dosen">
                                        Status Dosen:
                                    </label>
                                    <select
                                        class="form-control form-control-user @error('status_dosen') is-invalid @enderror"
                                        name="status_dosen" id="status_dosen">
                                        <option value="">Pilih Status Dosen</option>
                                        <option value="Tetap" {{ old('status_dosen') == 'Tetap' || $dosen->status_dosen == 'Tetap' ? 'selected' : '' }}>
                                            Tetap
                                        </option>
                                        <option value="Tidak Tetap" {{ old('status_dosen') == 'Tidak Tetap' || $dosen->status_dosen == 'Tidak Tetap' ? 'selected' : '' }}>
                                            Tidak Tetap
                                        </option>
                                    </select>

                                    @error('status_dosen')
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