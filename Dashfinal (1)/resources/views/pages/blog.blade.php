@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                {{-- <div class="mb-5 text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editproductBackdrop1">
                        Add Blog
                    </button>

                </div> --}}


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



                                {{-- <th>Action</th> --}}

                            </tr>
                        </thead>


                        <tbody>

                            <?php $i = 1; ?>
                            @foreach ($blogs as $pro)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pro->meta_title }}</td>
                                    <td>{{ $pro->meta_des }}</td>
                                     <td>{{ $pro->meta_key }}</td>
                                    <td>{{ $pro->title }}</td>
                                    {{-- <td>{{ $pro->description }}</td> --}}



                                    {{-- <td>
                                        <button class="btn btn-success waves-effect waves-light editproductdats"
                                            data-bs-toggle="modal" data-bs-target="#updateproductBackdrop1"
                                            data-id="{{ $pro->id }}" data-headingid="{{ $pro->seo_headingId }}"
                                            data-title="{{ $pro->meta_title }}" data-des="{{ $pro->meta_des }}"
                                            data-key="{{ $pro->meta_key }}" data-name="{{ $pro->title }}"
                                            data-image="{{ $pro->image }}"

                                            data-feet_content="{{ $pro->feet_content }}" data-id="{{ $pro->id }}">
                                        
                                            <i class="bx bx-link-external font-size-16 align-middle me-2"></i></button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light deleteblog"
                                            data-id="{{ $pro->id }}">
                                            <i class="fas fa-archive"></i></button>
                                    </td> --}}


                                </tr>
                            @endforeach






                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>






    {{-- Add Blog modal --}}{{--
    <div class="modal fade" id="editproductBackdrop1" tabindex="-1" aria-labelledby="editproductBackdrop1Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editproductBackdrop1Label">Add Blog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="add_blogcontent" enctype="multipart/form-data">

                        <div class="row">


                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Meta Title*</label>
                                    <input type="text" class="form-control" id="add_product_name" name="mete_title"
                                        placeholder="" maxlength="50" required>

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
                                        placeholder="" maxlength="50" required>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Blog Name*</label>
                                    <input type="text" class="form-control" id="add_product_name" name="name"
                                        placeholder="" maxlength="50" required>

                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Image* <small class="text-danger">(650 x 500 px)</small></label>
                                    <input type="file" class="form-control" id="add_product_name" name="seo_image"
                                        placeholder="" maxlength="50">

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
--}}



    {{-- Edit Blog modal --}}{{--
    <div class="modal fade" id="updateproductBackdrop1" tabindex="-1" aria-labelledby="updateproductBackdrop1Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateproductBackdrop1Label">Edit Blog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="edit_blogcontent" enctype="multipart/form-data">

                        <div class="row">


                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Meta Title*</label>
                                    <input type="text" class="form-control" id="meta_titles" name="mete_title"
                                        placeholder="" maxlength="50" >
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
                                        placeholder="" maxlength="50" >

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="" maxlength="50" >

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="add_product_name">Image* <small class="text-danger">(650 x 500 px)</small></label>
                                    <input type="file" class="form-control" id="image" name="seo_image"
                                        placeholder="" maxlength="50" >

                                </div>
                                <img src="" style="width: 50px" id="seoimage">
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
--}}
@endsection