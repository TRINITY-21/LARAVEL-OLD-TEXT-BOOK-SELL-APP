<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Models the contact Us functionality
class ContactUS extends Model
{
    public $table = 'contact_us';
    public $fillable = ['name','email','message'];
}
