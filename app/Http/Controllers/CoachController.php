<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Coach\StoreCoachRequest;
use App\Http\Requests\Coach\UpdateCoachRequest;

use Yajra\Datatables\Datatables;
use App\Coach;

class CoachController extends Controller
{
 
    public function index()
    {
        return view('coach.index', [
            'coach' => Coach::all()
        ]);
    }
    public function create()
    {
        $coach = Coach::all();
        return view('coach.create',[
            'coach' => $coach,
        ]);
    }
    public function store(StoreCoachRequest $request)
    {
        Coach::create(request()->all());
        return redirect()->route('coach.index');
    }

    public function get_coachdata(){
        return Datatables::of(Coach::query())->make(true);
    }


    public function edit($coach)
    {
        $coach=Coach::find($coach);
        return view ('coach.edit',[
            'coach'=>$coach,
          ]);
    }

    public function update(UpdateCoachRequest  $request,Coach $coach )
    {
      $coach->name = request()->all()['name'];
      $coach->gender = request()->all()['gender'];
    
      $coach->save();
        return redirect()->route('coach.index');

    }

      
    public function destroy(Coach $coach)
    {
         $coach->delete();
         return redirect()->route('coach.index');
    } 

    public function show(Coach $coach)
    {   
        return view('coach.show', ['coach' => $coach]);
        
    }
}
