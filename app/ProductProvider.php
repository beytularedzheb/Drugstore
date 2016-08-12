<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProvider extends Model {
    
    protected $fillable = [
        'name',
        'uic',
        'accountable_person_name',
        'address',
        'phone'
    ];
}
