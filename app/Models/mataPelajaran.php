<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mataPelajaran extends Model
{
    /** @use HasFactory<\Database\Factories\MataPelajaranFactory> */
    use HasFactory;

    // Select table Name
    protected $table = 'mata_pelajaran';


    // protect field id
    protected $guarded = [
        'id'
    ];

    // Declare Relation
}
