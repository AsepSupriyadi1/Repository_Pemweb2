@extends('private.layouts.app')

@section('title', 'Generate Student Report')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard PDDIKTI</h1>
    </div>
    <!-- End of Page Heading -->

        <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Generate Report
                    </h6>
                </div>
                <div class="card-body">
                        <form action="{{ route('reports.generate') }}" method="POST" id="reportForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="kampus_id" class="form-label">
                                            <i class="fas fa-university me-1"></i>
                                            Select Campus
                                        </label>
                                        <select name="kampus_id" id="kampus_id" class="form-select form-control">
                                            <option value="">All Campuses</option>
                                            @foreach($kampuses as $kampus)
                                                <option value="{{ $kampus->id }}" {{ old('kampus_id') == $kampus->id ? 'selected' : '' }}>
                                                    {{ $kampus->nama_kampus }} ({{ $kampus->kota }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="angkatan" class="form-label">
                                            <i class="fas fa-calendar-alt me-1"></i>
                                            Select Graduation Year (Angkatan)
                                        </label>
                                        <select name="angkatan" id="angkatan" class="form-select form-control">
                                            <option value="">All Years</option>
                                            @foreach($angkatans as $angkatan)
                                                <option value="{{ $angkatan }}" {{ old('angkatan') == $angkatan ? 'selected' : '' }}>
                                                    {{ $angkatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-file-alt me-1"></i>
                                            Output Format
                                        </label>
                                        <div>
                                            <div class="form-check form-check-inline border p-2 rounded">
                                                <input class="form-check-input" type="radio" name="format" id="format_view"
                                                    value="view" {{ old('format', 'view') == 'view' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="format_view">
                                                    <i class="fas fa-eye me-1"></i>
                                                    View Online
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline border p-2 rounded">
                                                <input class="form-check-input" type="radio" name="format" id="format_pdf"
                                                    value="pdf" {{ old('format') == 'pdf' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="format_pdf">
                                                    <i class="fas fa-file-pdf me-1"></i>
                                                    Download PDF
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-primary mr-2">
                                    <i class="fas fa-play me-2"></i>
                                    Generate Report
                                </button>
                                <a href="{{ route('reports.summary') }}" class="btn btn-info">
                                    <i class="fas fa-chart-pie me-2"></i>
                                    View Summary
                                </a>
                            </div>
                        </form>
                </div>
            </div>
                        <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Quick Information
                    </h6>
                </div>
                <div class="card-body">
                                    <div class="row text-center">
                            <div class="col-md-3">
                                <div class="p-3">
                                    <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                    <h5>{{ \App\Models\Mahasiswa::count() }}</h5>
                                    <small class="text-muted">Total Students</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3">
                                    <i class="fas fa-university fa-2x text-success mb-2"></i>
                                    <h5>{{ \App\Models\Kampus::count() }}</h5>
                                    <small class="text-muted">Total Campuses</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3">
                                    <i class="fas fa-calendar fa-2x text-warning mb-2"></i>
                                    <h5>{{ \App\Models\Mahasiswa::distinct('angkatan')->count() }}</h5>
                                    <small class="text-muted">Different Years</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3">
                                    <i class="fas fa-graduation-cap fa-2x text-info mb-2"></i>
                                    <h5>{{ \App\Models\Mahasiswa::distinct('program_studi')->count() }}</h5>
                                    <small class="text-muted">Study Programs</small>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        document.getElementById('reportForm').addEventListener('submit', function (e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Generating...';
            submitBtn.disabled = true;

            // Re-enable button after 5 seconds in case of issues
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 5000);
        });
    </script>
@endsection