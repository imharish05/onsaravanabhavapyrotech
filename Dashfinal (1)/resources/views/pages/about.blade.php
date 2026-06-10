<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - The Boys Crackers</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        /* Top Banner Section */
        .about-banner {
            background-image: url('{{ $about->banner_image ? asset($about->banner_image) : "https://via.placeholder.com/1920x400" }}');
            background-size: cover;
            background-position: center;
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
            position: relative;
        }
        .about-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.3);
        }
        .banner-content {
            position: relative;
            text-align: center;
            z-index: 10;
        }
        .banner-content h1 {
            font-weight: 800;
            font-size: 48px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .banner-content p {
            font-size: 16px;
            font-weight: 500;
        }
        .banner-content p a {
            color: white;
            text-decoration: none;
        }
        
        /* Main Content Section */
        .main-content {
            padding: 80px 0;
            background-color: white;
        }
        .main-content .image-box {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .main-content .image-box img {
            width: 100%;
            display: block;
        }
        .main-content .text-box {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            height: 100%;
        }
        .main-content h3 {
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
        }
        .main-content p {
            color: #666;
            line-height: 1.8;
            font-size: 16px;
        }

        /* Stats Section */
        .stats-section {
            padding: 60px 0;
            background-color: #f4f5f8;
        }
        .stat-card {
            background: white;
            padding: 40px 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03);
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            width: 70px;
            height: 70px;
            background: #2e62ff;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin: 0 auto 20px auto;
        }
        .stat-num {
            font-size: 36px;
            font-weight: 800;
            color: #111;
            margin-bottom: 5px;
        }
        .stat-text {
            color: #666;
            font-weight: 500;
            font-size: 16px;
        }

        /* Action Banner Section */
        .action-banner {
            background: #e53935;
            padding: 40px 0;
            margin-bottom: 50px;
            border-radius: 10px;
        }
        .action-banner h2 {
            color: white;
            font-weight: 700;
            margin: 0;
            font-size: 32px;
            line-height: 1.4;
        }
        .action-btn {
            background: #222;
            color: white;
            padding: 15px 35px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s;
        }
        .action-btn:hover {
            background: #000;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Dynamic Header/Banner -->
    <section class="about-banner">
        <div class="banner-content">
            <h1>ABOUT US</h1>
            <p><a href="/">Home</a> &rarr; About Us</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="image-box h-100 d-flex align-items-center justify-content-center bg-light">
                        <img src="{{ $about->main_image ? asset($about->main_image) : 'https://via.placeholder.com/600x400' }}" alt="About Us Image">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="text-box">
                        <h3>{{ $about->heading ?? 'ABOUT THE CRACKERS' }}</h3>
                        <p>{!! nl2br(e($about->description)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="stat-num">{{ $about->products_count ?? 250 }}</div>
                        <div class="stat-text">Products</div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-num">{{ $about->customers_count ?? 1200 }}</div>
                        <div class="stat-text">Happy Customers</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stat-num">{{ $about->success_percentage ?? 100 }}%</div>
                        <div class="stat-text">Client Success %</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call To Action Section -->
    <section class="container my-5">
        <div class="action-banner shadow-lg">
            <div class="row align-items-center px-5">
                <div class="col-md-8 text-center text-md-start mb-4 mb-md-0">
                    <h2>{{ $about->action_text ?? "Let's Make a Difference in the Lives of Others" }}</h2>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <a href="{{ $about->action_button_link ?? '#' }}" class="action-btn">
                        {{ $about->action_button_text ?? 'ESTIMATE NOW' }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
