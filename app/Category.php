<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Models the cateogories
class Category extends Model
{
    //  // Eloquent relationship with the book model, a category can have many books assigned to it
    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
