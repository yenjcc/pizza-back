<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    
    protected $fillable = [
        'client_address', 'client_name', 'client_lastname', 'client_phone', 'delivery_price'
    ];

    protected $casts = [
        'delivery_price'     => 'float',
    ];

    public function details(){
        return $this->hasMany('App\PurchaseDetail');
    }
}
