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
          $cartcount= orderdetail::where(['id_user'=>$id_user])->where('order_id',Null)->sum('count');
          return $cartcount;
      }  
    }

    public function order()
    {
        return $this->hasMany('App\orders','order_id');
    }
    public function post()
    {
        return $this->hasMany('App\post','Post_id');
    }
   
}
