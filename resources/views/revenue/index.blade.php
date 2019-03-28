@extends('layouts.admin')

@section('content')

<br><br>
<div class="card text-white bg-info mb-3" style="max-width: 50rem;" >
  <div class="card-body" style="margin: 0 auto;" >
  <br>
   
@if(auth()->user()['role'] =='gym_manager') 
    <h1 class="card-text" style="color: #070707;">Revenue of this Gym is :</h1>
    <h1 class="card-text" >{{$Revenue->revenue}}</h1>
@elseif (auth()->user()['role'] =='city_manager') 
    <h1 class="card-text" style="color: #070707;">Revenue of this City is :</h1>
    <h1 class="card-text" >{{$city_revenue->revenue}}</h1>
@elseif (auth()->user()['role'] =='admin') 
    <h1 class="card-text" style="color: #070707;">Revenue is :</h1>
    <h1 class="card-text" >{{$revenue}}</h1>
@endif  
    <br>
  </div>

@endsection