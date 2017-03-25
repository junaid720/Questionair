<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Session;
use DB;
use App\Questionair;
use Auth;
use App\Question;
use App\QuestionOption;

class QuestionairController extends Controller {

    public $_request;
    public $_questionair;

    public function __construct(Request $request, \App\Services\Questionair\QuestionairService $questionair) {
        $this->_request = $request;
        $this->_questionair = $questionair;
    }

    public function index() {
        return View::make('questionair.create');
        
    }

    public function docreate() {
        $questionairName = $this->_request->input('txtquestionairname');
        $duration = $this->_request->input('txtduration');
        $canResume = $this->_request->input('canresume');
        $userId = Auth::user()->id;
        $result = $this->_questionair->createNewQuestionair($questionairName, $duration, $canResume, $userId);
        return redirect('home');
    }

    public function addQuestion($id) {
        if ($this->_request->isMethod('post')) {
            $dataToSave = $this->_request->input('questiontToSave');
            foreach ($dataToSave as $data) {
                $result = $this->_questionair->getQuestionbyId($data);
                //$result = $questionObj->where('id', $data)->get();
                if (count($result) > 0) {
                    $questionType = $this->_request->input($data . '_questiontype');
                    if ($questionType == 1) {
                        $question = $this->_request->input($data . '_question');
                        $answer = $this->_request->input($data . '_answer');
                        $this->_questionair->updateQuestion($data, $question, $answer);
                    } elseif ($questionType == 2 || $questionType == 3) {
                        $question = $this->_request->input($data . '_question');
                        $this->_questionair->updateQuestion($data, $question, '');

                        $questionChoice = $this->_request->input($data . '_option');
                        if (count($questionChoice) > 0) {
                            foreach ($questionChoice as $key => $chioce) {
                                $checkedOption = 0;
                                $optionArray = $this->_request->input($data . '_optionBoxValue');
                                if (count($optionArray) > 0) {
                                    if ($optionArray[$key] == 1) {
                                        $checkedOption = 1;
                                    } else {
                                        $checkedOption = 0;
                                    }
                                    $optionIdsArray = $this->_request->input($data . '_optionids');
                                    $questionOptionResult = $this->_questionair->getQuestionOptionById($optionIdsArray[$key], $data);
                                    if (count($questionOptionResult) > 0) {
                                        $this->_questionair->updateQuestionOption($chioce, $checkedOption, $data, $optionIdsArray[$key]);
                                    } else {
                                        $this->_questionair->addNewQuestionOption($chioce, $checkedOption, $data);
                                    }
                                }
                            }
                        }
                    }
                } else {
                    $questionType = $this->_request->input($data . '_questiontype');
                    $question = $this->_request->input($data . '_question');
                    $answer = $this->_request->input($data . '_answer');

                    if ($questionType == 1) {
                        $questionId = $this->_questionair->addNewQuestion($id, $questionType, $question, $answer);
                    } elseif ($questionType == 2 || $questionType == 3) {
                        $questionId = $this->_questionair->addNewQuestion($id, $questionType, $question, $answer);
                        $questionChoice = $this->_request->input($data . '_option');
                        foreach ($questionChoice as $key => $chioce) {
                            $checkedOption = 0;
                            $optionArray = $this->_request->input($data . '_optionBoxValue');
                            if ($optionArray[$key] == 1) {
                                $checkedOption = 1;
                            } else {
                                $checkedOption = 0;
                            }
                            $this->_questionair->addNewQuestionOption($chioce, $checkedOption, $questionId);
                        }
                    }
                }
            }
            return redirect()->back();
        }

        $allQuestion = $this->_questionair->getAllQuestionsbyQuestionairId($id);

        if (count($allQuestion) > 0) {
            $allQuestion = $allQuestion->toArray();
        }
        return View::make('question.create', ['allquestion' => $allQuestion, 'questionairId' => $id]);
    }

    public function delChoice() {

        $data = $this->_request->input('delChoice');
        $data = explode('_', $data);
        $questionOption = new QuestionOption();
        
        $questionOptionResult = $this->_questionair->getQuestionOptionById($data[1], $data[0]);
        
        //$questionOptionResult = $questionOption->where('id', $data[1])->get();
        if (count($questionOptionResult) > 0) {
            
            $this->_questionair->delQuestionOption($data[1]);
            
           // $questionOption = new QuestionOption();
            //$questionOption->where('id', $data[1])
                   // ->delete();
            echo 'exists';
        } else {
            echo 'notExists';
        }
    }

}
