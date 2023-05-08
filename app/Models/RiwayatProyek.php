<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatProyek extends Model
{
  use HasFactory;
  protected $table = 'riwayat_proyek';
  protected $primaryKey = 'id_riwayat_proyek';
  protected $fillable = [
    'tanggal_mulai',
    'tanggal_selesai',
    'id_proyek_pendanaan'
  ];

  public function proyekPendanaan(): BelongsTo
  {
    return $this->belongsTo(ProyekPendanaan::class);
  }
}
