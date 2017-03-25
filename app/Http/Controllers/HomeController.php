<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Session;
use Auth;
use App\Questionair;
use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $questionairService;


    public function __construct(\App\Services\Questionair\QuestionairService $questionairService)
    {
        $this->questionairService = $questionairService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  //  public function index()
    //{
        //$this->questionairService->saveQuestionair();
     //   return view('home');
    //}
    public function index() {
      $data = DB::table('questionair')->get();
      $questionairsObj = new Questionair();
      $data = $questionairsObj->with('questionsCount')->get();
      //$data = $data->first()->questionsCount;
     // print_r($data->toArray()); exit;
        return view('questionair.index',['data' => $data]);
    }
}
