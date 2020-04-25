<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    
    protected $fillable = [
        'client_address', 'client_name', 'client_lastname', 'client_phone', 'delivery_price'
    ];

    protected $appends = ['total'];

    protected $casts = [
        'delivery_price'     => 'float',
    ];

    public function details(){
        return $this->hasMany('App\PurchaseDetail');
    }

    public function getTotalAttribute(){
        return $this->details->sum(function($detail) {
            return $detail->price_at_moment_to_buy * $detail->quantity;
        });
    }
}
