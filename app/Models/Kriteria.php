<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    // public function hasil()
    // {
    //     return $this->hasMany(Hasil::class);
    // }
}
