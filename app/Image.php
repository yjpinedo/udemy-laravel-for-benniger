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

    public function imageExisting() {
        if (file_exists(public_path() . '/' . $this->file)){
            return true;
        }
        return false;
    }

}
