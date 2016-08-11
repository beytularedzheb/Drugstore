<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    
    protected $fillable = [
        'name',
        'description',
        'unit_price_in_leva',
        'unit',
        'available_quantity',
        'category_id',
        'storehouse_id'
    ];
    
    public function productCategory() {
        return $this.belongsTo('App\ProductCategory', 'category_id');
    }
    
    public function storehouse() {
        return $this.belongsTo('App\Storehouse', 'storehouse_id');
    }
}
