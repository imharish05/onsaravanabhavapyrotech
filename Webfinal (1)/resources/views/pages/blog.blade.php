@extends('layouts.default')

@section('main-page')

    <!-- ========================
             PREMIUM HERO BANNER
             ======================== -->
    <section class="premium-hero">
        <div class="hero-parallax-bg" style="background-image: url('{{ asset('assets/img/blog-premium.png') }}');"></div>
        <div class="hero-glass-overlay"></div>

        <div class="hero-content-wrap">
            <div class="container">
                <div class="hero-text-center">
                    <span class="hero-eyebrow"><i class="fa-solid fa-feather-pointed"></i> The Festive Blog</span>
                    <h1 class="hero-display-title">Stories of <span>Brilliance</span></h1>
                    <div class="hero-sep"></div>
                    <p class="hero-subtitle">Exploring the art, safety, and heritage of India's finest fireworks About from
                        the heart of Sivakasi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
             BLOG GRID SECTION
             ======================== -->
    <section class="premium-blog-section">
        <div class="v-bg-texture"></div>
        <div class="container">

            <div class="section-header text-center mb-5">
                <span class="b-eyebrow">Our Latest Articles</span>
                <h2 class="b-title">Celebration Chronicles</h2>
                <div class="b-title-sep"></div>
            </div>

            @if($blogs->isEmpty())
                <div class="blog-empty-luxury wow fadeIn">
                    <div class="empty-icon-wrap">
                        <i class="fa-solid fa-scroll"></i>
                    </div>
                    <h3>The Blog is Quiet</h3>
                    <p>Our artisans are busy crafting fireworks. New stories are launching soon — stay tuned for brilliance.</p>
                    <a href="{{ url('/') }}" class="cta-btn-gold mt-4"><span>Return to Home</span></a>
                </div>
            @else
                <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
                    @foreach($blogs as $index => $blog)
                        <div class="col wow fadeInUp" data-wow-delay="{{ 0.1 * ($index % 3) }}s">
                            <article class="luxury-blog-card">
                                <div class="l-card-img-wrap">
                                    @if($blog->image)
                                        <img src="{{ env('MAIN_URL', '/') . $blog->image }}" alt="{{ $blog->title }}" loading="lazy">
                                    @else
                                        <div class="l-card-placeholder">🎇</div>
                                    @endif
                                    <div class="l-card-overlay"></div>
                                    <div class="l-card-date">
                                        <span class="d-day">{{ $blog->created_at ? $blog->created_at->format('d') : '01' }}</span>
                                        <span class="d-mon">{{ $blog->created_at ? $blog->created_at->format('M') : 'JAN' }}</span>
                                    </div>
                                </div>

                                <div class="l-card-body">
                                    <h3 class="l-card-title">{{ $blog->title }}</h3>
                                    <div class="l-card-excerpt">
                                        {{ $blog->meta_des ? strip_tags($blog->meta_des) : strip_tags(Str::limit($blog->feet_content ?? '', 120)) }}
                                    </div>
                                    <div class="l-card-foot">
                                        <a href="{{ route('blog.show', $blog->url) }}" class="l-card-link">
                                            <span>Read Story</span>
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <!-- Premium Pagination -->
                <div class="row mt-5 pt-4">
                    <div class="col-12">
                        <div class="luxury-pagination-wrap">
                            {!! $blogs->links() !!}
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>

    <!-- ========================
             SUBSCRIBE CTA
             ======================== -->
    {{-- <section class="blog-subscribe">
        <div class="container">
            <div class="sub-glass-pill">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <h3 class="sub-title">Don't Miss the Next <span>Big Spark</span></h3>
                        <p class="sub-desc">Get the latest fireworks safety tips and exclusive festival deals delivered to
                            your inbox.</p>
                    </div>
                    <div class="col-lg-5">
                        <form class="sub-form">
                            <input type="email" placeholder="Enter your email address" required>
                            <button type="submit">Notify Me</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <style>
        /* ========================
           BLOG PAGE STYLES (GOLDEN LIGHT)
           ======================== */

        .premium-hero {
            height: 65vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
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
            background: linear-gradient(to bottom, rgba(16, 16, 16, 0.65), rgba(16, 16, 16, 0.95));
        }

        .hero-content-wrap {
            position: relative;
            z-index: 10;
            text-align: center;
        }

        .hero-eyebrow {
            color: var(--gold);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            display: block;
        }

        .hero-display-title {
            font-family: var(--font-display);
            font-size: 5rem;
            line-height: 1;
            color: #fff;
            margin-bottom: 20px;
            text-shadow:
                0 2px 10px rgba(255, 255, 255, 0.3),
                0 0 40px rgba(255, 255, 255, 0.2),
                0 0 80px rgba(255, 255, 255, 0.1);
        }

        .hero-display-title span {
            color: var(--gold-deep);
            font-family: var(--font-accent);
        }

        .hero-subtitle {
            color: rgba(255, 255, 255, 0.7);
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.2rem;
        }

        .hero-sep {
            width: 80px;
            height: 3px;
            background: var(--gold);
            margin: 30px auto;
        }

        /* Blog Grid */
        .premium-blog-section {
            padding: 120px 0;
            background: var(--cream);
            position: relative;
        }

        .v-bg-texture {
            position: absolute;
            inset: 0;
            background-image: url('https://www.transparenttextures.com/patterns/p6.png');
            opacity: 0.05;
            pointer-events: none;
        }

        .b-eyebrow {
            color: var(--gold-deep);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.8rem;
            display: block;
            margin-bottom: 15px;
        }

        .b-title {
            font-family: var(--font-display);
            font-size: 3.5rem;
            line-height: 1.1;
            margin-bottom: 20px;
            color: var(--ink);
        }

        .b-title-sep {
            width: 60px;
            height: 4px;
            background: var(--gold-deep);
            margin: 0 auto 50px;
        }

        /* Luxury Blog Card */
        .luxury-blog-card {
            background: #fff;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--stone);
            transition: .45s cubic-bezier(0.19, 1, 0.22, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .l-card-img-wrap {
            position: relative;
            aspect-ratio: 16/10;
            overflow: hidden;
        }

        .l-card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .6s;
        }

        .l-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.4), transparent);
            opacity: 0;
            transition: .4s;
        }

        .l-card-date {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #fff;
            padding: 10px 15px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            z-index: 5;
        }

        .d-day {
            display: block;
            font-family: var(--font-display);
            font-size: 1.4rem;
            font-weight: 900;
            color: #111;
            line-height: 1;
        }

        .d-mon {
            display: block;
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #111;
            margin-top: 2px;
        }

        .l-card-body {
            padding: 35px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .l-card-title {
            font-family: var(--font-display);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.25;
            color: #fff;
            transition: .3s;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
        }

        .l-card-excerpt {
            color: var(--muted);
            line-height: 1.7;
            font-size: 0.95rem;
            margin-bottom: 30px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .l-card-foot {
            margin-top: auto;
            padding-top: 25px;
            border-top: 1px solid var(--clay);
        }

        .l-card-link {
            text-decoration: none;
            color: var(--ink);
            font-weight: 800;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: .3s;
        }

        .l-card-link i {
            color: var(--gold-deep);
            transition: .4s;
        }

        /* Card Hover */
        .luxury-blog-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
            border-color: var(--gold-deep);
        }

        .luxury-blog-card:hover .l-card-img-wrap img {
            transform: scale(1.1);
        }

        .luxury-blog-card:hover .l-card-overlay {
            opacity: 1;
        }

        .luxury-blog-card:hover .l-card-title {
            color: var(--gold-deep);
        }

        .luxury-blog-card:hover .l-card-link i {
            transform: translateX(8px);
        }

        /* Empty State */
        .blog-empty-luxury {
            text-align: center;
            padding: 100px 40px;
            background: #fff;
            border-radius: 40px;
            border: 2px dashed var(--clay);
        }

        .empty-icon-wrap {
            width: 100px;
            height: 100px;
            background: var(--cream);
            border-radius: 50%;
            color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 30px;
        }

        .blog-empty-luxury h3 {
            font-family: var(--font-display);
            font-size: 2.2rem;
            margin-bottom: 15px;
        }

        .blog-empty-luxury p {
            color: var(--muted);
            max-width: 500px;
            margin: 0 auto;
        }

        /* Subscribe Pill */
        .blog-subscribe {
            padding-bottom: 120px;
            background: var(--cream);
        }

        .sub-glass-pill {
            background: var(--gold-deep);
            color: #fff;
            padding: 60px;
            border-radius: 50px;
            box-shadow: 0 30px 60px rgba(184, 134, 11, 0.25);
            position: relative;
            overflow: hidden;
        }

        .sub-glass-pill::after {
            content: '🎇';
            position: absolute;
            right: 20px;
            bottom: -20px;
            font-size: 8rem;
            opacity: 0.1;
            transform: rotate(-20deg);
        }

        .sub-title {
            font-family: var(--font-display);
            font-size: 2.8rem;
            margin-bottom: 10px;
        }

        .sub-title span {
            font-family: var(--font-accent);
            font-style: italic;
        }

        .sub-desc {
            opacity: 0.85;
            font-size: 1.1rem;
        }

        .sub-form {
            display: flex;
            gap: 15px;
            background: #fff;
            padding: 8px;
            border-radius: 40px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .sub-form input {
            flex-grow: 1;
            border: none;
            background: none;
            padding: 10px 25px;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .sub-form input:focus {
            outline: none;
        }

        .sub-form button {
            background: var(--ink);
            color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 800;
            transition: .3s;
        }

        .sub-form button:hover {
            background: var(--gold-deep);
            transform: scale(1.05);
        }

        /* Premium Pagination (Custom) */
        .luxury-pagination-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        .luxury-pagination-wrap .pagination {
            display: flex;
            gap: 8px;
            border: none;
        }

        .luxury-pagination-wrap .page-item {
            border: none;
        }

        .luxury-pagination-wrap .page-item .page-link {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 1px solid var(--clay);
            color: var(--muted);
            font-weight: 700;
            transition: .3s;
            font-size: 0.95rem;
        }

        .luxury-pagination-wrap .page-item.active .page-link {
            background: var(--gold-deep);
            border-color: var(--gold-deep);
            color: #fff;
            box-shadow: 0 8px 20px rgba(184, 134, 11, 0.2);
        }

        .luxury-pagination-wrap .page-item:hover:not(.active) .page-link {
            border-color: var(--gold-deep);
            color: var(--gold-deep);
            transform: translateY(-3px);
        }

        .luxury-pagination-wrap .page-item:first-child .page-link,
        .luxury-pagination-wrap .page-item:last-child .page-link {
            border-radius: 50%;
            padding: 0;
            width: 50px;
        }

        @media (max-width: 991px) {
            .sub-glass-pill {
                padding: 40px;
                border-radius: 30px;
                text-align: center;
            }

            .sub-form {
                flex-direction: column;
                padding: 20px;
                border-radius: 20px;
            }

            .sub-form button {
                width: 100%;
            }

            .hero-display-title {
                font-size: 3.5rem;
            }
        }

        /* Dark premium polish aligned with home/about/contact */
        .premium-hero {
            min-height: 580px;
            background: #080810;
        }

        .hero-glass-overlay {
            background:
                radial-gradient(circle at 50% 42%, rgba(240, 168, 50, 0.16), transparent 18rem),
                linear-gradient(to bottom, rgba(8, 8, 16, 0.72), rgba(8, 8, 16, 0.97));
        }

        .hero-eyebrow,
        .b-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
            border: 1.5px solid rgba(255, 255, 255, 0.6);
            color: #FFFFFF !important;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 3.5px;
            text-transform: uppercase;
            padding: 7px 20px;
            border-radius: 50px;
            box-shadow:
                0 0 20px rgba(255, 255, 255, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        .hero-display-title span,
        .b-title {
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            color: rgba(255,255,255,0.82);
            line-height: 1.7;
        }

        .premium-blog-section {
            background:
                linear-gradient(180deg, rgba(8,8,16,0.98), rgba(12,12,24,0.98));
            overflow: hidden;
        }

        .v-bg-texture {
            background-image: radial-gradient(rgba(212,134,10,0.08) 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 1;
        }

        .premium-blog-section .container {
            position: relative;
            z-index: 2;
        }

        /* Halo effect from home page */
        .premium-blog-section::before {
            content: '';
            position: absolute;
            top: 10%; left: 10%; right: 10%; bottom: 10%;
            background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            filter: blur(100px);
            z-index: 1;
            pointer-events: none;
        }

        .b-title {
            color: #fff !important;
            font-weight: 900;
            text-shadow:
                0 2px 10px rgba(255, 255, 255, 0.3),
                0 0 40px rgba(255, 255, 255, 0.2),
                0 0 80px rgba(255, 255, 255, 0.1);
        }

        .b-title-sep {
            background: linear-gradient(90deg, var(--gold-light), var(--gold));
            box-shadow: 0 0 14px rgba(240,168,50,0.45);
        }

        .luxury-blog-card,
        .blog-empty-luxury {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0.04));
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 2px solid rgba(255, 255, 255, 0.5) !important;
            border-radius: 25px;
            box-shadow: 
                0 12px 48px rgba(255, 255, 255, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.3),
                0 0 60px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.5) !important;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .luxury-blog-card:hover {
            transform: translateY(-12px) scale(1.02);
            border-color: rgba(255, 255, 255, 0.8) !important;
            box-shadow: 
                0 28px 72px rgba(255, 255, 255, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.6),
                0 0 80px rgba(255, 255, 255, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.7) !important;
        }

        .l-card-title,
        .blog-empty-luxury h3 {
            color: #fff;
        }

        .l-card-excerpt,
        .blog-empty-luxury p {
            color: rgba(255,255,255,0.7);
        }

        .l-card-foot {
            border-top-color: rgba(255,255,255,0.1);
        }

        .l-card-link {
            color: var(--gold-light);
        }

        .l-card-date {
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid #fff;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.2);
        }

        .d-mon {
            color: rgba(255,255,255,0.75);
        }

        .luxury-pagination-wrap .page-item .page-link {
            background: rgba(15,15,28,0.92);
            border-color: rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.75);
        }

        @media (max-width: 575px) {
            .premium-hero {
                min-height: 500px;
                height: 68vh;
            }

            .hero-display-title {
                font-size: 2.65rem;
            }

            .b-title {
                font-size: 2.3rem;
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

    <script>
        /* Simple Parallax for Hero */
        window.addEventListener('scroll', () => {
            const bg = document.querySelector('.hero-parallax-bg');
            if (bg) bg.style.transform = `scale(1.1) translateY(${window.scrollY * 0.3}px)`;
        });
    </script>

    @include('pages._cracker-canvas')

@endsection
