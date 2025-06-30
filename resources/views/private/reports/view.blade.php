@extends('private.layouts.app')

@section('title', 'Student Report')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Student Report Results</h1>
        <div>
            <form action="{{ route('reports.generate') }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="kampus_id" value="{{ $kampus?->id }}">
                <input type="hidden" name="angkatan" value="{{ $angkatan }}">
                <input type="hidden" name="format" value="pdf">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-download me-2"></i>
                    Download PDF
                </button>
            </form>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-2">
                <i class="fas fa-arrow-left me-2"></i>
                Back
            </a>
        </div>
    </div>
    <!-- End of Page Heading -->

    <!-- Filter Information Card -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Report Filters Applied
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Campus:</strong>
                            @if($kampus)
                                {{ $kampus->nama_kampus }} ({{ $kampus->kota }})
                            @else
                                <span class="text-muted">All Campuses</span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <strong>Year (Angkatan):</strong>
                            @if($angkatan)
                                {{ $angkatan }}
                            @else
                                <span class="text-muted">All Years</span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <strong>Total Results:</strong>
                            <span class="badge badge-primary">{{ $statistics['total_mahasiswa'] }} Students</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards Row -->
    <div class="row">
        <!-- Total Students Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Students
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics['total_mahasiswa'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Male Students Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Male Students
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics['jenis_kelamin']['laki_laki'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Female Students Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Female Students
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics['jenis_kelamin']['perempuan'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-female fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Study Programs Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Study Programs
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics['program_studi']->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Statistics -->
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Students by Status</h6>
                </div>
                <div class="card-body">
                    @if($statistics['status_mahasiswa']->count() > 0)
                        @foreach($statistics['status_mahasiswa'] as $status => $count)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>{{ $status ?: 'Not Specified' }}</span>
                                <span class="badge badge-primary">{{ $count }}</span>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted text-center">No data available</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Students by Faculty</h6>
                </div>
                <div class="card-body">
                    @if($statistics['fakultas']->count() > 0)
                        @foreach($statistics['fakultas'] as $fakultas => $count)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>{{ $fakultas ?: 'Not Specified' }}</span>
                                <span class="badge badge-success">{{ $count }}</span>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted text-center">No data available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Student List Table -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Student Details
                    </h6>
                </div>
                <div class="card-body">
                    @if($mahasiswas->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Campus</th>
                                        <th>Faculty</th>
                                        <th>Study Program</th>
                                        <th>Year</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mahasiswas as $index => $mahasiswa)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong>{{ $mahasiswa->nim }}</strong></td>
                                            <td>{{ $mahasiswa->nama }}</td>
                                            <td>
                                                <span class="badge {{ $mahasiswa->jenis_kelamin == 'Laki-laki' ? 'badge-primary' : 'badge-danger' }}">
                                                    {{ $mahasiswa->jenis_kelamin }}
                                                </span>
                                            </td>
                                            <td>{{ $mahasiswa->kampus->nama_kampus ?? 'N/A' }}</td>
                                            <td>{{ $mahasiswa->fakultas }}</td>
                                            <td>{{ $mahasiswa->program_studi }}</td>
                                            <td>
                                                <span class="badge badge-info">{{ $mahasiswa->angkatan }}</span>
                                            </td>
                                            <td>
                                                <span class="badge {{ $mahasiswa->status_mahasiswa == 'Aktif' ? 'badge-success' : 'badge-warning' }}">
                                                    {{ $mahasiswa->status_mahasiswa }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center p-5">
                            <i class="fas fa-users fa-3x text-gray-300 mb-3"></i>
                            <h5 class="text-gray-600">No students found</h5>
                            <p class="text-muted">Try adjusting your filter criteria.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Report Footer -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center bg-light">
                    <small class="text-muted">
                        <i class="fas fa-calendar me-1"></i>
                        Report generated on {{ now()->format('d F Y at H:i:s') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}
.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}
.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}
.text-gray-800 {
    color: #5a5c69 !important;
}
.text-gray-300 {
    color: #dddfeb !important;
}
.text-gray-600 {
    color: #6c757d !important;
}
</style>
@endsection
