<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'registration',
        'client_id',
        'kms',
        'year',
        'brand',
        'model',
    ];

    public function client()
    {
      return $this->belongsTo(Client::class);
    }

    public function workOrders()
    {
      return $this->hasMany(WorkOrder::class);
    }

    public function facturas()
    {
      return $this->belongsToMany(Factura::class);
    }




}
