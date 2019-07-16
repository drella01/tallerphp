<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Client extends Model
{
    use Notifiable;

    protected $fillable = [
      'name',
      'email',
      'vat',
    ];

    public function cars()
    {
      return $this->hasMany(Car::class);
    }

    public function user()
    {
      return $this->hasOne(User::class);
    }
}
