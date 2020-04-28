<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $uploads = 'img/';

    protected $fillable = ['file']; 


    public function getFileAttribute($image)
    {
        return $this->uploads . $image;
    }

}
