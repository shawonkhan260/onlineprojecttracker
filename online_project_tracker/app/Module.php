<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function projects()
    {
        return $this->hasOne('App\Project');
    }
}
