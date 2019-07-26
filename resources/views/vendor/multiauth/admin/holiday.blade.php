@extends('multiauth::layouts.header')
@section('content')


<div class="page-wrapper">
	<div class="container">
		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Holidays</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li class="active"><a href="#"><span>Holidays</span></a></li>
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
							<h6 class="panel-title txt-dark">Add Holidays</h6>
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="panel-wrapper collapse in">
						<div class="panel-body">

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
							<div class="alert alert-warning">
								{{ session('status') }}
							</div>
							@endif


							<div class="form-wrap">
								<form role="form" action="{{action('HolidaysController@addholiday')}}" method="POST"
									enctype="multipart/form-data">

									@csrf

									<div class="form-group">
										<div class="row">
											<div class="col-sm-3">
												<label class="control-label mb-10">Date</label>
												<input type="date" name="date" class="form-control">
											</div>
											<div class="col-sm-7">
												<label class="control-label mb-10">Description</label>
												<input type="text" name="description" class="form-control"
													placeholder="Vesak Poya day">
											</div>
											<div class="col-sm-2">
												<label class="control-label mb-10">Type</label>
												<select name="type" class="form-control">
													<option>Public</option>
													<option>Bank</option>
													<option>Mercantile</option>
													<option>Poya Day</option>
												</select>
											</div>
										</div>

										<div>
											<br>
											<button type="submit" class="btn btn-success btn-anim"><i
													class="icon-rocket"></i><span
													class="btn-text">submit</span></button>


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
							<h6 class="panel-title txt-dark">Route List</h6>
						</div>
						<div class="clearfix"></div>
					</div>



					<div class="panel-wrapper collapse in">
						<div class="panel-body">



							<table class="table" id="table">
								<thead>
									<tr>
										<th class="text-center">ID</th>
										<th class="text-center">Date</th>
										<th class="text-center">Description</th>
										<th class="text-center">Type</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody style="text-align: center">
									@foreach($data as $item)
									<tr class="item{{$item->id}}">
										<td>{{$item->id}}</td>
										<td>{{$item->date}}</td>
										<td>{{$item->description}}</td>
										<td>@if($item->type==='Poya Day')
												<span class="label label-warning">{{$item->type}}</span>
											  @elseif($item->type==='Bank')
											  <span class="label label-success">{{$item->type}}</span>
											  @elseif($item->type==='Mercantile')
											  <span class="label label-danger">{{$item->type}}</span>
											  @elseif($item->type==='Public')
											  <span class="label label-info">{{$item->type}}</span>
											  @endif</td>
										<td>
											<button style="padding: 6px 12px" class="btn btn-danger"
												Onclick="deleteData({{$item->id}})">Delete</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- /Row -->
		</div>
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
                        url : "{{ url('deleteholidaty')}}" + '/' + id,
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




           


// 	function newjsfunction(id){
// swal({
// 		title: "Are you sure?",
// 		text: "You will not be able to recover this imaginary file!",
// 		type: "warning",
// 		showCancelButton: true,
// 		confirmButtonColor: "#DD6B55",
// 		confirmButtonText: "Yes, delete it!",
// 		cancelButtonText: "No, cancel",
// 		closeOnConfirm: false,
// 		closeOnCancel: false
// 	},
// 	function(isConfirm) {
// 		if (isConfirm) {
// 			$.ajax({
// 				url:"{{url('deleteroute')}}"+'/'+id,
// 				type:"GET"
// 			});
// 			swal("Deleted!", "Your imaginary file has been deleted.", "success");
// 		} else {
// 			swal("Cancelled", "Your imaginary file is safe 🙂", "error");
// 		}
// 	});
// }
	</script>


	<script>
		$(document).ready(function() {
			$('#table').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
  } );
	</script>

	@endsection