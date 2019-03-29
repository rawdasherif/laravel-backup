@extends('layouts.admin')

@section('content') 

<br>
<a  class="btn btn-info btn-sm" style="float: right;" href="{{route('userweb.index')}}" >Back</a>
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

<form action="{{route('userweb.store')}}" method='POST' enctype="multipart/form-data" >
@csrf

<fieldset >
    <div class="form-group">
      <label for="disabledTextInput">Name :</label>
      <input type="text" name="name" id="disabledTextInput" class="form-control" placeholder="Enter the user Name">
    </div>

    <div class="form-group">
      <label for="disabledTextInput">Date Of Birth</label>
      <input type="date" name="date_of_birth" id="disabledTextInput" class="form-control" >
    </div>

    <div class="form-group">
      <label for="disabledTextInput">Email:</label>
      <input type="email" name="email" id="disabledTextInput" class="form-control" >
    </div>

    <div class="form-group">
      <label for="disabledTextInput">Password :</label>
      <input type="password" name="password" id="disabledTextInput" class="form-control" placeholder="Password contain 6 values" >
    </div>


    <div class="form-group">
      <label for="disabledTextInput">National ID :</label>
      <input type="number" name="National_id" id="disabledTextInput" class="form-control"  >
    </div>

    <div  class="form-group" action="/userweb">
    Select a profile image:
     <input type="file" name="profile_img"><br><br>
    </div>

    <div class="form-group">
    <label for="disabledTextInput"> Choose User Role :</label>

    <select  id="exampleFormControlSelect1" name="role">
    <option >user</option>
      
    </select>
   
  <br>
    <button type="submit" class="btn btn-success">Add User</button>
  </fieldset>
</form>

@endsection 