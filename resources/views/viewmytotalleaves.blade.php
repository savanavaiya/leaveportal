@extends('common.comemp')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View My Total Leaves</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Day</th>
                    <th scope="col">Date From</th>
                    <th scope="col">Date To</th>
                    <th scope="col">Total Days</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaves as $leave)
                    <tr>
                        <th>{{ $i++ }}</th>
                        <td>{{ $leave->leave_day }}</td>
                        <td>{{ date('d-m-Y', strtotime($leave->leave_datefrom)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($leave->leave_dateto)) }}</td>
                        <td>{{ $leave->leave_total_days }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
