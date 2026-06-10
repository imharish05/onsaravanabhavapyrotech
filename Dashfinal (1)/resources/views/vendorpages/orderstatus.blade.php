@extends('layout.app')
@section('main_content')
 <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Order Status</h4>

                                    </div>
                                    <div class="card-body">
                                         <div class="mb-5 text-end">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategoryModal">
                        Add Status
                    </button>
                                         </div>
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>


                                            <tbody>

                                                 <?php $i=1; ?>

                                                @foreach ($orderstatus as $order)
                                                 <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $order->order_status }}</td>
                                                <td>
                                            <!--        <button type="button" class="btn btn-success waves-effect waves-light">-->
                                            <!--    <i class="bx bx-link-external font-size-16 align-middle me-2"></i>-->
                                            <!--</button> -->
                                             <button type="button" class="btn btn-danger waves-effect waves-light delete_order_status" data-id="{{ $order->id }}">
                                                <i class=" bx bxs-trash font-size-16 align-middle me-2"></i>
                                            </button></td>


                                            </tr>

                                                @endforeach


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>


                             <div class="modal fade" id="addcategoryModal" tabindex="-1" aria-labelledby="addcategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addcategoryModalLabel">Add Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="status_add_form">
                        <div class="mb-3">
                            <label for="category_add_input" class="form-label">Status</label>
                            <input type="text" class="form-control"  name="status"
                                placeholder="Enter Status" required>
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