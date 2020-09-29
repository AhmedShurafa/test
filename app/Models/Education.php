<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $guarded =[];
    public $timestamps = false;

    //
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
