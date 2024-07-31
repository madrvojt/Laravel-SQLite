<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AudioPost extends Model
{
    protected $fillable = ['post_id', 'title', 'published_at', 'audio_length', 'audio_url', 'excerpt'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
