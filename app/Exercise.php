<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model{
    protected $fillable = [
        'exercise_name', 'description', 'max_score', 'course_archived', 'created_at', 'updated_at'
    ];

    public function submissions(){
        return $this->hasMany('App\Submission');
    }
}
