<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUsaha extends Model
{
    use HasFactory;

    protected $table = 'jenis_usaha';
    protected $primaryKey = 'id_jenis_usaha';
    protected $fillable = [
        'nama_jenis_usaha'
    ];

    public function deskripsiUsaha()
    {
        return $this->hasMany(DeskripsiUsaha::class);
    }
}
