@extends('public.layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('public.search') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('public.kampus.detail', $dosen->kampus->id) }}">{{ $dosen->kampus->nama_kampus }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $dosen->nama }}</li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="bg-gradient-main text-white p-4 rounded-top position-relative" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h1 class="display-6 fw-bold mb-2">{{ $dosen->nama }}</h1>
                                    <p class="lead mb-1">{{ $dosen->gelar_akademik }}</p>
                                    <p class="mb-1 opacity-75">{{ $dosen->program_studi }}</p>
                                    <p class="mb-0 opacity-75">{{ $dosen->kampus->nama_kampus }}</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <div class="p-3 rounded text-center" style="background-color: rgba(255, 255, 255, 0.2);">
                                        <i class="fas fa-chalkboard-teacher fa-3x text-white mb-2"></i>
                                        <div class="fw-bold">{{ $dosen->nidn }}</div>
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
                                    <label class="fw-bold text-muted">Nomor Induk Dosen Nasional (NIDN)</label>
                                    <div class="fs-5">{{ $dosen->nidn }}</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Nama Lengkap</label>
                                    <div class="fs-5">{{ $dosen->nama }}</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Gelar Akademik</label>
                                    <div class="fs-5">{{ $dosen->gelar_akademik }}</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Jenis Kelamin</label>
                                    <div class="fs-5">
                                        <span class="badge bg-{{ $dosen->jenis_kelamin === 'Laki-laki' ? 'info' : 'pink' }}">
                                            {{ $dosen->jenis_kelamin }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Tempat, Tanggal Lahir</label>
                                    <div class="fs-5">{{ $dosen->tempat_lahir }}, {{ \Carbon\Carbon::parse($dosen->tanggal_lahir)->format('d F Y') }}</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Umur</label>
                                    <div class="fs-5">{{ \Carbon\Carbon::parse($dosen->tanggal_lahir)->age }} tahun</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Status Dosen</label>
                                    <div class="fs-5">
                                        <span class="badge bg-{{ $dosen->status_dosen === 'Tetap' ? 'success' : 'secondary' }}">
                                            {{ $dosen->status_dosen }}
                                        </span>
                                    </div>
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
                                    <label class="fw-bold text-muted">Program Studi</label>
                                    <div class="fs-5">{{ $dosen->program_studi }}</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Jabatan Fungsional</label>
                                    <div class="fs-5">{{ $dosen->jabatan_fungsional }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Perguruan Tinggi</label>
                                    <div class="fs-5">
                                        <a href="{{ route('public.kampus.detail', $dosen->kampus->id) }}" class="text-primary text-decoration-none">
                                            {{ $dosen->kampus->nama_kampus }}
                                        </a>
                                    </div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Masa Kerja</label>
                                    <div class="fs-5">{{ rand(1, 20) }} tahun</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Research & Publications -->
                <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0"><i class="fas fa-book me-2"></i>Penelitian & Publikasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-file-alt fa-2x text-primary mb-2"></i>
                                    <div class="fw-bold fs-4">{{ rand(5, 25) }}</div>
                                    <div class="text-muted">Publikasi</div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-search fa-2x text-success mb-2"></i>
                                    <div class="fw-bold fs-4">{{ rand(2, 10) }}</div>
                                    <div class="text-muted">Penelitian</div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-trophy fa-2x text-warning mb-2"></i>
                                    <div class="fw-bold fs-4">{{ rand(1, 5) }}</div>
                                    <div class="text-muted">Penghargaan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mahasiswa Program Studi -->
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="fas fa-users me-2"></i>Mahasiswa Program Studi ({{ $mahasiswaProdi->count() }})</h5>
                    </div>
                    <div class="card-body">
                        @if($mahasiswaProdi->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Semester</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mahasiswaProdi->take(5) as $mahasiswa)
                                            <tr>
                                                <td>{{ $mahasiswa->nim }}</td>
                                                <td>{{ $mahasiswa->nama }}</td>
                                                <td>
                                                    <span class="badge bg-info">Semester {{ rand(1, 8) }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('public.mahasiswa.detail', $mahasiswa->id) }}" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-eye me-1"></i>Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if($mahasiswaProdi->count() > 5)
                                <div class="text-center mt-3">
                                    <small class="text-muted">Menampilkan 5 dari {{ $mahasiswaProdi->count() }} mahasiswa</small>
                                </div>
                            @endif
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-user-graduate fa-3x text-muted mb-3"></i>
                                <div class="text-muted">Belum ada mahasiswa di program studi ini</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="col-lg-4">
                <!-- Contact Information -->
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0"><i class="fas fa-address-book me-2"></i>Kontak</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-phone text-success me-2"></i>
                            <strong>+62 {{ rand(811, 899) }}-{{ rand(1000, 9999) }}-{{ rand(1000, 9999) }}</strong>
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            <strong>{{ $dosen->kampus->alamat }}</strong>
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-id-card text-info me-2"></i>
                            <strong>Ruang {{ rand(100, 999) }}, Gedung {{ chr(65 + rand(0, 5)) }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Schedule -->
                <div class="card mb-4">
                    <div class="card-header bg-purple text-white" style="background-color: #6f42c1 !important;">
                        <h5 class="mb-0"><i class="fas fa-calendar me-2"></i>Jadwal Mengajar</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <strong>Senin</strong>
                                <span class="badge bg-primary">08:00 - 10:00</span>
                            </div>
                            <small class="text-muted">Mata Kuliah A</small>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <strong>Rabu</strong>
                                <span class="badge bg-success">10:00 - 12:00</span>
                            </div>
                            <small class="text-muted">Mata Kuliah B</small>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <strong>Jumat</strong>
                                <span class="badge bg-warning">13:00 - 15:00</span>
                            </div>
                            <small class="text-muted">Mata Kuliah C</small>
                        </div>
                    </div>
                </div>

                <!-- Dosen Lain -->
                <div class="card mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0"><i class="fas fa-users me-2"></i>Dosen Lain</h5>
                    </div>
                    <div class="card-body">
                        @if($dosenLain->count() > 0)
                            @foreach($dosenLain as $dosenItem)
                                <div class="d-flex align-items-center mb-3 p-2 border rounded">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-chalkboard-teacher fa-2x text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="fw-bold">{{ $dosenItem->nama }}</div>
                                        <small class="text-muted">{{ $dosenItem->gelar_akademik }}</small>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('public.dosen.detail', $dosenItem->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-3">
                                <i class="fas fa-chalkboard-teacher fa-2x text-muted mb-2"></i>
                                <div class="text-muted">Belum ada dosen lain</div>
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
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }
        .bg-pink {
            background-color: #e91e63 !important;
        }
    </style>
@endsection
