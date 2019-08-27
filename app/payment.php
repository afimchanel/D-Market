<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $guarded = [];
    protected $table = 'payment';
    protected $primaryKey = 'Pay_ID';
}
