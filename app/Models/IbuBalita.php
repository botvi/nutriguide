<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuBalita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'nip', 'tanggal_lahir', 'alamat','foto', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function dataBalitas()
    {
        return $this->hasMany(DataBalita::class, 'ibu_id', 'id');
    }
}
