<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duyuru extends Model
{
    use HasFactory;
    protected $table = 'duyuru';
    protected $fillable = [
      'baslik',
      'metin',
      'created_at',
      'updated_at'
    ];
}
