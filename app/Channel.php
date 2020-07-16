<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['name', 'user_id', 'description', 'image'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }
}
