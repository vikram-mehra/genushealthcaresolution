@php 
use	App\Http\Controllers\Client\Student\Subject\StudentSubjectControllers;
@endphp
@extends('admin/layout/master')
 @section('main-contant')
 <main>
   <div class="container-fluid">
     <h2 class="mt-5 mb-4">View Student Test</h2>
     <div class="row">
       <div class="col-md-12">
         
         <!-- /.card -->

         <div class="card my-4">
           <div class="card-header"> <i class="fas fa-table mr-1"></i> Student List </div>
           <div class="card-body">
             <div class="table-responsive">
               <table class="table table-bordered" width="100%" cellspacing="0">
                 <thead>
                   <tr>
                     <th width="5%">S.No.</th>
                     <th width="20%">Student Name</th>
                     <th width="20%">Course Name</th>
                     <th width="20%">Tpic</th>
                     <th width="15%">Total Question</th>
                     <th width="20%">Attempted Question</th>
                     <th width="10%">Correct Answer</th>
                     <th width="10%">Test Date</th>
                     <th width="5%">View</th>
                   </tr>
                 </thead>
                 <tbody>
                   @php $i=(isset($_GET['page']) && $_GET['page']!=1)?($_GET['page']-1)*50 +1:1; @endphp
                   @foreach($testReports as $key=>$val)
                    @php 
                        $correctAns = StudentSubjectControllers::CORRECTANS($val->questions_id,$val->id);
                    @endphp
                   <tr>
                     <td>{{$i}}.</td>
                     <td> {{$val->name}}</td>
                     <td> {{$val->course_name}}</td>
                     <td>{{$val->subject_title}}</td>
                     <td>{{$val->total_que}}</td>
                     <td> {{ $val->attempt_que }} </td>
                     <td>{{$correctAns}}</td>
                     <td> {{ $val->created_at }} </td>
                     <td><a href="{{url('/admin/studunt/report')}}/{{$val->id}}"><i class="far fa-eye"></i></a></td>
                   </tr>
                   @php $i=$i+1; @endphp
                   @endforeach
                 </tbody>
               </table>
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