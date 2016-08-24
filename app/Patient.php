<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'disease',
        'ward_id'
    ];
    
    public function ward() {
        return $this->belongsTo('App\Ward', 'ward_id');
    }
    
    public function orders() {
        return $this->hasMany('App\WardOrder', 'requested_for_id');
    }
}
