<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'content', 'workload', 'activity_type_id', 'user_id',
    ];

    protected $with = ['type'];

    public function type()
    {
        return $this->hasOne('App\Models\ActivityType', 'id', 'activity_type_id');
    }

    public function teams()
    {
        return $this->hasOne('App\Models\Team');
    }
}
