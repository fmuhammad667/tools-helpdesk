<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    protected $table = 'aplikasi'; // Nama tabel dalam database

    protected $primaryKey = 'id'; // Kolom primary key

    protected $fillable = [
        'namaAplikasi', 
        'namaModul', 
        'keterangan', 
        'url', 
        'jenis_result', 
        'jenis_parameter', 
        'status', 
        'createdOn', 
        'createdBy', 
        'modifiedOn', 
        'modifiedBy'
    ]; // Kolom yang dapat diisi secara massal

    protected $dates = [
        'createdOn', 
        'modifiedOn'
    ]; // Kolom dengan tipe data date/datetime

    public $timestamps = true; // Untuk mengaktifkan/menonaktifkan kolom timestamps default Laravel

    // Aturan validasi
    public static $rules = [
        'namaAplikasi' => 'required|string|max:50',
        'namaModul' => 'required|string|max:50',
        'keterangan' => 'required|string',
        'url' => 'required|string',
        'jenis_result' => 'required|exists:jenis_result,id',
        'jenis_parameter' => 'required|exists:jenis_parameter,id',
        'status' => 'required|boolean',
        'createdOn' => 'required|date',
        'createdBy' => 'nullable|string|max:50',
        'modifiedOn' => 'nullable|date',
        'modifiedBy' => 'nullable|string|max:50',
    ];

    // Relasi ke tabel jenis_result
    public function jenisResult()
    {
        return $this->belongsTo('App\Models\JenisResult', 'jenis_result');
    }

    // Relasi ke tabel jenis_parameter
    public function jenisParameter()
    {
        return $this->belongsTo('App\Models\JenisParameter', 'jenis_parameter');
    }
}
