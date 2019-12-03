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

    public function scopeName($query, $name){
            if (trim($name) != "")
                $query->where('name', 'LIKE' ,'%'.$name.'%');
        }
}
