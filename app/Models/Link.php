<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * Making all the columns fillable
     *
     * @var array
     */
    protected $guarded = [];



    /**
     * Get the user associated with a particular link
     *
     * @return Relationship
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get all the visits associated with a link
     */
    public function visits()
    {
        return $this->hasMany('App\Models\Visit');
    }

    /**
     * returns the latest visit for a link
     *
     * @return void
     */
    public function latestVisit()
    {
        return $this->hasOne('App\Models\Visit')->latest();
    }
}
