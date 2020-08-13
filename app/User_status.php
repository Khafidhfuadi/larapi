<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_status extends Model
{
    public function user(){
        return $this->belongsTo('App/User');
    }
}
