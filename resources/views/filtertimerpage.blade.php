@extends('common.com')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0">Time Tracker Record of {{ $setsertimer }}</h1>
                    </div><!-- /.col -->
                    <div class="col-md-6 text-right">
                        <a href="{{ route('timetracking') }}" class="btn btn-dark">Back</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Total Tracking Time</th>
                    <th>Working Total Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <th>{{ $value->use->name }}</th>
                        <td>{{ date('d-m-Y', strtotime($value->timerstart)) }}</td>
                        <td>{{ $value->timerstartenddiff }}</td>
                        <td>{{ $value->timerrecordtime }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Modal -->
        <div class="modal fade" id="filtertimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search Date</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('timerfilter') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div>
                                    <input type="date" name="sertimer" class="form-control">
                                </div>
                            </div>
                            <input type="submit" value="submit" name="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
