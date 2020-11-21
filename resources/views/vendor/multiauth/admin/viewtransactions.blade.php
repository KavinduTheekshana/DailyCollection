@extends('multiauth::layouts.header')
@section('content')


    <div class="page-wrapper">
        <div class="container">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">{{$customer->name}}</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Dashboard</a></li>
                        <li><a href="index.html">Transactions List</a></li>
                        <li><a href="index.html">Reports</a></li>
                        <li class="active"><span>{{$customer->name}}</span></li>
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
                                <h6 class="panel-title txt-dark">{{$customer->name}} - {{$customer->nic}}V</h6>
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
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Remain</th>
                                        <th class="text-center">Installment</th>
                                        <th class="text-center">Payment</th>
                                    </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                    <form role="form" method="POST" action="{{route('report.payment')}}">
                                        @csrf
										<input type="hidden" name="transaction_id" value="{{$transaction->id}}">
                                        @foreach($data as $day)
                                            <tr>
                                                <td>{{$day->payment_date}}</td>
                                                <input type="hidden" name="date" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}">
                                                <input type="hidden" name="instalment_id" value="{{ $day->id }}">
                                                <td>{{(!empty($day->status==1))?'paid':'not paid'}}</td>
                                                <td>{{$day->remain}}</td>
                                                <td>{{$day->amount}}</td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{ ($day->status == 1)?$day->amount:null }}" required name="amount" {{ (\Carbon\Carbon::parse($day->payment_date) != \Carbon\Carbon::today())?'disabled':null}} {{ (!empty($day->status==1))?'disabled':null}}>
                                                </td>
                                                <td>
                                                    <input type="submit" value="make payement" style="padding: 10px" class="btn btn-success " {{ (\Carbon\Carbon::parse($day->payment_date) != \Carbon\Carbon::today())?'disabled':null}} {{ (!empty($day->status==1))?'disabled':null}}>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </form>
                                    </tbody>
                                </table>


                            </div>
                        </div>
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
