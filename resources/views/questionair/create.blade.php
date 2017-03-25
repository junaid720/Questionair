@extends('layouts.default')
@section('content')
<div class="row col-sm-12">
    <a class="btn btn-default" href="#">Home</a>&nbsp;|&nbsp;<a class="btn btn-primary active" href="">Questionairs</a>&nbsp;|&nbsp;<a class="btn btn-default" href="#">Results</a>
</div>
<div class="container">
    
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Add new Questionair</h1>
                <hr />
            </div>
        </div> 
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" action="{{  URL::to('/create')}}">

                <div class="form-group">
                    <label for="Questionair" class="cols-sm-2 control-label">Questionair Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="txtquestionairname" id="txtquestionairname"  placeholder="Enter your Questionair Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Duration" class="cols-sm-2 control-label">Duration</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="txtduration" id="txtduration"  placeholder="Enter your Duration"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dutation" class="cols-sm-2 control-label">Duration</label>
                    <div class="cols-sm-10">
                        <select class="form-control" id="slcnduration" name="slcnduration">
                            <option value="">Please Select</option>
                            <option value="minutes" >Minutes</option>
                            <option value="hours">Hours</option>
                           
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dutation" class="cols-sm-2 control-label">Can Resume ?</label>
                    <div class="cols-sm-10">
                        <input type="radio" name="canresume" value="1">Yes
                        <input type="radio" name="canresume" value="0">No
                    </div>
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Save</button>
                </div>
               
            </form>
        </div>
    </div>
</div>
@endsection