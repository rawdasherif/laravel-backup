<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Package\StorePackageRequest;
use App\Http\Requests\Package\UpdatePackageRequest ;
use Yajra\Datatables\Datatables;
use App\Package;

class PackageController extends Controller
{
    
    public function index()
    {
        return view('package.index', [
            'package' => Package::all()
        ]);
    }
    public function create()
    {
        $package = Package::all();
        return view('package.create',[
            'package' => $package,
        ]);
    }
    public function store(StorePackageRequest $request)
    {
        Package::create(request()->all());
        return redirect()->route('package.index');
    }

    public function get_packagedata(){
        return Datatables::of(Package::query())->make(true);
    }


    public function edit($package)
    {
        $package=Package::find($package);
        return view ('package.edit',[
            'package'=>$package,
          ]);
    }

    public function update(UpdatePackageRequest  $request,Package $package )
    {
      $package->name = request()->all()['name'];
      $package->price = request()->all()['price'];
      $package->sessions_no = request()->all()['sessions_no'];
    
      $package->save();
        return redirect()->route('package.index');

    }

      
    public function destroy(Package $package)
    {
         $package->delete();
         return redirect()->route('package.index');
    } 

   
}
