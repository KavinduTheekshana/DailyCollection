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
							<div class="form-wrap">

								<form role="form" action="{{action('UserController@addusers')}}" method="POST"
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
                                            name="name" value="{{ old('name') }}" required autofocus>
                                        </div>
											</div>

											<div class="col-sm-6">
													<label class="control-label mb-10 text-left">NIC</label>
													<div class="input-group">
													<div class="input-group-addon"><i class="icon-user"></i></div>
													<input id="name" type="text"
														class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
														name="name" value="{{ old('name') }}" required autofocus>
													</div>
											</div>
										</div>
										<br>
										<div class="form-group">
											<label class="control-label mb-10 text-left"
												for="example-email">Address</label>
												<div class="input-group">
														<div class="input-group-addon"><i class="icon-user"></i></div>
														<input id="name" type="text"
															class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
															name="name" value="{{ old('name') }}" required autofocus>
														</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label class="control-label mb-10 text-left">Mobile</label>
													<div class="input-group">
															<div class="input-group-addon"><i class="icon-user"></i></div>
															<input id="name" type="text"
																class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
																name="name" value="{{ old('name') }}" required autofocus>
															</div>
												</div>

												<div class="col-sm-6">
													<label class="control-label mb-10 text-left">Lan Line</label>
													<div class="input-group">
															<div class="input-group-addon"><i class="icon-user"></i></div>
															<input id="name" type="text"
																class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
																name="name" value="{{ old('name') }}" required autofocus>
															</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label mb-10 text-left"
												for="example-email">Route</label>
											<select class="form-control">
												<option>sad</option>
												<option>sad</option>
												<option>sad</option>
												<option>sad</option>
												<option>sad</option>
												<option>sad</option>
											</select>
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










									</div>
							</div>
						</div>
					</div>

					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Add First Guarator Details</h6>
						</div>
						<div class="clearfix"></div>
					</div>

					<br>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Name</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="icon-user"></i></div>
										<input id="name" type="text"
											class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
											name="name" value="{{ old('name') }}" required autofocus>
										</div>
							</div>

							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">NIC</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="icon-user"></i></div>
										<input id="name" type="text"
											class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
											name="name" value="{{ old('name') }}" required autofocus>
										</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Mobile</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="icon-user"></i></div>
										<input id="name" type="text"
											class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
											name="name" value="{{ old('name') }}" required autofocus>
										</div>
							</div>

							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Lan Line</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="icon-user"></i></div>
										<input id="name" type="text"
											class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
											name="name" value="{{ old('name') }}" required autofocus>
										</div>
							</div>
						</div>
					</div>
					<br>
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Add Second Guarator Details</h6>
						</div>
						<div class="clearfix"></div>
					</div>

					<br>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Name</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="icon-user"></i></div>
										<input id="name" type="text"
											class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
											name="name" value="{{ old('name') }}" required autofocus>
										</div>
							</div>

							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">NIC</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="icon-user"></i></div>
										<input id="name" type="text"
											class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
											name="name" value="{{ old('name') }}" required autofocus>
										</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Mobile</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="icon-user"></i></div>
										<input id="name" type="text"
											class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
											name="name" value="{{ old('name') }}" required autofocus>
										</div>
							</div>

							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Lan Line</label>
								<div class="input-group">
										<div class="input-group-addon"><i class="icon-user"></i></div>
										<input id="name" type="text"
											class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
											name="name" value="{{ old('name') }}" required autofocus>
										</div>
							</div>
						</div>
					</div>
					<br>

					<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Add Payment Details</h6>
							</div>
							<div class="clearfix"></div>
						</div>
	
						<br>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label mb-10 text-left">Amount</label>
									<div class="input-group">
											<div class="input-group-addon"><i class=" icon-credit-card"></i></div>
											<input id="name" placeholder="10,000 LKR" type="text"
												class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
												name="name" value="{{ old('name') }}" required autofocus>
											</div>
								</div>
	
								<div class="col-sm-6">
									<label class="control-label mb-10 text-left">Installment</label>
									<div class="input-group">
											<div class="input-group-addon"><i class=" icon-credit-card"></i></div>
											<input id="name" placeholder="10,000 LKR" type="text"
												class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
												name="name" value="{{ old('name') }}" required autofocus>
											</div>
								</div>
							</div>
						</div>
	
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
											<div class="form-group">
													<label class="control-label mb-10 text-left">Select</label>
												
														<select class="form-control">
															<option>Daily</option>
															<option>Weekly</option>
														</select>
													
												</div>
									</div>
	
							
							</div>
						</div>

						
						<div class="form-group">
								<div class="row">
										<div class="col-sm-6">
												<label class="control-label mb-10 text-left">Date Purchased</label>
												<div class="input-group">
														<div class="input-group-addon"><i class="icon-calender"></i></div>
														<input id="name" type="date"
															class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
															name="name" value="{{ old('name') }}" required autofocus>
														</div>
											</div>
		
									<div class="col-sm-6">
										<label class="control-label mb-10 text-left">Due Date</label>
										<div class="input-group">
												<div class="input-group-addon"><i class="icon-calender"></i></div>
												<input id="name" type="date"
													class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
													name="name" value="{{ old('name') }}" required autofocus>
												</div>
									</div>
								</div>
							</div>
							<br>


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