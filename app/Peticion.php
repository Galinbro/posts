<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'responsable_id',
        'ug',
        'id_grupo',
        'id_cliente',
        'producto',
        'tarifa',
        'rentabilidad',
        'reciprocidad',
        'reciprocidad_num',
        'argumento',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function responsable(){
        return $this->belongsTo('App\Responsable');
    }
}
