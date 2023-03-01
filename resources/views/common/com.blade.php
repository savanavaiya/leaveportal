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

    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}" />

    <link rel="icon" type="image/x-icon" href="{{ asset('image/No BG.svg') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
                    <a href="{{ route('index') }}" class="nav-link">Home</a>
                </li>
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
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('lea_app') }}" class="nav-link {{ (Request::is('leaving_application')) ? 'activeside' : '' }}">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Leave Application
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('viewdata') }}" class="nav-link {{ (Request::is('view_data')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    View Employee Data
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('monleav') }}" class="nav-link {{ (Request::is('monthly_leaves')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Leaves Record
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('operationemployee') }}" class="nav-link {{ (Request::is('employees/opearion')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-wrench"></i>
                                <p>
                                    Employees Id
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('timetracking') }}" class="nav-link {{ (Request::is('timer')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-stopwatch"></i>
                                <p>
                                    Time Tracker Record
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fullcale') }}" class="nav-link {{ (Request::is('fullcalender')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Calendar
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
                            <a href="{{ route('shortleavead') }}" class="nav-link {{ (Request::is('short/leave')) ? 'activeside' : '' }}">
                                <i class="nav-icon fas fa-record-vinyl"></i>
                                <p>
                                    Short Leave Record
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


        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
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

            var channel = pusher.subscribe('my-channel.' + $('#useid').val());
            channel.bind('my-event', function(data) {
                //   alert(JSON.stringify(data));
                swal(JSON.stringify(data));
            });
        </script> --}}


        <script>
            $(document).ready(function() {

                var SITEURL = "{{ url('/') }}";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: SITEURL + "/fullcalender",
                    displayEventTime: false,
                    editable: true,
                    eventRender: function(event, element, view) {
                        if (event.allDay === 'true') {
                            event.allDay = true;
                        } else {
                            event.allDay = false;
                        }
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        var title = prompt('Event Title:');
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                            $.ajax({
                                url: SITEURL + "/fullcalenderAjax",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    type: 'add',
                                    "_token": "{{ csrf_token() }}",
                                },
                                type: "POST",
                                success: function(data) {
                                    displayMessage("Event Created Successfully");

                                    calendar.fullCalendar('renderEvent', {
                                        id: data.id,
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    }, true);

                                    calendar.fullCalendar('unselect');
                                }
                            });
                        }
                    },
                    eventDrop: function(event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update',
                                "_token": "{{ csrf_token() }}",
                            },
                            type: "POST",
                            success: function(response) {
                                displayMessage("Event Updated Successfully");
                            }
                        });
                    },
                    eventClick: function(event) {
                        var deleteMsg = confirm("Do you really want to delete?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/fullcalenderAjax',
                                data: {
                                    id: event.id,
                                    type: 'delete',
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    calendar.fullCalendar('removeEvents', event.id);
                                    displayMessage("Event Deleted Successfully");
                                }
                            });
                        }
                    }

                });

            });

            function displayMessage(message) {
                toastr.success(message, 'Event');
            }
        </script>


        <script>
            function Delete(data) {
                // alert();
                var id = $(data).attr('data-id');
                var email = $(data).attr('data-email');
                console.log(id);
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('delempid') }}",
                                data: {
                                    'id': id,
                                    'email': email,
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    // alert(response.d);
                                    // console.log(response);
                                    location.reload();
                                }
                            });

                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
            }
        </script>

        <script>
            $("form#sub").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                // alert('savan');
                swal({
                        title: "Are you sure?",
                        text: "Reject This Application!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                beforeSend: function() {
                                    $('.ajax-loader').css("visibility", "visible");
                                },
                                url: "{{ route('del_app') }}",
                                type: 'POST',
                                data: formData,
                                success: function(data) {
                                    // alert(data);
                                    if (data == true) {
                                        $('.ajax-loader').css("visibility", "hidden");
                                        location.reload();
                                    }
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });
                        } else {
                            swal("Application Doesn't Rejected!");
                        }
                    });
            });
        </script>

        <script>
            function Accept(data) {
                // alert();
                // console.log(data);
                var id = $(data).attr('data-id');
                swal({
                        title: "Are you sure?",
                        text: "Accept This Application!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                beforeSend: function() {
                                    $('.ajax-loader').css("visibility", "visible");
                                },
                                type: "POST",
                                url: "{{ route('acceptapp') }}",
                                data: {
                                    'id': id,
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(data) {
                                    if (data == true) {
                                        $('.ajax-loader').css("visibility", "hidden");
                                        location.reload();
                                    }
                                }
                            });
                        } else {
                            swal("Application Doesn't Accepted!");
                        }
                    });
            }
        </script>

        <script>
            $("form#newuser").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                // alert('savan');
                $.ajax({
                    url: "{{ route('reg_sub') }}",
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        // alert(data)
                        if (data.error) {
                            // alert(data.error);
                            swal("Fill All The Fields!", "" + data.error);
                        }
                        if (data == true) {
                            location.reload();
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        </script>

        <script>
            function Edituserbyadmin(data) {
                // alert();
                var edusid = $(data).attr('data-id');
                // console.log(edusid);

                $.ajax({
                    type: "POST",
                    url: "{{ route('editempid') }}",
                    data: {
                        "id": edusid,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        $('#id').val(data.id);
                        $('#title').html(data.name);
                        $('#name').val(data.name);
                        $('#user_type').val(data.user_type);
                        $('#email').val(data.email);
                        $('#password').val(data.password);
                        $('#phone_no').val(data.phone_no);
                        $('#emgphone_no').val(data.emgphone_no);
                        $('#address').val(data.address);
                        $('#joining_date').val(data.joining_date);
                        $('#designation').val(data.designation);
                        $('#image').val(data.image);
                        $('#document').val(data.document);
                    }
                });
            }
        </script>

</body>

</html>
