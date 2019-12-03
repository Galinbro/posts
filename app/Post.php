<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'archivo_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function archivo(){
        return $this->belongsTo('App\Archivo');
    }

    public function scopeName($query, $name){
            if (trim($name) != "")
                $query->where('title', 'LIKE' ,'%'.$name.'%');
    }

    public function scopeCategory($query, $type){
            $types = Category::pluck('name', 'id')->all();

            if ($type != "" && isset($types[$type])){
                $query->where('category_id', $type);
            }
    }

    public function scopeEmisor($query, $type){
        if ($type != ""){
            $query->where('user_id', $type);
        }
    }
}
