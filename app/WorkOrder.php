<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = [
      'date',
      'car_id',
      'concept_id',
      'units',
      'remark',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function concept()
    {
        return $this->belongsTo(Concept::class);
    }

    public function invoice()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_workorder');
    }

    public function total($units)
    {
        return $this->total = $this->concept->price*$units;
    }

    public function facturas()
    {
        return $this->belongsToMany(Factura::class, 'factura_workorder');
    }
}
