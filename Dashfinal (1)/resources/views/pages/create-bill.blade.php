@extends('layout.app')

@section('main_content')
<style>
    :root {
        --pos-bg: #f4f6f9;
        --pos-primary: #111827;
        --pos-secondary: #4f46e5;
        --pos-success: #10b981;
        --pos-danger: #ef4444;
        --pos-card: #ffffff;
        --pos-text: #1f2937;
        --pos-text-light: #6b7280;
        --pos-border: #e5e7eb;
        --pos-hover: #f9fafb;
    }

    body {
        background-color: var(--pos-bg);
    }

    .pos-container {
        display: flex;
        gap: 25px;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    /* Left Pane - Discovery */
    .pos-left {
        flex: 1 1 65%;
        display: flex;
        flex-direction: column;
        gap: 15px;
        min-width: 0;
    }

    /* Search Bar */
    .pos-search-bar {
        background: var(--pos-card);
        padding: 10px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        border: 1px solid var(--pos-border);
    }
    .pos-search-bar input {
        border: none;
        box-shadow: none;
        font-size: 1.1rem;
        padding: 12px 20px;
    }
    .pos-search-bar input:focus {
        border: none;
        box-shadow: none;
        outline: none;
    }
    .pos-search-bar .input-group-text {
        background: transparent;
        border: none;
        font-size: 1.2rem;
        color: var(--pos-text-light);
    }

    /* Category Dropdown */
    .pos-category-wrap {
        background: var(--pos-card);
        border-radius: 12px;
        padding: 5px;
        border: 1px solid var(--pos-border);
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    }
    .pos-category-wrap select {
        border: none;
        box-shadow: none;
        font-weight: 600;
        color: var(--pos-text);
        cursor: pointer;
        padding: 8px 15px;
    }
    .pos-category-wrap select:focus {
        outline: none;
        box-shadow: none;
    }

    /* Products Grid */
    .pos-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 12px;
        padding-bottom: 30px;
        min-height: 400px;
        align-content: start;
    }
    
    .pos-products-grid::-webkit-scrollbar, .pos-cart-items::-webkit-scrollbar {
        width: 6px;
    }
    .pos-products-grid::-webkit-scrollbar-thumb, .pos-cart-items::-webkit-scrollbar-thumb {
        background-color: #cbd5e1;
        border-radius: 10px;
    }

    /* Product Card (Text Focused) */
    .product-card {
        background: var(--pos-card);
        border: 1px solid var(--pos-border);
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        position: relative;
        padding: 15px;
    }

    .product-card:hover {
        border-color: var(--pos-secondary);
        box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        transform: translateY(-2px);
    }

    .product-card.active {
        border-color: var(--pos-success);
        background: #f0fdf4;
        box-shadow: 0 0 0 1px var(--pos-success);
    }

    .pc-cat {
        font-size: 0.65rem;
        color: var(--pos-text-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
        font-weight: 700;
    }

    .pc-title {
        font-weight: 700;
        font-size: 0.95rem;
        color: var(--pos-text);
        margin-bottom: 4px;
        line-height: 1.3;
        min-height: 2.6em;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .pc-stock {
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .pc-price-wrap {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .pc-mrp {
        font-size: 0.8rem;
        color: #94a3b8;
        text-decoration: line-through;
    }

    .pc-price {
        font-weight: 800;
        color: var(--pos-primary);
        font-size: 1.15rem;
    }

    .pc-price.discounted {
        color: var(--pos-success);
    }

    .pc-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: var(--pos-danger);
        color: white;
        font-size: 0.65rem;
        font-weight: 800;
        padding: 2px 6px;
        border-radius: 4px;
    }

    .pc-add-icon {
        background: var(--pos-hover);
        color: var(--pos-primary);
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
    }
    .product-card:hover .pc-add-icon {
        background: var(--pos-secondary);
        color: white;
    }
    .product-card.active .pc-add-icon {
        background: var(--pos-success);
        color: white;
    }

    /* Right Pane - Billing Terminal */
    .pos-right {
        flex: 0 0 380px;
        width: 380px;
        background: var(--pos-card);
        border-radius: 20px;
        box-shadow: 0 12px 35px rgba(0,0,0,0.04);
        border: 1px solid var(--pos-border);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        position: sticky;
        top: 20px;
    }

    .pos-customer-form {
        padding: 25px;
        border-bottom: 1px solid var(--pos-border);
        background: #fafaf9;
    }

    .pos-customer-form input {
        border-radius: 10px;
        font-size: 0.95rem;
        padding: 10px 15px;
        border: 1px solid #cbd5e1;
        transition: all 0.2s;
    }
    .pos-customer-form input:focus {
        border-color: var(--pos-primary);
        box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
    }

    .pos-cart-container {
        max-height: 380px;
        overflow-y: auto;
        padding: 15px 0;
    }

    .cart-empty {
        text-align: center;
        padding: 60px 20px;
        color: #94a3b8;
    }
    .cart-empty i {
        font-size: 4rem;
        color: #e2e8f0;
        margin-bottom: 20px;
    }

    .cart-item {
        display: flex;
        flex-direction: column;
        padding: 15px 25px;
        border-bottom: 1px dashed var(--pos-border);
        animation: slideIn 0.2s ease-out;
    }
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .ci-top {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
    }
    
    .ci-name {
        font-weight: 700;
        font-size: 1rem;
        color: var(--pos-text);
    }
    .ci-total {
        font-weight: 900;
        color: var(--pos-text);
        font-size: 1.1rem;
    }

    .ci-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .ci-price {
        font-size: 0.85rem;
        color: var(--pos-text-light);
        font-weight: 600;
    }

    .qty-ctrl {
        display: flex;
        align-items: center;
        border: 1px solid var(--pos-border);
        border-radius: 8px;
        overflow: hidden;
        background: white;
    }
    .qty-btn {
        background: #f8fafc;
        border: none;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: var(--pos-text);
        font-weight: bold;
        font-size: 1.1rem;
        transition: 0.1s;
    }
    .qty-btn:active {
        background: #e2e8f0;
    }
    .qty-val {
        width: 44px;
        text-align: center;
        font-weight: 800;
        font-size: 1rem;
        border: none;
        border-left: 1px solid var(--pos-border);
        border-right: 1px solid var(--pos-border);
        background: white;
    }
    .qty-val:focus {
        outline: none;
    }

    .ci-remove {
        color: #ef4444;
        background: #fef2f2;
        border: 1px solid #fee2e2;
        border-radius: 8px;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.2s;
    }
    .ci-remove:hover {
        background: #fee2e2;
        border-color: #fca5a5;
    }

    .pos-summary {
        background: #ffffff;
        border-top: 1px solid var(--pos-border);
        padding: 25px;
        box-shadow: 0 -4px 20px rgba(0,0,0,0.02);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        font-size: 1rem;
        color: var(--pos-text-light);
        font-weight: 600;
    }
    .summary-row.grand {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px dashed #cbd5e1;
        font-size: 1.6rem;
        font-weight: 900;
        color: var(--pos-primary);
    }

    @keyframes pulseSuccess {
        0% { transform: scale(1); color: var(--pos-primary); }
        50% { transform: scale(1.05); color: var(--pos-success); }
        100% { transform: scale(1); color: var(--pos-primary); }
    }
    .pulse-anim, .ci-total.pulse-anim {
        animation: pulseSuccess 0.4s ease-out;
    }

    .btn-charge {
        width: 100%;
        background: linear-gradient(135deg, var(--pos-primary), #1f2937);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 18px;
        font-size: 1.3rem;
        font-weight: 800;
        margin-top: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 25px rgba(17, 24, 39, 0.2);
    }
    .btn-charge:hover:not(:disabled) {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(17, 24, 39, 0.3);
    }
    .btn-charge:active:not(:disabled) {
        transform: translateY(1px);
    }
    .btn-charge:disabled {
        background: #cbd5e1;
        cursor: not-allowed;
        box-shadow: none;
        color: #94a3b8;
    }

    @media (max-width: 991px) {
        .pos-container {
            flex-direction: column;
        }
        .pos-right {
            position: static;
            width: 100%;
            flex: none;
        }
        .pos-products-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }
</style>

<div class="container-fluid py-3">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('billing.store') }}" method="POST" id="billingForm">
        @csrf
        <div class="pos-container">
            
            <!-- LEFT PANE: PRODUCT DISCOVERY -->
            <div class="pos-left">
                <!-- Search Bar -->
                <div class="pos-search-bar">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" id="productSearch" placeholder="Search inventory by name or SKU..." autocomplete="off">
                    </div>
                </div>

                <!-- Category Dropdown -->
                <div class="pos-category-wrap">
                    <select class="form-select" id="categorySelect">
                        <option value="all">All Categories</option>
                        @foreach($categories as $category)
                            @if(isset($groupedProducts[$category->id]) && count($groupedProducts[$category->id]) > 0)
                                <option value="cat-{{ $category->id }}">{{ $category->category_name }}</option>
                            @endif
                        @endforeach
                        @if(isset($uncategorized) && $uncategorized->count() > 0)
                            <option value="cat-others">Uncategorized</option>
                        @endif
                    </select>
                </div>

                <!-- Product Grid -->
                <div class="pos-products-grid" id="productGrid">
                    @foreach($categories as $category)
                        @if(isset($groupedProducts[$category->id]))
                            @foreach($groupedProducts[$category->id] as $product)
                                @php 
                                    $mrp = floatval($product->product_mrp_price);
                                    $regPrice = floatval($product->product_regular_price);
                                    $price = $regPrice > 0 ? $regPrice : $mrp;
                                    $isDiscounted = ($regPrice > 0 && $mrp > $regPrice);
                                    $savings = $isDiscounted ? $mrp - $regPrice : 0;
                                    $stock = (int)$product->product_stock;
                                @endphp
                                <div class="product-card cat-{{ $category->id }}" 
                                     data-id="{{ $product->id }}" 
                                     data-name="{{ $product->product_name }}" 
                                     data-price="{{ $price }}">
                                    
                                    {{-- @if($isDiscounted)
                                        <div class="pc-badge">SAVE ₹{{ number_format($savings, 0) }}</div>
                                    @endif --}}

                                    <div class="pc-cat">{{ $category->category_name }}</div>
                                    <div class="pc-title">{{ $product->product_name }}</div>
                                    {{-- <div class="pc-stock {{ $stock <= 0 ? 'text-danger' : 'text-success' }}">Stock: {{ $stock }}</div> --}}
                                    
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div class="pc-price-wrap">
                                            @if($isDiscounted)
                                                <div class="pc-mrp">₹{{ number_format($mrp, 0) }}</div>
                                            @endif
                                            <div class="pc-price {{ $isDiscounted ? 'discounted' : '' }}">₹{{ number_format($price, 2) }}</div>
                                        </div>
                                        <div class="pc-add-icon"><i class="fas fa-plus"></i></div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Uncategorized --}}
                    @if(isset($uncategorized))
                        @foreach($uncategorized as $product)
                            @php 
                                $mrp = floatval($product->product_mrp_price);
                                $regPrice = floatval($product->product_regular_price);
                                $price = $regPrice > 0 ? $regPrice : $mrp;
                                $isDiscounted = ($regPrice > 0 && $mrp > $regPrice);
                                $savings = $isDiscounted ? $mrp - $regPrice : 0;
                                $stock = (int)$product->product_stock;
                            @endphp
                            <div class="product-card cat-others" 
                                 data-id="{{ $product->id }}" 
                                 data-name="{{ $product->product_name }}" 
                                 data-price="{{ $price }}">
                                
                                @if($isDiscounted)
                                    <div class="pc-badge">SAVE ₹{{ number_format($savings, 0) }}</div>
                                @endif

                                <div class="pc-cat">Uncategorized</div>
                                <div class="pc-title">{{ $product->product_name }}</div>
                                <div class="pc-stock {{ $stock <= 0 ? 'text-danger' : 'text-success' }}">Stock: {{ $stock }}</div>
                                
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="pc-price-wrap">
                                        @if($isDiscounted)
                                            <div class="pc-mrp">₹{{ number_format($mrp, 0) }}</div>
                                        @endif
                                        <div class="pc-price {{ $isDiscounted ? 'discounted' : '' }}">₹{{ number_format($price, 2) }}</div>
                                    </div>
                                    <div class="pc-add-icon"><i class="fas fa-plus"></i></div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- RIGHT PANE: ACTIVE BILLING TERMINAL -->
            <div class="pos-right">
                <!-- Customer Details -->
                <div class="pos-customer-form">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 fw-bold text-dark"><i class="fas fa-user-circle text-primary me-2"></i> Client Info</h6>
                        <a href="/billing" class="btn btn-sm btn-light border py-1 px-3 text-muted rounded-pill"><i class="fas fa-times me-1"></i> Cancel</a>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <input type="text" class="form-control" name="customer_phone" required placeholder="Phone Number *">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="customer_name" required placeholder="Full Name *">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" name="customer_address" placeholder="Billing/Delivery Address">
                        </div>
                    </div>
                </div>

                <!-- Active Cart -->
                <div class="pos-cart-container" id="cartContainer">
                    <div class="cart-empty" id="emptyState">
                        <i class="fas fa-receipt"></i>
                        <h4 class="fw-bold">No Items Selected</h4>
                        {{-- <p class="mb-0">Scan barcode or tap products to build order.</p> --}}
                    </div>
                    <div id="cartItemsList"></div>
                </div>

                <!-- Hidden inputs for form submission -->
                <div id="hiddenInputsArea"></div>

                <!-- Summary & Checkout -->
                <div class="pos-summary">
                    <div class="summary-row">
                        <span>Items Count</span>
                        <span id="summaryItems" class="text-dark fw-bold">0</span>
                    </div>
                    <div class="summary-row grand">
                        <span>Grand Total</span>
                        <span id="grandTotalWrap">₹<span id="summaryTotal">0.00</span></span>
                    </div>
                    <button type="submit" class="btn-charge" id="btnCharge" disabled>
                        <span>Charge Order</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

            </div>

        </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    
    // Virtual Cart State
    let cart = {}; // format: { productId: { id, name, price, qty } }

    function renderCart() {
        let totalAmount = 0;
        let totalItems = 0;
        const $list = $('#cartItemsList');
        const $hidden = $('#hiddenInputsArea');
        $list.empty();
        $hidden.empty();

        let hasItems = false;

        Object.values(cart).forEach(item => {
            if(item.qty <= 0) return;
            hasItems = true;
            
            const lineTotal = item.price * item.qty;
            totalAmount += lineTotal;
            totalItems += item.qty;

            // Render UI Item
            const itemHtml = `
                <div class="cart-item">
                    <div class="ci-top">
                        <div class="ci-name">${item.name}</div>
                        <div class="ci-total pulse-anim">₹${lineTotal.toFixed(2)}</div>
                    </div>
                    <div class="ci-bottom">
                        <div class="ci-price">₹${item.price.toFixed(2)}</div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="qty-ctrl shadow-sm">
                                <button type="button" class="qty-btn btn-minus" data-id="${item.id}">-</button>
                                <input type="number" class="qty-val input-qty" data-id="${item.id}" value="${item.qty}" min="1">
                                <button type="button" class="qty-btn btn-plus" data-id="${item.id}">+</button>
                            </div>
                            <button type="button" class="ci-remove btn-delete" data-id="${item.id}"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                </div>
            `;
            $list.append(itemHtml);

            // Render Hidden Inputs for Form Submission
            $hidden.append(`<input type="hidden" name="products[${item.id}]" value="${item.qty}">`);
            $hidden.append(`<input type="hidden" name="prices[${item.id}]" value="${item.price}">`);
        });

        // Trigger Pulse Animation
        const $grandTotalWrap = $('#grandTotalWrap');
        $grandTotalWrap.removeClass('pulse-anim');
        void $grandTotalWrap[0].offsetWidth; // trigger reflow
        $grandTotalWrap.addClass('pulse-anim');

        // Update Summary
        $('#summaryItems').text(totalItems);
        $('#summaryTotal').text(totalAmount.toFixed(2));

        // Toggle Empty State
        if (hasItems) {
            $('#emptyState').hide();
            $('#btnCharge').prop('disabled', false);
        } else {
            $('#emptyState').show();
            $('#btnCharge').prop('disabled', true);
        }

        // Visual feedback on grid cards
        $('.product-card').removeClass('active');
        Object.values(cart).forEach(item => {
            if(item.qty > 0) {
                $(`.product-card[data-id="${item.id}"]`).addClass('active');
            }
        });
    }

    // Add to Cart from Grid
    $('.product-card').on('click', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const price = parseFloat($(this).data('price')) || 0;

        if (!cart[id]) {
            cart[id] = { id, name, price, qty: 0 };
        }
        cart[id].qty += 1;
        
        renderCart();

        // Scroll cart to bottom smoothly
        const cartDiv = document.getElementById('cartContainer');
        cartDiv.scrollTo({ top: cartDiv.scrollHeight, behavior: 'smooth' });
    });

    // Cart Action: Plus
    $(document).on('click', '.btn-plus', function() {
        const id = $(this).data('id');
        if (cart[id]) {
            cart[id].qty += 1;
            renderCart();
        }
    });

    // Cart Action: Minus
    $(document).on('click', '.btn-minus', function() {
        const id = $(this).data('id');
        if (cart[id] && cart[id].qty > 1) {
            cart[id].qty -= 1;
        } else if (cart[id]) {
            delete cart[id];
        }
        renderCart();
    });

    // Cart Action: Delete
    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');
        if (cart[id]) {
            delete cart[id];
            renderCart();
        }
    });

    // Cart Action: Input manual typing (Live Update)
    $(document).on('input', '.input-qty', function() {
        const id = $(this).data('id');
        let val = parseInt($(this).val());
        
        if (isNaN(val) || val <= 0) {
            // Keep the data but don't delete yet to avoid jumping while typing
            if (cart[id]) cart[id].qty = 0;
        } else {
            if (cart[id]) cart[id].qty = val;
        }
        renderCart();
    });

    // Filtering & Searching Logic
    let currentCategory = 'all';

    function applyFilters() {
        const term = $('#productSearch').val().toLowerCase();

        $('.product-card').each(function() {
            const name = $(this).data('name').toLowerCase();
            const cardCat = $(this).attr('class').split(' ').find(c => c.startsWith('cat-'));
            
            const matchName = name.includes(term);
            const matchCat = (currentCategory === 'all' || currentCategory === cardCat);

            if (matchName && matchCat) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    // Category Select Change Event
    $('#categorySelect').on('change', function() {
        currentCategory = $(this).val();
        applyFilters();
    });

    $('#productSearch').on('keyup', applyFilters);

    // Form Submission UX
    $('#billingForm').on('submit', function(e) {
        if (!this.checkValidity()) return true;
        
        const $btn = $('#btnCharge');
        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Initializing Transaction...');
        return true;
    });
});
</script>
@endsection
