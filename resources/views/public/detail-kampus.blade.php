@extends('public.layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('public.search') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $kampus->nama_kampus }}</li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="bg-gradient-main text-white p-4 rounded-top position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h1 class="display-6 fw-bold mb-2">{{ $kampus->nama_kampus }}</h1>
                                    <p class="lead mb-0">{{ $kampus->alamat }}</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="p-3 rounded" style="background-color: rgba(255, 255, 255, 0.2);">
                                        <i class="fas fa-university fa-3x text-white mb-2"></i>
                                        <div class="fw-bold">{{ $kampus->kode_pt }}</div>
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
                <!-- Basic Information -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informasi Dasar</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Kode Perguruan Tinggi</label>
                                    <div class="fs-5">{{ $kampus->kode_pt }}</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Status</label>
                                    <div class="fs-5">
                                        <span class="badge bg-success">Aktif</span>
                                    </div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Akreditasi</label>
                                    <div class="fs-5">
                                        <span class="badge bg-warning text-dark">B</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Website</label>
                                    <div class="fs-5">
                                        <a href="{{ $kampus->website }}" target="_blank" class="text-primary text-decoration-none">
                                            <i class="fas fa-external-link-alt me-1"></i>{{ $kampus->website }}
                                        </a>
                                    </div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Email</label>
                                    <div class="fs-5">info{{ '@' }}{{ str_replace(['http://', 'https://', 'www.'], '', $kampus->website) }}</div>
                                </div>
                                <div class="info-item mb-3">
                                    <label class="fw-bold text-muted">Telepon</label>
                                    <div class="fs-5">(021) 5224000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Statistik</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3 mb-3">
                                <div class="stat-card p-3 bg-light rounded">
                                    <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                    <div class="fw-bold fs-4">{{ $stats['total_mahasiswa'] }}</div>
                                    <div class="text-muted">Mahasiswa</div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="stat-card p-3 bg-light rounded">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-warning mb-2"></i>
                                    <div class="fw-bold fs-4">{{ $stats['total_dosen'] }}</div>
                                    <div class="text-muted">Dosen</div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="stat-card p-3 bg-light rounded">
                                    <i class="fas fa-graduation-cap fa-2x text-success mb-2"></i>
                                    <div class="fw-bold fs-4">{{ $stats['program_studi'] }}</div>
                                    <div class="text-muted">Program Studi</div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="stat-card p-3 bg-light rounded">
                                    <i class="fas fa-certificate fa-2x text-danger mb-2"></i>
                                    <div class="fw-bold fs-4">{{ $stats['dosen_tetap'] }}</div>
                                    <div class="text-muted">Dosen Tetap</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dosen List -->
                <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0"><i class="fas fa-chalkboard-teacher me-2"></i>Dosen ({{ $stats['total_dosen'] }})</h5>
                    </div>
                    <div class="card-body">
                        @if($dosens->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>NIDN</th>
                                            <th>Nama</th>
                                            <th>Program Studi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dosens->take(5) as $dosen)
                                            <tr>
                                                <td>{{ $dosen->nidn }}</td>
                                                <td>{{ $dosen->nama }}</td>
                                                <td>{{ $dosen->program_studi }}</td>
                                                <td>
                                                    <span class="badge bg-{{ $dosen->status_dosen === 'Tetap' ? 'success' : 'secondary' }}">
                                                        {{ $dosen->status_dosen }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('public.dosen.detail', $dosen->id) }}" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-eye me-1"></i>Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if($dosens->count() > 5)
                                <div class="text-center mt-3">
                                    <small class="text-muted">Menampilkan 5 dari {{ $dosens->count() }} dosen</small>
                                </div>
                            @endif
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                <div class="text-muted">Belum ada data dosen</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Mahasiswa List -->
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="fas fa-users me-2"></i>Mahasiswa ({{ $stats['total_mahasiswa'] }})</h5>
                    </div>
                    <div class="card-body">
                        @if($mahasiswas->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Program Studi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mahasiswas->take(5) as $mahasiswa)
                                            <tr>
                                                <td>{{ $mahasiswa->nim }}</td>
                                                <td>{{ $mahasiswa->nama }}</td>
                                                <td>{{ $mahasiswa->program_studi }}</td>
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
                            @if($mahasiswas->count() > 5)
                                <div class="text-center mt-3">
                                    <small class="text-muted">Menampilkan 5 dari {{ $mahasiswas->count() }} mahasiswa</small>
                                </div>
                            @endif
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-user-graduate fa-3x text-muted mb-3"></i>
                                <div class="text-muted">Belum ada data mahasiswa</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="col-lg-4">
                <!-- Location -->
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Lokasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            <strong>{{ $kampus->alamat }}</strong>
                        </div>
                        <div class="bg-light p-3 rounded">
                            <div class="text-center">
                                <i class="fas fa-map fa-3x text-muted mb-2"></i>
                                <div class="text-muted">Peta Lokasi</div>
                                <small class="text-muted">Akan ditampilkan di sini</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .stat-card {
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
        }
        .info-item label {
            font-size: 0.9rem;
        }
        .bg-gradient-main {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
@endsection
