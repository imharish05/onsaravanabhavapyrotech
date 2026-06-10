@extends('layout.app')
@section('main_content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Cities</h4>
        </div>
        <div class="card-body">
            <div class="mb-5 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbulkModal">
                    Bulk Upload
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcityModal">
                    Add City
                </button>
            </div>

            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>State Name</th>
                        <th>City Name</th>
                        <th>City Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach ($cities as $city)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $city->state_name }}</td>
                        <td>{{ $city->city_name }}</td>
                        <td>{{ $city->city_code }}</td>
                        <td>
                            <button type="button" class="btn btn-success waves-effect waves-light editcity" 
                                data-bs-toggle="modal" data-bs-target="#editcityModal" 
                                data-id="{{ $city->id }}" data-name="{{ $city->city_name }}" data-code="{{ $city->city_code }}">
                                <i class="bx bx-link-external font-size-16 align-middle me-2"></i>
                            </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light deletecity" data-id="{{ $city->id }}">
                                <i class="fas fa-archive"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

{{-- Add City Modal --}}
<div class="modal fade" id="addcityModal" tabindex="-1" aria-labelledby="addcityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addcityModalLabel">Add City</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="city_add_form">
                    <div class="mb-3">
                        <label class="form-label">Select State</label>
                        <select class="form-control" name="state_code" required>
                            <option value="">Select State</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->state }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City Name</label>
                        <input type="text" class="form-control" name="city_name" placeholder="Enter City Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City Code</label>
                        <input type="text" class="form-control" name="city_code" placeholder="Enter City Code">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit City Modal --}}
<div class="modal fade" id="editcityModal" tabindex="-1" aria-labelledby="editcityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editcityModalLabel">Edit City</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="city_edit_form">
                    <input type="hidden" name="city_id" id="edit_city_id">
                    <div class="mb-3">
                        <label class="form-label">City Name</label>
                        <input type="text" class="form-control" name="city_name" id="edit_city_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City Code</label>
                        <input type="text" class="form-control" name="city_code" id="edit_city_code">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Bulk Upload Modal --}}
<div class="modal fade" id="addbulkModal" tabindex="-1" aria-labelledby="addbulkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addbulkModalLabel">Bulk Upload Cities</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bulk_upload_city">
                    <div class="mb-3">
                        <label class="form-label">Upload CSV File</label>
                        <input type="file" class="form-control" name="file" accept=".csv" required>
                    </div>
                    <a href="{{ route('city.export') }}" download class="btn btn-secondary mb-3">Download Current Data</a>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    // Add City
    $('#city_add_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('city.add') }}",
            type: "POST",
            data: $(this).serialize() + "&_token={{ csrf_token() }}",
            success: function(res) {
                if(res.status == 200) {
                    location.reload();
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            }
        });
    });

    // Populate Edit Modal
    $('.editcity').click(function() {
        $('#edit_city_id').val($(this).data('id'));
        $('#edit_city_name').val($(this).data('name'));
        $('#edit_city_code').val($(this).data('code'));
    });

    // Update City
    $('#city_edit_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('city.update') }}",
            type: "POST",
            data: $(this).serialize() + "&_token={{ csrf_token() }}",
            success: function(res) {
                if(res.status == 200) {
                    location.reload();
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            }
        });
    });

    // Delete City
    $('.deletecity').click(function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/city/delete/" + id,
                    type: "GET",
                    success: function(res) {
                        location.reload();
                    }
                });
            }
        });
    });

    // Bulk Upload
    $('#bulk_upload_city').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_token', "{{ csrf_token() }}");
        $.ajax({
            url: "{{ route('city.bulkUpload') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                Swal.fire('Success', res.message, 'success').then(() => {
                    location.reload();
                });
            }
        });
    });
});
</script>
