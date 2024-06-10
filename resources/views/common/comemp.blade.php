<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cubezytech | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('assets/css/css.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link href='{{ asset('assets/css/fontfamily.css') }}' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}" />

    <link rel="icon" type="image/x-icon" href="{{ asset('image/No BG.svg') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sav"
    onload="startTime()">


    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('indexemp') }}" class="nav-link">Home</a>
                </li>

                {{-- <div>
                    <input type="checkbox" class="checkbox" id="checkbox">
                    <label for="checkbox" class="label">
                        <i class="fas fa-moon"></i>
                        <i class='fas fa-sun'></i>
                        <div class='ball'>
                    </label>
                </div> --}}

            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <div class="btn-group">
                        <img src="{{ asset('image/' . auth()->user()->image) }}" class="rounded-circle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="User Image"
                            style="height: 35px;width: 40px;cursor: pointer;">
                        <div class="dropdown-menu" style="width: 250px">
                            <h5 class="pl-2">{{ auth()->user()->name }}</h5>
                            <div class="dropdown-divider"></div>
                            <h6 style="cursor: pointer;" class="dropdown-item" data-toggle="modal"
                                data-target="#edituserpro">Edit Profile</h6>
                            <a href="{{ route('logOut') }}" class="dropdown-item">LogOut</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-link">
                <img src="{{ asset('image/No BG.svg') }}" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Cubezytech</span>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('image/' . auth()->user()->image) }}" class="img-circle elevation-2"
                            alt="User Image" style="height: 35px!important;width: 40px!important;">
                    </div>
                    <div class="info">
                        <h6 class="d-block" style="color: white;">{{ auth()->user()->name }}</h6>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('leavappform') }}" class="nav-link {{ (Request::is('employee/leaving_application/form')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>
                                    Apply For Leave
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('viewmyleave') }}" class="nav-link {{ (Request::is('employee/view_mytotalleaves')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    View My Total Leaves
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('viewappupdate') }}" class="nav-link {{ (Request::is('view/application/update')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-ellipsis-h"></i>
                                <p>
                                    Leave App. Update
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link" style="color: #c2c7d0" data-toggle="modal"
                                data-target="#changepw">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Change Password
                                </p>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('taskmanager') }}" class="nav-link {{ (Request::is('task_manager')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Task Manager
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fullcaleemp') }}" class="nav-link {{ (Request::is('employee/fullcalender')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Calendar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('shortleave') }}" class="nav-link {{ (Request::is('employee/short/leaves')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>
                                    Short Leave
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="ajax-loader">
            <img src="{{ asset('image/Loading_icon2.gif') }}" class="img-responsive" />
        </div>
        <input type="hidden" name="useid" id="useid" value="{{ auth()->user()->id }}">

        @yield('content')

        <!-- Modal -->
        <div class="modal fade" id="changepw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Your Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('changepw_sub') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="oldpw"
                                    placeholder="Enter Your Old Password">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter Your New Password">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="confpw"
                                    placeholder="Confirm Password">
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                                <div class="col-sm-4">
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="edituserpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-3">
                            @if (isset($userprofile))
                                <div>
                                    <img src="{{ asset('image/' . $userprofile->image) }}" height="100px" width="100px"
                                        height="80px" width="80px" class="rounded-circle">
                                </div>
                            @endif
                        </div>
                        <form action="{{ route('reg_sub') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="id"
                                value="{{ isset($userprofile) ? $userprofile->id : '0' }}">
                            <div class="input-group mb-3 row">
                                <div class="col-md-3">
                                    <label for="nameid">Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Full Name" id="nameid"
                                        name="name"
                                        value="{{ isset($userprofile) ? $userprofile->name : old('name') }}">
                                </div>
                            </div>
                            @error('name')
                                <p style="color: red;font-size:13px">{{ $message }}</p>
                            @enderror
                            <input type="hidden" name="user_type"
                                value="{{ isset($userprofile) ? $userprofile->user_type : old('user_type') }}">
                            <input type="hidden" name="email"
                                value="{{ isset($userprofile) ? $userprofile->email : old('email') }}">
                            <input type="hidden" name="password"
                                value="{{ old('password') }}">

                            <div class="input-group mb-3 row">
                                <div class="col-md-3">
                                    <label for="phoneid">Contact No.</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneid"
                                        name="phone_no"
                                        value="{{ isset($userprofile) ? $userprofile->phone_no : old('phone_no') }}">
                                </div>
                            </div>
                            @error('phone_no')
                                <p style="color: red;font-size:13px">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-3 row">
                                <div class="col-md-3">
                                    <label for="emgphoneid">Emergancy Con. No.</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Emergancy Phone No"
                                        name="emgphone_no" id="emgphoneid"
                                        value="{{ isset($userprofile) ? $userprofile->emgphone_no : old('emgphone_no') }}">
                                </div>
                            </div>
                            @error('emgphone_no')
                                <p style="color: red;font-size:13px">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-3 row">
                                <div class="col-md-3">
                                    <label for="addressid">Address</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Address" id="addressid"
                                        name="address"
                                        value="{{ isset($userprofile) ? $userprofile->address : old('address') }}">
                                </div>
                            </div>
                            @error('address')
                                <p style="color: red;font-size:13px">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-3 row">
                                <div class="col-md-3">
                                    <label for="joiningid">Joining Date</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Joining Date"
                                        name="joining_date" id="joiningid"
                                        value="{{ isset($userprofile) ? $userprofile->joining_date : old('joining_date') }}">
                                </div>
                            </div>
                            @error('joining_date')
                                <p style="color: red;font-size:13px">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-3 row">
                                <div class="col-md-3">
                                    <label for="Designationid">Designation</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Designation"
                                        id="Designationid" name="designation"
                                        value="{{ isset($userprofile) ? $userprofile->designation : old('designation') }}">
                                </div>
                            </div>
                            @error('designation')
                                <p style="color: red;font-size:13px">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-3 row">
                                <div class="col-md-3">
                                    <label for="editprofilepic">Edit Profile Picture</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="editprofilepic"
                                            value="editprofilepicture">
                                        <input type="file" class="form-control" name="image" id="openeditpic">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="image"
                                    value="{{ isset($userprofile) ? $userprofile->image : old('image') }}">
                            </div>
                            @error('image')
                                <p style="color: red;font-size:13px">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-3 row">
                                <div class="col-md-3">
                                    <label for="editdoc">Edit Your Document</label>
                                </div>
                                <div class=" col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="editdoc"
                                            value="editdocument">
                                        <input type="file" class="form-control" name="document" id="opendoc">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="document"
                                    value="{{ isset($userprofile) ? $userprofile->document : old('document') }}">
                            </div>
                            @error('document')
                                <p style="color: red;font-size:13px">{{ $message }}</p>
                            @enderror
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                                <div class="col-sm-4">
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <!-- overlayScrollbars -->
        <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>


        <!-- savan -->
        <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
        {{-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> --}}
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/Sortable.min.js') }}"
            integrity="sha512-zYXldzJsDrNKV+odAwFYiDXV2Cy37cwizT+NkuiPGsa9X1dOz04eHvUWVuxaJ299GvcJT31ug2zO4itXBjFx4w=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script src="{{ asset('assets/js/jquerycalendar.min.js') }}"></script>
        <script src="{{ asset('assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
        <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

        {{-- <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('d7efb3f2ab394df0f077', {
              cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel.'+$('#useid').val());
            channel.bind('my-event', function(data) {
              //   alert(JSON.stringify(data));
              swal(JSON.stringify(data));
            });
          </script> --}}

        <script>
            $(document).ready(function() {

                var SITEURL = "{{ url('/employee') }}";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var calendar = $('#calendar').fullCalendar({
                    events: SITEURL + "/fullcalender",


                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        var title = confirm('Apply For Leave');
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                            console.log(start);
                            console.log(end);

                            window.location = '/fullcalender/employee/leaving_application/form?start=' +
                                start + '&end=' + end;
                        }
                    },
                });
            });
        </script>

        <script>
            const columns = document.querySelectorAll(".column");

            columns.forEach((column) => {
                new Sortable(column, {
                    group: "shared",
                    animation: 150,
                    ghostClass: "blue-background-class"
                });
            });
        </script>

        <script>
            function Saves() {
                var children = $('#td').children('div');

                var idtd = [];

                for (var i = 0; i < children.length; i++) {
                    idtd.push(children[i].id);
                }

                console.log(idtd);

                var children2 = $('#pro').children('div');

                var idpro = [];

                for (var i = 0; i < children2.length; i++) {
                    idpro.push(children2[i].id);
                }

                console.log(idpro);

                var children22 = $('#q_a').children('div');

                var idq_a = [];

                for (var i = 0; i < children22.length; i++) {
                    idq_a.push(children22[i].id);
                }

                console.log(idq_a);

                var children222 = $('#done').children('div');

                var iddone = [];

                for (var i = 0; i < children222.length; i++) {
                    iddone.push(children222[i].id);
                }

                console.log(iddone);

                $.ajax({
                    type: "POST",
                    url: "{{ route('savechanges') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'idtd': idtd,
                        'idpro': idpro,
                        'idq_a': idq_a,
                        'iddone': iddone,
                    },
                    success: function(result) {
                        // location.reload();
                        displayMessage("Successfully Changed Task Status");
                    }
                });
            }

            function displayMessage(message) {
                toastr.success(message, 'Update');
            }
        </script>

        <script>
            function Deltask(data) {
                // alert();
                var delid = $(data).attr('data-delid');
                console.log(delid);

                swal({
                        title: "Are you sure?",
                        text: "Delete These Task!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('deltask') }}",
                                data: {
                                    'id': delid,
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(result) {
                                    location.reload();
                                }
                            });
                        } else {
                            swal("Your Task is safe!");
                        }
                    });
            }
        </script>

        <script>
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                var d = today.getDate();
                var mo = today.getMonth() + 1;
                var y = today.getFullYear();
                y = y.toString().substr(-2);
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('txt').innerHTML =
                    h + ":" + m + ":" + s;
                document.getElementById('txt2').innerHTML =
                    d + "/" + mo + "/" + y;
                var t = setTimeout(startTime, 500);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                }; // add zero in front of numbers < 10
                return i;
            }
        </script>

        <script>
            const stopWatch = document.getElementById('stopWatch')
            const startBtn = document.getElementById('start')
            const stopBtn = document.getElementById('stop')
            const clearBtn = document.getElementById('clear')
            const speedBtn = document.getElementById('speed')

            class Timer {
                constructor(speed = 1) {
                    this.speed = speed
                    this.passed = localStorage.getItem("stopWatch") || 0
                    this.running = localStorage.getItem("running") === 'true' || false
                    this.interval = null
                    this.time = this.calculate()
                    this.init()
                }

                init = () => {
                    if (this.running) {
                        this.start()
                    }
                    this.show()
                }

                show = () => {
                    var H = this.format(this.time.h)
                    var M = this.format(this.time.m)
                    var S = this.format(this.time.s)
                    stopWatch.textContent = H + ':' + M + ':' + S
                }

                calculate = () => {
                    let delta = this.passed || 0
                    let h = Math.floor(delta / 3600)
                    delta -= h * 3600
                    let m = Math.floor(delta / 60) % 60;
                    delta -= m * 60
                    let s = parseInt(delta % 60);
                    return {
                        h: h,
                        m: m,
                        s: s
                    }
                }

                update = () => {
                    this.passed++
                    this.time = this.calculate()
                    localStorage.setItem("stopWatch", this.passed);
                    this.show()
                }

                start = () => {
                    this.running = true
                    startBtn.disabled = true
                    stopBtn.disabled = false
                    localStorage.setItem("running", true);
                    this.interval = setInterval(() => this.update(), 1000 / this.speed)

                    $.ajax({
                        type: "POST",
                        url: "{{ route('timersub') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(result) {}
                    });
                }

                stop = () => {
                    clearInterval(this.interval)
                    localStorage.setItem("running", false);
                    startBtn.disabled = false
                    stopBtn.disabled = true
                }

                clear = () => {
                    var tim = this.time;

                    this.time = {
                        h: 0,
                        m: 0,
                        s: 0
                    }
                    this.passed = 0
                    this.stop()
                    this.show()
                    localStorage.removeItem("stopWatch")

                    console.log(tim.s);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('endtimer') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'tim': tim,
                        },
                        success: function(result) {

                            location.reload();
                        }
                    });
                }

                setSpeed = () => {
                    this.speed = speedBtn.value
                }

                format = (n) => {
                    return n.toLocaleString('en-US', {
                        minimumIntegerDigits: 2,
                        useGrouping: false
                    })
                }

            }


            const timer = new Timer()

            startBtn.onclick = () => timer.start() // This arrow notation is a must here, or else timer starts immediately
            clearBtn.onclick = () => timer.clear()
            stopBtn.onclick = () => timer.stop()
            // speedBtn.onchange = () => timer.setSpeed()
        </script>

        <script>
            $("form#data").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                // alert('savan');
                swal({
                        title: "Are you sure?",
                        text: "Submit You Application!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // alert();
                            $.ajax({
                                beforeSend: function() {
                                    // $('.ajax-loader').css("visibility", "visible");
                                    $('.ajax-loader').css("display", "block");
                                },
                                url: "{{ route('app_sub') }}",
                                type: 'POST',
                                data: formData,
                                success: function(data) {
                                    // alert(data)
                                    if (data.error) {
                                        // alert(data.error);
                                        // $('#savanerr').html(data.error);
                                        // $('.ajax-loader').css("visibility", "hidden");
                                        // $('.ajax-loader').css("visibility", "hidden");
                                        $('.ajax-loader').css("display", "none !important");
                                        swal("Fill The Fields!", "" + data.error);
                                    }
                                    if (data == true) {
                                        // swal("Your Application Submitted!");
                                        // $('.ajax-loader').css("visibility", "hidden");
                                        // $('.ajax-loader').css("visibility", "hidden");
                                        $('.ajax-loader').css("display", "none !important");
                                        location.reload();
                                    }
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });
                        } else {
                            swal("Your Data Not Submitted!");
                        }
                    });
            });
        </script>

        <script>
            $("form#datashort").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                // alert('savan');
                swal({
                        title: "Are you sure?",
                        text: "Submit You Short Leave Application!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // alert();
                            $.ajax({
                                beforeSend: function() {
                                    $('.ajax-loader').css("visibility", "visible");
                                },
                                url: "{{ route('shortapp_sub') }}",
                                type: 'POST',
                                data: formData,
                                success: function(data) {
                                    // alert(data)
                                    if (data.error) {
                                        // alert(data.error);
                                        // $('#savanerr').html(data.error);
                                        $('.ajax-loader').css("visibility", "hidden");
                                        swal("Fill The Fields!", "" + data.error);
                                    }
                                    if (data == true) {
                                        // swal("Your Application Submitted!");
                                        $('.ajax-loader').css("visibility", "hidden");
                                        location.reload();
                                    }
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });
                        } else {
                            swal("Your Data Not Submitted!");
                        }
                    });
            });
        </script>

        <script>
            $('#inlineRadio14').click(function(e) {
                if (e.target.value === 'Other') {
                    $('#reasonother').show();
                } else {
                    $('#reasonother').hide();
                }
            })

            $('#reasonother').hide();
        </script>
        <script>
            $('#inlineRadio11').click(function(e) {
                if (e.target.value === 'Health') {
                    $('#reasonother').hide();
                } else {
                    $('#reasonother').show();
                }
            })
            $('#inlineRadio12').click(function(e) {
                if (e.target.value === 'Personal') {
                    $('#reasonother').hide();
                } else {
                    $('#reasonother').show();
                }
            })
            $('#inlineRadio13').click(function(e) {
                if (e.target.value === 'Family') {
                    $('#reasonother').hide();
                } else {
                    $('#reasonother').show();
                }
            })
            $('#inlineRadio15').click(function(e) {
                if (e.target.value === 'Function') {
                    $('#reasonother').hide();
                } else {
                    $('#reasonother').show();
                }
            })
        </script>


        <script>
            $('#editprofilepic').click(function(e) {
                if (e.target.value === 'editprofilepicture') {
                    $('#openeditpic').show();
                } else {
                    $('#openeditpic').hide();
                }
            })

            $('#openeditpic').hide();

            $('#editdoc').click(function(e) {
                if (e.target.value === 'editdocument') {
                    $('#opendoc').show();
                } else {
                    $('#opendoc').hide();
                }
            })

            $('#opendoc').hide();
        </script>

        <script>
            $('#halfday').click(function(e) {
                if (e.target.value === 'Half-Day') {
                    $('#daterange').hide();
                    $('#datehalfday').show();
                    $('#totaldays').hide();
                    $('#selcthalf').show();
                }
            })

            $('#daterange').show();
            $('#datehalfday').hide();
            $('#totaldays').show();
            $('#selcthalf').hide();
        </script>
        <script>
            $('#fullday').click(function(e) {
                if (e.target.value === 'Full-Day') {
                    $('#daterange').show();
                    $('#datehalfday').hide();
                    $('#totaldays').show();
                    $('#selcthalf').hide();
                }
            })
        </script>

        <script>
            $('#halfdaycal').click(function(e) {
                if (e.target.value === 'Half-Day') {
                    $('#totaldaysfulldaycal').hide();
                    $('#selcthalfcal').show();
                    $('#datecal1').show();
                    $('#datecal2').hide();
                }
            })

            $('#totaldaysfulldaycal').show();
            $('#selcthalfcal').hide();
            $('#datecal1').hide();
            $('#datecal2').show();
        </script>
        <script>
            $('#fulldaycal').click(function(e) {
                if (e.target.value === 'Full-Day') {
                    $('#totaldaysfulldaycal').show();
                    $('#selcthalfcal').hide();
                    $('#datecal1').hide();
                    $('#datecal2').show();
                }
            })
        </script>
</body>

</html>
