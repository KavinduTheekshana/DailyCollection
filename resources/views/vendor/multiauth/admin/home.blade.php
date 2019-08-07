@extends('multiauth::layouts.header')
@section('content')








<!-- Main Content -->
<div class="page-wrapper">
	<div class="container pt-25">


		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Dashboard</h5>
			</div>
			<!-- Breadcrumb -->

			<!-- /Breadcrumb -->
		</div>
		<!-- /Row -->
		<!-- Row -->
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-dark block counter"><span
													class="counter-anim">{{$totalcustomers}}</span></span>
											<span class="weight-500 uppercase-font block font-13">Total Customers</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-dark block counter"><span
													class="counter-anim">46.41</span>%</span>
											<span class="weight-500 uppercase-font block">Transactions</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="icon-control-rewind data-right-rep-icon txt-light-grey"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0 bg-gold">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 txt-light data-wrap-left">
											<span class="block counter"><span
													class="counter-anim">4,054,876</span></span>
											<span class="weight-500 uppercase-font block">Total Out</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 txt-light data-wrap-right">
											<i class="icon-layers data-right-rep-icon"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-dark block counter"><span
													class="counter-anim">46.43</span>%</span>
											<span class="weight-500 uppercase-font block">growth rate</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
											<div id="sparkline_4" class="sp-small-chart"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->
		<!-- Row -->
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Key Metrics</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<span class="font-12 head-font txt-dark">Employee Turnover<span
									class="pull-right">85%</span></span>
							<div class="progress mt-10 mb-30">
								<div class="progress-bar progress-bar-info" aria-valuenow="85" aria-valuemin="0"
									aria-valuemax="100" style="width: 85%" role="progressbar"> <span class="sr-only">85%
										Complete (success)</span> </div>
							</div>
							<span class="font-12 head-font txt-dark">Speed to Hire (Days)<span
									class="pull-right">80%</span></span>
							<div class="progress mt-10 mb-30">
								<div class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0"
									aria-valuemax="100" style="width: 80%" role="progressbar"> <span class="sr-only">85%
										Complete (success)</span> </div>
							</div>
							<span class="font-12 head-font txt-dark">Promotion Rates<span
									class="pull-right">70%</span></span>
							<div class="progress mt-10 mb-30">
								<div class="progress-bar progress-bar-danger" aria-valuenow="85" aria-valuemin="0"
									aria-valuemax="100" style="width: 70%" role="progressbar"> <span class="sr-only">85%
										Complete (success)</span> </div>
							</div>
							<span class="font-12 head-font txt-dark">Success Rate<span
									class="pull-right">45%</span></span>
							<div class="progress mt-10 mb-30">
								<div class="progress-bar progress-bar-inverse" aria-valuenow="85" aria-valuemin="0"
									aria-valuemax="100" style="width: 45%" role="progressbar"> <span class="sr-only">85%
										Complete (success)</span> </div>
							</div>
							<span class="font-12 head-font txt-dark">Performance<span
									class="pull-right">80%</span></span>
							<div class="progress mt-10 mb-30">
								<div class="progress-bar progress-bar-success" aria-valuenow="80" aria-valuemin="0"
									aria-valuemax="100" style="width: 80%" role="progressbar"> <span class="sr-only">80%
										Complete (success)</span> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view panel-refresh">
					<div class="refresh-container">
						<div class="la-anim-1"></div>
					</div>
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Employee Churn </h6>
						</div>
						<div class="pull-right">
							<a href="#" class="pull-left inline-block refresh">
								<i class="zmdi zmdi-replay"></i>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div id="e_chart_2" class="" style="height:330px;"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Yellow Card Issued</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table display product-overview border-none" id="employee_table">
										<thead>
											<tr>
												<th>Employee ID</th>
												<th>Name</th>
												<th>Reason</th>
												<th>Date</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>#85457898</td>
												<td>Jens Brincker</td>
												<td>Zapily chart</td>
												<td>Oct 27</td>
												<td>
													<span class="label label-success">done</span>
												</td>
												<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
														title="completed"><i class="zmdi zmdi-check"></i></a> <a
														href="javascript:void(0)" class="text-inverse" title="Delete"
														data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
											</tr>
											<tr>
												<td>#85457897</td>
												<td>Mark Hay</td>
												<td>PSD resolution</td>
												<td>Oct 26</td>
												<td>
													<span class="label label-warning ">Pending</span>
												</td>
												<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
														title="completed"><i class="zmdi zmdi-check"></i></a> <a
														href="javascript:void(0)" class="text-inverse" title="Delete"
														data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
											</tr>
											<tr>
												<td>#85457896</td>
												<td>Anthony Davie</td>
												<td>Cinnabar</td>
												<td>Oct 25</td>
												<td>
													<span class="label label-success ">done</span>
												</td>
												<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
														title="completed"><i class="zmdi zmdi-check"></i></a> <a
														href="javascript:void(0)" class="text-inverse" title="Delete"
														data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
											</tr>
											<tr>
												<td>#85457895</td>
												<td>David Perry</td>
												<td>Felix PSD</td>
												<td>Oct 25</td>
												<td>
													<span class="label label-danger">pending</span>
												</td>
												<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
														title="completed"><i class="zmdi zmdi-check"></i></a> <a
														href="javascript:void(0)" class="text-inverse" title="Delete"
														data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
											</tr>
											<tr>
												<td>#85457896</td>
												<td>Anthony Davie</td>
												<td>Cinnabar</td>
												<td>Oct 25</td>
												<td>
													<span class="label label-success ">done</span>
												</td>
												<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
														title="completed"><i class="zmdi zmdi-check"></i></a> <a
														href="javascript:void(0)" class="text-inverse" title="Delete"
														data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
											</tr>
											<tr>
												<td>#85457894</td>
												<td>Anthony Davie</td>
												<td>Beryl iphone</td>
												<td>Oct 25</td>
												<td>
													<span class="label label-success ">done</span>
												</td>
												<td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
														title="completed"><i class="zmdi zmdi-check"></i></a> <a
														href="javascript:void(0)" class="text-inverse" title="Delete"
														data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->
	</div>

	<!-- Footer -->

	@endsection