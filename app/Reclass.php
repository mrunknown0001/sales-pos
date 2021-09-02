<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclass extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User', 'reclass_by');
    }
}
