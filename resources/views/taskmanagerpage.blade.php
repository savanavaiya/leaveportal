@extends('common.comemp')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-9">
                        <h1 class="m-0">Task Manager</h1>

                        <div class="container-fluid mt-5">
                            <div class="container">
                                <div class="column" id="td">
                                    <h1>To Do</h1>
                                    @foreach ($datas as $data)
                                        @if ($data->status == 'ToDo')
                                            <div class="list-group-item" id="{{ $data->id }}" draggable="true"
                                                style="background-color: {{ $data->bgcolor }}" ondrop="Saves()">{{ $data->task }} <span
                                                    class=""><i class="fas fa-times" data-delid="{{ $data->id }}"
                                                        onclick="Deltask(this)"></i></span></div>
                                        @endif
                                    @endforeach
                                    <h6 class="text-center mt-4">Add Task <span type="button" data-toggle="modal"
                                            data-target="#todomodal">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </span></h6>
                                </div>
                                <div class="column" id="pro">
                                    <h1>In progress</h1>
                                    @foreach ($datas as $data)
                                        @if ($data->status == 'Progress')
                                            <div class="list-group-item" id="{{ $data->id }}" draggable="true"
                                                style="background-color: {{ $data->bgcolor }}" ondrop="Saves()">{{ $data->task }} <span
                                                    class=""><i class="fas fa-times" data-delid="{{ $data->id }}"
                                                        onclick="Deltask(this)"></i></span></div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="column" id="q_a">
                                    <h1>Q/A</h1>
                                    @foreach ($datas as $data)
                                        @if ($data->status == 'Q/A')
                                            <div class="list-group-item" id="{{ $data->id }}" draggable="true"
                                                style="background-color: {{ $data->bgcolor }}" ondrop="Saves()">{{ $data->task }} <span
                                                    class=""><i class="fas fa-times" data-delid="{{ $data->id }}"
                                                        onclick="Deltask(this)"></i></span></div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="column" id="done">
                                    <h1>Done</h1>
                                    @foreach ($datas as $data)
                                        @if ($data->status == 'Done')
                                            <div class="list-group-item" id="{{ $data->id }}" draggable="true"
                                                style="background-color: {{ $data->bgcolor }}" ondrop="Saves()">{{ $data->task }}
                                                <span class=""><i class="fas fa-times"
                                                        data-delid="{{ $data->id }}"
                                                        onclick="Deltask(this)"></i></span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-sm-3 d-flex justify-content-end">

                        <div class="card">
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-lg-2">
                                        <p class="card-text mt-2"><i class="nav-icon fas fa-stopwatch"
                                                style='font-size:36px;'></i>
                                        </p>
                                    </div>
                                    <div class="col-lg-10 m-auto">
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
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->





        <!-- Modal -->
        <div class="modal fade" id="todomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tasksub') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="todo">To Do</label>
                                <input type="text" class="form-control" id="todo" name="todo"
                                    placeholder="Enter To Do">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
