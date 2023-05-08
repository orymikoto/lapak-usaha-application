<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProyekPendanaan extends Model
{
  use HasFactory;

  protected $table = 'deskripsi_usaha';
  protected $primaryKey = 'id_deskripsi_usaha';
  protected $fillable = [
    'jumlah_dana',
    'file_kontrak_admin',
    'file_kontrak_pengusaha',
    'file_kontrak_pendana',
    'nominal_bagi_hasil',
    'bukti_bagi_hasil',
    'id_deskripsi_usaha',
    'id_pemilik_usaha',
    'id_pendana',
    'id_status_pendanaan'
  ];

  public function pemilikUsaha(): BelongsTo
  {
    return $this->belongsTo(pemilikUsaha::class);
  }
  public function deskripsiUsaha(): BelongsTo
  {
    return $this->belongsTo(DeskripsiUsaha::class);
  }

  public function Pendana(): BelongsTo
  {
    return $this->belongsTo(Pendana::class);
  }

  public function statusPenndanaan(): BelongsTo
  {
    return $this->belongsTo(statusPenndanaan::class);
  }

  public function pembayaran(): HasOne
  {
    return $this->hasOne(Pembayaran::class);
  }

  public function riwayatProyek(): HasOne
  {
    return $this->hasOne(RiwayatProyek::class);
  }

  public function progresPendanaan(): HasMany
  {
    return $this->hasMany(ProgresPendanaan::class);
  }

  public function pencairanDana(): HasMany
  {
    return $this->hasMany(pencairanDana::class);
  }
}
