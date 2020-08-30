<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'certificate_text', 'start', 'end', 'activity_id',
    ];

    protected $with = [
        'activity', 'students'
    ];

    public function activity()
    {
        return $this->belongsTo('App\Models\Activity');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
