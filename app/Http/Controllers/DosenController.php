<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Kampus;

class DosenController extends Controller
{
    public function index()
    {
        // Ambil semua data dosen dari database
        $dosens = Dosen::with('kampus')->orderBy('created_at', 'desc')->get();

        // Kirim data dosen ke view
        return view('private.dosen.index', compact('dosens'));
    }

    public function create()
    {
        // Kirim data list kampus ke view
        $list_kampus = Kampus::all();

        return view('private.dosen.create', compact('list_kampus'));
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'kampus_id' => 'required|exists:kampuses,id',
            'nidn' => 'required|string|max:20|unique:dosens,nidn',
            'nama' => 'required|string|max:255',
            'gelar_akademik' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'program_studi' => 'required|string|max:100',
            'jabatan_fungsional' => 'required|string|max:100',
            'status_dosen' => 'required|in:Tetap,Tidak Tetap',
        ]);

        try {
            // Buat instance Dosen
            $dosen = new Dosen();
            // Set data dosen
            $dosen->kampus_id = $request->kampus_id;
            $dosen->nidn = $request->nidn;
            $dosen->nama = $request->nama;
            $dosen->gelar_akademik = $request->gelar_akademik;
            $dosen->jenis_kelamin = $request->jenis_kelamin;
            $dosen->tanggal_lahir = $request->tanggal_lahir;
            $dosen->tempat_lahir = $request->tempat_lahir;
            $dosen->program_studi = $request->program_studi;
            $dosen->jabatan_fungsional = $request->jabatan_fungsional;
            $dosen->status_dosen = $request->status_dosen;

            // Simpan data ke database
            $dosen->save();

            // Tampilkan pesan sukses dan redirect ke halaman index
            session()->flash('success', 'Dosen created successfully.');
            // Redirect ke halaman index dosen
            return redirect()->route('dosen.index');

        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi kesalahan saat menyimpan data
            session()->flash('error', 'An error occurred while saving the data: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        // Cari data dosen berdasarkan ID
        $dosen = Dosen::findOrFail($id);

        // Kirim data dosen dan list kampus ke view
        $list_kampus = Kampus::all();

        // Kirim data dosen dan list kampus ke view
        return view('private.dosen.edit', compact('dosen', 'list_kampus'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'kampus_id' => 'required|exists:kampuses,id',
            'nama' => 'required|string|max:255',
            'gelar_akademik' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'program_studi' => 'required|string|max:100',
            'jabatan_fungsional' => 'required|string|max:100',
            'status_dosen' => 'required|in:Tetap,Tidak Tetap',
        ]);

        try {
            // Cari data dosen berdasarkan ID
            $dosen = Dosen::findOrFail($id);
            // Update data dosen
            $dosen->kampus_id = $request->kampus_id;
            $dosen->nama = $request->nama;
            $dosen->gelar_akademik = $request->gelar_akademik;
            $dosen->jenis_kelamin = $request->jenis_kelamin;
            $dosen->tanggal_lahir = $request->tanggal_lahir;
            $dosen->tempat_lahir = $request->tempat_lahir;
            $dosen->program_studi = $request->program_studi;
            $dosen->jabatan_fungsional = $request->jabatan_fungsional;
            $dosen->status_dosen = $request->status_dosen;

            // Update data ke database
            $dosen->save();

            // Tampilkan pesan sukses dan redirect ke halaman index
            session()->flash('success', 'Dosen updated successfully.');
            return redirect()->route('dosen.index');
        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi kesalahan saat memperbarui data
            session()->flash('error', 'An error occurred while updating the data: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            // Cari data dosen berdasarkan ID
            $dosen = Dosen::findOrFail($id);

            // Hapus data dosen dari database
            $dosen->delete();

            // Tampilkan pesan sukses dan redirect ke halaman index
            session()->flash('success', 'Dosen deleted successfully.');
        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi kesalahan saat menghapus data
            session()->flash('error', 'An error occurred while deleting the data: ' . $e->getMessage());
        }

        return redirect()->route('dosen.index');
    }
}
