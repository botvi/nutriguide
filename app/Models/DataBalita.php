<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBalita extends Model
{
    use HasFactory;
    protected $fillable = [
        'ibu_id',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'nomor_identitas_anak',
        'rentang_umur',
        'detail_umur',
    ];

    public function ibu()
{
    return $this->belongsTo(IbuBalita::class);
}

public function ibuanak()
    {
        return $this->belongsTo(IbuBalita::class, 'ibu_id', 'id');
    }

}
