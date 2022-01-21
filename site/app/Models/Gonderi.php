<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gonderi extends Model
{
    use HasFactory;
    protected $table = 'gonderi';
    protected $fillable = [
      'metin',
      'resim_id',
      'kullanici_id',
      'created_at',
      'updated_at'
    ];
}
