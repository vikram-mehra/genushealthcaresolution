 @extends('admin/layout/master')
 @section('main-contant')
 <main>
   <div class="container-fluid">
     <h2 class="mt-5 mb-4">View Register Student</h2>
     <div class="row">
       <div class="col-md-12">
         <div class="filter-cont mb-3">
           <form action="" method="get">
             <div class="row">
               <div class="col-md-12">
                 <h5 class="mt-0"><strong>Filter Result:</strong></h5>
               </div>
               <div class="col-md-3">
                 <label for="inputName">Student Name</label>
                 <input type="text" name="candidate_name" class="form-control" value="{{ (isset($_GET['candidate_name'])) ? $_GET['candidate_name'] : ''}}">
               </div>

               <div class="col-md-3">
                 <label for="inputName">Student Email</label>
                 <input type="text" name="email" class="form-control" value="{{ (isset($_GET['email'])) ? $_GET['email'] : ''}}">
               </div>

               <div class="col-md-3">
                 <label for="inputName">Student Mobile</label>
                 <input type="text" name="mobile" class="form-control" value="{{ (isset($_GET['mobile'])) ? $_GET['mobile'] : ''}}">
               </div>

               <div class="col-md-1">
                 <label for="inputName">&nbsp;</label>
                 <input type="submit" value="Search" class="btn btn-primary" style="display: block;">
               </div>
               <div class="col-md-1" >
                 <label for="inputName">&nbsp;</label>
                 
                 <a href="{{ url('admin/register/register-view') }}"><input type="button" value="Reset" class="btn btn-success" style="display: block;"></a>
               
               </div>
             </div>
           </form>
         </div>
         <!-- /.card -->

         <div class="card my-4">
           <div class="card-header"> <i class="fas fa-table mr-1"></i> Student List </div>
           <div class="card-body">
             <div class="table-responsive">
               <table class="table table-bordered" width="100%" cellspacing="0">
                 <thead>
                   <tr>
                     <th width="5%">S.No.</th>
                     <th width="20%">Name</th>
                     <th width="20%">Email</th>
                     <th width="20%">Phone</th>
                     <th width="20%">Course Names</th>
                     <th width="20%">Status</th>
                     <th width="5%">Edit</th>
                     <th width="5%">Delete</th>
                   </tr>
                 </thead>
                 <tbody>
                   @php $i=(isset($_GET['page']) && $_GET['page']!=1)?($_GET['page']-1)*50 +1:1; @endphp
                   @foreach($studentlist as $key=>$val)
                   <tr>
                     <td>{{$i}}.</td>
                     <td> {{$val->name}}</td>
                     <td>{{$val->email}}</td>
                     <td>{{$val->phone}}</td>
                     <td> {{ (isset($courses[$val->id]))?$courses[$val->id]['name']:'' }} </td>
                     <td>{{($val->status) ? 'Active' : 'Deactive'}}</td>
                     <td><a href="{{url('/admin/register/update-register')}}/{{$val->id}}"><i class="far fa-edit"></i></a></td>
                     <td><a href="{{url('/admin/register/delete-register')}}/{{$val->id}}" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></a></td>
                   </tr>
                   @php $i=$i+1; @endphp
                   @endforeach
                 </tbody>
               </table>
             </div>
             <div style="float: right;">
               {{$studentlist->links()}}
             </div>
           </div>
         </div>
         <!-- end -->
       </div>
     </div>
   </div>
 </main>


 @endsection

 @section('javascript')

 @endsection