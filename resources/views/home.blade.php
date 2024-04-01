@extends('layouts.master')
    
@section('title')
    Work Integrated Learning
@endsection

@section('content') 
    <div id='centre'>
    <h1> Projects </h1>
    <table class="bordered"> 
        <tr><th>Project Title</th><th>Partner</th><th>Location</th><th>Number Of Applicants</th></tr>
        @foreach($projects as $project)
            <tr><td><a href="{{url("project_detail/$project->projectId")}}">{{$project->projectTitle}}</a></td>  <td>{{$project->partnerName}}</td><td>{{$project->partnerLocation}}</td><td>{{$project->NoOfApplication}}</td></tr>
        @endforeach
    </table>
    <br>
    <br>

    
    </div>
@endsection