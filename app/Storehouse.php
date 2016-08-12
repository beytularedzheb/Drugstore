<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storehouse extends Model {
    
    protected $fillable = [
        'name',
        'description',
        'address',
        'phone',
        'pharmacy_id'
    ];
    
    public function pharmacy() {
        return $this->belongsTo('App\Pharmacy', 'pharmacy_id');
    }
}
