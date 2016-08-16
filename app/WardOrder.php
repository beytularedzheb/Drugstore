<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WardOrder extends Model {
    
    protected $fillable = [
        'issue_date',
        'state',
        'receiver_name',
        'sender_name',
        'requester_id',
        'requested_from_id',
        'requested_for_id'
    ];
    
    public function requester() {
        return $this->belongsTo('App\Ward', 'requester_id');
    }
    
    public function requestedFrom() {
        return $this->belongsTo('App\Pharmacy', 'requested_from_id');
    }
    
    public function requestedFor() {
        return $this->belongsTo('App\Patient', 'requested_for_id');
    }
    
    public function orderLines() {
        return $this->hasMany('App\WardOrderLine', 'ward_order_id');
    }
}
