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
    
    public function orders() {
        return $this->hasMany('App\PharmacyOrder', 'issuer_id');
    }
}
