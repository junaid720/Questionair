@extends('layouts.default')
@section('content')
 <div class="row col-sm-12">
    <a class="btn btn-default" href="#">Home</a>&nbsp;|&nbsp;<a class="btn btn-primary active" href="">Questionairs</a>&nbsp;|&nbsp;<a class="btn btn-default" href="#">Results</a>
</div>
<div class="container" style="max-width: 50%">
   
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Questions</h1>
                <hr />
            </div>
        </div> 
        <div class="main-login main-center">
            <form class="form-horizontal" id="formtoadd" method="post" action="{{  URL::to('/createquestion')}}/{{$questionairId}}" data-parsley-validate="">

                <div class="row">
                    <div class="col-md-12" id="addNewQuestion">

                        @foreach ($allquestion as $result)

                        <div class="from-group" style="margin-bottom: 20px;border-bottom: 2px solid #000;padding-bottom: 10px;">
                            <select name="{{$result['id']}}_questiontype"  class="form-control selectquestiontype" style="max-width: 300px;" required="">
                                <option>Select Question Type</option>
                                <option value="1" @if($result['question_type_id'] == 1) selected="selected" @else '' @endif>Text</option>
                                <option value="2" @if($result['question_type_id'] == 2) selected="selected" @else '' @endif>Multiple Choice (Single Option)</option>
                                <option value="3" @if($result['question_type_id'] == 3) selected="selected" @else '' @endif>Multiple Choice (Multiple Option)</option>
                            </select>
                            <div class="detailFields">
                                <!--for text-->
                                @if($result['question_type_id'] == 1)  
                                <div class="input-group">
                                    <label class="cols-sm-2 control-label">Enter Question</label>
                                    <div class="cols-sm-10">
                                        <input type="text" class="form-control" name="{{$result['id']}}_question" id=""  value="{{$result['question']}}" required=""/>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label class="cols-sm-2 control-label">Answer</label>
                                    <div class="cols-sm-10">
                                        <input type="text" class="form-control" name="{{$result['id']}}_answer" id=""  value="{{$result['answer']}}" required=""/>
                                    </div>
                                </div>
                                
                                <!--for text-->  
                                @elseif($result['question_type_id'] == 2)
                                <div class="form-group" style="margin-top:30px;">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Question</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="{{$result['id']}}_question" value="{{$result['question']}}" required="">
            </div>

        </div>
                                    @foreach($result['options'] as $key => $singleChoice)
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Choice</label>
            <div class="col-sm-6">          
                <input type="text" class="form-control" required="" value="{{$singleChoice['option_name']}}" name="{{$result['id']}}_option[]" id="choice" placeholder="Enter Chocie">
            </div>
            <div class="col-sm-3"><input type="hidden" name="{{$result['id']}}_optionBoxValue[]" @if($singleChoice['check_option'] == 1) value="1" @else value="0" @endif /><input class="{{$result['id']}}singlechoice" onclick="changeValue(this)" type="checkbox" name="{{$result['id']}}_singleoption[]" data-parsley-checkmin="1" required="" @if($singleChoice['check_option'] == 1) checked="checked" @else value="0" @endif id="choice"> Correct  <a href="#" id="{{$result['id']}}_{{$singleChoice['id']}}" class="delQuestionOption">delete choice</a></div>
        </div>
            
            <input type="hidden" name="{{$result['id']}}_optionids[]" value="{{$singleChoice['id']}}" />
        
                                    @endforeach
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"></label>
            <div class="col-sm-6">          
                 <a id="{{$result['id']}}_{{$singleChoice['id']}}" href="#"  class="addQuestionOption">Add Choice</a>
            </div>

        </div>
                                   
    </div>
                                    @elseif($result['question_type_id'] == 3)
                                    <div class="form-group" style="margin-top:30px;">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Question</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" required="" name="{{$result['id']}}_question" value="{{$result['question']}}" placeholder="Enter Question">
            </div>

        </div>
                                    @foreach($result['options'] as $key => $singleChoice)
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Choice</label>
            <div class="col-sm-6">          
                <input type="text" class="form-control" required="" value="{{$singleChoice['option_name']}}" name="{{$result['id']}}_option[]" id="choice" placeholder="Enter Chocie">
            </div>
            <div class="col-sm-3"><input type="hidden" name="{{$result['id']}}_optionBoxValue[]" @if($singleChoice['check_option'] == 1) value="1" @else value="0" @endif /><input class="{{$result['id']}}singlechoice"  onclick="changeValueForMultiple(this)" type="checkbox" @if($singleChoice['check_option'] == 1) checked="checked" @else value="0" @endif  data-parsley-checkmin="1" required name="{{$result['id']}}_singleoption[]"  id="choice"> Correct  <a href="#" id="{{$result['id']}}_{{$singleChoice['id']}}" class="delQuestionOption">delete choice</a></div>
        </div>
                                    <input type="hidden" class="checkatleastinput76{{$result['id']}}" name="{{$result['id']}}_optionids[]" data-parsley-checkmin="1" value="{{$singleChoice['id']}}" />
        
                                    @endforeach
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"></label>
            <div class="col-sm-6">          
                 <a id="{{$result['id']}}_{{$singleChoice['id']}}" class="addQuestionOption">Add Choice</a>
            </div>

        </div>
                                   
    </div>
                                    
                                @endif
                            </div>
                            
 <input type="hidden" id="" name="questiontToSave[]" value="{{$result['id']}}" />
                        </div>

                        @endforeach



                    </div>
                </div>


                <div class="form-group ">
                    <button type="submit" class="btn btn-primary pull-right">Save Question</button>
                </div>

            </form>
        </div>
    </div>
    <input type="button" class="btn btn-primary" id="addnewquestion" value="Add Question" />
