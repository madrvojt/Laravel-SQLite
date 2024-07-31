<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextPost extends Model
{
    protected $fillable = ['post_id', 'published_at', 'text'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
