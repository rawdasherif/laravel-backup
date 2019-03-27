@extends('layouts.master')


@section('content') 
<br>
<a class="btn btn-info" href="{{route('userweb.create')}}">Add New User</a>
<br><br>
         <div class="container" style="width:100%">
            <table class="table table-bordered" id="table" >
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Date Of Birth</th>
                     <th>Email</th>
                     <th>Password</th>
                     <th>National ID</th>
                     <th>Role</th>
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
               ajax: 'http://127.0.0.1:8000/userweb/get_userwebdata',         
               columns: [
                           { data: 'id', name: 'id' },
                           { data: 'name', name: 'name' },
                           { data: 'date_of_birth', name: 'ate_of_birth' },
                           { data: 'email', name: 'email' },  
                           { data: 'password', name: 'password' },
                           { data: 'National_id', name: 'National_id' },  
                           { data: 'role', name: 'role' },
                           { data: "actions",
                              "render": function(data, type, row) {
                                 return '<a  href="userweb/'+row.id+'/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>    <form method="POST" action="userweb/'+row.id+'">@csrf   {{ method_field('DELETE')}}<button type="submit" onclick="return myFunction();" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></button></form>'                        
                                 ;}     
                           }
                       
                     ]
                  });
              });
                     //confirm deleting 
                     function myFunction(){
                     var agree = confirm("Are you sure you want to delete this User?");
                        if(agree == true){
                           return true
                           }
                           else{
                           return false;
                           }
                     }

         </script>


@endsection 

