@extends('layouts.default')

@section('main-page')

<!-- ========================
             PREMIUM HERO BANNER
             ======================== -->
<section class="premium-hero">
    <canvas id="glow-cursor-canvas"></canvas>
    <div id="glow-particles-container"></div>
    <div class="hero-parallax-bg"
        style="background-image: url('{{ $about->banner_image ? env('MAIN_URL', '/') . $about->banner_image : asset('assets/img/ab.jpg') }}');">
    </div>
    <div class="hero-glass-overlay"></div>

    <div class="hero-content-wrap">
        <div class="container">
            <div class="hero-text-center">
                <span class="hero-eyebrow"><i class="fa-solid fa-sparkles"></i> {{ $about->hero_eyebrow ?? 'Since 2026' }}</span>
                <h1 class="hero-display-title">{!! $about->hero_title ?? 'Our <span>About</span> of Brilliance' !!}</h1>
                <div class="hero-sep"></div>
                <p class="hero-subtitle">{{ $about->hero_subtitle ?? 'Crafting the Most Spectacular Fireworks in India. Sivakasi\'s Proudest Tradition.' }}</p>
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
             NARRATIVE SECTION
             ======================== -->
<section class="narrative-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left: Visual Story -->
            <div class="col-lg-6">
                <div class="narrative-visual">
                    <div class="visual-stack main">
                        <img src="{{ env('MAIN_URL', '/') . $about->main_image }}" alt="Heritage">
                        <div class="visual-accent-border"></div>
                    </div>
                    <div class="visual-stack sub">
                        <img src="{{ env('MAIN_URL', '/') . $about->main_image }}" alt="Craft">
                    </div>
                    <div class="experience-pill">
                        <span class="n-years">{{ $settings->welcome_badge_count ?? '10+' }}</span>
                        <span class="n-label">{{ $settings->welcome_badge_label ?? 'Years of Excellence' }}</span>
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="col-lg-6">
                <div class="narrative-content">
                    <span class="narrative-eyebrow">{{ $about->eyebrow }}</span>
                    <h2 class="narrative-title">{!! $about->heading !!}</h2>
                    <div class="narrative-bar"></div>

                    <div class="narrative-body text-justify">
                        {!! $about->description !!}
                    </div>

                    <div class="narrative-badges">
                        <div class="n-badge">
                            <i class="fa-solid fa-trophy"></i>
                            <span>{{ $about->badge1_text }}</span>
                        </div>
                        <div class="n-badge">
                            <i class="fa-solid fa-fire-flame-curved"></i>
                            <span>{{ $about->badge2_text }}</span>
                        </div>
                        <div class="n-badge">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>{{ $about->badge3_text }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================
             CORE VALUES (CARD GRID)
             ======================== -->
<section class="values-section">
    <div class="v-bg-texture"></div>
    <div class="container">
        <div class="section-header text-center">
            <span class="v-eyebrow">{{ $about->purpose_eyebrow }}</span>
            <h2 class="v-title">{!! $about->purpose_heading !!}</h2>
            <div class="v-title-sep"></div>
        </div>

        <div class="values-grid">
            <!-- Mission -->
            <div class="v-card wow fadeInUp" data-wow-delay="0.1s">
                <div class="v-icon"><i class="{{ $about->p1_icon ?? 'fa-solid fa-bullseye' }}"></i></div>
                <h3>{{ $about->p1_title }}</h3>
                <p>{{ $about->p1_text }}</p>
                <div class="v-hover-glow"></div>
            </div>

            <!-- Vision -->
            <div class="v-card wow fadeInUp" data-wow-delay="0.2s">
                <div class="v-icon"><i class="{{ $about->p2_icon ?? 'fa-solid fa-eye' }}"></i></div>
                <h3>{{ $about->p2_title }}</h3>
                <p>{{ $about->p2_text }}</p>
                <div class="v-hover-glow"></div>
            </div>

            <!-- Quality -->
            <div class="v-card wow fadeInUp" data-wow-delay="0.3s">
                <div class="v-icon"><i class="{{ $about->p3_icon ?? 'fa-solid fa-award' }}"></i></div>
                <h3>{{ $about->p3_title }}</h3>
                <p>{{ $about->p3_text }}</p>
                <div class="v-hover-glow"></div>
            </div>

            <!-- Commitment -->
            <div class="v-card wow fadeInUp" data-wow-delay="0.4s">
                <div class="v-icon"><i class="{{ $about->p4_icon ?? 'fa-solid fa-handshake-angle' }}"></i></div>
                <h3>{{ $about->p4_title }}</h3>
                <p>{{ $about->p4_text }}</p>
                <div class="v-hover-glow"></div>
            </div>
        </div>
    </div>
</section>

<!-- ========================
             STATS BAR (DARK)
             ======================== -->
<section class="stats-bar">
    <div class="container">
        <div class="stats-container">
            <div class="stat-item">
                <div class="s-val"><span class="counter" data-target="{{ $about->products_count }}">0</span><sup>+</sup>
                </div>
                <div class="s-lab"><i class="fa-solid fa-box-open"></i> Premium Products</div>
            </div>
            <div class="stat-item divider"></div>
            <div class="stat-item">
                <div class="s-val"><span class="counter"
                        data-target="{{ $about->customers_count }}">0</span><sup>+</sup></div>
                <div class="s-lab"><i class="fa-solid fa-people-group"></i> Happy Families</div>
            </div>
            <div class="stat-item divider"></div>
            <div class="stat-item">
                <div class="s-val"><span id="successCounter"
                        data-target="{{ $about->success_percentage }}">0</span><sup>%</sup></div>
                <div class="s-lab"><i class="fa-solid fa-check-double"></i> Satisfaction Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- ========================
             CTA (NIGHT BURST)
             ======================== -->
<section class="about-cta">
    <div class="cta-fire-bg"></div>
    <div class="container">
        <div class="cta-glass-box">
            <div class="cta-content">
                <h3 class="cta-display">{!! $about->action_text ?? 'Excited to celebrate?' !!}</h3>
                <p>{{ $about->action_description ?? 'Bringing the magic of lights to your doorstep with unmatched safety and brilliance.' }}</p>
                <a href="{{ $about->action_button_link ?? '/shop' }}" class="cta-btn-gold">
                    <span>{{ $about->action_button_text ?? 'Shop Now' }}</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --gold-primary: #D4AF37;
        --gold-secondary: #C5A028;
        --gold-accent: #FFD700;
        --gold-glow: rgba(212, 175, 55, 0.4);
        --glass-bg: rgba(255, 255, 255, 0.05);
        --glass-border: rgba(255, 255, 255, 0.1);
        --glass-blur: blur(12px);
        --text-glow: 0 0 10px rgba(255, 255, 255, 0.5);
    }

    #glow-cursor-canvas {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 9999;
    }

    #glow-particles-container {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 3;
        overflow: hidden;
    }

    /* ========================
           ABOUT PAGE STYLES (GOLDEN LIGHT)
           ======================== */

    /* HERO Section */
    .premium-hero {
        height: 45vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: #3d3d43;
    }

    .hero-parallax-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        transition: 0.3s transform;
        transform: scale(1.1);
    }

    .hero-glass-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(10, 10, 20, 0.4), rgba(10, 10, 20, 0.98));
        z-index: 1;
    }

    .premium-hero::after {
        content: '';
        position: absolute;
        top: 10%;
        right: 10%;
        width: 40%;
        height: 40%;
        background: radial-gradient(circle, rgba(240, 168, 50, 0.1), transparent 70%);
        filter: blur(80px);
        z-index: 2;
        animation: nebulaPulse 10s infinite alternate;
    }

    @keyframes nebulaPulse {
        0% {
            opacity: 0.3;
            transform: scale(1);
        }

        100% {
            opacity: 0.7;
            transform: scale(1.2);
        }
    }

    .hero-content-wrap {
        position: relative;
        z-index: 10;
        text-align: center;
    }

    .hero-eyebrow {
        color: var(--gold-light);
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 4px;
        font-size: 0.85rem;
        margin-bottom: 20px;
        display: block;
        background: transparent !important;
    }

    .hero-display-title {
        font-family: var(--font-display);
        font-size: 4.2rem;
        line-height: 1;
        color: #fff;
        margin-bottom: 20px;
        font-weight: 900;
        text-shadow:
            0 2px 10px rgba(255, 255, 255, 0.3),
            0 0 40px rgba(255, 255, 255, 0.2),
            0 0 80px rgba(255, 255, 255, 0.1);
    }

    .hero-display-title span {
        background: linear-gradient(90deg, #FFFFFF, var(--gold-light), #FFFFFF);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-family: var(--font-accent);
        filter: drop-shadow(0 0 20px rgba(240, 168, 50, 0.5));
        animation: shimmer 5s linear infinite;
    }

    @keyframes shimmer {
        0% {
            background-position: 0% center;
        }

        100% {
            background-position: 200% center;
        }
    }

    .hero-subtitle {
        color: rgba(255, 255, 255, 0.7);
        max-width: 600px;
        margin: 0 auto;
        font-size: 1.2rem;
        font-weight: 400;
    }

    .hero-sep {
        width: 60px;
        height: 3px;
        background: var(--gold);
        margin: 20px auto;
    }

    .scroll-prompt {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: none;
        /* Hidden for compact layout */
    }

    .scroll-mouse {
        width: 28px;
        height: 45px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        position: relative;
    }

    .scroll-dot {
        width: 4px;
        height: 8px;
        background: var(--gold);
        position: absolute;
        left: 50%;
        top: 10px;
        transform: translateX(-50%);
        border-radius: 2px;
        animation: scrollAnim 2s infinite;
    }

    @keyframes scrollAnim {
        0% {
            opacity: 1;
            top: 10px;
        }

        100% {
            opacity: 0;
            top: 30px;
        }
    }

    /* Narrative Section */
    .narrative-section {
        padding-top: 57px;
        padding-bottom: 0px;
        background: #3c3c42;
        position: relative;
        color: #fff;
        overflow: hidden;
    }

    .narrative-section::before {
        content: '';
        position: absolute;
        top: -200px;
        right: -200px;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(212, 134, 10, 0.1) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
        animation: auroraFloat 10s infinite alternate;
    }

    @keyframes auroraFloat {
        from {
            transform: translate(0, 0) scale(1);
        }

        to {
            transform: translate(40px, 30px) scale(1.1);
        }
    }

    .narrative-visual {
        position: relative;
        padding-right: 40px;
    }

    /* Glowing halo behind main image - from homepage */
    .narrative-visual::before {
        content: '';
        position: absolute;
        top: 10%;
        left: 5%;
        right: 5%;
        bottom: 15%;
        border-radius: 30px;
        background: radial-gradient(ellipse at 50% 50%, rgba(255, 255, 255, .15) 0%, transparent 70%);
        filter: blur(40px);
        z-index: 0;
        pointer-events: none;
    }

    .visual-stack {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .5);
    }

    .visual-stack.main {
        width: 85%;
        transition: .6s cubic-bezier(.23, 1, .32, 1);
        border: 2px solid rgba(255, 255, 255, 0.5);
        position: relative;
        z-index: 2;
        box-shadow:
            0 12px 48px rgba(255, 255, 255, 0.15),
            0 0 0 1px rgba(255, 255, 255, 0.3),
            0 0 60px rgba(255, 255, 255, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
    }

    .visual-stack.main:hover {
        transform: translateY(-8px) scale(1.015);
        box-shadow:
            0 28px 72px rgba(255, 255, 255, 0.25),
            0 0 0 1px rgba(255, 255, 255, 0.6),
            0 0 80px rgba(255, 255, 255, 0.2);
    }

    .visual-stack.main img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        transition: .4s cubic-bezier(.23, 1, .32, 1);
    }

    .visual-stack.sub {
        position: absolute;
        bottom: -50px;
        right: 0;
        width: 50%;
        border: 5px solid rgba(255, 255, 255, 0.2);
        border-radius: 30px;
        box-shadow:
            0 15px 35px rgba(255, 255, 255, 0.15),
            0 0 0 1px rgba(255, 255, 255, 0.3),
            0 0 40px rgba(255, 255, 255, 0.1);
        z-index: 2;
    }

    .visual-stack.sub img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 16px;
    }

    .experience-pill {
        position: absolute;
        top: 40px;
        left: -40px;
        background: linear-gradient(135deg, rgba(56, 239, 125, 0.9), rgba(17, 153, 142, 0.95));
        color: #FFF;
        padding: 30px;
        border-radius: 24px;
        box-shadow:
            0 20px 40px rgba(17, 153, 142, 0.3),
            0 0 60px rgba(56, 239, 125, 0.2);
        text-align: center;
        z-index: 5;
        border: 2px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(10px);
        animation: badgePulse 4s ease-in-out infinite;
    }

    @keyframes badgePulse {

        0%,
        100% {
            box-shadow: 0 0 0 5px rgba(255, 255, 255, .4), 0 0 0 12px rgba(255, 255, 255, .15), 0 8px 32px rgba(255, 255, 255, .3), 0 0 60px rgba(255, 255, 255, .2);
        }

        50% {
            box-shadow: 0 0 0 8px rgba(255, 255, 255, .6), 0 0 0 18px rgba(255, 255, 255, .25), 0 8px 40px rgba(255, 255, 255, .4), 0 0 80px rgba(255, 255, 255, .3);
        }
    }

    .n-years {
        font-family: var(--font-display);
        font-size: 2.5rem;
        font-weight: 800;
        display: block;
        line-height: 1;
    }

    .n-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .narrative-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
        border: 1.5px solid rgba(255, 255, 255, 0.6);
        color: #FFFFFF;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 3.5px;
        text-transform: uppercase;
        padding: 7px 20px;
        border-radius: 50px;
        margin-bottom: 24px;
        box-shadow:
            0 0 20px rgba(255, 255, 255, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.5);
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }

    .narrative-title {
        font-family: var(--font-display);
        font-size: 4rem;
        line-height: 1.15;
        margin-bottom: 25px;
        color: #fff;
        font-weight: 900;
        text-shadow:
            0 2px 10px rgba(255, 255, 255, 0.3),
            0 0 40px rgba(255, 255, 255, 0.2),
            0 0 80px rgba(255, 255, 255, 0.1);
    }

    .narrative-title span {
        background: linear-gradient(90deg, #FFFFFF, var(--gold-light), #FFFFFF);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-family: var(--font-accent);
        filter: drop-shadow(0 0 20px rgba(240, 168, 50, 0.4));
        animation: shimmer 5s linear infinite;
    }

    .narrative-bar {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--gold-light), transparent);
        margin-bottom: 40px;
        border-radius: 2px;
    }

    .narrative-body {
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 40px;
        text-align: left !important;
    }

    .narrative-badges {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .n-badge {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        padding: 18px 32px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        gap: 15px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.6s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .n-badge:nth-child(1) i {
        color: #00d2ff;
        filter: drop-shadow(0 0 10px rgba(0, 210, 255, 0.5));
    }

    .n-badge:nth-child(2) i {
        color: #8E2DE2;
        filter: drop-shadow(0 0 10px rgba(142, 45, 226, 0.5));
    }

    .n-badge:nth-child(3) i {
        color: var(--gold-light);
        filter: drop-shadow(0 0 10px rgba(240, 168, 50, 0.5));
    }

    .n-badge:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-10px);
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    /* Values Section */
    .values-section {
        padding-top: 57px;
        padding-bottom: 57px;
        background: #3c3c42;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .v-bg-texture {
        position: absolute;
        inset: 0;
        background-image: url('https://www.transparenttextures.com/patterns/dark-matter.png');
        opacity: 0.3;
    }

    .v-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
        border: 1.5px solid rgba(255, 255, 255, 0.6);
        color: #FFFFFF;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 3.5px;
        text-transform: uppercase;
        padding: 7px 20px;
        border-radius: 50px;
        margin-bottom: 24px;
        box-shadow:
            0 0 20px rgba(255, 255, 255, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.5);
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }

    .v-title {
        font-family: var(--font-display);
        font-size: 4rem;
        color: #fff;
        margin: 15px 0 20px;
        font-weight: 900;
        text-shadow:
            0 2px 10px rgba(255, 255, 255, 0.3),
            0 0 40px rgba(255, 255, 255, 0.2),
            0 0 80px rgba(255, 255, 255, 0.1);
    }

    .v-title span {
        background: linear-gradient(135deg, var(--gold-light), var(--gold));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 0 16px rgba(240, 168, 50, 0.4));
        font-family: var(--font-accent);
    }

    .v-title-sep {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--gold-light), var(--gold));
        margin: 0 auto 60px;
        border-radius: 2px;
        box-shadow: 0 0 10px rgba(240, 168, 50, 0.5);
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        position: relative;
        z-index: 2;
    }

    @keyframes borderRotate {
        100% {
            transform: rotate(1turn);
        }
    }

    .v-card {
        background: var(--glass-bg) !important;
        backdrop-filter: var(--glass-blur);
        border: 1px solid var(--glass-border) !important;
        border-radius: 30px !important;
        padding: 60px 40px;
        transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1) !important;
        position: relative;
        overflow: hidden;
        text-align: center;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4) !important;
        transform-style: preserve-3d;
        perspective: 1200px;
    }

    .v-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top left, rgba(255, 255, 255, 0.05), transparent 60%);
        z-index: 1;
        pointer-events: none;
    }

    .v-card:hover {
        transform: translateY(-20px) rotateX(10deg) !important;
        border-color: var(--gold-light) !important;
        background: rgba(255, 255, 255, 0.06) !important;
        box-shadow:
            0 30px 60px rgba(0, 0, 0, 0.6),
            0 0 30px rgba(240, 168, 50, 0.2) !important;
    }

    /* 3D Pop-out effect for content */
    .v-card:hover .v-icon {
        transform: translateZ(60px) scale(1.1) rotate(10deg);
    }

    .v-card:hover h3 {
        transform: translateZ(40px);
        color: #FFF !important;
        text-shadow:
            0 1px 0 #ccc,
            0 2px 0 #c9c9c9,
            0 3px 0 #bbb,
            0 4px 0 #b9b9b9,
            0 5px 0 #aaa,
            0 6px 1px rgba(0, 0, 0, .1),
            0 0 5px rgba(0, 0, 0, .1),
            0 1px 3px rgba(0, 0, 0, .3),
            0 3px 5px rgba(0, 0, 0, .2),
            0 5px 10px rgba(0, 0, 0, .25),
            0 10px 10px rgba(0, 0, 0, .2),
            0 20px 20px rgba(0, 0, 0, .15);
    }

    .v-card:hover p {
        transform: translateZ(30px);
        color: rgba(255, 255, 255, 1) !important;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    }

    /* Card 1: Sapphire */
    .v-card:nth-child(1) {
        background: linear-gradient(145deg, rgba(0, 78, 146, 0.15), rgba(0, 4, 40, 0.4)) !important;
    }

    .v-card:nth-child(1) h3 {
        background: linear-gradient(135deg, #FFF, #00d2ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .v-card:nth-child(1) .v-icon {
        background: linear-gradient(135deg, #00d2ff, #3a7bd5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 0 15px rgba(0, 210, 255, 0.4));
    }

    .v-card:nth-child(1):hover {
        box-shadow: 0 40px 80px rgba(0, 210, 255, 0.2) !important;
        border-color: #00d2ff !important;
    }

    /* Card 2: Amethyst */
    .v-card:nth-child(2) {
        background: linear-gradient(145deg, rgba(78, 84, 200, 0.15), rgba(143, 148, 251, 0.1)) !important;
    }

    .v-card:nth-child(2) h3 {
        background: linear-gradient(135deg, #FFF, #8E2DE2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .v-card:nth-child(2) .v-icon {
        background: linear-gradient(135deg, #8E2DE2, #4A00E0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 0 15px rgba(142, 45, 226, 0.4));
    }

    .v-card:nth-child(2):hover {
        box-shadow: 0 40px 80px rgba(142, 45, 226, 0.2) !important;
        border-color: #8E2DE2 !important;
    }

    /* Card 3: Amber Gold */
    .v-card:nth-child(3) {
        background: linear-gradient(145deg, rgba(212, 175, 55, 0.15), rgba(212, 134, 10, 0.1)) !important;
    }

    .v-card:nth-child(3) h3 {
        background: linear-gradient(135deg, #FFF, var(--gold-accent));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .v-card:nth-child(3) .v-icon {
        background: linear-gradient(135deg, var(--gold-accent), var(--gold-primary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 0 15px var(--gold-glow));
    }

    .v-card:nth-child(3):hover {
        box-shadow: 0 40px 80px var(--gold-glow) !important;
        border-color: var(--gold-accent) !important;
    }

    /* Card 4: Jade Emerald */
    .v-card:nth-child(4) {
        background: linear-gradient(145deg, rgba(19, 78, 94, 0.15), rgba(113, 178, 128, 0.1)) !important;
    }

    .v-card:nth-child(4) h3 {
        background: linear-gradient(135deg, #FFF, #38ef7d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .v-card:nth-child(4) .v-icon {
        background: linear-gradient(135deg, #11998e, #38ef7d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 0 15px rgba(56, 239, 125, 0.4));
    }

    .v-card:nth-child(4):hover {
        box-shadow: 0 40px 80px rgba(56, 239, 125, 0.2) !important;
        border-color: #38ef7d !important;
    }

    .v-card:hover::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at center, rgba(255, 255, 255, 0.1), transparent 70%);
        z-index: 1;
    }

    .v-card::before {
        content: '';
        position: absolute;
        top: -100%;
        left: -100%;
        width: 300%;
        height: 300%;
        background: conic-gradient(transparent, rgba(255, 255, 255, .6), rgba(240, 168, 50, .6), rgba(255, 255, 255, .6), transparent 30%);
        animation: borderRotate 6s linear infinite;
        z-index: 0;
        opacity: 0;
        transition: .4s;
    }

    .v-card:hover h3 {
        color: #FFF !important;
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
    }

    .v-card:hover p {
        color: rgba(255, 255, 255, 0.9);
    }

    .v-icon {
        width: 80px;
        height: 80px;
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 30px;
        transition: all .5s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        z-index: 2;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .v-card h3 {
        font-family: var(--font-display);
        font-size: 1.7rem;
        font-weight: 900;
        margin-bottom: 20px;
        color: #FFF;
        position: relative;
        z-index: 2;
        transition: all 0.4s ease;
    }

    .v-card p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1rem;
        line-height: 1.6;
        position: relative;
        z-index: 2;
        transition: all 0.4s ease;
    }

    .v-card:hover .v-hover-glow {
        opacity: 1;
    }

    /* Stats Bar */
    .stats-bar {
        background: #54545f9e;
        padding-top: 62px;
        padding-bottom: 62px;
        position: relative;
        overflow: hidden;
        color: #fff;
    }

    .stats-bar::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 50%, rgba(240, 168, 50, 0.05), transparent 40%),
            radial-gradient(circle at 80% 50%, rgba(240, 168, 50, 0.05), transparent 40%);
        pointer-events: none;
    }

    .stats-container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        position: relative;
        z-index: 1;
        flex-wrap: wrap;
        gap: 30px;
    }

    .stat-item {
        background: rgba(255, 255, 255, 0.05) !important;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        padding: 50px 40px;
        border-radius: 40px;
        text-align: center;
        min-width: 320px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
        transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
        position: relative;
        overflow: hidden;
        transform-style: preserve-3d;
        perspective: 1200px;
    }

    .stat-item:nth-child(1) {
        background: linear-gradient(145deg, rgba(0, 210, 255, 0.1), rgba(11, 11, 20, 0.8)) !important;
    }

    .stat-item:nth-child(3) {
        background: linear-gradient(145deg, rgba(142, 45, 226, 0.1), rgba(11, 11, 20, 0.8)) !important;
    }

    .stat-item:nth-child(5) {
        background: linear-gradient(145deg, rgba(56, 239, 125, 0.1), rgba(11, 11, 20, 0.8)) !important;
    }

    .stat-item:hover {
        transform: translateY(-20px) rotateX(15deg);
        border-color: rgba(255, 255, 255, 0.4) !important;
        background: rgba(255, 255, 255, 0.1) !important;
        box-shadow: 0 40px 80px rgba(0, 0, 0, 0.7) !important;
    }

    .stat-item:nth-child(1):hover {
        box-shadow: 0 40px 80px rgba(0, 210, 255, 0.25) !important;
        border-color: #00d2ff !important;
    }

    .stat-item:nth-child(3):hover {
        box-shadow: 0 40px 80px rgba(142, 45, 226, 0.25) !important;
        border-color: #8E2DE2 !important;
    }

    .stat-item:nth-child(5):hover {
        box-shadow: 0 40px 80px rgba(56, 239, 125, 0.25) !important;
        border-color: #38ef7d !important;
    }

    .stat-item:hover .s-val {
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
    }

    .stat-item.divider {
        display: none;
    }

    .s-val {
        font-family: var(--font-display);
        font-size: 4rem;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 15px;
        color: #FFF;
        transition: all 0.4s ease;
        text-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .s-val sup {
        font-size: 1.5rem;
        top: -1.5rem;
        margin-left: 2px;
    }

    .s-lab {
        font-weight: 800;
        text-transform: uppercase;
        font-size: 1rem;
        letter-spacing: 2px;
        color: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.4s ease;
    }

    .s-lab i {
        font-size: 1.2rem;
        color: #FFF;
    }

    .stat-item:hover .s-lab {
        color: #FFF;
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    /* CTA Section */
    .about-cta {
        padding-top: 62px;
        padding-bottom: 120px;
        position: relative;
        background: #3c3c42;
        color: #fff;
    }

    .cta-fire-bg {
        position: absolute;
        inset: 0;
        background-image: url('{{ asset(' assets/img/bg/fire-bg-2.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        opacity: 0.1;
    }

    .cta-glass-box {
        background: rgba(11, 11, 20, 0.8) !important;
        backdrop-filter: blur(40px);
        -webkit-backdrop-filter: blur(40px);
        padding: 100px 60px;
        border-radius: 50px;
        border: 1.5px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 40px 100px rgba(0, 0, 0, 0.8) !important;
        text-align: center;
        position: relative;
        z-index: 2;
        overflow: hidden;
        max-width: 1000px;
        margin: 0 auto;
    }

    .cta-glass-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at top right, rgba(240, 168, 50, 0.15), transparent 60%);
        pointer-events: none;
    }

    .cta-display {
        font-family: var(--font-display);
        font-size: 4rem;
        margin-bottom: 25px;
        color: #fff;
        font-weight: 900;
        text-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
    }

    .cta-display span {
        background: linear-gradient(90deg, #FFFFFF, var(--gold-light), #FFFFFF);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 0 20px rgba(240, 168, 50, 0.5));
        font-family: var(--font-accent);
        animation: shimmer 5s linear infinite;
    }

    .cta-content p {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 40px;
    }

    .cta-btn-gold {
        position: relative;
        background: linear-gradient(135deg, var(--gold-light), var(--gold));
        color: #0b0b14 !important;
        padding: 20px 50px;
        border-radius: 50px;
        font-weight: 900;
        font-size: 1.2rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 15px 40px rgba(240, 168, 50, 0.3);
        transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        overflow: hidden;
    }

    .cta-btn-gold::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg,
                transparent,
                rgba(255, 255, 255, 0.4),
                transparent);
        transition: 0.6s;
        z-index: 2;
    }

    .cta-btn-gold:hover {
        transform: translateY(-5px) scale(1.02);
        background-position: 0 0;
        box-shadow: 0 15px 35px rgba(240, 168, 50, 0.5);
    }

    .cta-btn-gold:hover::before {
        left: 100%;
    }

    /* Stars Animation */
    #stars-container {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    }

    .star {
        position: absolute;
        background: #fff;
        border-radius: 50%;
        animation: twinkle linear infinite;
    }

    @keyframes twinkle {

        0%,
        100% {
            opacity: 0.1;
        }

        50% {
            opacity: 1;
        }
    }

    @media (max-width: 991px) {
        .values-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .hero-display-title {
            font-size: 3.5rem;
        }

        .m-container {
            grid-template-columns: 1fr;
        }

        .visual-stack.sub {
            display: none;
        }

        .stats-container {
            flex-direction: column;
            gap: 40px;
        }

        .stat-item.divider {
            display: none;
        }
    }

    /* ========================
           FIREWORKS BACKGROUND
           ======================== */
    #petal-canvas {
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 1;
        /* Behind content, above stars */
    }

    #fireworks-canvas {
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 9999;
        /* Over everything */
        width: 100%;
        height: 100%;
    }

    .smoke-overlay {
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 9997;
        background: radial-gradient(circle at center, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.4) 100%);
        mix-blend-mode: multiply;
        opacity: 0;
        transition: opacity 2s;
    }

    .ground-layer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 10px;
        pointer-events: none;
        z-index: 9998;
    }

    @media screen and (max-width: 852px) {
        .narrative-section {
            padding: 20px;
        }

        .narrative-visual {
            padding-right: 0px;
            padding-bottom: 10px;
        }

        .visual-stack.main {
            width: 100%;

        }

        .visual-stack.main img {
            height: 267px;

        }

        .experience-pill {
            display: none;
        }

        .narrative-title {
            font-size: 1.5rem;
        }

        .v-title {
            font-size: 1.5rem;
        }

        .values-grid {
            grid-template-columns: 1fr;
        }

        .cta-display {
            font-size: 1.5rem;
        }

        .cta-btn-gold {
            font-size: 0.7rem;
        }
    }

    @media screen and (width: 768px) and (height: 1024px) {
        .f-grid {
            grid-template-columns: 1fr 1fr !important;
        }

        .align-items-center {
            text-align: center;
        }

        .narrative-bar {
            display: none;
        }

        .visual-stack.main img {
            height: 400px;
        }
    }

    @media screen and (width: 820px) and (height: 1180px) {
        .f-grid {
            grid-template-columns: 1fr 1fr !important;
        }

        .align-items-center {
            text-align: center;
        }

        .narrative-bar {
            display: none;
        }

        .visual-stack.main img {
            height: 400px;
        }
    }

    @media screen and (min-height: 1364px) and (max-height: 1367px) {
        .values-grid {
            grid-template-columns:repeat(2, 1fr);
        }
        .align-items-center{
            display: grid;
            padding: 20px;
        }
        .col-lg-6{
            width: 100%;
            margin-top: 54px;
        }
    }
     @media screen and (min-height: 1368px) and (max-height: 1369px){
        .col-lg-6{
            width: 100%;
            margin-top: 54px;
        }
        .visual-stack.sub{
            display: block;
        }
     }
       @media screen and (width: 540px) and (height: 720px){
        .f-grid{
            grid-template-columns:repeat(2, 1fr) !important;
        }

       }
       @media screen and (min-height: 1279px) and (max-height: 1280px){
        .col-lg-6{
            width: 100%;
            margin-top: 54px;
        }
        .visual-stack.sub{
            display: block;
        }
       }
       @media screen and (width: 1024px) and (height: 600px){
        .values-grid {
            grid-template-columns:repeat(2, 1fr);
        }
        .align-items-center{
            display: grid;
            padding: 20px;
        }
        .col-lg-6{
            width: 100%;
            margin-top: 54px;
        }
       }
       @media screen and (width: 1280px) and (height: 800px){
        .values-grid {
            grid-template-columns:repeat(2, 1fr);
        }
        .align-items-center{
            display: grid;
            padding: 20px;
        }
        .col-lg-6{
            width: 100%;
            margin-top: 54px;
        }
       }

    /* CUSTOM CURSOR REMOVED */
