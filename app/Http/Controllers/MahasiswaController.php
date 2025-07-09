<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Ambil semua data mahasiswa dari database
        $mahasiswas = Mahasiswa::orderBy('created_at', 'desc')->get();

        // Kirim data mahasiswa ke view
        return view('private.mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        // Kirim data list kampus ke view
        $list_kampus = Kampus::all();

        return view('private.mahasiswa.create', compact('list_kampus'));
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'kampus_id' => 'required|exists:kampuses,id',
            'nim' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'program_studi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'angkatan' => 'required|integer|min:1900|max:2100',
            'status_mahasiswa' => 'required|in:Aktif,Cuti,Lulus,DO',
        ]);

        try {
            // Buat instance Mahasiswa
            $mahasiswa = new Mahasiswa();
            // Set data mahasiswa
            $mahasiswa->kampus_id = $request->kampus_id;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
            $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
            $mahasiswa->tempat_lahir = $request->tempat_lahir;
            $mahasiswa->program_studi = $request->program_studi;
            $mahasiswa->fakultas = $request->fakultas;
            $mahasiswa->angkatan = $request->angkatan;
            $mahasiswa->status_mahasiswa = $request->status_mahasiswa;

            // Simpan data ke database
            $mahasiswa->save();

            // Tampilkan pesan sukses dan redirect ke halaman index
            session()->flash('success', 'Mahasiswa created successfully.');
            // Redirect ke halaman index mahasiswa
            return redirect()->route('mahasiswa.index');

        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi kesalahan saat menyimpan data
            session()->flash('error', 'An error occurred while saving the data: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        // Cari data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Kirim data mahasiswa dan list kampus ke view
        $list_kampus = Kampus::all();

        // Kirim data mahasiswa dan list kampus ke view
        return view('private.mahasiswa.edit', compact('mahasiswa', 'list_kampus'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'kampus_id' => 'required|exists:kampuses,id',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'program_studi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'angkatan' => 'required|integer|min:1900|max:2100',
            'status_mahasiswa' => 'required|in:Aktif,Cuti,Lulus,DO',
        ]);

        try {
            // Cari data mahasiswa berdasarkan ID
            $mahasiswa = Mahasiswa::findOrFail($id);
            // Update data mahasiswa
            $mahasiswa->kampus_id = $request->kampus_id;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
            $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
            $mahasiswa->tempat_lahir = $request->tempat_lahir;
            $mahasiswa->program_studi = $request->program_studi;
            $mahasiswa->fakultas = $request->fakultas;
            $mahasiswa->angkatan = $request->angkatan;
            $mahasiswa->status_mahasiswa = $request->status_mahasiswa;


            // Update data ke database
            $mahasiswa->save();

            // Tampilkan pesan sukses dan redirect ke halaman index
            session()->flash('success', 'Mahasiwswa updated successfully.');
            return redirect()->route('mahasiswa.index');
        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi kesalahan saat memperbarui data
            session()->flash('error', 'An error occurred while updating the data: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            // Cari data mahasiswa berdasarkan ID
            $mahasiswa = Mahasiswa::findOrFail($id);

            // Hapus data mahasiswa dari database
            $mahasiswa->delete();

            // Tampilkan pesan sukses dan redirect ke halaman index
            session()->flash('success', 'Mahasiswa deleted successfully.');
        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi kesalahan saat menghapus data
            session()->flash('error', 'An error occurred while deleting the data: ' . $e->getMessage());
        }

        return redirect()->route('mahasiswa.index');
    }
}
