<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function followedUser()
    {
        return $this->belongsTo('App\User', 'follower_id');
    }

    public function followingUser()
    {
        return $this->belongsTo('App\User', 'followee_id');
    }
}