</style>

<script>
    /* Simple Parallax for Hero */
    window.addEventListener('scroll', () => {
        const bg = document.querySelector('.hero-parallax-bg');
        bg.style.transform = `scale(1.1) translateY(${window.scrollY * 0.3}px)`;
    });

    /* Counter Logic */
    (function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = +entry.target.getAttribute('data-target');
                    const speed = 200;
                    let count = 0;
                    const update = () => {
                        const inc = target / speed;
                        if (count < target) {
                            count += inc;
                            entry.target.innerText = Math.ceil(count).toLocaleString();
                            setTimeout(update, 1);
                        } else {
                            entry.target.innerText = target.toLocaleString();
                        }
                    };
                    update();
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        document.querySelectorAll('.counter, #successCounter').forEach(c => observer.observe(c));
    })();

    /* Stars Effect */
    (function() {
        const starsContainer = document.getElementById('stars-container');
        if (starsContainer) {
            for (let i = 0; i < 100; i++) {
                const s = document.createElement('div');
                s.className = 'star';
                const sz = Math.random() * 2 + 1;
                s.style.cssText = `width:${sz}px; height:${sz}px; left:${Math.random() * 100}%; top:${Math.random() * 100}%; animation-delay:${Math.random() * 3}s; animation-duration:${Math.random() * 2 + 2}s;`;
                starsContainer.appendChild(s);
            }
        }
    })();
