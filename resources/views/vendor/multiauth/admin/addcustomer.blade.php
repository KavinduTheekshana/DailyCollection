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

								<form role="form" method="POST" action="{{action('RoutesController@addroute')}}" enctype="multipart/form-data">

									@csrf

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label class="control-label mb-10 text-left">Name</label>
												<div class="input-group">
													<div class="input-group-addon"><i class="icon-user"></i></div>
													<input id="name" type="text"
														class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
														name="cname" value="{{ old('name') }}" required autofocus>
												</div>
											</div>

											<div class="col-sm-6">
												<label class="control-label mb-10 text-left">NIC</label>
												<div class="input-group">
													<div class="input-group-addon"><i class="icon-layers"></i></div>
													<input id="name" type="text"
														class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
														name="cnic" value="{{ old('name') }}" required autofocus>
												</div>
											</div>
										</div>
										<br>
										<div class="form-group">
											<label class="control-label mb-10 text-left"
												for="example-email">Address</label>
											<div class="input-group">
												<div class="input-group-addon"><i class="icon-location-pin"></i></div>
												<input id="name" type="text"
													class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
													name="caddress" value="{{ old('name') }}" required autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label class="control-label mb-10 text-left">Mobile</label>
													<div class="input-group">
														<div class="input-group-addon"><i
																class="icon-screen-smartphone"></i></div>
														<input id="name" type="text"
															class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
															name="cmobile" value="{{ old('name') }}" required autofocus>
													</div>
												</div>

												<div class="col-sm-6">
													<label class="control-label mb-10 text-left">Lan Line</label>
													<div class="input-group">
														<div class="input-group-addon"><i class="icon-phone"></i></div>
														<input id="name" type="text"
															class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
															name="clanline" value="{{ old('name') }}" required
															autofocus>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label mb-10 text-left"
												for="example-email">Route</label>
											<select name="croute" class="form-control">
												@foreach ($data as $item)
												<option>{{$item->route}}</option>

												@endforeach

											</select>
										</div>

									</div>
							</div>
						</div>
					</div>

					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Add First Guarantor Details</h6>
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
										name="g1name" value="{{ old('name') }}" required autofocus>
								</div>
							</div>

							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">NIC</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-layers"></i></div>
									<input id="name" type="text"
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
										name="g1nic" value="{{ old('name') }}" required autofocus>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Mobile</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-screen-smartphone"></i></div>
									<input id="name" type="text"
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
										name="g1mobile" value="{{ old('name') }}" required autofocus>
								</div>
							</div>

							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Lan Line</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-phone"></i></div>
									<input id="name" type="text"
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
										name="g1lanline" value="{{ old('name') }}" required autofocus>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Add Second Guarantor Details</h6>
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
										name="g2name" value="{{ old('name') }}" required autofocus>
								</div>
							</div>

							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">NIC</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-layers"></i></div>
									<input id="name" type="text"
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
										name="g2nic" value="{{ old('name') }}" required autofocus>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Mobile</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-screen-smartphone"></i></div>
									<input id="name" type="text"
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
										name="g2mobile" value="{{ old('name') }}" required autofocus>
								</div>
							</div>

							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Lan Line</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-phone"></i></div>
									<input id="name" type="text"
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
										name="g2lanline" value="{{ old('name') }}" required autofocus>
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
								<div class="form-group">
									<label class="control-label mb-10 text-left">Select</label>

									<select id="select" onchange="cleardata()" class="form-control">
										<option value="daily">Daily</option>
										<option value="weekly">Weekly</option>
									</select>

								</div>
							</div>


						</div>
					</div>


					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label mb-10 text-left">Amount</label>
								<div class="input-group">
									<div class="input-group-addon"><i class=" icon-credit-card"></i></div>
									<input id="amount" placeholder="10,000 LKR" type="number"
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
										value="{{ old('name') }}" required autofocus>
								</div>
							</div>

							<div class="col-sm-4">
								<label class="control-label mb-10 text-left">Installment</label>
								<div class="input-group">
									<div class="input-group-addon"><i class=" icon-credit-card"></i></div>

									<input id="installment" placeholder="10,000 LKR" type="number"
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
										value="{{ old('name') }}" required autofocus>
								</div>
							</div>

							<div class="col-sm-4">
								<label class="control-label mb-10 text-left">Total Income</label>
								<div class="input-group">
									<div class="input-group-addon"><i class=" icon-credit-card"></i></div>

									<input id="totalincome" placeholder="10,000 LKR" type="number"
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
										value="{{ old('name') }}" required autofocus>
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
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
										value="{{ old('name') }}" autofocus>
								</div>
							</div>

							<div class="col-sm-6">
								<label class="control-label mb-10 text-left">Due Date</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="icon-calender"></i></div>
									<input id="name" type="date"
										class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
										value="{{ old('name') }}" autofocus>
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

	<script>
		function cleardata(){

			document.getElementById("amount").value = null;
				document.getElementById("installment").value = null;
		}
			
	</script>

	<script>
		$('input[type="number"]').on('keydown, keyup', function () {
  //get a reference to the text input value
  

  var select=$( "#select" ).val();
  var texInputValue = $('#amount').val();
  var amount = parseInt(texInputValue) + parseInt((texInputValue*10)/100);
  $('#totalincome').val(amount.toFixed(2));
  if (select=='daily') {
	
	var dailyamount = amount/60;
  $('#installment').val(dailyamount.toFixed(2));
  }else if(select=='weekly'){
	var Weeklyamount = amount/10;
  $('#installment').val(Weeklyamount.toFixed(2));
  }
  
});

	</script>
	@endsection