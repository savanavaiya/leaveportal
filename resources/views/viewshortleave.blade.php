@extends('common.com')

@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Short Leave Record of {{ $user->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 d-flex justify-content-end">

          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <h1><center>{{ $user->name }}</center></h1>


    <div class="container-fluid">
        <div class="container w-50">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Total Hours</th>
                    <th scope="col">Reason</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($viewshortdata as $value)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                        <td>{{ $value->from }}</td>
                        <td>{{ $value->to }}</td>
                        <td>{{ $value->total_hours }}</td>
                        <td>{{ $value->reason }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
