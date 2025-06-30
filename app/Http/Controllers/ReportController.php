<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Kampus;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display the report form
     */
    public function index()
    {
        $kampuses = Kampus::all();
        $angkatans = Mahasiswa::select('angkatan')
            ->distinct()
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan');
        
        return view('private.reports.index', compact('kampuses', 'angkatans'));
    }

    /**
     * Generate report based on filters
     */
    public function generate(Request $request)
    {
        $request->validate([
            'kampus_id' => 'nullable|exists:kampuses,id',
            'angkatan' => 'nullable|string',
            'format' => 'required|in:pdf,view'
        ]);

        $query = Mahasiswa::with('kampus');

        // Apply filters
        if ($request->kampus_id) {
            $query->where('kampus_id', $request->kampus_id);
        }

        if ($request->angkatan) {
            $query->where('angkatan', $request->angkatan);
        }

        $mahasiswas = $query->get();
        $kampus = $request->kampus_id ? Kampus::find($request->kampus_id) : null;
        $angkatan = $request->angkatan;

        // Generate statistics
        $statistics = $this->generateStatistics($mahasiswas);

        if ($request->format === 'pdf') {
            return $this->generatePDF($mahasiswas, $kampus, $angkatan, $statistics);
        }

        return view('private.reports.view', compact('mahasiswas', 'kampus', 'angkatan', 'statistics'));
    }

    /**
     * Generate PDF report
     */
    private function generatePDF($mahasiswas, $kampus, $angkatan, $statistics)
    {
        $data = [
            'mahasiswas' => $mahasiswas,
            'kampus' => $kampus,
            'angkatan' => $angkatan,
            'statistics' => $statistics,
            'generated_at' => now()->format('d/m/Y H:i:s')
        ];

        $pdf = PDF::loadView('private.reports.pdf', $data);
        $pdf->setPaper('A4', 'portrait');

        $filename = 'laporan-mahasiswa-' . 
                   ($kampus ? $kampus->nama_kampus . '-' : '') . 
                   ($angkatan ? $angkatan . '-' : '') . 
                   now()->format('Y-m-d-H-i-s') . '.pdf';

        return $pdf->download($filename);
    }

    /**
     * Generate statistics from the data
     */
    private function generateStatistics($mahasiswas)
    {
        $statistics = [
            'total_mahasiswa' => $mahasiswas->count(),
            'jenis_kelamin' => [
                'laki_laki' => $mahasiswas->where('jenis_kelamin', 'Laki-laki')->count(),
                'perempuan' => $mahasiswas->where('jenis_kelamin', 'Perempuan')->count(),
            ],
            'status_mahasiswa' => $mahasiswas->groupBy('status_mahasiswa')->map->count(),
            'program_studi' => $mahasiswas->groupBy('program_studi')->map->count(),
            'fakultas' => $mahasiswas->groupBy('fakultas')->map->count(),
            'kampus' => $mahasiswas->groupBy('kampus.nama_kampus')->map->count(),
        ];

        return $statistics;
    }

    /**
     * Get summary statistics for dashboard
     */
    public function summary()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalKampus = Kampus::count();
        $angkatanTerbaru = Mahasiswa::max('angkatan');
        $angkatanTerlama = Mahasiswa::min('angkatan');

        $mahasiswaPerKampus = Mahasiswa::select('kampuses.nama_kampus', DB::raw('count(*) as total'))
            ->join('kampuses', 'mahasiswas.kampus_id', '=', 'kampuses.id')
            ->groupBy('kampuses.id', 'kampuses.nama_kampus')
            ->get();

        $mahasiswaPerAngkatan = Mahasiswa::select('angkatan', DB::raw('count(*) as total'))
            ->groupBy('angkatan')
            ->orderBy('angkatan', 'desc')
            ->get();

        return view('private.reports.summary', compact(
            'totalMahasiswa', 
            'totalKampus', 
            'angkatanTerbaru', 
            'angkatanTerlama',
            'mahasiswaPerKampus',
            'mahasiswaPerAngkatan'
        ));
    }
}
