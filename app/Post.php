<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','title','content','user_id'
    ];

    /**
     * Get all of the tags for the user.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
