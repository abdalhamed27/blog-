<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teg extends Model
{
 
        public function postb()
    {
        return $this->belongsToMany('App\Postb');
    }
}
