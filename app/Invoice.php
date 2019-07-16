<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
      'date',
      'paid',
    ];

    function workorders()
    {
          return $this->belongsToMany(WorkOrder::class, 'invoice_workorder');
    }
}
