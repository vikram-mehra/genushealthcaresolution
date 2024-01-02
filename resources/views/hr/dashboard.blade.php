@extends('hr/layout/master')
@section('main-contant')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Welcome HR Dashboard!</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <!-- Filter Candidates here -->
            <div class="row col-md-12 filter-cont mb-3">
                <form action="{{ url('hr/dashboard')}}" method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mt-0"><strong>Search Result:</strong></h5>
                        </div>
                        <div class="col-md-4">                                
                            <label for="inputName">From Date</label>
                            <input type="date" name="from_date" class="form-control" value="{{ (isset($from_date)) ? $from_date : ''}}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputName">To Date</label>
                            <input type="date" name="to_date" class="form-control" value="{{ (isset($to_date)) ? $to_date : ''}}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputName">&nbsp;</label>
                            <input type="submit" value="Search" class="btn btn-primary" style="display: block;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $interviews->count() }}</h3>
                            <p>Interviews Schedule</p>
                        </div>
                        <a class="small-box-footer" href="{{ url('hr/candidate/list') }}">More info <i class="fas fa-arrow-circle-right"></i></a> 
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $interviews->where('status', 0)->count() }}</h3>
                            <p>Pending Interview</p>
                        </div>
                        <a class="small-box-footer" href="{{ url('hr/candidate/list') }}">More info <i class="fas fa-arrow-circle-right"></i></a> 
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $interviews->where('status', 1)->count() }}</h3>
                            <p>Selected Interview</p>
                        </div>
                        <a class="small-box-footer" href="{{ url('hr/candidate/list') }}">More info <i class="fas fa-arrow-circle-right"></i></a> 
                    </div>
                </div>
                
                <!-- ./col -->
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $interviews->where('status', 2)->count() }}</h3>
                            <p>Total Rejected Interview</p>
                        </div>
                        <a class="small-box-footer" href="{{ url('hr/candidate/list') }}">More info <i class="fas fa-arrow-circle-right"></i></a> 
                    </div>
                </div>
                <!-- ./col --> 
                 <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $interviews->where('status', 4)->count() }}</h3>
                            <p>Total Joined</p>
                        </div>
                        <a class="small-box-footer" href="{{ url('hr/candidate/list') }}">More info <i class="fas fa-arrow-circle-right"></i></a> 
                    </div>
                </div>
                <!-- ./col --> 
            </div>
        </div>
    </main>
@endsection
@section('javascript')
@endsection