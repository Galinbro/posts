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
        'nb_cliente',
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

    public function scopeCr($query, $name){
            if (trim($name) != "")
                $query->where('ug', 'LIKE' ,'%'.$name.'%');
    }

    public function scopeResponsable($query, $type){
                if ($type != ""){
                    $query->where('responsable_id', $type);
                }
        }

    public function scopeEmisor($query, $type){
            if ($type != ""){
                $query->where('user_id', $type);
            }
    }

    public function scopeCliente($query, $type){
        if ($type != ""){
            $query->where('nb_cliente', $type);
        }
    }

    public function scopeStatus($query, $type){
        if ($type['pendientes'] == null && $type['proceso'] == null && $type['finalizadas'] == null && $type['correcciones'] == null){

        }else if ($type['pendientes'] == null && $type['proceso'] == null && $type['finalizadas'] == null){
            $query->where('status', 3);
        }else if ($type['pendientes'] == null && $type['proceso'] == null && $type['correcciones'] == null){
            $query->where('status', 2);
        }else if ($type['pendientes'] == null && $type['finalizadas'] == null && $type['correcciones'] == null){
            $query->where('status',1 );
        }else if ($type['proceso'] == null && $type['finalizadas'] == null && $type['correcciones'] == null){
            $query->where('status', 0);
        }else if ($type['pendientes'] == null && $type['proceso'] == null){
            $query->where('status', '>=', 2 );
        }else if ($type['pendientes'] == null && $type['finalizadas'] == null){
            $query->where('status', '<>', 0)->where('status', '<>', 2);
        }else if ($type['pendientes'] == null && $type['correcciones'] == null){
            $query->where('status', '<>', 0)->where('status', '<>', 3);
        }else if ($type['proceso'] == null && $type['finalizadas'] == null){
            $query->where('status', '<>', 1)->where('status', '<>', 2);
        }else if ($type['proceso'] == null && $type['correcciones'] == null){
            $query->where('status', '<>', 1)->where('status', '<>', 3);
        }else if ($type['finalizadas'] == null && $type['correcciones'] == null){
            $query->where('status', '<', 2);
        }else if ($type['pendientes'] == null){
            $query->where('status', '<>', 0);
        }else if ($type['proceso'] == null){
            $query->where('status', '<>', 1);
        }else if ($type['finalizadas'] == null){
            $query->where('status', '<>', 2);
        }else if ($type['correcciones'] == null){
            $query->where('status', '<>', 3);
        }
    }

}
