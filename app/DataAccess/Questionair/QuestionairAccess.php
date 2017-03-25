<?php

namespace App\DataAccess\Questionair;

use App\DataAccess\BaseAccess;

class QuestionairAccess extends BaseAccess {

    protected $users;

    public function __construct() {
        //$this->users = new User;
    }

    public function saveQuestionair() {
        echo "dd";
        exit;
    }
/**
 * 
 * @param type $questionObj
 * @param type $questionUpdate
 * @param type $questionId
 * Update Question
 */
    public function updateQuestion($questionObj, $questionUpdate, $questionId) {
         return $questionObj->where('id', $questionId)->update($questionUpdate);
    }

    public function getQuestionOptionById($questionOptionObj, $optionId, $questionId){
        return $questionOptionObj->where('id', $optionId)->where('question_id', $questionId)->get();
    }
    
    public function updateQuestionOption($questionOptionObj, $updateOptions, $optionId){
        $questionOptionObj->where('id', $optionId)->update($updateOptions);
    }
    
    public function addNewQuestionOption($questionOptionObj){
        $questionOptionObj->save();
    }
    
    public function addNewQuestion($questionObj){
        $questionObj->save();
        return $questionObj->id;
    }
    
    public function getQuestionbyId($questionObj, $questionId){
        return $questionObj->where('id', $questionId)->get();
    }
    
    public function getAllQuestionsbyQuestionairId($questionObj, $questionairId){
        return $questionObj->with(['options' => function ($q) {
                        $q->orderBy('timestamp', 'asc');
                    }])->where('questionair_id', $questionairId)->get();
    }
    
    public function createNewQuestionair($questionairObj){
        return $questionairObj->save();
    }
    
    public function delQuestionOption($questionOptionObj, $id){
        $questionOptionObj->where('id', $id)->delete();
    }
}
