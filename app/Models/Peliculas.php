<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;

    protected $fillable = [
        'rutas'
    ];
      //muchos a muchos
      public function users(){
        $this->belongsToMany('App\Models\User');
    }

}
