@extends('layouts.default')

@section('main-page')

@push('styles')
<style>
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
/* ===========================================
   PREMIUM ESTIMATE PAGE STYLES (GOLDEN LIGHT)
   =========================================== */

/* 1. Page & Layout */
.estimate-page { 
    background: var(--cream); 
    min-height: 100vh;
}

.top-summary {
    width: 100%;
    height: 95px;
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0.04));
    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 25px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    z-index: 990;
    box-shadow: 
        0 12px 48px rgba(255, 255, 255, 0.15),
        0 0 0 1px rgba(255, 255, 255, 0.3),
        0 0 60px rgba(255, 255, 255, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.5);
    margin: 40px 0;
    transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}

.top-summary.is-sticky {
    position: fixed;
    top: 100px;
    left: 50%;
    transform: translateX(-50%);
    width: min(100% - 40px, 1100px);
    height: 80px;
    background: rgba(15, 15, 28, 0.95);
    backdrop-filter: blur(30px);
    border: 2px solid rgba(255, 255, 255, 0.6);
    border-radius: 25px;
    margin-bottom: 0;
    box-shadow: 
        0 20px 80px rgba(255, 255, 255, 0.2),
        0 0 0 1px rgba(255, 255, 255, 0.4),
        0 0 100px rgba(255, 255, 255, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.6);
    animation: stickySlideIn 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
}

@keyframes stickySlideIn {
    from { transform: translateX(-50%) translateY(-20px); opacity: 0; }
    to { transform: translateX(-50%) translateY(0); opacity: 1; }
}

.summary-item {
    display: flex;
    align-items: center;
    gap: 15px;
}

.summary-icon {
    width: 45px;
    height: 45px;
    background: var(--gold-deep);
    color: #fff;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    box-shadow: 0 8px 15px rgba(184, 134, 11, 0.2);
}

.summary-label {
    display: block;
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--muted);
}

.summary-value {
    display: block;
    font-family: 'Outfit', sans-serif;
    font-size: 1.4rem;
    font-weight: 900;
    color: #fff !important;
    text-shadow: 0 0 15px rgba(255, 255, 255, 0.4);
}

.summary-divider {
    width: 1px;
    height: 30px;
    background: var(--clay);
}

.order-now-btn {
    background: linear-gradient(135deg, #F0A832, #D4860A);
    color: #111;
    border: none;
    padding: 12px 30px;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 1rem;
    font-weight: 800;
    cursor: pointer;
    position: relative;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    box-shadow: 
        0 10px 30px rgba(240, 168, 50, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.4);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.order-now-btn:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 
        0 20px 40px rgba(240, 168, 50, 0.4),
        0 0 20px rgba(240, 168, 50, 0.2);
    background: linear-gradient(135deg, #FFC107, #F0A832);
}

.order-now-btn i {
    font-size: 1.1rem;
}

.cart-count-pill {
    background: #111;
    color: #fff;
    min-width: 24px;
    height: 24px;
    padding: 0 6px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 900;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* 3. Hero Banner */
.estimate-hero {
    height: 55vh;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: var(--ink);
    text-align: center;
    margin-bottom: 0;
}

.hero-parallax-bg {
    position: absolute;
    inset: 0;
    background-image: url('{{ asset('assets/img/bg.jpg') }}');
    background-size: cover;
    background-position: center;
    opacity: 0.4;
    transform: scale(1.1);
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, transparent, var(--ink) 95%);
}

.hero-title {
    font-family: var(--font-display);
    font-size: 5rem;
    color: #fff;
    position: relative;
    z-index: 10;
    line-height: 1;
    text-shadow:
        0 2px 10px rgba(255, 255, 255, 0.3),
        0 0 40px rgba(255, 255, 255, 0.2),
        0 0 80px rgba(255, 255, 255, 0.1);
}

.hero-title span { 
    background: linear-gradient(135deg, var(--gold-light), var(--gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-family: var(--font-accent);
}

.hero-sub {
    font-size: 1.3rem;
    color: rgba(255,255,255,0.7);
    margin-top: 20px;
    position: relative;
    z-index: 10;
}

/* 4. Table & Products */
.estimate-content { padding-bottom: 120px; }

.search-wrap {
    max-width: 600px;
    margin: 20px auto 60px;
    position: relative;
    z-index: 20;
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);
    padding: 15px 30px;
    border-radius: 40px;
    border: 2px solid rgba(255, 255, 255, 0.5);
    box-shadow: 
        0 12px 48px rgba(255, 255, 255, 0.15),
        0 0 0 1px rgba(255, 255, 255, 0.3),
        0 0 60px rgba(255, 255, 255, 0.1),
        inset 0 1px 1px rgba(255, 255, 255, 0.3);
    display: flex;
    align-items: center;
    gap: 15px;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
}

.search-wrap:hover, .search-wrap:focus-within {
    transform: translateY(-5px);
    border-color: rgba(255, 255, 255, 0.8);
    box-shadow: 
        0 20px 60px rgba(255, 255, 255, 0.2),
        0 0 0 1px rgba(255, 255, 255, 0.4),
        0 0 80px rgba(255, 255, 255, 0.15),
        inset 0 1px 1px rgba(255, 255, 255, 0.4);
}

.search-wrap i { color: var(--gold-deep); font-size: 1.2rem; }

.search-wrap input {
    border: none !important;
    width: 100%;
    font-size: 1.1rem;
    font-weight: 500;
    background: transparent !important;
    color: #fff !important;
    box-shadow: none !important;
    padding: 0;
}

.search-wrap input::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.search-wrap input:focus { outline: none; box-shadow: none !important; }

.clear-search-btn {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
    opacity: 0;
    pointer-events: none;
    transform: scale(0.8);
    flex-shrink: 0;
}

.clear-search-btn.active {
    opacity: 1;
    pointer-events: auto;
    transform: scale(1);
}

.clear-search-btn:hover {
    background: #ff4757;
    border-color: #ff4757;
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(255, 71, 87, 0.4);
}

.table-wrap {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.03));
    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);
    border-radius: 40px;
    padding: 40px;
    box-shadow: 
        0 30px 60px rgba(0, 0, 0, 0.5),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    border: 1.5px solid rgba(255, 255, 255, 0.3) !important;
    position: relative;
}

