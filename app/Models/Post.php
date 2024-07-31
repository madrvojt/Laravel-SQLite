<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'type','title', 'published_at', 'lead'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function textPost()
    {
        return $this->hasOne(TextPost::class);
    }

    public function audioPost()
    {
        return $this->hasOne(AudioPost::class);
    }
}
