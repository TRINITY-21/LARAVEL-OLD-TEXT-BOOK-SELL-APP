<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Models orders
class Order extends Model
{
    // A specific order can only belong to a specific user
    public function user(){
        return $this->belongsTo('App\User');
    }
}