</div>





<div id="sampleQuestion" style="display: none;">
    <div class="from-group" style="margin-bottom: 20px;border-bottom: 2px solid #000;padding-bottom: 10px;">
        <select name="questiontype" required=""  class="form-control selectquestiontype" style="max-width: 300px;">
            <option >Select Question Type</option>
            <option value="1">Text</option>
            <option value="2">Multiple Choice (Single Option)</option>
            <option value="3">Multiple Choice (Multiple Option)</option>
        </select>
        <div class="detailFields">

        </div>
        <input type="hidden" id="uniqueIdForQuestion" name="questiontToSave[]" />
    </div>
</div>

<div id="textTypeQuestion" style="display: none;">


    <div class="input-group">
        <label class="cols-sm-2 control-label">Enter Question</label>
        <div class="cols-sm-10">
            <input type="text" required="" class="form-control" name="" id=""  placeholder=""/>
        </div>
    </div>
    <div class="input-group">
        <label class="cols-sm-2 control-label">Answer</label>
        <div class="cols-sm-10">
            <input type="text" required="" class="form-control" name="" id=""  placeholder=""/>
        </div>
    </div>
<!--    <input type="hidden" id="" name="questiontToSave[]" />-->
</div>

<div id="multipleWithSingle" style="display: none;">
    <div class="form-group" style="margin-top:30px;">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Question</label>
            <div class="col-sm-6">
                <input type="text" required="" class="form-control" id="" placeholder="Enter Question">
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Choice</label>
            <div class="col-sm-6">          
                <input type="text" required="" class="form-control"  id="choice" placeholder="Enter Chocie">
            </div>
            <div class="col-sm-3"><input type="hidden" name="" value="0"/><input type="checkbox" onclick="changeValue(this)"  name="choice" value="0" data-parsley-checkmin="1" required="" id="choice"> Correct   <a href="#" class="delQuestionOption">delete choice</a></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Choice</label>
            <div class="col-sm-6">          
                <input type="text" required="" class="form-control" id="choice" placeholder="Enter Chocie">
            </div>
            <div class="col-sm-3"><input type="hidden" name="" value="0"/><input type="checkbox" onclick="changeValue(this)" name="choice" value="0" data-parsley-checkmin="1" required="" id="choice"> Correct   <a href="#"  class="delQuestionOption">delete choice</a></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Choice</label>
            <div class="col-sm-6">          
                <input type="text" required="" class="form-control" id="choice" placeholder="Enter Chocie">
            </div>
            <div class="col-sm-3"><input type="hidden" name="" value="0"/><input type="checkbox" onclick="changeValue(this)"  name="choice" value="0" data-parsley-checkmin="1" required="" id="choice"> Correct   <a href="#"  class="delQuestionOption">delete choice</a></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"></label>
            <div class="col-sm-6">          
                <a href="#" class="addQuestionOption">Add Choice</a>
            </div>

        </div>
<!--        <input type="hidden" id="" name="questiontToSave[]" />-->
    </div>

</div>

<div id="sampleOptionChoice" style="display: none;">
<div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Choice</label>
            <div class="col-sm-6">          
                <input type="text" required="" class="form-control" id="choice" placeholder="Enter Chocie">
            </div>
            <div class="col-sm-3"><input type="hidden" name="" value="0" /><input type="checkbox"   name="choice" value="0" data-parsley-checkmin="1" required="" id="choice"> Correct   <a href="#"  class="delQuestionOption">delete choice</a></div>
        </div>
		<input id="optionId" type="hidden" class="" name="" data-parsley-checkmin="1" value="" />
</div>


<!--<div id="multipleWithMultiple" style="display: none;">

    <div class="form-group" style="margin-top:30px;">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Question</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="question" placeholder="Enter Question">
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Choice1</label>
            <div class="col-sm-6">          
                <input type="text" class="form-control" id="choice" placeholder="Enter Chocie">
            </div>
            <div class="col-sm-3"><input type="checkbox" name="choice" id="choice"> Correct  <a href="#">delete choice</a></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Choice2</label>
            <div class="col-sm-6">          
                <input type="text" class="form-control" id="choice" placeholder="Enter Chocie">
            </div>
            <div class="col-sm-3"><input type="checkbox" name="choice" id="choice"> Correct  <a href="#">delete choice</a></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Choice3</label>
            <div class="col-sm-6">          
                <input type="text" class="form-control" id="choice" placeholder="Enter Chocie">
            </div>
            <div class="col-sm-3"><input type="checkbox" name="choice" id="choice"> Correct  <a href="#">delete choice</a></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"></label>
            <div class="col-sm-6">          
                <a href="#">Add Choice</a>
            </div>

        </div>
        <input type="hidden" id="" name="questiontToSave[]" />
    </div>
</div>-->
</div>
</div>
<div id="questionwithsingleoption">

</div>
@endsection