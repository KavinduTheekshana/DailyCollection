@extends('multiauth::layouts.header')
@section('content')


<div class="page-wrapper">
	<div class="container">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Add User</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li><a href="#"><span>Uses</span></a></li>
					<li class="active"><span>Add User</span></li>
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
							<h6 class="panel-title txt-dark">Add Users Form</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="form-wrap">

								<form role="form" action="{{action('UserController@addusers')}}" method="POST"
									enctype="multipart/form-data">

									@csrf

									<div class="form-group">
										<label class="control-label mb-10 text-left">Name</label>
										<input type="text" class="form-control" name="name" placeholder="Name">
									</div>
									<div class="form-group">
										<label class="control-label mb-10 text-left" for="example-email">Email</label>
										<input type="email" class="form-control" name="email" placeholder="Email">
									</div>
									<div class="form-group">
										<label class="control-label mb-10 text-left" for="example-email">Phone</label>
										<input type="number" class="form-control" name="phone" placeholder="Phone Number">
									</div>

									<div class="form-group">
										<label class="control-label mb-10 text-left" for="example-email">NIC</label>
										<input type="text" class="form-control" name="nic" placeholder="NIC">
									</div>

									<div class="form-group">
										<label class="control-label mb-10 text-left" for="example-email">Address</label>
										<input type="text" class="form-control" name="address" placeholder="Address">
									</div>

									{{-- <div class="form-group mt-30 mb-30">
										<label class="control-label mb-10 text-left">Routes</label>
										<select class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div> --}}

									<div class="form-group">
										<label class="control-label mb-10 text-left">Password</label>
										<input type="password" class="form-control" name="password" placeholder="password">
									</div>

									<div class="form-group">
										<label class="control-label mb-10 text-left">Re Enter Password</label>
										<input type="password" class="form-control" name="password_confirmation" placeholder="Re Enter password">
									</div>

									<button type="submit" class="btn btn-success mr-10">Submit</button>
									<button type="reset" class="btn btn-default">Reset</button>


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