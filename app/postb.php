<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postb extends Model
{
    // table name
  //  protected $table='mapost';
// primary key 
// public	$primarykey ='title';
// timestamp disable
// public $timestamp=false;
   public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment(){
  return $this->hasMany('App\Comment');       
    }

    
        public function teg()
    {
        return $this->belongsToMany('App\Teg');
    }
}
