<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
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
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
}
