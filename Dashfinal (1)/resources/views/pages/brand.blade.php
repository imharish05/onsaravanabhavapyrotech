@extends('layout.app')
@section('main_content')





    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="mb-5 text-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbannerModal">
                        Add Brand
                    </button>
                </div>
                <div class="container overflow-hidden">
                    <h2 class="mb-4">Brand Logo</h2>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>logos</th>

                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>

                             <?php $i = 1; ?>
                            @foreach ($brand as $banner )
                              <tr>
                                <td>{{ $i++ }}</td>
                               <td><img src="/{{ $banner->logo }}" style="width: 100px"></td>



                                <td><button type="button" class="btn btn-success waves-effect waves-light editsectionbanner" data-bs-toggle="modal" data-bs-target="#sectionBackdrop1" data-ids="{{ $banner->id }}" data-images="{{ $banner->logo }}">
                                        <i class="bx bx-link-external font-size-16 align-middle me-2"></i>
                                        </button>
                                         <button type="button" class="btn btn-danger waves-effect waves-light deletebrand"  data-id="{{ $banner->id }}">
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


    <div class="modal fade" id="addbannerModal" tabindex="-1" aria-labelledby="addbannerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addbannerModalLabel">logo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="logo_list_data" >
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">logo <small class="text-danger">(90 x 80 px)</small></label>
                           <input type="file" class="form-control" name="section_image"  placeholder="Upload price list">

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
                    <h1 class="modal-title fs-5" id="staticBackdrop1Label">Edit Banner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="Banner_update_data" >
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Banner</label>
                           <input type="file" class="form-control" name="banner_image"  placeholder="Upload price list">

                        </div>
                        <img src="" style="width: 50px" id="bannerimage">
                        <input type="hidden" name="bannerid" id="bannerid">



                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



     <div class="modal fade" id="sectionBackdrop1" tabindex="-1" aria-labelledby="sectionBackdrop1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sectionBackdrop1Label">Edit Brand Logo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="Brand_update_data" >
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Brand Logo <small class="text-danger">(90 x 80 px)</small></label>
                           <input type="file" class="form-control" name="section_image"  placeholder="Upload price list">

                        </div>
                        <img src="" style="width: 50px" id="sectionimage">
                        <input type="hidden" name="sectionid" id="sectionid">



                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Banner Image --}}

@endsection
   @section('scripts')
    <script>
        $('.editbanner').on('click', function(){


            $('#bannerid').val($(this).attr('data-id'));
             const imagePath = $(this).attr("data-image");
              $("#bannerimage").attr("src", `/${imagePath}`);

        });

        $('.editsectionbanner').on('click', function(){
            $('#sectionid').val($(this).attr('data-ids'));
            const imagePaths = $(this).attr("data-images");
            $('#sectionimage').attr("src", `/${imagePaths}`);
        });
        </script>
@endsection