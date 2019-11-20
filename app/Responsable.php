<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    //

    public function peticion(){
        return $this->hasMany('App\Peticion');
    }
}
