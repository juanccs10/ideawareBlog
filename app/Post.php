<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Get all of the tags for the user.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
