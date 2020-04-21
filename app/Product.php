<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'name', 'description', 'price', 'image_url', 'category_id'
    ];

    protected $casts = [
        'price'     => 'float',
        'category_id'    => 'integer',
    ];

    public function Category(){
        return $this->BelongsTo('App\Category');
    }
}
