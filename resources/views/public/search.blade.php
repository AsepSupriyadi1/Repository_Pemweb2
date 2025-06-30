@extends('public.layouts.app')

@section('content')
    <div class="container my-5">
        <h3>Hasil Pencarian: {{ $keyword }}</h3>

        {{-- Table Dosen --}}
        <div class="card mt-4">
            <div class="card-header bg-gradient-main text-white p-4 fs-2 text-center fw-medium">
                Perguruan Tinggi
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Perguruan Tinggi </th>
                            <th>Website</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kampus as $item)
                            <tr>
                                <td>{{ $item->kode_pt }}</td>
                                <td>{{ $item->nama_kampus }}</td>
                                <td>
                                    <a href=" {{ $item->website }}">website</a>
                                </td>
                                <td>
                                    <a href=" {{ $item->alamat }}">alamat</a>
                                </td>
                                <td><a href="#" class="text-decoration-none">Detail</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">❗ Data tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Table Mahasiswa --}}
        <div class="card mt-4">
            <div class="card-header bg-gradient-main text-white p-4 fs-2 text-center fw-medium">
                Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Perguruan Tinggi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswa as $item)
                            <tr>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->program_studi }}</td>
                                <td>{{ $item->kampus->nama_kampus }}</td>
                                <td><a href="#" class="text-decoration-none">Detail</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">❗ Data tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection