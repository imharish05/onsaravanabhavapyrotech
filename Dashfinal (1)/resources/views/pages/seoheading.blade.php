@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="mb-5 text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategoryModal">
                        Add SEO Heading
                    </button>
                </div>
                {{-- {{ $dataTable->table() }} --}}
               <div class="container overflow-hidden">
                    <h2 class="mb-4">SEO</h2>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>

                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>

                             <?php $i = 1; ?>
                            @foreach ($seo as $cat )
                              <tr>
                                <td>{{ $i++ }}</td>
                                 <td>{{ $cat->heading }}</td>




                                <td><button type="button" class="btn btn-success waves-effect waves-light editheading" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-id="{{ $cat->id }}"  data-name="{{ $cat->heading }}">
                                        <i class="bx bx-link-external font-size-16 align-middle me-2"></i></button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light deleteseoheading"  data-id="{{ $cat->id }}">
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
                    <h1 class="modal-title fs-5" id="addcategoryModalLabel">Add Heading</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="sectionheading_add_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Heading Name</label>
                            <input type="text" class="form-control" id="category_add_input" name="heading_name"
                                placeholder="Enter Heading Name" required>
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
                    <h1 class="modal-title fs-5" id="staticBackdrop1Label">Edit Heading</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" id="sectionheading_update_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Heading Name</label>
                            <input type="text" class="form-control" id="headingname" name="heading_name"
                                placeholder="Enter Heading Name" required>

                                   <input type="hidden" class="form-control" id="headingId" name="SeoheadingId"
                                placeholder="Enter CategoryId" required>
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
        $('.editheading').on('click', function(){

            $('#headingId').val($(this).attr('data-id'));
            $('#headingname').val($(this).attr('data-name'));


        });


        </script>
@endsection

