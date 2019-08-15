@extends('multiauth::layouts.header')
@section('content')


<div class="page-wrapper">
	<div class="container">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Reports</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li><a href="index.html">Transactions List</a></li>
					<li class="active"><span>Reports</span> </li>
				</ol>
			</div> <!-- /Breadcrumb -->
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
							<h6 class="panel-title txt-dark">Not Completed Transactions List For Reports</h6>
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
										<th class="text-center">NIC</th>
										<th class="text-center">Type</th>
										<th class="text-center">DueDate</th>
										<th class="text-center">Remain</th>
										<th class="text-center">Installment</th>

										<th class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody style="text-align: center">
									@foreach($data as $item)
									<tr>
										<td>{{$item->id}}</td>
										<td>{{$item->cname}}</td>
										<td>{{$item->cnic}}V</td>
										<td>
											@if($item->paymenttype==='weekly')
											<span style="padding: 5px 15px" class="label label-danger">Weekly</span>
											@elseif($item->paymenttype==='daily')
											<span style="padding: 5px 15px" class="label label-primary">Daily</span>
											@endif
										</td>
										<td>{{$item->duedate}}</td>
										<td>{{$item->remain}}</td>
										<td>{{$item->installment}}</td>
										{{-- <td>
											@if($item->status===1)
											<span style="padding: 5px 15px" class="label label-success">Active</span>
											@elseif($item->status===0)
											<span style="padding: 5px 15px" class="label label-warning">Blocked</span>
											@endif
										</td>  --}}


										<td>
											<a href="#" id="view_msg" name="view_msg" type="button"
												style="padding: 10px"
												class="view btn btn-warning btn-icon-anim btn-square"
												data-toggle="modal" data-target="#responsive-modal"
												data-modelid="{{$item->id}}" data-modelcname="{{$item->cname}}"
												data-modelcnic="{{$item->cnic}}V"
												data-modelcaddress="{{$item->caddress}}"
												data-modelcmobile="{{$item->cmobile}}"
												data-modelclanline="{{$item->clanline}}"
												data-modelroute="{{$item->route}}" data-modelg1name="{{$item->g1name}}"
												data-modelg1nic="{{$item->g1nic}}"
												data-modelg1address="{{$item->g1address}}"
												data-modelg1mobile="{{$item->g1mobile}}"
												data-modelg1lanline="{{$item->g1lanline}}"
												data-modelg2name="{{$item->g2name}}" data-modelg2nic="{{$item->g2nic}}"
												data-modelg2address="{{$item->g2address}}"
												data-modelg2mobile="{{$item->g2mobile}}"
												data-modelg2lanline="{{$item->g2lanline}}"><i class="fa fa-eye"></i></a>



											{{-- <a href="#" id="edit_msg" name="edit_msg" type="button"
												style="padding: 10px"
												class="edit btn btn-danger btn-icon-anim btn-square" data-toggle="modal"
												data-target="#editmodel" data-modelremain="{{$item->remain}}"><i class="icon-check"></i></a> --}}


											{{-- <a href="#" id="editx_msg" name="editx_msg" type="button"
												style="padding: 10px" class="btn btn-danger btn-icon-anim btn-square"
												data-toggle="modal" data-target="#editmodel"
												data-modelremainbalance="{{$item->cnic}}">
											<i class="icon-check"></i></a> --}}



											{{-- @if($item->status===1)
											<a href="blockcustomer/{{$item->id}}" type="button" style="padding: 10px"
											class="btn btn-warning btn-icon-anim btn-square"><i
												class="icon-lock"></i></a>
											@elseif($item->status===0)
											<a href="unblockcustomer/{{$item->id}}" type="button" style="padding: 10px"
												class="btn btn-success btn-icon-anim btn-square"><i
													class="icon-lock-open"></i></a>
											@endif

											<a href="#" id="edit_msg" name="edit_msg" type="button"
												style="padding: 10px"
												class="edit btn btn-default btn-icon-anim btn-square"
												data-toggle="modal" data-target="#editmodel"
												data-modelid="{{$item->id}}" data-modelname="{{$item->name}}"
												data-modeladdress="{{$item->address}}" data-modelnic="{{$item->nic}}"
												data-modelmobile="{{$item->mobile}}"
												data-modellanline="{{$item->lanline}}"><i class="fa fa-pencil"></i></a>

											<button Onclick="deleteData({{$item->id}})"
												class="btn btn-danger btn-icon-anim btn-square"><i
													class="icon-trash"></i></button>


											@if($item->rolename==='super')
											<a href="deleteroute/{{$item->adminid}}" type="button"
												style="padding: 6px 12px" class="btn btn-success">View
												Profile</a>
											@elseif($item->rolename==='user')
											<a href="updateuser/{{$item->adminid}}" type="button"
												style="padding: 6px 12px" class="btn btn-warning">Update</a>
											<button style="padding: 6px 12px" class="btn btn-danger"
												Onclick="deleteData({{$item->adminid}})">Delete</button>
											@endif --}}

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

	{{-- Complete Order --}}


	{{-- <div id="editmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
		style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Close Transaction</h5>
				</div>
				<div class="modal-body">

					<div class="form-group">

						<div class="row">
							<div class="col-sm-12">
								<h4 class="control-label mb-10 text-danger">Remaining Balance</h4>
								<input type="text" class="form-control" id="modelremain2" name="modelremain"
									placeholder="ID" readonly>

							</div>

						</div>

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div> --}}






	{{-- View Model --}}

	<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Transaction Details</h5>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							{{-- <h6 class="mb-5">Customer Details</h6>
							<hr> --}}

							<div class="row">
								<div class="col-sm-3">
									<label class="control-label mb-10">ID</label>
									<input type="text" class="form-control" id="modelid" placeholder="ID" readonly>
								</div>
								<div class="col-sm-9">
									<label class="control-label mb-10"> Customer Name</label>
									<input type="text" class="form-control" id="modelcname" placeholder="Name" readonly>
								</div>


							</div>
							<br>
							<label for="recipient-name" class="control-label mb-10">Address</label>
							<input type="text" class="form-control" id="modelcaddress" placeholder="Address" readonly>
							<br>
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label mb-10">NIC</label>
									<input type="text" class="form-control" id="modelcnic" placeholder="NIC" readonly>
								</div>

								<div class="col-sm-6">
									<label class="control-label mb-10">Route</label>
									<input type="text" class="form-control" id="modelroute" placeholder="NIC" readonly>
								</div>

							</div>
							<br>

							<div class="row">
								<div class="col-sm-6">
									<label class="control-label mb-10">Mobile</label>
									<input type="text" class="form-control" id="modelcmobile" placeholder="Mobile"
										readonly>
								</div>

								<div class="col-sm-6">
									<label class="control-label mb-10">Lan Line</label>
									<input type="text" class="form-control" id="modelclanline" placeholder="Lan Line"
										readonly>
								</div>

							</div>

						</div>
						<br>
						<hr>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-8">
									<label class="control-label mb-10">First Guarater Name</label>
									<input type="text" class="form-control" id="modelg1name" placeholder="Name"
										readonly>
								</div>

								<div class="col-sm-4">
									<label class="control-label mb-10">NIC</label>
									<input type="text" class="form-control" id="modelg1nic" placeholder="NIC" readonly>
								</div>


							</div>
							<br>
							<label for="recipient-name" class="control-label mb-10">Address</label>
							<input type="text" class="form-control" id="modelg1address" placeholder="Address" readonly>
							<br>

							<div class="row">
								<div class="col-sm-6">
									<label class="control-label mb-10">Mobile</label>
									<input type="text" class="form-control" id="modelg1mobile" placeholder="Mobile"
										readonly>
								</div>

								<div class="col-sm-6">
									<label class="control-label mb-10">Lan Line</label>
									<input type="text" class="form-control" id="modelg1lanline" placeholder="Lan Line"
										readonly>
								</div>

							</div>

						</div>

						<br>
						<hr>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-8">
									<label class="control-label mb-10">Second Guarater Name</label>
									<input type="text" class="form-control" id="modelg2name" placeholder="Name"
										readonly>
								</div>

								<div class="col-sm-4">
									<label class="control-label mb-10">NIC</label>
									<input type="text" class="form-control" id="modelg2nic" placeholder="NIC" readonly>
								</div>


							</div>
							<br>
							<label for="recipient-name" class="control-label mb-10">Address</label>
							<input type="text" class="form-control" id="modelg2address" placeholder="Address" readonly>
							<br>

							<div class="row">
								<div class="col-sm-6">
									<label class="control-label mb-10">Mobile</label>
									<input type="text" class="form-control" id="modelg2mobile" placeholder="Mobile"
										readonly>
								</div>

								<div class="col-sm-6">
									<label class="control-label mb-10">Lan Line</label>
									<input type="text" class="form-control" id="modelg2lanline" placeholder="Lan Line"
										readonly>
								</div>

							</div>

						</div>

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>











	<script>
		$('.view').on('click',function(e){
                 e.preventDefault();
             document.getElementById('modelid').value=$(this).data('modelid');
             document.getElementById('modelcname').value=$(this).data('modelcname');
             document.getElementById('modelcaddress').value=$(this).data('modelcaddress');
             document.getElementById('modelcnic').value=$(this).data('modelcnic');
             document.getElementById('modelcmobile').value=$(this).data('modelcmobile');
			 document.getElementById('modelroute').value=$(this).data('modelroute');
             document.getElementById('modelclanline').value=$(this).data('modelclanline');

             document.getElementById('modelg1name').value=$(this).data('modelg1name');
             document.getElementById('modelg1address').value=$(this).data('modelg1address');
             document.getElementById('modelg1nic').value=$(this).data('modelg1nic');
             document.getElementById('modelg1mobile').value=$(this).data('modelg1mobile');
             document.getElementById('modelg1lanline').value=$(this).data('modelg1lanline');

			 document.getElementById('modelg2name').value=$(this).data('modelg2name');
             document.getElementById('modelg2address').value=$(this).data('modelg2address');
             document.getElementById('modelg2nic').value=$(this).data('modelg2nic');
             document.getElementById('modelg2mobile').value=$(this).data('modelg2mobile');
             document.getElementById('modelg2lanline').value=$(this).data('modelg2lanline');

			 document.getElementById('modelremainbalance').value=$(this).data('modelremainbalance');

     
             });


			//  $('.edit').on('click',function(e){
            //      e.preventDefault();
            //  document.getElementById('modelremain2').value=$(this).data('modelremain');
     
            //  });
      
   
   
	</script>



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
								url : "{{ url('deletecustomer')}}" + '/' + id,
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
			$('#table').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
	  } );
	</script>

	@endsection