@extends('layouts.master')

@section('title')
    Top 3 Partners
@endsection

@section('content')
    <div id='centre'>
    <h1> Top 3 Industry Partner</h1>
    <table class="bordered">
    
      <tr><th>Partner</th><th>No of Projects</th></tr>
        @foreach($top3 as $top)
            <tr><td>{{$top->partnerName}}</td><td>{{$top->total}}</td>
        @endforeach
    </table>
    </div>
@endsection