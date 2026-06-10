@extends('layout.app')
@section('main_content')

<div class="col-lg-12">
    <div class="card card-h-100">
        <div class="card-body">
            <div class="container overflow-hidden">
                <h2 class="mb-4">Contact Enquiries</h2>
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($enquiries as $enquiry)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $enquiry->name }}</td>
                            <td>{{ $enquiry->email }}</td>
                            <td>{{ $enquiry->phone }}</td>
                            <td>{{ $enquiry->message }}</td>
                            <td>{{ $enquiry->created_at->format('d M, Y h:i A') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
