<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class orderdetail extends Model
{
    protected $guarded = [];
    protected $table = 'order_detail';
    protected $primaryKey = 'Order_detail';
    

    public static function countcart(){
        $id_user = 4;
        $orders = new orderdetail; 
        $orders->where('id_user','=',$id_user)->sum('count');
        return $orders;

    }
    public function orderdetail_order()
    {
        return $this->belongsTo('App\orders');
    }
   
}
