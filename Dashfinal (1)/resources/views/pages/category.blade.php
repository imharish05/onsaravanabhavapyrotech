@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card shadow-lg border-0" style="border-radius: 20px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-primary m-0"><i class="fas fa-th-large me-2"></i>Categories</h2>
                    <button type="button" class="btn btn-primary btn-lg shadow-sm" data-bs-toggle="modal" data-bs-target="#addcategoryModal" style="border-radius: 12px; padding: 10px 25px;">
                        <i class="fas fa-plus-circle me-2"></i>Add Category
                    </button>
                </div>

                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-hover align-middle custom-table">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center" style="width: 80px;">S.NO</th>
                                <th>Name</th>
                                <th class="text-center">Image</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $i = 1; ?>
                            @foreach ($category as $cat )
                              <tr class="category-row" data-id="{{ $cat->id }}">
                                <td class="text-center fw-medium text-muted">{{ $i++ }}</td>
                                 <td>
                                    <span class="fw-bold text-dark fs-5">{{ $cat->category_name }}</span>
                                    <div class="small text-muted">ID: #{{ $cat->id }}</div>
                                 </td>
                                 <td class="text-center">
                                    <div class="category-img-container mx-auto">
                                        <img src="{{ rtrim(env('MAIN_URL', 'http://127.0.0.1:8001/'), '/') }}/{{ ltrim($cat->category_image, '/') }}" 
                                             class="img-fluid rounded-3 shadow-sm"
                                             onerror="this.src='https://placehold.co/600x400/f8f9fa/333?text=No+Image'">
                                    </div>
                                 </td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-soft-success btn-icon editcatgory" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-id="{{ $cat->id }}" data-image="{{ $cat->category_image }}" data-name="{{ $cat->category_name }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-soft-danger btn-icon deletecat" data-id="{{ $cat->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-table {
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        .custom-table thead th {
            border: none;
            color: #6c757d;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            padding: 15px;
        }
        .custom-table tbody tr {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            transition: all 0.3s ease;
        }
        .custom-table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .custom-table tbody td {
            border: none;
            padding: 15px;
        }
        .custom-table tbody td:first-child { border-radius: 12px 0 0 12px; }
        .custom-table tbody td:last-child { border-radius: 0 12px 12px 0; }

        .category-img-container {
            width: 80px;
            height: 55px;
            overflow: hidden;
            border-radius: 10px;
            border: 2px solid #f8f9fa;
            transition: transform 0.3s ease;
        }
        .category-img-container:hover {
            transform: scale(1.1);
        }
        .category-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-soft-success { background: #e6f7f3; color: #28a745; }
        .btn-soft-danger { background: #fdf2f2; color: #dc3545; }
        .btn-soft-success:hover { background: #28a745; color: #fff; }
        .btn-soft-danger:hover { background: #dc3545; color: #fff; }
        .btn-icon { width: 38px; height: 38px; padding: 0; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; border: none; margin-left: 5px; }

        /* Modal Glassmorphism */
        .modal-content {
            border: none;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .modal-header { border-bottom: 1px solid rgba(0,0,0,0.05); padding: 25px; }
        .modal-body { padding: 25px; }
        .modal-footer { border-top: none; padding: 25px; }
        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            background: #fcfcfc;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
            border-color: #0d6efd;
        }
    </style>

    <div class="modal fade" id="addcategoryModal" tabindex="-1" aria-labelledby="addcategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addcategoryModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="category_add_form" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="category_add_input" name="category_name"
                                placeholder="Enter Category Name" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="add_category_image">Category Image* <small class="text-danger">(750 x 500 px)</small></label>

                            <input type="file" class="form-control needsclick" id="add_category_image"
                                placeholder="Category Image" accept="image/*" name="category_image" required>
                            <div class="mt-2 text-center d-none" id="add_category_preview_container">
                                <img src="" id="add_category_preview" style="max-width: 150px; border-radius: 8px; border: 1px solid #ddd; padding: 5px;">
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


     <div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdrop1Label">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" id="category_update_form" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryname" name="category_name"
                                placeholder="Enter Category Name">

                                   <input type="hidden" class="form-control" id="categoryId" name="categoryId"
                                placeholder="Enter CategoryId" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="update_category_image">Category Image* <small class="text-danger">(750 x 500 px)</small></label>

                            <input type="file" class="form-control needsclick" id="update_category_image"
                                placeholder="Category Image" accept="image/*" name="category_image">

                            <div class="mt-2 text-center">
                                <img src="" style="max-width: 150px; border-radius: 8px; border: 1px solid #ddd; padding: 5px;" id="catimage" class="mt-2">
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
        $('.editcatgory').on('click', function(){

            $('#categoryId').val($(this).attr('data-id'));
            $('#categoryname').val($(this).attr('data-name'));
             const imagePath = $(this).attr("data-image");
             if(imagePath) {
                const mainUrl = `{{ rtrim(env('MAIN_URL', 'http://127.0.0.1:8001/'), '/') }}`;
                const fullPath = `${mainUrl}/${imagePath.replace(/^\//, '')}`;
                $("#catimage").attr("src", fullPath).parent().removeClass('d-none');
             } else {
                $("#catimage").parent().addClass('d-none');
             }

        });

        // Image Preview Logic
        function readURL(input, previewId, containerId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(previewId).attr('src', e.target.result);
                    if(containerId) $(containerId).removeClass('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#add_category_image").change(function() {
            readURL(this, '#add_category_preview', '#add_category_preview_container');
        });

        $("#update_category_image").change(function() {
            readURL(this, '#catimage');
        });

        </script>
@endsection