<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisResult extends Model
{
    protected $table = 'jenis_result'; // Nama tabel dalam database

    protected $primaryKey = 'id'; // Kolom primary key

    protected $fillable = [
        'jenisResult', 
        'keterangan', 
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
        'jenisResult' => 'required|string|max:50',
        'keterangan' => 'nullable|string',
        'status' => 'required|boolean',
        'createdOn' => 'required|date',
        'createdBy' => 'required|string|max:255',
        'modifiedOn' => 'nullable|date',
        'modifiedBy' => 'nullable|string|max:255',
    ];
}
