@extends('multiauth::layouts.header')
@section('content')


    <div class="page-wrapper">
        <div class="container">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Daily Reports</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Dashboard</a></li>
                        <li class="active"><span>Daily Reports</span></li>
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
                            <form action="{{url(route('admin.dailyreports'))}}">
                            <div class="pull-left">


                                <div class="form-group mr-35">
                                    <h6 class="panel-title txt-dark">Genarate Reports</h6>
                                </div>

                                <div class="input-group form-group mr-55">
                                    {{-- <input type="text" id="example-input2-group2" name="example-input2-group2" class="form-control" placeholder="Route"> --}}

                                        <select class="form-control select2" name="route">
                                            <option value="all">All </option>
                                            @foreach ($route as $item)

                                                <option value="{{$item->route}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$item->route}}
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </option>

                                            @endforeach

                                        </select>
                                        <span class="input-group-btn">
															<button type="submit" class="btn btn-success "><span
                                                                        class="btn-text">submit</span></button>
															</span>

                                </div>


                                {{-- <div class="row pl-15 pr-15">
                                <h6 class="panel-title txt-dark">Genarate Reports</h6>
                                <div class="input-group mb-15">
                                    <input type="email" id="example-input2-group2" name="example-input2-group2" class="form-control" placeholder="Email">
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                                    </span>
                                </div>
                                </div> --}}
                            </div>

                            <button type="submit" name="pdf" value="pdf" class="btn btn-warning  pull-right"><span
                                        class="btn-text">Download Report</span>
                            </button>
                            </form>


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
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Installment</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                    @foreach($transactions as $r)

                                        <tr>
                                            {{-- <td><a href="viewtransactions/{{$r->transaction->id}}">click here to pay</a>
                                            </td> --}}
                                            <td>{{$r->transaction->id}}
                                            </td>
                                            <td>{{ $r->transaction->customerData->name}}</td>
                                            <td>{{ $r->transaction->customerData->address}}</td>
                                            <td>{{ $r->transaction->customerData->mobile}}</td>
                                            <td>{{ $r->transaction->installment}}</td>


                                            @admin('admin')
                                            <form role="form" method="POST" action="{{route('report.payment')}}">
                                                @csrf
                                                <td>
                                                    <input type="text" class="form-control"
                                                           value="{{ ( $r->status == 1)? $r->amount:null }}" required
                                                           name="amount" {{ (\Carbon\Carbon::parse( $r->payment_date) != \Carbon\Carbon::today())?'disabled':null}} {{ (!empty( $r->status==1))?'disabled':null}}>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="date"
                                                           value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}">
                                                    <input type="hidden" name="instalment_id" value="{{$r->id}}">
                                                    <input type="hidden" name="transaction_id"
                                                           value="{{$r->transaction->id}}">
                                                    <input type="submit" value="make payement" style="padding: 10px"
                                                           class="btn btn-success " {{ (\Carbon\Carbon::parse( $r->payment_date) != \Carbon\Carbon::today())?'disabled':null}} {{ (!empty( $r->status==1))?'disabled':null}}>
                                                </td>
                                            </form>
                                            @endadmin
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
                                        <input type="text" class="form-control" id="modelcname" placeholder="Name"
                                               readonly>
                                    </div>


                                </div>
                                <br>
                                <label for="recipient-name" class="control-label mb-10">Address</label>
                                <input type="text" class="form-control" id="modelcaddress" placeholder="Address"
                                       readonly>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label mb-10">NIC</label>
                                        <input type="text" class="form-control" id="modelcnic" placeholder="NIC"
                                               readonly>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="control-label mb-10">Route</label>
                                        <input type="text" class="form-control" id="modelroute" placeholder="NIC"
                                               readonly>
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
                                        <input type="text" class="form-control" id="modelclanline"
                                               placeholder="Lan Line"
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
                                        <input type="text" class="form-control" id="modelg1nic" placeholder="NIC"
                                               readonly>
                                    </div>


                                </div>
                                <br>
                                <label for="recipient-name" class="control-label mb-10">Address</label>
                                <input type="text" class="form-control" id="modelg1address" placeholder="Address"
                                       readonly>
                                <br>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label mb-10">Mobile</label>
                                        <input type="text" class="form-control" id="modelg1mobile" placeholder="Mobile"
                                               readonly>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="control-label mb-10">Lan Line</label>
                                        <input type="text" class="form-control" id="modelg1lanline"
                                               placeholder="Lan Line"
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
                                        <input type="text" class="form-control" id="modelg2nic" placeholder="NIC"
                                               readonly>
                                    </div>


                                </div>
                                <br>
                                <label for="recipient-name" class="control-label mb-10">Address</label>
                                <input type="text" class="form-control" id="modelg2address" placeholder="Address"
                                       readonly>
                                <br>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label mb-10">Mobile</label>
                                        <input type="text" class="form-control" id="modelg2mobile" placeholder="Mobile"
                                               readonly>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="control-label mb-10">Lan Line</label>
                                        <input type="text" class="form-control" id="modelg2lanline"
                                               placeholder="Lan Line"
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
            $('.view').on('click', function (e) {
                e.preventDefault();
                document.getElementById('modelid').value = $(this).data('modelid');
                document.getElementById('modelcname').value = $(this).data('modelcname');
                document.getElementById('modelcaddress').value = $(this).data('modelcaddress');
                document.getElementById('modelcnic').value = $(this).data('modelcnic');
                document.getElementById('modelcmobile').value = $(this).data('modelcmobile');
                document.getElementById('modelroute').value = $(this).data('modelroute');
                document.getElementById('modelclanline').value = $(this).data('modelclanline');

                document.getElementById('modelg1name').value = $(this).data('modelg1name');
                document.getElementById('modelg1address').value = $(this).data('modelg1address');
                document.getElementById('modelg1nic').value = $(this).data('modelg1nic');
                document.getElementById('modelg1mobile').value = $(this).data('modelg1mobile');
                document.getElementById('modelg1lanline').value = $(this).data('modelg1lanline');

                document.getElementById('modelg2name').value = $(this).data('modelg2name');
                document.getElementById('modelg2address').value = $(this).data('modelg2address');
                document.getElementById('modelg2nic').value = $(this).data('modelg2nic');
                document.getElementById('modelg2mobile').value = $(this).data('modelg2mobile');
                document.getElementById('modelg2lanline').value = $(this).data('modelg2lanline');

                document.getElementById('modelremainbalance').value = $(this).data('modelremainbalance');


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

            function deleteData(id) {
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
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: "{{ url('deletecustomer')}}" + '/' + id,
                                type: "GET",
                                success: function () {
                                    swal({
                                            title: "Success!",
                                            text: "Post has been deleted \n Click OK to refresh the page",
                                            type: "success",
                                        },
                                        function (isConfirm) {
                                            location.reload();
                                        });
                                },
                                error: function () {
                                    swal({
                                        title: 'Opps...',
                                        text: 'data.message',
                                        type: 'error',
                                        timer: '1500'
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
            $(document).ready(function () {
                $('#table').DataTable({
                    "order": [[0, "desc"]]
                });
            });
        </script>

@endsection
