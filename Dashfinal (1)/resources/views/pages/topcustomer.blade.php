@extends('layout.app')
@section('main_content')
    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                {{-- <div class="mb-5 text-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        Add Product Stock
                    </button>
                </div> --}}
                <div class="container overflow-hidden">
                    <h2 class="mb-4">Top Customer </h2>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">





                        <thead>
                            <tr>
                                <th>S.NO</th>

                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Order Count</th>
                                <th>Amount</th>


                            </tr>
                        </thead>


                        <tbody>

                            <?php $i = 1; ?>
                            @foreach ($orderdetails as $order )
                              <tr>
                                <td>{{ $i++ }}</td>
                              
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td>{{ $order->order_count }}</td>
                               <td>₹ {{ round($order->total_amount) }}.00</td>
                                </tr>
                            @endforeach






                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD MODAL --}}

    {{-- EDIT MODAL --}}



@endsection

