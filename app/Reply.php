<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['author', 'email', 'body', 'fileUser', 'is_active', 'comment_id'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
