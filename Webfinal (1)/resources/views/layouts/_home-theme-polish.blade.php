<style>
    /* Shared homepage-inspired polish for inner pages */
    :root {
        --gold: #D4860A;
        --gold-deep: #B86E00;
        --gold-light: #F0A832;
        --gold-pale: rgba(212, 134, 10, 0.1);
        --saffron: #E87B2D;
        --ivory: #080810;
        --cream: #0c0c18;
        --sand: #121224;
        --stone: #1a1a30;
        --ink-light: #FFFFFF;
        --muted-light: rgba(255,255,255,0.68);
        --line-soft: rgba(255,255,255,0.1);
        --line-gold: rgba(240,168,50,0.28);
        --glow-gold: rgba(212,134,10,0.4);
        --shadow-home-lg: 0 28px 80px rgba(0,0,0,0.58);
        --shadow-home-md: 0 18px 48px rgba(0,0,0,0.42);
    }

    body {
        background:
            radial-gradient(circle at 50% 0, rgba(212,134,10,0.12), transparent 34rem),
            var(--ivory);
    }

    .site-main {
        background: var(--ivory);
    }

    .premium-hero,
    .article-hero,
    .seo-hero,
    .terms-hero,
    .estimate-hero,
    .success-hero,
    .bank-hero {
        background: var(--cream);
        isolation: isolate;
    }

    .hero-glass-overlay,
    .seo-hero-overlay,
    .terms-hero-overlay,
    .hero-overlay {
        background:
            radial-gradient(circle at 50% 44%, rgba(240,168,50,0.16), transparent 18rem),
            linear-gradient(to bottom, rgba(8,8,16,0.68), rgba(8,8,16,0.97)) !important;
    }

    .hero-parallax-bg,
    .article-hero-parallax,
    .seo-hero-bg,
    .terms-hero-bg,
    .hero-bg {
        filter: saturate(1.12) contrast(1.05);
    }

    .hero-display-title,
    .article-display-title,
    .seo-hero h1,
    .terms-hero h1,
    .hero-title,
    .success-title,
    .p-title,
    .b-title,
    .c-title {
        color: #fff !important;
        font-weight: 900;
        text-shadow: 0 16px 48px rgba(0,0,0,0.42);
        letter-spacing: 0;
    }

    .hero-display-title span,
    .article-display-title span,
    .seo-hero h1 span,
    .terms-hero h1 span,
    .hero-title span,
    .success-title span,
    .p-title span,
    .b-title span,
    .c-title span {
        background: linear-gradient(135deg, #fff 0%, var(--gold-light) 48%, var(--gold) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 0 16px rgba(240,168,50,0.28));
    }

    .hero-eyebrow,
    .section-eyebrow,
    .seo-eyebrow,
    .terms-eyebrow,
    .success-eyebrow,
    .p-eyebrow,
    .b-eyebrow,
    .c-eyebrow,
    .order-modal-eyebrow,
    .method-kicker {
        border-color: var(--line-gold) !important;
        background: rgba(212,134,10,0.1) !important;
        color: var(--gold-light) !important;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.06), 0 0 22px rgba(212,134,10,0.08);
    }

    .hero-sep,
    .section-bar,
    .b-title-sep,
    .p-title-sep,
    .c-bar,
    .s-card-bar,
    .seo-indicator {
        background: linear-gradient(90deg, var(--gold-light), var(--gold)) !important;
        box-shadow: 0 0 12px rgba(240,168,50,0.5);
    }

    .hero-subtitle,
    .hero-sub,
    .section-subtitle,
    .p-subtitle,
    .c-desc,
    .terms-hero p,
    .article-content-rich,
    .seo-rich-content,
    .terms-content-body {
        color: var(--muted-light) !important;
    }

    .premium-blog-section,
    .article-body-section,
    .seo-section,
    .terms-section,
    .payment-interface,
    .estimate-content,
    .success-page {
        background:
            radial-gradient(circle at 50% 0, rgba(212,134,10,0.1), transparent 28rem),
            linear-gradient(180deg, rgba(8,8,16,0.98), rgba(12,12,24,0.98)) !important;
    }

    .luxury-blog-card,
    .blog-empty-luxury,
    .premium-article-card,
    .s-card,
    .s-cta-card,
    .seo-main-card,
    .sidebar-card,
    .terms-card,
    .finance-card,
    .terminal-card,
    .pay-slab,
    .top-summary,
    .search-wrap,
    .table-wrap,
    .contact-form-glass,
    .info-block,
    .step-item-glass {
        background: rgba(15,15,28,0.92) !important;
        border: 1px solid var(--line-gold) !important;
        box-shadow: var(--shadow-home-md);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        position: relative;
    }

    .luxury-blog-card,
    .premium-article-card,
    .s-card,
    .s-cta-card,
    .seo-main-card,
    .sidebar-card,
    .terms-card,
    .finance-card,
    .terminal-card,
    .pay-slab,
    .info-block,
    .step-item-glass {
        overflow: hidden;
    }

    .luxury-blog-card::before,
    .premium-article-card::before,
    .s-card::before,
    .s-cta-card::before,
    .seo-main-card::before,
    .sidebar-card::before,
    .terms-card::before,
    .finance-card::before,
    .terminal-card::before,
    .pay-slab::before,
    .info-block::before,
    .step-item-glass::before {
        content: '';
        position: absolute;
        inset: 0;
        pointer-events: none;
        background:
            linear-gradient(135deg, rgba(255,255,255,0.08), transparent 32%),
            radial-gradient(circle at 85% 0, rgba(240,168,50,0.13), transparent 34%);
        opacity: 0.85;
    }

    .luxury-blog-card:hover,
    .premium-article-card:hover,
    .s-card:hover,
    .s-cta-card:hover,
    .seo-main-card:hover,
    .sidebar-card:hover,
    .terms-card:hover,
    .finance-card:hover,
    .terminal-card:hover,
    .pay-slab:hover,
    .info-block:hover,
    .step-item-glass:hover {
        transform: translateY(-8px);
        border-color: rgba(240,168,50,0.56) !important;
        box-shadow: var(--shadow-home-lg), 0 0 0 1px rgba(240,168,50,0.08);
    }

    .l-card-title,
    .blog-empty-luxury h3,
    .article-content-rich h2,
    .article-content-rich h3,
    .s-card-title,
    .r-story-info h6,
    .seo-content-header h2,
    .seo-rich-content h3,
    .seo-rich-content h4,
    .sidebar-title,
    .related-content .title,
    .terms-content-body h2,
    .terms-content-body strong,
    .f-account-type,
    .terminal-header,
    .prod-name,
    .product-name,
    .rowTotal,
    .category td,
    .summary-value {
        color: #fff !important;
    }

    .l-card-excerpt,
    .blog-empty-luxury p,
    .s-card p,
    .r-story-info span,
    .related-content .tag,
    .f-label,
    .method-kicker,
    .showcase-table th,
    .fin-row,
    .slab-meta,
    .summary-label,
    thead th {
        color: rgba(255,255,255,0.62) !important;
    }

    .l-card-link,
    .tag-link,
    .related-content .tag,
    .sidebar-title i,
    .terminal-header i,
    .price,
    .fin-row.total .val,
    .token-id {
        color: var(--gold-light) !important;
    }

    .btn-primary,
    .btn-gold,
    .cta-btn-gold,
    .order-submit-btn,
    .a-btn-gold,
    .qr-action,
    .mobile-sticky-bar {
        background: linear-gradient(135deg, var(--gold-deep), var(--saffron)) !important;
        color: #fff !important;
        border: none !important;
        box-shadow: 0 16px 34px rgba(212,134,10,0.28);
        transition: transform .3s ease, box-shadow .3s ease, filter .3s ease;
    }

    .btn-primary:hover,
    .btn-gold:hover,
    .cta-btn-gold:hover,
    .order-submit-btn:hover,
    .a-btn-gold:hover,
    .qr-action:hover,
    .mobile-sticky-bar:hover {
        transform: translateY(-5px);
        filter: brightness(1.08);
        box-shadow: var(--shadow-home-lg), 0 0 0 6px rgba(212,134,10,0.12);
    }

    .btn-outline,
    .btn-outline-gold,
    .a-btn-ghost {
        border-color: var(--line-gold) !important;
        color: var(--gold-light) !important;
        background: rgba(255,255,255,0.035) !important;
    }

    .btn-outline:hover,
    .btn-outline-gold:hover,
    .a-btn-ghost:hover {
        background: rgba(212,134,10,0.12) !important;
        color: #fff !important;
        transform: translateY(-4px);
    }

    input,
    textarea,
    select,
    .order-input {
        background: rgba(255,255,255,0.07) !important;
        border-color: rgba(255,255,255,0.14) !important;
        color: #fff !important;
    }

    input::placeholder,
    textarea::placeholder {
        color: rgba(255,255,255,0.45) !important;
    }

    input:focus,
    textarea:focus,
    select:focus {
        border-color: var(--gold-light) !important;
        box-shadow: 0 0 0 4px rgba(240,168,50,0.12) !important;
        outline: none !important;
    }

    .About-footer {
        background:
            radial-gradient(circle at 50% 0, rgba(212,134,10,0.08), transparent 30rem),
            #080810 !important;
        position: relative;
        z-index: 10;
    }

    .f-title::after {
        box-shadow: 0 0 12px rgba(240,168,50,0.5);
    }

    .f-list a:hover,
    .f-contact-item a:hover,
    .f-author a:hover {
        color: var(--gold-light) !important;
    }

    @media (max-width: 575px) {
        .hero-display-title,
        .article-display-title,
        .seo-hero h1,
        .terms-hero h1,
        .hero-title,
        .success-title {
            font-size: 2.45rem !important;
        }

        .luxury-blog-card,
        .premium-article-card,
        .s-card,
        .s-cta-card,
        .seo-main-card,
        .sidebar-card,
        .terms-card,
        .finance-card,
        .terminal-card,
        .pay-slab,
        .table-wrap {
            border-radius: 20px !important;
        }
    }
</style>
