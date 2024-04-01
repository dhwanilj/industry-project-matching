@extends('layouts.master')

@section('title')
    Application Form
@endsection

@section('content') 
    <div id='centre'>
    <h1> Student Application Form</h1>
    <form method="post" class='input' action="{{url("student_apply_action/$project->projectId")}}">
        @csrf
        <input type="hidden" name="projectId" value="{{$project->projectId}}">
        <input type="hidden" name="NoOfApplication" value="{{$project->NoOfApplication}}">
        <h1>Project: {{$project->projectTitle}}</h1>
        <h4>Partner: {{$project->partnerName}}</h4>
        <p>
        <label>First name* </label><br>
        <input type="text" name="fname" value='{{Session::get('fname')}}' required pattern="[A-Za-z]{3,}" minlength='3' title='minimum 3 characters'>
        </p>
        <p>
        <label>Last name* </label><br>
        <input type="text" name="lname" value='{{Session::get('lname')}}' required pattern="[A-Za-z]{3,}" minlength='3' title='minimum 3 characters'>
        </p>
        <p>
        <label>Justification* </label><br>
        <textarea type="text" name="justification" rows='5' columns='100' required></textarea>
        </p>
        <p>
        <label>Preference* </label><br>
        <select name="preference" required>
            <option value=''>Choose one</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        </p>
        <input type="submit" value="Apply" ><br>
        @if($errors->any())
            {{$errors->first()}}
        @endif
    </form>
    </div>
@endsection