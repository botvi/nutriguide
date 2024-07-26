<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kategori_makanan_id',
        'komposisi_gizi',
        'ukuran_porsi',
    ];

    public function kategori()
{
    return $this->belongsTo(KategoriMakanan::class, 'kategori_makanan_id');
}

}
