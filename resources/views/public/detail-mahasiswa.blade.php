@extends('public.layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('public.search') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('public.kampus.detail', $mahasiswa->kampus->id) }}">{{ $mahasiswa->kampus->nama_kampus }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $mahasiswa->nama }}</li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="bg-gradient-main text-white p-4 rounded-top position-relative"
                            style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h1 class="display-6 fw-bold mb-2">{{ $mahasiswa->nama }}</h1>
                                    <p class="lead mb-1">{{ $mahasiswa->program_studi }}</p>
                                    <p class="mb-0 opacity-75">{{ $mahasiswa->kampus->nama_kampus }}</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <div class="p-3 rounded text-center" style="background-color: rgba(255, 255, 255, 0.2);">
                                        <i class="fas fa-chalkboard-teacher fa-3x text-white mb-2"></i>
                                        <div class="fw-bold">{{ $mahasiswa->nim }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <!-- Left Column - Main Info -->
            <div class="col-lg-8">
                <!-- Personal Information -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-user me-2"></i>Informasi Pribadi</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Nomor Induk Mahasiswa (NIM)</label>
                                    <div class="fs-5">{{ $mahasiswa->nim }}</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Nama Lengkap</label>
                                    <div class="fs-5">{{ $mahasiswa->nama }}</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Jenis Kelamin</label>
                                    <div class="fs-5">
                                        <span
                                            class="badge bg-{{ $mahasiswa->jenis_kelamin === 'Laki-laki' ? 'info' : 'pink' }}">
                                            {{ $mahasiswa->jenis_kelamin }}
                                        </span>
                                    </div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Tempat, Tanggal Lahir</label>
                                    <div class="fs-5">{{ $mahasiswa->tempat_lahir }},
                                        {{ \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->format('d F Y') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Program Studi</label>
                                    <div class="fs-5">{{ $mahasiswa->program_studi }}</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Perguruan Tinggi</label>
                                    <div class="fs-5">
                                        <a href="{{ route('public.kampus.detail', $mahasiswa->kampus->id) }}"
                                            class="text-primary text-decoration-none">
                                            {{ $mahasiswa->kampus->nama_kampus }}
                                        </a>
                                    </div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Status</label>
                                    <div class="fs-5">
                                        <span class="badge bg-success">Aktif</span>
                                    </div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Tahun Masuk</label>
                                    <div class="fs-5">{{ '20' . substr($mahasiswa->nim, 0, 2) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-graduation-cap me-2"></i>Informasi Akademik</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Semester Saat Ini</label>
                                    <div class="fs-5">
                                        <span class="badge bg-info">Semester {{ rand(1, 8) }}</span>
                                    </div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">IPK</label>
                                    <div class="fs-5">{{ number_format(rand(280, 400) / 100, 2) }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Total SKS</label>
                                    <div class="fs-5">{{ rand(80, 144) }} SKS</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Status Akademik</label>
                                    <div class="fs-5">
                                        <span class="badge bg-success">Baik</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dosen Pengajar -->
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0"><i class="fas fa-chalkboard-teacher me-2"></i>Dosen Pengajar Program Studi</h5>
                    </div>
                    <div class="card-body">
                        @if($dosenPengajar->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>NIDN</th>
                                            <th>Nama</th>
                                            <th>Gelar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dosenPengajar as $dosen)
                                            <tr>
                                                <td>{{ $dosen->nidn }}</td>
                                                <td>{{ $dosen->nama }}</td>
                                                <td>{{ $dosen->gelar_akademik }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $dosen->status_dosen === 'Tetap' ? 'success' : 'secondary' }}">
                                                        {{ $dosen->status_dosen }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('public.dosen.detail', $dosen->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-eye me-1"></i>Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-chalkboard-teacher fa-3x text-muted mb-3"></i>
                                <div class="text-muted">Belum ada data dosen pengajar</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="col-lg-4">
                <!-- Contact Information -->
                <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="fas fa-address-book me-2"></i>Kontak</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-phone text-success me-2"></i>
                            <strong>+62 {{ rand(811, 899) }}-{{ rand(1000, 9999) }}-{{ rand(1000, 9999) }}</strong>
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            <strong>{{ $mahasiswa->kampus->alamat }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Mahasiswa Lain -->
                <div class="card mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0"><i class="fas fa-users me-2"></i>Mahasiswa Lain</h5>
                    </div>
                    <div class="card-body">
                        @if($mahasiswaLain->count() > 0)
                            @foreach($mahasiswaLain as $mhs)
                                <div class="d-flex align-items-center mb-3 p-2 border rounded">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-user-graduate fa-2x text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="fw-bold">{{ $mhs->nama }}</div>
                                        <small class="text-muted">{{ $mhs->nim }}</small>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('public.mahasiswa.detail', $mhs->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-3">
                                <i class="fas fa-users fa-2x text-muted mb-2"></i>
                                <div class="text-muted">Belum ada mahasiswa lain</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .info-item label {
            font-size: 0.9rem;
        }

        .bg-gradient-main {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .bg-pink {
            background-color: #e91e63 !important;
        }
    </style>
@endsection