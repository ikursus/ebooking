<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    # Maklumkan nama table yang perlu dihubungi
    # protected $table = 'labs';
    # Column yang dibenarkan datanya diubah / masuk
    protected $fillable = [
      'nama',
      'kapasiti',
      'status'
    ];
}
