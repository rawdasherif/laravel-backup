@extends('layouts.admin')

@section('content') 
<br>
<a  class="btn btn-info btn-sm" style="float: right;" href="{{route('city.index')}}" >Back</a>
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

<form action="{{route('city.store')}}" method='POST'>
@csrf
  <fieldset >
    <div class="form-group">
      <label for="disabledTextInput">Name :</label>
      <input type="text" name="name" id="disabledTextInput" class="form-control" placeholder="Enter your Name">
    </div>


    <div class="form-group">
    <label for="disabledTextInput"> Choose Country:</label>
    <select  id="exampleFormControlSelect1" name="country_id">
    @foreach ($Countries as $Country)
    <option value="{{$Country->id}}">{{$Country->name}}</option>
      @endforeach
    </select>
    </div>
 
    <button type="submit" class="btn btn-success">Add City</button>
  </fieldset>
</form>
@endsection 