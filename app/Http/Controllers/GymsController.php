<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gym;
use App\User;
use App\City;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class GymsController extends Controller
{
    public function index(){
        return view('gym.index');
    }

    public function get_gymdata(){
        return Datatables::of(Gym::query())->make(true);
    }

    public function create(){

            $cities=City::all();
        return view('gym.create',[
            'cities'=>$cities,
        ]);
    }

    public function store(Request $request){
        $data=$request->all();
        $user=Gym::create($data);
        if(auth()->user()['role']=='city_manager')
        {
            $user_id=auth()->user()['id'];
            $city_id=DB::select('select city_id from users where id = :id', ['id' =>$user_id ]);
            $city_id=$city_id[0]->city_id;
            $user->city_id=$city_id;
            $user->save();  
            return redirect()->route('gym.index');
        }
        else{
        $user->city_id=$data['city_id'];
        $user->save();
        return redirect()->route('gym.index');
        }
    }

    public function edit($gym)
    {

        $cities=City::all();
        $gym=Gym::find($gym);
        return view ('gym.edit',[
            'gym'=>$gym,
            'cities'=>$cities,
          ]);
    }

    public function update(Request  $request,Gym $gym )
    {
        $data=$request->all();
        if(auth()->user()['role']=='city_manager')
        {
            $user_id=auth()->user()['id'];
            $city_id=DB::select('select city_id from users where id = :id', ['id' =>$user_id ]);
            $city_id=$city_id[0]->city_id;
            $user->city_id=$city_id;
            $user->save();  
            return redirect()->route('gym.index');
        }
        else{
            $gym->name = request()->all()['name'];
            $gym->created_at = request()->all()['created_at'];
            $gym->city_id = request()->all()['city_id'];
            $gym->save();
              return redirect()->route('gym.index');
        }

    }

      
    public function destroy(Gym $gym)
    {
         $gym->delete();
         return redirect()->route('gym.index');
    } 
}

