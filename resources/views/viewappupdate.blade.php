@extends('common.comemp')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Your Leave Application Updates</h1>
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
                    <th scope="col">Reason</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appups as $appup)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $appup->day }}</td>
                        <td>{{ date('d-m-Y', strtotime($appup->from)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($appup->to)) }}</td>
                        <td>{{ $appup->total_days }}</td>
                        <td>{{ $appup->reason }}</td>
                        <td>
                            @if ($appup->status == '0')
                                <h6 class="text-warning">Pending</h6>
                            @elseif ($appup->status == '1')
                                <h6 class="text-success">Accepted</h6>
                            @elseif ($appup->status == '2')
                                <h6 class="text-danger">Rejected</h6>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
