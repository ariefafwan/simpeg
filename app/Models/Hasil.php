<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    // public function kriteria()
    // {
    //     return $this->belongsTo(Kriteria::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
