<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['course_id', 'user_id', 'notes', 'file_name', 'score_achieved', 'reviewer_id'];
    public function exercises(){
        return $this->belongsTo('App\Exercise','course_id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
