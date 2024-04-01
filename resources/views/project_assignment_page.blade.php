@extends('layouts.master')

@section('title')
    Project And Students
@endsection

@section('content') 
    @foreach($assign as $a)
        @foreach($a as $b)
            @foreach($b as $c)
                {{dd($c)}}
            @endforeach
        @endforeach
    @endforeach
@endsection