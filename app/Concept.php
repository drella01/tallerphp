<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
  protected $fillable = [
    'concept',
    'price',
    'brand',
  ];

  public function workOrders()
  {
      return $this->hasMany(WorkOrder::class);
  }

  public function discount($value)
  {
      return $this->price*$value*100;
  }

}
