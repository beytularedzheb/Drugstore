<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WardOrderLine extends Model {
    
    protected $fillable = [
        'ward_order_id',
        'product_id',
        'quantity',
        'unit_pice_in_leva'
    ];
    
    public function wardOrder() {
        return $this->belongsTo('App\WardOrder', 'ward_order_id');
    }
    
    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
