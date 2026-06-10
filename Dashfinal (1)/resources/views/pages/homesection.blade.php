@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="mb-5 text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategoryModal">
                        Add Section
                    </button>
                </div>
                {{-- {{ $dataTable->table() }} --}}
                <div class="container overflow-hidden">
                    <h2 class="mb-4">Section</h2>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>
                                <th>Add Products</th>

                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>

                            <?php $i = 1; ?>
                            @foreach ($section as $cat)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $cat->section_name }}</td>
                                    <td><button type="button" class="btn btn-warning waves-effect waves-light addproduct"
                                            data-bs-toggle="modal" data-bs-target="#checkBackdrop1"
                                            data-id="{{ $cat->id }}">
                                            <i class="bx bx-link-external font-size-16 align-middle me-2"></i></button></td>



                                    <td>
                                      <button type="button" class="btn btn-success waves-effect waves-light editsectionheading"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdropsection"
                                            data-id="{{ $cat->id }}" data-name="{{ $cat->section_name }}">
                                            <i class="bx bx-link-external font-size-16 align-middle me-2"></i></button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light deletesectinheading"
                                            data-id="{{ $cat->id }}">
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
                    <h1 class="modal-title fs-5" id="addcategoryModalLabel">Add Section</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="sectionhead_add_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Section Name</label>
                            <input type="text" class="form-control" id="category_add_input" name="section_name"
                                placeholder="Enter Section Name" required>
                        </div>




                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="staticBackdropsection" tabindex="-1" aria-labelledby="staticBackdropsectionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropsectionLabel">Edit Section Heading</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" id="section_update_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Section Name</label>
                            <input type="text" class="form-control" id="sectionname" name="section_name"
                                placeholder="Enter Section Name">

                            <input type="hidden" class="form-control" id="sectionIds" name="sectionId"
                                placeholder="Enter sectionId">
                        </div>




                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

  
    <div class="modal fade" id="checkBackdrop1" tabindex="-1" aria-labelledby="checkBackdrop1Label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="checkBackdrop1Label">Add Products</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="addproduct_update_form">
                        <div class="mb-3">
                            <div class="checkbox my-2">

                                @foreach ($product as $pro)
                                    <div class="custom-control custom-checkbox">
                                       <input
    type="checkbox"
    class="custom-control-input"
    id="customCheck{{ $pro->id }}"
    name="product_id[]"
    value="{{ $pro->id }}"
>


                                        <label class="custom-control-label"
                                            for="customCheck2">{{ $pro->product_name }}</label>
                                    </div>
                                @endforeach

                                 <input type="hidden" name="section_id" id="sectionId">

                            </div>
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
        $('.editsectionheading').on('click', function() {

            $('#sectionIds').val($(this).attr('data-id'));
            $('#sectionname').val($(this).attr('data-name'));
           

        });

        $('.addproduct').on('click', function() {
            $('#sectionId').val($(this).attr('data-id'));
        })
    </script>
@endsection