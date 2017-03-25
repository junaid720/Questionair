@include('layouts.header')
@section('content')

<div class="row col-sm-12">
    <a class="btn btn-default" href="#">Home</a>&nbsp;|&nbsp;<a class="btn btn-primary active" href="">Questionairs</a>&nbsp;|&nbsp;<a class="btn btn-default" href="#">Results</a>
</div>
<div class="container">
    <h2>Questionairs</h2><a class="btn btn-default pull-right" href="create">Add New Questionair</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Questionair Name</th>
                <th>Number of Questions</th>
                <th>Duration</th>
                <th>Can resume</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $result)

            <tr>
                <td>{{$result->id}}</td>
                <td>{{$result->questionair_name}}</td>
                <td>{{$result->questionsCount()->count()}} | <a href="{{URL::to('/createquestion')}}/{{$result->id}}">Add</a></td>
                <td>{{$result->duration}}</td>
                <td> 
                    @if($result->can_resume == 1)
                    yes
                    @else
                    no
                    @endif
                </td>
                <td>Edit | Delete</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layouts.footer')