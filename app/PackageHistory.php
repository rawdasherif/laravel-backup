<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageHistory extends Model
{
    protected $fillable = [
        'gym_id',
        'package_id',
        'user_id',
        'price',
       ];

     public function user()
       {
        return $this->belongsTo(User::class);
       }
     public function gym()
       {
        return $this->belongsTo(Gym::class);
       }
     public function package()
       {
        return $this->belongsTo(Package::class);
       }

}
