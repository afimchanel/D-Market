<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'Post_id';

    public function Dog()
    {
        return $this->belongsTo('App\Dog');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
   
}
