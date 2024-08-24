<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCek extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'rentang_umur',
        'waktu_makan',
        'menu',
        'bahan_makanan'
    ];

    protected $casts = [
        'bahan_makanan' => 'array',
    ];

    public function dataBalita()
    {
        return $this->belongsTo(DataBalita::class, 'user_id', 'id');
    }
}

