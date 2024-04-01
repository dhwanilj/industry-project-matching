@extends('layouts.master')

@section('title')
    Students List
@endsection

@section('content') 
    <div id='centre'>
    <h1>List of Students</h1>
    @foreach($students as $student)
        <a href="{{url("student_detail/$student->studentId")}}" >{{$student->fname}} {{$student->lname}}</a><br>
    @endforeach
    </div>
@endsection