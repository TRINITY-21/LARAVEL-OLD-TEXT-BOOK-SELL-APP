<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Models Books within the system
class Book extends Model
{
    protected $fillable = ['title', 'description','image', 'author', 'publishedOn', 'price', 'type', 'ISBN', 'user_id', 'quantity', 'location'];

    // Eloquent relationship with the user model: A book belongs to a student who is selling it
    public function user(){
        return $this->belongsTo('App\User');
    }

    // Eloquent relationship with the category model, a book belongs to a category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Scope query used to filter results that are greater than a given price
    public function scopePriceGreaterThan($query, $price){
        return $query->where('price', '>', $price);
    }

    // Scope query used to filter results that are less than a given price
    public function scopePriceLessThan($query, $price){
        return $query->where('price', '<', $price);
    }

    
}

