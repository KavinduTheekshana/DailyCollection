@extends('multiauth::layouts.header')
@section('content')


<div class="page-wrapper">
    <div class="container">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Update User</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#"><span>Uses</span></a></li>
                    <li class="active"><span>Update User</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Update Users Details</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">

                                <form method="POST" action="{{action('CustomerController@editcoustomer')}}"
                                    enctype="multipart/form-data">

                                    @csrf


                                    @if (count($errors) > 0)
                                    <div style="padding:.75rem 1.25rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem;
                                      color:#721c24;background-color:#f8d7da;border-color:#f5c6cb;">
                                        <strong>Whoops!</strong> There were some problems with your input.<br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif


                                    <div class="form-group">
											<div class="row">
												<div class="col-sm-3">
                                                        <label class="control-label mb-10 text-left">ID</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-pin"></i></div>
                                                            <input id="id" type="text"
                                                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                        name="id" value="{{$data->adminid}}" required autofocus readonly>
                                                        </div>
															
												</div>

												<div class="col-sm-9">
                                                        <label class="control-label mb-10 text-left">Name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                            <input  type="text"
                                                                class="form-control"
                                                        name="name" value="{{$data->adminname}}" required autofocus>
                                                        </div>
													
															
												</div>
											</div>
										</div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left" for="example-email">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                            <input id="email" type="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" value="{{$data->adminemail}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left" for="example-email">Phone</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                            <input id="phone" type="phone"
                                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                name="phone" value="{{$data->adminphone}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left" for="example-email">NIC</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="icon-layers"></i></div>
                                            <input id="nic" type="nic"
                                                class="form-control{{ $errors->has('nic') ? ' is-invalid' : '' }}"
                                                name="nic" value="{{$data->adminnic}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left" for="example-email">Address</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="icon-location-pin"></i></div>
                                            <input id="address" type="address"
                                                class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                name="address" value="{{$data->adminaddress}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
											<div class="row">
												<div class="col-sm-3">
													<label class="control-label mb-10 text-left">Role ID</label>
													
															
                                                    <input name="role_id[]" id="role_id"
                                                    class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" value="2" readonly>
															
												</div>

												<div class="col-sm-9">
													<label class="control-label mb-10 text-left">Assign Role</label>
												
															
															<input type="text"
																class="form-control"
																required value="User" readonly>
															
												</div>
											</div>
										</div>


                                    {{-- <div class="form-group mt-30 mb-30">
                                        <label class="control-label mb-10 text-left">Assign Role</label>
                                        <input name="role_id[]" id="role_id"
                                            class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" value="2">
                                        <select name="role_id[]" id="role_id"
                                            class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}">
                                            <option selected disabled>Select Role</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                            

                            

                                    <button type="submit" class="btn btn-success mr-10">Update</button>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>
    </div>

    @endsection