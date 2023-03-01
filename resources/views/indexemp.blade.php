@extends('common.comemp')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Welcome {{ auth()->user()->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        {{-- <div class="d-flex justify-content-end">
                            <h6 style="cursor: pointer;" data-toggle="modal" data-target="#edituserpro">Edit Profile <i
                                    class="nav-icon fas fa-edit"></i></h6>
                        </div> --}}
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tag"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Remaining Leaves</span>
                            <span class="info-box-number"
                                style="{{ $tot < '0' ? 'color:red' : 'color:green' }}">{{ $tot }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0 bg-dark">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Notice Board</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($nots as $not)
                                {{ $not->notice }}
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="info-box mb-3">
                        <div class="info-box-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div id="txt" style="font-family:'digital-clock-font';font-size: 28px"></div>
                                </div>
                                <div class="col-lg-6 text-lg-right">
                                    <div id="txt2" style="font-family:'digital-clock-font';font-size: 28px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-lg-2">
                                    <p class="card-text mt-2"><i class="nav-icon fas fa-stopwatch"
                                            style='font-size:36px;'></i>
                                    </p>
                                </div>
                                <div class="col-lg-10">
                                    <h1 id="stopWatch"><time></time></h1>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-5 mb-2 mb-lg-0">
                                    <button id="start" class="btn btn-dark">Start</button>
                                </div>
                                <div class="col-lg-5">
                                    <button id="stop" class="btn btn-dark">Pause</button>
                                </div>
                                <div class="col-lg-2">

                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <button id="clear" class="btn btn-dark">End timer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
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


    @endsection
