@extends('common.com')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Operation Employees Id</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#addnew">
                            Add New
                        </button>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        @if (session()->has('SUCCESS'))
            <p class="alert alert-success">{{ session()->get('SUCCESS') }}</p>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Image</th>
                    <th scope="col" colspan="2">Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <img src="{{ asset('image/' . $data->image) }}" class="rounded-circle" height="60px"
                                width="60px">
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-id="{{ $data->id }}" onclick="Edituserbyadmin(this)" data-toggle="modal" data-target="#addnew">
                              Edit
                          </button>
                        </td>
                        <td>
                            <button data-id="{{ $data->id }}" data-email="{{ $data->email }}" onclick="Delete(this)"
                                class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
        </table>



        <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Register New User</h5>
                        <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="newuser">
                            @csrf
                            <input type="hidden" name="id" id="id" value="0">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Full Name" name="name"
                                    id="name" value="{{ old('name') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('name')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="hidden" class="form-control"name="user_type"
                                value="{{ old('user_type') }}" id="user_type">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ old('email') }}" id="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    value="{{ old('password') }}" id="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Contact No" name="phone_no"
                                    value="{{ old('phone_no') }}" id="phone_no">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                                @error('phone_no')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Emergancy Contact No"
                                    name="emgphone_no"
                                    value="{{ old('emgphone_no') }}" id="emgphone_no">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                                @error('emgphone_no')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Address" name="address"
                                    value="{{ old('address') }}" id="address">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-home"></span>
                                    </div>
                                </div>
                                @error('address')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Joining Date"
                                    name="joining_date"
                                    value="{{ old('joining_date') }}" id="joining_date">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-calendar-alt"></span>
                                    </div>
                                </div>
                                @error('joining_date')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Designation" name="designation"
                                    value="{{ old('designation') }}" id="designation">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user-tie"></span>
                                    </div>
                                </div>
                                @error('designation')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                            </div>
                            <label style="font-size: 15px">Upload Profile Image</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image">
                                <input type="hidden" class="form-control" name="image"
                                    value="{{ old('image') }}" id="image">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-badge"></span>
                                    </div>
                                </div>
                                @error('image')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                            </div>
                            <label>Upload Documents</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="document">
                                <input type="hidden" class="form-control" name="document"
                                    value="{{ old('document') }}" id="document">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-file"></span>
                                    </div>
                                </div>
                                @error('document')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                                <div class="col-md-4">

                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
