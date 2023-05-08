<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PencairanDana extends Model
{
  use HasFactory;
  protected $table = 'pencairan_dana';
  protected $primaryKey = 'id_pencairan_dana';
  protected $fillable = [
    'tanggal_pencairan_dana',
    'nominal_pencairan',
    'status_pencairan',
    'id_proyek_pendanaan'
  ];

  public function proyekPendanaan(): BelongsTo
  {
    return $this->belongsTo(ProyekPendanaan::class);
  }
}