/* Halo effect behind table */
.table-wrap::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
    filter: blur(80px);
    z-index: -1;
}

table { width: 100%; border-collapse: separate; border-spacing: 0 15px; }

thead th {
    padding: 20px;
    font-size: 0.8rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: var(--muted);
    border-bottom: 2px solid var(--clay);
    text-align: center;
}

.product-row { 
    transition: 0.3s cubic-bezier(0.19, 1, 0.22, 1);
}

.product-row td {
    padding: 25px 15px;
    vertical-align: middle;
    text-align: center;
    background: rgba(255, 255, 255, 0.05);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.product-row td:first-child { border-left: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px 0 0 20px; }
.product-row td:last-child { border-right: 1px solid rgba(255, 255, 255, 0.1); border-radius: 0 20px 20px 0; }

.product-row:hover td { background: var(--off-white); }
.product-row:hover { transform: scale(1.01); }

.product-row img {
    width: 65px;
    height: 65px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.product-name {
    font-weight: 800;
    color: var(--ink);
    font-size: 1.1rem;
    text-align: left !important;
}

.actual { text-decoration: line-through; color: var(--muted); font-size: 0.9rem; }
.price { color: var(--gold-deep); font-weight: 900; font-size: 1.25rem; font-family: 'Outfit', sans-serif; }

.qty-wrapper {
    display: inline-flex;
    align-items: center;
    background: var(--off-white);
    padding: 5px;
    border-radius: 50px;
    border: 1px solid var(--clay);
}

.qty-btn {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #fff;
    color: var(--ink);
    border: 1px solid var(--stone);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.3s;
}

.qty-btn:hover { background: var(--gold-deep); color: #fff; transform: scale(1.1); }

.qty {
    width: 50px !important;
    background: none !important;
    border: none !important;
    text-align: center !important;
    font-weight: 800 !important;
    font-size: 1rem !important;
    color: var(--ink) !important;
}

.rowTotal {
    font-weight: 900;
    color: #fff;
    font-size: 1.15rem;
    font-family: 'Outfit', sans-serif;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
}

.category td {
    background: none !important;
    padding: 60px 0 20px !important;
    text-align: left !important;
    font-family: var(--font-display);
    font-size: 2.2rem;
    color: #fff !important;
    border: none !important;
    text-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
}

.category td span { 
    background: linear-gradient(135deg, var(--gold-light), var(--gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Video Icons */
.video-icon {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #ff4757;
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: 0.3s;
}

.video-icon::after {
    content: '\f04b';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    font-size: 0.8rem;
    margin-left: 2px;
}

.video-icon:hover { transform: scale(1.15); background: #eb3b5a; }
.video-icon.disabled { background: var(--clay); opacity: 0.4; }

/* Cart Drawer */
.cart-drawer {
    position: fixed;
    right: -450px;
    top: 0;
    width: 450px;
    height: 100vh;
    background: #fff;
    z-index: 2000;
    box-shadow: -20px 0 60px rgba(0,0,0,0.15);
    transition: 0.5s cubic-bezier(0.19, 1, 0.22, 1);
    display: flex;
    flex-direction: column;
}

.cart-drawer.active { right: 0; }

.cart-drawer-header {
    padding: 30px;
    background: var(--ink);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.cart-drawer-title { font-family: var(--font-display); font-size: 1.8rem; }
.cart-close-btn { background: none; border: none; color: #fff; font-size: 1.5rem; cursor: pointer; }

.cart-drawer-body { padding: 30px; flex-grow: 1; overflow-y: auto; }

.cart-item-row {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid var(--stone);
}

.cart-item-info { flex-grow: 1; }
.cart-item-title { font-weight: 800; font-size: 0.95rem; color: var(--ink); }
.cart-item-meta { font-size: 0.8rem; color: var(--muted); margin-top: 4px; }

.cart-drawer-footer {
    padding: 30px;
    background: var(--off-white);
    border-top: 1px solid var(--stone);
}

.cart-summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    font-weight: 700;
}

.cart-summary-row.total {
    font-size: 1.5rem;
    color: var(--ink);
    padding-top: 15px;
    border-top: 2px dashed var(--clay);
}

.btn-gold {
    width: 100%;
    background: var(--gold-deep);
    color: #fff;
    border: none;
    padding: 18px;
    border-radius: 15px;
    font-weight: 900;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-gold:hover { background: var(--ink); transform: translateY(-5px); }

/* Progress Bar */
.min-order-wrap { margin-bottom: 25px; }
.min-order-top { display: flex; justify-content: space-between; margin-bottom: 8px; font-weight: 800; font-size: 0.8rem; text-transform: uppercase; }
.min-order-bar-track { height: 8px; background: var(--clay); border-radius: 10px; overflow: hidden; }
.min-order-bar-fill { height: 100%; background: var(--gold-deep); transition: 0.5s; width: 0%; }
.min-order-status { font-size: 0.8rem; color: var(--muted); margin-top: 8px; font-weight: 600; }

/* --- ORDER MODAL REFINED --- */
.order-modal-overlay {
    position: fixed; inset: 0; background: rgba(0,0,0,0.85); backdrop-filter: blur(10px);
    z-index: 2100; display: none; align-items: center; justify-content: center; padding: 20px;
}
.order-modal-box {
    background: #fff; width: min(100%, 650px); border-radius: 40px; position: relative;
    max-height: 90vh; overflow-y: auto; overflow-x: hidden;
    box-shadow: 0 50px 100px rgba(0,0,0,0.5);
    animation: modalPop 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
/* Hide scrollbar for Chrome, Safari and Opera */
.order-modal-box::-webkit-scrollbar { display: none; }
.order-modal-box { -ms-overflow-style: none; scrollbar-width: none; }
@keyframes modalPop { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }

.order-modal-close {
    position: absolute; top: 25px; right: 25px; background: var(--off-white); border: 1px solid var(--stone);
    width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
    cursor: pointer; z-index: 10; transition: 0.3s;
}
.order-modal-close:hover { background: var(--gold-deep); color: #fff; transform: rotate(90deg); }

.order-modal-header { padding: 40px 40px 10px; text-align: center; }
.order-modal-eyebrow { font-size: 0.75rem; font-weight: 800; color: var(--gold-deep); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 5px; }
.order-modal-title { font-family: var(--font-display); font-size: 2.2rem; line-height: 1; color: var(--ink); margin-bottom:15px; }

.order-net-strip {
    background: var(--ink); margin: 20px 40px; border-radius: 20px; padding: 25px 35px;
    display: flex; justify-content: space-between; align-items: center; color: #fff;
}
.net-label { font-size: 0.7rem; font-weight: 800; opacity: 0.6; letter-spacing: 1px; }
.net-value { font-size: 2rem; font-weight: 900; line-height: 1; }
.net-icon { font-size: 1.5rem; color: var(--gold-deep); opacity: 0.5; }

.order-form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
.order-field { display: flex; flex-direction: column; gap: 8px; }
.order-label { font-size: 0.75rem; font-weight: 800; color: var(--ink); letter-spacing: 0.5px; opacity: 0.8; }
.order-input {
    background: var(--off-white); border: 1px solid var(--stone); padding: 16px 20px; border-radius: 12px;
    font-size: 1rem; font-weight: 600; color: var(--ink); transition: 0.3s; width: 100%;
}
.order-input:focus { 
    border-color: var(--gold-light); 
    background: rgba(255,255,255,0.1); 
    outline: none; 
    box-shadow: 0 0 20px rgba(240, 168, 50, 0.15), inset 0 0 10px rgba(255,255,255,0.05); 
}
.order-textarea { resize: none; min-height: 80px; }
.order-select { 
    cursor: pointer; 
    -webkit-appearance: none; 
    appearance: none;
    color-scheme: dark;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23F0A832' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E"); 
    background-repeat: no-repeat; 
    background-position: right 15px center; 
    background-size: 15px; 
}

.order-select option {
    background-color: #0c0c18;
    color: #fff;
    padding: 10px;
}


.order-submit-btn {
    width: 100%; padding: 22px; background: var(--ink); color: #fff; border: none; border-radius: 15px;
    font-size: 1.1rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;
    cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 12px; transition: 0.3s; margin-top: 10px;
}
.order-submit-btn:hover { background: var(--gold-deep); transform: translateY(-5px); box-shadow: 0 15px 30px rgba(184,134,11,0.3); }

.mobile-sticky-bar { display: none; }

/* Mobile Sticky Summary */
@media (max-width: 850px) {
    .top-summary { display: none !important; }
    .hero-title { font-size: 3rem; }
    .table-wrap { padding: 15px; border-radius: 20px; border: none !important; background: transparent; box-shadow: none; }
    
    thead { display: none !important; }
    
    table { border-spacing: 0 10px; }

    /* Product Grid for Mobile */
    .product-row {
        display: block !important;
        position: relative;
        padding: 20px 20px 20px 110px !important;
        min-height: 140px;
        margin-bottom: 15px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 20px !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
    }
    
    .product-row td { 
        display: block; 
        border: none !important; 
        padding: 4px 0 !important; 
        text-align: left !important; 
        background: transparent !important;
    }
    
    .product-row td:first-child { 
        position: absolute; 
        left: 15px; 
        top: 20px; 
        width: 80px; 
        padding: 0 !important;
    }
    
    .product-row td:first-child, 
    .product-row td:first-child img { 
        border-radius: 15px !important; 
    }

    .product-row img { width: 80px; height: 80px; object-fit: cover; }
    
    .product-name { 
        font-size: 1.1rem !important; 
        margin: 0 !important; 
        padding-right: 40px !important;
        color: var(--gold-light) !important;
    }

    /* Video Icon positioning */
    .product-row td:nth-child(3) { 
        position: absolute; 
        right: 15px; 
        top: 20px; 
        padding: 0 !important;
    }
    
    /* Box Content */
    .product-row td:nth-child(4) { 
        font-size: 0.85rem; 
        color: rgba(255,255,255,0.6); 
        margin-bottom: 8px !important;
    }
    
    /* Pricing */
    .product-row td:nth-child(5), 
    .product-row td:nth-child(6) { 
        display: inline-block !important; 
        margin-right: 12px; 
        vertical-align: middle;
    }

    .price { font-size: 1.3rem !important; }
    
    /* Quantity */
    .product-row td:nth-child(7) { 
        margin-top: 15px !important; 
        padding-top: 15px !important;
        border-top: 1px solid rgba(255,255,255,0.1) !important;
    }

    .qty-wrapper { width: 100%; justify-content: space-between; }
    
    /* Total */
    .product-row td:last-child { 
        display: flex; 
        justify-content: space-between;
        align-items: center;
        font-size: 1rem; 
        padding-top: 12px !important; 
        color: #fff !important;
        font-weight: 800;
    }
    
    .product-row td:last-child::before { 
        content: 'Item Total:'; 
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.5; 
    }

    .category td { 
        padding: 50px 15px 15px !important; 
        font-size: 1.8rem; 
        background: transparent !important;
    }

    .mobile-sticky-bar {
        position: fixed;
        bottom: 25px;
        left: 50%;
        transform: translateX(-50%);
        width: min(92%, 400px);
        height: 75px;
        background: linear-gradient(135deg, var(--gold-deep), var(--saffron));
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 12px 0 20px;
        color: #fff;
        z-index: 1001;
        box-shadow: 
            0 20px 40px rgba(0,0,0,0.4),
            0 0 20px rgba(240, 168, 50, 0.2);
        text-decoration: none;
        border: 1px solid rgba(255,255,255,0.3);
        animation: slideUpPill 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    @keyframes slideUpPill {
        from { transform: translateX(-50%) translateY(100px); opacity: 0; }
        to { transform: translateX(-50%) translateY(0); opacity: 1; }
    }

    .msb-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .msb-cart-icon {
        position: relative;
        width: 45px;
        height: 45px;
        background: rgba(255,255,255,0.15);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .msb-count {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #fff;
        color: var(--gold-deep);
        min-width: 20px;
        height: 20px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        font-weight: 900;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        padding: 0 5px;
    }

    .msb-info {
        display: flex;
        flex-direction: column;
    }

    .msb-label {
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.8;
        font-weight: 700;
    }
    
    .msb-total { 
        font-size: 1.4rem; 
        font-weight: 900; 
        line-height: 1;
        font-family: 'Outfit', sans-serif;
    }

    .msb-btn { 
        background: #fff; 
        color: var(--gold-deep); 
        padding: 0 25px; 
        height: 50px;
        border-radius: 16px; 
        font-weight: 900; 
        font-size: 0.85rem; 
        text-transform: uppercase; 
        display: flex;
        align-items: center;
        justify-content: center;
        letter-spacing: 1px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    
    .order-modal-box { padding: 0; border-radius: 30px; width: 95%; background: rgba(15,15,28,0.98); }
    .order-form-grid-2 { grid-template-columns: 1fr; gap: 15px; }
    .order-modal-header { padding: 30px 20px 10px; }
    .order-net-strip { margin: 15px; padding: 20px; }
    .order-field { padding: 0 20px; }
    .order-submit-btn { border-radius: 0 0 30px 30px; margin-top: 20px; padding: 25px; }
}

/* Dark premium polish aligned with home/about/contact */
.estimate-page {
    background:
        linear-gradient(180deg, rgba(8,8,16,0.98), rgba(12,12,24,0.98));
    color: #fff;
}

.estimate-hero {
    min-height: 560px;
    background: #080810;
}

.hero-overlay {
    background:
        radial-gradient(circle at 50% 42%, rgba(240,168,50,0.16), transparent 18rem),
        linear-gradient(to bottom, rgba(8,8,16,0.66), rgba(8,8,16,0.97));
}

.hero-sub {
    color: rgba(255,255,255,0.82);
}

.hero-title span {
    background: linear-gradient(135deg, var(--gold-light), var(--gold));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.estimate-content {
    padding-top: 1px;
    background:
        radial-gradient(circle at 50% 0, rgba(212,134,10,0.1), transparent 28rem),
        linear-gradient(180deg, rgba(8,8,16,0.98), rgba(12,12,24,0.98));
}

.top-summary,
.search-wrap,
.table-wrap {
    background: rgba(15,15,28,0.92);
    border-color: rgba(240,168,50,0.22);
    box-shadow: 0 24px 70px rgba(0,0,0,0.45);
}

.top-summary.is-sticky {
    background: rgba(15,15,28,0.9);
    border-color: rgba(240,168,50,0.28);
}

.summary-value,
.product-name,
.rowTotal,
.category td,
.cart-item-title,
.cart-summary-row.total,
.order-modal-title,
.order-label,
.qty,
.order-input,
.cart-item-total {
    color: #fff !important;
}

.summary-label,
thead th,
.cart-item-meta,
.min-order-status,
.order-input::placeholder {
    color: rgba(255,255,255,0.58);
}

.search-wrap input {
    color: #fff;
}

.search-wrap input::placeholder {
    color: rgba(255,255,255,0.52);
}

.product-row td {
    background: rgba(255,255,255,0.045);
    border-color: rgba(255,255,255,0.1);
}

.product-row:hover td {
    background: rgba(212,134,10,0.1);
}

.actual {
    color: rgba(255,255,255,0.48);
}

.price {
    color: var(--gold-light);
}

.qty-wrapper,
.order-input,
.order-modal-close {
    background: rgba(255,255,255,0.06);
    border-color: rgba(255,255,255,0.12);
}

.qty-btn {
    background: rgba(255,255,255,0.08);
    color: #fff;
    border-color: rgba(255,255,255,0.14);
}

.cart-drawer,
.order-modal-box {
    background: rgba(15,15,28,0.98);
    border-left: 1px solid rgba(240,168,50,0.22);
}

.cart-drawer-header,
.order-net-strip {
    background: #080810;
}

.cart-drawer-footer {
    background: rgba(255,255,255,0.04);
    border-top-color: rgba(255,255,255,0.1);
}

.cart-item-row,
.cart-summary-row.total {
    border-color: rgba(255,255,255,0.1);
}

.order-submit-btn,
.btn-gold {
    background: linear-gradient(135deg, var(--gold-light), var(--gold));
    color: #080810;
    box-shadow: 0 16px 34px rgba(240,168,50,0.24);
}

.order-submit-btn:hover,
.btn-gold:hover {
    background: #fff;
    color: #080810;
}

@media (max-width: 767px) {
    .estimate-hero {
        min-height: 500px;
        height: 62vh;
    }

    .product-row {
        background: rgba(15,15,28,0.92);
        border: 1px solid rgba(240,168,50,0.18);
        border-radius: 18px;
        padding: 14px 14px 14px 110px !important;
    }

    .product-row td {
        background: transparent;
    }
}
.table-wrap{
    overflow: hidden;
}

</style>
@endpush

@php
    $priceList = \App\Models\PriceList::first();
    $minOrder = $priceList ? (float) $priceList->price_data : 0;
@endphp

<div class="estimate-page">

    <!-- 1. CINEMATIC HERO -->
    <section class="estimate-hero">
        <div class="hero-parallax-bg"></div>
        <div class="hero-overlay"></div>
        <div class="container relative z-10 text-center">
            <h1 class="hero-title wow fadeInUp">Price <span>Estimate</span></h1>
            <p class="hero-sub wow fadeInUp" data-wow-delay="0.2s">Direct Sivakasi wholesale rates at your fingertips.</p>
        </div>
    </section>

    <!-- 2. PRODUCTION SELECTION -->
    <section class="estimate-content">
        <div class="container">
            
            <!-- FLOATING SUMMARY (Moved here for natural flow) -->
            <div id="dynamicSummary" class="top-summary wow fadeInUp">
                <div class="summary-item">
                    <div class="summary-icon"><i class="fa-solid fa-receipt"></i></div>
                    <div class="summary-info">
                        <span class="summary-label">Net Total</span>
                        <span class="summary-value notranslate">₹<span id="netTotal">0</span></span>
                    </div>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-item">
                    <div class="summary-icon" style="background: #2ecc71;"><i class="fa-solid fa-piggy-bank"></i></div>
                    <div class="summary-info">
                        <span class="summary-label">Total Gained</span>
                        <span class="summary-value">₹<span id="youSave">0</span></span>
                    </div>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-item">
                    <div class="summary-icon" style="background: var(--ink);"><i class="fa-solid fa-indian-rupee-sign"></i></div>
                    <div class="summary-info">
                        <span class="summary-label">Final Value</span>
                        <span class="summary-value">₹<span id="overallTotal">0</span></span>
                    </div>
                </div>

                <div class="summary-divider"></div>

                <button class="order-now-btn" onclick="openCart()">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Order Now</span>
                    <div class="cart-count-pill" id="cartCount">0</div>
                </button>
            </div>

            <div class="search-wrap wow fadeInUp">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Search for crackers (e.g. Sparklers, Chakkars)...">
                <button type="button" id="clearSearchBtn" class="clear-search-btn" title="Clear Filter"><i class="fa-solid fa-xmark"></i></button>
            </div>

            <div class="table-wrap wow fadeInUp" data-wow-delay="0.1s">
                <table>
                    <thead class="notranslate">
                        <tr>
                            <th><i class="fa-solid fa-camera"></i></th>
                            <th>Product Details</th>
                            <th><i class="fa-solid fa-play"></i></th>
                            <th>Box Content</th>
                            <th>MRP</th>
                            <th>Offer Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="productTable">
                        @foreach($categories as $category)
                            @if($category->products->count() > 0)
                                <tr class="category notranslate" data-category="{{ strtolower($category->category_name) }}">
                                    <td colspan="8"><span>🎇</span> {{ strtoupper($category->category_name) }}</td>
                                </tr>
                                @foreach($category->products as $product)
                                    <tr class="product-row" data-product-id="{{ $product->id }}" data-category="{{ strtolower($category->category_name) }}">
                                        <td>
                                            <img src="{{ $product->product_image ? env('MAIN_URL') . $product->product_image : 'https://via.placeholder.com/100' }}" alt="{{ $product->product_name }}" loading="lazy">
                                        </td>
                                        <td class="product-name">{{ $product->product_name }}</td>
                                        <td>
                                            @if($product->product_video)
                                                <a href="{{ $product->product_video }}" target="_blank" class="video-icon" title="Watch Video"></a>
                                            @else
                                                <span class="video-icon disabled"></span>
                                            @endif
                                        </td>
                                        <td class="notranslate">{{ $product->product_content }}</td>
                                        <td class="actual notranslate">{{ $product->product_mrp_price }}</td>
                                        <td class="price notranslate">{{ $product->product_regular_price }}</td>
                                        <td>
                                            <div class="qty-wrapper">
                                                <button type="button" class="qty-minus qty-btn"><i class="fa-solid fa-minus"></i></button>
                                                <input type="number" class="qty" value="0" min="0" max="999">
                                                <button type="button" class="qty-plus qty-btn"><i class="fa-solid fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td class="rowTotal notranslate">0</td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- 4. CART DRAWER -->
    <div class="cart-drawer" id="cartDrawer">
        <div class="cart-drawer-header">
            <div class="cart-drawer-title"><i class="fa-solid fa-receipt"></i> Order Summary</div>
            <button class="cart-close-btn" onclick="closeCart()"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="cart-drawer-body" id="cartDrawerBody">
            <!-- Items injected by Calculate() -->
        </div>
        <div class="cart-drawer-footer">
            @if($minOrder > 0)
                <div class="min-order-wrap" id="minOrderWrap">
                    <div class="min-order-top">
                        <span class="min-order-label">Minimum Target</span>
                        <span class="min-order-value">₹{{ number_format($minOrder, 0) }}</span>
                    </div>
                    <div class="min-order-bar-track">
                        <div class="min-order-bar-fill" id="minOrderBar"></div>
                    </div>
                    <div class="min-order-status" id="minOrderStatus"></div>
                </div>
            @endif
            <div class="cart-summary-rows">
                <div class="cart-summary-row"><span>Cart Subtotal</span><span id="cartActual">₹0</span></div>
                <div class="cart-summary-row" style="color: #2ecc71;"><span>Your Savings</span><span id="cartSave">- ₹0</span></div>
                <div class="cart-summary-row total"><span>Net Amount</span><span id="cartNet">₹0</span></div>
            </div>
            <button class="btn-gold" id="confirmOrderBtn" onclick="closeCart(); checkOrder();">
                <span>Proceed to Checkout</span> <i class="fa-solid fa-arrow-right"></i>
            </button>
            <button class="btn-continue" id="continueShopBtn" onclick="closeCart()" style="display:none; width:100%; margin-top:10px; border:none; background:none; font-weight:800; color:var(--muted); cursor:pointer;">
                Continue Selecting
            </button>
        </div>
    </div>

    <!-- 5. MOBILE PILL -->
    <a href="javascript:void(0)" class="mobile-sticky-bar" onclick="openCart()">
        <div class="msb-left">
            <div class="msb-cart-icon">
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="msb-count" id="msbCount">0</div>
            </div>
            <div class="msb-info">
                <span class="msb-label">Grand Total</span>
                <span class="msb-total" id="msbTotal">₹0</span>
            </div>
        </div>
        <div class="msb-btn">Checkout</div>
    </a>

    <!-- 6. ORDER MODAL -->
    <div id="orderModal" class="order-modal-overlay">
        <div class="order-modal-box">
            
            <button onclick="closeOrderModal()" class="order-modal-close notranslate">&times;</button>
            
            <div class="order-modal-header">
                <div class="order-modal-eyebrow">Final Step</div>
                <h2 class="order-modal-title">Complete Order</h2>
                <div class="order-modal-bar" style="width:40px; height:3px; background:var(--gold-deep); margin:15px auto;"></div>
            </div>

            <div class="order-net-strip">
                <div class="net-left">
                    <div class="net-label">TOTAL PAYABLE</div>
                    <div class="net-value">₹<span id="modalNetTotal">0</span></div>
                </div>
                <div class="net-icon"><i class="fa-solid fa-receipt"></i></div>
            </div>

            <form id="orderForm" style="padding: 0 40px 40px;">
                @csrf
                <input type="hidden" id="cartDataInput" name="cart_data">
                <input type="hidden" id="subTotalInput" name="sub_total">
                <input type="hidden" id="totalInput" name="total">

                <div class="order-form-grid-2">
                    <div class="order-field">
                        <label class="order-label">FULL NAME *</label>
                        <input type="text" name="name" id="orderName" required placeholder="Ex: Rahul Sharma" class="order-input">
                    </div>
                    <div class="order-field">
                        <label class="order-label">PHONE NUMBER *</label>
                        <input type="tel" name="phone_number" id="orderPhone" required placeholder="10 Digit Number" onblur="lookupCustomer(this.value)" class="order-input">
                    </div>
                </div>

                <div class="order-field">
                    <label class="order-label">EMAIL ADDRESS *</label>
                    <input type="email" name="email" id="orderEmail" required placeholder="Ex: info@example.com" class="order-input">
                </div>

                <div class="order-field">
                    <label class="order-label">STREET ADDRESS *</label>
                    <textarea name="address" id="orderAddress" required rows="2" placeholder="Door No, Street Name, Landmark..." class="order-input order-textarea"></textarea>
                </div>

                <div class="order-form-grid-2">
                    <div class="order-field">
                        <label class="order-label">SELECT STATE *</label>
                        <select name="state" id="stateSelect" required onchange="loadCities(this.value)" class="order-input order-select">
                            <option value="">-- Choose State --</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->state }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="order-field">
                        <label class="order-label">SELECT CITY *</label>
                        <select name="city" id="citySelect" required onchange="loadAreas(this.value)" class="order-input order-select">
                            <option value="">-- First Select State --</option>
                        </select>
                    </div>
                </div>

                <div class="order-form-grid-2">
                    <div class="order-field">
                        <label class="order-label">SELECT AREA</label>
                        <select name="area" id="areaSelect" class="order-input order-select">
                            <option value="">-- First Select City --</option>
                        </select>
                    </div>
                    <div class="order-field">
                        <label class="order-label">PINCODE</label>
                        <input type="text" name="pincode" id="orderPincode" placeholder="600001" class="order-input">
                    </div>
                </div>

                <button type="button" onclick="placeOrder()" id="placeOrderBtn" class="order-submit-btn">
                     Confirm & Send Estimate <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<div id="cartOverlay" class="cart-overlay" style="position:fixed; inset:0; background:rgba(0,0,0,0.5); backdrop-filter:blur(5px); z-index:1999; display:none;" onclick="closeCart()"></div>

<div id="loading" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.8); z-index:9999; align-items:center; justify-content:center; color:#fff; flex-direction:column;">
    <div class="spinner-border text-warning" role="status"></div>
    <p class="mt-3">Processing your estimate...</p>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const MIN_ORDER = {{ $minOrder }};

    document.addEventListener("DOMContentLoaded", function () {
        // Quantity Controls
        document.querySelectorAll(".qty").forEach(input => {
            input.addEventListener("input", function () {
                let value = Math.max(0, Math.min(999, parseInt(this.value) || 0));
                this.value = value;
                calculate();
            });
        });

        document.querySelectorAll('.qty-minus').forEach(btn => {
            btn.addEventListener('click', function () {
                let input = this.nextElementSibling;
                input.value = Math.max(0, (parseInt(input.value) || 0) - 1);
                input.dispatchEvent(new Event('input'));
            });
        });

        document.querySelectorAll('.qty-plus').forEach(btn => {
            btn.addEventListener('click', function () {
                let input = this.previousElementSibling;
                input.value = Math.min(999, (parseInt(input.value) || 0) + 1);
                input.dispatchEvent(new Event('input'));
            });
        });

        // Search Logic
        const searchInput = document.getElementById("searchInput");
        const clearBtn = document.getElementById("clearSearchBtn");

        searchInput.addEventListener("keyup", function () {
            const value = this.value.toLowerCase();
            
            // Toggle Clear Button
            if (value.length > 0) {
                clearBtn.classList.add("active");
            } else {
                clearBtn.classList.remove("active");
            }

            document.querySelectorAll(".product-row").forEach(row => {
                const name = row.querySelector(".product-name").innerText.toLowerCase();
                const category = row.getAttribute("data-category") || "";
                row.style.display = (name.includes(value) || category.includes(value)) ? "" : "none";
            });
            // Hide categories if no products visible
            document.querySelectorAll(".category").forEach(catRow => {
                let next = catRow.nextElementSibling;
                let hasVisible = false;
                while(next && !next.classList.contains('category')) {
                    if(next.style.display !== 'none') { hasVisible = true; break; }
                    next = next.nextElementSibling;
                }
                catRow.style.display = hasVisible ? "" : "none";
            });
        });

        // Clear Filter Button
        clearBtn.addEventListener("click", function() {
            searchInput.value = "";
            searchInput.dispatchEvent(new Event("keyup"));
            
            // Clear the URL parameter without reloading the page
            const url = new URL(window.location);
            if (url.searchParams.has('category')) {
                url.searchParams.delete('category');
                window.history.replaceState({}, '', url);
            }
        });

        // URL Parameter Filtering
        const urlParams = new URLSearchParams(window.location.search);
        const categoryFilter = urlParams.get('category');
        if (categoryFilter) {
            searchInput.value = categoryFilter;
            searchInput.dispatchEvent(new Event("keyup"));
            
            setTimeout(() => {
                const table = document.querySelector('.table-wrap');
                if (table) table.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 500);
        }

        // Parallax & Dynamic Summary Logic
        window.addEventListener('scroll', () => {
            const bg = document.querySelector('.hero-parallax-bg');
            if (bg) bg.style.transform = `scale(1.1) translateY(${window.scrollY * 0.3}px)`;
            
            // Toggle Sticky Summary
            const summary = document.getElementById('dynamicSummary');
            if (window.scrollY > 450) {
                summary.classList.add('is-sticky');
            } else {
                summary.classList.remove('is-sticky');
            }
        });
    });

    function calculate() {
        let netTotal = 0, actualTotal = 0, cartCount = 0;
        let cartItemsHtml = '';

        document.querySelectorAll(".product-row").forEach(row => {
            const qty = parseInt(row.querySelector(".qty").value) || 0;
            const price = parseFloat(row.querySelector(".price").innerText) || 0;
            const actual = parseFloat(row.querySelector(".actual").innerText) || 0;
            const rowTotal = qty * price;
            const actualRow = qty * actual;

            row.querySelector(".rowTotal").innerText = rowTotal.toFixed(2);
            netTotal += rowTotal;
            actualTotal += actualRow;
            
            if (qty > 0) {
                cartCount++;
                cartItemsHtml += `
                    <div class="cart-item-row">
                        <div class="cart-item-info">
                            <div class="cart-item-title">${row.querySelector(".product-name").innerText}</div>
                            <div class="cart-item-meta">${qty} x ₹${price.toFixed(2)}</div>
                        </div>
                        <div class="cart-item-total">₹${rowTotal.toFixed(2)}</div>
                    </div>
                `;
            }
        });

        document.getElementById("netTotal").innerText = netTotal.toLocaleString('en-IN');
        document.getElementById("overallTotal").innerText = netTotal.toLocaleString('en-IN');
        document.getElementById("youSave").innerText = (actualTotal - netTotal).toLocaleString('en-IN');
        document.getElementById("cartCount").innerText = cartCount;

        // Drawer Totals
        document.getElementById("cartActual").innerText = '₹' + actualTotal.toLocaleString('en-IN');
        document.getElementById("cartSave").innerText = '- ₹' + (actualTotal - netTotal).toLocaleString('en-IN');
        document.getElementById("cartNet").innerText = '₹' + netTotal.toLocaleString('en-IN');
        document.getElementById("cartDrawerBody").innerHTML = cartCount > 0 ? cartItemsHtml : '<div class="text-center py-5 opacity-50">Your selection is empty</div>';

        // Update Mobile Summary
        const msbTotal = document.getElementById("msbTotal");
        const msbCount = document.getElementById("msbCount");
        if (msbTotal) msbTotal.innerText = '₹' + netTotal.toLocaleString('en-IN');
        if (msbCount) msbCount.innerText = cartCount;

        updateMinOrderWidget(netTotal);
    }

    function updateMinOrderWidget(netTotal) {
        if (MIN_ORDER <= 0) return;
        const bar = document.getElementById('minOrderBar');
        const status = document.getElementById('minOrderStatus');
        const confirmBtn = document.getElementById('confirmOrderBtn');
        const continueBtn = document.getElementById('continueShopBtn');
        
        const pct = Math.min((netTotal / MIN_ORDER) * 100, 100);
        const met = netTotal >= MIN_ORDER;
        bar.style.width = pct + '%';
        
        if (met) {
            status.innerHTML = '<span style="color:#2ecc71;">✅ Minimum order requirement met!</span>';
            confirmBtn.disabled = false;
            confirmBtn.style.opacity = '1';
            if (continueBtn) continueBtn.style.display = 'none';
        } else {
            const diff = MIN_ORDER - netTotal;
            status.innerHTML = `Add ₹${diff.toLocaleString('en-IN')} more to proceed`;
            confirmBtn.disabled = true;
            confirmBtn.style.opacity = '0.5';
            if (continueBtn && netTotal > 0) continueBtn.style.display = 'block';
        }
    }

    function openCart() {
        document.getElementById("cartDrawer").classList.add("active");
        document.getElementById("cartOverlay").style.display = "block";
    }

    function closeCart() {
        document.getElementById("cartDrawer").classList.remove("active");
        document.getElementById("cartOverlay").style.display = "none";
    }

    function checkOrder() {
        const netValue = parseFloat(document.getElementById("cartNet").innerText.replace(/[^0-9.-]+/g,""));
        if (netValue < MIN_ORDER) {
            Swal.fire('Oops!', `Minimum order value is ₹${MIN_ORDER}. Please add more items.`, 'warning');
            return;
        }
        document.getElementById("modalNetTotal").innerText = netValue.toLocaleString('en-IN');
        document.getElementById("orderModal").style.display = "flex";
    }

    function closeOrderModal() { document.getElementById("orderModal").style.display = "none"; }

    function loadCities(stateId) {
        if(!stateId) return;
        const citySelect = document.getElementById('citySelect');
        citySelect.innerHTML = '<option value="">Loading...</option>';
        fetch(`/ajax/cities/${stateId}`)
            .then(res => res.json())
            .then(data => {
                citySelect.innerHTML = '<option value="">-- Choose City --</option>';
                data.forEach(city => { citySelect.innerHTML += `<option value="${city.id}">${city.city_name}</option>`; });
            });
    }

    function loadAreas(cityId) {
        if(!cityId) return;
        const areaSelect = document.getElementById('areaSelect');
        areaSelect.innerHTML = '<option value="">Loading...</option>';
        fetch(`/ajax/areas/${cityId}`)
            .then(res => res.json())
            .then(data => {
                areaSelect.innerHTML = '<option value="">-- Choose Area --</option>';
                data.forEach(area => { areaSelect.innerHTML += `<option value="${area.id}">${area.area_name}</option>`; });
            });
    }

    function lookupCustomer(phone) {
        if(phone.length < 10) return;
        fetch(`/customer/lookup/${phone}`)
            .then(res => res.json())
            .then(data => {
                if(data.found) {
                    document.getElementById('orderName').value = data.name;
                    document.getElementById('orderEmail').value = data.email;
                    document.getElementById('orderAddress').value = data.address;
                }
            });
    }

    function placeOrder() {
        const form = document.getElementById('orderForm');
        if(!form.checkValidity()) { form.reportValidity(); return; }

        let cartData = [];
        document.querySelectorAll('.product-row').forEach(row => {
            const qty = parseInt(row.querySelector('.qty').value) || 0;
            if (qty > 0) {
                cartData.push({
                    product_id: row.dataset.productId,
                    product_name: row.querySelector('.product-name').innerText,
                    qty: qty,
                    price: parseFloat(row.querySelector('.price').innerText),
                    actual: parseFloat(row.querySelector('.actual').innerText),
                    total: qty * parseFloat(row.querySelector('.price').innerText)
                });
            }
        });

        document.getElementById('cartDataInput').value = JSON.stringify(cartData);
        document.getElementById('subTotalInput').value = document.getElementById('cartActual').innerText.replace(/[^0-9.-]+/g,"");
        document.getElementById('totalInput').value = document.getElementById('cartNet').innerText.replace(/[^0-9.-]+/g,"");
        
        document.getElementById('loading').style.display = 'flex';
        
        fetch("{{ route('order.store') }}", {
            method: 'POST',
            body: new FormData(form),
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => {
            if (!res.ok) {
                return res.json().then(err => { throw new Error(err.message || 'Server error'); });
            }
            return res.json();
        })
        .then(data => {
            document.getElementById('loading').style.display = 'none';
            if(data.success) {
                Swal.fire({
                    title: 'Sync Successful!',
                    text: 'Your estimate has been locked in. Redirecting to your invoice dashboard...',
                    icon: 'success',
                    timer: 2500,
                    showConfirmButton: false,
                    timerProgressBar: true
                }).then(() => {
                    window.location.href = data.redirect_url;
                });
            } else {
                Swal.fire('Validation Alert', data.message || 'Please check your input fields.', 'warning');
            }
        })
        .catch(err => {
            document.getElementById('loading').style.display = 'none';
            Swal.fire('Transaction Failed', 'Sync interrupt: ' + err.message, 'error');
            console.error('Order Error:', err);
        });
    }
</script>
@endpush

@include('pages._cracker-canvas')

@endsection
