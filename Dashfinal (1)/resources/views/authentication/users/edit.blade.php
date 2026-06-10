@extends('layout.app')
@section('title', 'Edit User')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ route('authentication.users.update', ['slug' => auth()->user()->slug, 'user' => $users->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">

                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $users->name ?? '') }}" required style="max-width:30rem;">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Role -->
                                <div class="col-md-6" style="width:31rem;">
                                    <label class="form-label">Role</label>
                                    <select name="role_id" class="form-control dropdown bootstrap-select" required
                                        style="max-width:30rem;">
                                        <option value="" disabled>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ old('role_id', $users->roles && $users->roles->isNotEmpty() ? $users->roles->first()->id : '') == $role->id ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $users->email ?? '') }}" required style="max-width:30rem;">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" style="max-width:30rem;">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control"
                                        value="{{ old('phone_number', $users->phone_number ?? '') }}" pattern="[0-9]{10}"
                                        required style="max-width:30rem;">
                                    @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Pin code -->
                                <div class="col-md-6">
                                    <label class="form-label">Pin Code</label>
                                    <input type="text" name="pin_code" class="form-control"
                                        value="{{ old('pin_code', $users->pin_code ?? '') }}" pattern="[0-9]{6}" required
                                        style="max-width:30rem;">
                                    @error('pin_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control"
                                        value="{{ old('slug', $users->slug ?? '') }}" style="max-width:30rem;" required>
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                            </div>

                            <button class="btn btn-primary mt-4" type="submit">Update</button>
                            <a href="{{ route('authentication.users', ['slug' => auth()->user()->slug]) }}"
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
