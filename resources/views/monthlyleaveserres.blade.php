@extends('common.com')

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Month Wise Leave Record Of Employees</h1>
        </div><!-- /.col -->
        <div class="col-sm-6 text-right">
            <a href="{{ route('monleav') }}" class="btn btn-dark">Back</a>
        </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <table class="table">
        <thead>
        <tr>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Day</th>
                <th>Leave From</th>
                <th>Leave To</th>
                <th>Leave Total Days</th>
            </tr>
        </tr>
        </thead>
        <tbody>
        @foreach ($monthsers as $key => $value)
            <tr>
                <th>{{ $i++ }}</th>
                <td>{{ $value->username->name }}</td>
                <td>{{ $value->leave_day }}</td>
                <td>{{ date('d-m-Y', strtotime($value->leave_datefrom)) }}</td>
                <td>{{ date('d-m-Y', strtotime($value->leave_dateto)) }}</td>
                <td>{{ $value->leave_total_days }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection