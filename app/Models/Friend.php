<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model 
{

    protected $table = 'friends';
    public $timestamps = true;
    protected $fillable = array('user_id', 'friend_id', 'status' ,'sender');
    
    

}