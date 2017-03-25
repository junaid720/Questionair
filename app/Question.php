<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
public $timestamps = false;
     protected $table = 'question';
     //protected $fillable = ['questionair_name', 'duration','can_resume'];
     public function options(){
         return $this->hasMany('App\QuestionOption', 'question_id', 'id');
     }
     
    
}
