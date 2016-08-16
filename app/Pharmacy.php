<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = [
        'name',
        'uic',
        'accountable_person_name',
        'address',
        'phone'
    ];
    
    public function storehouses() {
        return $this->hasMany('App\Storehouse', 'pharmacy_id');
    }
}
