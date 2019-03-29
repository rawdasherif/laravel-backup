<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Package;
use App\User;
use App\Gym;
use App\Sale;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Stripe\Stripe;

class BuyPackageController extends Controller
{
    public function index(){
        return view('buy_package.index');
    }

    public function get_packagedata(){
        return Datatables::of(Package::query())->make(true);
    }


    public function edit($buy_package)
    {
        $buy_package=Package::find($buy_package);
        $Users = DB::select('select * from users where role = :role', ['role' => 'user']);
        $Gyms = Gym::all();
        return view ('buy_package.edit',[
            'Gyms' => $Gyms,
            'Users'=>$Users,
            'buy_package'=>$buy_package,
          ]);
    }    
    
    public function update(Request  $request,Package $buy_package)
    {
        $user_id=request()->all()['user_id']; 
        $Remaning_session=DB::select('select Remaning_session from users where id = :id', ['id' => $user_id]);
        $Remaning_session=$Remaning_session[0]->Remaning_session+$buy_package['sessions_no'];
        $user=User :: where('id',$user_id)->first();
        $user->Remaning_session=$Remaning_session;
        $user->save();

        $gym_id=request()->all()['gym_id']; 
        $revenue=DB::select('select revenue from gyms where id = :id', ['id' => $gym_id]);
        $revenue=$revenue[0]->revenue+$buy_package['price'];
        $gym=Gym :: where('id',$gym_id)->first();
        $gym->revenue=$revenue;
        $gym->save();

        Stripe::setApiKey("sk_test_01KGr7o8QH5AP7PQndnvdChW00iqUXU4RS");
        $token = $request->stripeToken;
        $package=Package::find($buy_package)->first();
        $price = $package->price;

        $charge = \Stripe\Charge::create([
            'amount' => $price,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);
            
         //dd($charge->amount);
        if ($charge->status=="succeeded"){
            Sale::create([
               'user_id'=> request()->all()['user_id'],
               'gym_id'=> request()->all()['gym_id'],
               'package_id'=> request()->all()['package_id'],
               'price'=>$charge->amount,
            ]);
   
        }
        return redirect()->route('buy_package.index');

    }
    
}
