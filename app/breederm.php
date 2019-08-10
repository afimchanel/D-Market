<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class breederm extends Model
{
    
    protected $table = 'breederm';
    //protected $table = 'Dogs';
    protected $primaryKey = 'id_Breeder';

    public function breedermuser()
   {
       return $this->belongsTo('App\User','user_id');
 
    }
}
