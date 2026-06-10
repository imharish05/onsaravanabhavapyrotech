@extends('layout.app')
@section('title', 'Edit Role')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Role Edit</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-body px-4 py-3">
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            <div class="row g-3 align-items-end">
                                @method('PUT')
                                <div class="col-md-6 mb-3" style="max-width:30rem;">
                                    <label class="form-label">Role Name</label>
                                    <input type="text" name="name" value="{{ old('name', $role->name) }}"
                                        class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3" style="width:30rem;">
                                    <label class="form-label">Guard Name</label>
                                    <select name="guard_name" class="form-control dropdown bootstrap-select"
                                        style="max-width:30rem;">
                                        <option value="web" {{ $role->guard_name == 'web' ? 'selected' : '' }}>web
                                        </option>
                                    </select>
                                    @error('guard_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('roles.index') }}"
                                class="btn btn-secondary">Cancel</a>
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
