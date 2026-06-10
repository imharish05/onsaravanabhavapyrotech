@extends('layout.app')
@section('main_content')


<div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="mb-5 text-end">
                    {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbannerModal">
                        Add Banner
                    </button> --}}
                </div>
                <div class="container overflow-hidden">
                    <h2 class="mb-4">Home Banner</h2>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Banner</th>

                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>

                             <?php $i = 1; ?>
                            @foreach ($bannerImages as $banner )
                              <tr>
                                <td>{{ $i++ }}</td>
                               <td><img src="/{{ $banner->banner_image }}" style="width: 100px"></td>



                                <td><button type="button" class="btn btn-success waves-effect waves-light editbanner" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-id="{{ $banner->id }}" data-image="{{ $banner->banner_image }}" data-position="{{ $banner->banner_position }}">
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


    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="mb-5 text-end">
                    {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbannerModal">
                        Add Banner
                    </button> --}}
                </div>
                <!-- <div class="container overflow-hidden">
                    <h2 class="mb-4">Section Banner</h2>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Banner</th>

                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>

                             <?php $i = 1; ?>
                            @foreach ($webbannerImages as $banner )
                              <tr>
                                <td>{{ $i++ }}</td>
                               <td><img src="/{{ $banner->banner }}" style="width: 100px"></td>



                                <td><button type="button" class="btn btn-success waves-effect waves-light editsectionbanner" data-bs-toggle="modal" data-bs-target="#sectionBackdrop1" data-ids="{{ $banner->id }}" data-images="{{ $banner->banner }}">
                                        <i class="bx bx-link-external font-size-16 align-middle me-2"></i>
                                   </td>


                            </tr>
                            @endforeach






                        </tbody>

                    </table>
                </div> -->
            </div>
        </div>
    </div>


@push('modals')
    <div class="modal fade" id="addbannerModal" tabindex="-1" aria-labelledby="addbannerModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addbannerModalLabel">Section Banner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="section_list_data" >
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Banner</label>
                           <input type="file" class="form-control image-validation" name="section_image"  placeholder="Upload price list" accept="image/*">
                           <small class="text-danger">(1920 x 1080 px)</small>
                        </div>



                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="staticBackdrop1Label">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdrop1Label">Edit Banner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="Banner_update_data" >




                         <div class="mb-3" id="positiondiv">
                            <label for="category_add_input" class="form-label">Banner </label>
                           <input type="file" class="form-control image-validation" name="banner_image"  placeholder="Upload price list" accept="image/*">
                           <small class="text-danger">(1920 x 1080 px)</small>

                            <img src="" style="width: 50px" id="bannerimage">

                        </div>

                        <input type="hidden" name="bannerid" id="bannerid">
                        <input type="hidden" name="positionid" id="positionid">













                        <div class="text-end gap-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



     <div class="modal fade" id="sectionBackdrop1" tabindex="-1" aria-labelledby="sectionBackdrop1Label">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sectionBackdrop1Label">Edit Section Banner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="Section_update_data" >
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Section Banner</label>
                           <input type="file" class="form-control image-validation" name="section_image"  placeholder="Upload price list" accept="image/*">
                           <small class="text-danger">(1920 x 1080 px)</small>
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
@endpush

    {{-- Banner Image --}}

@endsection
   @section('scripts')
    <script>
        $('.editbanner').on('click', function() {
    $('#bannerid').val($(this).attr('data-id'));
    const imagePath = $(this).attr("data-image");
    $("#bannerimage").attr("src", `/${imagePath}`);
    
    const position = $(this).attr("data-position");
    $('#positionid').val(position); // ✅ Correct way

    // Always show Image
    $("#positiondiv").show();
});

        $('.editsectionbanner').on('click', function(){
            $('#sectionid').val($(this).attr('data-ids'));
            const imagePaths = $(this).attr("data-images");
            $('#sectionimage').attr("src", `/${imagePaths}`);
        });

        $('.image-validation').on('change', function() {
            var file = this.files[0];
            var $input = $(this);
            if (file) {
                var img = new Image();
                img.onload = function() {
                    if (this.width !== 1920 || this.height !== 1080) {
                        alert('Image dimensions must be exactly 1920x1080 pixels.');
                        $input.val(''); // Clear the input
                    }
                };
                img.src = URL.createObjectURL(file);
            }
        });
    </script>
@endsection