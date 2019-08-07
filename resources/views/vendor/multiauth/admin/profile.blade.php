@extends('multiauth::layouts.header')
@section('content')






<!-- Main Content -->
<div class="page-wrapper">
	<div class="container pt-25">

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

		@if (session('status2'))
		<div class="alert alert-warning">
			{{ session('status2') }}
		</div>
		@endif



		<!-- Row -->
		<div class="row">
			<div class="col-lg-3 col-xs-12">
				<div class="panel panel-default card-view  pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body  pa-0">
							<div class="profile-box">
								<div class="profile-cover-pic">
									<div class="profile-image-overlay">
									</div>
								</div>

								<form role="form" action="{{action('ProfileController@updateprofilepic')}}"
									method="POST" enctype="multipart/form-data">

									@csrf
									<div class="profile-info text-center">
										<div class="profile-img-wrap">
											<img class="inline-block mb-10" src="{{$profile->profilepic}}" alt="user" />
											<div class="fileupload btn btn-default">
												<span class="btn-text">edit</span>
												<input name="profilepic" class="upload" type="file">
											</div>
										</div>
										<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-gold">
											{{$profile->name}}</h5>
									</div>
									<div class="social-info">

										<button type="submit" class="btn btn-gold btn-block"></i><span
												class="btn-text">edit
												profile</span></button>
								</form>




							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="col-lg-9 col-xs-12">
			<div class="panel panel-default border-panel card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title pull-left">Details</h6>
					</div>

					<div class="clearfix"></div>
				</div>

				<div class="panel-wrapper collapse in">
					<div class="panel-body row pa-20">

						<div class="form-wrap">
							<form action="#">
								<div class="form-body overflow-hide">
									<div class="form-group">
										<label class="control-label mb-10" for="exampleInputuname_1">Name</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="icon-user"></i>
											</div>
											<input type="text" class="form-control" id="exampleInputuname_1" disabled
												value="{{$profile->name}}">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label mb-10" for="exampleInputEmail_1">Email
											address</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="icon-envelope-open"></i>
											</div>
											<input type="email" class="form-control" id="exampleInputEmail_1" disabled
												value="{{$profile->email}}">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label mb-10" for="exampleInputContact_1">Contact
											number</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="icon-phone"></i>
											</div>
											<input type="email" class="form-control" id="exampleInputContact_1"
												value="{{$profile->phone}}" disabled>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label mb-10" for="exampleInputContact_1">Address</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="icon-map"></i>
											</div>
											<input type="email" class="form-control" id="exampleInputContact_1"
												value="{{$profile->address}}" disabled>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label mb-10" for="exampleInputContact_1">NIC</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="icon-layers"></i>
											</div>
											<input type="email" class="form-control" id="exampleInputContact_1"
												value="{{$profile->nic}}" disabled>
										</div>
									</div>



								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>




		<div class="row">

			<div class="col-lg-4 col-xs-12">
				<div class="panel panel-default border-panel card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title pull-left">Update Password</h6>
						</div>

						<div class="clearfix"></div>
					</div>

					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-20">

							<div class="form-wrap">
								<form role="form" method="POST" action="{{action('ProfileController@updatepassword')}}"
									enctype="multipart/form-data">

									@csrf
									<div class="form-body overflow-hide">
										<div class="form-group">
											<label class="control-label mb-10"
												for="exampleInputuname_1">Password</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="icon-options"></i>
												</div>
												<input type="password" name="password" class="form-control"
													id="exampleInputuname_1">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputEmail_1">Confirmed
												Password</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="icon-options"></i>
												</div>
												<input type="password" name="password_confirmation" class="form-control"
													id="exampleInputEmail_1">
											</div>
										</div>



										<div class="form-actions mt-10">
											<button type="submit" class="btn btn-success mr-10 mb-30">Update
												Password</button>

											<button type="reset" class="btn btn-default mr-10 mb-30">Reset
											</button>
										</div>



									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>






			<div class="col-lg-8 col-xs-12">
				<div class="panel panel-default border-panel card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title pull-left">Update Profile Details</h6>
						</div>

						<div class="clearfix"></div>
					</div>

					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-20">

							<div class="form-wrap">
								<form role="form" method="POST"
									action="{{action('ProfileController@updateprofiledetails')}}"
									enctype="multipart/form-data">

									@csrf
									<div class="form-body overflow-hide">
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputuname_1">Name</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="icon-user"></i>
												</div>
												<input type="text" name="name" class="form-control"
													id="exampleInputuname_1" value="{{$profile->name}}">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputEmail_1">Email
												address</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="icon-envelope-open"></i>
												</div>
												<input name="email" type="email" class="form-control"
													id="exampleInputEmail_1" disabled value="{{$profile->email}}">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputContact_1">Contact
												number</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="icon-phone"></i>
												</div>
												<input name="phone" type="number" class="form-control"
													id="exampleInputContact_1" value="{{$profile->phone}}">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label mb-10"
												for="exampleInputContact_1">Address</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="icon-map"></i>
												</div>
												<input name="address" type="text" class="form-control"
													id="exampleInputContact_1" value="{{$profile->address}}">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label mb-10" for="exampleInputContact_1">NIC</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="icon-layers"></i>
												</div>
												<input name="nic" type="text" class="form-control"
													id="exampleInputContact_1" value="{{$profile->nic}}">
											</div>
										</div>

										<div class="form-actions mt-10">
											<button type="submit" class="btn btn-success mr-10 mb-30">Update
												Profile</button>

											<button type="reset" class="btn btn-default mr-10 mb-30">Reset
											</button>
										</div>



									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			{{-- <div class="col-lg-8 col-xs-12">
				<div class="panel panel-default border-panel card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title pull-left">Update Profile Details</h6>
						</div>

						<div class="clearfix"></div>
					</div>

					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-20">

							<div class="form-wrap">




							</div>
						</div>
					</div>
				</div>
			</div> --}}



		</div>











	</div>






</div>
<!-- /Row -->



<!-- Calender JavaScripts -->


@endsection