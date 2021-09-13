<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convertion extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User', 'converted_by');
    }
}
