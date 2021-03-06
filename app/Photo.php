<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Photo extends Model
{
    //
    protected $fillable = ['file'];

    protected $uploads = '/images/';

    public function getFileAttribute($photo){

        return URL::to('/') . $this->uploads . $photo;
    }
}
