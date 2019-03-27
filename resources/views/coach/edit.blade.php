@extends('layouts.admin')

@section('content') 
<br>
<a  class="btn btn-info btn-sm" style="float: right;" href="{{route('coach.index')}}" >Back</a>
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

<form action="/coach/{{ $coach->id }}" method='POST'>
@csrf
{{ method_field('PATCH')}}
  <fieldset >
    <div class="form-group">
      <label for="disabledTextInput">Name :</label>
      <input type="text" name="name" id="disabledTextInput" class="form-control"  value ="{{$coach->name}}">
    </div>

    <div class="form-group">
      <label for="disabledTextInput">Gender :</label>
      <input type="text" name="gender" id="disabledTextInput" class="form-control"  value ="{{$coach->gender}}">
    </div>

 
    <button type="submit" class="btn btn-success">Add Coach</button>
  </fieldset>
</form>
@endsection 