@extends('private.layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
        <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa-solid fa-plus pe-2"></i>
            <span>Tambah Staff</span>
        </a>
    </div>
    <!-- End of Page Heading -->

    <!-- Contents -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Halaman manage data user (Admin dapat mengelola Staff)
                    </h6>
                </div>
                <div class="card-body">
                    
                    <!-- Info Alert -->
                    <div class="alert alert-info mb-3">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Informasi:</strong> Hanya ada satu Admin dalam sistem. Semua user baru akan memiliki role Staff.
                    </div>

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
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- End of Error alert -->

                    <div class="table-responsive" style="max-height: 320px; overflow-y: auto;">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="position: sticky; top: 0; background-color: #f8f9fc; z-index: 1;">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span class="badge badge-{{ $user->role == 'ADMIN' ? 'success' : 'info' }}">
                                                {{ $user->role }}
                                            </span>
                                            @if($user->role === 'ADMIN')
                                                <small class="text-muted d-block">System Administrator</small>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            @if($user->id !== auth()->id() && $user->role !== 'ADMIN')
                                                <form action="{{ route('users.delete', $user->id) }}" method="GET" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus staff ini?')">Delete</button>
                                                </form>
                                            @elseif($user->role === 'ADMIN')
                                                <span class="badge badge-secondary">Protected</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data user</td>
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
