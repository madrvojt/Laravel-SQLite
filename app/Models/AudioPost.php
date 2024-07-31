<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AudioPost extends Model
{
    protected $fillable = ['post_id', 'audio_length', 'audio_url'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
