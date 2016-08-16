<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyOrderLine extends Model {
    
    protected $fillable = [
        'pharmacy_order_id',
        'product_id',
        'quantity'
    ];
    
    public function pharmacyOrder() {
        return $this->belongsTo('App\PharmacyOrder', 'pharmacy_order_id');
    }
    
    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
