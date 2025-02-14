<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /** @use HasFactory<\Database\Factories\KelasFactory> */
    use HasFactory;

    // Select table Name
    protected $table = 'kelas';


    // protect field id
    protected $guarded = [
        'id'
    ];

    // Relation
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'id');
    }

    public function guruKelas()
    {
        return $this->hasMany(GuruKelas::class, 'kelas_id', 'id');
    }
}
