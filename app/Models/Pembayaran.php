<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
  use HasFactory;
  protected $table = 'pembayaran';
  protected $primaryKey = 'id_pembayaran';
  protected $fillable = [
    'tanggal_pembayaran',
    'bukti_pembayaran',
    'status_pembayaran',
    'id_proyek_pendanaan'
  ];

  public function proyekPendanaan(): BelongsTo
  {
    return $this->belongsTo(ProyekPendanaan::class);
  }
}
