<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = [
        'name',
        'uic',
        'accountable_person_name',
        'address',
        'phone'
    ];
    
    public function patients() {
        return $this->hasMany('App\Patient', 'ward_id');
    }
}
