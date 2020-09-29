<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Skill extends Model
{
    protected $table = 'm_skills';
    protected $guarded =[];
    public $timestamps = false;

    //
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
