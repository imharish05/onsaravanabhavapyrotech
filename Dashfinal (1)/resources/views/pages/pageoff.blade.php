@extends('layout.app')
@section('main_content')

  <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Page Off</h4>

                                    </div>
                                    <div class="card-body">

                                         <table id="" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Image</th>
                                                <th>Status</th>

                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>

                                                 <?php $i=1; ?>

                                                @foreach ($page as $page)
                                                 <tr>
                                                <td>{{ $i++ }}</td>
                                                <td><img src="/{{ $page->image }}" style="width: 50px"></td>
                                                <td>{{ $page->status == 0 ? 'Show' : 'Hide' }}</td>
                                                <td><button type="button" class="btn btn-success waves-effect waves-light editpage" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-id="{{ $page->id }}" data-image="{{ $page->image }}" data-name="{{ $page->status }}">
                                        <i class="bx bx-link-external font-size-16 align-middle me-2"></i></button></td>


                                            </tr>

                                                @endforeach


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Minimum Order Value</h4>

                                    </div>
                                    <div class="card-body">

                                         <table id="" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Amount</th>

                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1; ?>

                                                @foreach ($pdf as $pdf)
                                                        <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$pdf->price_data }}</td>

                                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#priceBackdrop1" data-id="{{ $pdf->id }}" data-price="{{$pdf->price_data }}" class="btn btn-success waves-effect waves-light editprice" >
                                        <i class="bx bx-link-external font-size-16 align-middle me-2"></i></button></td>


                                            </tr>
                                                @endforeach

                                             </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                              <!-- <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Header Content</h4>

                                    </div>
                                    <div class="card-body">

                                         <table id="" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Content</th>
                                                <th>Status</th>

                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1; ?>

                                                @foreach ($headertext as $header)
                                                        <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $header->text  }}</td>
                                                <td>{{ $header->action == 0 ? 'Show' : 'Hide' }}</td>
                                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#headeBackdrop1" data-id="{{ $header->id }}" data-status="{{ $header->action }}" data-text="{{ $header->text  }}" class="btn btn-success waves-effect waves-light editheadertext" >
                                        <i class="bx bx-link-external font-size-16 align-middle me-2"></i></button></td>


                                            </tr>
                                                @endforeach

                                             </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> -->



                             <div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdrop1Label">Page Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" id="pageoff_update_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Page Status</label>


                                <select  class="form-control status" name="statusoff" id="showdata" required>
                            <option>Select option</option>
                             <option value="0">Hide</option>
                              <option value="1">Show</option>

                        </select>

                                   {{-- <input type="hidden" class="form-control" id="categoryId" name="categoryId"
                                placeholder="Enter CategoryId"> --}}
                                <input type="hidden" class="form-control" name="page_id" id="page_id">
                        </div>


                            <div class="mb-3" id="add_category_image">
                                <label class="form-label" for="add_product_image">Image*(370 *
                                    400)</label>

                                <input type="file" class="form-control needsclick"
                                    placeholder="Category Image" accept="image/*" name="page_image" >


                            </div>

                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary pageff">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="priceBackdrop1" tabindex="-1" aria-labelledby="priceBackdrop1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="priceBackdrop1Label">Minimum Order Value </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" id="price_update_form">
                        <div class="mb-3">
                           

                                   {{-- <input type="hidden" class="form-control" id="categoryId" name="categoryId"
                                placeholder="Enter CategoryId"> --}}
                                <input type="hidden" class="form-control" name="price_id" id="price_id">
                        </div>


                            <div class="mb-3" id="add_price_list">
                                <label class="form-label" for="add_product_image">Minimum Order Value</label>

                                <input type="text" class="form-control needsclick" id="price_pdf"
                                    placeholder="Order Price"  name="price_pdf" >


                            </div>

                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary pageff">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


     <div class="modal fade" id="headeBackdrop1" tabindex="-1" aria-labelledby="headeBackdrop1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="headeBackdrop1Label">Header text </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" id="header_update_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Header Text</label>


                                <select  class="form-control status" name="headerstatus" id="showheader" required>
                            <option>Select option</option>
                             <option value="0">Show</option>
                              <option value="1">hide</option>

                        </select>

                                   {{-- <input type="hidden" class="form-control" id="categoryId" name="categoryId"
                                placeholder="Enter CategoryId"> --}}
                                <input type="hidden" class="form-control" name="header_id" id="header_id">
                        </div>


                            <div class="mb-3" id="add_price_list">
                                <label class="form-label" for="add_product_image">header text</label>

                                <textarea id="w3review" class="form-control " name="headertext" rows="4" cols="50" required></textarea>




                            </div>

                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary pageff">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
    $('#showdata').on('change',function(){
         var selectedVal = $(this).val();


          if (selectedVal === "0") {
        $("#add_category_image").hide();
    } else {
        $("#add_category_image").show();
    }
});

   $('#showdataprice').on('change',function(){
         var selectedVal = $(this).val();


          if (selectedVal === "0") {
        $("#add_price_list").show();
    } else {
        $("#add_price_list").hide();
    }
});
$('.editpage').on('click',function(){

$('#page_id').val($(this).attr('data-id'));

});

$('.editprice').on('click',function(){

    $('#price_id').val($(this).attr('data-id'));
    $('#price_pdf').val($(this).attr('data-price'));
});

$('.editheadertext').on('click', function () {

    $('#header_id').val($(this).attr('data-id'));
    $('#w3review').val($(this).attr('data-text'));
    $('#showheader').val($(this).attr('data-status'));
});


})
</script>