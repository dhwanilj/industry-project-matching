@extends('layouts.master')
    
@section('title')
    Edit Project
@endsection

@section('content') 
    <div id='centre'>
    <h1>Edit Project</h1>
    <form method="post" action="{{url("edit_project_action")}}">
        @csrf
        <input type="hidden" name="projectId" value="{{$project->projectId}}">
        <p>
        <label>Project Title: </label>
        <input type="text" name="projectTitle" value="{{$project->projectTitle}}">
        </p>
        <p>
        <label>Project Field:</label>
        <select name="projectField">
            <option value="{{$project->projectField}}">{{$project->projectField}}</option>
            <option value="Software Development">Software Development</option>
            <option value="Data Analytics">Data Analytics</option>
            <option value="Network and Security">Network and Security</option>
            <option value="Information Systems and Enterprise Architecture">Information Systems and Enterprise Architecture</option>
        </select> 
        </p>
        <p>
        <label>Project Description:</label>
        <input type="text" name="projectDetails" value="{{$project->projectDetails}}">
        </p>
        <p>
        <label>Number Of Students:</label>
        <select name="NoOfStudents">
            <option value="{{$project->NoOfStudents}}">{{$project->NoOfStudents}}</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        </p>
        <input type="submit" value="Edit Project">
    </form> 
    </div>
@endsection