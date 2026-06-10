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
    .qr-preview-card {
        background: #fff;
        padding: 15px;
        border-radius: 12px;
        border: 1px dashed #ced4da;
        text-align: center;
        transition: all 0.3s;
        cursor: pointer;
    }
    .qr-preview-card:hover {
        border-color: var(--premium-primary);
        background: #f8f9ff;
    }
    .qr-preview-card img {
        max-width: 150px;
        border-radius: 8px;
        margin-bottom: 10px;
    }
    .bank-card {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 15px;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }
    .bank-card::after {
        content: "\f19c";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        position: absolute;
        right: -20px;
        bottom: -20px;
        font-size: 100px;
        color: rgba(0,0,0,0.05);
    }
</style>
@endpush

@section('main_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between settings-header">
                <h4 class="mb-sm-0 font-size-18">
                    <i class="fas fa-credit-card me-2"></i> Payment Settings
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

    <form action="{{ route('payment-settings.update') }}" method="POST" enctype="multipart/form-data" id="paymentSettingsForm">
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
                            <button class="nav-link active text-start" id="v-pills-bank-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bank" type="button" role="tab">
                                <i class="fas fa-university"></i> Bank Transfer
                            </button>
                            <button class="nav-link text-start" id="v-pills-qr-tab" data-bs-toggle="pill" data-bs-target="#v-pills-qr" type="button" role="tab">
                                <i class="fas fa-qrcode"></i> QR Codes (UPI)
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    
                    <!-- 1. Bank Details Tab -->
                    <div class="tab-pane fade show active" id="v-pills-bank" role="tabpanel">
                        <div class="card settings-card animate-fade-in">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-university"></i> Bank Account Information</h5>
                                <div class="bank-card mb-4">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Account Holder Name</label>
                                            <input class="form-control" type="text" name="account_name" value="{{ old('account_name', $paymentSetting->account_name ?? '') }}" placeholder="Enter full name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Account Number</label>
                                            <input class="form-control" type="text" name="account_number" value="{{ old('account_number', $paymentSetting->account_number ?? '') }}" placeholder="0000 0000 0000">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Bank Name</label>
                                            <input class="form-control" type="text" name="bank_name" value="{{ old('bank_name', $paymentSetting->bank_name ?? '') }}" placeholder="e.g. HDFC Bank">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">IFSC Code</label>
                                            <input class="form-control" type="text" name="ifsc_code" value="{{ old('ifsc_code', $paymentSetting->ifsc_code ?? '') }}" placeholder="HDFC0001234">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">Branch Name</label>
                                            <input class="form-control" type="text" name="branch_name" value="{{ old('branch_name', $paymentSetting->branch_name ?? '') }}" placeholder="Branch location">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="settings-section-title mt-4"><i class="fas fa-mobile-alt"></i> Mobile Payment Numbers</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Label</label>
                                        <input class="form-control mb-2" type="text" name="gpay_label" value="{{ old('gpay_label', $paymentSetting->gpay_label ?? 'Google Pay') }}" placeholder="e.g. Google Pay">
                                        <label class="form-label">Label Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fab fa-google-pay text-primary"></i></span>
                                            <input class="form-control" type="text" name="gpay_number" value="{{ old('gpay_number', $paymentSetting->gpay_number ?? '') }}" placeholder="Mobile number">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Label</label>
                                        <input class="form-control mb-2" type="text" name="phonepe_label" value="{{ old('phonepe_label', $paymentSetting->phonepe_label ?? 'PhonePe') }}" placeholder="e.g. PhonePe">
                                        <label class="form-label">Label Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fas fa-mobile-alt text-purple"></i></span>
                                            <input class="form-control" type="text" name="phonepe_number" value="{{ old('phonepe_number', $paymentSetting->phonepe_number ?? '') }}" placeholder="Mobile number">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-custom">
                                        <label class="form-label">Payment Instructions / Notes</label>
                                        <textarea class="form-control summernote" name="additional_notes" rows="5" placeholder="e.g. Please share screenshot after payment...">{{ old('additional_notes', $paymentSetting->additional_notes ?? '') }}</textarea>
                                    </div>
                                </div>

                                <h5 class="settings-section-title mt-4"><i class="fas fa-hands-helping"></i> Payment Assistance (Bottom Info)</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Assist Item 1</label>
                                        <input class="form-control" type="text" name="assist_1_text" value="{{ old('assist_1_text', $paymentSetting->assist_1_text ?? '') }}" placeholder="e.g. Pay only after confirmation">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Assist Item 2</label>
                                        <input class="form-control" type="text" name="assist_2_text" value="{{ old('assist_2_text', $paymentSetting->assist_2_text ?? '') }}" placeholder="e.g. Share payment screenshot">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Assist Item 3</label>
                                        <input class="form-control" type="text" name="assist_3_text" value="{{ old('assist_3_text', $paymentSetting->assist_3_text ?? '') }}" placeholder="e.g. Concierge support">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">WhatsApp Concierge Number</label>
                                        <input class="form-control" type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $paymentSetting->whatsapp_number ?? '') }}" placeholder="e.g. +91 98765 43210">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. QR Codes Tab -->
                    <div class="tab-pane fade" id="v-pills-qr" role="tabpanel">
                        <div class="card settings-card">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-qrcode"></i> UPI QR Codes</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Google Pay QR</label>
                                        <div class="qr-preview-card" onclick="$(this).next().click()">
                                            <img id="gpayQrPreview" src="{{ (isset($paymentSetting) && $paymentSetting->gpay_qr_code) ? asset($paymentSetting->gpay_qr_code) : 'https://placehold.co/200x200?text=GPay+QR' }}" alt="GPay QR">
                                            <div class="text-primary small"><i class="fas fa-upload"></i> Upload QR Image</div>
                                        </div>
                                        <input type="file" name="gpay_qr_code" class="hide-input premium-image-input" data-preview="gpayQrPreview" accept="image/*">
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">PhonePe QR</label>
                                        <div class="qr-preview-card" onclick="$(this).next().click()">
                                            <img id="phonepeQrPreview" src="{{ (isset($paymentSetting) && $paymentSetting->phonepe_qr_code) ? asset($paymentSetting->phonepe_qr_code) : 'https://placehold.co/200x200?text=PhonePe+QR' }}" alt="PhonePe QR">
                                            <div class="text-primary small"><i class="fas fa-upload"></i> Upload QR Image</div>
                                        </div>
                                        <input type="file" name="phonepe_qr_code" class="hide-input premium-image-input" data-preview="phonepeQrPreview" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Headers Tab -->
                    <div class="tab-pane fade" id="v-pills-headers" role="tabpanel">
                        <div class="card settings-card">
                            <div class="card-body">
                                <h5 class="settings-section-title"><i class="fas fa-heading"></i> Page Titles & Headings</h5>
                                <div class="mb-custom"style="display:none">
                                    <label class="form-label">Page Title</label>
                                    <input type="text" name="page_title" class="form-control" value="{{ old('page_title', $paymentSetting->page_title ?? '') }}" placeholder="e.g. Payment Information">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Hero Eyebrow</label>
                                        <input type="text" name="hero_eyebrow" class="form-control" value="{{ old('hero_eyebrow', $paymentSetting->hero_eyebrow ?? '') }}" placeholder="e.g. Secured Checkout">
                                    </div>
                                    <div class="col-md-6 mb-custom">
                                        <label class="form-label">Hero Title</label>
                                        <input type="text" name="hero_title" class="form-control" value="{{ old('hero_title', $paymentSetting->hero_title ?? '') }}" placeholder="e.g. Payment Details">
                                    </div>
                                    <div class="col-md-12 mb-custom">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea name="hero_subtitle" class="form-control" rows="2" placeholder="e.g. Official bank and UPI details...">{{ old('hero_subtitle', $paymentSetting->hero_subtitle ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-custom">
                                    <label class="form-label">Main Heading</label>
                                    <textarea name="heading" class="form-control summernote-simple" rows="2">{{ old('heading', $paymentSetting->heading ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Floating Save Bar -->
        <div id="floatingSaveBar" class="floating-save-bar">
            <span><i class="fas fa-info-circle text-primary me-2"></i> Unsaved payment updates.</span>
            <button type="submit" class="btn btn-primary btn-rounded px-4 shadow">
                <i class="fas fa-save me-2"></i> Update Payments
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/premium-settings.js') }}"></script>
@endpush
