@extends('private.layouts.app')

@section('title', 'Student Report Summary')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Student Report Summary Dashboard</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left me-2"></i>
            Generate Report
        </a>
    </div>
    <!-- End of Page Heading -->

    <!-- Overview Cards -->
    <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Students
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMahasiswa }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Campuses
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKampus }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-university fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Latest Year
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $angkatanTerbaru }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Oldest Year
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $angkatanTerlama }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-history fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row">
                <!-- Students per Campus -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Students per Campus</h6>
                        </div>
                        <div class="card-body">
                            @if($mahasiswaPerKampus->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Campus</th>
                                                <th class="text-center">Students</th>
                                                <th class="text-center">Percentage</th>
                                                <th width="30%">Visual</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mahasiswaPerKampus as $item)
                                                @php
                                                    $percentage = $totalMahasiswa > 0 ? round(($item->total / $totalMahasiswa) * 100, 1) : 0;
                                                @endphp
                                                <tr>
                                                    <td>{{ $item->nama_kampus }}</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-primary">{{ $item->total }}</span>
                                                    </td>
                                                    <td class="text-center">{{ $percentage }}%</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-primary" role="progressbar" 
                                                                 style="width: {{ $percentage }}%" 
                                                                 aria-valuenow="{{ $percentage }}" 
                                                                 aria-valuemin="0" 
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center p-4">
                                    <i class="fas fa-university fa-3x text-gray-300 mb-3"></i>
                                    <p class="text-muted">No campus data available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Students per Year -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-success">Students per Year</h6>
                        </div>
                        <div class="card-body">
                            @if($mahasiswaPerAngkatan->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th class="text-center">Students</th>
                                                <th class="text-center">Percentage</th>
                                                <th width="30%">Visual</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mahasiswaPerAngkatan as $item)
                                                @php
                                                    $percentage = $totalMahasiswa > 0 ? round(($item->total / $totalMahasiswa) * 100, 1) : 0;
                                                    $colorClass = $loop->index % 4 == 0 ? 'success' : ($loop->index % 4 == 1 ? 'info' : ($loop->index % 4 == 2 ? 'warning' : 'secondary'));
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <span class="badge badge-{{ $colorClass }}">{{ $item->angkatan }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-{{ $colorClass }}">{{ $item->total }}</span>
                                                    </td>
                                                    <td class="text-center">{{ $percentage }}%</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-{{ $colorClass }}" role="progressbar" 
                                                                 style="width: {{ $percentage }}%" 
                                                                 aria-valuenow="{{ $percentage }}" 
                                                                 aria-valuemin="0" 
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center p-4">
                                    <i class="fas fa-calendar fa-3x text-gray-300 mb-3"></i>
                                    <p class="text-muted">No year data available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Quick Actions
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-3 mb-3">
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg btn-block">
                                        <i class="fas fa-file-alt fa-2x mb-2 d-block"></i>
                                        Generate Custom Report
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <form action="{{ route('reports.generate') }}" method="POST" class="d-inline w-100">
                                        @csrf
                                        <input type="hidden" name="format" value="pdf">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">
                                            <i class="fas fa-download fa-2x mb-2 d-block"></i>
                                            Download All Students PDF
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <form action="{{ route('reports.generate') }}" method="POST" class="d-inline w-100">
                                        @csrf
                                        <input type="hidden" name="angkatan" value="{{ $angkatanTerbaru }}">
                                        <input type="hidden" name="format" value="pdf">
                                        <button type="submit" class="btn btn-info btn-lg btn-block">
                                            <i class="fas fa-graduation-cap fa-2x mb-2 d-block"></i>
                                            Latest Year PDF
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <form action="{{ route('reports.generate') }}" method="POST" class="d-inline w-100">
                                        @csrf
                                        <input type="hidden" name="format" value="view">
                                        <button type="submit" class="btn btn-warning btn-lg btn-block">
                                            <i class="fas fa-eye fa-2x mb-2 d-block"></i>
                                            View All Online
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
.btn-block {
    width: 100%;
}
</style>
@endsection
