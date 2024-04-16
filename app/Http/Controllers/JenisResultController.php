<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisResult;
use Carbon\Carbon; // save

class JenisResultController extends Controller
{
    public function index()
    {
        $jenisResults = JenisResult::all();
        return view('admin.jenis_result.index', compact('jenisResults'));
    }

    public function create()
    {
        return view('admin.jenis_result.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jenisResult' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'status' => 'required|boolean',
            'createdBy' => 'required|string|max:255',
        ]);

        // Set nilai createdOn ke tanggal saat ini
        $validatedData['createdOn'] = now();

        // Set nilai modifiedOn dan modifiedBy ke null
        $validatedData['modifiedOn'] = null;
        $validatedData['modifiedBy'] = null;

        // Simpan data baru ke database
        JenisResult::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.jenis_result.index')->with('success', 'Jenis result berhasil ditambahkan.');
    }


    public function edit(JenisResult $jenisResult)
    {
        return view('admin.jenis_result.edit', compact('jenisResult'));
    }

    public function update(Request $request, JenisResult $jenisResult)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jenisResult' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'status' => 'required|boolean',
            'modifiedBy' => 'required|string|max:255',
        ]);

        // Update kolom yang diubah
        $jenisResult->jenisResult = $validatedData['jenisResult'];
        $jenisResult->keterangan = $validatedData['keterangan'];
        $jenisResult->status = $validatedData['status'];
        $jenisResult->modifiedBy = $validatedData['modifiedBy'];

        // Set modifiedOn ke tanggal saat ini
        $jenisResult->modifiedOn = Carbon::now();

        // Simpan perubahan ke database
        $jenisResult->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.jenis_result.index')->with('success', 'Data jenis result berhasil diperbarui.');
    }

    public function destroy(JenisResult $jenisResult)
    {
        // Hapus data dari database
        $jenisResult->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.jenis_result.index')->with('success', 'Jenis result berhasil dihapus.');
    }
}
