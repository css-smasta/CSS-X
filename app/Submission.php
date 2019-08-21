<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function exercises(){
        return $this->belongsTo('App\Exercise','course_id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
