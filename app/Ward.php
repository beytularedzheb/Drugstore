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
}
