<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cpf', 'email', 'birthdate', 'team_id'
    ];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
