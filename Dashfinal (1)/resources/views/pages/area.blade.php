@extends('layout.app')
@section('main_content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Areas</h4>
        </div>
        <div class="card-body">
            <div class="mb-5 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbulkModal">
                    Bulk Upload
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addareaModal">
                    Add Area
                </button>
            </div>

            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Area Name</th>
                        <th>Pincode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach ($area as $are)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $are->state_name }}</td>
                        <td>{{ $are->city_name }}</td>
                        <td>{{ $are->area_name }}</td>
                        <td>{{ $are->pincode }}</td>
                        <td>
                            <button type="button" class="btn btn-success waves-effect waves-light editarea" 
                                data-bs-toggle="modal" data-bs-target="#editareaModal" 
                                data-id="{{ $are->id }}" data-name="{{ $are->area_name }}" 
                                data-city="{{ $are->city_name }}" data-pincode="{{ $are->pincode }}">
                                <i class="bx bx-link-external font-size-16 align-middle me-2"></i>
                            </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light deletearea" data-id="{{ $are->id }}">
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

{{-- Add Area Modal --}}
<div class="modal fade" id="addareaModal" tabindex="-1" aria-labelledby="addareaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addareaModalLabel">Add Area</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="area_add_form">
                    <div class="mb-3">
                        <label class="form-label">State</label>
                        <select class="form-control state_selector" required>
                            <option value="">Select State</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->state }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <select class="form-control city_selector" name="city_bill" required disabled>
                            <option value="">Select City</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Area Name(s)</label>
                        <input type="text" class="form-control" name="area" placeholder="Enter Area names (comma separated)" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pincode</label>
                        <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Area Modal --}}
<div class="modal fade" id="editareaModal" tabindex="-1" aria-labelledby="editareaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editareaModalLabel">Edit Area</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="area_edit_form">
                    <input type="hidden" name="area_id" id="edit_area_id">
                    <div class="mb-3">
                        <label class="form-label">City (Read Only)</label>
                        <input type="text" class="form-control" id="edit_city_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Area Name</label>
                        <input type="text" class="form-control" name="area" id="edit_area_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pincode</label>
                        <input type="text" class="form-control" name="pincode" id="edit_pincode">
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
                <h1 class="modal-title fs-5" id="addbulkModalLabel">Bulk Upload Areas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bulk_upload_area">
                    <div class="mb-3">
                        <label class="form-label">Upload CSV File</label>
                        <input type="file" class="form-control" name="file" accept=".csv" required>
                    </div>
                    <a href="{{ route('area.export') }}" download class="btn btn-secondary mb-3">Download Current Data</a>
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
    // Dynamic City Loading
    $('.state_selector').change(function() {
        var state_id = $(this).val();
        var $citySelector = $(this).closest('form').find('.city_selector');
        
        if (state_id) {
            $.ajax({
                url: "/stateCity/" + state_id,
                type: "GET",
                success: function(res) {
                    var html = '<option value="">Select City</option>';
                    res.forEach(function(city) {
                        html += '<option value="' + city.id + '">' + city.city_name + '</option>';
                    });
                    $citySelector.html(html).prop('disabled', false);
                }
            });
        } else {
            $citySelector.html('<option value="">Select City</option>').prop('disabled', true);
        }
    });

    // Add Area
    $('#area_add_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('area.add') }}",
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
    $('.editarea').click(function() {
        $('#edit_area_id').val($(this).data('id'));
        $('#edit_area_name').val($(this).data('name'));
        $('#edit_city_name').val($(this).data('city'));
        $('#edit_pincode').val($(this).data('pincode'));
    });

    // Update Area
    $('#area_edit_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('area.update') }}",
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

    // Delete Area
    $('.deletearea').click(function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "This area will be permanently removed.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/destroyArea/" + id,
                    type: "POST",
                    data: { _token: "{{ csrf_token() }}" },
                    success: function(res) {
                        location.reload();
                    }
                });
            }
        });
    });

    // Bulk Upload
    $('#bulk_upload_area').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_token', "{{ csrf_token() }}");
        $.ajax({
            url: "{{ route('area.bulkUpload') }}",
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