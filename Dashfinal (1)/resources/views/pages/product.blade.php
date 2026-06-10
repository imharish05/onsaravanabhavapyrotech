@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="mb-5 text-end">
                      <button type="button" class="btn btn-primary deleteproductall" >
                       Delete All
                    </button>
                    <a href="{{ url('/product/addview') }}" class="btn btn-primary">
                        Add Product
                    </a> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategoryModal">
                        Add Discount
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addpriceModal">
                       Bulk Upload
                    </button>
                </div>


                {{-- {{ $dataTable->table() }} --}}

                    @php
                     $discounts = App\Models\Discount::orderBy('created_at', 'desc')->take(2)->get();
                     $currentDiscount = $discounts->first() ? $discounts->first()->discount : 0;
                     $previousDiscount = $discounts->count() > 1 ? $discounts->last()->discount : 0;
                @endphp
             <div class="container overflow-hidden">
                    <h2 class="mb-4">Products 
                        {{-- <span style="margin-left:50px; font-size: 1.2rem; color: #6c757d;">Previous Discount: {{ $previousDiscount }} %</span> --}}
                        <span style="margin-left:50px; color: #d9534f;">Discount: {{ $currentDiscount }} %</span>
                    </h2>

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>image</th>
                                <th>Price</th>
                                <th>Sale Price</th>
                                <th>Content</th>
                                 <th>Stock</th>

                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>

                             <?php $i = 1; ?>
                            @foreach ($product as $pro )
                              <tr>
                                <td>{{ $i++ }}</td>
                                 <td>{{ $pro->category_name }}</td>
                                 <td>{{ $pro->product_name }}</td>

                               <td><img src="/{{ $pro->product_image }}" style="width: 50px"></td>
                               <td>{{ $pro->product_mrp_price }}</td>
                               <td>{{ $pro->product_regular_price }}</td>
                               <td>{{ $pro->product_content }}</td>
                                @php
                                        if ($pro->product_stock == 0) {
                                            echo '<td><span class="badge bg-success">In Stock</span></td>';
                                        } else {
                                            echo '<td><span class="badge bg-danger">Out of Stock</span></td>';
                                        }
                                    @endphp



                                <td>
                                    <button type="button" class="btn btn-success waves-effect waves-light editproduct" data-bs-toggle="modal" data-bs-target="#editproductBackdrop1" data-id="{{ $pro->id }}" data-name="{{ $pro->product_name }}" data-catid="{{ $pro->category_id }}" data-image="{{ $pro->product_image }}" data-qty="{{ $pro->product_quantity }}" data-mrp="{{ $pro->product_mrp_price }}" data-regular="{{ $pro->product_regular_price }}" data-dis="{{ $pro->product_desc }}" data-content="{{ $pro->product_content }}" data-video="{{ $pro->product_video }}">
                                        <i class="bx bx-link-external font-size-16 align-middle me-2"></i></button>
                                          <button type="button" class="btn btn-warning waves-effect waves-light deleteimage"
                                            data-bs-toggle="modal" data-bs-target="#editimageBackdrop1"
                                            data-id="{{ $pro->id }}">
                                            <i class="fas fa-image"></i></button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light deleteproduct"  data-id="{{ $pro->id }}">
                                       <i class="fas fa-archive"></i></button>
                                        <button type="button" class="btn btn-info waves-effect waves-light deletestock"
                                            data-bs-toggle="modal" data-bs-target="#editstockBackdrop1"
                                            data-id="{{ $pro->id }}">
                                            <i class="fas fa-eye"></i></button>
                                   </td>


                            </tr>
                            @endforeach






                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addcategoryModal" tabindex="-1" aria-labelledby="addcategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addcategoryModalLabel">Add Discount</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="discount_add_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Price Discount</label>
                            <input type="number" class="form-control"  name="discount"
                                placeholder="Enter Price Discount" required>
                        </div>



                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
     <div class="modal fade" id="editstockBackdrop1" tabindex="-1" aria-labelledby="editstockBackdrop1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editstockBackdrop1Label">Edit Stock</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <form action="" id="deletestock">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Update Stock</label>
                            <select class="form-select" name="product_stock" >
                                <option>Select Stock</option>
                                <option value="0">In Stock</option>
                                <option value="1">Out of Stock</option>
                            </select>
                            <input type="hidden" class="form-control" id="stock_id" name="product_id"
                                placeholder="product_id" maxlength="50" required>

                        </div>



                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="addpriceModal" tabindex="-1" aria-labelledby="addpriceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addpriceModalLabel">Bulk Upload</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="bulk_upload" >
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Upload file CVS</label>
                           <input type="file" class="form-control" name="file" accept=".csv" required>

                        </div>
                        
                         <a href="{{ route('product.export') }}" download  class="btn btn-primary">Download Current Data</a>



                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit product --}}
    <div class="modal fade" id="editproductBackdrop1" tabindex="-1" aria-labelledby="editproductBackdrop1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editproductBackdrop1Label">Edit Products</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="editproduct" >

                        <div class="row">
                            <div class="col-lg-6">
                                  <div class="mb-3">
                                    <label class="form-label" for="add_category_select">Choose Category*</label>
                                    <select class="form-select" name="category_id" id="add_category_select" required>
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Product Name*</label>
                                    <input type="text" class="form-control" id="add_product_name" name="product_name"
                                        placeholder="Product name" maxlength="50" required>
                                        <input type="hidden" class="form-control" id="product_id" name="product_id"
                                        placeholder="product_id" maxlength="50" required>
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_description">Product alt Title</label>
                                    <input type="text" class="form-control" id="add_product_description"
                                        name="product_desc" placeholder="Product Alt Title"
                                        maxlength="100" >


                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_image">Product Image* <small class="text-danger">(670 x 800 px)</small></label>

                                    <input type="file" class="form-control needsclick" id="add_product_image"
                                        placeholder="Product Image" accept="image/*" name="product_image" >
                                </div>
                                 <img src="" style="width: 50px" id="proimage">
                            </div>
                                     <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="edit_sale_price">Sale Price*</label>
                                    <input type="number" class="form-control" id="edit_sale_price" name="product_regular_price"
                                        placeholder="Enter Sale Price" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="edit_discount_percentage">Discount Percentage (%)*</label>
                                    <input type="number" class="form-control" id="edit_discount_percentage"
                                        placeholder="Enter Percentage (e.g., 90)" required>
                                </div>
                            </div>
                                     <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="edit_mrp_price">MRP Price (Auto-calculated)*</label>
                                    <input type="text" class="form-control" id="edit_mrp_price" name="product_mrp_price"
                                        placeholder="MRP Price" maxlength="200" readonly required>
                                </div>
                            </div>
                            <!--  <div class="col-md-3">-->
                            <!--    <div class="mb-3">-->
                            <!--        <label class="form-label" for="add_material_name">Video link</label>-->
                            <!--        <input type="text" class="form-control" id="add_Video" name="product_video"-->
                            <!--            placeholder="Video Link" maxlength="200" >-->
                            <!--    </div>-->
                            <!--</div>-->

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="add_material_color">Content*</label>
                                    <input type="text" class="form-control" id="add_product_type" name="product_content"
                                        placeholder="Product Type" maxlength="200" required>
                                </div>
                            </div>

                            <!--<div class="col-md-3">-->
                            <!--    <div class="mb-3">-->
                            <!--        <label class="form-label" for="add_material_color">Qty</label>-->
                            <!--        <input type="text" class="form-control" id="add_product_qty" name="product_quantity"-->
                            <!--            placeholder="Product Qty" maxlength="200" >-->
                            <!--    </div>-->
                            <!--</div>-->


                        </div>




                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    {{-- delete image --}}
    <div class="modal fade" id="editimageBackdrop1" tabindex="-1" aria-labelledby="editimageBackdrop1Label"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editimageBackdrop1Label">Delete and image Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="deleteimage">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_image">Add Product Image*(750 *
                                        600)</label>

                                    <input type="file" class="form-control needsclick" id="add_product_image"
                                        placeholder="Product Image" accept="image/*" name="product_image" >
                                </div>

                                <input type="hidden" class="form-control" id="delte_id" name="product_id"
                                    placeholder="product_id">

                                <input type="checkbox" class="custom-control-input"
                                    name="delete_id" value="1" > <span>Delete Image</span>
                            </div>
                            <div class="text-end gap-4">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


 @section('scripts')
    <script>
        $(document).on('click', '.editproduct', function(){
            $('#add_product_name').val($(this).attr('data-name'));
            $('#product_id').val($(this).attr('data-id'));
             const imagePath = $(this).attr("data-image");
              $("#proimage").attr("src", `/${imagePath}`);
                $('#add_product_description').val($(this).attr('data-dis'));
                
                let mrp = parseFloat($(this).attr('data-mrp')) || 0;
                let regular = parseFloat($(this).attr('data-regular')) || 0;
                
                $('#edit_mrp_price').val(mrp);
                $('#edit_sale_price').val(regular);
                
                // Calculate percentage based on current values if possible
                if (mrp > 0 && regular > 0 && mrp > regular) {
                    let perc = 100 * (1 - (regular / mrp));
                    $('#edit_discount_percentage').val(perc.toFixed(0));
                } else {
                    $('#edit_discount_percentage').val(0);
                }

                    $('#add_Video').val($(this).attr('data-video'));
                      $('#add_product_type').val($(this).attr('data-content'));
                        $('#add_product_qty').val($(this).attr('data-qty'));

                         const catId = $(this).attr("data-catid");
                          $("#add_category_select")
            .find(`option[value="${catId}"]`)
            .prop("selected", true);

        });

        // Add auto-calculation for edit modal
        function calculateEditMRP() {
            let salePrice = parseFloat($('#edit_sale_price').val()) || 0;
            let discountPercent = parseFloat($('#edit_discount_percentage').val()) || 0;

            if (discountPercent >= 100) {
                $('#edit_mrp_price').val('Invalid Discount');
                return;
            }

            if (salePrice > 0 && discountPercent > 0) {
                let mrpValue = salePrice / (1 - (discountPercent / 100));
                $('#edit_mrp_price').val(mrpValue.toFixed(2));
            } else if (salePrice > 0 && discountPercent === 0) {
                $('#edit_mrp_price').val(salePrice.toFixed(2));
            } else {
                $('#edit_mrp_price').val('');
            }
        }

        $(document).on('input', '#edit_sale_price, #edit_discount_percentage', function() {
            calculateEditMRP();
        });


        </script>
         <script>
        $(document).on('click', '.deleteimage', function(){


             $('#delte_id').val($(this).attr('data-id'));
        })
    </script>
     <script>
        $(document).on('click', '.deletestock', function() {

            $('#stock_id').val($(this).attr('data-id'));
        });
    </script>
@endsection