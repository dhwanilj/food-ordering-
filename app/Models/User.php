<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    function dishes(){
        return $this->hasMany('App\Models\Dishes','restaurant_id');
    }

    function restaurant_order(){
        return $this->hasMany('App\Models\Orders','restaurant_id');
    }

    function order(){
        return $this->belongsToMany('App\Models\Dishes','orders','user_id','dish_id');
    }

    function image(){
        return $this->belongsToMany('App\Models\Dishes','dish_images','user_id','dish_id')->withPivot('image');
    }

    function favourite(){
        return $this->belongsToMany('App\Models\Dishes','favourites','user_id','dish_id');
    }
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
