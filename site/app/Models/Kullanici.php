<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kullanici extends Model
{
    use HasFactory;
    protected $table = 'kullanici';
    protected $fillable = [
      'bolum_id',
      'resim_id',
      'yetki',
      'editor',
      'mail',
      'sifre',
      'ad',
      'telefon',
      'd_tarih',
      'k_tarih',
      'm_tarih',
      'son_giris',
      'aktif',
      'created_at',
      'updated_at'
    ];
}
