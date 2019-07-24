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
										<td>{{$item->roles->name}}</td>
										{{-- <td>{{$item->name}}</td>
										<td>{{$item->email}}</td>
										<td>{{$item->phone}}</td>
										<td>{{$item->nic}}</td> --}}
										<td>
											{{-- @if($item->job==='Admin')
											<span class="label label-primary">{{$row->job}}</span>
											@elseif($row->job==='Captain')
											<span class="label label-danger">{{$row->job}}</span>
											@elseif($row->job==='Volunteer')
											<span class="label label-success">{{$row->job}}</span>
											@elseif($row->job==='Staff')
											<span class="label label-warning">{{$row->job}}</span>
											@else($row->job==='blocked')
											<span class="label label-default">{{$row->job}}</span>
											@endif --}}
										</td>
										<td><button style="padding: 6px 12px" class="btn btn-warning">Update</button>
											<button style="padding: 6px 12px" class="btn btn-danger"
												id="deletebtn">Delete</button>
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

	{{-- <script>
	$('#params').click(function(){
		const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
	});
	</script> --}}


	<script>
		$(document).ready(function() {
	  $('#table').DataTable();
  } );
	</script>

	@endsection