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
                  <div class="row">
                        <div class="col-lg-2">
                             <h2 class="mb-4">Orders</h2>
                    <p style="font-weight: bold;font-size:16px">Total value: {{ round($total) }}.00 </p>
                        </div>
                         <div class="col-lg-10">
        <div class="col-lg-12 col-xl-4">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Order Chart</h4>
                                           
                                            <div id="pie-chart"></div>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">


                   
                        <div class="row mb-3 bg-light p-3 mx-0 rounded-3 align-items-end" style="border: 1px solid #dee2e6;">
                            <div class="col-lg-3">
                                <label class="form-label fw-bold">Order Status</label>
                                <select id="statusFilter" class="form-select">
                                    <option value="">All Status</option>
                                    @foreach ($status as $stat)
                                        <option value="{{ $stat->order_status }}">{{ $stat->order_status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label fw-bold">Order Type</label>
                                <select id="typeFilter" class="form-select">
                                    <option value="">All Types</option>
                                    <option value="online">Online Order</option>
                                    <option value="billing">Billing Order</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label fw-bold">Start Date</label>
                                <input type="date" id="startDateFilter" class="form-control">
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label fw-bold">End Date</label>
                                <input type="date" id="endDateFilter" class="form-control">
                            </div>
                            <div class="col-lg-3 d-flex align-items-end gap-2 mt-3 mt-lg-0">
                                <button id="applyFilter" class="btn btn-primary w-100">Filter</button>
                                <button id="resetFilter" class="btn btn-secondary w-100">Reset</button>
                            </div>
                        </div>



                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Date</th>
                                <th>Order NO</th>
                                <th>Customer Name</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Order Status</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Add Products</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php $i = 1; ?>
                            @foreach ($orderdetails as $order )
                              <tr>
                                <td>{{ $i++ }}</td>
                               <td>{{ $order->created_at->format('d-m-Y') }}</td>
                               <td><a href="/ordersolt/{{ $order->oeder_id }}">{{ $order->oeder_id }}</a></td>
                                <td>{{ $order->name }}<br> {{$order->phone_number}}</td>
                                <td>{{ round($order->total) }}.00</td>

                                <td>
                                    @if(($order->order_source ?? 'online') == 'billing')
                                        <span class="badge bg-soft-info text-info border-info fw-bold" style="font-size: 11px; padding: 4px 8px; border-radius: 6px;">BILLING</span>
                                    @else
                                        <span class="badge bg-soft-primary text-primary border-primary fw-bold" style="font-size: 11px; padding: 4px 8px; border-radius: 6px;">ONLINE</span>
                                    @endif
                                    <span class="d-none">{{ $order->order_source ?? 'online' }}</span>
                                </td>

                                <td>{{ $order->status }}</td>
                                <td> <a type="button" class="btn btn-success waves-effect waves-light addstatusorder" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-id="{{ $order->id }}">
                                        <i class="bx bx-link-external font-size-16 align-middle me-2"></i></a></td>

                                <td>
                                    <!--<button class="btn btn-danger waves-effect waves-light vieworders" data-cname="{{ $order->name }}" data-address="{{ $order->address }}" data-orderid="{{ $order->oeder_id }}" data-total="{{ $order->total }}"data-bs-toggle="modal" data-bs-target="#vieworderdetails">View</button>-->
                                   <a href="/pdf/{{ $order->oeder_id }}/{{ $order->user_id }}" target="_blank" class="btn btn-danger waves-effect waves-light">Print</a>
                                   </td>
                                   
                                    <td><button class="btn btn-danger waves-effect waves-light viewproducts" data-orderid="{{ $order->oeder_id }}" data-total="{{ $order->total }} "data-id="{{ $order->id }}" data-user="{{ $order->user_id }}"data-bs-toggle="modal" data-bs-target="#checkBackdrop1">Add Products</button></td>


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
    
    
     <div class="modal fade" id="checkBackdrop1" tabindex="-1" aria-labelledby="checkBackdrop1Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="checkBackdrop1Label">Add Products</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    <input type="text" name="order_id" id="order_id" value="{{ $order->oeder_id ?? '' }}" readonly>
    <input type="text" name="total" id="total" readonly value="{{ $order->total ?? '' }}">
    <input type="text" name="user_id" id="user_id" readonly value="{{ $order->user_id ?? '' }}">

    <div class="mb-3 mt-3">
        <input type="text" id="productSearch" class="form-control" placeholder="Search Product Name...">
    </div>

    <table id="productTable" class="table table-bordered dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>S.NO</th>
                <th>Select</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Qty</th>
            </tr>
        </thead>

        <tbody>
            @php $i = 1; @endphp
            @foreach ($product as $pro)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        <input type="checkbox" class="custom-control-input"
                               id="customCheck{{ $pro->id }}"
                               name="product_id[]"
                               value="{{ $pro->id }}">
                    </td>
                    <td>{{ $pro->product_name }}</td>
                    <td>{{ $pro->product_regular_price }}</td>
                    <td>
                        <input type="number" name="qty" class="form-control qty-input" min="1" >
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="button" id="saveProducts" class="btn btn-primary">Save Products</button>
</div>
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
                    {{-- <tr>
                        <th class="text-right">Discount Amount : </th>
                        <td class="text-right"><span id="discount">500.00</span></td>
                    </tr> --}}
                    {{-- <tr>
                        <th class="text-right">Shipping Amount : </th>
                        <td class="text-right"><span id="shippingamt"></span></td>
                    </tr> --}}
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

<script>
    var statusCounts = @json($statusCounts);

    var chart = c3.generate({
        bindto: '#pie-chart',
        data: {
            columns: Object.entries(statusCounts), // [['pending', 10], ['dispatch', 5]...]
            type: 'pie',
            onclick: function (d, i) {
                filterTableByStatus(d.id); // pass clicked status
            }
        },
        color: {
            pattern: ['#365d6e', "#eef0f6", '#59ceb5']
        },
        pie: {
            label: { show: false }
        }
    });
</script>

<script>
    $(document).ready(function () {
        var table = $('#datatable-buttons').DataTable();

        // Filter function
        window.filterTableByStatus = function(status) {
            table.column(6).search(status).draw(); // 6 = Order Status column index
        }
    });
</script>

 <script>
               
        $(document).on('click','.viewproducts', function(){

    let orderId = $(this).attr('data-orderid');
    let total = $(this).attr('data-total');
    let user = $(this).attr('data-user');

    $('#order_id').val(orderId);
    $('#total').val(total);
    $('#user_id').val(user);

    // Reset all checkboxes
    $('#productTable tbody input[type="checkbox"]').prop('checked', false);
    $('#productTable tbody .qty-input').val('').prop('disabled', true);

    // Fetch ordered products
    $.ajax({
        url: '/get-order-products/' + orderId,
        method: 'GET',
        success: function(response){

            response.forEach(function(item){

                let checkbox = $('#customCheck'+item.product_id);

                checkbox.prop('checked', true);

                let row = checkbox.closest('tr');

                row.find('.qty-input')
                    .val(item.qty)
                    .prop('disabled', false);

                row.prependTo('#productTable tbody');

            });
            updateLiveTotal();
        }
    });

    // Store base total for recalculation (without current product contribution if we sum from scratch)
    // Actually, simple sum of checked items is better if we assume shipping=0 or we know shipping.
    // For now, let's just make it sum all checked items.
});

// Helper function for live total update
function updateLiveTotal() {
    let newTotal = 0;
    $('#productTable tbody tr').each(function () {
        let checkbox = $(this).find('input[type="checkbox"]');
        if (checkbox.is(':checked')) {
            let qty = parseFloat($(this).find('.qty-input').val()) || 0;
            let price = parseFloat($(this).find('td:nth-child(4)').text()) || 0;
            newTotal += qty * price;
        }
    });
    $('#total').val(newTotal.toFixed(2));
}



        </script>

        <script>
$(document).ready(function () {
    // Enable qty only when checkbox is checked
    $('#productTable').on('change', 'input[type="checkbox"]', function () {
        let qtyInput = $(this).closest('tr').find('input[name="qty"]');
        let isChecked = $(this).is(':checked');
        
        qtyInput.prop('disabled', !isChecked);
        
        if (isChecked) {
            // Default to 1 if checked and currently empty/invalid
            if (qtyInput.val() <= 0) {
                qtyInput.val(1);
            }
        } else {
            qtyInput.val('');
        }
        
        // Trigger live price update
        updateLiveTotal();
    });

    // Handle manual quantity changes
    $('#productTable').on('input change', '.qty-input', function() {
        if (!$(this).prop('disabled')) {
            updateLiveTotal();
        }
    });

    $(document).on('click', '#saveProducts', function (e) {
    e.preventDefault();

    let orderId = $('#order_id').val();
    let userId = $('#user_id').val();
    let total = $('#total').val();

    let products = [];

    $('#productTable tbody tr').each(function () {

        let checkbox = $(this).find('input[type="checkbox"]');

        if (checkbox.is(':checked')) {

            let productId = checkbox.val();
            let qty = $(this).find('input[name="qty"]').val();
            let price = parseFloat($(this).find('td:nth-child(4)').text());
            let product_name = $(this).find('td:nth-child(3)').text();

            if (qty > 0) {
                products.push({
                    product_id: productId,
                    qty: qty,
                    price: price,
                    product_name: product_name,
                });
            }

        }

    });

    if (products.length === 0) {
        alert("Please select at least one product with quantity.");
        return;
    }



        $.ajax({
            url: "/save-product-solt",
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                order_id: orderId,
                user_id: userId,
                total: total,
                products: products
            },
           success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
                    error: function (jqXHR, textStatus, errorThrown) {

                        Swal.fire(
                            textStatus.toUpperCase(),
                            errorThrown,
                            "warning"
                        );
                    },
        });
    });
});
</script>
    <script>
        $(document).ready(function() {
            
           

          

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

        $(document).ready(function () {

    $("#productSearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();

        $("#productTable tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });

    });

});
    </script>

<script>
$(document).ready(function () {

    // Custom date range filter
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var startDate = $('#startDateFilter').val();
        var endDate = $('#endDateFilter').val();
        var rowDate = data[1]; // Date column index (col 1)

        if (!startDate && !endDate) return true;

        // Convert dd-mm-yyyy to Date object
        var parts = rowDate.split('-');
        var date = new Date(parts[2], parts[1] - 1, parts[0]);

        var start = startDate ? new Date(startDate) : null;
        var end = endDate ? new Date(endDate) : null;

        if (start && date < start) return false;
        if (end && date > end) return false;

        return true;
    });

    var table = $('#datatable-buttons').DataTable();

    // Apply filters
    $('#applyFilter').on('click', function () {
        var status = $('#statusFilter').val();
        var type = $('#typeFilter').val();
        
        table.column(6).search(status).draw(); // col 6 = Order Status
        table.column(5).search(type).draw();   // col 5 = Type
    });

    // Reset filters
    $('#resetFilter').on('click', function () {
        $('#statusFilter').val('');
        $('#typeFilter').val('');
        $('#startDateFilter').val('');
        $('#endDateFilter').val('');
        table.column(6).search('').draw();
        table.column(5).search('').draw();
    });

    // Trigger redraw on date change too
    $('#startDateFilter, #endDateFilter').on('change', function () {
        table.draw();
    });

});
</script>
@endsection