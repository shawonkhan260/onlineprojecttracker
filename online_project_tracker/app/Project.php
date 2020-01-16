<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //protected $guarded=[];
    public function users()
    {
        return $this->hasOne('App\User');
    }
    public function modules()
    {
        return $this->hasMany('App\Module');
    }
}
