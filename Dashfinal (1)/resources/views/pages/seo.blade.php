@extends('layout.app')
@section('main_content')

<style>
    .note-editor.fullscreen {
        background-color: white !important;
    }

    .note-editor.fullscreen .note-editable {
        background-color: white !important;
        color: #000; /* Optional: ensure text is visible */
    }
</style>

    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="mb-5 text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editproductBackdrop1">
                        Add SEO
                    </button>

                </div>


                {{-- {{ $dataTable->table() }} --}}


                <div class="container overflow-hidden">


                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Meta Title</th>
                                <th>Meta Des</th>
                                <th>Meta key</th>
                                <th>Name</th>
                                <th>Description</th>


                                <th>Action</th>

                            </tr>
                        </thead>


                        <tbody>

                            <?php $i = 1; ?>
                            @foreach ($seodata as $pro)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pro->meta_title }}</td>
                                    <td>{{ $pro->meta_des }}</td>


                                    <td>{{ $pro->meta_key }}</td>
                                    <td>{{ $pro->name }}</td>
                                    <td>{{ $pro->description }}</td>



                                    <td>
                                        <button type="button" class="btn btn-success waves-effect waves-light editproduct"
                                            data-bs-toggle="modal" data-bs-target="#updateproductBackdrop1"
                                            data-id="{{ $pro->id }}" data-headingid="{{ $pro->seo_headingId }}"
                                            data-title="{{ $pro->meta_title }}" data-des="{{ $pro->meta_des }}"
                                            data-key="{{ $pro->meta_key }}" data-name="{{ $pro->name }}"
                                            data-description="{{ $pro->description }}" data-image="{{ $pro->image }}"
                                            data-altkey="{{ $pro->alt_key }}" data-url="{{ $pro->url }}" data-canonical="{{$pro->canonical}}"
                                            data-feet_content="{{ $pro->feet_content }}" data-id="{{ $pro->id }}">
                                            <i class="bx bx-link-external font-size-16 align-middle me-2"></i></button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light deleteseo"
                                            data-id="{{ $pro->id }}">
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






    {{-- edit product --}}
    <div class="modal fade" id="editproductBackdrop1" tabindex="-1" aria-labelledby="editproductBackdrop1Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editproductBackdrop1Label">Add SEO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="add_seocontent">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_category_select">Choose Seo Heading *</label>
                                    <select class="form-select" name="seoheading_id" id="add_category_select" required>
                                        <option value="" disabled selected>Select Seo</option>
                                        @foreach ($seohead as $head)
                                            <option value="{{ $head->id }}">
                                                {{ $head->heading }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Meta Title*</label>
                                    <input type="text" class="form-control" id="add_product_name" name="mete_title"
                                        placeholder=""  required>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Meta Description*</label>
                                    <textarea type="text" class="form-control" id="add_product_name" name="meta_des" rows="3" required></textarea>


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Meta Key*</label>
                                    <input type="text" class="form-control" id="add_product_name" name="meta_key"
                                        placeholder=""  required>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Name*</label>
                                    <input type="text" class="form-control" id="add_product_name" name="name"
                                        placeholder=""  required>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Description*</label>
                                    <textarea type="text" class="form-control" id="add_product_name" name="description" rows="3" required></textarea>


                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Image* <small class="text-danger">(1200 x 630 px)</small></label>
                                    <input type="file" class="form-control" id="add_product_name" name="seo_image"
                                        placeholder="" >

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Alt Key*</label>
                                    <input type="text" class="form-control" id="add_product_name" name="alt_key"
                                        placeholder=""  required>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Url*</label>
                                    <input type="text" class="form-control" id="add_product_name" name="url"
                                        placeholder=""  required>

                                </div>
                            </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Canonical</label>
                                    <input type="text" class="form-control" id="canonical_name" name="canonical"
                                        placeholder=""  >

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Feet Content*</label>


                                    <textarea type="text" class="form-control banncontent" id="conntent" name="feet_content" required></textarea>

                                </div>
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



    <div class="modal fade" id="updateproductBackdrop1" tabindex="-1" aria-labelledby="updateproductBackdrop1Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateproductBackdrop1Label">Edit SEO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="edit_seocontent">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_category_select">Choose Seo Heading *</label>
                                    <select class="form-select" name="seoheading_id" id="seo_select" required>
                                        <option value="" disabled selected>Select Seo</option>
                                        @foreach ($seohead as $head)
                                            <option value="{{ $head->id }}">
                                                {{ $head->heading }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Meta Title*</label>
                                    <input type="text" class="form-control" id="meta_titles" name="mete_title"
                                        placeholder="" >
                                    <input type="hidden" name="see_id" id="seo_id">

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Meta Description*</label>
                                    <textarea type="text" class="form-control" id="mete_description" name="meta_des" rows="3" ></textarea>


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Meta Key*</label>
                                    <input type="text" class="form-control" id="mete_keys" name="meta_key"
                                        placeholder=""  >

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder=""  >

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Description*</label>
                                    <textarea type="text" class="form-control" id="description" name="description" rows="3" ></textarea>


                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Image* <small class="text-danger">(1200 x 630 px)</small></label>
                                    <input type="file" class="form-control" id="image" name="seo_image"
                                        placeholder=""  >

                                </div>
                                <img src="" style="width: 50px" id="seoimage">
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Alt Key*</label>
                                    <input type="text" class="form-control" id="alt_key" name="alt_key"
                                        placeholder=""  >

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Url*</label>
                                    <input type="text" class="form-control" id="url" name="url"
                                        placeholder=""  >

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Canonical*</label>
                                    <input type="text" class="form-control" id="canonical" name="canonical"
                                        placeholder=""  >

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Feet Content*</label>


                                    <textarea type="text" class="form-control feetcontent" id="conntent1" name="feet_content" ></textarea>

                                </div>
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


<!-- Summernote JS -->


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
    

    // Initialize Summernote
    $('#conntent').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
        fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48', '64', '82', '150'],
        fontNames: [
            'Arial',
            'Arial Black',
            'Comic Sans MS',
            'Courier New',
            'Montserrat',
            'Merriweather',
            'Roboto',
            'Times New Roman'
        ],
      
    });
         $('#conntent1').summernote({
    height: 200,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
    ],
    fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48', '64', '82', '150'],
    fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New','Montserrat', 'Merriweather', 'Roboto', 'Times New Roman'],
});
        });
        $(document).on('click','.editproduct', function() {
            
         


            $('#seo_id').val($(this).attr('data-id'));

            const imagePath = $(this).attr("data-image");
            $("#seoimage").attr("src", `/${imagePath}`);
            $('#meta_titles').val($(this).attr('data-title'));
            $('#mete_description').val($(this).attr('data-des'));
            $('#mete_keys').val($(this).attr('data-key'));
            $('#name').val($(this).attr('data-name'));
            $('#description').val($(this).attr('data-description'));
            $('#alt_key').val($(this).attr('data-altkey'));
            $('#url').val($(this).attr('data-url'));
            $('#canonical').val($(this).attr('data-canonical'));
            $('#conntent1').summernote('code', $(this).attr('data-feet_content'));
             const catId = $(this).attr("data-headingid");
            $("#seo_select")
                .find(`option[value="${catId}"]`)
                .prop("selected", true);

        });
    </script>
@endsection