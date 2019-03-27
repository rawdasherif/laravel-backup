<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\TrainingSession\StoreTrainingSessionRequest ;
use App\Http\Requests\TrainingSession\UpdateTrainingSessionRequest ;
use App\TrainingSession;
use App\Gym;
use App\Coach;

class TrainingSessionsController extends Controller
{
    public function index()
    {
        return view('trainingsession.index', [
            'trainingsession' => TrainingSession::all()
        ]);
    }
   
       
    public function create(){
        $Gyms = Gym::all();
        $Coaches=Coach::all();
        return view('trainingsession.create',[
            'Gyms' => $Gyms,'Coaches'=>$Coaches,
        ]);
    }
    public function store(StoreTrainingSessionRequest $request)
    {
        TrainingSession::create(request()->all());
        return redirect()->route('trainingsession.create');
    }

    public function get_trainingsessiondata(){
        return Datatables::of(TrainingSession::query())->make(true);
    }


    public function edit( $trainingsession)
    {
        $trainingsession=TrainingSession::find($trainingsession);
        $Gyms = Gym::all();
        $Coaches = Coach::all();
        return view ('trainingsession.edit',[
            'trainingsession'=>$trainingsession,
            'Gyms'=>$Gyms,
            'Coaches' => $Coaches,
          ]);
    }

    public function update(UpdateTrainingSessionRequest  $request,TrainingSession $trainingsession )
    {
      $trainingsession->name = request()->all()['name'];
      $trainingsession->start_at = request()->all()['start_at'];
      $trainingsession->finish_at = request()->all()['finish_at'];
    
      $trainingsession->save();
        return redirect()->route('trainingsession.index');

    }

      
    public function destroy(TrainingSession $trainingsession)
    {
         $trainingsession->delete();
         return redirect()->route('trainingsession.index');
    } 
}
