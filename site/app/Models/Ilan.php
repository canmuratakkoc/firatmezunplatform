<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilan extends Model
{
    use HasFactory;
    protected $table = 'ilan';
    protected $fillable = [
      'baslik',
      'metin',
      'created_at',
      'updated_at'
    ];
}
