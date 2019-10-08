<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Club extends Model
{
    protected $guarded = [];
    
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function events()
    {
    	return $this->hasMany(Event::class);
    }
}
