<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded = [];
    protected $table = 'posts';
    protected $primaryKey = 'Post_id';

    public function postdogs()
    {
        return $this->hasOne('App\Dog','ID_dog');
    }
    public function post_users()
    {
        return $this->belongsTo('App\User','id');
    }
   
}
