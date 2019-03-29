@extends('layouts.master')

@section('content') 
<br>

         <div class="container" style="width:100%">
            <table class="table table-bordered" id="table" >
               <thead>
                  <tr>
                     <th>User</th>
                     <th>Package</th>
                     <th>Gym</th>   
                     <th>Price</th>
     
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
               ajax: 'http://127.0.0.1:8000/sale/get_saledata',         
               columns: [
                           { data: 'user.name', name: 'user.name' },
                           { data: 'package.name', name: 'package.name' },
                           { data: 'gym.name', name: 'gym.name' },  
                           { data: 'price', name: 'price' },
                     
                       
                     ]
                  });
              });
                     
         </script>


@endsection 