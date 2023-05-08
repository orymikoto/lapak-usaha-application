<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PemilikUsaha extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = 'pemilik_usaha';
  protected $primaryKey = 'id_pemilik_usaha';
  protected $fillable = [
    'username',
    'email',
    'password',
    'no_rekening',
    'id_bank',
    'nama',
    'no_hp',
    'no_ktp',
    'pekerjaan_sampingan',
    'alamat_rumah',
    'kecamatan',
    'kota',
    'provinsi',
  ];

  protected $hidden = [
    'password'
  ];

  public function bank(): BelongsTo
  {
    return $this->belongsTo(Bank::class);
  }

  public function deskripsiUsaha(): HasMany
  {
    return $this->hasMany(DeskripsiUsaha::class);
  }

  public function proyekPendanaan(): HasMany
  {
    return $this->hasMany(ProyekPendanaan::class);
  }
}
