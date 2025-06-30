@extends('public.layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-main text-white py-5 text-center">
        <div class="container">
            <h1 class="display-5 fw-bold">Pangkalan Data Pendidikan Tinggi</h1>
            <p class="lead">Cari informasi mahasiswa, perguruan tinggi, dan program studi di seluruh Indonesia</p>
            <form class="row justify-content-center mt-4" action="{{ route('public.search') }}" method="GET">
                <div class="col-md-6 mb-2">
                    <input type="text" class="form-control py-3" placeholder="Masukkan NIM atau Nama Mahasiswa"
                        name="keyword" required>
                </div>
                <div class="col-md-auto">
                    <button type="submit" class="btn btn-light text-primary fw-semibold py-3">Cari</button>
                </div>
            </form>
        </div>
    </section>

    <div class="container my-5">

        {{-- Menu utama --}}
        <div class="row text-center mb-4">
            <div class="col-md-4 col-6 mb-3">
                <div class="py-5 px-3 shadow rounded-3 bg-white">
                    <x-bi-book class="icon-lg text-danger" />
                    <div class="fw-bold mt-2">Program Studi</div>
                </div>
            </div>
            <div class="col-md-4 col-6 mb-3">
                <div class="py-5 px-3 shadow rounded-3 bg-white">
                    <x-bi-building class="icon-lg text-primary" />
                    <div class="fw-bold mt-2">Perguruan Tinggi</div>
                </div>
            </div>
            <div class="col-md-4 col-6 mb-3">
                <div class="py-5 px-3 shadow rounded-3 bg-white">
                    <x-bi-bar-chart-line class="icon-lg text-warning" />
                    <div class="fw-bold mt-2">Statistik</div>
                </div>
            </div>
            <div class="col-md-4 col-6 mb-3">
                <div class="py-5 px-3 shadow rounded-3 bg-white">
                    <x-bi-book-half class="icon-lg text-pink" />
                    <div class="fw-bold mt-2">Publikasi</div>
                </div>
            </div>
            <div class="col-md-4 col-6 mb-3">
                <div class="py-5 px-3 shadow rounded-3 bg-white">
                    <x-bi-megaphone class="icon-lg text-secondary" />
                    <div class="fw-bold mt-2">Pengumuman</div>
                </div>
            </div>
            <div class="col-md-4 col-6 mb-3">
                <div class="py-5 px-3 shadow rounded-3 bg-white">
                    <x-bi-geo-alt class="icon-lg text-info" />
                    <div class="fw-bold mt-2">Peta</div>
                </div>
            </div>
        </div>

        {{-- Banner --}}
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="p-4 rounded text-white bg-gradient-main">
                    <div class="d-flex align-items-center">
                        <x-bi-lightbulb-fill class="icon-lg me-3" />
                        <div>
                            <div class="fw-bold">Ada kendala terkait data Pendidikan Tinggi?</div>
                            <div>Cari informasi <a href="#" class="text-white fw-bold text-decoration-underline">di
                                    sini!</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="p-4 rounded text-white bg-gradient-main">
                    <div class="d-flex align-items-center">
                        <x-bi-search class="icon-lg me-3" />
                        <div>
                            <div class="fw-bold">Cari tahu perbedaannya!</div>
                            <div>Komparasi perguruan tinggi dan program studi impianmu <a href="#"
                                    class="text-white fw-bold text-decoration-underline">di sini!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bidang ilmu --}}
        <h5 class="fw-bold mb-3">Bidang Ilmu Terpopuler</h5>
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="p-3 shadow rounded bg-white">
                    <div class="fw-bold">Pendidikan</div>
                    <div>Total Lulusan Mahasiswa: <strong>11.489.637</strong></div>
                    <div>Persentase Lulusan: <strong>58,29%</strong></div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="p-3 shadow rounded bg-white">
                    <div class="fw-bold">Ekonomi</div>
                    <div>Total Lulusan Mahasiswa: <strong>8.761.406</strong></div>
                    <div>Persentase Lulusan: <strong>52,27%</strong></div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="p-3 shadow rounded bg-white">
                    <div class="fw-bold">Teknik</div>
                    <div>Total Lulusan Mahasiswa: <strong>7.879.145</strong></div>
                    <div>Persentase Lulusan: <strong>50,40%</strong></div>
                </div>
            </div>
        </div>

        {{-- Statistik --}}
        <h5 class="fw-bold mb-3">Statistik</h5>
        <div class="row text-white">
            <div class="col-md-3 mb-3">
                <div class="p-4 rounded text-center" style="background-color: #06b6d4;">
                    <x-bi-person class="icon-lg" />
                    <div>Mahasiswa</div>
                    <div class="fw-bold fs-5">0</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="p-4 rounded text-center" style="background-color: #f59e0b;">
                    <x-bi-person-badge class="icon-lg" />
                    <div>Dosen</div>
                    <div class="fw-bold fs-5">333.418</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="p-4 rounded text-center" style="background-color: #10b981;">
                    <x-bi-building class="icon-lg" />
                    <div>Perguruan Tinggi</div>
                    <div class="fw-bold fs-5">4.379</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="p-4 rounded text-center" style="background-color: #d946ef;">
                    <x-bi-book class="icon-lg" />
                    <div>Program Studi</div>
                    <div class="fw-bold fs-5">34.689</div>
                </div>
            </div>
        </div>
    </div>

@endsection