@extends('multiauth::layouts.header')
@section('content')


<div class="page-wrapper">
	<div class="container">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Add Routes</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li class="active"><a href="#"><span>Routes</span></a></li>
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
							<h6 class="panel-title txt-dark">Route Name</h6>
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
											<div class="col-sm-12">
												<div class="input-group mb-15">
													<input type="email" id="example-input2-group2"
														name="example-input2-group2" class="form-control"
														placeholder="Email">
													<span class="input-group-btn">
														<button type="button" class="btn btn-success btn-anim"><i
																class="icon-rocket"></i><span
																class="btn-text">submit</span></button>
													</span>
												</div>
											</div>
										</form>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>


		<br>


		<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Route Name</h6>
							</div>
							<div class="clearfix"></div>
						</div>
	
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
							





								
	
							</div>
						</div>
					</div>
				</div>
	
			</div>
	



	</div>
	<!-- /Row -->
</div>
</div>

@endsection