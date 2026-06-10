@extends('layouts.default')

@section('main-page')
<div class="bank-page-wrap">
    <!-- ========================
         PREMIUM HERO BANNER
         ======================== -->
    <section class="premium-hero bank-hero">
        <div class="hero-parallax-bg" style="background-image: url('{{ asset('assets/img/bg.jpg') }}');"></div>
        <div class="hero-glass-overlay"></div>

        <div class="hero-content-wrap">
            <div class="container">
                <div class="hero-text-center">
                    <span class="hero-eyebrow"><i class="fa-solid fa-lock"></i> {{ $payment->hero_eyebrow ?? 'Secured Checkout' }}</span>
                    <h1 class="hero-display-title">{!! $payment->hero_title ?? 'Payment <span>Details</span>' !!}</h1>
                    <div class="hero-sep"></div>
                    <p class="hero-subtitle">
                        {{ $payment->hero_subtitle ?? 'Official bank and UPI details for Sri Shyam Crackers. Verify your order with our team before completing payment.' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="scroll-prompt">
            <div class="scroll-mouse">
                <span class="scroll-dot"></span>
            </div>
        </div>
    </section>


    <!-- ========================
         PAYMENT INFORMATION
         ======================== -->
    <section class="payment-interface">
        <div class="section-pattern-overlay"></div>
        <div class="container">
            <div class="section-header text-center">
                <span class="p-eyebrow">Transaction Methods</span>
                <h2 class="p-title">{{ $payment->heading ?? 'Account Information' }}</h2>
                <div class="p-title-sep"></div>
                @if(!empty($payment->additional_notes))
                    <p class="p-subtitle">{{ $payment->additional_notes }}</p>
                @else
                    <p class="p-subtitle">Use any one of the payment methods below and share the payment screenshot with our concierge.</p>
                @endif
            </div>

            <div class="row g-4 justify-content-center payment-grid">
                <div class="col-xl-4 col-md-6">
                    <div class="finance-card bank-mode">
                        <div class="card-top">
                            <div class="f-icon-wrap"><i class="fa-solid fa-building-columns"></i></div>
                            <div>
                                <span class="method-kicker">NEFT / IMPS / Bank</span>
                                <h3 class="f-account-type">Bank Transfer</h3>
                            </div>
                        </div>

                        <div class="f-data-list">
                            <div class="f-data-point">
                                <span class="f-label">Bank Name</span>
                                <span class="f-val">{{ $payment->bank_name ?? 'N/A' }}</span>
                            </div>
                            <div class="f-data-point">
                                <span class="f-label">Account Number</span>
                                <button type="button" class="f-val highlight copy-trigger" data-copy="{{ $payment->account_number ?? '' }}">
                                    <span>{{ $payment->account_number ?? 'N/A' }}</span>
                                    <i class="fa-solid fa-copy"></i>
                                </button>
                            </div>
                            <div class="f-data-point">
                                <span class="f-label">IFSC Code</span>
                                <button type="button" class="f-val highlight copy-trigger" data-copy="{{ $payment->ifsc_code ?? '' }}">
                                    <span>{{ $payment->ifsc_code ?? 'N/A' }}</span>
                                    <i class="fa-solid fa-copy"></i>
                                </button>
                            </div>
                        </div>

                        @if(!empty($payment->account_name))
                            <div class="f-account-holder">
                                <i class="fa-solid fa-user-check"></i>
                                <span>{{ $payment->account_name }}</span>
                            </div>
                        @endif
                        <div class="v-hover-glow"></div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-6">
                    <div class="finance-card upi-card">
                        <div class="card-top">
                            <div class="f-icon-wrap gpay"><i class="fa-brands fa-google-pay"></i></div>
                            <div>
                                <span class="method-kicker">UPI Payment</span>
                                <h3 class="f-account-type">{{ $payment->gpay_label ?? 'Google Pay' }}</h3>
                            </div>
                        </div>

                        <div class="upi-number">
                            <span class="f-label">Mobile Number</span>
                            <button type="button" class="f-val lg highlight copy-trigger" data-copy="{{ $payment->gpay_number ?? '' }}">
                                <span>{{ $payment->gpay_number ?? 'N/A' }}</span>
                                <i class="fa-solid fa-copy"></i>
                            </button>
                        </div>

                        <div class="qr-frame">
                            @if(!empty($payment->gpay_qr_code))
                                <img src="{{ str_replace('http://', '//', env('MAIN_URL', '/')) . $payment->gpay_qr_code }}" alt="Google Pay QR" class="qr-thumb qr-zoom">
                            @else

                                <div class="qr-na">QR Not Available</div>
                            @endif
                        </div>

                        {{-- <button type="button" class="qr-action qr-zoom-btn" data-src="{{ !empty($payment->gpay_qr_code) ? str_replace('http://', '//', env('MAIN_URL', '/')) . $payment->gpay_qr_code : '' }}" data-caption="Google Pay QR">
                            <i class="fa-solid fa-qrcode"></i>
                            <span>View QR</span>
                        </button> --}}
                        <div class="v-hover-glow"></div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-6">
                    <div class="finance-card upi-card">
                        <div class="card-top">
                            <div class="f-icon-wrap phonepe"><i class="fa-solid fa-mobile-screen-button"></i></div>
                            <div>
                                <span class="method-kicker">UPI Payment</span>
                                <h3 class="f-account-type">{{ $payment->phonepe_label ?? 'PhonePe' }}</h3>
                            </div>
                        </div>

                        <div class="upi-number">
                            <span class="f-label">Mobile Number</span>
                            <button type="button" class="f-val lg highlight copy-trigger" data-copy="{{ $payment->phonepe_number ?? '' }}">
                                <span>{{ $payment->phonepe_number ?? 'N/A' }}</span>
                                <i class="fa-solid fa-copy"></i>
                            </button>
                        </div>

                        <div class="qr-frame">
                            @if(!empty($payment->phonepe_qr_code))
                                <img src="{{ str_replace('http://', '//', env('MAIN_URL', '/')) . $payment->phonepe_qr_code }}" alt="PhonePe QR" class="qr-thumb qr-zoom">
                            @else

                                <div class="qr-na">QR Not Available</div>
                            @endif
                        </div>

                        {{-- <button type="button" class="qr-action qr-zoom-btn" data-src="{{ !empty($payment->phonepe_qr_code) ? str_replace('http://', '//', env('MAIN_URL', '/')) . $payment->phonepe_qr_code : '' }}" data-caption="PhonePe QR">
                            <i class="fa-solid fa-qrcode"></i>
                            <span>View QR</span>
                        </button> --}}
                        <div class="v-hover-glow"></div>
                    </div>
                </div>

            </div>

            <div class="payment-assist">
                <div class="assist-item">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span>{{ $payment->assist_1_text ?? 'Pay only after order confirmation' }}</span>
                </div>
                <div class="assist-item">
                    <i class="fa-solid fa-receipt"></i>
                    <span>{{ $payment->assist_2_text ?? 'Share screenshot for faster verification' }}</span>
                </div>
                <div class="assist-item">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>{{ $payment->assist_3_text ?? 'Concierge support available on WhatsApp' }}</span>
                </div>
            </div>
        </div>
    </section>

    <div id="qrLightbox" class="premium-modal" aria-hidden="true">
        <div class="modal-backdrop"></div>
        <div class="modal-dialog" role="dialog" aria-modal="true" aria-label="Payment QR">
            <button type="button" class="close-modal" aria-label="Close">&times;</button>
            <div class="modal-body">
                <img id="enlargedQR" src="" alt="Payment QR">
                <div class="modal-caption" id="qrCaption"></div>
            </div>
        </div>
    </div>

    @include('pages._cracker-canvas')


</div>

<style>
    :root {
        --gold: #D4860A;
        --gold-light: #F0A832;
        --ivory: #080810;
        --cream: #0c0c18;
        --ink: #FFFFFF;
        --font-display: 'Outfit', sans-serif;
    }


    .bank-page-wrap {
        background: var(--ivory);
        color: var(--ink);
        overflow-x: hidden;
        font-family: var(--font-display);
    }


    .bank-page-wrap > section {
        position: relative;
        z-index: 2; /* Content base level */
    }

    .cracker-canvas-wrap {
        z-index: 4 !important; /* Above section backgrounds but below content-wrap */
    }

    .bank-page-wrap .container {
        position: relative;
        z-index: 10; /* Keep text/buttons interactive and above canvas */
    }


    .About-footer {
        position: relative;
        z-index: 10;
    }

    .premium-hero {
        height: 75vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero-parallax-bg {
        position: absolute;
        inset: -10%;
        background-size: cover;
        background-position: center;
        z-index: 1;
        opacity: 0.4;
    }

    .hero-glass-overlay {
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 50%, rgba(8,8,16,0.3) 0%, rgba(8,8,16,0.95) 100%);
        z-index: 2;
        backdrop-filter: blur(8px);
    }

    .hero-content-wrap { position: relative; z-index: 10; text-align: center; }

    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.15);
        padding: 8px 24px;
        border-radius: 40px;
        color: var(--gold-light);
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 0.75rem;
        margin-bottom: 25px;
    }

    .hero-display-title {
        font-size: clamp(3rem, 8vw, 6rem);
        font-weight: 950;
        margin-bottom: 20px;
        line-height: 1.1;
    }

    .hero-display-title span {
        background: linear-gradient(135deg, var(--gold-light), var(--gold));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 0 20px rgba(240,168,50,0.3));
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: rgba(255,255,255,0.6);
        max-width: 720px;
        margin: 0 auto;
        line-height: 1.7;
    }


    .payment-interface {
        padding: 120px 0;
        position: relative;
        z-index: 5;
        background: linear-gradient(to bottom, transparent, var(--cream));
    }

    .section-pattern-overlay {
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(240,168,50,0.08) 1.5px, transparent 1.5px);
        background-size: 50px 50px;
        opacity: 0.3;
        z-index: -1;
    }

    .p-eyebrow {
        color: var(--gold-light);
        font-weight: 800;
        letter-spacing: 4px;
        text-transform: uppercase;
        font-size: 0.85rem;
        display: block;
        margin-bottom: 15px;
    }

    .p-title { font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 950; margin-bottom: 20px; }

    .p-title-sep {
        width: 100px; height: 5px;
        background: linear-gradient(90deg, transparent, var(--gold), transparent);
        margin: 0 auto 40px;
        border-radius: 3px;
    }

    /* --- FINANCE CARDS --- */
    .finance-card {
        position: relative;
        background: rgba(12, 12, 24, 0.45); /* Darker, more solid for readability */
        border: 1px solid rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 32px;
        padding: 40px;
        height: 100%;
        display: flex;
        flex-direction: column;
        gap: 30px;
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        overflow: hidden;
        opacity: 1; 
    }

    .finance-card:hover {
        transform: translateY(-15px);
        border-color: rgba(240,168,50,0.4);
        box-shadow: 0 40px 80px rgba(0,0,0,0.7);
    }

    .v-hover-glow {
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at var(--mx, 50%) var(--my, 50%), rgba(240,168,50,0.12) 0%, transparent 70%);
        opacity: 0; transition: opacity 0.4s; pointer-events: none;
    }

    .finance-card:hover .v-hover-glow { opacity: 1; }

    .card-top {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 5px;
    }

    .f-icon-wrap {
        flex-shrink: 0;
        width: 64px; height: 64px; border-radius: 20px;
        display: flex; align-items: center; justify-content: center;
        background: linear-gradient(135deg, var(--gold-light), var(--gold));
        color: var(--ivory); font-size: 1.8rem;
        box-shadow: 0 12px 25px rgba(240,168,50,0.25);
    }

    .f-icon-wrap.gpay { background: #fff; padding: 12px; }
    .f-icon-wrap.gpay i { font-size: 1.6rem; color: #1a73e8; }
    .f-icon-wrap.phonepe { background: #5f259f; color: #fff; }

    .method-kicker {
        font-size: 0.75rem; font-weight: 800; letter-spacing: 2px;
        text-transform: uppercase; color: var(--gold-light); display: block;
    }

    .f-account-type { 
        font-size: 1.8rem; 
        font-weight: 950; 
        margin: 5px 0 0; 
        text-transform: capitalize; /* Fixes "google pay" case */
    }


    .f-data-list { display: grid; gap: 20px; }

    .f-data-point, .upi-number {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        padding: 20px 25px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        transition: all 0.3s;
    }

    .f-data-point:hover, .upi-number:hover {
        background: rgba(255,255,255,0.07);
        border-color: rgba(240,168,50,0.3);
    }

    .f-label {
        font-size: 0.7rem; font-weight: 800; letter-spacing: 1.5px;
        text-transform: uppercase; color: rgba(255,255,255,0.4);
    }

    .f-val { font-size: 1.15rem; font-weight: 700; color: #fff; line-height: 1.4; word-break: break-all; }
    .f-val.highlight { 
        color: var(--gold-light); 
        display: flex; 
        align-items: center; 
        justify-content: space-between; 
        cursor: pointer;
        padding: 5px 0;
        border: none;
        background: transparent;
        width: 100%;
        text-align: left;
    }
    .f-val.highlight i { 
        color: var(--gold); 
        font-size: 1rem;
        opacity: 0.6;
        transition: opacity 0.3s;
    }
    .f-val.highlight:hover i { opacity: 1; }

    .f-account-holder {
        margin-top: auto; padding-top: 30px;
        border-top: 1px solid rgba(255,255,255,0.08);
        display: flex; align-items: center; gap: 15px;
        color: rgba(255,255,255,0.6); font-weight: 700;
    }

    .f-account-holder i { color: #25D366; font-size: 1.4rem; }


    .upi-card {
        align-items: stretch;
    }

    .qr-frame {
        width: 100%;
        max-width: 230px;
        aspect-ratio: 1 / 1;
        margin: 0 auto;
        border-radius: 24px;
        padding: 12px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 
            0 20px 40px rgba(0,0,0,0.4),
            inset 0 0 0 1px rgba(0,0,0,0.05);
        border: 4px solid rgba(255,255,255,0.1);
    }

    .qr-thumb {
        width: 100%;
        height: 100%;
        object-fit: contain;
        cursor: zoom-in;
        border-radius: 10px;
    }

    .qr-na {
        color: #555;
        font-weight: 900;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.78rem;
    }

    .qr-action {
        margin-top: auto;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.05));
        border: 1.5px solid rgba(255, 255, 255, 0.6);
        color: #FFFFFF;
        border-radius: 999px;
        padding: 12px 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        transition: 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        box-shadow:
            0 0 20px rgba(255, 255, 255, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.5);
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }

    .qr-action:hover {
        transform: translateY(-4px);
        background: linear-gradient(135deg, #FFFFFF, #F0A832);
        color: #111;
        box-shadow:
            0 15px 35px rgba(255, 255, 255, 0.3),
            0 0 0 1px rgba(255, 255, 255, 0.6);
        text-shadow: none;
    }

    .payment-assist {
        position: relative;
        z-index: 4;
        margin-top: 54px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .assist-item {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        min-height: 70px;
        padding: 16px 18px;
        border: 1px solid var(--bank-border);
        border-radius: 16px;
        background: rgba(255,255,255,0.04);
        color: rgba(255,255,255,0.76);
        font-weight: 700;
        text-align: center;
    }

    .premium-modal {
        position: fixed;
        inset: 0;
        z-index: 100000;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 28px;
    }

    .premium-modal.is-open {
        display: flex;
    }

    .modal-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.86);
        backdrop-filter: blur(10px);
    }

    .modal-dialog {
        position: relative;
        z-index: 2;
        width: min(520px, 100%);
        animation: qrZoom 0.28s ease;
    }

    .close-modal {
        position: absolute;
        top: -48px;
        right: 0;
        width: 40px;
        height: 40px;
        border: 1px solid rgba(255,255,255,0.24);
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
        color: #fff;
        font-size: 1.8rem;
        line-height: 1;
    }

    .modal-body {
        border: 2px solid rgba(255, 255, 255, 0.6);
        border-radius: 30px;
        background: linear-gradient(145deg, rgba(20, 20, 35, 0.98), rgba(10, 10, 20, 1));
        padding: 34px;
        text-align: center;
        box-shadow: 
            0 40px 100px rgba(0, 0, 0, 0.8),
            0 0 60px rgba(255, 255, 255, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
    }

    .modal-body img {
        width: min(360px, 100%);
        border-radius: 16px;
        background: #fff;
        padding: 14px;
    }

    .modal-caption {
        margin-top: 18px;
        color: var(--gold-light);
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 1.8px;
    }

    /* Stars Animation */
    @media (max-width: 991px) {
        .bank-hero {
            min-height: 520px;
            height: 68vh;
        }

        .payment-interface {
            padding: 80px 0;
        }

        .payment-assist {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 575px) {
        .hero-eyebrow,
        .p-eyebrow {
            letter-spacing: 1.6px;
            font-size: 0.68rem;
        }

        .finance-card {
            min-height: auto;
            padding: 24px;
            border-radius: 20px;
        }

        .card-top {
            align-items: flex-start;
        }

        .f-icon-wrap {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            font-size: 1.45rem;
        }

        .f-account-type {
            font-size: 1.42rem;
        }
    }
    @media screen and (width: 768px) and (height: 1024px) {

        .f-grid {
            grid-template-columns: 1fr 1fr !important;
        }
        }
        @media screen and (width: 820px) and (height: 1180px) {

        .f-grid {
            grid-template-columns: 1fr 1fr !important;
        }
        }
        @media screen and (width: 540px) and (height: 720px) {

        .f-grid {
            grid-template-columns: 1fr 1fr !important;
        }
        }
</style>

@push('scripts')
<script>
(function () {
    // --- SIMPLE COPY & LIGHTBOX ---
    document.querySelectorAll('.copy-trigger').forEach(btn => {
        btn.addEventListener('click', async () => {
            const text = btn.dataset.copy;
            if (!text) return;
            try {
                await navigator.clipboard.writeText(text);
                const icon = btn.querySelector('i');
                const originalClass = icon.className;
                icon.className = 'fa-solid fa-check';
                btn.classList.add('copied');
                setTimeout(() => {
                    icon.className = originalClass;
                    btn.classList.remove('copied');
                }, 2000);
            } catch (err) {
                console.error('Copy failed', err);
            }
        });
    });

    const modal = document.getElementById('qrLightbox');
    const modalImg = document.getElementById('enlargedQR');
    const caption = document.getElementById('qrCaption');

    window.openQR = (src, label) => {
        if (!modal || !modalImg) return;
        modalImg.src = src;
        caption.textContent = label;
        modal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    };

    window.closeQR = () => {
        if (!modal) return;
        modal.classList.remove('is-open');
        document.body.style.overflow = '';
    };
})();
</script>
@endpush
@endsection
