<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = 'admin';
  protected $primaryKey = 'id_admin';
  protected $fillable = [
    'username',
    'email',
    'password',
    'no_rekening',
    'id_bank'
  ];

  protected $hidden = [
    'password'
  ];

  public function bank()
  {
    return $this->belongsTo(Bank::class);
  }
}
