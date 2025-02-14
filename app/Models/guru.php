<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    /** @use HasFactory<\Database\Factories\GuruFactory> */
    use HasFactory;

    // Select table Name
    protected $table = 'guru';


    // protect field id
    protected $guarded = [
        'id'
    ];
}
