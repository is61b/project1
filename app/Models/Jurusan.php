<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jurusan extends Model
{
    use HasFactory;

    public function mahasiswas(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
