@extends('common.com')

@section('content')
    
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Leave Record Of Employees</h1>
              </div><!-- /.col -->
              <div class="col-sm-6 text-right">
                <h5>Monthwise Filter <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#sermonthwise">
                  <i class="fas fa-calendar-alt"></i>
              </button></h5>
                
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
              @foreach ($monthlys as $key => $value)
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
      

    <!-- Modal -->
<div class="modal fade" id="sermonthwise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Search Month Wise</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('sermon') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputprname">Search</label><br>
                    <div class="d-flex">
                        <div>
                            <h6>From</h6>
                            <input type="date" name="fromser" class="form-control">
                        </div>
                        <div>
                            <h6>To</h6>
                            <input type="date" name="toser" class="form-control">
                        </div>
                    </div>
                </div>
                <input type="submit" value="submit" name="submit" class="btn btn-primary">
            </form>
        </div>
      </div>
    </div>
  </div>

  
@endsection