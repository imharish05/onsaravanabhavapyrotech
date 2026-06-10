@extends('layout.app')
@section('main_content')

<style>
    /* Content Page Background */
    body {
        background-color: #f7f7f7 !important;
    }
    
    .staff-container {
        padding: 20px 30px;
    }
    
    .staff-card {
        background: #ffffff;
        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0,0,0,0.02);
        border: 1px solid #eaeaea;
        padding-bottom: 20px;
        margin-bottom: 30px;
    }
    
    .staff-header-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 24px 24px 15px 24px;
    }
    
    .staff-title {
        font-family: 'Inter', 'Roboto', sans-serif;
        font-weight: 600;
        font-size: 15px;
        color: #2b2b2b;
        margin-bottom: 4px;
        letter-spacing: 0.3px;
    }
    
    .staff-subtitle {
        font-family: 'Inter', 'Roboto', sans-serif;
        font-size: 12.5px;
        color: #8f8f8f;
        letter-spacing: 0.2px;
    }
    
    .btn-add-staff {
        background-color: #f5f6f8;
        border: 1px solid #e2e5ec;
        border-radius: 4px;
        padding: 6px 14px;
        color: #555;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.2s;
    }
    
    .btn-add-staff:hover {
        background-color: #e9ecef;
        color: #333;
    }
    
    /* Table Styling */
    .staff-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .staff-table th {
        font-family: 'Inter', 'Roboto', sans-serif;
        font-size: 12px;
        color: #000;
        font-weight: 700;
        text-align: left;
        padding: 14px 24px;
        border-top: 1px solid #f0f0f0;
        border-bottom: 1px solid #f0f0f0;
        background-color: #fff;
    }
    
    .staff-table td {
        padding: 12px 24px;
        border-bottom: 1px solid #f0f0f0;
        vertical-align: middle;
        font-family: 'Inter', 'Roboto', sans-serif;
        font-size: 13px;
        color: #333;
    }
    
    /* Inputs inside table */
    .styled-input {
        border: 1px solid #e0e0e0;
        border-radius: 4px;
        padding: 8px 12px;
        width: 100%;
        max-width: 220px;
        font-size: 13px;
        color: #555;
        background-color: #fff;
    }
    
    .styled-input:disabled {
        background-color: #fff; /* Keep it white like the image */
        color: #888;
        letter-spacing: 2px; /* For password dots */
    }
    
    .styled-input:focus {
        outline: none;
        border-color: #ccc;
    }
    
    /* Action Buttons */
    .action-btns {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    
    .btn-icon {
        width: 32px;
        height: 32px;
        border-radius: 4px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        color: white;
        font-size: 14px;
        cursor: pointer;
        transition: opacity 0.2s;
    }
    
    .btn-icon:hover {
        opacity: 0.85;
    }
    
    .btn-green {
        background-color: #66cc66; /* Match image green */
    }
    
    .btn-red {
        background-color: #f75d59; /* Match image red */
    }
    
    .footer-text {
        text-align: center;
        margin-top: 40px;
        padding-bottom: 20px;
        font-size: 12px;
        color: #999;
        font-family: 'Inter', sans-serif;
        letter-spacing: 0.3px;
    }
</style>

<div class="container-fluid staff-container">

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger mt-2">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="staff-card">
        <div class="staff-header-row">
            <div>
                <div class="staff-title">Manage Staffs</div>
                <div class="staff-subtitle">videos will be displayed from current updation of database.</div>
            </div>
            <div>
                <button type="button" class="btn-add-staff" data-bs-toggle="modal" data-bs-target="#addStaffModal">Add +</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="staff-table">
                <thead>
                    <tr>
                        <th width="8%">Sno</th>
                        <th width="28%">Username</th>
                        <th width="14%">Type</th>
                        <th width="25%">Password</th>
                        <th width="25%">New Password</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sno = 1; @endphp
                    @foreach($staffs as $staff)
                    <tr>
                        <td>{{ $sno++ }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->getRoleNames()->first() ?? 'staff' }}</td>
                        <td>
                            <input type="password" class="styled-input" value="**********" disabled>
                        </td>
                        <td>
                            <form action="{{ route('staff.update', $staff->id) }}" method="POST" class="m-0 p-0 d-flex gap-2">
                                @csrf
                                <input type="password" name="new_password" class="styled-input" placeholder="" required>
                                
                                <div class="action-btns">
                                    <button type="submit" class="btn-icon btn-green"><i class="fas fa-check"></i></button>
                            </form>
                                    <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" class="m-0 p-0" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        <button type="submit" class="btn-icon btn-red"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="footer-text">
        © 2026 Admin Panel- Created <span style="color:red">♥</span> By D Refresh.
    </div>

</div>

<!-- Add Staff Modal -->
<div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStaffModalLabel">Add Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('staff.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email (Username)</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role / Type</label>
                        <select class="form-select" name="role" required>
                            <option value="" disabled selected>Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #2e356b; border-color: #2e356b;">Save Staff</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
