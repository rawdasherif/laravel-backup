<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail,BannableContract
{
    use Notifiable, HasApiTokens,HasRoles;
    use Bannable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password','National_id','gender','gym_id',
    // ];
    protected $fillable = [
        'name',
         'email',
          'password',
          'National_id',
          'role',
          'gym_id',
          'city_id',
          'profile_img',
          'banned_at'
    ];
    protected $dates = [
        'banned_at'
    ];
    public function shouldApplyBannedAtScope()
    {
        return true;
    }
    public function gym()
    {
        
        return $this->belongsTo(Gym::class);
    }
    public function city()
    {
        
        return $this->belongsTo(City::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
