<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'kampus_id',
        'nim',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'program_studi',
        'fakultas',
        'angkatan',
        'status_mahasiswa',
    ];

    public function kampus()
    {
        return $this->belongsTo(Kampus::class);
    }
}
