<?php

namespace App\Http\Controllers;

use App\Models\DummyData;
use App\Models\Kampus;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = strtolower($request->query('keyword'));

        $dosenFiltered = collect(DummyData::dosenList())->filter(function ($item) use ($keyword) {
            return str_contains(strtolower($item['nama']), $keyword);
        });

        $mahasiswaFiltered = collect(DummyData::mahasiswaList())->filter(function ($item) use ($keyword) {
            return str_contains(strtolower($item['nama']), $keyword);
        });

        return view('public.search', [
            'dosen' => $dosenFiltered,
            'mahasiswa' => $mahasiswaFiltered,
            'keyword' => $request->query('keyword')
        ]);
    }

    public function search(Request $request)
    {
        // Ambil data pencarian dari input
        $keyword = strtolower($request->query('keyword'));

        // Cari data mahasiswa berdasarkan nim atau nama
        $mahasiswa = Mahasiswa::where('nim', 'like', '%' . $keyword . '%')
            ->orWhere('nama', 'like', '%' . $keyword . '%')
            ->get();

        // Cari data kampus berdasarkan nama kampus
        $kampus = Kampus::where('nama_kampus', 'like', '%' . $keyword . '%')->get();

        // Cari data dosen berdasarkan nidn atau nama
        $dosen = Dosen::with('kampus')
            ->where('nidn', 'like', '%' . $keyword . '%')
            ->orWhere('nama', 'like', '%' . $keyword . '%')
            ->get();

        // Kirim data mahasiswa, kampus, dan dosen ke view
        return view('public.search', compact('mahasiswa', 'kampus', 'dosen', 'keyword'));
    }

}
