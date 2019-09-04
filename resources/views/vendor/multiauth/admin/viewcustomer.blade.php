@extends('multiauth::layouts.header')
@section('content')


<div class="page-wrapper">
	<div class="container">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Manage Customers</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li><a href="#"><span>Customers</span></a></li>
					<li class="active"><span>Manage Customers</span></li>
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
							<h6 class="panel-title txt-dark">Customers List</h6>
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
										<th class="text-center">Mobile</th>
										<th class="text-center">Status</th>
										<th class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody style="text-align: center">
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
										<td>
											<a href="#" id="view_msg" name="view_msg" type="button"
												style="padding: 10px"
												class="view btn btn-primary btn-icon-anim btn-square"
												data-toggle="modal" data-target="#responsive-modal"
												data-modelid="{{$item->id}}" data-modelname="{{$item->name}}"
												data-modeladdress="{{$item->address}}" data-modelnic="{{$item->nic}}"
												data-modelmobile="{{$item->mobile}}"
												data-modellanline="{{$item->lanline}}"><i class="fa fa-eye"></i></a>


												@admin('admin')	
											@if($item->status==1)
											<a href="blockcustomer/{{$item->id}}" type="button" style="padding: 10px"
												class="btn btn-warning btn-icon-anim btn-square"><i
													class="icon-lock"></i></a>
											@elseif($item->status==0)
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
												@endadmin
											<button Onclick="deleteData({{$item->id}})"
												class="btn btn-danger btn-icon-anim btn-square disabled"><i
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


	{{-- View Model --}}

	<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Member Details</h5>
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
									<label class="control-label mb-10">Name</label>
									<input type="text" class="form-control" id="modelname" placeholder="Name" readonly>
								</div>


							</div>
							<br>
							<label for="recipient-name" class="control-label mb-10">Address</label>
							<input type="text" class="form-control" id="modeladdress" placeholder="Address" readonly>
							<br>
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label mb-10">NIC</label>
									<input type="text" class="form-control" id="modelnic" placeholder="NIC" readonly>
								</div>

							</div>
							<br>

							<div class="row">
								<div class="col-sm-6">
									<label class="control-label mb-10">Mobile</label>
									<input type="text" class="form-control" id="modelmobile" placeholder="Mobile"
										readonly>
								</div>

								<div class="col-sm-6">
									<label class="control-label mb-10">Lan Line</label>
									<input type="text" class="form-control" id="modellanline" placeholder="Lan Line"
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


	{{-- Update Model --}}


	<div id="editmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
		style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Member Details</h5>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{action('CustomerController@editcustomers')}}"
						enctype="multipart/form-data">
						@csrf
						<div class="form-group">

							<div class="row">
								<div class="col-sm-3">
									<label class="control-label mb-10">ID</label>
									<input type="text" class="form-control" id="modelidedit" name="modelid"
										placeholder="ID" readonly>
								</div>
								<div class="col-sm-9">
									<label class="control-label mb-10">Name</label>
									<input type="text" class="form-control" id="modelnameedit" name="modelname"
										placeholder="Name">
								</div>


							</div>
							<br>
							<label for="recipient-name" class="control-label mb-10">Address</label>
							<input type="text" class="form-control" id="modeladdressedit" name="modeladdress"
								placeholder="Address">
							<br>
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label mb-10">NIC</label>
									<input type="text" class="form-control" id="modelnicedit" name="modelnic"
										placeholder="NIC" readonly>
								</div>

							</div>
							<br>

							<div class="row">
								<div class="col-sm-6">
									<label class="control-label mb-10">Mobile</label>
									<input type="text" class="form-control" id="modelmobileedit" name="modelmobile"
										placeholder="Mobile">
								</div>

								<div class="col-sm-6">
									<label class="control-label mb-10">Lan Line</label>
									<input type="text" class="form-control" name="modellanline" id="modellanlineedit"
										placeholder="Lan Line">
								</div>

							</div>

						</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-warning">Update Details</button>
				</div>
				</form>
			</div>
		</div>
	</div>




	<script>
		$('.view').on('click',function(e){
                 e.preventDefault();
             document.getElementById('modelid').value=$(this).data('modelid');
             document.getElementById('modelname').value=$(this).data('modelname');
             document.getElementById('modeladdress').value=$(this).data('modeladdress');
             document.getElementById('modelnic').value=$(this).data('modelnic');
             document.getElementById('modelmobile').value=$(this).data('modelmobile');
             document.getElementById('modellanline').value=$(this).data('modellanline');
     
             });

			 $('.edit').on('click',function(e){
                 e.preventDefault();
             document.getElementById('modelidedit').value=$(this).data('modelid');
             document.getElementById('modelnameedit').value=$(this).data('modelname');
             document.getElementById('modeladdressedit').value=$(this).data('modeladdress');
             document.getElementById('modelnicedit').value=$(this).data('modelnic');
             document.getElementById('modelmobileedit').value=$(this).data('modelmobile');
             document.getElementById('modellanlineedit').value=$(this).data('modellanline');
     
             });
      
             $('.edit').click(function(e){
             e.preventDefault();
             var guarantor1_name=document.getElementById('form_guarantor1Name').value=$(this).data('guarantor1_name');
             var guarantor1_nic=document.getElementById('form_guarantor1Nic').value=$(this).data('guarantor1_nic');
             var guarantor1_contact1=document.getElementById('form_guarantor1Contact1').value=$(this).data('guarantor1_contact1');
             var guarantor1_contact2=document.getElementById('form_guarantor1Contact2').value=$(this).data('guarantor1_contact2');
             var guarantor2_name=document.getElementById('form_guarantor2Name').value=$(this).data('guarantor2_name');
             var guarantor2_nic=document.getElementById('form_guarantor2Nic').value=$(this).data('guarantor2_nic');
             var guarantor2_contact1=document.getElementById('form_guarantor2Contact1').value=$(this).data('guarantor2_contact1');
             var guarantor2_contact2=document.getElementById('form_guarantor2Contact2').value=$(this).data('guarantor2_contact2');
             var name=document.getElementById('inputName').value=$(this).data('name');
             var name=document.getElementById('inputNic').value=$(this).data('nic');
             var address=document.getElementById('inputAddress').value=$(this).data('address');
             var contact1=document.getElementById('inputContact1').value=$(this).data('contact1');
             var contact2=document.getElementById('inputContact2').value=$(this).data('contact2');
             var amount=document.getElementById('amount').value=$(this).data('amount');
             var installment=document.getElementById('installment').value=$(this).data('installment');
             var date=document.getElementById('date_purchased').value=$(this).data('date');
             var selection=$(this).data('selection');
     
             // if(selection=='weekly')
             // $("#weekly").prop("checked", true);
     
             // else if(selection=='daily')
             // $("#daily").prop("checked", true);
             
             });
   
   
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