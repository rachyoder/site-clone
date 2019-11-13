<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function profile()
    {
        return $this->hasOne('App\UserProfile');
    }

    public function follows()
    {
        return $this->hasMany('App\Follow','follower_id');
    }

    public function followed()
    {
        return $this->hasMany('App\Follow','followee_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function validateForPassportPasswordGrant($password)
    {
        return Hash::check($password, $this->password);
    }
}
