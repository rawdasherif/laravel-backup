<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'revenue',
        'country_id',
        'country_name'
    ];
    public function country()
   {
    
    return $this->belongsTo(Country::class);
    }
}
