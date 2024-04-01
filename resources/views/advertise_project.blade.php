@extends('layouts.master')

@section('title')
    Advertise 
@endsection

@section('content') 
    <div  id='centre'>
    <h1>Advertise a Project</h1>
    <form method="post" action="{{url("advertise_project_action")}}">
        {{csrf_field()}}
        <p>
        <label>Industry Partner *</label>
        <input type="text" name="partnerName" value='{{Session::get('partnerName')}}'>
        </p>
        <p>
        <label>Project Location *</label>
        <input type="text" name="partnerLocation" value='{{Session::get('partnerLocation')}}'>
        </p>
        <p>
        <label>Project Title *</label>
        <input type="text" name="projectTitle">
        </p>
        <p>
        <label>Project Field *</label>
        <select name="projectField">
            <option value="">Choose one</option>
            <option value="Software Development">Software Development</option>
            <option value="Data Analytics">Data Analytics</option>
            <option value="Network and Security">Network and Security</option>
            <option value="Information Systems and Enterprise Architecture">Information Systems and Enterprise Architecture</option>
        </select>
        </p>
        <p>
        <label>Project Details *</label>
        <textarea type="text" name="projectDetails"></textarea>
        </p>
        <p>
        <label>Number Of Students *</label>
        <select name="NoOfStudents">
            <option value="">Choose one</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        </p>
        <input type="submit" name="Advertise">

        <p>* means required field</p>
        @if($errors->any())
            {{$errors->first()}}
        @endif
    </form>
    </div>
@endsection