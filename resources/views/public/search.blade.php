@extends('public.layouts.app')

@section('content')
    <div class="container my-5">
        <h3>Hasil Pencarian: {{ $keyword }}</h3>        

        {{-- Search Bar --}}
        <div class="w-full row justify-content-left mt-4 mb-4">
            <div class="col-md-8">
                <form class="row g-3" action="{{ route('public.search') }}" method="GET">
                    <div class="col-md-10">
                        <input type="text" class="form-control py-2" 
                               placeholder="Masukkan NIM, Nama Mahasiswa, NIDN, atau Nama Dosen" 
                               name="keyword" 
                               value="{{ $keyword }}" 
                               required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary py-2">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Table Perguruan Tinggi --}}
        <div class="card mt-4">
            <div class="card-header bg-gradient-main text-white p-4 fs-2 text-center fw-medium">
                Perguruan Tinggi
            </div>
            <div class="card-body">
                <table id="kampusTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Perguruan Tinggi</th>
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
                                    <a href="{{ $item->website }}" target="_blank" class="text-decoration-none">{{ $item->website }}</a>
                                </td>
                                <td>{{ $item->alamat }}</td>
                                <td><a href="{{ route('public.kampus.detail', $item->id) }}" class="btn btn-sm btn-outline-primary">Detail</a></td>
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
                <table id="mahasiswaTable" class="table table-striped table-hover">
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
                                <td><a href="{{ route('public.mahasiswa.detail', $item->id) }}" class="btn btn-sm btn-outline-primary">Detail</a></td>
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

        {{-- Table Dosen --}}
        <div class="card mt-4">
            <div class="card-header bg-gradient-main text-white p-4 fs-2 text-center fw-medium">
                Dosen
            </div>
            <div class="card-body">
                <table id="dosenTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Gelar Akademik</th>
                            <th>Program Studi</th>
                            <th>Jabatan Fungsional</th>
                            <th>Perguruan Tinggi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dosen as $item)
                            <tr>
                                <td>{{ $item->nidn }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->gelar_akademik }}</td>
                                <td>{{ $item->program_studi }}</td>
                                <td>{{ $item->jabatan_fungsional }}</td>
                                <td>{{ $item->kampus->nama_kampus }}</td>
                                <td><a href="{{ route('public.dosen.detail', $item->id) }}" class="btn btn-sm btn-outline-primary">Detail</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">❗ Data tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTables for each table only if they have data
            @if($kampus->count() > 0)
            $('#kampusTable').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-download"></i> Download CSV',
                        className: 'btn btn-success btn-sm',
                        filename: 'Data_Perguruan_Tinggi_{{ $keyword }}_{{ date("Y-m-d") }}',
                        exportOptions: {
                            columns: [0, 1, 2, 3] // Export all columns except action column
                        }
                    }
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                pageLength: 10,
                order: [[1, 'asc']], // Sort by nama kampus
                columnDefs: [
                    { targets: -1, orderable: false } // Disable sorting for action column
                ]
            });
            @endif

            @if($mahasiswa->count() > 0)
            $('#mahasiswaTable').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-download"></i> Download CSV',
                        className: 'btn btn-success btn-sm',
                        filename: 'Data_Mahasiswa_{{ $keyword }}_{{ date("Y-m-d") }}',
                        exportOptions: {
                            columns: [0, 1, 2, 3] // Export all columns except action column
                        }
                    }
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                pageLength: 10,
                order: [[1, 'asc']], // Sort by nama mahasiswa
                columnDefs: [
                    { targets: -1, orderable: false } // Disable sorting for action column
                ]
            });
            @endif

            @if($dosen->count() > 0)
            $('#dosenTable').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-download"></i> Download CSV',
                        className: 'btn btn-success btn-sm',
                        filename: 'Data_Dosen_{{ $keyword }}_{{ date("Y-m-d") }}',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5] // Export all columns except action column
                        }
                    }
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                pageLength: 10,
                order: [[1, 'asc']], // Sort by nama dosen
                columnDefs: [
                    { targets: -1, orderable: false } // Disable sorting for action column
                ]
            });
            @endif
        });
    </script>

@endsection