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

  protected $table = 'proyek_pendanaan';
  protected $primaryKey = 'id_proyek_pendanaan';
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
    return $this->belongsTo(PemilikUsaha::class, 'id_pemilik_usaha', 'id_pemilik_usaha');
  }
  public function deskripsiUsaha(): BelongsTo
  {
    return $this->belongsTo(DeskripsiUsaha::class, 'id_deskripsi_usaha', 'id_deskripsi_usaha');
  }

  public function Pendana(): BelongsTo
  {
    return $this->belongsTo(Pendana::class, 'id_pendana', 'id_pendana');
  }

  public function statusPendanaan(): BelongsTo
  {
    return $this->belongsTo(StatusPendanaan::class);
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
    return $this->hasMany(PencairanDana::class);
  }
}
