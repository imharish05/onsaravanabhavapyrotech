<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="{{ $global_settings->meta_title ?? 'Sri Shyam Crackers – India\'s Finest Fireworks About' }}">

    <title>{{ $global_settings->meta_title ?? 'Sri Shyam Crackers' }}</title>

    <link rel="icon" type="image/png"
        href="{{ $global_settings->favicon ? str_replace('http://', '//', env('MAIN_URL', '/')) . $global_settings->favicon : asset('assets/img/favicon.png') }}">


    <!-- World Class Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            /* ENTERPRISE GOLDEN PALETTE */
            --gold: #D4860A;
            --gold-light: #F0A832;
            --gold-deep: #996515;
            --gold-glimmer: linear-gradient(90deg, #F0A832, #D4860A, #F0A832);

            --ink: #080810; /* Deepest Black */
            --text: #FFFFFF; /* Light Text */
            --charcoal: #1F1F1F;
            --cream: #0c0c18; /* Dark Indigo */
            --ivory: #0b0b14; /* Deep Midnight */
            --saffron: #F4C430;
            --clay: #1a1a30;

            --font-display: 'Outfit', sans-serif;
            --font-body: 'Outfit', sans-serif;
            --font-accent: 'Outfit', sans-serif;

            --blur: saturate(180%) blur(20px);
            --glass: rgba(11, 11, 20, 0.85);
            --shadow-premium: 0 30px 60px rgba(0, 0, 0, 0.5), 0 0 80px rgba(255, 255, 255, 0.1); --luminous-border: 1.5px solid rgba(255, 255, 255, 0.4); --luminous-text: 0 0 15px rgba(255, 255, 255, 0.4);
        }

        /* SIMPLE PROFESSIONAL TRANSITIONS */
        html {
            scroll-behavior: smooth;
        }

        button, a, input, select, textarea {
            transition: background-color .22s ease, color .22s ease, transform .22s ease, box-shadow .22s ease, opacity .22s ease;
        }

        .animate__animated,
        .wow,
        [class*="animate"],
        [class*="fade"],
        [class*="slide"],
        [class*="bounce"],
        [class*="spinner"] {
            animation-duration: 0.6s !important;
            animation-timing-function: ease !important;
            animation-iteration-count: 1 !important;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition-duration: .25s !important;
            transition-timing-function: ease !important;
            animation-duration: .55s !important;
            animation-iteration-count: 1 !important;
            animation-timing-function: ease !important;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            color: var(--text);
            background: var(--ivory);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        button, a, input, select, textarea {
            transition: background-color .25s ease, color .25s ease, transform .25s ease, box-shadow .25s ease, opacity .25s ease;
        }

        .animate__animated,
        .wow,
        [class*="animate"],
        [class*="fade"],
        [class*="slide"],
        [class*="bounce"],
        [class*="spinner"] {
            animation-duration: 0.55s !important;
            animation-timing-function: ease !important;
            animation-iteration-count: 1 !important;
        }

        /* Noise Texture Overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: url('https://www.transparenttextures.com/patterns/p6.png');
            opacity: 0.03;
            pointer-events: none;
            z-index: 9999;
        }

        /* SIMPLE PROFESSIONAL PRELOADER */
        #preloader {
            position: fixed;
            inset: 0;
            background: #080810;
            z-index: 100000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease;
        }

        .preloader-inner {
            text-align: center;
            padding: 24px 28px;
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(18px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.28);
        }

        .preloader-logo {
            width: 120px;
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            filter: brightness(0) invert(1);
            animation: preloaderPulse 1.8s ease-in-out infinite;
        }

        .preloader-bar {
            width: 180px;
            height: 4px;
            background: rgba(255, 255, 255, 0.12);
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .preloader-progress {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            background: rgba(255, 255, 255, 0.45);
            width: 100%;
            border-radius: 10px;
            opacity: 0.35;
        }

        @keyframes preloaderPulse {
            0%, 100% {
                opacity: 0.8;
                transform: translateY(0);
            }

            50% {
                opacity: 1;
                transform: translateY(-2px);
            }
        }

        #scrollProgress {
            position: fixed;
            top: 0;
            left: 0;
            height: 5px;
            background: linear-gradient(to right, #FFFFFF, var(--gold-light), #FFFFFF);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.6);
            width: 0%;
            z-index: 100001;
        }

        /* GLOBAL TYPOGRAPHY */
        h1,
        h2,
        h3 {
            font-family: var(--font-display);
            font-weight: 800;
            color: var(--text);
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
        }
        
        .luminous-text {
            text-shadow:
                0 2px 10px rgba(255, 255, 255, 0.3),
                0 0 40px rgba(255, 255, 255, 0.2);
        }

        .accent-text {
            font-family: var(--font-accent);
            color: var(--gold-light);
            font-style: italic;
        }

        /* FAB SYSTEM */
        .luxury-fab-group {
            position: fixed;
            bottom: 40px;
            left: 40px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .luxury-fab-group-right {
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 18px;
            align-items: flex-end;
        }

        /* Responsive Hide for Estimate Page */
        @media (max-width: 768px) {
            .fab-hide-estimate-mobile {
                display: none !important;
            }
        }

        .l-fab {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            color: #fff;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: 0.4s;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(15px);
            border: 1.5px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.2);
            text-decoration: none;
        }

        .l-fab:hover {
            transform: translateY(-4px) scale(1.04);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.18);
        }

        .l-fab.wa {
            background: #25D366;
        }

        .l-fab.ph {
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
            box-shadow: 0 10px 20px rgba(240, 168, 50, 0.3);
        }

        .l-fab.est {
            background: var(--saffron);
            color: #0b0b14;
        }

        .l-fab i {
            position: relative;
            z-index: 2;
        }

        .fab-ripple {
            display: none;
        }

        /* GO TOP */
        .go-top-premium {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            color: #FFFFFF;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            box-shadow: 
                0 15px 40px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255, 255, 255, 0.6);
            transition: .4s cubic-bezier(0.23, 1, 0.32, 1);
            cursor: pointer;
        }

        .go-top-premium:hover {
            background: #FFFFFF;
            color: #0b0b14;
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 14px 30px rgba(255, 255, 255, 0.18);
        }
    </style>

    @stack('styles')
    @include('layouts._home-theme-polish')
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-inner">
            <img src="{{ env('MAIN_URL', '/') . $global_settings->logo }}" class="preloader-logo" alt="Loading">
            <div class="preloader-bar">
                <div class="preloader-progress"></div>
            </div>
        </div>
    </div>

    <!-- Scroll Progress -->
    <div id="scrollProgress"></div>

    @include('layouts.header')

    <main class="site-main" id="mainContent">
        @php
            $pageOff = \App\Models\PageOff::first();
            $isOff = $pageOff && (int) $pageOff->status === 0 && !empty($pageOff->image);
        @endphp

        @if($isOff)
            <section class="maintenance-luxury">
                <div class="m-container">
                    <div class="m-visual">
                        <img src="{{ env('MAIN_URL') . $pageOff->image }}" alt="Maintenance">
                    </div>
                    <div class="m-content">
                        <h2>Under <span>Maintenance</span></h2>
                        <p>Our artisans are currently refining your experience. We will be back with even more brilliance
                            shortly.</p>
                        <div class="m-divider"></div>
                    </div>
                </div>
            </section>
            <style>
                .maintenance-luxury {
                    min-height: 85vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: linear-gradient(135deg, #080810, #0C0C18);
                    padding: 100px 40px;
                    position: relative;
                    overflow: hidden;
                }

                .m-container {
                    max-width: 1000px;
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 60px;
                    align-items: center;
                    z-index: 2;
                }

                .m-visual img {
                    width: 100%;
                    border-radius: 40px;
                    border: var(--luminous-border);
                    box-shadow: var(--shadow-premium);
                    transform: rotate(-2deg);
                }

                .m-content h2 {
                    font-size: 4rem;
                    line-height: 1.1;
                    margin-bottom: 24px;
                    text-shadow: var(--luminous-text);
                }

                .m-content h2 span {
                    color: #FFFFFF;
                    display: block;
                    font-family: var(--font-accent);
                    opacity: 0.8;
                }

                .m-content p {
                    font-size: 1.2rem;
                    color: rgba(255, 255, 255, 0.6);
                    line-height: 1.8;
                }

                .m-divider {
                    width: 60px;
                    height: 3px;
                    background: #FFFFFF;
                    box-shadow: 0 0 15px #FFFFFF;
                    margin-top: 30px;
                }
            </style>
        @else
            @yield('main-page')
        @endif
    </main>

    @include('layouts.footer')

    <!-- FAB GROUP -->
    <!-- LEFT FAB GROUP (Contact) -->
    <div class="luxury-fab-group {{ Request::is('estimate') ? 'fab-hide-estimate-mobile' : '' }}">
        <a href="tel:{{ $global_settings->phone_number }}" class="l-fab ph" title="Call Concierge">
            <i class="fa-solid fa-phone"></i>
            <div class="fab-ripple"></div>
        </a>
        <a href="https://wa.me/{{ $global_settings->whatsapp_number }}" target="_blank" class="l-fab wa"
            title="WhatsApp Us">
            <i class="fa-brands fa-whatsapp"></i>
            <div class="fab-ripple"></div>
        </a>
    </div>

    <!-- RIGHT FAB GROUP (Utilities) -->
    <div class="luxury-fab-group-right {{ Request::is('estimate') ? 'fab-hide-estimate-mobile' : '' }}">
        @if(!Request::is('estimate'))
            <a href="{{ url('estimate') }}" class="l-fab est" title="Shop Now">
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="fab-ripple"></div>
            </a>
        @endif
        <div class="go-top-premium" id="goTopBtn" style="opacity: 0; transition: opacity 0.4s;">
            <i class="fa-solid fa-arrow-up"></i>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Premium Animation Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>


    <script>
        /* Preloader Hide — Switched to DOMContentLoaded to allow skeleton loading visibility */
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const p = document.getElementById('preloader');
                if (p) {
                    p.style.opacity = '0';
                    p.style.pointerEvents = 'none';
                    setTimeout(() => p.remove(), 800);
                }
            }, 600); // Shorter delay for a snappier feel
        });

        /* Scroll Logic */
        window.addEventListener('scroll', () => {
            const top = document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (top / height) * 100;
            document.getElementById('scrollProgress').style.width = scrolled + '%';

            document.getElementById('goTopBtn').style.opacity = top > 500 ? '1' : '0';
        });

        document.getElementById('goTopBtn').onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });

        /* Custom cursor and canvas particles have been removed for a simplified, professional experience. */

        /* Alert Logic */
        @if(session('success'))
            Swal.fire({
                title: 'SUCCESS', text: '{{ session('success') }}', icon: 'success',
                confirmButtonColor: '#B8860B', background: '#fff',
                customClass: { popup: 'premium-swal' }
            });
        @endif
    </script>

    @stack('scripts')
</body>

</html>
