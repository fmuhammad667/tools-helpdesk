<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisParameter;
use Carbon\Carbon; // save

class JenisParameterController extends Controller
{
    public function index()
    {
        $jenisParameters = JenisParameter::all();
        return view('admin.jenis_parameter.index', compact('jenisParameters'));
    }

    public function create()
    {
        return view('admin.jenis_parameter.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jenisParameter' => 'required|string|max:50',
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
        JenisParameter::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.jenis_parameter.index')->with('success', 'Jenis parameter berhasil ditambahkan.');
    }


    public function edit(JenisParameter $jenisParameter)
    {
        return view('admin.jenis_parameter.edit', compact('jenisParameter'));
    }

    public function update(Request $request, JenisParameter $jenisParameter)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jenisParameter' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'status' => 'required|boolean',
            'modifiedBy' => 'required|string|max:255',
        ]);

        // Update kolom yang diubah
        $jenisParameter->jenisParameter = $validatedData['jenisParameter'];
        $jenisParameter->keterangan = $validatedData['keterangan'];
        $jenisParameter->status = $validatedData['status'];
        $jenisParameter->modifiedBy = $validatedData['modifiedBy'];

        // Set modifiedOn ke tanggal saat ini
        $jenisParameter->modifiedOn = Carbon::now();

        // Simpan perubahan ke database
        $jenisParameter->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.jenis_parameter.index')->with('success', 'Data jenis parameter berhasil diperbarui.');
    }

    public function destroy(JenisParameter $jenisParameter)
    {
        // Hapus data dari database
        $jenisParameter->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.jenis_parameter.index')->with('success', 'Jenis parameter berhasil dihapus.');
    }
}
