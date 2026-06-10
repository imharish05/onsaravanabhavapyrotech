@extends('layout.app')
@section('title', 'Edit Permission')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Permissions</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-body px-4 py-3">
                        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <!-- Permission Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Permission Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $permission->name) }}" required style="max-width:30rem;">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label class="form-label">Navbar</label>
                                    <select name="navbar_id" class="form-control dropdown bootstrap-select" required>
                                        <option value="" disabled>Select Navbar</option>
                                        @foreach ($navbars as $nav)
                                            <option value="{{ $nav->id }}" {{ $permission->navbar_id == $nav->id ? 'selected' : '' }}>
                                                {{ $nav->navbar_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success mt-4" type="submit">Update</button>
                            <a href="{{ route('permissions.index') }}"
                                class="btn btn-secondary mt-4">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
