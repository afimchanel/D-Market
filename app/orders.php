<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $guarded = [];
    protected $table = 'order';
    protected $primaryKey = 'Order_ID';

    public function order_orderdetail()
    {
        return $this->belongsTo('App\orderdetail');
    }
}
