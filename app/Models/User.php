<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the links associated with a user
     *
     * @return Relationship
     */
    public function links()
    {
        return $this->hasMany('App\Models\Link');
    }

    /**
     * Get the accounts associated with a user
     *
     * @return Relationship
     */
    public function accounts()
    {
        return $this->hasMany('App\Models\Account');
    }

    /**
     * Get all the visits for a user
     * 
     * @return Relationship
     */
    public function visits()
    {
        return $this->hasManyThrough('App\Models\Visit', 'App\Models\Account');
    }

    /**
     * Get the route key for the model
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }
}
