<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruKelas extends Model
{
    /** @use HasFactory<\Database\Factories\GuruKelasFactory> */
    use HasFactory;

    // Select table Name
    protected $table = 'guru_kelas';


    // protect field id
    protected $guarded = [
        'id'
    ];

    // Declare Relation
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
}
