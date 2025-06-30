<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return view('dosen.index');
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        // Logic to store dosen data
        return redirect()->route('dosen.index');
    }

    public function edit($id)
    {
        return view('dosen.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update dosen data
        return redirect()->route('dosen.index');
    }

    public function destroy($id)
    {
        // Logic to delete dosen data
        return redirect()->route('dosen.index');
    }
    
}
