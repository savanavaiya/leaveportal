@extends('common.comemp')


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave Application</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Filling Application Form</h3>
            </div>
            @if (session()->has('SUCCESS'))
                <p class="alert alert-success">{{ session()->get('SUCCESS') }}</p>
            @endif
            <!-- /.card-header -->
            <!-- form start -->
            <form id="data">
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                    <div class="form-group">
                        <label for="exampleInputprname">Day</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="halfday" type="radio" name="day" value="Half-Day">
                            <label class="form-check-label" for="halfday">Half-Day</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="fullday" type="radio" name="day" value="Full-Day">
                            <label class="form-check-label" for="fullday">Full-Day</label>
                        </div>
                        @error('day')
                            <p style="color: red;font-size:13px">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" id="daterange">
                        <label for="exampleInputprname">Date</label><br>
                        <div class="d-flex">
                            <div>
                                <h6>From</h6>
                                <input name="from" type="date" class="form-control">
                            </div>
                            <div>
                                <h6>To</h6>
                                <input name="to" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group" id="datehalfday">
                        <label for="exampleInputprname">Date</label><br>
                        <div class="d-flex">
                            <div>
                                <input name="date" type="date" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="width: 200px" id="totaldays">
                        <label for="totaldays">Total Days</label>
                        <input type="text" class="form-control" name="totaldays" id="totaldays" placeholder="Enter The Total Days">
                    </div>


                    <div class="form-group" id="selcthalf">
                        <label for="exampleInputprname">Select A Half</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="firsthalf" type="radio" name="half" value="First-Half">
                            <label class="form-check-label" for="firsthalf">First-Half</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="secondhalf" type="radio" name="half" value="Second-Half">
                            <label class="form-check-label" for="secondhalf">Second-Half</label>
                        </div>
                        @error('half')
                            <p style="color: red;font-size:13px">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputprname">Reason</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="inlineRadio11" type="radio" name="reason" value="Health">
                            <label class="form-check-label" for="inlineRadio11">Health</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="inlineRadio12" type="radio" name="reason" value="Personal">
                            <label class="form-check-label" for="inlineRadio12">Personal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="inlineRadio13" type="radio" name="reason" value="Family">
                            <label class="form-check-label" for="inlineRadio13">Family</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="inlineRadio15" type="radio" name="reason" value="Function">
                            <label class="form-check-label" for="inlineRadio15">Function</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="inlineRadio14" type="radio" name="reason" value="Other">
                            <label class="form-check-label" for="inlineRadio14">Other</label>
                        </div><br>
                        <div class="w-50"> 
                            {{-- <input class="form-control" id="reasonother" type="text" name="reasonother" placeholder="Enter Your Other Reason Please..!" value="{{ old('reasonother') }}"> --}}
                            <textarea name="reasonother" id="reasonother" cols="30" rows="6" placeholder="Enter Your Reason Please..!">{{ old('reasonother') }}</textarea>
                        </div>
                    </div>
                    <center><button class="btn btn-primary" type="submit">Submit</button></center>
                </div>
            </form>
        </div>
    </div>

@endsection
