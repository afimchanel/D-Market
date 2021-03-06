<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $fillable = array('imagedog');
    protected $table = 'dogs';
    //protected $table = 'Dogs';
    protected $primaryKey = 'id';
    //protected $fillable = ['IDthedog', 'Breed','Registrationspecies','Nomicrochip','color','SEX','Father','Momher','birthday',
    //'Breedername','Owner','Registrationdate',];
//'imageRC'
   // public function user()
    //{
       // return $this->belongsTo(\App\User::class);
   // }
   public function user()
   {
       return $this->belongsTo('App\User','user_id');
 
    }

   public function dogimages()
   {
       return $this->hasMany('App\dogimages','dog_id');
 
    }
}
