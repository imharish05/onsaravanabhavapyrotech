@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="mb-5 text-end">
                    <button class="btn btn-primary viewproducts" 
                        data-orderid="{{ $orderamount->oeder_id }}" 
                        data-total="{{ $orderamount->total }}" 
                        data-user="{{ $orderamount->user_id }}">
                        Add Product
                    </button>
                </div>
                <div class="container overflow-hidden">
                    <h2 class="mb-4">Orders Slots (Rs.{{ $orderamount->total }}.00)</h2>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                 <th>S.NO</th>
                                <th>Order NO</th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Action</th>


                            </tr>
                        </thead>

 <tbody>

                           <?php $i = 1; ?>
                            @foreach ($ordersolts as $order )
                              <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->qty }}</td>
                                @php
                                    $totalvalue = $order->qty * $order->product_regular_price;
                                @endphp
                                <td>{{ $totalvalue }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning waves-effect waves-light editordersolt me-1"
                                        data-id="{{ $order->id }}"
                                        data-qty="{{ $order->qty }}"
                                        data-productamt="{{ $order->product_regular_price }}"
                                        data-total="{{ $orderamount->total }}"
                                        data-order="{{ $order->order_id }}"
                                        data-name="{{ $order->product_name }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light deleteordersolt"
                                        data-id="{{ $order->id }}"
                                        data-qty="{{ $order->qty }}"
                                        data-productamt="{{ $order->product_regular_price }}"
                                        data-total="{{ $orderamount->total }}"
                                        data-order="{{ $order->order_id }}">
                                        <i class="fas fa-archive"></i>
                                    </button>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Stock</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="add_prod_stock_form">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Product</label>
                            {{-- <select class="form-select" aria-label="Default select example" id="add_stock_prod">
                                <option selected>Choose Product</option>
                                @foreach ($products as $prod)
                                    <option value="{{ $prod->id }}">{{ $prod->product_name }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Available Stock</label>
                            <input class="form-control" type="text" id="add_stock_avail">
                        </div>
                        <div class="mb-3">
                            <label for="formFileDisabled" class="form-label">Sales Stock</label>
                            <input class="form-control" type="text" id="add_stock_sale">
                        </div>

                        <input type="hidden" name="" value="{{ Auth::user()->id }}" id="add_stock_vendor_id">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="add_stock_submit_btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- EDIT MODAL --}}

    <!-- EDIT MODAL -->
<div class="modal fade" id="editOrderSlotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Order Slot</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit_slot_id">
                <input type="hidden" id="edit_slot_orderid">
                <input type="hidden" id="edit_slot_productamt">
                <input type="hidden" id="edit_slot_oldqty">
                <input type="hidden" id="edit_slot_total">

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="edit_slot_name" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="edit_slot_qty" min="1">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price per Unit</label>
                    <input type="text" class="form-control" id="edit_slot_price" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label"> Total</label>
                    <input type="text" class="form-control" id="edit_slot_rowtotal" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="edit_slot_submit_btn">Update</button>
            </div>
        </div>
    </div>
</div>
    <!-- ADD PRODUCTS MODAL -->
    <div class="modal fade" id="checkBackdrop1" tabindex="-1" aria-labelledby="checkBackdrop1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="checkBackdrop1Label">Add Products</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="order_id" id="order_id">
                    <input type="hidden" name="user_id" id="user_id">
                    
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Order Total</label>
                            <input type="text" id="total" class="form-control fw-bold text-primary" readonly style="font-size: 1.2rem; background-color: #f8f9fa;">
                        </div>
                        <div class="col-md-6 text-end pt-4">
                            <button type="button" id="saveProducts" class="btn btn-success btn-lg px-5">
                                <i class="fas fa-save me-2"></i> Save Changes
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="text" id="productSearch" class="form-control" placeholder="Search Product Name...">
                    </div>

                    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                        <table id="productTable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="bg-light sticky-top">
                                <tr>
                                    <th>S.NO</th>
                                    <th>Select</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $j = 1; @endphp
                                @foreach ($product as $pro)
                                    <tr>
                                        <td>{{ $j++ }}</td>
                                        <td>
                                            <input type="checkbox" class="custom-control-input"
                                                id="customCheck{{ $pro->id }}"
                                                name="product_id[]"
                                                value="{{ $pro->id }}">
                                        </td>
                                        <td>{{ $pro->product_name }}</td>
                                        <td>{{ $pro->product_regular_price }}</td>
                                        <td>
                                            <input type="number" name="qty" class="form-control qty-input" min="1" disabled>
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

@endsection
@section('scripts')
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

        // Open edit modal
$(document).on('click', '.editordersolt', function () {
    const id         = $(this).data('id');
    const qty        = $(this).data('qty');
    const productamt = $(this).data('productamt');
    const total      = $(this).data('total');
    const orderid    = $(this).data('order');
    const name       = $(this).data('name');

    $('#edit_slot_id').val(id);
    $('#edit_slot_orderid').val(orderid);
    $('#edit_slot_productamt').val(productamt);
    $('#edit_slot_oldqty').val(qty);
    $('#edit_slot_total').val(total);
    $('#edit_slot_name').val(name);
    $('#edit_slot_qty').val(qty);
    $('#edit_slot_price').val('Rs.' + productamt);
    $('#edit_slot_rowtotal').val('Rs.' + (qty * productamt).toFixed(2));

    $('#editOrderSlotModal').modal('show');
});

// Live update row total preview
$(document).on('input', '#edit_slot_qty', function () {
    const qty        = parseFloat($(this).val()) || 0;
    const productamt = parseFloat($('#edit_slot_productamt').val()) || 0;
    $('#edit_slot_rowtotal').val('Rs.' + (qty * productamt).toFixed(2));
});

// Submit edit
$(document).on('click', '#edit_slot_submit_btn', function () {
    const id         = $('#edit_slot_id').val();
    const orderid    = $('#edit_slot_orderid').val();
    const newQty     = parseFloat($('#edit_slot_qty').val()) || 0;
    const oldQty     = parseFloat($('#edit_slot_oldqty').val()) || 0;
    const productamt = parseFloat($('#edit_slot_productamt').val()) || 0;
    const total      = parseFloat($('#edit_slot_total').val()) || 0;

    if (newQty < 1) {
        alert('Quantity must be at least 1.');
        return;
    }

    const oldRowTotal = oldQty * productamt;
    const newRowTotal = newQty * productamt;
    const newTotal    = total - oldRowTotal + newRowTotal;

    $.ajax({
        url: '/order-slot/update',
        method: 'POST',
        data: {
            _token:   $('meta[name="csrf-token"]').attr('content'),
            id:       id,
            qty:      newQty,
            amt:      productamt,
            oldqty:   oldQty,
            totalamt: total,
            orderid:  orderid,
        },
        success: function (res) {
            if (res.status === 200) {
                $('#editOrderSlotModal').modal('hide');
                location.reload();
            } else {
                alert(res.message || 'Update failed.');
            }
        },
        error: function () {
            alert('Network error. Please try again.');
        }
    });
});
    </script>

    <script>
        $(document).on('click', '.viewproducts', function() {
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
                success: function(response) {
                    response.forEach(function(item) {
                        let checkbox = $('#customCheck' + item.product_id);
                        checkbox.prop('checked', true);
                        let row = checkbox.closest('tr');
                        row.find('.qty-input').val(item.qty).prop('disabled', false);
                        row.prependTo('#productTable tbody');
                    });
                    updateLiveTotal();
                }
            });

            $('#checkBackdrop1').modal('show');
        });

        function updateLiveTotal() {
            let newTotal = 0;
            $('#productTable tbody tr').each(function() {
                let checkbox = $(this).find('input[type="checkbox"]');
                if (checkbox.is(':checked')) {
                    let qty = parseFloat($(this).find('.qty-input').val()) || 0;
                    let price = parseFloat($(this).find('td:nth-child(4)').text()) || 0;
                    newTotal += qty * price;
                }
            });
            $('#total').val(newTotal.toFixed(2));
        }

        $(document).on('change', '#productTable input[type="checkbox"]', function() {
            let qtyInput = $(this).closest('tr').find('input[name="qty"]');
            let isChecked = $(this).is(':checked');
            qtyInput.prop('disabled', !isChecked);
            if (isChecked) {
                if (qtyInput.val() <= 0) qtyInput.val(1);
            } else {
                qtyInput.val('');
            }
            updateLiveTotal();
        });

        $(document).on('input change', '#productTable .qty-input', function() {
            if (!$(this).prop('disabled')) {
                updateLiveTotal();
            }
        });

        $("#productSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#productTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $(document).on('click', '#saveProducts', function(e) {
            e.preventDefault();
            let orderId = $('#order_id').val();
            let userId = $('#user_id').val();
            let total = $('#total').val();
            let products = [];

            $('#productTable tbody tr').each(function() {
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

            $("#preloader").show();

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
                success: function(response) {
                    $("#preloader").hide();
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        alert(response.message || "An error occurred.");
                    }
                },
                error: function() {
                    $("#preloader").hide();
                    alert("Network error. Please try again.");
                }
            });
        });
    </script>
@endsection