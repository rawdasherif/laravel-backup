<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\City\StoreCityRequest;
use Yajra\Datatables\Datatables;
use App\City;
use App\Country;

class CityController extends Controller
{
    public function index()
    {
        return view('city.index', [
            'city' => City::with('Country')->get(),
                        
        ]);
     }
    public function create()
    {
        $Cities = City::all();
        $Countries = Country::all();
        return view('city.create',[
            'Countries' => $Countries,
        ]);
    }
    public function store(City $request)
    {
        City::create(request()->all());
        return redirect()->route('city.index');
    }

    public function get_citydata(){

        return datatables()->of(City::with('Country'))->toJson();
        
       
       
    }


    public function edit( $city)
    {
        $city=City::find($city);   
        $Countries =Country ::all();
        return view ('city.edit',[
            'city'=>$city,
            'Countries' => $Countries,
          ]);
    }

    public function update(Request  $request,City $city )
    {
      $city->name = request()->all()['name'];  
      $city->save();
        return redirect()->route('city.index');

    }
    
    public function destroy(City $city)
    {
         $city->delete();
         return redirect()->route('city.index');
    } 

   }