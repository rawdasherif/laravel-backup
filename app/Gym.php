<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'name',
        'revenue',
        'created_at',
        'cover_image',
        'city_id',
    ];

    public function city()
    {
     
     return $this->belongsTo(City::class);

     }

    protected $dateFormat = 'Y-m-d';
}
