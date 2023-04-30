<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPengajuan extends Model
{
    use HasFactory;

    protected $table = 'status_pengajuan';
    protected $primaryKey = 'id_status_pengajuan';
    protected $fillable = [
        'status_pengajuan'
    ];

    public function deskripsiUsaha()
    {
        return $this->hasMany(DeskripsiUsaha::class);
    }
}
