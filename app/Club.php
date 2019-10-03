<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function events()
    {
    	return $this->hasMany(Event::class);
    }
}
