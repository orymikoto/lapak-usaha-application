<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = 'bank';
    protected $primaryKey = 'id_bank';
    protected $fillable = [
        'nama_bank'
    ];

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

    public function pemilikUsaha()
    {
        return $this->hasMany(PemilikUsaha::class);
    }

    public function pendana()
    {
        return $this->hasMany(Pendana::class);
    }
}
