<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dogimages extends Model
{
    protected $guarded = [];
    protected $table = 'dogimages';
    protected $primaryKey = 'id';
    public function Dog()
   {
       return $this->belongsTo('App\Dog');
 
    }
}
