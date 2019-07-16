<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = [
      'date',
      'car_id',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function workorders()
    {
        return $this->belongsToMany(WorkOrder::class, 'factura_workorder');
    }
}
