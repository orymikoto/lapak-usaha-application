<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgresPendanaan extends Model
{
  use HasFactory;
  protected $table = 'progres_pendanaan';
  protected $primaryKey = 'id_progres_pendanaan';
  protected $fillable = [
    'tanggal_laporan_progres_pendanaan',
    'keterangan',
    'laporan_keuangan',
    'id_proyek_pendanaan'
  ];

  public function proyekPendanaan(): BelongsTo
  {
    return $this->belongsTo(ProyekPendanaan::class);
  }
}
