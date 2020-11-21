<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>KC Daily Collections</title>
	<meta name="description" content="Zapily is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords"
		content="admin, admin dashboard, admin template, cms, crm, Zapily Admin, Zapilyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="theame/favicon.ico" type="image/x-icon">

	<!-- vector map CSS -->
	<link href="{{ asset('theame/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}"
		rel="stylesheet">




	<!-- Custom CSS -->
	<link href="{{ asset('theame/dist/css/style.css') }}" rel="stylesheet">


</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->

	<div class="wrapper pa-0">
		<header class="sp-header">
			<div class="sp-logo-wrap pull-left">
				<a href="index.html">
					{{-- <img class="brand-img mr-10" src="theame/img/logonew.png" alt="brand" /> --}}
					{{-- <span class="brand-text">KC Daily Collections</span> --}}
				</a>
			</div>

			<div class="clearfix"></div>
		</header>

		<!-- Main Content -->
		<div class="page-wrapper pa-0 ma-0 auth-page">
			<div class="container-fluid">
				<!-- Row -->
				<div class="table-struct full-width full-height">
					<div class="table-cell vertical-align-middle auth-form-wrap">
						<div class="auth-form  ml-auto mr-auto no-float">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="mb-30">
										<h3 class="text-center txt-dark mb-10">KC Daily Collections</h3>
										<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
									</div>
									<div class="form-wrap">
										<form method="POST" action="{{ route('admin.login') }}"
											aria-label="{{ __('Admin Login') }}">
											@csrf

											
											<div class="form-group">
												<label class="control-label mb-10" for="exampleInputEmail_2">Email
													address</label>
													<input placeholder="Enter Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
													required autofocus> @if ($errors->has('email'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('email') }}</strong>
													</span> @endif
											</div>


											<div class="form-group">
												<label class="pull-left control-label mb-10"
													for="exampleInputpwd_2">Password</label>

												<div class="clearfix"></div>
												<input placeholder="Enter Password" id="password" type="password"
													class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
													name="password" required> @if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('password') }}</strong>
												</span> @endif

											</div>

											<div class="form-group">
												<div class="checkbox checkbox-primary pr-10 pull-left">
													<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
													<label for="checkbox_2"> Keep me logged in</label>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="form-group text-center">
												<button type="submit" class="btn btn-success  btn-rounded">sign
													in</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
			</div>

		</div>
		<!-- /Main Content -->

	</div>
	<!-- /#wrapper -->

	<!-- JavaScript -->

	<!-- jQuery -->
	<script src="{{ asset('theame/vendors/bower_components/jquery/dist/jquery.min.js') }}" defer></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="{{ asset('theame/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>
	<script src="{{ asset('theame/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}" defer>
	</script>

	<!-- Slimscroll JavaScript -->
	<script src="{{ asset('theame/dist/js/jquery.slimscroll.js') }}" defer></script>

	<!-- Init JavaScript -->
	<script src="{{ asset('theame/dist/js/init.js') }}" defer></script>
</body>

</html>