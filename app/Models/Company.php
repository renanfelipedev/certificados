<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cnpj', 'addres', 'user_id',
    ];

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}
