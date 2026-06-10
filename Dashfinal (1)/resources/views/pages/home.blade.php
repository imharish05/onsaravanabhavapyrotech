<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Boys Crackers - Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #fff; }
        
        /* Banner Slider */
        .hero-banner {
            width: 100%;
            overflow: hidden;
            background: #000;
        }
        .hero-banner img {
            width: 100%;
            height: auto;
            max-height: 600px;
            object-fit: cover;
        }

        /* Welcome Section */
        .welcome-section {
            padding: 80px 0;
            background-color: #fcfcfc;
        }
        .welcome-image-wrapper {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            background: #111;
        }
        .welcome-image-wrapper img {
            width: 100%;
            display: block;
            transition: transform 0.5s ease;
        }
        .welcome-image-wrapper:hover img {
            transform: scale(1.05);
        }
        .welcome-content h2 {
            font-size: 38px;
            font-weight: 700;
            color: #27304b;
            margin-bottom: 25px;
        }
        .welcome-content p {
            color: #555;
            line-height: 1.8;
            font-size: 15px;
            margin-bottom: 20px;
        }
        .btn-pink {
            background-color: #ef3e7b;
            color: white;
            padding: 12px 35px;
            border-radius: 5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s;
        }
        .btn-pink:hover {
            background-color: #d82b66;
            color: white;
        }

        /* Section Titles */
        .section-title {
            text-align: center;
            font-weight: 800;
            color: #222;
            text-transform: uppercase;
            font-size: 32px;
            margin-bottom: 50px;
            position: relative;
        }

        /* Products (Categories) */
        .products-section {
            padding: 80px 0;
            background: #fdfdfd;
        }
        .category-card {
            background: white;
            border-radius: 15px;
            padding: 15px;
            display: flex;
            align-items: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            transition: all 0.3s ease;
            cursor: pointer;
            border-top: 4px solid #efb24a;
        }
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .category-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
            background: #f4f4f4;
            flex-shrink: 0;
            border: 3px solid white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .category-name {
            font-weight: 700;
            color: #333;
            font-size: 16px;
            text-transform: uppercase;
        }

        /* Brands Section */
        .brands-section {
            padding: 60px 0 100px 0;
            background: #fff;
        }
        .brand-logo-circle {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 1px dashed #2e62ff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            position: relative;
            background: white;
            padding: 20px;
            transition: all 0.3s;
        }
        .brand-logo-circle:hover {
            border-color: #111;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .brand-logo-circle img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        .brand-logo-circle::before, .brand-logo-circle::after {
            content: '';
            position: absolute;
            width: 8px;
            height: 8px;
            background: #2e62ff;
            border-radius: 50%;
        }
        .brand-logo-circle::before { top: -4px; right: 25%; }
        .brand-logo-circle::after { bottom: -4px; left: 25%; }

    </style>
</head>
<body>

    <!-- Top Banner Carousel -->
    @if(count($banners) > 0)
    <div id="homeBannerCarousel" class="carousel slide hero-banner" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($banners as $index => $banner)
                <button type="button" data-bs-target="#homeBannerCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index+1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($banners as $index => $banner)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset($banner->banner_image) }}" class="d-block w-100" alt="Banner Image">
                </div>
            @endforeach
        </div>
        @if(count($banners) > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#homeBannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeBannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        @endif
    </div>
    @else
    <div class="hero-banner text-center py-5 text-white">
        <h5>No Banners Uploaded</h5>
        <p>Go to Admin > Banner Management to add slider images.</p>
    </div>
    @endif

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="welcome-image-wrapper">
                        @if(isset($homeSetting->welcome_image))
                            <img src="{{ asset($homeSetting->welcome_image) }}" alt="Welcome Image">
                        @else
                            <img src="https://via.placeholder.com/600x450" alt="Placeholder">
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 ps-lg-5">
                    <div class="welcome-content">
                        <h2>{{ $homeSetting->welcome_heading ?? 'Welcome to The Crackers!' }}</h2>
                        <div class="text-content">
                            {!! nl2br(e($homeSetting->welcome_text ?? 'Please add welcome text in admin dashboard.')) !!}
                        </div>
                        <div class="mt-4">
                            <a href="{{ $homeSetting->welcome_button_link ?? '#' }}" class="btn-pink">
                                {{ $homeSetting->welcome_button_text ?? 'READ MORE' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Products (Categories) Section -->
    <section class="products-section">
        <div class="container">
            <h2 class="section-title">OUR PRODUCTS</h2>
            
            <div class="row pt-2">
                @forelse($categories as $category)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="category-card">
                        <div class="category-image">
                            @if($category->category_image)
                                <img src="{{ asset($category->category_image) }}" alt="{{ $category->category_name }}">
                            @else
                                <img src="https://via.placeholder.com/80" alt="{{ $category->category_name }}">
                            @endif
                        </div>
                        <div class="category-name">
                            {{ $category->category_name }}
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted">
                    <p>No categories found. Please add them in the admin dashboard.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Our Brands Section -->
    <section class="brands-section">
        <div class="container">
            <h2 class="section-title">OUR BRANDS</h2>
            
            <div class="row justify-content-center pt-4">
                @forelse($brands as $brand)
                <div class="col-auto mb-4 px-3">
                    <div class="brand-logo-circle">
                        @if($brand->logo)
                            <img src="{{ asset($brand->logo) }}" alt="Brand Logo">
                        @else
                            <img src="https://via.placeholder.com/100" alt="Brand Logo">
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted">
                    <p>No brands found. Please add them in the admin dashboard.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
