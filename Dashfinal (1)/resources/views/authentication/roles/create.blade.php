@extends('layout.app')
@section('title', 'Create Role')
@section('content')
    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!--card-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Roles Create</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-body px-4 py-3">
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="row g-3 align-items-end"> <!-- g-3 adds spacing between columns -->
                                <!-- Name -->
                                <div class="col-md-6" style="width:30rem;">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Guard Name -->
                                <div class="col-md-6" style="width:30rem;">
                                    <label class="form-label">Guard Name</label>
                                    <select name="guard_name" class="form-control dropdown bootstrap-select"
                                        style="max-width:30rem;">
                                        <option value="web" {{ old('guard_name') == 'web' ? 'selected' : '' }}>web
                                        </option>
                                    </select>
                                    @error('guard_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Submit</button>
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
