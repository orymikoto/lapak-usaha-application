<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusPendanaan extends Model
{
  use HasFactory;

  protected $table = 'status_pendanaan';
  protected $primaryKey = 'id_status_pendanaan';
  protected $fillable = [
    'nama_status'
  ];

  public function proyekPendaan(): HasMany
  {
    return $this->hasMany(ProyekPendanaan::class);
  }
}
