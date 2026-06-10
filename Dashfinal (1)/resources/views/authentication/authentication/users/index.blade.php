@extends('layout.app')
@section('title', 'Company List')
@section('css')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h4 class="mb-3">Company List</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-striped align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Company</th>
                            <th>PAN</th>
                            <th>GST</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Pin</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th>Watermark</th>
                            <th>Header</th>
                            <th>Footer</th>
                            <th>Bank</th>
                            <th>Acc No</th>
                            <th>IFSC</th>
                            <th>UPI</th>
                            <th>QR</th>
                            <th>Min Order</th>
                            <th>Print Style</th>
                            <th>Order Prefix</th>
                            <th>Start No</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $user->name }}</td>
                            <td>{{ $user->pan_number }}</td>
                            <td>{{ $user->gst_number }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->email }}</td>

                            <td>{{ $user->state->name ?? '' }}</td>
                            <td>{{ $user->city->name ?? '' }}</td>
                            <td>{{ $user->pin_code }}</td>

                            <td>
                                @if($user->website_link)
                                    <a href="{{ $user->website_link }}" target="_blank">Visit</a>
                                @endif
                            </td>

                            <!-- Images -->
                            <td>
                                @if($user->logo)
                                    <img src="{{ asset('storage/'.$user->logo) }}" width="50">
                                @endif
                            </td>

                            <td>
                                @if($user->watermark)
                                    <img src="{{ asset('storage/'.$user->watermark) }}" width="50">
                                @endif
                            </td>

                            <td>
                                @if($user->header_image)
                                    <img src="{{ asset('storage/'.$user->header_image) }}" width="50">
                                @endif
                            </td>

                            <td>
                                @if($user->footer_image)
                                    <img src="{{ asset('storage/'.$user->footer_image) }}" width="50">
                                @endif
                            </td>

                            <!-- Bank -->
                            <td>{{ $user->bank_name }}</td>
                            <td>{{ $user->account_number }}</td>
                            <td>{{ $user->ifsc_code }}</td>
                            <td>{{ $user->upi_id }}</td>

                            <td>
                                @if($user->upi_qr)
                                    <img src="{{ asset('storage/'.$user->upi_qr) }}" width="50">
                                @endif
                            </td>

                            <td>{{ $user->minimum_order_amount }}</td>

                            <td>
                                @if($user->print_style == 1)
                                    A4
                                @elseif($user->print_style == 2)
                                    Thermal 3IN
                                @endif
                            </td>

                            <td>{{ $user->order_prefix }}</td>
                            <td>{{ $user->order_start_number }}</td>

                            <td>
                                <a href="{{ route('authentication.users.edit', ['slug'=>auth()->user()->slug,'user'=>$user->id]) }}"
                                   class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('authentication.users.destroy', ['slug'=>auth()->user()->slug,'user'=>$user->id]) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "info": true,
                "searching": true
            });
        });
    </script>
@endsection
