@extends('layouts.default')

@section('main-page')

    <!-- ========================
             PREMIUM ARTICLE HERO
             ======================== -->
    <section class="article-hero">
        @if($blog->image)
            <div class="article-hero-parallax" style="background-image: url('{{ env('MAIN_URL', '/') . $blog->image }}');">
            </div>
        @else
            <div class="article-hero-parallax" style="background-image: url('{{ asset('assets/img/blog-premium.png') }}');">
            </div>
        @endif
        <div class="hero-glass-overlay"></div>

        <div class="hero-content-wrap">
            <div class="container">
                <div class="hero-meta-upper wow fadeInDown">
                    <a href="{{ route('blog.index') }}" class="h-back-link"><i class="fa-solid fa-arrow-left-long"></i> Back
                        to Blog</a>
                    <span class="h-sep">|</span>
                    <span class="h-date"><i class="fa-solid fa-calendar-day"></i>
                        {{ $blog->created_at ? $blog->created_at->format('M d, Y') : 'Recent' }}</span>
                </div>

                <h1 class="article-display-title wow fadeInUp">{{ $blog->title }}</h1>

                <div class="hero-meta-lower wow fadeInUp" data-wow-delay="0.2s">
                    <div class="h-chip"><i class="fa-solid fa-clock"></i>
                        {{ max(1, ceil(str_word_count(strip_tags($blog->feet_content ?? '')) / 200)) }} Min Read</div>
                    @if($blog->meta_key)
                        <div class="h-chip"><i class="fa-solid fa-tag"></i> {{ Str::limit($blog->meta_key, 25) }}</div>
                    @endif
                    <div class="h-chip author"><i class="fa-solid fa-user-pen"></i>Sri Shyam Artisans</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
             ARTICLE BODY SECTION
             ======================== -->
    <section class="article-body-section">
        <div class="container">
            <div class="row g-5">

                <!-- Main Content Area -->
                <div class="col-lg-8">
                    <article class="premium-article-card">
                        @if($blog->image)
                            <div class="article-featured-img-wrap mb-5">
                                <img src="{{ env('MAIN_URL', '/') . $blog->image }}" alt="{{ $blog->title }}"
                                    class="img-fluid rounded-4 shadow-lg">
                                <div class="img-frame-accent"></div>
                            </div>
                        @endif

                        <div class="article-content-rich">
                            {!! $blog->feet_content !!}
                        </div>

                        <div class="article-footer-meta mt-5 pt-5 border-top">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <!--<div class="share-label mb-3">Share this brilliance:</div>-->
                                    <!--<div class="share-row-pilled">-->
                                    <!--    <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . url()->current()) }}"-->
                                    <!--        target="_blank" class="s-pill wa" title="WhatsApp"><i-->
                                    <!--            class="fa-brands fa-whatsapp"></i></a>-->
                                    <!--    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"-->
                                    <!--        target="_blank" class="s-pill fb" title="Facebook"><i-->
                                    <!--            class="fa-brands fa-facebook-f"></i></a>-->
                                    <!--    <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(url()->current()) }}"-->
                                    <!--        target="_blank" class="s-pill tw" title="X"><i-->
                                    <!--            class="fa-brands fa-x-twitter"></i></a>-->
                                    <!--</div>-->
                                </div>
                                <div class="col-md-6 text-md-end mt-4 mt-md-0">
                                    @if($blog->meta_key)
                                        <div class="article-tags">
                                            @foreach(explode(',', $blog->meta_key) as $tag)
                                                <span class="tag-link">#{{ trim($tag) }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Boutique Sidebar -->
                <div class="col-lg-4">
                    <aside class="boutique-sidebar">

                        <!-- Order CTA Card -->
                        <div class="s-cta-card mb-5">
                            <div class="s-cta-glow"></div>
                            <div class="s-cta-inner">
                                <h4 class="s-cta-title">Celebrate with India's <span>Finest</span></h4>
                                <p>Download our exclusive price list and place your festive order directly on WhatsApp.</p>
                                <a href="{{ route('pricelist.download') }}" class="cta-btn-gold w-100">
                                    <span>Download Price List</span>
                                    <i class="fa-solid fa-file-arrow-down"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Recent Stories -->
                        @if($recent->isNotEmpty())
                            <div class="s-card mb-5">
                                <h5 class="s-card-title">More to Explore</h5>
                                <div class="s-card-bar"></div>

                                <div class="recent-story-list">
                                    @foreach($recent as $post)
                                        <a href="{{ route('blog.show', $post->url) }}" class="r-story-item">
                                            <div class="r-story-img">
                                                @if($post->image)
                                                    <img src="{{ env('MAIN_URL', '/') . $post->image }}" alt="{{ $post->title }}">
                                                @else
                                                    <div class="r-story-placeholder">🎇</div>
                                                @endif
                                            </div>
                                            <div class="r-story-info">
                                                <h6>{{ Str::limit($post->title, 45) }}</h6>
                                                <span>{{ $post->created_at ? $post->created_at->format('M d, Y') : 'Recent' }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Help Concierge -->
                        <div class="s-card text-center">
                            <div class="s-concierge-icon"><i class="fa-solid fa-headset"></i></div>
                            <h5 class="s-card-title mt-3">Personal Concierge</h5>
                            <p class="small text-muted mb-4">Need a custom quote for a grand celebration? Our experts are
                                here to help.</p>
                            <a href="{{ url('contact') }}" class="btn-outline-gold w-100">Contact Expert</a>
                        </div>

                    </aside>
                </div>

            </div>
        </div>
    </section>

    <style>
        /* ========================
           SINGLE BLOG STYLES (GOLDEN LIGHT)
           ======================== */

        .article-hero {
            height: 75vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .article-hero-parallax {
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

        .hero-meta-upper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            color: var(--gold);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.8rem;
            margin-bottom: 25px;
        }

        .h-back-link {
            color: inherit;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: .3s;
        }

        .h-back-link:hover {
            color: #fff;
            transform: translateX(-5px);
        }

        .article-display-title {
            font-family: var(--font-display);
            font-size: 4.5rem;
            line-height: 1;
            color: #fff;
            margin-bottom: 30px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-meta-lower {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .h-chip {
            padding: 8px 18px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .h-chip.author {
            color: var(--gold);
            border-color: var(--gold-deep);
        }

        /* Article Body */
        .article-body-section {
            padding: 100px 0;
            background: var(--cream);
            position: relative;
        }

        .article-featured-img-wrap {
            position: relative;
        }

        .img-frame-accent {
            position: absolute;
            top: -15px;
            left: -15px;
            width: 60px;
            height: 60px;
            border-top: 4px solid var(--gold-deep);
            border-left: 4px solid var(--gold-deep);
            border-radius: 10px 0 0 0;
        }

        .article-content-rich {
            color: var(--muted);
            line-height: 2;
            font-size: 1.15rem;
            font-family: var(--font-body);
        }

        .article-content-rich h2,
        .article-content-rich h3 {
            font-family: var(--font-display);
            color: var(--ink);
            margin: 50px 0 25px;
        }

        .article-content-rich p {
            margin-bottom: 30px;
        }

        .article-content-rich blockquote {
            padding: 40px;
            border-left: 6px solid var(--gold-deep);
            background: #fff;
            border-radius: 0 20px 20px 0;
            font-family: var(--font-display);
            font-size: 1.8rem;
            font-style: italic;
            color: var(--ink);
            margin: 50px 0;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.03);
        }

        /* Share Pilled */
        .share-row-pilled {
            display: flex;
            gap: 12px;
        }

        .s-pill {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: .4s;
        }

        .s-pill.wa {
            background: #25D366;
        }

        .s-pill.fb {
            background: #1877F2;
        }

        .s-pill.tw {
            background: #000;
        }

        .s-pill:hover {
            transform: translateY(-5px) rotate(8deg);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .tag-link {
            color: var(--gold-deep);
            font-weight: 700;
            font-size: 0.9rem;
            margin-left: 10px;
        }

        /* Sidebar Boutique */
        .boutique-sidebar {
            position: sticky;
            top: 120px;
        }

        .s-cta-card {
            background: var(--ink);
            padding: 45px 35px;
            border-radius: 30px;
            position: relative;
            overflow: hidden;
            color: #fff;
        }

        .s-cta-glow {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(184, 134, 11, 0.3), transparent);
        }

        .s-cta-title {
            font-family: var(--font-display);
            font-size: 2rem;
            line-height: 1.1;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }

        .s-cta-title span {
            color: var(--gold);
        }

        .s-cta-card p {
            opacity: 0.7;
            font-size: 0.95rem;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }

        .s-card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 30px;
            border: 1px solid var(--stone);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        }

        .s-card-title {
            font-family: var(--font-display);
            font-size: 1.6rem;
            color: var(--ink);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .s-card-bar {
            width: 40px;
            height: 3px;
            background: var(--gold-deep);
            margin-bottom: 30px;
        }

        .r-story-item {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            text-decoration: none;
            group: hover;
        }

        .r-story-img {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .r-story-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .4s;
        }

        .r-story-info h6 {
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 5px;
            font-size: 0.92rem;
            line-height: 1.4;
            transition: .3s;
        }

        .r-story-info span {
            font-size: 0.75rem;
            color: var(--muted);
            text-transform: uppercase;
            font-weight: 700;
        }

        .r-story-item:hover .r-story-info h6 {
            color: var(--gold-deep);
        }

        .r-story-item:hover .r-story-img img {
            transform: scale(1.1);
        }

        .s-concierge-icon {
            width: 60px;
            height: 60px;
            background: var(--cream);
            color: var(--gold-deep);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto;
        }

        .btn-outline-gold {
            border: 2px solid var(--gold-deep);
            color: var(--gold-deep);
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 800;
            text-decoration: none;
            display: inline-block;
            transition: .3s;
        }

        .btn-outline-gold:hover {
            background: var(--gold-deep);
            color: #fff;
        }

        @media (max-width: 991px) {
            .article-display-title {
                font-size: 3rem;
            }

            .article-hero {
                height: 60vh;
            }

            .boutique-sidebar {
                position: relative;
                top: 0;
                margin-top: 60px;
            }
        }

        /* Dark premium polish aligned with home/about/contact */
        .article-hero {
            min-height: 620px;
            background: #080810;
        }

        .hero-glass-overlay {
            background:
                radial-gradient(circle at 50% 42%, rgba(240,168,50,0.16), transparent 18rem),
                linear-gradient(to bottom, rgba(8,8,16,0.72), rgba(8,8,16,0.97));
        }

        .hero-meta-upper,
        .h-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
            border: 1.5px solid rgba(255, 255, 255, 0.6) !important;
            color: #FFFFFF !important;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 7px 18px;
            border-radius: 50px;
            box-shadow:
                0 0 20px rgba(255, 255, 255, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
            transition: all 0.3s ease;
        }

        .h-back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #FFFFFF !important;
            font-weight: 800;
            transition: all 0.3s ease;
        }

        .h-back-link:hover {
            transform: translateX(-5px);
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
        }

        .article-display-title {
            font-weight: 900;
            text-shadow:
                0 2px 10px rgba(255, 255, 255, 0.3),
                0 0 40px rgba(255, 255, 255, 0.2),
                0 0 80px rgba(255, 255, 255, 0.1);
        }

        .article-body-section {
            background:
                linear-gradient(180deg, rgba(8,8,16,0.98), rgba(12,12,24,0.98));
            position: relative;
        }

        .article-body-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 50% 20%, rgba(255, 255, 255, 0.08) 0%, transparent 60%);
            filter: blur(100px);
            pointer-events: none;
            z-index: 1;
        }
        
        .article-body-section .container {
            position: relative;
            z-index: 2;
        }

        .premium-article-card,
        .s-card,
        .s-cta-card {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0.04));
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 2px solid rgba(255, 255, 255, 0.5) !important;
            border-radius: 24px;
            padding: 34px;
            box-shadow: 
                0 12px 48px rgba(255, 255, 255, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.3),
                0 0 60px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.5) !important;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .s-card:hover, .s-cta-card:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 255, 255, 0.8) !important;
            box-shadow: 
                0 28px 72px rgba(255, 255, 255, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.6),
                0 0 80px rgba(255, 255, 255, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.7) !important;
        }

        .article-content-rich,
        .s-card p {
            color: rgba(255,255,255,0.72);
        }

        /* Fix for Summernote inline styles on dark theme */
        .article-content-rich span, 
        .article-content-rich p, 
        .article-content-rich div,
        .article-content-rich font,
        .article-content-rich li {
            color: inherit !important;
            background-color: transparent !important;
        }

        .article-content-rich h1,
        .article-content-rich h2,
        .article-content-rich h3,
        .article-content-rich h4,
        .article-content-rich h5,
        .article-content-rich h6 {
            color: #fff !important;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.2);
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .article-content-rich ul, 
        .article-content-rich ol {
            padding-left: 25px;
            margin-bottom: 30px;
            color: rgba(255,255,255,0.72);
        }

        .article-content-rich ul li::marker,
        .article-content-rich ol li::marker {
            color: var(--gold-light) !important;
            font-weight: 800;
        }

        .article-content-rich li {
            margin-bottom: 12px;
        }

        .article-content-rich strong, 
        .article-content-rich b {
            color: #fff !important;
            font-weight: 800;
        }

        .article-content-rich a {
            color: var(--gold-light);
            font-weight: 700;
            text-decoration: underline;
        }

        .article-content-rich blockquote {
            background: rgba(255,255,255,0.05);
            color: #fff;
            border-left: 4px solid var(--gold-light);
            padding: 20px 30px;
            margin: 40px 0;
            font-style: italic;
        }

        .s-card-title,
        .r-story-info h6,
        .share-label {
            color: #fff !important;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.2);
        }

        .article-footer-meta {
            border-top-color: rgba(255,255,255,0.12) !important;
        }

        .s-cta-card {
            overflow: hidden;
        }

        .r-story-info span,
        .small.text-muted {
            color: rgba(255,255,255,0.58) !important;
        }

        .s-concierge-icon {
            background: rgba(212,134,10,0.12);
            border: 1px solid rgba(240,168,50,0.24);
            color: var(--gold-light);
        }

        .btn-outline-gold {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
            border: 1.5px solid rgba(255, 255, 255, 0.6);
            color: #FFFFFF;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 800;
            text-decoration: none;
            display: inline-block;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 
                0 0 20px rgba(255, 255, 255, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
        }

        .btn-outline-gold:hover {
            background: linear-gradient(135deg, #FFFFFF, #F0A832);
            color: #111;
            transform: translateY(-3px);
            box-shadow: 
                0 12px 30px rgba(255, 255, 255, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.6);
        }

        @media (max-width: 575px) {
            .article-hero {
                min-height: 540px;
                height: 68vh;
            }

            .premium-article-card,
            .s-card,
            .s-cta-card {
                padding: 24px;
            }
        }

        .cta-btn-gold {
            background: linear-gradient(135deg, #F0A832, #B8860B);
            color: #111 !important;
            padding: 18px 30px;
            border-radius: 18px;
            font-weight: 800;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            border: none;
            box-shadow: 0 10px 25px rgba(240, 168, 50, 0.3);
            position: relative;
            z-index: 5;
        }

        .cta-btn-gold:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(240, 168, 50, 0.5);
            background: linear-gradient(135deg, #FFD700, #F0A832);
            color: #000 !important;
        }

        .cta-btn-gold i {
            font-size: 1.2rem;
            transition: 0.3s transform;
        }

        .cta-btn-gold:hover i {
            transform: translateY(3px);
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
        /* Simple Parallax */
        window.addEventListener('scroll', () => {
            const bg = document.querySelector('.article-hero-parallax');
            if (bg) bg.style.transform = `scale(1.1) translateY(${window.scrollY * 0.3}px)`;
        });
    </script>

    @include('pages._cracker-canvas')

@endsection
