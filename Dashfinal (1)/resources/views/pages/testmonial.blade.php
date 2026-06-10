@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="mb-5 text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategoryModal">
                        Add TestiMonials
                    </button>
                </div>
                {{-- {{ $dataTable->table() }} --}}
               <div class="container overflow-hidden">
                    <h2 class="mb-4">TestiMonials</h2>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>
                                <!--<th>Content</th>-->
                                <th>image</th>

                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>

                             <?php $i = 1; ?>
                            @foreach ($testimonial as $cat )
                              <tr>
                                <td>{{ $i++ }}</td>
                                 <td>{{ $cat->name }}</td>
                                 <!--<td>{{ $cat->content }}</td>-->
                               <td><img src="/{{ $cat->image }}" style="width: 50px"></td>



                                <td><button type="button" class="btn btn-success waves-effect waves-light editcatgory" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-id="{{ $cat->id }}" data-image="{{ $cat->image }}" data-name="{{ $cat->name }}" data-content="{{ $cat->content }}">
                                        <i class="bx bx-link-external font-size-16 align-middle me-2"></i></button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light deletetest"  data-id="{{ $cat->id }}">
                                       <i class="fas fa-archive"></i></button>
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
                    <h1 class="modal-title fs-5" id="addcategoryModalLabel">Add Testimonials</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="test_add_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Name</label>
                            <input type="text" class="form-control" id="category_add_input" name="test_name"
                                placeholder="Enter  Name" required>
                        </div>


                            <div class="mb-3">
                                <label class="form-label" for="add_product_image">Image* <small class="text-danger">(300 x 300 px)</small></label>

                                <input type="file" class="form-control needsclick" id="add_category_image"
                                    placeholder="Category Image" accept="image/*" name="test_name_image" >
                            </div>

                              <div class="mb-3" id="add_price_list">
                                <label class="form-label" for="add_product_image"> Content</label>

                                <textarea id="w3review" class="form-control " name="test_content" rows="4" cols="50" maxlength="250" required></textarea>




                            </div>

                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


     <div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdrop1Label">Edit Testimonials</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" id="test_update_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Name</label>
                            <input type="text" class="form-control" id="testname" name="test_name"
                                placeholder="Enter  Name" required>

                                   <input type="hidden" class="form-control" id="testId" name="testId"
                                placeholder="Enter CategoryId">
                        </div>


                            <div class="mb-3">
                                <label class="form-label" for="add_product_image">Image* <small class="text-danger">(300 x 300 px)</small></label>

                                <input type="file" class="form-control needsclick" id="add_category_image"
                                    placeholder="Category Image" accept="image/*" name="test_image">

                                <img src="" style="width: 50px" id="catimage">
                            </div>

                              <div class="mb-3" id="add_price_list">
                                <label class="form-label" for="add_product_image"> Content</label>

                                <textarea id="w3reviews" class="form-control " name="test_content" rows="4" cols="50" maxlength="250" required></textarea>




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
        $('.editcatgory').on('click', function(){

            $('#testId').val($(this).attr('data-id'));
            $('#testname').val($(this).attr('data-name'));
            $('#w3reviews').val($(this).attr('data-content'));


             const imagePath = $(this).attr("data-image");
              $("#catimage").attr("src", `/${imagePath}`);

        });


        </script>
@endsection