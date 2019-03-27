@extends('layouts.master')

@section('content') 
 
<a class="btn btn-info" href="{{route('package.create')}}">Create New Package </a> 
<br><br>
         <div class="container" style="width:100%">
            <table class="table table-bordered" id="table" >
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Sessions Number</th>
                     <th>actions</th>
                    
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
               ajax: 'http://127.0.0.1:8000/package/get_packagedata',         
               columns: [

                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'price', name: 'price' },  
                        { data: 'sessions_no', name: 'sessions_no' },                          
                        { data: "actions",
                            "render": function(data, type, row) {
                            return '<a  href="package/'+row.id+'/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>    <form method="POST" action="package/'+row.id+'">@csrf   {{ method_field('DELETE')}}<button type="submit" onclick="return myFunction();" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></button></form>'                                
                               ;}     
                        }
                     ]
                  });
              });
                     //confirm deleting 
                     function myFunction(){
                     var agree = confirm("Are you sure you want to delete this Package?");
                        if(agree == true){
                           return true
                           }
                           else{
                           return false;
                           }
                     }

         </script>

@endsection 