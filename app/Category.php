<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'group'];

    public function scopeName($query, $name){
            if (trim($name) != "")
                $query->where('name', 'LIKE' ,'%'.$name.'%');
    }

    public function scopeCategory($query, $type){
            $types = [''=>'Seleccione un grupo', 1=> 'Productos', 2=>'Control Interno', 3=>'Experiencia Unica'];

            if ($type != "" && isset($types[$type])){
                $query->where('group', $type);
            }
    }
}
