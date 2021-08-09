<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    public function product()
    {
    	return $this->belongsTo('App\Producto', 'product_id');
    }


    public function location()
    {
    	return $this->belongsTo('App\Location');
    }
}
