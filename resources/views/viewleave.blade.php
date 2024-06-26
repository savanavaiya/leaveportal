@extends('common.com')

@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave Record of {{ $viewmore->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 d-flex justify-content-end">

          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <h1><center>{{ $viewmore->name }}</center></h1>


    <div class="container-fluid">
        <div class="container w-50">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Day</th>
                    <th scope="col">Date From</th>
                    <th scope="col">Date To</th>
                    <th scope="col">Total Days</th>
                    <th scope="col">Reason</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($viewmore->leavedetails as $leavedetail)
                    <tr>
                        @php
                            $sum[] = $leavedetail->leave_total_days;
                            $count = count($sum);

                            if($count == 0){
                                $sum = 0;
                            }else{
                                $sum = array_sum($sum);
                            }
                        @endphp
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $leavedetail->leave_day }}</td>
                        <td>{{ date('d-m-Y', strtotime($leavedetail->leave_datefrom)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($leavedetail->leave_dateto)) }}</td>
                        <td>{{ $leavedetail->leave_total_days }}</td>
                        <td>{{ $leavedetail->leave_reason }}</td>
                    </tr>
                  @endforeach
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ isset($sum) }}</td>
                    <td></td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
