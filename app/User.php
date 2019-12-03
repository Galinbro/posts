<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }


    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function peticion(){
        return $this->hasMany('App\Peticion');
    }

    public function isAdmin(){

        if ($this->role->name == 'admin' && $this->is_active == 1 || $this->role->name == 'colaborator' && $this->is_active == 1){
            return true;
        }else
            return false;
    }

    public function scopeName($query, $name){
        if (trim($name) != "")
            $query->where('name', 'LIKE' ,'%'.$name.'%');
    }

    public function scopeType($query, $type){
            $types = [''=>'Seleccione un tipo de usuario', 1=>'Administrador', 2=>'Colaborador', 3=>'General'];

            if ($type != "" && isset($types[$type])){
                $query->where('role_id', $type);
            }
        }
}
