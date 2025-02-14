<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    /** @use HasFactory<\Database\Factories\KelasFactory> */
    use HasFactory;

    // Select table Name
    protected $table = 'kelas';


    // protect field id
    protected $guarded = [
        'id'
    ];

    // Declare Relation
}
