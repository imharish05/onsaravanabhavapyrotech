@extends('layout.app')
@section('main_content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Welcome !</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Welcome !</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @if (Auth::user()->role == 'Vendor')
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Orders</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="0">0</span>
                                    </h4>
                                    <div class="text-nowrap">
                                    <span class="badge bg-success-subtle text-success">+$20.9k</span>
                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                </div>
                                </div>

                                <div class="flex-shrink-0 text-end dash-widget">
                                <div id="mini-chart1" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts">
                                </div>
                            </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Offers</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $offerCount }}">0</span>
                                    </h4>
                                    {{-- <div class="text-nowrap">
                                    <span class="badge bg-success-subtle text-success">+$20.9k</span>
                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                </div> --}}
                                </div>

                                {{-- <div class="flex-shrink-0 text-end dash-widget">
                                <div id="mini-chart1" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts">
                                </div>
                            </div> --}}
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

            </div><!-- end row-->
        @else
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Category</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $categoryCount }}">0</span>
                                    </h4>
                                    {{-- <div class="text-nowrap">
                                    <span class="badge bg-success-subtle text-success">+$20.9k</span>
                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                </div> --}}
                                </div>

                                {{-- <div class="flex-shrink-0 text-end dash-widget">
                                <div id="mini-chart1" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts">
                                </div>
                            </div> --}}
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Banner</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $banner }}">0</span>
                                    </h4>

                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col-->

                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Product Discount</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $productdiscount->discount }}">0</span>%
                                    </h4>

                                </div>

                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Products</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $productCount }}">0</span>
                                    </h4>
                                    {{-- <div class="text-nowrap">
                                    <span class="badge bg-success-subtle text-success">+ $2.8k</span>
                                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                                </div> --}}
                                </div>
                                {{-- <div class="flex-shrink-0 text-end dash-widget">
                                <div id="mini-chart3" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts">
                                </div>
                            </div> --}}
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Orders</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="{{ $order }}">0</span>
                                    </h4>

                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart4" data-colors='["--bs-primary", "--bs-success"]'
                                        class="apex-charts">
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                 <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Income</span>
                                    <h4 class="mb-3">
                                       ₹ <span class="counter-value" data-target="{{ $orderincome }}">0</span>
                                    </h4>

                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart4" data-colors='["--bs-primary", "--bs-success"]'
                                        class="apex-charts">
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>

                 <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Customer</span>
                                    <h4 class="mb-3">
                                       <span class="counter-value" data-target="{{ $customercount }}">0</span>
                                    </h4>

                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart4" data-colors='["--bs-primary", "--bs-success"]'
                                        class="apex-charts">
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div><!-- end row-->
        @endif




        <!-- end row-->

        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Customer List</h4>
                        <div class="flex-shrink-0">
                            <div class="dropdown">
                                <a class=" " href="/customer"
                                   >
                                    <span class="text-muted">All Members</span>
                                </a>

                                {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                    <a class="dropdown-item" href="#">Members</a>
                                    <a class="dropdown-item" href="#">New Members</a>
                                    <a class="dropdown-item" href="#">Old Members</a>
                                </div> --}}
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body px-0">
                        <div class="px-3" data-simplebar style="max-height: 386px;">

                            @foreach ($customer as $cus)
                                  <div class="d-flex align-items-center pb-4">
                                <div class="avatar-md me-4">
                                    <img src="./assets/images/users/profile.jpg" class="img-fluid rounded-circle"
                                        alt="">
                                </div>

                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1"><a href="" class="text-dark">{{ $cus->name }}</a>
                                    </h5>
                                    <span class="text-muted">{{ $cus->phone_number }}</span>
                                </div>

                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                        <div class="flex-shrink-0">
                            <div class="dropdown align-self-start">
                                <!--<a class="dropdown-toggle" href="{{ url('/vendor/orders') }}" role="button" data-bs-toggle="dropdown"-->
                                <!--    aria-haspopup="true" aria-expanded="false">-->
                                <!--  View All-->
                                <!--</a>-->

                            </div>
                        </div>

                    </div><!-- end card header -->

                    <div class="card-body px-0 pt-2">
                        <div class="table-responsive px-3" data-simplebar style="max-height: 395px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>

                                    @foreach ($today as $today)

                                     <tr>


                                        <td>
                                            <div>
                                                <h5 class="font-size-15"><a href="{{ route('ordersolt', $today->oeder_id) }}" class="text-dark">{{ $today->oeder_id }}</a></h5>
                                                <span class="text-muted">{{ $today->total }}</span>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="mb-1"><a href="" class="text-dark">{{ $today->name }}</a></p>
                                            {{-- <span class="text-muted">243K</span> --}}
                                        </td>

                                        <td>
                                             <p class="mb-1"><a href="" class="text-dark">{{ $today->phone_number }}</a></p>
                                            {{-- <span class="text-muted">243K</span> --}}
                                        </td>
                                    </tr>

                                    @endforeach












                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <!-- end col -->
        </div><!-- end row -->
    </div>
@endsection