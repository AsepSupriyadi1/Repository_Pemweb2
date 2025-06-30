<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'kampus_id',
        'nidn',
        'nama',
        'gelar_akademik',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'program_studi',
        'jabatan_fungsional',
        'status_dosen',
    ];

    public function kampus()
    {
        return $this->belongsTo(Kampus::class);
    }
}
