@extends('common.com')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Employees</span>
                            <span class="info-box-number">{{ $cnt }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-envelope"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Leave Application</span>
                            <span class="info-box-number">{{ $cnt2 }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @error('oldpw')
                    <p>{{ $message }}</p>
                @enderror
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
                @error('confpw')
                    <p>{{ $message }}</p>
                @enderror
            </div>
        @endif
        @if (session()->has('ERROR'))
            <div class="alert alert-danger">
                <p>{{ session()->get('ERROR') }}</p>
            </div>
        @endif
        @if (session()->has('SUCCESS'))
            <div class="alert alert-success">
                <p>{{ session()->get('SUCCESS') }}</p>
            </div>
        @endif

        <div style="height: 220px;width: 100%">
            
        </div>

        <div class="container-fluid">
            <div class="card w-50 m-auto">
                <div class="card-header border-0 bg-dark">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Notice Board</h3>
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($nots))
                        @foreach ($nots as $not)
                            {{ $not->notice }}
                        @endforeach
                    @endif
                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                            <a href="" style="text-decoration: none;color:black" data-toggle="modal"
                                data-target="#noticeboardadmin"><i class="nav-icon fas fa-edit"></i></a>
                        </span>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="noticeboardadmin" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Notice Board</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('addnots') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id"
                                            value="{{ isset($not) ? $not->id : '0' }}">
                                        <div class="form-group">
                                            <label for="notice">Notice</label>
                                            <textarea name="notice" id="notice" cols="30" rows="10" class="form-control">{{ isset($not) ? $not->notice : '' }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
