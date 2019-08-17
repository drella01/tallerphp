<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CarRevision extends Pivot
{
    protected $fillable = [
        'car_id',
        'revision_id',
        'date',
      ];
}
