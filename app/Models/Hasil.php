<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nilai',
        'user_id',
        'tgl_nilai',
        'saran',
        'grade',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
