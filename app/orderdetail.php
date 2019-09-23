<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Support\Facades\Session;
class orderdetail extends Model
{
    protected $guarded = [];
    protected $table = 'order_detail';
    protected $primaryKey = 'Order_detail';
    

    public static function countcart(){
      if (Auth::check()) {
        
          $id_user = Auth::user()->id;
          $cartcount= orderdetail::where(['id_user'=>$id_user])->sum('count');
          
          return $cartcount;
      }
      
        
    }

    public function orderdetail_order()
    {
        return $this->belongsTo('App\orders');
    }
   
}
