<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempahan extends Model
{


    protected $fillable = [
      'user_id',
      'lab_id',
      'tarikh_mula',
      'tarikh_akhir',
      'masa_mula',
      'masa_akhir',
      'status'
    ];


    public function user()
    {
      return $this->belongsTo(User::class);
    }




    public function lab()
    {
      return $this->belongsTo(Lab::class);
    }
}
