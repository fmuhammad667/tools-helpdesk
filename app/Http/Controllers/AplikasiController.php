<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplikasi;
use Carbon\Carbon;
use App\Models\JenisResult;
use App\Models\JenisParameter;

class AplikasiController extends Controller
{
    public function index()
    {
        $aplikasis = Aplikasi::all();
        return view('admin.aplikasi.index', compact('aplikasis'));
    }

    public function create()
    {
        $jenisResults = JenisResult::all();
        $jenisParameters = JenisParameter::all();
        return view('admin.aplikasi.create', compact('jenisResults', 'jenisParameters'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'namaAplikasi' => 'required|string|max:50',
            'namaModul' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'url' => 'required|string',
            'jenis_result' => 'required|exists:jenis_result,id',
            'jenis_parameter' => 'required|exists:jenis_parameter,id',
            'status' => 'required|boolean',
            'createdBy' => 'required|string|max:50',
            'modifiedBy' => 'nullable|string|max:50',
        ]);

        // Set nilai createdOn ke tanggal saat ini
        $validatedData['createdOn'] = now();

        // Set nilai modifiedOn ke null
        $validatedData['modifiedOn'] = null;

        // Simpan data baru ke database
        Aplikasi::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.aplikasi.index')->with('success', 'Aplikasi berhasil ditambahkan.');
    }

    public function edit(Aplikasi $aplikasi)
    {
        $jenisResults = JenisResult::all();
        $jenisParameters = JenisParameter::all();
        return view('admin.aplikasi.edit', compact('aplikasi','jenisResults', 'jenisParameters'));
    }

    public function update(Request $request, Aplikasi $aplikasi)
    {
        // Validasi input
        $validatedData = $request->validate([
            'namaAplikasi' => 'required|string|max:50',
            'namaModul' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'url' => 'required|string',
            'jenis_result' => 'required|exists:jenis_result,id',
            'jenis_parameter' => 'required|exists:jenis_parameter,id',
            'status' => 'required|boolean',
            'modifiedBy' => 'required|string|max:50',
        ]);

        // Update kolom yang diubah
        $aplikasi->namaAplikasi = $validatedData['namaAplikasi'];
        $aplikasi->namaModul = $validatedData['namaModul'];
        $aplikasi->keterangan = $validatedData['keterangan'];
        $aplikasi->url = $validatedData['url'];
        $aplikasi->jenis_result = $validatedData['jenis_result'];
        $aplikasi->jenis_parameter = $validatedData['jenis_parameter'];
        $aplikasi->status = $validatedData['status'];
        $aplikasi->modifiedBy = $validatedData['modifiedBy'];

        // Set modifiedOn ke tanggal saat ini
        $aplikasi->modifiedOn = Carbon::now();

        // Simpan perubahan ke database
        $aplikasi->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.aplikasi.index')->with('success', 'Data aplikasi berhasil diperbarui.');
    }

    public function destroy(Aplikasi $aplikasi)
    {
        // Hapus data dari database
        $aplikasi->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.aplikasi.index')->with('success', 'Aplikasi berhasil dihapus.');
    }
}
