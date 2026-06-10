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

        /* 1. HIDE THE DEFAULT CURSOR ONLY ON DESKTOP */
        @media (min-width: 992px) {
            body, html, * {
                cursor: none !important;
            }
        }

        /* 2. STYLE THE CANVAS TO COVER THE FULL SCREEN */
        #fireCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none; /* CRITICAL: Allows you to click buttons underneath the canvas */
            z-index: 999999; /* Ensure it stays on top of all your website content */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        /* LUXURY PRELOADER */
        #preloader {
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, #080810, #0C0C18);
            z-index: 100000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.8s cubic-bezier(0.77, 0, 0.175, 1);
        }

        .preloader-inner {
            text-align: center;
            padding: 50px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
            backdrop-filter: blur(25px);
            border: var(--luminous-border);
            border-radius: 40px;
            box-shadow: var(--shadow-premium);
        }

        .preloader-logo {
            width: 130px;
            height: auto;
            margin-bottom: 25px;
            filter: brightness(0) invert(1);
            animation: preloaderPulse 2s infinite;
            filter: drop-shadow(0 0 15px rgba(255, 255, 255, 0.6));
        }

        .preloader-bar {
            width: 180px;
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
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
            background: linear-gradient(to right, #FFFFFF, var(--gold-light), #FFFFFF);
            width: 0%;
            animation: preloaderFill 2s infinite;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
        }

        @keyframes preloaderPulse {

            0%,
            100% {
                opacity: 0.5;
                transform: scale(0.95);
            }

            50% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes preloaderFill {
            0% {
                left: -100%;
                width: 100%;
            }

            100% {
                left: 100%;
                width: 100%;
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
            transform: translateY(-8px) scale(1.1);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
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
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: inherit;
            opacity: 0.4;
            animation: fabRipple 2s infinite;
        }

        @keyframes fabRipple {
            0% {
                transform: scale(1);
                opacity: 0.4;
            }

            100% {
                transform: scale(2.2);
                opacity: 0;
            }
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
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 20px 50px rgba(255, 255, 255, 0.3);
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

    <!-- Custom Canvas Firework Cursor -->
    <canvas id="fireCanvas"></canvas>

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

        /* Advanced Canvas Firework Cursor Logic */
        const canvas = document.getElementById('fireCanvas');
        const ctx = canvas.getContext('2d');
        
        let width, height;
        let particles = [];
        
        // Track mouse/touch position
        const mouse = {
            x: 0,
            y: 0,
            isActive: false
        };

        // Firework colors (Kept per request)
        const colors = ['#FFD700', '#FFA500', '#FF4500', '#FFFFFF', '#00FFFF', '#32CD32', '#FF1493'];

        // Mobile Check
        const isMobileDevice = () => {
            return window.innerWidth < 992 || ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);
        };

        // Handle window resizing
        function resize() {
            width = window.innerWidth;
            height = window.innerHeight;
            canvas.width = width;
            canvas.height = height;
        }
        window.addEventListener('resize', resize);
        resize();

        class Particle {
            constructor(x, y, isExplosion = false) {
                this.x = x;
                this.y = y;
                this.prevX = x;
                this.prevY = y;
                
                this.life = 1;
                this.color = colors[Math.floor(Math.random() * colors.length)];
                this.size = Math.random() * 3 + 1.5;
                
                if (isExplosion) {
                    const angle = Math.random() * Math.PI * 2;
                    const speed = Math.random() * 12 + 2;
                    this.vx = Math.cos(angle) * speed;
                    this.vy = Math.sin(angle) * speed;
                    this.gravity = 0.15;
                    this.decay = Math.random() * 0.02 + 0.015;
                } else {
                    this.vx = (Math.random() - 0.5) * 6; 
                    this.vy = (Math.random() * -14) - 2; 
                    this.gravity = 0.4; 
                    this.decay = Math.random() * 0.02 + 0.01;
                }
            }

            update() {
                this.prevX = this.x;
                this.prevY = this.y;
                
                this.vy += this.gravity;
                this.x += this.vx;
                this.y += this.vy;
                this.life -= this.decay;
            }

            draw(ctx) {
                ctx.beginPath();
                ctx.moveTo(this.prevX, this.prevY);
                ctx.lineTo(this.x, this.y);
                ctx.strokeStyle = this.color;
                ctx.globalAlpha = Math.max(0, this.life);
                ctx.lineWidth = this.size;
                ctx.lineCap = 'round';
                ctx.stroke();
            }
        }

        function drawFlowerPot(x, y) {
            ctx.save();
            ctx.translate(x, y);

            ctx.shadowBlur = 15;
            ctx.shadowColor = '#00BFFF'; // Premium Blue Glow

            ctx.beginPath();
            ctx.moveTo(0, 0);          
            ctx.lineTo(16, 45);        
            ctx.lineTo(-16, 45);       
            ctx.closePath();

            let grad = ctx.createLinearGradient(-16, 0, 16, 0);
            grad.addColorStop(0, '#00008B');   // Dark Blue
            grad.addColorStop(0.5, '#00BFFF'); // Deep Sky Blue
            grad.addColorStop(1, '#00008B');   // Dark Blue
            ctx.fillStyle = grad;
            ctx.fill();

            ctx.shadowBlur = 0; 
            ctx.beginPath();
            ctx.moveTo(-7, 20);
            ctx.lineTo(7, 20);
            ctx.lineTo(10, 28);
            ctx.lineTo(-10, 28);
            ctx.closePath();
            ctx.fillStyle = '#FFFF00'; // Vibrant Yellow Detail
            ctx.fill();

            ctx.beginPath();
            ctx.arc(0, 0, 3, 0, Math.PI * 2);
            ctx.fillStyle = '#FFFFFF';
            ctx.fill();

            ctx.restore();
        }

        function drawPotShadow(x, y) {
            ctx.save();
            ctx.translate(x, y);
            ctx.beginPath();
            ctx.moveTo(0, 0);
            ctx.lineTo(18, 50);
            ctx.lineTo(-18, 50);
            ctx.fillStyle = 'rgba(0, 0, 0, 0.4)';
            ctx.filter = 'blur(5px)';
            ctx.fill();
            ctx.restore();
        }

        window.addEventListener('mousemove', (e) => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
            mouse.isActive = true;
        });

        window.addEventListener('mouseout', () => mouse.isActive = false);
        window.addEventListener('mouseenter', () => mouse.isActive = true);

        window.addEventListener('touchmove', (e) => {
            mouse.x = e.touches[0].clientX;
            mouse.y = e.touches[0].clientY;
            mouse.isActive = true;
        }, { passive: true });

        function triggerExplosion(x, y) {
            for (let i = 0; i < 50; i++) {
                particles.push(new Particle(x, y, true));
            }
        }

        window.addEventListener('mousedown', (e) => triggerExplosion(e.clientX, e.clientY));
        window.addEventListener('touchstart', (e) => triggerExplosion(e.touches[0].clientX, e.touches[0].clientY), { passive: true });

        function animate() {
            ctx.clearRect(0, 0, width, height);
            ctx.globalCompositeOperation = 'lighter';

            if (mouse.isActive && !isMobileDevice()) {
                for(let i = 0; i < 3; i++) {
                    particles.push(new Particle(mouse.x, mouse.y, false));
                }
            }

            for (let i = particles.length - 1; i >= 0; i--) {
                particles[i].update();
                particles[i].draw(ctx);
                
                if (particles[i].life <= 0) {
                    particles.splice(i, 1);
                }
            }

            ctx.globalCompositeOperation = 'source-over';
            ctx.globalAlpha = 1.0;

            if (mouse.isActive && !document.getElementById('preloader') && !isMobileDevice()) {
                drawPotShadow(mouse.x, mouse.y); 
                drawFlowerPot(mouse.x, mouse.y);
            }

            requestAnimationFrame(animate);
        }

        animate();

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
