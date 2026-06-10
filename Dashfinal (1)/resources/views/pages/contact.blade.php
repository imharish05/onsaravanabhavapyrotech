<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $contact->page_title ?? 'Contact Us' }} - The Boys Crackers</title>
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
        .contact-banner {
            background-color: #fcfcfc;
            padding: 30px 0;
            border-bottom: 1px solid #eee;
        }
        .contact-banner h2 {
            font-weight: 700;
            color: #111;
            margin: 0;
            font-size: 24px;
        }
        .contact-banner .breadcrumb {
            margin: 0;
            background: transparent;
            padding: 0;
            font-size: 14px;
            font-weight: 500;
        }
        .contact-banner .breadcrumb a {
            color: #111;
            text-decoration: none;
        }
        .contact-banner .breadcrumb .active {
            color: #e53935;
        }

        /* Main Content wrapper */
        .main-wrapper {
            padding: 80px 0;
            background: #f8f9fa;
        }

        /* Information Column */
        .info-heading {
            font-weight: 700;
            color: #2e356b;
            font-size: 36px;
            margin-bottom: 20px;
        }
        .info-subheading {
            color: #666;
            margin-bottom: 40px;
            line-height: 1.6;
            font-size: 15px;
        }
        .info-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .icon-box {
            width: 50px;
            height: 50px;
            background: #f0f4ff;
            color: #2e62ff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-right: 20px;
            flex-shrink: 0;
        }
        .info-content h5 {
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 5px 0;
            color: #111;
        }
        .info-content p {
            margin: 0;
            color: #666;
            font-size: 14px;
            font-weight: 500;
        }

        /* Form Column */
        .form-container {
            background-image: url('{{ $contact->form_bg_image ? asset($contact->form_bg_image) : "https://via.placeholder.com/800x600" }}');
            background-size: cover;
            background-position: center;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            z-index: 1;
        }
        .form-container::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(100, 0, 0, 0.5); /* Slight dark red overlay for text readability */
            border-radius: 15px;
            z-index: -1;
        }
        .form-container h3 {
            color: white;
            font-weight: 700;
            font-size: 32px;
            margin-bottom: 10px;
        }
        .form-container p {
            color: rgba(255,255,255,0.9);
            margin-bottom: 30px;
            font-size: 15px;
        }
        .form-control-custom {
            background: white;
            border: none;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            width: 100%;
            font-size: 14px;
        }
        .form-control-custom:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255,255,255,0.3);
        }
        .btn-submit {
            background: #2e62ff;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s;
        }
        .btn-submit:hover {
            background: #174cf0;
        }

        /* Map Section */
        .map-section {
            width: 100%;
            height: 500px;
            background: #eee;
            margin-bottom: 0; /* Remove bottom margin to touch footer */
            overflow: hidden;
        }
        .map-section iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>

    <!-- Top Banner -->
    <div class="contact-banner">
        <div class="container d-flex justify-content-between align-items-center">
            <h2>{{ $contact->page_title ?? 'Contact Us' }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $contact->page_title ?? 'Contact Us' }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-wrapper">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column Info -->
                <div class="col-lg-5 mb-5 mb-lg-0 pe-lg-5">
                    <h1 class="info-heading">{{ $contact->heading ?? 'Have Any Questions?' }}</h1>
                    <p class="info-subheading">{{ $contact->subheading ?? 'Have a inquiry or some feedback for us? Fill out the form below to contact our team.' }}</p>

                    <div class="info-card">
                        <div class="icon-box">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h5>Our Address</h5>
                            <p>{!! nl2br(e($contact->address ?? 'Wonder Street, USA, New York')) !!}</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="icon-box">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-content">
                            <h5>Phone Number</h5>
                            <p>{{ $contact->phone ?? 'Phone: (+00) - 12543 - 4165' }}</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="icon-box">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h5>Email Address</h5>
                            <p>{{ $contact->email ?? 'hello@xton.com' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column Form -->
                <div class="col-lg-7">
                    <div class="form-container">
                        <h3>Get in Touch</h3>
                        <p>Have inquiries or want to place an order? Contact us for assistance.</p>
                        
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control-custom" placeholder="Your Name*" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control-custom" placeholder="Phone Number*" required>
                                </div>
                            </div>
                            <input type="email" class="form-control-custom" placeholder="Email Address*" required>
                            <textarea class="form-control-custom" rows="4" placeholder="Write Your Message*" required></textarea>
                            
                            <button type="button" class="btn-submit" onclick="alert('Form submission is frontend-only as per design request.')">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-section">
        @if(isset($contact->map_iframe))
            {!! $contact->map_iframe !!}
        @else
            <!-- Fallback Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1m3!1d3000.7725920671603!2d-73.81881778465008!3d41.55286417924976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dd3362095ccfad%3A0xe5452f862db4eb26!2sWonderland%20Dr%2C%20East%20Fishkill%2C%20NY%2012533%2C%20USA!5e0!3m2!1sen!2sin!4v1680108316270!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        @endif
    </div>

</body>
</html>
