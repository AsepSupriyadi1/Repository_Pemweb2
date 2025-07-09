<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use Illuminate\Http\Request;

class KampusController extends Controller
{
    public function index()
    {
        // Ambil semua data kampus dari database
        $kampus = Kampus::orderBy('created_at', 'desc')->get();

        // Kirim data kampus ke view
        return view('private.kampus.index', compact('kampus'));
    }

    public function create()
    {
        return view('private.kampus.create');
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'kode_pt' => 'required|string|max:10',
            'nama_kampus' => 'required|string|max:255',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'notelp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        try {
            // Buat instance Kampus
            $kampus = new Kampus();
            $kampus->kode_pt = $request->kode_pt;
            $kampus->nama_kampus = $request->nama_kampus;
            $kampus->provinsi = $request->provinsi;
            $kampus->kota = $request->kota;
            $kampus->telepon = $request->notelp;
            $kampus->email = $request->email;
            $kampus->website = $request->website;
            $kampus->alamat = $request->alamat;

            // Simpan data ke database
            $kampus->save();

            // Tampilkan pesan sukses dan redirect ke halaman index
            session()->flash('success', 'Kampus created successfully.');
            return redirect()->route('kampus.index');

        } catch (\Exception $e) {

            // Tampilkan pesan error jika terjadi kesalahan saat menyimpan data
            session()->flash('error', 'An error occurred while saving the data: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        // Cari data kampus berdasarkan ID
        $kampus = Kampus::findOrFail($id);

        // Kirim data kampus ke view
        return view('private.kampus.edit', compact('kampus'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'kode_pt' => 'required|string|max:10',
            'nama_kampus' => 'required|string|max:255',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'notelp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        try {
            // Cari data kampus berdasarkan ID
            $kampus = Kampus::findOrFail($id);
            $kampus->kode_pt = $request->kode_pt;
            $kampus->nama_kampus = $request->nama_kampus;
            $kampus->provinsi = $request->provinsi;
            $kampus->kota = $request->kota;
            $kampus->telepon = $request->notelp;
            $kampus->email = $request->email;
            $kampus->website = $request->website;
            $kampus->alamat = $request->alamat;

            // Simpan data ke database
            $kampus->save();

            // Tampilkan pesan sukses dan redirect ke halaman index
            session()->flash('success', 'Kampus updated successfully.');
            return redirect()->route('kampus.index');
        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi kesalahan saat memperbarui data
            session()->flash('error', 'An error occurred while updating the data: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {

        try {
            // Cari data kampus berdasarkan ID
            $kampus = Kampus::findOrFail($id);

            // Hapus data kampus dari database
            $kampus->delete();

            // Tampilkan pesan sukses dan redirect ke halaman index
            session()->flash('success', 'Kampus deleted successfully.');
        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi kesalahan saat menghapus data
            session()->flash('error', 'An error occurred while deleting the data: ' . $e->getMessage());
        }

        return redirect()->route('kampus.index');
    }

}
