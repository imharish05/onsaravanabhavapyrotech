@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                {{-- <div class="mb-5 text-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        Add Product Stock
                    </button>
                </div> --}}
                <div class="container overflow-hidden">
                    <h2 class="mb-4">Today Orders</h2>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Order NO</th>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Amount</th>
                                <!--<th>Delivery Address</th>-->
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>

                            <?php $i = 1; ?>
                            @foreach ($orderdetails as $order )
                              <tr>
                                <td>{{ $i++ }}</td>
                               <td><a href="/ordersolt/{{ $order->oeder_id }}">{{ $order->oeder_id }}</a></td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td>{{ $order->total }}</td>
                                <!--<td>{{ $order->address }}</td>-->
                                <td>{{ $order->status }}</td>

                                <td>
                                    <!--<button class="btn btn-danger waves-effect waves-light vieworders" data-cname="{{ $order->name }}" data-address="{{ $order->address }}" data-orderid="{{ $order->oeder_id }}" data-bs-toggle="modal" data-bs-target="#vieworderdetails">View</button>-->
                                    <a href="/pdf/{{ $order->oeder_id }}/{{ $order->user_id }}" class="btn btn-danger waves-effect waves-light">Print</a> <button type="button" class="btn btn-success waves-effect waves-light addstatus" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-id="{{ $order->id }}">
                                        <i class="bx bx-link-external font-size-16 align-middle me-2"></i>
                                   </td>


                            </tr>
                            @endforeach






                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD MODAL --}}
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="updatestatus">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" id="add_stock_prod" name="status">
                                <option selected>Choose Order Status</option>
                                @foreach ($status as $stat)
                                    <option value="{{ $stat->order_status }}">{{ $stat->order_status }}</option>
                                @endforeach
                            </select>
                        </div>



                        <input type="hidden" name="id"  id="add_status_id">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="add_stock_submit_btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- EDIT MODAL --}}

    {{-- view --}}
    <div class="modal fade" id="vieworderdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalDanger1"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-danger">
            <h6 class="modal-title m-0 text-white" id="exampleModalDanger1">Order Details</h6>
            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="la la-times text-white"></i></span>
            </button>
        </div><!--end modal-header-->
        <div class="modal-body">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Order Number</th>
                        <td ><span id="oid"></span></td>
                        <th>Customer Name</th>
                        <td><span id="cname"></span></td>
                    </tr>
                    <tr>
                        <th>Customer Number</th>
                        <td><span id="mblnum"></span></td>
                        <th>Address</th>
                        <td><span id="address"></span></td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Rate</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="orderdetailstable">

                    </tbody>

                </table>
                <table class="table table-bordered">
                    <tr>
                        <th class="text-right">Discount Amount : </th>
                        <td class="text-right"><span id="discount">500.00</span></td>
                    </tr>
                    <tr>
                        <th class="text-right">Shipping Amount : </th>
                        <td class="text-right"><span id="shippingamt"></span></td>
                    </tr>
                    <tr>
                        <th class="text-right">Total : </th>
                        <td class="text-right"><span id="totalamt"></span></td>
                    </tr>
                </table>
            </div><!--end row-->
        </div><!--end modal-body-->
    </div><!--end modal-content-->
</div><!--end modal-dialog-->
</div>

@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            
           

            $('.addstatus').on('click', function(){
                
              
                $("#add_status_id").val($(this).attr("data-id"));
            });

            var table = $("#projectsTable").DataTable({
                 pageLength: 10,
                dom: "Bfrtip",
                buttons: [{
                        extend: "excelHtml5",
                        text: "Excel",
                        action: function(e, dt, button, config) {
                            var self = this;
                            var originalLength = dt.page.len();
                            $("#preloader").show();
                            dt.one("preXhr", function(e, s, data) {
                                data.length = -1; // Fetch all data
                            }).one("draw", function(e, settings, json) {
                                $.fn.dataTable.ext.buttons.excelHtml5.action.call(
                                    self,
                                    e,
                                    dt,
                                    button,
                                    $.extend(true, {}, config, {
                                        exportOptions: {
                                            columns: ":visible,:hidden", // Include all columns
                                        },
                                    })
                                );
                                dt.one("preXhr", function(e, s, data) {
                                    settings._iDisplayLength =
                                        originalLength; // Restore original length
                                    data.length = originalLength;
                                });
                                dt.ajax.reload();
                                $("#preloader").hide();
                            });
                            dt.ajax.reload();
                        },
                    },
                    {
                        extend: "csvHtml5",
                        text: "CSV",
                        action: function(e, dt, button, config) {
                            var self = this;
                            var originalLength = dt.page.len();
                            $("#preloader").show();
                            dt.one("preXhr", function(e, s, data) {
                                data.length = -1; // Fetch all data
                            }).one("draw", function(e, settings, json) {
                                $.fn.dataTable.ext.buttons.csvHtml5.action.call(
                                    self,
                                    e,
                                    dt,
                                    button,
                                    $.extend(true, {}, config, {
                                        exportOptions: {
                                            columns: ":visible,:hidden", // Include all columns
                                        },
                                    })
                                );
                                dt.one("preXhr", function(e, s, data) {
                                    settings._iDisplayLength =
                                        originalLength; // Restore original length
                                    data.length = originalLength;
                                });
                                dt.ajax.reload();
                                $("#preloader").hide();
                            });
                            dt.ajax.reload();
                        },
                    },
                    {
                        extend: "pdfHtml5",
                        text: "PDF",
                        action: function(e, dt, button, config) {
                            var self = this;
                            var originalLength = dt.page.len();
                            $("#preloader").show();
                            dt.one("preXhr", function(e, s, data) {
                                data.length = -1; // Fetch all data
                            }).one("draw", function(e, settings, json) {
                                $.fn.dataTable.ext.buttons.pdfHtml5.action.call(
                                    self,
                                    e,
                                    dt,
                                    button,
                                    $.extend(true, {}, config, {
                                        exportOptions: {
                                            columns: ":visible,:hidden", // Include all columns
                                        },
                                    })
                                );
                                dt.one("preXhr", function(e, s, data) {
                                    settings._iDisplayLength =
                                        originalLength; // Restore original length
                                    data.length = originalLength;
                                });
                                dt.ajax.reload();
                                $("#preloader").hide();
                            });
                            dt.ajax.reload();
                        },
                    },
                    {
                        extend: "print",
                        text: "Print",
                        action: function(e, dt, button, config) {
                            var self = this;
                            var originalLength = dt.page.len();
                            $("#preloader").show();
                            dt.one("preXhr", function(e, s, data) {
                                data.length = -1; // Fetch all data
                            }).one("draw", function(e, settings, json) {
                                $.fn.dataTable.ext.buttons.print.action.call(
                                    self,
                                    e,
                                    dt,
                                    button,
                                    $.extend(true, {}, config, {
                                        exportOptions: {
                                            columns: ":visible,:hidden", // Include all columns
                                        },
                                    })
                                );
                                dt.one("preXhr", function(e, s, data) {
                                    settings._iDisplayLength =
                                        originalLength; // Restore original length
                                    data.length = originalLength;
                                });
                                dt.ajax.reload();
                                $("#preloader").hide();
                            });
                            dt.ajax.reload();
                        },
                    },
                    "colvis",
                ],
            });

            $(".Allleads-btn").click(function() {
                table.ajax.reload();
            });
        });
    </script>
@endsection