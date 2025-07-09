<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kampus;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class DetailController extends Controller
{
    public function kampus($id)
    {
        // Get kampus data with related dosen and mahasiswa
        $kampus = Kampus::findOrFail($id);
        $dosens = Dosen::where('kampus_id', $id)->get();
        $mahasiswas = Mahasiswa::where('kampus_id', $id)->get();
        
        // Get statistics
        $stats = [
            'total_dosen' => $dosens->count(),
            'total_mahasiswa' => $mahasiswas->count(),
            'dosen_tetap' => $dosens->where('status_dosen', 'Tetap')->count(),
            'dosen_tidak_tetap' => $dosens->where('status_dosen', 'Tidak Tetap')->count(),
            'program_studi' => $dosens->pluck('program_studi')->merge($mahasiswas->pluck('program_studi'))->unique()->count(),
        ];

        return view('public.detail-kampus', compact('kampus', 'dosens', 'mahasiswas', 'stats'));
    }

    public function mahasiswa($id)
    {
        // Get mahasiswa data with kampus relationship
        $mahasiswa = Mahasiswa::with('kampus')->findOrFail($id);
        
        // Get other mahasiswa from same kampus and program studi
        $mahasiswaLain = Mahasiswa::where('kampus_id', $mahasiswa->kampus_id)
            ->where('program_studi', $mahasiswa->program_studi)
            ->where('id', '!=', $id)
            ->limit(5)
            ->get();
            
        // Get dosen from same kampus and program studi
        $dosenPengajar = Dosen::where('kampus_id', $mahasiswa->kampus_id)
            ->where('program_studi', $mahasiswa->program_studi)
            ->get();

        return view('public.detail-mahasiswa', compact('mahasiswa', 'mahasiswaLain', 'dosenPengajar'));
    }

    public function dosen($id)
    {
        // Get dosen data with kampus relationship
        $dosen = Dosen::with('kampus')->findOrFail($id);
        
        // Get other dosen from same kampus and program studi
        $dosenLain = Dosen::where('kampus_id', $dosen->kampus_id)
            ->where('program_studi', $dosen->program_studi)
            ->where('id', '!=', $id)
            ->limit(5)
            ->get();
            
        // Get mahasiswa from same kampus and program studi
        $mahasiswaProdi = Mahasiswa::where('kampus_id', $dosen->kampus_id)
            ->where('program_studi', $dosen->program_studi)
            ->get();

        return view('public.detail-dosen', compact('dosen', 'dosenLain', 'mahasiswaProdi'));
    }
}
