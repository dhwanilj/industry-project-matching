@extends('layouts.master')

@section('title')
    Project Detail
@endsection

@section('content') \
    <div id='centre'>
    <h1>Project Details</h1>
    <p>Project Title: {{$project->projectTitle}}<p>
    <p>Project Field: {{$project->projectField}}</p>
    <p>Project Description: {{$project->projectDetails}}</p>
    <p>No of Students Required: {{$project->NoOfStudents}}</p>
    <p>Industry Partner: {{$project->partnerName}}</p>
    <p>Location: {{$project->partnerLocation}}</p>

    <h3>Applicants</h3>
    <table class="bordered">
    
        <tr><th>Student Name</th><th>Preference</th></tr>
    @foreach($applicants as $applicant)
        <form method='post'>
            <input type='hidden' name='projectId' value= '{{$applicant->projectId}}'>
            <tr><td><a href="{{url("student_detail_project/$applicant->projectId/$applicant->studentId")}}">{{$applicant->fname}} {{$applicant->lname}}</a></td><td>{{$applicant->preference}}</td></tr>
        </form>
    @endforeach
    </table>
    <h2><a href="{{url("student_apply/$project->projectId")}}">Apply</a></h2>
    <h2><a href="{{url("delete_project/$project->projectId")}}">Delete Project</a></h2>
    <h2><a href="{{url("edit_project/$project->projectId")}}">Edit Project</a></h2>
    </div>
    
    
@endsection