</script>






<!-- ========================
     FIREWORKS & ATMOSPHERE
     ======================== -->
<canvas id="petal-canvas"></canvas>
<canvas id="fireworks-canvas"></canvas>
<div class="smoke-overlay"></div>
<div class="ground-layer" id="groundLayer"></div>

<!-- CURSOR REMOVED -->

<!-- ========================
     JAVASCRIPT
     ======================== -->
<script>
    (function() {
        /* ── 1. SHARED ANIMATION CONTEXT ── */
        const petalCanvas = document.getElementById('petal-canvas');
        const fwCanvas = document.getElementById('fireworks-canvas');
        let pctx = null,
            pW, pH;
        const petals = [];
        const petalColors = ['#FFD700', '#FFA500', '#FF8C00', '#FF4500'];

        // Cursor State (Using Global Cursor)
        let mx = 0,
            my = 0;

        if (petalCanvas) {
            pctx = petalCanvas.getContext('2d');
            const pResize = () => {
                pW = petalCanvas.width = window.innerWidth;
                pH = petalCanvas.height = window.innerHeight;
            };
            pResize();
            window.addEventListener('resize', pResize);
        }

        class Petal {
            constructor() {
                this.reset();
            }
            reset() {
                this.x = Math.random() * pW;
                this.y = -20;
                this.size = Math.random() * 5 + 2;
                this.speed = Math.random() * 1.5 + 0.5;
                this.swing = Math.random() * 2;
                this.swingSpeed = Math.random() * 0.05 + 0.02;
                this.angle = Math.random() * Math.PI * 2;
                this.color = petalColors[Math.floor(Math.random() * petalColors.length)];
                this.opacity = Math.random() * 0.5 + 0.3;
            }
            update() {
                this.y += this.speed;
                this.x += Math.sin(this.angle) * this.swing;
                this.angle += this.swingSpeed;
                if (this.y > pH) this.reset();
            }
            draw() {
                pctx.beginPath();
                pctx.ellipse(this.x, this.y, this.size, this.size / 1.5, this.angle, 0, Math.PI * 2);
                pctx.fillStyle = this.color;
                pctx.globalAlpha = this.opacity;
                pctx.fill();
            }
        }

        if (petalCanvas) {
            for (let i = 0; i < 60; i++) petals.push(new Petal());
        }


        /* ── 2. CUSTOM FIREWORKS ENGINE ── */
        if (fwCanvas) {
            const ctx = fwCanvas.getContext('2d');
            let W, H;

            function resize() {
                W = fwCanvas.width = window.innerWidth;
                H = fwCanvas.height = window.innerHeight;
            }
            resize();
            window.addEventListener('resize', resize);

            const PI2 = Math.PI * 2;
            const rand = (a, b) => Math.random() * (b - a) + a;
            const randI = (a, b) => Math.floor(rand(a, b + 1));
            const particles = [];
            const stars = [];
            const shootingStars = [];
            const groundEl = document.getElementById('groundLayer');

            // Create Stars
            for (let i = 0; i < 120; i++) {
                stars.push({
                    x: Math.random() * window.innerWidth,
                    y: Math.random() * window.innerHeight,
                    size: Math.random() * 1.5,
                    opacity: Math.random(),
                    twinkleSpeed: Math.random() * 0.015 + 0.005
                });
            }

            function spawnSparklerParticle(x, y) {
                const angle = rand(0, PI2),
                    spd = rand(1, 4);
                particles.push({
                    kind: 'sparkle',
                    x,
                    y,
                    vx: Math.cos(angle) * spd,
                    vy: Math.sin(angle) * spd,
                    hue: rand(30, 60),
                    alpha: 1,
                    life: rand(8, 18),
                    maxLife: 18,
                    size: rand(1, 2.5),
                    gravity: 0.08,
                    friction: 0.93
                });
            }

            function spawnFlowerPotParticle(x, y) {
                const angle = rand(-Math.PI, 0) - Math.PI / 2 + rand(-0.6, 0.6),
                    spd = rand(2, 8);
                particles.push({
                    kind: 'flower',
                    x,
                    y,
                    vx: Math.cos(angle) * spd,
                    vy: Math.sin(angle) * spd,
                    hue: rand(30, 60),
                    alpha: 1,
                    life: rand(25, 55),
                    maxLife: 55,
                    size: rand(1.5, 3),
                    gravity: 0.12,
                    friction: 0.96
                });
            }

            function spawnRomanBall(x, y) {
                const hue = randI(0, 360);
                particles.push({
                    kind: 'romanball',
                    x,
                    y,
                    vx: rand(-0.8, 0.8),
                    vy: rand(-9, -5),
                    hue,
                    alpha: 1,
                    life: rand(45, 70),
                    maxLife: 70,
                    size: rand(3, 5),
                    gravity: 0.15,
                    friction: 0.99
                });
            }

            function addSmoke(x, y) {
                const puff = document.createElement('div');
                puff.className = 'smoke-puff';
                const sz = rand(30, 80);
                puff.style.cssText = `left:${x - sz / 2}px; top:${y - sz / 2}px; width:${sz}px; height:${sz}px; --sy:-${rand(60, 120)}px; --sd:${rand(1.5, 3)}s;`;
                document.body.appendChild(puff);
                setTimeout(() => puff.remove(), 3100);
            }

            window.addChakkar = function() {
                if (!groundEl) return;
                const el = document.createElement('div');
                el.className = 'chakkar';
                el.style.left = rand(5, 90) + '%';
                el.innerHTML = '<div class="chakkar-inner"></div>';
                groundEl.appendChild(el);
                const duration = rand(4000, 8000);
                const iv = setInterval(() => {
                    const r = el.getBoundingClientRect();
                    for (let i = 0; i < 4; i++) {
                        const a = rand(0, PI2),
                            s = rand(1, 4);
                        particles.push({
                            kind: 'sparkle',
                            x: r.left + 18,
                            y: r.top + 18,
                            vx: Math.cos(a) * s,
                            vy: Math.sin(a) * s,
                            hue: rand(0, 60),
                            alpha: 1,
                            life: rand(10, 22),
                            maxLife: 22,
                            size: rand(1, 2.5),
                            gravity: 0.07,
                            friction: 0.94
                        });
                    }
                }, 40);
                setTimeout(() => {
                    clearInterval(iv);
                    el.style.transition = 'opacity .5s';
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 600);
                }, duration);
            };
            window.addFlowerPot = function() {
                if (!groundEl) return;
                const wrap = document.createElement('div');
                wrap.className = 'flowerpot-wrap';
                wrap.style.left = rand(5, 90) + '%';
                wrap.innerHTML = '<div class="flowerpot-body"></div>';
                groundEl.appendChild(wrap);
                const duration = rand(4000, 7000);
                const iv = setInterval(() => {
                    const r = wrap.getBoundingClientRect();
                    for (let i = 0; i < 5; i++) spawnFlowerPotParticle(r.left + 12, r.top);
                }, 45);
                setTimeout(() => {
                    clearInterval(iv);
                    wrap.style.transition = 'opacity .5s';
                    wrap.style.opacity = '0';
                    setTimeout(() => wrap.remove(), 600);
                }, duration);
            };
            window.addRomanCandle = function() {
                if (!groundEl) return;
                const wrap = document.createElement('div');
                wrap.className = 'roman-wrap';
                wrap.style.left = rand(5, 90) + '%';
                wrap.innerHTML = '<div class="roman-tube"></div>';
                groundEl.appendChild(wrap);
                let shotCount = 0;
                const maxShots = randI(5, 12);

                function shootBall() {
                    if (shotCount >= maxShots) {
                        wrap.style.transition = 'opacity .5s';
                        wrap.style.opacity = '0';
                        setTimeout(() => wrap.remove(), 600);
                        return;
                    }
                    const r = wrap.getBoundingClientRect();
                    spawnRomanBall(r.left + 5, r.top - 5);
                    shotCount++;
                    setTimeout(shootBall, rand(400, 900));
                }
                setTimeout(shootBall, rand(100, 500));
            };

            function launchAerial(sx, sy, tx, ty) {
                const hue = randI(0, 360),
                    style = randI(0, 4);
                particles.push({
                    kind: 'rocket',
                    x: sx,
                    y: sy,
                    tx,
                    ty,
                    vx: (tx - sx) / 55,
                    vy: (ty - sy) / 55,
                    life: 55,
                    maxLife: 55,
                    hue,
                    style,
                    trail: [],
                    size: rand(2.5, 3.5),
                    done: false
                });
            }

            function explodeAerial(x, y, hue, style) {
                particles.push({
                    kind: 'flash',
                    x,
                    y,
                    life: 12,
                    maxLife: 12,
                    hue
                });
                const count = randI(70, 130);

                // GSAP Enhanced Burst
                gsap.to({}, {
                    duration: 0.1,
                    onComplete: () => {
                        const shell = (ax, ay, a, s, h, l, comet = false) => {
                            particles.push({
                                kind: 'shell',
                                x: ax,
                                y: ay,
                                vx: Math.cos(a) * s,
                                vy: Math.sin(a) * s,
                                hue: h,
                                life: l,
                                maxLife: l,
                                alpha: 1,
                                size: rand(1.2, 2.8),
                                gravity: 0.055,
                                friction: 0.975,
                                comet,
                                trail: [],
                                trailLen: comet ? 10 : 4
                            });
                        };
                        if (style === 1)
                            for (let i = 0; i < count; i++) shell(x, y, (PI2 / count) * i, rand(3, 5.5), hue, rand(40, 70));
                        else if (style === 2)
                            for (let i = 0; i < count; i++) shell(x, y, (PI2 / count) * i + rand(-.05, .05), rand(2, 7), hue + rand(-20, 20), rand(50, 90), true);
                        else if (style === 3)
                            for (let i = 0; i < count * 1.5; i++) shell(x, y, rand(0, PI2), rand(.5, 4.5), hue + rand(-40, 40), rand(30, 55));
                        else if (style === 4)
                            for (let i = 0; i < count; i++) {
                                const a = (PI2 / count) * i,
                                    s = rand(1.5, 4.5);
                                particles.push({
                                    kind: 'willow',
                                    x,
                                    y,
                                    vx: Math.cos(a) * s,
                                    vy: Math.sin(a) * s,
                                    hue: hue + rand(-15, 15),
                                    alpha: 1,
                                    life: rand(60, 100),
                                    maxLife: 100,
                                    size: rand(1.5, 2.5),
                                    gravity: 0.09,
                                    friction: 0.985,
                                    trail: [],
                                    trailLen: 12
                                });
                            }
                        else
                            for (let i = 0; i < count; i++) shell(x, y, (PI2 / count) * i + rand(-.12, .12), rand(1.5, 6.5), hue, rand(35, 65));
                    }
                });
                addSmoke(x, y);
            }

            window.triggerAtomBomb = function(x, y) {
                for (let i = 0; i < 200; i++) {
                    const a = (PI2 / 200) * i,
                        s = rand(5, 14);
                    particles.push({
                        kind: 'atom',
                        x,
                        y,
                        vx: Math.cos(a) * s,
                        vy: Math.sin(a) * s,
                        hue: rand(0, 60),
                        alpha: 1,
                        life: rand(30, 60),
                        maxLife: 60,
                        size: rand(2, 5),
                        gravity: 0.04,
                        friction: 0.93
                    });
                }
                const flash = document.createElement('div');
                flash.className = 'atom-flash';
                flash.style.setProperty('--fx', (x / W * 100) + '%');
                flash.style.setProperty('--fy', (y / H * 100) + '%');
                document.body.appendChild(flash);
                setTimeout(() => flash.remove(), 700);
            };

            /* ── MAIN ANIMATION LOOP ── */
            function render() {
                requestAnimationFrame(render);
                if (document.hidden) return; // Pause if tab not active

                // Limit global particle count for stability
                if (particles.length > 1200) particles.splice(0, 200);

                // 1. Petals (on petalCanvas)
                if (petalCanvas && pctx) {
                    pctx.clearRect(0, 0, pW, pH);
                    petals.forEach(p => {
                        p.update();
                        p.draw();
                    });
                }

                // Cursor Ring Logic Removed (Using Global)

                // 3. Fireworks & Stars
                ctx.globalCompositeOperation = 'destination-out';
                ctx.fillStyle = 'rgba(0,0,0,0.42)';
                ctx.fillRect(0, 0, W, H);
                ctx.globalCompositeOperation = 'lighter';

                // Optimized Star Rendering (Batched)
                ctx.fillStyle = "#fff";
                stars.forEach(s => {
                    s.opacity += s.twinkleSpeed;
                    if (s.opacity > 1 || s.opacity < 0.2) s.twinkleSpeed *= -1;
                    ctx.globalAlpha = s.opacity;
                    ctx.beginPath();
                    ctx.arc(s.x, s.y, s.size, 0, PI2);
                    ctx.fill();
                });
                ctx.globalAlpha = 1;

                // Shooting Stars
                if (Math.random() < 0.008) {
                    shootingStars.push({
                        x: Math.random() * W,
                        y: Math.random() * H * 0.4,
                        len: rand(60, 100),
                        speed: rand(12, 18),
                        alpha: 1
                    });
                }
                shootingStars.forEach((ss, i) => {
                    ctx.strokeStyle = `rgba(255, 255, 255, ${ss.alpha})`;
                    ctx.lineWidth = 1.2;
                    ctx.beginPath();
                    ctx.moveTo(ss.x, ss.y);
                    ctx.lineTo(ss.x + ss.len, ss.y + ss.len * 0.3);
                    ctx.stroke();
                    ss.x += ss.speed;
                    ss.y += ss.speed * 0.3;
                    ss.alpha -= 0.03;
                    if (ss.alpha <= 0) shootingStars.splice(i, 1);
                });

                const dead = [];
                for (let i = 0; i < particles.length; i++) {
                    const p = particles[i];
                    p.life--;
                    if (p.life <= 0) {
                        if (p.kind === 'rocket') explodeAerial(p.x, p.y, p.hue, p.style);
                        if (p.kind === 'romanball') {
                            for (let k = 0; k < 12; k++) {
                                const a = rand(0, PI2),
                                    s = rand(1, 3);
                                particles.push({
                                    kind: 'sparkle',
                                    x: p.x,
                                    y: p.y,
                                    vx: Math.cos(a) * s,
                                    vy: Math.sin(a) * s,
                                    hue: p.hue,
                                    alpha: 1,
                                    life: rand(12, 22),
                                    maxLife: 22,
                                    size: rand(0.8, 1.8),
                                    gravity: 0.06,
                                    friction: 0.95
                                });
                            }
                        }
                        dead.push(i);
                        continue;
                    }
                    switch (p.kind) {
                        case 'rocket':
                            p.trail.unshift([p.x, p.y]);
                            if (p.trail.length > 8) p.trail.pop();
                            p.x += p.vx;
                            p.y += p.vy;
                            for (let t = 0; t < p.trail.length; t++) {
                                ctx.beginPath();
                                ctx.arc(p.trail[t][0], p.trail[t][1], p.size * (1 - t / p.trail.length), 0, PI2);
                                ctx.fillStyle = `hsla(${p.hue},100%,70%,${0.5 * (1 - t / p.trail.length)})`;
                                ctx.fill();
                            }
                            break;
                        case 'flash':
                            const fa = p.life / p.maxLife,
                                fr = (1 - fa) * 120;
                            const fg = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, fr);
                            fg.addColorStop(0, `hsla(${p.hue},100%,95%,${fa})`);
                            fg.addColorStop(1, 'transparent');
                            ctx.fillStyle = fg;
                            ctx.beginPath();
                            ctx.arc(p.x, p.y, fr, 0, PI2);
                            ctx.fill();
                            break;
                        case 'shell':
                        case 'willow':
                        case 'flower':
                        case 'romanball':
                        case 'atom':
                            p.vy += p.gravity;
                            p.vx *= p.friction;
                            p.vy *= p.friction;
                            p.x += p.vx;
                            p.y += p.vy;
                            p.alpha = p.life / p.maxLife;
                            break;
                        case 'sparkle':
                            p.vy += p.gravity;
                            p.vx *= p.friction;
                            p.vy *= p.friction;
                            p.x += p.vx;
                            p.y += p.vy;
                            p.alpha = p.life / p.maxLife;
                            ctx.save();
                            ctx.globalAlpha = p.alpha;
                            ctx.strokeStyle = `hsl(${p.hue},100%,72%)`;
                            ctx.lineWidth = p.size * .7;
                            ctx.beginPath();
                            ctx.moveTo(p.x - 3, p.y);
                            ctx.lineTo(p.x + 3, p.y);
                            ctx.stroke();
                            ctx.restore();
                            break;
                    }
                    if (['shell', 'willow', 'rocket', 'flower', 'romanball', 'atom'].includes(p.kind)) {
                        ctx.beginPath();
                        ctx.arc(p.x, p.y, p.size, 0, PI2);
                        ctx.fillStyle = `hsla(${p.hue},100%,70%,${p.alpha || 1})`;
                        ctx.fill();
                    }
                }
                for (let i = dead.length - 1; i >= 0; i--) particles.splice(dead[i], 1);
            }
            render();

            setInterval(() => launchAerial(rand(W * .25, W * .75), H, rand(W * .05, W * .95), rand(H * .06, H * .45)), 2200);
            setInterval(() => {
                if (Math.random() > 0.45) addChakkar();
                if (Math.random() > 0.5) addFlowerPot();
                if (Math.random() > 0.65) addRomanCandle();
            }, 4000);

            window.addEventListener('click', e => {
                if (e.target.closest('a,button,.product-card,.cat-card,.faq-question')) return;
                const t = randI(0, 2);
                if (t === 0) launchAerial(W / 2, H, e.clientX, e.clientY);
                else triggerAtomBomb(e.clientX, e.clientY);
            });
        }

        /* ── 3. CURSOR (Global Handling) ── */
        document.addEventListener('mousemove', e => {
            mx = e.clientX;
            my = e.clientY;
            if (Math.random() > 0.82 && typeof spawnSparklerParticle === 'function') spawnSparklerParticle(mx, my);
        });

        /* ── 4. SLIDER ── */
        let current = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        window.goToSlide = function(n) {
            if (!slides.length) return;
            slides[current].classList.remove('active');
            if (dots[current]) dots[current].classList.remove('active');
            current = (n + slides.length) % slides.length;
            slides[current].classList.add('active');
            if (dots[current]) dots[current].classList.add('active');
        };
        if (slides.length > 1) setInterval(() => window.goToSlide(current + 1), 5000);

        /* ── 5. COUNTDOWN ── */
        function updateCountdown() {
            const target = new Date();
            target.setDate(target.getDate() + 12);
            target.setHours(0, 0, 0, 0);
            const diff = target - new Date();
            const d = Math.floor(diff / 86400000),
                h = Math.floor((diff % 86400000) / 3600000),
                m = Math.floor((diff % 3600000) / 60000),
                s = Math.floor((diff % 60000) / 1000);
            const pad = n => String(n).padStart(2, '0');
            const dEl = document.getElementById('cnt-days'),
                hEl = document.getElementById('cnt-hrs'),
                mEl = document.getElementById('cnt-min'),
                sEl = document.getElementById('cnt-sec');
            if (dEl) dEl.textContent = pad(d);
            if (hEl) hEl.textContent = pad(h);
            if (mEl) mEl.textContent = pad(m);
            if (sEl) sEl.textContent = pad(s);
        }
        updateCountdown();
        setInterval(updateCountdown, 1000);

        /* ── 6. FAQ ── */
        window.toggleFaq = function(btn) {
            const item = btn.closest('.faq-item'),
                isOpen = item.classList.contains('open');
            document.querySelectorAll('.faq-item.open').forEach(i => i.classList.remove('open'));
            if (!isOpen) item.classList.add('open');
        };


        /* ── 8. REVEAL ON SCROLL (GSAP BATCHED) ── */
        const revealEls = document.querySelectorAll('.product-card, .why-cell, .step-item, .testi-card, .cat-card, .process-step, .safety-tip, .fact-item, .faq-item, .stat-cell');
        if (revealEls.length) {
            gsap.set(revealEls, {
                opacity: 0,
                y: 30
            });
            ScrollTrigger.batch(revealEls, {
                onEnter: batch => gsap.to(batch, {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    stagger: 0.15,
                    ease: "power2.out",
                    overwrite: true
                }),
                start: "top 88%",
                once: true
            });
        }
        /* ── 9. GOLDEN GLOW ENGINE (CURSOR & PARTICLES) ── */
        class GoldenGlowEngine {
            constructor() {
                this.canvas = document.getElementById('glow-cursor-canvas');
                if (!this.canvas) return;
                this.ctx = this.canvas.getContext('2d');
                this.particles = [];
                this.mouse = {
                    x: -100,
                    y: -100,
                    active: false
                };
                this.resize();
                this.init();
                this.animate();
            }

            resize() {
                this.canvas.width = window.innerWidth;
                this.canvas.height = window.innerHeight;
            }

            init() {
                window.addEventListener('resize', () => this.resize());
                window.addEventListener('mousemove', (e) => {
                    this.mouse.x = e.clientX;
                    this.mouse.y = e.clientY;
                    this.mouse.active = true;
                    this.createCursorSparks(e.clientX, e.clientY);
                });
            }

            createCursorSparks(x, y) {
                for (let i = 0; i < 3; i++) {
                    this.particles.push({
                        x,
                        y,
                        vx: (Math.random() - 0.5) * 2,
                        vy: (Math.random() - 0.5) * 2,
                        size: Math.random() * 2 + 1,
                        color: `rgba(212, 175, 55, ${Math.random() * 0.5 + 0.5})`,
                        life: 1,
                        decay: Math.random() * 0.02 + 0.01
                    });
                }
            }

            animate() {
                this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
                this.particles.forEach((p, i) => {
                    p.x += p.vx;
                    p.y += p.vy;
                    p.life -= p.decay;
                    if (p.life <= 0) {
                        this.particles.splice(i, 1);
                    } else {
                        this.ctx.beginPath();
                        this.ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                        this.ctx.fillStyle = p.color.replace(')', `, ${p.life})`);
                        this.ctx.shadowBlur = 10 * p.life;
                        this.ctx.shadowColor = '#D4AF37';
                        this.ctx.fill();
                    }
                });
                requestAnimationFrame(() => this.animate());
            }
        }

        // Initialize the engine
        document.addEventListener('DOMContentLoaded', () => {
            new GoldenGlowEngine();
        });
    })();
</script>

</div>
@endsection