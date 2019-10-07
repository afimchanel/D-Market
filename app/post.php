<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded = [];
    protected $table = 'posts';
    protected $primaryKey = 'Post_id';

    public  function dog()
    {
        return $this->belongsTo('App\Dog','id_the_dog');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id');
    }

    public function orderDetail(){
        return $this->hasMany('App\orderdetail','id_post');
    }
    
   
}
