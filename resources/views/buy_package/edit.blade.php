@extends('layouts.admin')

@section('content') 
<br>
<h2>{{$buy_package->name}} Package</h2>
<label>Number of sessions:</label><p>{{$buy_package->sessions_no}}</p>
<label>Price:</label><p>{{$buy_package->price}}</p>

<br>

<form action="/buy_package/{{$buy_package->id}}" method='POST'>
@csrf
{{ method_field('PATCH')}}
  <div class="form-group">
    <label for="exampleInputEmail1" >User Name:</label>
    <select  id="exampleFormControlSelect1" name="user_id">
    @foreach ($Users as $User)
    <option value="{{$User->id}}">{{$User->name}}</option>
      @endforeach
    </select>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Choose Gym: </label>
    <select  id="exampleFormControlSelect1" name="gym_id">
    @foreach ($Gyms as $Gym)
    <option value="{{$Gym->id}}">{{$Gym->name}}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection 