@extends('layouts.master')

@section('content') 
<br>
         <div class="container" style="width:100%">
            <table class="table table-bordered" id="table" >
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Number of Sessions</th>
                     <th>Buy Backage</th>
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
               ajax: 'http://127.0.0.1:8000/buy_package/get_packagedata',         
               columns: [
                        { data: 'name', name: 'name' }, 
                        { data: 'price', name: 'price' },  
                        { data: 'sessions_no', name: 'sessions_no' },                       
                        { data: "buybackage",
                            "render": function(data, type, row) {
                            return '<a  href="/buy_package/'+row.id+'/edit" class="btn btn-success">Buy</a>'                                
                               ;}     
                        }
                     ]
                  });
              });

         </script>


@endsection 