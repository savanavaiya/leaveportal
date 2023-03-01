@extends('common.com')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Task Status of {{ $use->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>To Do</th>
                        <th>In Progress</th>
                        <th>Q/A</th>
                        <th>Done</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            @foreach ($todo as $vl1)
                                <ul style="list-style: none;padding:0px">
                                    <li>{{ $vl1->task }}</li>
                                </ul>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($progress as $vl2)
                                <ul style="list-style: none;padding:0px">
                                    <li>{{ $vl2->task }}</li>
                                </ul>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($qa as $vl3)
                               <ul style="list-style: none;padding:0px">
                                    <li>{{ $vl3->task }}</li>
                               </ul>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($done as $vl4)
                                <ul style="list-style: none;padding:0px">
                                    <li>{{ $vl4->task }}</li>
                                </ul>
                            @endforeach
                        </td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    @endsection
