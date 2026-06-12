<!-- ===== ENTERPRISE FLOATING HEADER ===== -->
<div class="top-announcement">
    <div class="a-inner">
        <div class="ticker-container">
            <div class="ticker-content">
                {!! $global_settings->top_offer_text ?? '<span class="ticker-item"><i class="fa-solid fa-bolt"></i> Sivakasi Direct Delivery</span><span class="ticker-item"><i class="fa-solid fa-shield"></i> Child-Safe Certified</span><span class="ticker-item"><i class="fa-solid fa-leaf"></i> Eco-Friendly Sparklers Available</span>' !!}
            </div>
        </div>
        <div class="a-right">
            <a href="tel:{{ $global_settings->phone_number }}"><i class="fa-solid fa-headset"></i> Contact:
                {{ $global_settings->phone_number }}</a>
        </div>
    </div>
</div>

<header class="luxury-header" id="luxuryHeader">
    <div class="h-container">

        <!-- LOGO -->
        <a href="{{ url('/') }}" class="h-logo">
            <img src="{{ str_replace('http://', '//', env('MAIN_URL', '/')) . $global_settings->logo }}" alt="Sri Shyam Crackers" id="mainLogo">
        </a>


        <!-- NAVIGATION PILL -->
        <nav class="h-nav">
            <ul class="h-menu">
                <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}"><i
                            class="fa-solid fa-house-chimney-window"></i> <span>Home</span></a></li>
                <li><a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}"><i
                            class="fa-solid fa-feather-pointed"></i> <span>About</span></a></li>
                <li><a href="{{ url('/estimate') }}" class="{{ request()->is('estimate') ? 'active' : '' }}"><i
                            class="fa-solid fa-fire-extinguisher"></i> <span>Estimate</span></a></li>
                <li><a href="{{ url('/bank') }}" class="{{ request()->is('bank') ? 'active' : '' }}"><i
                            class="fa-solid fa-credit-card"></i> <span>Payment</span></a></li>
                <li><a href="{{ url('/blog') }}" class="{{ request()->is('blog*') ? 'active' : '' }}"><i
                            class="fa-solid fa-newspaper"></i> <span>Blog</span></a></li>
                <li><a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}"><i
                            class="fa-solid fa-paper-plane"></i> <span>Contact</span></a></li>
            </ul>
        </nav>

        <!-- CTAs -->
        <div class="h-actions">
            <!-- Lang Pilled -->
            <div class="lang-matrix">
                <button onclick="changeLang('en')" id="btn-en" class="l-btn">EN</button>
                <button onclick="changeLang('ta')" id="btn-ta" class="l-btn">தமிழ்</button>
                <button onclick="changeLang('kn')" id="btn-kn" class="l-btn">ಕನ್ನಡ</button>
            </div>

            <a href="{{ url('estimate') }}" class="h-cta-btn">
                <span>Shop Now</span>
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>

            <!-- Mobile Trigger -->
            <button class="menu-trigger" id="menuTrigger">
                <span class="m-line top"></span>
                <span class="m-line mid"></span>
                <span class="m-line bot"></span>
            </button>
        </div>
    </div>
</header>
<div class="top-announcement bottom-ticker">
    <div class="a-inner">
        <div class="ticker-container">
            <div class="ticker-content">
                {!! $global_settings->top_offer_text_2 ?? '<span class="ticker-item"><i class="fa-solid fa-bolt"></i> Sivakasi Direct Delivery</span><span class="ticker-item"><i class="fa-solid fa-shield"></i> Child-Safe Certified</span><span class="ticker-item"><i class="fa-solid fa-leaf"></i> Eco-Friendly Sparklers Available</span>' !!}
            </div>
        </div>
        <div class="a-right">
            <a href="tel:{{ $global_settings->phone_number }}"><i class="fa-solid fa-headset"></i> Contact:
                {{ $global_settings->phone_number }}</a>
        </div>
    </div>
