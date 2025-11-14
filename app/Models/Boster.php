<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 

class Boster extends Model
{
    use HasFactory;

       public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    } 

}
