<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $fillable = [
        'name',
        'email',
    ];

    public function peticion(){
        return $this->hasMany('App\Peticion');
    }
}
