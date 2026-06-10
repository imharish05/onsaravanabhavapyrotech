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
                    <i class="fas fa-info-circle me-2"></i> About Us Settings
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

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show animate-fade-in" role="alert">
            <h5 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i> Please fix the following errors:</h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('about-us-settings.update') }}" method="POST" enctype="multipart/form-data" id="aboutSettingsForm">
        @csrf
        
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-lg-3">
                <div class="card settings-card animate-fade-in">
                    <div class="card-body">
                        <div class="nav flex-column nav-pills nav-settings" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active text-start" id="v-pills-story-tab" data-bs-toggle="pill" data-bs-target="#v-pills-story" type="button" role="tab">
                                <i class="fas fa-book-open"></i> Story & Visuals
                            </button>
                            <button class="nav-link text-start" id="v-pills-stats-tab" data-bs-toggle="pill" data-bs-target="#v-pills-stats" type="button" role="tab">
                                <i class="fas fa-chart-line"></i> Badges & Stats
                            </button>
                            <button class="nav-link text-start" id="v-pills-purpose-tab" data-bs-toggle="pill" data-bs-target="#v-pills-purpose" type="button" role="tab">
                                <i class="fas fa-bullseye"></i> Purpose & CTA
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    
                    <!-- 1. Story & Hero Tab -->
                    <div class="tab-pane fade show active" id="v-pills-story" role="tabpanel">
                        <div class="card settings-card animate-fade-in">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-images"></i> Visuals</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Top Banner Image <small class="text-danger">(1224 x 864 px)</small></label>
                                        <div class="image-preview-card">
                                            <img id="bannerImgPreview" src="{{ (isset($aboutUs) && $aboutUs->banner_image) ? asset($aboutUs->banner_image) : 'https://placehold.co/800x200?text=Banner+Image' }}" alt="Banner">
                                            <div class="mt-2 text-muted small"><i class="fas fa-upload"></i> Change Banner</div>
                                        </div>
                                        <input type="file" name="banner_image" class="hide-input premium-image-input" data-preview="bannerImgPreview" accept="image/*">
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Main Content Image <small class="text-danger">(1224 x 816 px)</small></label>
                                        <div class="image-preview-card">
                                            <img id="mainImgPreview" src="{{ (isset($aboutUs) && $aboutUs->main_image) ? asset($aboutUs->main_image) : 'https://placehold.co/400x400?text=Main+Image' }}" alt="Main">
                                            <div class="mt-2 text-muted small"><i class="fas fa-upload"></i> Change Image</div>
                                        </div>
                                        <input type="file" name="main_image" class="hide-input premium-image-input" data-preview="mainImgPreview" accept="image/*">
                                    </div>
                                    <div class="col-md-4 mb-custom">
                                        <label for="hero_eyebrow" class="form-label">Hero Eyebrow</label>
                                        <input class="form-control" type="text" name="hero_eyebrow" value="{{ old('hero_eyebrow', $aboutUs->hero_eyebrow ?? '') }}" placeholder="Since 2026">
                                    </div>
                                    <div class="col-md-8 mb-custom">
                                        <label for="hero_title" class="form-label">Hero Main Title</label>
                                        <input class="form-control" type="text" name="hero_title" value="{{ old('hero_title', $aboutUs->hero_title ?? '') }}" placeholder="Our About of Brilliance">
                                    </div>
                                    <div class="col-md-12 mb-custom">
                                        <label for="hero_subtitle" class="form-label">Hero Subtitle</label>
                                        <input class="form-control" type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $aboutUs->hero_subtitle ?? '') }}" placeholder="Crafting the Most Spectacular Fireworks...">
                                    </div>
                                </div>

                                <h5 class="settings-section-title mt-4"><i class="fas fa-pen-nib"></i> Hero Content</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-custom">
                                        <label for="eyebrow" class="form-label">Narrative Eyebrow</label>
                                        <input class="form-control" type="text" name="eyebrow" value="{{ old('eyebrow', $aboutUs->eyebrow ?? '') }}" placeholder="Established 2026">
                                    </div>
                                    
                                    
                                    <div class="col-md-12 mb-custom">
                                        <label for="heading" class="form-label">Narrative Heading</label>
                                        <textarea class="form-control summernote-simple" name="heading" rows="2">{{ old('heading', $aboutUs->heading ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-12 mb-custom">
                                        <label for="description" class="form-label">Narrative Body Text</label>
                                        <textarea class="form-control summernote" name="description">{{ old('description', $aboutUs->description ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Badges & Stats Tab -->
                    <div class="tab-pane fade" id="v-pills-stats" role="tabpanel">
                        <div class="card settings-card">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-medal"></i> Quality Badges</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-custom">
                                        <label class="form-label">Badge 1 Text</label>
                                        <input class="form-control" type="text" name="badge1_text" value="{{ old('badge1_text', $aboutUs->badge1_text ?? '') }}" placeholder="Premium Quality">
                                    </div>
                                    <div class="col-md-4 mb-custom">
                                        <label class="form-label">Badge 2 Text</label>
                                        <input class="form-control" type="text" name="badge2_text" value="{{ old('badge2_text', $aboutUs->badge2_text ?? '') }}" placeholder="100% Safe">
                                    </div>
                                    <div class="col-md-4 mb-custom">
                                        <label class="form-label">Badge 3 Text</label>
                                        <input class="form-control" type="text" name="badge3_text" value="{{ old('badge3_text', $aboutUs->badge3_text ?? '') }}" placeholder="Fast Delivery">
                                    </div>
                                </div>

                                <h5 class="settings-section-title mt-4"><i class="fas fa-chart-bar"></i> Success Counters</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-custom">
                                        <label class="form-label">Products Count</label>
                                        <input class="form-control @error('products_count') is-invalid @enderror" type="number" name="products_count" value="{{ old('products_count', $aboutUs->products_count ?? '') }}">
                                        @error('products_count')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-custom">
                                        <label class="form-label">Customers Count</label>
                                        <input class="form-control @error('customers_count') is-invalid @enderror" type="number" name="customers_count" value="{{ old('customers_count', $aboutUs->customers_count ?? '') }}">
                                        @error('customers_count')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-custom">
                                        <label class="form-label">Success Percentage</label>
                                        <input class="form-control @error('success_percentage') is-invalid @enderror" type="number" name="success_percentage" value="{{ old('success_percentage', $aboutUs->success_percentage ?? '') }}" max="100">
                                        @error('success_percentage')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Purpose & CTA Tab -->
                    <div class="tab-pane fade" id="v-pills-purpose" role="tabpanel">
                        <div class="card settings-card">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-bullseye"></i> Our Purpose & Ethics</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Purpose Eyebrow</label>
                                        <input class="form-control" type="text" name="purpose_eyebrow" value="{{ old('purpose_eyebrow', $aboutUs->purpose_eyebrow ?? '') }}">
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Purpose Heading</label>
                                        <input class="form-control" type="text" name="purpose_heading" value="{{ old('purpose_heading', $aboutUs->purpose_heading ?? '') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    @for($i=1; $i<=4; $i++)
                                    <div class="col-md-6 mb-4">
                                        <div class="p-3 border rounded bg-light">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <label class="fw-bold mb-0">Pillar {{ $i }}</label>
                                                <div style="width: 150px;">
                                                    <input class="form-control form-control-sm" type="text" name="p{{ $i }}_icon" value="{{ old('p'.$i.'_icon', $aboutUs->{'p'.$i.'_icon'} ?? '') }}" placeholder="fa-solid fa-star">
                                                </div>
                                            </div>
                                            <label class="small">Title</label>
                                            <input class="form-control mb-2" type="text" name="p{{ $i }}_title" value="{{ old('p'.$i.'_title', $aboutUs->{'p'.$i.'_title'} ?? '') }}">
                                            <label class="small">Description</label>
                                            <textarea class="form-control" name="p{{ $i }}_text" rows="2">{{ old('p'.$i.'_text', $aboutUs->{'p'.$i.'_text'} ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    @endfor
                                </div>

                                <h5 class="settings-section-title mt-4"><i class="fas fa-external-link-alt"></i> Final CTA (Call to Action)</h5>
                                <div class="mb-custom">
                                    <label class="form-label">Banner Title</label>
                                    <input class="form-control" type="text" name="action_text" value="{{ old('action_text', $aboutUs->action_text ?? '') }}" placeholder="Excited to celebrate?">
                                </div>
                                <div class="mb-custom">
                                    <label class="form-label">Banner Description</label>
                                    <textarea class="form-control" name="action_description" rows="2" placeholder="Bringing the magic of lights to your doorstep...">{{ old('action_description', $aboutUs->action_description ?? '') }}</textarea>
                                </div>
                                <div class="row" style="display:none">
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Button Text</label>
                                        <input class="form-control" type="text" name="action_button_text" value="{{ old('action_button_text', $aboutUs->action_button_text ?? '') }}" placeholder="Shop Now">
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Button Link</label>
                                        <input class="form-control" type="text" name="action_button_link" value="{{ old('action_button_link', $aboutUs->action_button_link ?? '') }}" placeholder="/products">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Floating Save Bar -->
        <div id="floatingSaveBar" class="floating-save-bar">
            <span><i class="fas fa-info-circle text-primary me-2"></i> Settings modified!</span>
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
