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
													class="counter-anim">1200</span></span>
											<span class="weight-500 uppercase-font block">Transactions</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="icon-layers data-right-rep-icon txt-light-grey"></i>
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
											<span class="block counter"><span class="counter-anim">754,870</span></span>
											<span class="weight-500 uppercase-font block">Total Out</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 txt-light data-wrap-right">
											<i class="icon-credit-card data-right-rep-icon"></i>
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


			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Latest Customers</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table display product-overview border-none" id="table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>NIC</th>
												<th>Mobile</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($customers as $customer)
											<tr>
												<td>{{$customer->id}}</td>
												<td>{{$customer->name}}</td>
												<td>{{$customer->nic}}V</td>
												<td>{{$customer->mobile}}</td>
												<td>
													@if($customer->status===1)
													<span style="padding: 5px 15px"
														class="label label-success">Active</span>
													@elseif($customer->status===0)
													<span style="padding: 5px 15px"
														class="label label-warning">Blocked</span>
													@endif
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>





			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Latest Transactions</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									{{-- <table class="table display product-overview border-none" id="table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>NIC</th>
												<th>Mobile</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data as $item)
											<tr>
												<td>{{$item->id}}</td>
									<td>{{$item->name}}</td>
									<td>{{$item->nic}}V</td>
									<td>{{$item->mobile}}</td>
									<td>
										@if($item->status===1)
										<span style="padding: 5px 15px" class="label label-success">Active</span>
										@elseif($item->status===0)
										<span style="padding: 5px 15px" class="label label-warning">Blocked</span>
										@endif
									</td>
									</tr>
									@endforeach
									</tbody>
									</table> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
		<!-- /Row -->



		<div class="row">


			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Latest Holidays</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table display product-overview border-none" id="table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Date</th>
												<th>Description</th>
												<th>Type</th>
											</tr>
										</thead>
										<tbody>
											@foreach($holidays as $holiday)
											<tr>
												<td>{{$holiday->id}}</td>
												<td>{{$holiday->date}}</td>
												<td>{{$holiday->description}}</td>
												<td>@if($holiday->type==='Poya Day')
													<span class="label label-warning">{{$holiday->type}}</span>
													@elseif($holiday->type==='Bank')
													<span class="label label-success">{{$holiday->type}}</span>
													@elseif($holiday->type==='Mercantile')
													<span class="label label-danger">{{$holiday->type}}</span>
													@elseif($holiday->type==='Public')
													<span class="label label-info">{{$holiday->type}}</span>
													@endif</td>
												<td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>





			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Latest Routes</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table display product-overview border-none" id="table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
											</tr>
										</thead>
										<tbody>
											@foreach($routes as $route)
											<tr>
												<td>{{$route->id}}</td>
												<td>{{$route->route}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>

	<!-- Footer -->

	{{-- <script>
		$(document).ready(function() {
			$('#table').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
	  } );
	</script> --}}

	@endsection