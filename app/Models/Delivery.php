<?php

namespace App\Models;

use App\Models\Traits\UsedFunctions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Delivery extends Model
{
    Use UsedFunctions;

    const PICKUP_DELIVERY_ID = 1;
    const DELIVERY_TO_ADDRESS = 2;
    const DELIVERY_TO_CITY = 3;

    protected $guarded = [];

    public $timestamps = false;

}
