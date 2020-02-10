<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //

  public function postb(){
  return $this->belongsTo('app\postb');       
    }
      public function user(){
  return $this->belongsTo('app\User');       
    }

}
