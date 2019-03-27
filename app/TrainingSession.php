<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{   
    public $timestamps = false;
    protected $fillable = [
    'name',
    'start_at',
    'finish_at',
    'gym_id',
    'coach_id',
   
   ];
    public function gym()
    {
        
        return $this->belongsTo(Gym::class);
    }
    public function coach()
    {
        
        return $this->belongsTo(Coach::class);
    }
}
