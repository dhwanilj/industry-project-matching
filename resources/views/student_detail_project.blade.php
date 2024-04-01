@extends('layouts.master')

@section('title')
    Student Justification
@endsection

@section('content') 
    <h1>Student Details</h1>
    
    <p> Student name: {{$student->fname}} {{$student->lname}}
    <p> Project: {{$student->projectTitle}}
    <p> Justification: {{$student->justification}}</p><hr>
    
@endsection