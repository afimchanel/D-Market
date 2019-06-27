<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $guarded = [];
    protected $table = 'dogs';
    //protected $table = 'Dogs';
    protected $primaryKey = 'ID_dog';
    //protected $fillable = ['IDthedog', 'Breed','Registrationspecies','Nomicrochip','color','SEX','Father','Momher','birthday',
    //'Breedername','Owner','Registrationdate',];
//'imageRC'
   // public function user()
    //{
       // return $this->belongsTo(\App\User::class);
   // }
   public function user()
   {
       return $this->belongsTo('App\User');
 
    }
    public function post()
    {
        return $this->belongsTo('App\post');
   }
}
