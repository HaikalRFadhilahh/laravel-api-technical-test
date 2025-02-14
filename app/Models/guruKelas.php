<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guruKelas extends Model
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
}
