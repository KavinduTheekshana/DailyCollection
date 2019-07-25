@extends('multiauth::layouts.header')
@section('content')


<div class="page-wrapper">
	<div class="container">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Manage Users</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li><a href="#"><span>Users</span></a></li>
					<li class="active"><span>Manage Users</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>
		<!-- /Title -->

		<!-- Row -->
		<div class="row">
			<div class="col-sm-12">

			</div>

		</div>



		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Users List</h6>
						</div>
						<div class="clearfix"></div>
					</div>



					<div class="panel-wrapper collapse in">
						<div class="panel-body">

								@if (session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
								@endif

							<table class="table" id="table">
								<thead>
									<tr>
										<th class="text-center">ID</th>
										<th class="text-center">Name</th>
										<th class="text-center">Email</th>
										<th class="text-center">Phone</th>
										<th class="text-center">NIC</th>
										<th class="text-center">Ststus</th>
										<th class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody style="text-align: center">
									@foreach($data as $item)
									<tr>
										<td>{{$item->adminid}}</td>
										<td>{{$item->adminname}}</td>
										<td>{{$item->adminemail}}</td>
										<td>{{$item->adminphone}}</td>
										<td>{{$item->adminnic}}</td>
										<td>
											@if($item->rolename==='super')
											<span style="padding: 5px 15px"
												class="label label-success">{{$item->rolename}}</span>
											@elseif($item->rolename==='user')
											<span style="padding: 5px 15px"
												class="label label-primary">{{$item->rolename}}</span>
											@endif
										</td>
										<td>
											@if($item->rolename==='super')
											<a href="deleteroute/{{$item->adminid}}" type="button" style="padding: 6px 12px" class="btn btn-success">View
												Profile</a>
											@elseif($item->rolename==='user')
											<a href="updateuser/{{$item->adminid}}" type="button" style="padding: 6px 12px" class="btn btn-warning">Update</a>
											<button style="padding: 6px 12px" class="btn btn-danger"
											Onclick="deleteData({{$item->adminid}})">Delete</button>
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







		<!-- Row -->



	</div>

	<script>
			$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
			function deleteData(id){
		swal({
				title: "Are you sure?",
				text: "You will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm) {
				if (isConfirm) {
					$.ajax({
								url : "{{ url('deleteuser')}}" + '/' + id,
								type : "GET",
								success: function(){
									swal({
										title: "Success!",
										text : "Post has been deleted \n Click OK to refresh the page",
										type : "success",
									},
									function(isConfirm){ 
										location.reload();
									});
								},
								error : function(){
									swal({
										title: 'Opps...',
										text : 'data.message',
										type : 'error',
										timer : '1500'
									})
								}
							})
				} else {
					swal("Cancelled", "Your imaginary file is safe 🙂", "error");
				}
			});
		}

		</script>


<script>
		$(document).ready(function() {
		  $('#table').DataTable();
	  } );
	</script>

	@endsection