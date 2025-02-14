<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /** @use HasFactory<\Database\Factories\GuruFactory> */
    use HasFactory;

    // Select table Name
    protected $table = 'guru';


    // protect field id
    protected $guarded = [
        'id'
    ];

    // Relation
    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class, 'guru_id', 'id');
    }

    public function guruKelas()
    {
        return $this->hasMany(GuruKelas::class, 'guru_id', 'id');
    }
}
