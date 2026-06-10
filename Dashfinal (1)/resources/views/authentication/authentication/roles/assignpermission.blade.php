@extends('layout.app')
@section('title', 'Assign Permission')
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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Role</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('roles.assign_permission') }}" method="POST">
                            @csrf
                            <input type="hidden" name="role_id" value="{{ $role->id }}">
                            <div class="row col-md-12">
                                @foreach ($navbars as $nav)
                                    @if ($nav->permissions->count())
                                        <div class="col-md-3 mb-5">
                                            <h6>{{ $nav->navbar_name }}</h6>

                                            @foreach ($nav->permissions as $permission)
                                                <label class="d-block">
                                                    <input type="checkbox" name="permissions[]"
                                                        value="{{ $permission->id }}"
                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                    {{ $permission->name }}
                                                </label>
                                            @endforeach

                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="mt-0">
                                <button type="submit" class="btn btn-primary px-4">Save</button>
                            </div>
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
