<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\User\StoreUserRequest ;
use App\Http\Requests\User\UpdateUserRequest ;
use App\User;
use App\Gym;
use App\City;

class UsersController extends Controller
{
    public function index()
    {
        return view('userweb.index', [
            'user' => User::all()
        ]);
    }
   
       
    public function create(){
        $Gyms = Gym::all();
        $Cities=City::all();
        return view('userweb.create',[
            'Gyms' => $Gyms,'Cities'=>$Cities,
        ]);
    }
    public function store(StoreUserRequest $request)
    {
       $user= User::create(request()->all());
       $user->role='user';
       $user->save();

        return redirect()->route('userweb.create');
    }

    public function get_userwebdata(){
        return Datatables::of(User::query())->make(true);
    }


    public function edit( $user)
    {
        $user=User::find($user);
        $Gyms = Gym::all();
        $Cities = City::all();
        return view ('userweb.edit',[
            'user'=>$user,
            'Gyms'=>$Gyms,
            'Cities' => $Cities,
          ]);
    }

    public function update(UpdateUserRequest  $request,User $user )
    {
      $user->name = request()->all()['name'];
      $user->date_of_birth= request()->all()['date_of_birth'];
      $user->email= request()->all()['email'];

      $user->password = request()->all()['password'];
      $user->National_id= request()->all()['National_id'];
      $user->role= request()->all()['role'];
    
      $user->save();
        return redirect()->route('userweb.index');

    }

      
    public function destroy(User $user)
    {
         $user->delete();
         return redirect()->route('userweb.index');
    } 
}
