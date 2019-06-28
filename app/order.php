<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded = [];
    protected $table = 'order_dog';
    protected $primaryKey = 'Order_ID';
}
