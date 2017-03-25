<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model {
public $timestamps = false;
     protected $table = 'question_option';
     //protected $fillable = ['questionair_name', 'duration','can_resume'];
}
