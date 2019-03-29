@extends('layouts.master')

@section('content') 
<br>
<a class="btn btn-info" href="{{route('trainingsession.create')}}">Add New Training Session</a>
<br><br>
         <div class="container" style="width:100%">
            <table class="table table-bordered" id="table" >
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Start At</th>
                     <th>End At</th>
                     <th>City</th>
                     <th>Coach</th>
                     <th>Actions</th>
                  </tr>
               </thead>
            </table>
         </div>
       <script>
         $(document).ready( function () {
               $('#table').DataTable({
               processing: true,
               serverSide: true, 
               deferRender: true,  
               ajax: 'http://127.0.0.1:8000/trainingsession/get_trainingsessiondata',         
               columns: [
                           { data: 'id', name: 'id' },
                           { data: 'name', name: 'name' },
                           { data: 'start_at', name: 'start_at' },  
                           { data: 'finish_at', name: 'finish_at' },
                           { data: 'city.name', name: 'city.name' },  
                           { data: 'coach.name', name: 'coach.name' },
                           { data: "actions",
                              "render": function(data, type, row) {
                                 return '<a  href="trainingsession/'+row.id+'/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>    <form method="POST" action="trainingsession/'+row.id+'">@csrf   {{ method_field('DELETE')}}<button type="submit" onclick="return myFunction();" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></button></form>'                        
                                 ;}     
                           }
                       
                     ]
                  });
              });
                     //confirm deleting 
                     function myFunction(){
                     var agree = confirm("Are you sure you want to delete this Training Session?");
                        if(agree == true){
                           return true
                           }
                           else{
                           return false;
                           }
                     }

         </script>


@endsection 