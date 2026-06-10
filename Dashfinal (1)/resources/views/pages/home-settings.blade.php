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
                    <i class="fas fa-home me-2"></i> Home Page Setup
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

    <form action="{{ route('home-settings.update') }}" method="POST" enctype="multipart/form-data" id="homeSettingsForm">
        @csrf
        
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-lg-3">
                <div class="card settings-card animate-fade-in">
                    <div class="card-body">
                        <div class="nav flex-column nav-pills nav-settings" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active text-start" id="v-pills-welcome-tab" data-bs-toggle="pill" data-bs-target="#v-pills-welcome" type="button" role="tab">
                                <i class="fas fa-hand-sparkles"></i> Welcome Section
                            </button>
                             <button class="nav-link text-start" id="v-pills-offer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-offer" type="button" role="tab">
                                <i class="fas fa-clock"></i> Offer Countdown
                            </button>
                            <button class="nav-link text-start" id="v-pills-order-tab" data-bs-toggle="pill" data-bs-target="#v-pills-order" type="button" role="tab">
                                <i class="fas fa-list-ol"></i> How to Order
                            </button>
                            {{-- <button class="nav-link text-start" id="v-pills-products-tab" data-bs-toggle="pill" data-bs-target="#v-pills-products" type="button" role="tab">
                                <i class="fas fa-shopping-bag"></i> Featured Products
                            </button> --}}
                            <button class="nav-link text-start" id="v-pills-why-tab" data-bs-toggle="pill" data-bs-target="#v-pills-why" type="button" role="tab">
                                <i class="fas fa-question-circle"></i> Why Choose Us
                            </button>
                           
                            
                            <button class="nav-link text-start" id="v-pills-cta-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cta" type="button" role="tab">
                                <i class="fas fa-bullhorn"></i> CTA Banner
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    
                    <!-- 1. Welcome Section Tab -->
                    <div class="tab-pane fade show active" id="v-pills-welcome" role="tabpanel">
                        <div class="card settings-card animate-fade-in">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-edit"></i> Welcome Content</h5>
                                
                                <div class="row">
                                    <div class="col-md-5 mb-custom">
                                        <label for="hero_eyebrow" class="form-label">Hero Eyebrow</label>
                                        <input class="form-control" type="text" id="hero_eyebrow" name="hero_eyebrow" value="{{ old('hero_eyebrow', $homeSetting->hero_eyebrow ?? '') }}" placeholder="e.g. Est. 2026 · Sivakasi">
                                        <div class="hint-text">Small text appearing above the main heading.</div>
                                    </div>
                                    <div class="col-md-7 mb-custom">
                                        <label for="welcome_heading" class="form-label">Main Heading</label>
                                        <textarea class="form-control summernote-simple" id="welcome_heading" name="welcome_heading" rows="2">{{ old('welcome_heading', $homeSetting->welcome_heading ?? '') }}</textarea>
                                        <div class="hint-text">Use Shift+Enter for soft line breaks.</div>
                                    </div>
                                </div>

                                <div class="mb-custom">
                                    <label for="welcome_text" class="form-label">Welcome Description (Supports HTML)</label>
                                    <textarea class="form-control summernote" id="welcome_text" name="welcome_text" rows="5">{{ old('welcome_text', $homeSetting->welcome_text ?? '') }}</textarea>
                                </div>

                                <h5 class="settings-section-title mt-4"><i class="fas fa-certificate"></i> About Image Badge (e.g. 25 Years)</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Badge Number/Count</label>
                                        <input class="form-control" type="text" name="welcome_badge_count" value="{{ old('welcome_badge_count', $homeSetting->welcome_badge_count ?? '') }}" placeholder="e.g. 25">
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Badge Label</label>
                                        <input class="form-control" type="text" name="welcome_badge_label" value="{{ old('welcome_badge_label', $homeSetting->welcome_badge_label ?? '') }}" placeholder="e.g. Years">
                                    </div>
                                </div>

                                <h5 class="settings-section-title mt-4"><i class="fas fa-tags"></i> Feature Badges</h5>
                                <div class="row">
                                    <div class="col-md-3 mb-custom">
                                        <label class="form-label">Badge 1 (🏆)</label>
                                        <input class="form-control" type="text" name="badge1_text" value="{{ old('badge1_text', $homeSetting->badge1_text ?? '') }}" placeholder="No.1 in Sivakasi">
                                    </div>
                                    <div class="col-md-3 mb-custom">
                                        <label class="form-label">Badge 2 (🔥)</label>
                                        <input class="form-control" type="text" name="badge2_text" value="{{ old('badge2_text', $homeSetting->badge2_text ?? '') }}" placeholder="80% Off Sale">
                                    </div>
                                    <div class="col-md-3 mb-custom">
                                        <label class="form-label">Badge 3 (🚀)</label>
                                        <input class="form-control" type="text" name="badge3_text" value="{{ old('badge3_text', $homeSetting->badge3_text ?? '') }}" placeholder="Free Shipping">
                                    </div>
                                    <div class="col-md-3 mb-custom">
                                        <label class="form-label">Badge 4 (🎉)</label>
                                        <input class="form-control" type="text" name="badge4_text" value="{{ old('badge4_text', $homeSetting->badge4_text ?? '') }}" placeholder="Happy Customers">
                                    </div>
                                </div>

                                <h5 class="settings-section-title mt-4"><i class="fas fa-image"></i> Visuals & CTA</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Section Image <small class="text-danger">(1920 x 686 px)</small></label>
                                        <div class="image-preview-card">
                                            <img id="welcomeImgPreview" src="{{ (isset($homeSetting) && $homeSetting->welcome_image) ? asset($homeSetting->welcome_image) : 'https://placehold.co/400x300?text=No+Image' }}" alt="Preview">
                                            <div class="mt-2 text-muted small"><i class="fas fa-cloud-upload-alt"></i> Click to upload</div>
                                        </div>
                                        <input type="file" name="welcome_image" class="hide-input premium-image-input" data-preview="welcomeImgPreview" accept="image/*">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-custom">
                                            <label for="welcome_button_text" class="form-label">Button Text</label>
                                            <input class="form-control" type="text" name="welcome_button_text" value="{{ old('welcome_button_text', $homeSetting->welcome_button_text ?? '') }}" placeholder="READ MORE">
                                        </div>
                                        <div class="mb-custom" style="display:none">
                                            <label for="welcome_button_link" class="form-label">Button Link URL</label>
                                            <input class="form-control" type="text" name="welcome_button_link" value="{{ old('welcome_button_link', $homeSetting->welcome_button_link ?? '') }}" placeholder="/about">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Products Tab -->
                    <div class="tab-pane fade" id="v-pills-products" role="tabpanel">
                        <div class="card settings-card">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-star"></i> Featured Products Selection</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Heading Eyebrow</label>
                                        <input class="form-control" type="text" name="products_eyebrow" value="{{ old('products_eyebrow', $homeSetting->products_eyebrow ?? '') }}" placeholder="Handpicked Selection">
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Section Heading</label>
                                        <input class="form-control" type="text" name="products_heading" value="{{ old('products_heading', $homeSetting->products_heading ?? '') }}" placeholder="Our Best Products">
                                    </div>
                                </div>

                                <div class="mb-custom">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="form-label mb-0">Select Featured Products (Exactly 7 required)</label>
                                        <div id="productCounter" class="selection-counter error">0 / 7 Selected</div>
                                    </div>
                                    
                                    <div class="product-selection-grid" id="productGrid">
                                        @php $selectedIds = old('featured_product_ids', $homeSetting->featured_product_ids ?? []); @endphp
                                        @foreach($products as $product)
                                            <div class="product-select-card {{ in_array($product->id, $selectedIds) ? 'active' : '' }}" data-id="{{ $product->id }}">
                                                <div class="check-icon">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                                <input type="checkbox" name="featured_product_ids[]" value="{{ $product->id }}" class="d-none" {{ in_array($product->id, $selectedIds) ? 'checked' : '' }}>
                                                
                                                <div class="product-select-info">
                                                    <div class="product-select-name" title="{{ $product->product_name }}">{{ $product->product_name }}</div>
                                                    <div class="product-select-meta">{{ $product->category->category_name ?? 'Misc' }}</div>
                                                </div>
                                                <div class="product-select-price">₹{{ number_format($product->product_price, 2) }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="hint-text mt-2"><i class="fas fa-info-circle"></i> Click to select. Exactly 7 products must be selected to save.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Why Choose Us Tab -->
                    <div class="tab-pane fade" id="v-pills-why" role="tabpanel">
                        <div class="card settings-card">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-info-circle"></i> Why Choose Us Layout</h5>
                                
                                @php $whyHeading = $homeSetting->why_heading_data ?? []; @endphp
                                <div class="row bg-light p-3 rounded mb-4 mx-0">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Eyebrow</label>
                                        <input class="form-control" type="text" name="why_heading_data[eyebrow]" value="{{ $whyHeading['eyebrow'] ?? 'Our Promise' }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Title</label>
                                        <input class="form-control" type="text" name="why_heading_data[title]" value="{{ $whyHeading['title'] ?? 'Why Choose Us' }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Subtitle</label>
                                        <input class="form-control" type="text" name="why_heading_data[subtitle]" value="{{ $whyHeading['subtitle'] ?? 'Built on quality...' }}">
                                    </div>
                                </div>

                                <h6 class="mb-3 font-size-15"><i class="fas fa-th-large text-primary me-2"></i> 6 Feature Pillars</h6>
                                @php 
                                    $defaultPillars = [
                                        ['title' => 'Best Quality', 'desc' => 'Every cracker is sourced directly from certified Sivakasi manufacturers.', 'pct' => 98],
                                        ['title' => 'Wide Variety', 'desc' => 'From sparklers to aerial shells — catalogue for every taste and budget.', 'pct' => 96],
                                        ['title' => 'Safety First', 'desc' => 'All products meet government safety standards. Family safety is our priority.', 'pct' => 100],
                                        ['title' => 'Trusted Brand', 'desc' => 'Thousands of happy customers trust us for their festive celebrations.', 'pct' => 97],
                                        ['title' => 'Fast Delivery', 'desc' => 'Pan India delivery with safe, compliant packaging at your doorstep.', 'pct' => 95],
                                        ['title' => '24/7 Support', 'desc' => 'Our team is always available to help with orders, queries and tracking.', 'pct' => 99],
                                    ];
                                    $savedPillars = $homeSetting->why_pillars ?? $defaultPillars; 
                                @endphp
                                <div class="row">
                                    @for($i=0; $i<6; $i++)
                                        <div class="col-md-6 mb-3">
                                            <div class="border p-3 rounded bg-light">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <label class="form-label text-primary fw-bold mb-0">Pillar {{ $i+1 }}</label>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <input type="number" name="why_pillars[{{$i}}][pct]" class="form-control text-center" value="{{ $savedPillars[$i]['pct'] ?? '' }}" placeholder="0">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                                <input class="form-control form-control-sm mb-2" type="text" name="why_pillars[{{$i}}][title]" value="{{ $savedPillars[$i]['title'] ?? '' }}" placeholder="Title">
                                                <textarea class="form-control form-control-sm" name="why_pillars[{{$i}}][desc]" rows="2" placeholder="Description">{{ $savedPillars[$i]['desc'] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
 
                                <h6 class="mb-3 mt-4 font-size-15"><i class="fas fa-list-ol text-warning me-2"></i> Bottom Stats (Numbers)</h6>
                                @php 
                                    $defaultStats = [
                                        ['number' => '5000+', 'label' => 'Happy Customers'],
                                        ['number' => '200+', 'label' => 'Products'],
                                        ['number' => '80%', 'label' => 'Max Discount'],
                                        ['number' => 'Pan India', 'label' => 'Delivery'],
                                    ];
                                    $savedStats = $homeSetting->why_stats ?? $defaultStats; 
                                @endphp
                                <div class="row">
                                    @for($i=0; $i<4; $i++)
                                        <div class="col-md-3 mb-3">
                                            <div class="border p-2 rounded text-center">
                                                <input class="form-control form-control-sm mb-1 text-center fw-bold" type="text" name="why_stats[{{$i}}][number]" value="{{ $savedStats[$i]['number'] ?? '' }}" placeholder="e.g. 5000+">
                                                <input class="form-control form-control-sm text-center text-muted" type="text" name="why_stats[{{$i}}][label]" value="{{ $savedStats[$i]['label'] ?? '' }}" placeholder="Label">
                                            </div>
                                        </div>
                                    @endfor
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- 4. Offer Countdown Tab -->
                    <div class="tab-pane fade" id="v-pills-offer" role="tabpanel">
                        <div class="card settings-card">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-bolt text-warning"></i> Offer Countdown Timer</h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-custom">
                                        <label for="offer_heading" class="form-label">Banner Heading <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                            <input class="form-control" type="text" id="offer_heading" name="offer_heading" value="{{ old('offer_heading', $homeSetting->offer_heading ?? 'Festival Season Sale is Live!') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label for="offer_button_text" class="form-label">Button Text</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-mouse-pointer"></i></span>
                                            <input class="form-control" type="text" id="offer_button_text" name="offer_button_text" value="{{ old('offer_button_text', $homeSetting->offer_button_text ?? 'Shop Now') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-custom">
                                        <label for="offer_subheading" class="form-label">Banner Subheading</label>
                                        <textarea class="form-control" id="offer_subheading" name="offer_subheading" rows="2">{{ old('offer_subheading', $homeSetting->offer_subheading ?? 'Hurry up! Grab your favorite crackers at unbeatable prices.') }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label for="offer_end_date" class="form-label">Countdown End Date & Time <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            <input class="form-control" type="datetime-local" id="offer_end_date" name="offer_end_date" value="{{ old('offer_end_date', $homeSetting->offer_end_date ? date('Y-m-d\TH:i', strtotime($homeSetting->offer_end_date)) : '') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-custom"style="display:none">
                                        <label for="offer_button_link" class="form-label">Button Link</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            <input class="form-control" type="text" id="offer_button_link" name="offer_button_link" value="{{ old('offer_button_link', $homeSetting->offer_button_link ?? '/shop') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-info border-0 shadow-sm mt-3">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-magic fs-4 text-info"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="alert-heading fw-bold">Nexus Intelligence Hint</h6>
                                            <p class="mb-0 small">The countdown strip will automatically hide from the website once the timer expires. Ensure the date is set to the future to keep it visible.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 
                     <!-- 5. How to Order Tab -->
                     <div class="tab-pane fade" id="v-pills-order" role="tabpanel">
                         <div class="card settings-card">
                             <div class="card-body">
                                 <h5 class="settings-section-title"><i class="fas fa-info-circle text-info"></i> How to Order Steps</h5>
                                 
                                 <div class="row">
                                     @php
                                         $default_steps = [
                                             ['title' => 'Download Price List', 'desc' => 'Get our full product catalogue with festival discount prices instantly.'],
                                             ['title' => 'Choose Your Products', 'desc' => 'Select from 200+ products — sparklers, aerial shells, gift boxes & more.'],
                                             ['title' => 'Place Order via WhatsApp', 'desc' => 'Send us your list on WhatsApp and confirm your delivery address.'],
                                             ['title' => 'Fast Pan India Delivery', 'desc' => 'We ship directly from Sivakasi. Safe packaging, on-time delivery guaranteed.'],
                                         ];
                                         $saved_steps = $homeSetting->order_steps ?? $default_steps;
                                     @endphp
 
                                     @for($i = 0; $i < 4; $i++)
                                         <div class="col-md-6 mb-4">
                                             <div class="p-3 border rounded-3 bg-light">
                                                 <h6 class="fw-bold mb-3 text-primary"><i class="fas fa-circle-{{ $i+1 }}"></i> Step {{ $i + 1 }}</h6>
                                                 <div class="mb-3">
                                                     <label class="form-label small fw-bold">Step Title</label>
                                                     <input type="text" name="order_steps[{{ $i }}][title]" class="form-control" value="{{ $saved_steps[$i]['title'] ?? '' }}">
                                                 </div>
                                                 <div>
                                                     <label class="form-label small fw-bold">Step Description</label>
                                                     <textarea name="order_steps[{{ $i }}][desc]" class="form-control" rows="2">{{ $saved_steps[$i]['desc'] ?? '' }}</textarea>
                                                 </div>
                                             </div>
                                         </div>
                                     @endfor
                                 </div>
                             </div>
                         </div>
                     </div>
 
                     <!-- 6. CTA Banner Tab -->
                     <div class="tab-pane fade" id="v-pills-cta" role="tabpanel">
                         <div class="card settings-card animate-fade-in">
                             <div class="card-body">
                                 <h5 class="settings-section-title"><i class="fas fa-bullhorn"></i> CTA Banner Content</h5>
                                 
                                 <div class="row">
                                     <div class="col-md-12 mb-custom">
                                         <label class="form-label">Main Heading</label>
                                         <input type="text" name="cta_data[title]" class="form-control" value="{{ $homeSetting->cta_data['title'] ?? 'Ready to Celebrate in Style?' }}">
                                         <div class="hint-text">Main call to action heading. The "Download" button now automatically generates a dynamic PDF price list.</div>
                                     </div>
                                     <div class="col-md-12 mb-custom">
                                         <label class="form-label">Subheading / Description</label>
                                         <textarea name="cta_data[desc]" class="form-control" rows="3">{{ $homeSetting->cta_data['desc'] ?? 'Download our price list, browse 200+ products, and order directly on WhatsApp. Pan India delivery — straight from Sivakasi to your doorstep.' }}</textarea>
                                     </div>
                                 </div>
 
                                 <div class="row mt-3">
                                     <div class="col-md-6 mb-custom">
                                         <h6 class="fw-bold mb-3 text-primary">Button 1 (Price List)</h6>
                                         <div class="mb-3">
                                             <label class="form-label small">Button Text</label>
                                             <input type="text" name="cta_data[btn1_text]" class="form-control" value="{{ $homeSetting->cta_data['btn1_text'] ?? 'Download Price List' }}">
                                         </div>
                                         <div class="mb-3"style="display:none">
                                             <label class="form-label small">Button Link</label>
                                             <input type="text" name="cta_data[btn1_link]" class="form-control" value="{{ $homeSetting->cta_data['btn1_link'] ?? 'estimate' }}">
                                         </div>
                                     </div>
                                     <div class="col-md-6 mb-custom">
                                         <h6 class="fw-bold mb-3 text-success">Button 2 (WhatsApp)</h6>
                                         <div class="mb-3">
                                             <label class="form-label small">Button Text</label>
                                             <input type="text" name="cta_data[btn2_text]" class="form-control" value="{{ $homeSetting->cta_data['btn2_text'] ?? 'Chat on WhatsApp' }}">
                                         </div>
                                         <div class="mb-3">
                                             <label class="form-label small">WhatsApp Number</label>
                                             <input type="text" name="cta_data[whatsapp]" class="form-control" value="{{ $homeSetting->cta_data['whatsapp'] ?? '' }}" placeholder="Enter number">
                                         </div>
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
            <span><i class="fas fa-info-circle text-primary me-2"></i> You have unsaved changes!</span>
            <button type="submit" class="btn btn-primary btn-rounded px-4 shadow">
                <i class="fas fa-save me-2"></i> Save Settings
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/premium-settings.js') }}"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2
        if ($('.select2').length > 0) {
            $('.select2').select2({
                placeholder: "Click to select products",
                allowClear: true,
                width: '100%'
            });
        }
    });
</script>
@endpush
