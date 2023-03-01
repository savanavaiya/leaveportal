@extends('common.com')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Employees Data</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        @if (session()->has('SUCCESS'))
            <p class="alert alert-success">{{ session()->get('SUCCESS') }}</p>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Em.Contact No</th>
                    <th>Address</th>
                    <th>Joining Date</th>
                    <th>Designation</th>
                    <th>Document</th>
                    <th>Total Remaining Leaves</th>
                    <th>Leaves Detail</th>
                    <th>Task Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone_no }}</td>
                        <td>{{ $value->emgphone_no }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->joining_date }}</td>
                        <td>{{ $value->designation }}</td>
                        <td>
                            <a href="{{ asset('image/'.$value->document) }}" target="blank"><img src="{{ asset('image/'.$value->document) }}" height="60px" width="100px"></a>
                        </td>
                        <td>{{ $value->total_leaves }}</td>
                        <td>
                            <a href="{{ route('viewmore',$value->id) }}" class="btn btn-dark">View Leaves..!</a>
                        </td>
                        <td>
                            <a href="{{ route('taskstatus',$value->id) }}" class="btn btn-dark">View Task</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endsection
