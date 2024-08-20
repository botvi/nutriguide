<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlans extends Model
{
    use HasFactory;
    protected $fillable = [
        'rentang_umur',
        'waktu_makan',
        'menu',
        'bahan_makanan'
    ];

    protected $casts = [
        'bahan_makanan' => 'array',
    ];
}