</div>
<!-- Google Translate (Hidden) -->
<div id="google_translate_element" style="display:none"></div>


<!-- MOBILE DRAWER -->
<div class="m-drawer" id="mobileDrawer">
    <div class="m-drawer-inner">
        <div class="m-drawer-header">
            <img src="{{ str_replace('http://', '//', env('MAIN_URL', '/')) . $global_settings->logo }}" alt="Logo">
            <button class="drawer-close" id="drawerClose"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <ul class="m-drawer-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About Us</a></li>
            <li><a href="{{ url('/estimate') }}">Shop Estimate</a></li>
            <li><a href="{{ url('/bank') }}">Payment Info</a></li>
            <li><a href="{{ url('/blog') }}">Latest Blog</a></li>
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
        </ul>
        <div class="m-drawer-footer">
            <p>Ready to light up the sky?</p>
            <a href="tel:{{ $global_settings->phone_number }}" class="btn-call-m">Call Now</a>
        </div>
    </div>
</div>

<style>
    /* ========================
   HEADER STYLES (ENTERPRISE)
   ======================== */
    .top-announcement {
        background: #FFFFFF;
        /* White Background */
        color: #000000;
        padding: 10px 40px;
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        z-index: 1001;
        position: relative;
    }

    .a-inner {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .ticker-container {
        overflow: hidden;
        flex: 1;
        margin-right: 50px;
        position: relative;
    }

    .ticker-wrapper {
        display: block;
    }

    .ticker-content {
        display: flex;
        gap: 35px;
        flex-wrap: wrap;
        padding-right: 0;
    }

    .ticker-item {
        white-space: nowrap;
    }

    .a-left {
        display: flex;
        gap: 35px;
    }

    .ticker-item i {
        color: #e53a12;
        /* Orange Icons */
        margin-right: 8px;
    }

    .a-right a {
        color: #000000;
        text-decoration: none;
        transition: 0.3s;
    }

    .a-right a:hover {
        color: #e53a12;
    }

    /* HIDE GOOGLE TRANSLATE BAR & ARTIFACTS */
    .goog-te-banner-frame.skiptranslate,
    .goog-te-banner-frame,
    .goog-te-balloon-frame,
    #goog-gt-tt,
    .goog-te-balloon-frame.skiptranslate,
    .goog-text-highlight {
        display: none !important;
    }

    body {
        top: 0 !important;
    }

    .goog-logo-link {
        display: none !important;
    }

    .goog-te-gadget {
        color: transparent !important;
        font-size: 0 !important;
    }

    .goog-te-gadget .goog-te-combo {
        display: none !important;
    }

    /* Prevent body shift */
    .skiptranslate {
        display: none !important;
    }


    .luxury-header {
        position: sticky;
        top: 0;
        z-index: 1000;
        padding: 15px 40px;
        background: white;
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .luxury-header.scrolled {
        padding: 10px 40px;
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .h-container {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
    }

    .h-logo img {
        height: 70px;
        width: auto;
        transition: .4s;
    }

    .h-nav {
        background: rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.06);
        padding: 4px;
        border-radius: 50px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .h-menu {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 4px;
    }

    .h-menu li a {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 22px;
        color: #333;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 800;
        border-radius: 40px;
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        overflow: hidden;
        border: 1px solid transparent;
        letter-spacing: 0.5px;
    }

    /* LIQUID GLASS EFFECT BASE */
    .h-menu li a::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.4), transparent);
        opacity: 0;
        transition: 0.4s;
    }

    .h-menu li a:hover::before {
        opacity: 1;
    }

    /* UNIQUE LIQUID GRADIENTS PER BUTTON */
    /* Home - Deep Blue Ocean */
    .h-menu li:nth-child(1) a:hover,
    .h-menu li:nth-child(1) a.active {
        background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
        color: #FFF;
        box-shadow: 0 10px 20px rgba(0, 114, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* About - Royal Purple */
    .h-menu li:nth-child(2) a:hover,
    .h-menu li:nth-child(2) a.active {
        background: linear-gradient(135deg, #8E2DE2 0%, #4A00E0 100%);
        color: #FFF;
        box-shadow: 0 10px 20px rgba(74, 0, 224, 0.25);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* Estimate - Fire Gold */
    .h-menu li:nth-child(3) a:hover,
    .h-menu li:nth-child(3) a.active {
        background: linear-gradient(135deg, #F2994A 0%, #F2C94C 100%);
        color: #0b0b14;
        box-shadow: 0 10px 20px rgba(242, 153, 74, 0.25);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* Payment - Emerald Mint */
    .h-menu li:nth-child(4) a:hover,
    .h-menu li:nth-child(4) a.active {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: #FFF;
        box-shadow: 0 10px 20px rgba(17, 153, 142, 0.25);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* Blog - Midnight Indigo */
    .h-menu li:nth-child(5) a:hover,
    .h-menu li:nth-child(5) a.active {
        background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
        color: #FFF;
        box-shadow: 0 10px 20px rgba(24, 40, 72, 0.25);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* Contact - Electric Rose */
    .h-menu li:nth-child(6) a:hover,
    .h-menu li:nth-child(6) a.active {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: #FFF;
        box-shadow: 0 10px 20px rgba(245, 87, 108, 0.25);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .h-menu li a i {
        font-size: 0.9rem;
        opacity: 0.6;
        transition: .4s;
    }

    .h-menu li a:hover i,
    .h-menu li a.active i {
        opacity: 1;
        transform: rotate(10deg) scale(1.1);
    }

    .h-actions {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .lang-matrix {
        background: rgba(0, 0, 0, 0.04);
        border-radius: 30px;
        padding: 3px;
        display: flex;
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .l-btn {
        border: none;
        background: none;
        padding: 6px 14px;
        font-size: 0.7rem;
        font-weight: 800;
        border-radius: 25px;
        transition: .3s;
        color: #555;
        cursor: pointer;
    }

    .l-btn.active {
        background: #e53a12;
        color: #FFF;
        box-shadow: 0 4px 10px rgba(229, 58, 18, 0.2);
    }

    .h-cta-btn {
        background: #e53a12;
        color: #FFF;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: .4s cubic-bezier(0.23, 1, 0.32, 1);
        box-shadow: 0 10px 30px rgba(229, 58, 18, 0.3);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .h-cta-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: 0.5s;
    }

    .h-cta-btn:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 15px 40px rgba(229, 58, 18, 0.4);
        background: #c92a0d;
    }

    .h-cta-btn:hover::before {
        left: 100%;
    }

    /* Menu Trigger */
    .menu-trigger {
        display: none;
        background: none;
        border: none;
        width: 45px;
        height: 45px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
        cursor: pointer;
    }

    .m-line {
        width: 22px;
        height: 2px;
        background: #e53a12;
        border-radius: 4px;
        transition: .4s;
    }

    /* DRAWER */
    .m-drawer {
        position: fixed;
        inset: 0;
        z-index: 100002;
        background: rgba(0, 0, 0, 0.7);
        visibility: hidden;
        opacity: 0;
        transition: .4s;
        backdrop-filter: blur(5px);
    }

    .m-drawer.open {
        visibility: visible;
        opacity: 1;
    }

    .m-drawer-inner {
        position: absolute;
        top: 0;
        right: -340px;
        width: 340px;
        height: 100%;
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.98), rgba(245, 245, 245, 0.98));
        backdrop-filter: blur(30px);
        -webkit-backdrop-filter: blur(30px);
        border-left: 2px solid rgba(229, 58, 18, 0.2);
        transition: .5s cubic-bezier(0.19, 1, 0.22, 1);
        padding: 40px;
        display: flex;
        flex-direction: column;
        box-shadow: -20px 0 60px rgba(0, 0, 0, 0.5);
    }

    .m-drawer.open .m-drawer-inner {
        right: 0;
    }

    .m-drawer-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
    }

    .m-drawer-header img {
        height: 40px;
    }

    .drawer-close {
        background: rgba(0, 0, 0, .05);
        color: #000;
        border: 1px solid rgba(0, 0, 0, .1);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        cursor: pointer;
        transition: .3s;
    }

    .drawer-close:hover {
        background: rgba(229, 58, 18, .1);
        color: #e53a12;
    }

    .m-drawer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .m-drawer-links li {
        margin-bottom: 25px;
    }

    .m-drawer-links a {
        font-size: 1.5rem;
        text-decoration: none;
        color: #000;
        font-family: var(--font-display);
        font-weight: 700;
        transition: .3s;
    }

    .m-drawer-links a:hover {
        color: #e53a12;
    }

    .m-drawer-footer {
        margin-top: auto;
        padding-top: 40px;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    .btn-call-m {
        display: block;
        background: linear-gradient(135deg, #e53a12 0%, #b82a0d 100%);
        color: #FFFFFF;
        text-align: center;
        padding: 15px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        margin-top: 15px;
        box-shadow: 0 10px 20px rgba(229, 58, 18, 0.3);
    }

    @media (max-width: 1200px) {
        .h-nav {
            display: none;
        }

        .menu-trigger {
            display: flex;
        }

        .h-actions .h-cta-btn {
            display: none;
        }

        .luxury-header {
            padding: 15px 25px;
        }
    }

    @media (max-width : 1280px) and (max-height :801px) {
        .h-cta-btn {
            font-weight: 700;
        }

    }

    @media screen and (max-width: 852px) {
        .a-right {
            display: none !important;
        }
        .f-grid {
                grid-template-columns: 1fr !important;
            }
    }
</style>

<script>
    /* Header Dynamic Scroll */
    window.addEventListener('scroll', () => {
        const header = document.getElementById('luxuryHeader');
        header.classList.toggle('scrolled', window.scrollY > 80);
    });

    /* Mobile Navigation Trigger */
    const trigger = document.getElementById('menuTrigger');
    const drawer = document.getElementById('mobileDrawer');
    const close = document.getElementById('drawerClose');

    trigger?.addEventListener('click', () => drawer.classList.add('open'));
    close?.addEventListener('click', () => drawer.classList.remove('open'));
    drawer?.addEventListener('click', (e) => {
        if (e.target === drawer) drawer.classList.remove('open');
    });

    /* Language Selection Handling */
    function changeLang(lang) {
        localStorage.setItem('user_lang', lang);
        document.querySelectorAll('.l-btn').forEach(b => b.classList.remove('active'));
        document.getElementById('btn-' + lang).classList.add('active');

        // Trigger Google Translate logic
        const gTranslate = document.querySelector('.goog-te-combo');
        if (gTranslate) {
            gTranslate.value = lang;
            gTranslate.dispatchEvent(new Event('change'));
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const saved = localStorage.getItem('user_lang') || 'en';
        document.querySelectorAll('.l-btn').forEach(b => b.classList.remove('active'));
        document.getElementById('btn-' + saved)?.classList.add('active');

        /* Auto-trigger Google Translate on load if not English */
        const checkGTranslate = setInterval(() => {
            const gTranslate = document.querySelector('.goog-te-combo');
            if (gTranslate) {
                if (saved !== 'en') {
                    gTranslate.value = saved;
                    gTranslate.dispatchEvent(new Event('change'));
                }
                clearInterval(checkGTranslate);
            }
        }, 500);

        // Safety timeout
        setTimeout(() => clearInterval(checkGTranslate), 10000);
    });

    /* Google Translate Initialization */
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,ta,kn',
            autoDisplay: false
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>