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

    public function setCpfAttribute()
    {
        $cpf = str_replace($this->attributes['cpf'], '.', '');
        $cpf = str_replace($cpf, '-', '');

        $this->attributes['cpf'] = $cpf;
    }

    public function getCpfAttribute($value)
    {
        return substr($value, 0, 3) . '.' . substr($value, 3, 3) . '.' . substr($value, 6, 3) . '-' . substr($value, 9);
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
