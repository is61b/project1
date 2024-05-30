<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    public function mahasiswas(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
