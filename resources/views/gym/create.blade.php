@extends('layouts.admin')

@section('content') 
<br>
<a  class="btn btn-info btn-sm" style="float: right;" href="{{route('gym.index')}}" >Back</a>
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

<form action="{{route('gym.store')}}" method='POST'>
@csrf
  <fieldset >
    <div class="form-group">
      <label for="disabledTextInput">Name :</label>
      <input type="text" name="name" id="disabledTextInput" class="form-control" placeholder="Enter your Name">
    </div>

    <div class="form-group">
      <label for="disabledTextInput">Created At:</label>
      <input type="date" name="create_at" id="disabledTextInput" class="form-control" >
    </div>

    <div class="form-group">
    <label for="exampleFormControlFile1">Upload Cover Image :</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" >
   </div>
   
   <div class="form-group">
    <label for="disabledTextInput"> Choose Country:</label>
    <select  id="exampleFormControlSelect1" name="city_id">
    @foreach ($cities as $city)
    <option value="{{$city->id}}">{{$city->name}}</option>
      @endforeach
    </select>
    </div>
 
    <button type="submit" class="btn btn-success">Add Gym Manager</button>
  </fieldset>
</form>
@endsection 