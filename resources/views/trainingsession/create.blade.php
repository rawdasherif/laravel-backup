@extends('layouts.admin')

@section('content') 
<br>
<a  class="btn btn-info btn-sm" style="float: right;" href="{{route('trainingsession.index')}}" >Back</a>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>

<form action="{{route('trainingsession.store')}}" method='POST'>
@csrf
{{ method_field('PATCH')}}
 
<<fieldset >
    <div class="form-group">
      <label for="disabledTextInput">Name :</label>
      <input type="text" name="name" id="disabledTextInput" class="form-control" placeholder="Enter your Name">
    </div>

    <div class="form-group">
      <label for="disabledTextInput">Start At:</label>
      <input type="date" name="start_at" id="disabledTextInput" class="form-control" >
    </div>

    <div class="form-group">
      <label for="disabledTextInput">Finish At:</label>
      <input type="date" name="finish_at" id="disabledTextInput" class="form-control" >
    </div>

    <div class="form-group">
    <label for="disabledTextInput"> Choose Gym:</label>
    <select  id="exampleFormControlSelect1" name="gym_id">
    @foreach ($Gyms as $Gym)
    <option value="{{$Gym->id}}">{{$Gym->name}}</option>
      @endforeach
    </select>
    </div>
    <div class="form-group">
    <label for="disabledTextInput"> Choose Coach:</label>
    <select  id="exampleFormControlSelect1" name="coach_id">
    @foreach ($Coaches as $Coach)
    <option value="{{$Coach->id}}">{{$Coach->name}}</option>
      @endforeach
    </select>
    </div>

 
    <button type="submit" class="btn btn-success">Add Coach</button>
  </fieldset>
</form>
@endsection 