<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['channel_id', 'views', 'thumbnail', 'title', 'description', 'path', 'type'];

    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }
}
