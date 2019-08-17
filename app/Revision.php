<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = [
        'type', 'description', 'price',
    ];

    public function cars()
    {
      return $this->belongsToMany(Car::class);
    }
}
