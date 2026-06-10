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
    .map-preview {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #dee2e6;
        height: 250px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .map-preview iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }
</style>
@endpush

@section('main_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between settings-header">
                <h4 class="mb-sm-0 font-size-18">
                    <i class="fas fa-envelope-open-text me-2"></i> Contact Us Settings
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

    <form action="{{ route('contact-us-settings.update') }}" method="POST" enctype="multipart/form-data" id="contactSettingsForm">
        @csrf
        
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-lg-3">
                <div class="card settings-card animate-fade-in">
                    <div class="card-body">
                        <div class="nav flex-column nav-pills nav-settings" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link text-start" id="v-pills-headers-tab" data-bs-toggle="pill" data-bs-target="#v-pills-headers" type="button" role="tab">
                                <i class="fas fa-heading"></i> Page Headers
                            </button>
                            <button class="nav-link active text-start" id="v-pills-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-info" type="button" role="tab">
                                <i class="fas fa-address-book"></i> Contact Details
                            </button>
                            
                            <button class="nav-link text-start" id="v-pills-visuals-tab" data-bs-toggle="pill" data-bs-target="#v-pills-visuals" type="button" role="tab">
                                <i class="fas fa-map-marked-alt"></i> Map & Visuals
                            </button>
                            <!--<button class="nav-link text-start" id="v-pills-steps-tab" data-bs-toggle="pill" data-bs-target="#v-pills-steps" type="button" role="tab">-->
                            <!--    <i class="fas fa-list-ol"></i> Order Steps-->
                            <!--</button>-->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    
                    <!-- 1. Contact Details Tab -->
                    <div class="tab-pane fade show active" id="v-pills-info" role="tabpanel">
                        <div class="card settings-card animate-fade-in">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-id-card"></i> Contact Information</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-custom">
                                        <label for="phone" class="form-label">Phone Number 1</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input class="form-control" type="text" name="phone" value="{{ old('phone', $contactUs->phone ?? '') }}" placeholder="+91 98765 43210">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-custom">
                                        <label for="phone_2" class="form-label">Phone Number 2</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input class="form-control" type="text" name="phone_2" value="{{ old('phone_2', $contactUs->phone_2 ?? '') }}" placeholder="+91 98765 43211">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-custom">
                                        <label for="email" class="form-label">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input class="form-control" type="email" name="email" value="{{ old('email', $contactUs->email ?? '') }}" placeholder="hello@yourbrand.com">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-custom">
                                        <label for="address" class="form-label">Physical Address</label>
                                        <textarea class="form-control" name="address" rows="3" placeholder="Shop No. 12, Fireworks Lane, Sivakasi">{{ old('address', $contactUs->address ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Page Headers Tab -->
                    <div class="tab-pane fade" id="v-pills-headers" role="tabpanel">
                        <div class="card settings-card">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-i-cursor"></i> Hero Content</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Hero Eyebrow</label>
                                        <input class="form-control" type="text" name="hero_eyebrow" value="{{ old('hero_eyebrow', $contactUs->hero_eyebrow ?? '') }}" placeholder="24/7 Concierge">
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Hero Title</label>
                                        <input class="form-control" type="text" name="hero_title" value="{{ old('hero_title', $contactUs->hero_title ?? '') }}" placeholder="Connect with Excellence">
                                    </div>
                                    <div class="col-md-12 mb-custom">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control" name="hero_subtitle" rows="2" placeholder="Our dedicated team is here to assist you...">{{ old('hero_subtitle', $contactUs->hero_subtitle ?? '') }}</textarea>
                                    </div>
                                </div>

                                <h5 class="settings-section-title mt-4"><i class="fas fa-id-card"></i> Section Headers</h5>
                                <div class="mb-custom" style="display:none">
                                    <label for="page_title" class="form-label">Section Eyebrow</label>
                                    <input class="form-control" type="text" name="page_title" value="{{ old('page_title', $contactUs->page_title ?? '') }}" placeholder="Direct Contact">
                                </div>
                                <div class="mb-custom">
                                    <label for="heading" class="form-label">Main Heading</label>
                                    <input class="form-control" type="text" name="heading" value="{{ old('heading', $contactUs->heading ?? '') }}" placeholder="How can we help?">
                                </div>
                                <div class="mb-custom">
                                    <label for="subheading" class="form-label">Description text</label>
                                    <textarea class="form-control summernote" name="subheading" rows="4">{{ old('subheading', $contactUs->subheading ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Map & Visuals Tab -->
                    <div class="tab-pane fade" id="v-pills-visuals" role="tabpanel">
                        <div class="card settings-card">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-map-pin"></i> Location Map</h5>
                                <div class="row">
                                    <div class="col-md-7 mb-custom">
                                        <label class="form-label">Google Maps iframe code</label>
                                        <textarea class="form-control mb-2" id="map_iframe_input" name="map_iframe" rows="6" placeholder='Paste <iframe...> code here'>{{ old('map_iframe', $contactUs->map_iframe ?? '') }}</textarea>
                                        <div class="hint-text"><i class="fas fa-lightbulb text-warning"></i> Tip: Go to Google Maps > Share > Embed map to get this code.</div>
                                    </div>
                                    <div class="col-md-5 mb-custom">
                                        <label class="form-label">Live Preview</label>
                                        <div id="mapPreview" class="map-preview">
                                            @if(isset($contactUs->map_iframe))
                                                {!! $contactUs->map_iframe !!}
                                            @else
                                                <div class="text-muted text-center p-3">
                                                    <i class="fas fa-map-marked-alt fa-3x mb-2"></i><br>
                                                    Map preview will appear here
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!--<h5 class="settings-section-title mt-4"><i class="fas fa-palette"></i> Background Design</h5>-->
                                <!--<div class="row">-->
                                <!--    <div class="col-md-6 mb-custom">-->
                                <!--        <label class="form-label">Contact Form Background</label>-->
                                <!--        <div class="image-preview-card">-->
                                <!--            <img id="bgImgPreview" src="{{ (isset($contactUs) && $contactUs->form_bg_image) ? asset($contactUs->form_bg_image) : 'https://placehold.co/600x400?text=Background+Pattern' }}" alt="BG">-->
                                <!--            <div class="mt-2 text-muted small"><i class="fas fa-image"></i> Change BG Image</div>-->
                                <!--        </div>-->
                                <!--        <input type="file" name="form_bg_image" class="hide-input premium-image-input" data-preview="bgImgPreview" accept="image/*">-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>

                    <!-- 4. Order Steps Tab -->
                    <div class="tab-pane fade" id="v-pills-steps" role="tabpanel">
                        <div class="card settings-card">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-list-ol"></i> How to Order Steps</h5>
                                
                                <div class="row g-4">
                                    <!-- Step 1 -->
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded">
                                            <label class="form-label fw-bold">Step 01 Title</label>
                                            <input class="form-control mb-2" type="text" name="step1_title" value="{{ old('step1_title', $contactUs->step1_title ?? '') }}" placeholder="Select Varieties">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="step1_text" rows="2">{{ old('step1_text', $contactUs->step1_text ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Step 2 -->
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded">
                                            <label class="form-label fw-bold">Step 02 Title</label>
                                            <input class="form-control mb-2" type="text" name="step2_title" value="{{ old('step2_title', $contactUs->step2_title ?? '') }}" placeholder="Secure Estimate">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="step2_text" rows="2">{{ old('step2_text', $contactUs->step2_text ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Step 3 -->
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded">
                                            <label class="form-label fw-bold">Step 03 Title</label>
                                            <input class="form-control mb-2" type="text" name="step3_title" value="{{ old('step3_title', $contactUs->step3_title ?? '') }}" placeholder="Verify & Pay">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="step3_text" rows="2">{{ old('step3_text', $contactUs->step3_text ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Step 4 -->
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded">
                                            <label class="form-label fw-bold">Step 04 Title</label>
                                            <input class="form-control mb-2" type="text" name="step4_title" value="{{ old('step4_title', $contactUs->step4_title ?? '') }}" placeholder="Swift Delivery">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="step4_text" rows="2">{{ old('step4_text', $contactUs->step4_text ?? '') }}</textarea>
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
<script>
    $(document).ready(function() {
        // Map Live Sync
        $('#map_iframe_input').on('input', function() {
            const val = $(this).val();
            if (val.includes('<iframe')) {
                $('#mapPreview').html(val);
            }
        });

        if($('.summernote').length > 0) {
            $('.summernote').summernote({
                height: 150,
                toolbar: [
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['codeview']]
                ]
            });
        }
    });
</script>
@endpush
