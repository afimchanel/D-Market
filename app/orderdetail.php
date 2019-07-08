<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    protected $guarded = [];
    protected $table = 'order_detail';
    protected $primaryKey = 'Order_detail';
}
