@extends('layouts.master')

@section('title')
    Student's Applications
@endsection

@section('content')
    <div id='centre'> 
    <h1>{{$student1->fname}} {{$student1->lname}}'s Applications</h1>
    <table class="bordered">
    
      <tr><th>Project</th><th>Partner</th></tr>
    @foreach ($students as $student)
    <tr><td> {{$student->projectTitle}}</td><td> {{$student->partnerName}}</td></tr>
    @endforeach
    </div>
@endsection