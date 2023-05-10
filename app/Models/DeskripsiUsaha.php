<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeskripsiUsaha extends Model
{
  use HasFactory;

  protected $table = 'deskripsi_usaha';
  protected $primaryKey = 'id_deskripsi_usaha';
  protected $fillable = [
    'nama_usaha',
    'tahun_berdiri',
    'periode_produksi',
    'deskripsi',
    'target_dana',
    'foto_usaha',
    'proposal',
    'id_pemilik_usaha',
    'id_jenis_usaha',
    'id_status_pengajuan'
  ];

  public function pemilikUsaha()
  {
    return $this->belongsTo(pemilikUsaha::class, 'id_pemilik_usaha', 'id_pemilik_usaha');
  }

  public function jenisUsaha()
  {
    return $this->belongsTo(JenisUsaha::class, 'id_jenis_usaha', 'id_jenis_usaha');
  }

  public function statusPengajuan()
  {
    return $this->belongsTo(StatusPengajuan::class, 'id_status_pengajuan', 'id_status_pengajuan');
  }

  public function proyekPendanaan(): HasMany
  {
    return $this->hasMany(ProyekPendanaan::class);
  }
}
