@extends('layout.app')
@section('title', 'Create Permission')
@section('content')
    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!--card-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Permission Create</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-body px-4 py-3">
                        <form action="{{ route('permissions.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <!-- Navbar Dropdown -->
                                <div class="col-md-4">
                                    <label for="navbar" class="form-label">Navbar</label>
                                    <!-- This is the title above the dropdown -->
                                    <select name="navbar_id" class="form-control dropdown bootstrap-select" id="navbar"
                                        required style="max-width:30rem;">
                                        <option value="" selected disabled>Select Navbar</option>
                                        @foreach (DB::table('navbars')->get() as $nav)
                                            <option value="{{ $nav->id }}">{{ $nav->navbar_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Permission Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Permission Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        style="max-width:30rem;">
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
