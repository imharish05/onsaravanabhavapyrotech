@extends('layout.app')
@section('main_content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">States</h4>
        </div>
        <div class="card-body">
            <div class="mb-5 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbulkModal">
                    Bulk Upload
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addstateModal">
                    Add State
                </button>
            </div>

            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>State Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach ($states as $state)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $state->state }}</td>
                        <td>
                            <button type="button" class="btn btn-success waves-effect waves-light editstate" 
                                data-bs-toggle="modal" data-bs-target="#editstateModal" 
                                data-id="{{ $state->id }}" data-name="{{ $state->state }}">
                                <i class="bx bx-link-external font-size-16 align-middle me-2"></i>
                            </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light deletestate" data-id="{{ $state->id }}">
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

{{-- Add State Modal --}}
<div class="modal fade" id="addstateModal" tabindex="-1" aria-labelledby="addstateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addstateModalLabel">Add State</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="state_add_form">
                    <div class="mb-3">
                        <label class="form-label">State Name</label>
                        <input type="text" class="form-control" name="state" placeholder="Enter State Name" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit State Modal --}}
<div class="modal fade" id="editstateModal" tabindex="-1" aria-labelledby="editstateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editstateModalLabel">Edit State</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="state_edit_form">
                    <input type="hidden" name="state_id" id="edit_state_id">
                    <div class="mb-3">
                        <label class="form-label">State Name</label>
                        <input type="text" class="form-control" name="state" id="edit_state_name" required>
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
                <h1 class="modal-title fs-5" id="addbulkModalLabel">Bulk Upload States</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bulk_upload_state">
                    <div class="mb-3">
                        <label class="form-label">Upload CSV File</label>
                        <input type="file" class="form-control" name="file" accept=".csv" required>
                    </div>
                    <a href="{{ route('state.export') }}" download class="btn btn-secondary mb-3">Download Current Data</a>
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
    // Add State
    $('#state_add_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('state.add') }}",
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
    $('.editstate').click(function() {
        $('#edit_state_id').val($(this).data('id'));
        $('#edit_state_name').val($(this).data('name'));
    });

    // Update State
    $('#state_edit_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('state.update') }}",
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

    // Delete State
    $('.deletestate').click(function() {
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
                    url: "/state/delete/" + id,
                    type: "GET",
                    success: function(res) {
                        location.reload();
                    }
                });
            }
        });
    });

    // Bulk Upload
    $('#bulk_upload_state').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_token', "{{ csrf_token() }}");
        $.ajax({
            url: "{{ route('state.bulkUpload') }}",
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
