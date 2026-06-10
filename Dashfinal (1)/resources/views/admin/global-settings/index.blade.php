@extends('layout.app')

@push('css')
    <link href="{{ asset('assets/css/premium-settings.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .nav-settings .nav-link {
            color: #495057;
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.3s;
        }

        .nav-settings .nav-link.active {
            background-color: var(--premium-primary) !important;
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(85, 110, 230, 0.2);
        }

        .nav-settings .nav-link i {
            margin-right: 10px;
        }
    </style>
@endpush

@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between settings-header">
                    <h4 class="mb-sm-0 font-size-18">
                        <i class="fas fa-globe me-2"></i> Global Configuration
                    </h4>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show animate-fade-in" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.global-settings.update') }}" method="POST" enctype="multipart/form-data"
            id="globalSettingsForm">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Sidebar Navigation -->
                <div class="col-lg-3">
                    <div class="card settings-card animate-fade-in">
                        <div class="card-body">
                            <div class="nav flex-column nav-pills nav-settings" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active text-start" id="v-pills-brand-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-brand" type="button" role="tab">
                                    <i class="fas fa-store"></i> Brand & Logos
                                </button>
                                <button class="nav-link text-start" id="v-pills-social-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-social" type="button" role="tab">
                                    <i class="fas fa-share-alt"></i> Contact & Social
                                </button>
                                <button class="nav-link text-start" id="v-pills-advanced-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-advanced" type="button" role="tab">
                                    <i class="fas fa-code"></i>Top-announcement</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">

                        <!-- 1. Brand Tab -->
                        <div class="tab-pane fade show active" id="v-pills-brand" role="tabpanel">
                            <div class="card settings-card animate-fade-in">
                                <div class="card-body">
                                    <h5 class="settings-section-title"><i class="fas fa-id-card"></i> Brand Identity</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-custom">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" name="company_name" class="form-control"
                                                value="{{ $setting->company_name ?? '' }}">
                                        </div>
                                        <div class="col-md-6 mb-custom">
                                            <label class="form-label">SEO Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control"
                                                value="{{ $setting->meta_title ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-custom">
                                            <label class="form-label">Main Logo <small class="text-danger">(140 x 69
                                                    px)</small></label>
                                            <div class="image-preview-card">
                                                <img id="logoPreview"
                                                    src="{{ ($setting && $setting->logo) ? asset($setting->logo) : 'https://placehold.co/200x60?text=LOGO' }}"
                                                    alt="Logo">
                                                <div class="mt-2 text-muted small"><i class="fas fa-upload"></i> Change Logo
                                                </div>
                                            </div>
                                            <input type="file" name="logo"
                                                class="hide-input premium-image-input @error('logo') is-invalid @enderror"
                                                data-preview="logoPreview" accept="image/*">
                                            @error('logo')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-custom">
                                            <label class="form-label">Favicon <small class="text-danger">(40 x 40
                                                    px)</small></label>
                                            <div class="image-preview-card">
                                                <img id="faviconPreview"
                                                    src="{{ ($setting && $setting->favicon) ? asset($setting->favicon) : 'https://placehold.co/32x32?text=F' }}"
                                                    alt="Favicon" style="width: 32px; height: 32px; object-fit: contain;">
                                                <div class="mt-2 text-muted small"><i class="fas fa-upload"></i> Change Icon
                                                </div>
                                            </div>
                                            <input type="file" name="favicon" class="hide-input premium-image-input"
                                                data-preview="faviconPreview" accept="image/x-icon,image/png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Social Tab -->
                        <div class="tab-pane fade" id="v-pills-social" role="tabpanel">
                            <div class="card settings-card">
                                <div class="card-body">
                                    <h5 class="settings-section-title"><i class="fas fa-phone-alt"></i> Contact Info</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-custom">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control"
                                                value="{{ $setting->phone_number ?? '' }}">
                                        </div>
                                        <div class="col-md-6 mb-custom">
                                            <label class="form-label">WhatsApp Number</label>
                                            <input type="text" name="whatsapp_number" class="form-control"
                                                value="{{ $setting->whatsapp_number ?? '' }}">
                                        </div>
                                        <div class="col-md-12 mb-custom" style="display:none;">
                                            <label class="form-label">Address</label>
                                            <textarea name="address" class="form-control"
                                                rows="2">{{ $setting->address ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-custom">
                                            <label class="form-label">Footer Content</label>
                                            <textarea name="footer_content" class="form-control summernote"
                                                rows="3">{{ $setting->footer_content ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <h5 class="settings-section-title mt-4"><i class="fas fa-hashtag"></i> Social Presence
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Facebook Link</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                                <input type="text" name="facebook_link" class="form-control"
                                                    value="{{ $setting->facebook_link ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Instagram Link</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                                <input type="text" name="instagram_link" class="form-control"
                                                    value="{{ $setting->instagram_link ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Twitter/X Link</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                                <input type="text" name="twitter_link" class="form-control"
                                                    value="{{ $setting->twitter_link ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">LinkedIn Link</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                                <input type="text" name="linkedin_link" class="form-control"
                                                    value="{{ $setting->linkedin_link ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">YouTube Link</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                                <input type="text" name="youtube_link" class="form-control"
                                                    value="{{ $setting->youtube_link ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Advanced Tab -->
                        <div class="tab-pane fade" id="v-pills-advanced" role="tabpanel">
                            <div class="card settings-card">
                                <div class="card-body">
                                    <div class="mb-custom">
                                        <label class="form-label">Top Offer Bar 1 (Supports HTML)</label>
                                        <textarea name="top_offer_text" class="form-control summernote"
                                            rows="3">{{ $setting->top_offer_text ?? '' }}</textarea>
                                    </div>
                                    <div class="mb-custom">
                                        <label class="form-label">Top Offer Bar 2 (Supports HTML)</label>
                                        <textarea name="top_offer_text_2" class="form-control summernote"
                                            rows="3">{{ $setting->top_offer_text_2 ?? '' }}</textarea>
                                    </div>

                                    <!-- <h5 class="settings-section-title mt-4"><i class="fas fa-terminal"></i> Custom Tracking Codes</h5>
                                            <div class="mb-custom">
                                                <label class="form-label">Header Scripts (Analytics/Pixel)</label>
                                                <textarea name="header_codes" class="form-control text-muted bg-light" rows="10" placeholder="<script>...</script>">{{ $setting->header_codes ?? '' }}</textarea>
                                                <div class="hint-text mt-2">These codes will be injected directly into the <code>&lt;head&gt;</code> section.</div>
                                            </div> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Floating Save Bar -->
            <div id="floatingSaveBar" class="floating-save-bar">
                <span><i class="fas fa-info-circle text-primary me-2"></i> Global settings modified.</span>
                <button type="submit" class="btn btn-primary btn-rounded px-4 shadow">
                    <i class="fas fa-save me-2"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/premium-settings.js') }}"></script>
@endpush