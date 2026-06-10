@extends('layout.app')

@section('main_content')
    <div class="col-lg-12">
        <div class="card card-h-100">
            <div class="card-header border-bottom">
                <h4 class="card-title">Theme Color Settings</h4>
                <p class="card-title-desc">Select Primary and Secondary Colors for the dashboard theme.</p>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('theme-settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    {{-- <div class="mb-4 row align-items-center">
                        <label for="logo" class="col-md-2 col-form-label fw-bold">Site Logo <small class="text-danger">(140 x 69 px)</small></label>
                        <div class="col-md-5">
                            <input class="form-control" type="file" id="logo" name="logo" accept="image/*">
                            <small class="text-muted">Recommended format: PNG, JPG, WEBP. Max size: 2MB.</small>
                        </div>
                        <div class="col-md-5">
                            @if(isset($setting) && $setting->logo)
                                <div class="mt-2 text-center" style="background-color: #f8f9fa; padding: 10px; border-radius: 8px; display: inline-block; border: 1px solid #dee2e6;">
                                    <span class="d-block text-muted mb-1" style="font-size: 12px;">Current Logo</span>
                                    <img src="{{ asset($setting->logo) }}" alt="Site Logo" style="max-height: 80px; max-width: 100%;">
                                </div>
                            @else
                                <span class="text-muted d-inline-block mt-2">No logo uploaded yet.</span>
                            @endif
                        </div>
                    </div> --}}

                    <hr class="my-4">

                    <div class="mb-3 row">
                        <label for="primary_color" class="col-md-2 col-form-label">Primary Color( PrimaryBackground)</label>
                        <div class="col-md-2">
                            <input class="form-control form-control-color" type="color" value="{{ $setting->primary_color ?? '#000000' }}" id="primary_color" name="primary_color">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="secondary_color" class="col-md-2 col-form-label">Secondary Color(Secondary Background)</label>
                        <div class="col-md-2">
                            <input class="form-control form-control-color" type="color" value="{{ $setting->secondary_color ?? '#ffffff' }}" id="secondary_color" name="secondary_color">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tertiary_color" class="col-md-2 col-form-label">Tertiary Color (Text, Highligth, Hover)</label>
                        <div class="col-md-2">
                            <input class="form-control form-control-color" type="color" value="{{ $setting->tertiary_color ?? '#000000' }}" id="tertiary_color" name="tertiary_color">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="quaternary_color" class="col-md-2 col-form-label">Quaternary Color(Buttons, Header)</label>
                        <div class="col-md-2">
                            <input class="form-control form-control-color" type="color" value="{{ $setting->quaternary_color ?? '#ffffff' }}" id="quaternary_color" name="quaternary_color">
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Update Colors</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection