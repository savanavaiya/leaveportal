@extends('common.comemp')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Short Leave</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                            Apply For Short Leave
                        </button>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->




        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Short Leave Application Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Filling Short Leave Application Form</h3>
                                </div>
                                @if (session()->has('SUCCESS'))
                                    <p class="alert alert-success">{{ session()->get('SUCCESS') }}</p>
                                @endif
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="datashort">
                                    <div class="card-body">
                                        @csrf
                                        <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                        <div class="form-group">
                                            <h6>Date</h6>
                                            <input name="date" type="date" class="form-control">
                                            @error('date')
                                                <p style="color: red;font-size:13px">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex">
                                                <div>
                                                    <h6>From</h6>
                                                    <input name="from" type="text" class="form-control"
                                                        placeholder="00:00 PM">
                                                </div>
                                                <div>
                                                    <h6>To</h6>
                                                    <input name="to" type="text" class="form-control"
                                                        placeholder="00:00 PM">
                                                </div>
                                            </div>
                                            @error('from')
                                                <p style="color: red;font-size:13px">{{ $message }}</p>
                                            @enderror
                                            @error('to')
                                                <p style="color: red;font-size:13px">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h6>Hours</h6>
                                            <input name="hours" type="text" class="form-control"
                                                placeholder="Total Hours" style="width: 220px">
                                            @error('hours')
                                                <p style="color: red;font-size:13px">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputprname">Reason</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inlineRadio11" type="radio"
                                                    name="reason" value="Health">
                                                <label class="form-check-label" for="inlineRadio11">Health</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inlineRadio12" type="radio"
                                                    name="reason" value="Personal">
                                                <label class="form-check-label" for="inlineRadio12">Personal</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inlineRadio13" type="radio"
                                                    name="reason" value="Family">
                                                <label class="form-check-label" for="inlineRadio13">Family</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inlineRadio15" type="radio"
                                                    name="reason" value="Function">
                                                <label class="form-check-label" for="inlineRadio15">Function</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inlineRadio14" type="radio"
                                                    name="reason" value="Other">
                                                <label class="form-check-label" for="inlineRadio14">Other</label>
                                            </div><br>
                                            <div class="w-50">
                                                {{-- <input class="form-control" id="reasonother" type="text" name="reasonother" placeholder="Enter Your Other Reason Please..!" value="{{ old('reasonother') }}"> --}}
                                                <textarea name="reasonother" id="reasonother" cols="30" rows="6"
                                                    placeholder="Enter Your Reason Please..!">{{ old('reasonother') }}</textarea>
                                            </div>
                                        </div>
                                        <center><button class="btn btn-primary" type="submit">Submit</span></button></center>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




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
                @foreach ($appups as $appup)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ date('d-m-Y', strtotime($appup->date)) }}</td>
                        <td>{{ $appup->from }}</td>
                        <td>{{ $appup->to }}</td>
                        <td>{{ $appup->total_hours }}</td>
                        <td>{{ $appup->reason }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
