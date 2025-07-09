@extends('private.layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Dosen</h1>
        <a href="{{ route('dosen.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa-solid fa-plus pe-2"></i>
            <span>Tambah data</span>
        </a>
    </div>
    <!-- End of Page Heading -->


    <!-- Contents -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Halaman manage data dosen (Create, Read, Update, Delete)
                    </h6>
                </div>
                <div class="card-body">

                    <!-- Success Alert -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- End of Success Alert -->

                    <!-- Error Alert -->
                    @if(session('error'))
                        <div class="alert alert-error alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- End of Error alert -->


                    <div class="table-responsive" style="max-height: 320px; overflow-y: auto;">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="position: sticky; top: 0; background-color: #f8f9fc; z-index: 1;">
                                <tr>
                                    <th>NIDN</th>
                                    <th>Nama Dosen</th>
                                    <th>Gelar Akademik</th>
                                    <th>Nama PT</th>
                                    <th>Program Studi</th>
                                    <th>Jabatan Fungsional</th>
                                    <th>Status Dosen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dosens as $dosen)
                                    <tr>
                                        <td>{{ $dosen->nidn }}</td>
                                        <td>{{ $dosen->nama }}</td>
                                        <td>{{ $dosen->gelar_akademik }}</td>
                                        <td>{{ $dosen->kampus->nama_kampus }}</td>
                                        <td>{{ $dosen->program_studi }}</td>
                                        <td>{{ $dosen->jabatan_fungsional }}</td>
                                        <td>{{ $dosen->status_dosen }}</td>
                                        <td>
                                            <a href="{{ route('dosen.edit', $dosen->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('dosen.delete', $dosen->id) }}" method="GET"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data dosen</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Contents -->

@endsection