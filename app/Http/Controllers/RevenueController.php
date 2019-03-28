<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Gym;
use View;
use App\City;
class RevenueController extends Controller
{
    public function index(){
        if (auth()->user()['role'] == 'gym_manager'){
            $gym_id_manager=auth()->user()['gym_id'] ;
            $Revenue=Gym::where('id',$gym_id_manager)->first();
            return view ('revenue.index',[
                'Revenue'=> $Revenue,
              ]);
            }
        elseif(auth()->user()['role'] == 'city_manager'){
            $city_id_manager=auth()->user()['city_id'] ;
            $gyms=Gym::where('city_id',$city_id_manager)->get();
            $revenue=0;
            foreach($gyms as $gym )
            {
             $revenue=$gym['revenue']+$revenue;
            }
            $city_revenue=City::where('id',$city_id_manager)->first(); 
            $city_revenue->revenue=$revenue;
            $city_revenue->save();
            return view ('revenue.index',[
                'city_revenue'=> $city_revenue,
              ]);
        }  
        elseif(auth()->user()['role'] == 'admin'){
            $cities=City::all();
            $revenue=0;
            foreach($cities as $city )
            {
            $revenue=$city->revenue+$revenue;
            }
            return view ('revenue.index')->with('revenue', $revenue);

        }   
    }
}
