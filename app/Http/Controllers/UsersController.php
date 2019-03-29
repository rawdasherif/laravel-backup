<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\User\StoreUserRequest ;
use App\Http\Requests\User\UpdateUserRequest ;
use Illuminate\Support\Facades\DB;
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
    public function imgStore($request,$user)
    {
        $file=$request->file('profile_request');
        $fileName=$request['name'].'-'.$user->name.'.jpg';
        if($file){
            Storage::disk('public')->put($fileName,File::get($file));
        }
        return  $fileName;
      
    }
       
    public function create(){
        $Gyms = Gym::all();
        $Cities=City::all();
        return view('userweb.create',[
            'Gyms' => $Gyms,'Cities'=>$Cities,
        ]);
    }
    public function store(Request $request)
    {  
       //dd($request);StoreUserRequest
       $user= User::create(request()->all());
       $user->role='user';
       $user->save();

    //    $image=request()->profile_img;
    //    //dd($image);
    //  //dd(request()->profile_img);
    //    //$imageName = time().'.'.request()->profile_img;
    //    //request()->profile_img->move(public_path('storage/images'), $imageName);
    //  $new_name=rand() . '.' . $image->getClientOriginalExtension();
    //     $image=move(public_path("storage/images"),$new_name);
    //     dd($image);
    // //    return back()->with('succes','Image Uploaded Successfuly');
       return redirect()->route('userweb.create');
    }

    public function get_userwebdata(){
        $results = DB::select('select * from users where role = :role', ['role' => 'user']);
        return Datatables::of($results)->make(true);
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
      $user->profile_img= request()->all()['profile_img'];
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
