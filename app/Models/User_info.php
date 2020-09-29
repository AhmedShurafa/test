<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    protected $table='user_infos';

    protected $guarded = [];

    Public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
