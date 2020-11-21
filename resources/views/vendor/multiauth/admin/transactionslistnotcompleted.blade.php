@extends('multiauth::layouts.header')
@section('content')


<div class="page-wrapper">
	<div class="container">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Not Completed Transactions List</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li><a href="index.html">Transactions List</a></li>
					<li class="active"><span>Not Completed</span> </li>
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
							<h6 class="panel-title txt-dark">Not Completed Transactions List</h6>
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
										<th class="text-center">Amount</th>
										<th class="text-center">Installment</th>
										<th class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody style="text-align: center">
									@foreach($data as $item)
									<tr>
										<td>{{$item->id}}</td>
										<td>{{$item->name}}</td>
										<td>{{$item->nic}}V</td>
										<td>
											@if($item->paymenttype==='weekly')
											<span style="padding: 5px 15px" class="label label-danger">Weekly</span>
											@elseif($item->paymenttype==='daily')
											<span style="padding: 5px 15px" class="label label-primary">Daily</span>
											@endif
										</td>
										<td>{{$item->duedate}}</td>
										<td>{{$item->amount}}</td>
										<td>{{$item->installment}}</td>
									 <!-- <td>
											@if($item->status===1)
											<span style="padding: 5px 15px" class="label label-success">Active</span>
											@elseif($item->status===0)
											<span style="padding: 5px 15px" class="label label-warning">Blocked</span>
											@endif
										</td>  -->


										<td>
											<a href="#" id="view_msg" name="view_msg" type="button"
												style="padding: 10px"
												class="view btn btn-warning btn-icon-anim btn-square"
												data-toggle="modal" data-target="#responsive-modal"
												data-modelid="{{$item->id}}" data-modelname="{{$item->name}}"
												data-modelnic="{{$item->nic}}V"
												data-modelcaddress="{{$item->caddress}}"
												data-modelcmobile="{{$item->cmobile}}"
												data-modelcvehiclenumber="{{$item->modelcvehiclenumber}}"
												data-modelroute="{{$item->route}}" 
												></a>



										 <!-- <a href="#" id="edit_msg" name="edit_msg" type="button"
												style="padding: 10px"
												class="edit btn btn-danger btn-icon-anim btn-square" data-toggle="modal"
												data-target="#editmodel" data-modelremain="{{$item->remain}}"><i class="icon-check"></i></a>  -->


											<!-- {{-- <a href="#" id="editx_msg" name="editx_msg" type="button"
												style="padding: 10px" class="btn btn-danger btn-icon-anim btn-square"
												data-toggle="modal" data-target="#editmodel"
												data-modelremainbalance="{{$item->nic}}">
											<i class="icon-check"></i></a> --}} -->



										

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
			

							<div class="row">
								<div class="col-sm-3">
									<label class="control-label mb-10">ID</label>
									<input type="text" class="form-control" id="modelid" placeholder="ID" readonly>
								</div>
								<div class="col-sm-9">
									<label class="control-label mb-10"> Customer Name</label>
									<input type="text" class="form-control" id="modelname" placeholder="Name" readonly>
								</div>


							</div>
							<br>
							<label for="recipient-name" class="control-label mb-10">Address</label>
							<input type="text" class="form-control" id="modelcaddress" placeholder="Address" readonly>
							<br>
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label mb-10">NIC</label>
									<input type="text" class="form-control" id="modelnic" placeholder="NIC" readonly>
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
									<input type="text" class="form-control" id="modelcvehiclenumber" placeholder="Lan Line"
										readonly>
								</div>

							</div>

						</div>
						<br>
						<hr>



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
             document.getElementById('modelcvehiclenumber').value=$(this).data('modelcvehiclenumber');

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