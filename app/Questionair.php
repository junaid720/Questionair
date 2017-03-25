<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionair extends Model {
public $timestamps = false;
     protected $table = 'questionair';
     protected $fillable = ['questionair_name', 'duration','can_resume'];

     public function questionsCount(){
         //->count()
         return $this->hasMany('App\Question', 'questionair_id', 'id');
     }
     
     
}
