<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyOrder extends Model {
    
    protected $fillable = [
        'issue_date',
        'receiver_name',
        'sender_name',
        'issuer_id',
        'customer_id'
    ];

    public function issuer() {
        return $this->belongsTo('App\ProductProvider', 'issuer_id');
    }
    
    public function customer() {
        return $this->belongsTo('App\Pharmacy', 'customer_id');
    }
}
