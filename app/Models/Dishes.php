<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    function user(){
        return $this->belongsTo ('App\Models\User','restaurant_id');
    }

    function order(){
        return $this->belongsToMany('App\Models\User','orders','dish_id','user_id');
    }

    function image(){
        return $this->belongsToMany('App\Models\User','dish_images','dish_id','user_id')->withPivot('image');
    }

    function favourite(){
        return $this->belongsToMany('App\Models\User','favourites','dish_id','user_id');
    }
    use HasFactory;
}

