@extends('multiauth::layouts.header')
@section('content')


<div class="page-wrapper">
	<div class="container">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Add Customers</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li><a href="#"><span>Customers</span></a></li>
					<li class="active"><span>Add Customers</span></li>
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
							<h6 class="panel-title txt-dark">Add Customers Details</h6>
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="panel-wrapper collapse in">
						<div class="panel-body">

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



								@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
							@endif



							<div class="form-wrap">

								<form role="form" method="POST"
									action="{{action('CustomerController@submitcustomers2')}}"
									enctype="multipart/form-data">

									@csrf

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label class="control-label mb-10 text-left">Name</label>
												<div class="input-group">
													<div class="input-group-addon"><i class="icon-user"></i></div>
													<input id="name" type="text"
														class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
														name="name" value="{{ old('name') }}" autofocus>
												</div>
											</div>

											<div class="col-sm-6">
												<label class="control-label mb-10 text-left">NIC</label>
												<div class="input-group"> <span class="input-group-addon"><i class="icon-layers"></i></span>
													<input id="nic" type="number"
														class="form-control{{ $errors->has('nic') ? ' is-invalid' : '' }}"
														name="nic" value="{{ old('nic') }}"  required autofocus>
													<span class="input-group-addon">V</span> 
												</div>
											</div>
										</div>
										<br>
										<div class="form-group">
											<label class="control-label mb-10 text-left"
												for="example-email">Address</label>
											<div class="input-group">
												<div class="input-group-addon"><i class="icon-location-pin"></i></div>
												<input id="address" type="text"
													class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
													name="address" value="{{ old('address') }}" required autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label class="control-label mb-10 text-left">Mobile</label>
													<div class="input-group">
														<div class="input-group-addon"><i
																class="icon-screen-smartphone"></i></div>
														<input id="mobile" type="text"
															class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
															name="mobile" value="{{ old('mobile') }}" required autofocus>
													</div>
												</div>

												<div class="col-sm-6">
													<label class="control-label mb-10 text-left">Vehicle Number</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-speedometer"></i></div>
														<input id="vehiclenumber" type="text"
															class="form-control {{ $errors->has('vehiclenumber') ? ' is-invalid' : '' }}"
															name="vehiclenumber" value="{{ old('vehiclenumber') }}" autofocus>
													</div>
												</div>
											</div>
										</div>

										

							

									</div>
							</div>
						</div>
					</div>

	

					<button type="submit" class="btn btn-success mr-10">Submit</button>
					<button type="reset" class="btn btn-default">Reset</button>
					</form>
					<br>
					<br><br>

				</div>

				<br>

			</div>
			<!-- /Row -->
		</div>
	</div>




	@endsection