<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    
    protected $fillable = [
        'purchase_id', 'product_id', 'quantity', 'price_at_moment_to_buy'
    ];

    public function purchase(){
        return $this->belongsTo('App\Purchase');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
