<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    function user(){
        return $this->belongsTo ('App\Models\User','restaurant_id');
    }
    use HasFactory;
}
