<?php

namespace App\Services\Questionair;

use App\Services\BaseService;
use App\Question;
use App\QuestionOption;
use App\Questionair;

class QuestionairService extends BaseService {

    protected $questionairAccess;

    public function __construct(\App\DataAccess\Questionair\QuestionairAccess $questionairAccess) {
        $this->questionairAccess = $questionairAccess;
    }

    public function saveQuestionair() {
        return $this->questionairAccess->saveQuestionair();
    }

    /**
     * 
     * @param type $questionId
     * @param type $question
     * @param type $answer
     * Question updated
     */
    public function updateQuestion($questionId, $question, $answer) {
        $questionObj = new Question();
        $questionUpdate = array('question' => $question, 'answer' => $answer);
        return $this->questionairAccess->updateQuestion($questionObj, $questionUpdate, $questionId);
    }

    public function getQuestionOptionById($optionId, $questionId) {
        $questionOptionObj = new QuestionOption();
        return $this->questionairAccess->getQuestionOptionById($questionOptionObj, $optionId, $questionId);
    }

//    public function updateQuestionOption($optionText, $value, ){
//        $updateOptions = array('option_name' => $chioce, 'check_option' => $checkedOption, 'question_id' => $data);
//    }
    public function updateQuestionOption($optionText, $value, $questionId, $optionId) {
        $questionOptionObj = new QuestionOption();
        $updateOptions = array('option_name' => $optionText, 'check_option' => $value, 'question_id' => $questionId);
        $this->questionairAccess->updateQuestionOption($questionOptionObj, $updateOptions, $optionId);
    }

    public function addNewQuestionOption($optionText, $value, $questionId) {
        $questionOptionObj = new QuestionOption();
        $questionOptionObj->option_name = $optionText;
        $questionOptionObj->check_option = $value;
        $questionOptionObj->question_id = $questionId;
        $questionOptionObj->timestamp = date('Y-m-d H:i:s');
        return $this->questionairAccess->addNewQuestionOption($questionOptionObj);
    }

    public function addNewQuestion($questionairId, $questionTypeId, $question, $answer) {
        $questionObj = new Question();
        $questionObj->questionair_id = $questionairId;
        $questionObj->question_type_id = $questionTypeId;
        $questionObj->question = $question;
        $questionObj->answer = $answer;
        $questionObj->timestamp = date('Y-m-d H:i:s');
        return $this->questionairAccess->addNewQuestion($questionObj);
    }

    public function getQuestionbyId($questionId) {
        $questionObj = new Question();
        return $this->questionairAccess->getQuestionbyId($questionObj, $questionId);
    }

    public function getAllQuestionsbyQuestionairId($questionairId) {
        $questionObj = new Question();
        return $this->questionairAccess->getAllQuestionsbyQuestionairId($questionObj, $questionairId);
    }

    public function createNewQuestionair($questionairName, $duration, $canResume, $userId) {
        $questionairObj = new Questionair();
        $questionairObj->questionair_name = $questionairName;
        $questionairObj->duration = $duration;
        $questionairObj->can_resume = $canResume;
        $questionairObj->user_id = $userId;
        $questionairObj->timestamp = date('Y-m-d H:i:s');
        return $this->questionairAccess->createNewQuestionair($questionairObj);
    }
    
    public function delQuestionOption($id){
        $questionOptionObj = new QuestionOption();
        return $this->questionairAccess->delQuestionOption($questionOptionObj, $id);
    }

}
