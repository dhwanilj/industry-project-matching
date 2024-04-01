@extends('layouts.master')

@section('title')
    Delete Project
@endsection

@section('content') 
    <div id='centre'>
    <h1>Delete Project</h1>

    <form method="post" action="{{url("delete_project_action")}}">
        @csrf
        <input type='hidden' name='projectId' value='{{$project->projectId}}'><br>
        Do you want to really delete this project?<br>
        <input type="submit" value="Confirm deleting project">
    </form>
    </div>
@endsection