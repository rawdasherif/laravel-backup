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
  <label for="exampleInputEmail1" >This package is:</label>
  <select  id="exampleFormControlSelect1" name="package_id">
    <option value="{{$buy_package->id}}">{{$buy_package->name}}</option>
    </select>
    <br><br>

    <label for="exampleInputEmail1" >User Name:</label>
    <select  id="exampleFormControlSelect1" name="user_id">
    @foreach ($Users as $User)
    <option value="{{$User->id}}">{{$User->name}}</option>
      @endforeach
    </select>

  </div>
  @role('city_manager|admin')
  <div class="form-group">
    <label for="exampleInputPassword1">Choose Gym: </label>
    <select  id="exampleFormControlSelect1" name="gym_id">
    @foreach ($Gyms as $Gym)
    <option value="{{$Gym->id}}">{{$Gym->name}}</option>
      @endforeach
    </select>
  </div>
  @endrole

  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_0ybeJtUNQwtYglVVps4q24bu00QhnyrD2v"
    data-amount="{{$buy_package->price}}"
    data-name="Demo Site"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
  <br>
  <br>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection 