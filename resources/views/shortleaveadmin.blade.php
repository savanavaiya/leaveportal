@extends('common.com')

@section('content')
    
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Short Leave Record</h1>
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
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>From</th>
                <th>To</th>
                <th>Total Hours</th>
                <th>Reason</th>
            </tr>
          </tr>
        </thead>
        <tbody>
          @foreach ($apps as $key => $app)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $app->name }}</td>
                <td>{{ $app->email }}</td>
                <td>{{ date('d-m-Y', strtotime($app->date)) }}</td>
                <td>{{ $app->from }}</td>
                <td>{{ $app->to }}</td>
                <td>{{ $app->total_hours }}</td>
                <td>{{ $app->reason }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
@endsection