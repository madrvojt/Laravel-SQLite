<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextPost extends Model
{
    protected $fillable = ['post_id', 'text'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
