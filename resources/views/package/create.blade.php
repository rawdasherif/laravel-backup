@extends('layouts.admin')

@section('content') 
<br>
<a  class="btn btn-info btn-sm" style="float: right;" href="{{route('package.index')}}" >Back</a>
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

<form action="{{route('package.store')}}" method='POST'>
@csrf
  <<fieldset >
    <div class="form-group">
      <label for="disabledTextInput">Name :</label>
      <input type="text" name="name" id="disabledTextInput" class="form-control" placeholder="Enter package Name">
    </div>

    <div class="form-group">
      <label for="disabledTextInput">price :</label>
      <input type="number" name="price" id="disabledTextInput" class="form-control" >
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Sessions Number :</label>
      <select type="number"  id="exampleFormControlSelect1" name="sessions_no">
      <option>5</option>
      <option>10</option>
      <option>20</option>
   
    </select>
    </div>

 
    <button type="submit" class="btn btn-success">Add Package</button>
  </fieldset>
</form>
@endsection 