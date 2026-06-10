@extends('layout.app')
@section('title', 'Create User')
@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Company Details</h4>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card-body px-4 py-3">

                    <form action="{{ route('authentication.users.update', ['slug' => auth()->user()->slug, 'user' => $users->id]) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <!-- Company Name -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $users->name) }}" required>
                            </div>

                            <!-- PAN -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">PAN Number</label>
                                <input type="text" name="pan_number" class="form-control"
                                    value="{{ old('pan_number', $users->pan_number) }}">
                            </div>

                            <!-- GST -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">GST Number</label>
                                <input type="text" name="gst_number" class="form-control"
                                    value="{{ old('gst_number', $users->gst_number) }}">
                            </div>

                        </div>

                        <div class="row mt-4">

                            <!-- Phone -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone_number" class="form-control"
                                    value="{{ old('phone_number', $users->phone_number) }}" required>
                            </div>

                            <!-- WhatsApp -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">WhatsApp</label>
                                <input type="text" name="whatsapp_number" class="form-control"
                                    value="{{ old('whatsapp_number', $users->whatsapp_number) }}">
                            </div>

                            <!-- Email -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $users->email) }}" required>
                            </div>

                            <!-- Address -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3">{{ old('address', $users->address) }}</textarea>
                            </div>

                            <!-- State -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">State</label>
                                <select name="state_id" class="form-control" required>
                                    @foreach (\App\Models\State::orderBy('name')->get() as $state)
                                        <option value="{{ $state->id }}"
                                            {{ old('state_id', $users->state_id) == $state->id ? 'selected' : '' }}>
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- City -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">City</label>
                                <select name="city_id" class="form-control" required>
                                    @foreach (\App\Models\City::where('state_id',$users->state_id)->get() as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city_id', $users->city_id) == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Pin -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Pin Code</label>
                                <input type="text" name="pin_code" class="form-control"
                                    value="{{ old('pin_code', $users->pin_code) }}" readonly>
                            </div>

                            <!-- Website -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Website</label>
                                <input type="url" name="website_link" class="form-control"
                                    value="{{ old('website_link', $users->website_link) }}">
                            </div>

                            <!-- Slug -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control"
                                    value="{{ old('slug', $users->slug) }}">
                            </div>

                            <!-- Logo Preview -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                @if($users->logo)
                                    <img src="{{ asset('storage/'.$users->logo) }}" width="120" class="mt-2">
                                @endif
                            </div>

                            <!-- QR Preview -->
                            <div class="col-md-4 mt-3">
                                <label class="form-label">UPI QR</label>
                                <input type="file" name="upi_qr" class="form-control">
                                @if($users->upi_qr)
                                    <img src="{{ asset('storage/'.$users->upi_qr) }}" width="80" class="mt-2 border p-1">
                                @endif
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success mt-4">Update</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

    {{-- State → City → Pincode Script (No fetch/AJAX - uses PHP data directly) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            $('#stateDropdown').select2({
                placeholder: 'Select State',
                width: '100%'
            });
            $('#cityDropdown').select2({
                placeholder: 'Select City',
                width: '100%'
            });

            // State change → Cities load
            $('#stateDropdown').on('change', function() {
                const stateId = this.value;
                if (!stateId) return;

                document.getElementById('pinCode').value = '';
                $('#cityDropdown').html('<option value="" disabled selected>Loading...</option>').trigger(
                    'change.select2');

                fetch(`/{{ auth()->user()->slug }}/sales/get-cities/${stateId}`, {
                        headers: {
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(cities => {
                        let options = '<option value="" disabled selected>Select City</option>';
                        cities.forEach(city => {
                            options += `<option value="${city.id}">${city.name}</option>`;
                        });
                        $('#cityDropdown').html(options).trigger('change.select2');
                    })
                    .catch(err => {
                        console.error('City fetch error:', err);
                        $('#cityDropdown').html(
                            '<option value="" disabled selected>Error loading</option>');
                    });
            });

            // City change → Pincode load
            $(document).on('change', '#cityDropdown', function() {
                const cityId = this.value;
                if (!cityId) return;

                document.getElementById('pinCode').value = 'Loading...';

                fetch(`/{{ auth()->user()->slug }}/sales/get-pincodes/${cityId}`, {
                        headers: {
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(pincodes => {
                        document.getElementById('pinCode').value = pincodes.length > 0 ? pincodes[0]
                            .pincode : '';
                    })
                    .catch(err => {
                        console.error('Pincode fetch error:', err);
                        document.getElementById('pinCode').value = '';
                    });
            });

        });
    </script>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
