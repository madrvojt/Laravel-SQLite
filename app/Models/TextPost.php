<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextPost extends Model
{
    protected $fillable = ['post_id', 'title', 'published_at', 'content', 'excerpt'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
