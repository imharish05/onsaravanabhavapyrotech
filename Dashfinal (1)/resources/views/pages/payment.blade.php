<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Boys Crackers - Payment Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #fdfdfd; }
        
        /* Minimalist Page Header */
        .page-header {
            background-color: #f8f9fa;
            padding: 40px 0;
            border-bottom: 1px solid #eee;
            margin-bottom: 50px;
        }
        .page-header h1 {
            font-size: 32px;
            font-weight: 700;
            color: #27304b;
            margin: 0;
        }

        /* Payment Content Container */
        .payment-container {
            max-width: 900px;
            margin: 0 auto 80px auto;
        }

        /* Sub Heading */
        .payment-heading {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 40px;
            font-weight: 600;
        }

        /* Payment Cards */
        .payment-card {
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
            height: 100%;
            border-top: 4px solid #efb24a;
        }
        .payment-card h3 {
            font-size: 20px;
            font-weight: 700;
            color: #222;
            margin-bottom: 30px;
            text-transform: uppercase;
            border-bottom: 2px solid #f4f4f4;
            padding-bottom: 15px;
        }

        /* GPay Section */
        .gpay-number {
            font-size: 24px;
            font-weight: 700;
            color: #1a73e8; /* GPay Blue */
            margin-bottom: 25px;
            text-align: center;
        }
        .qr-wrapper {
            background: #f8f9fa;
            border: 1px solid #eee;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
        }
        .qr-wrapper img {
            max-width: 200px;
            display: inline-block;
        }

        /* Bank Target List */
        .bank-details-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .bank-details-list li {
            padding: 15px 0;
            border-bottom: 1px dashed #eee;
            display: flex;
            justify-content: space-between;
        }
        .bank-details-list li:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: 600;
            color: #555;
            width: 40%;
        }
        .value {
            font-weight: 700;
            color: #000;
            width: 60%;
            text-align: right;
            word-break: break-all;
        }

        /* Notes Box */
        .notes-box {
            background: #fff8eb;
            border-left: 4px solid #efb24a;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin-top: 40px;
            font-size: 15px;
            color: #555;
        }
        .notes-box i {
            color: #efb24a;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="page-header">
        <div class="container text-center">
            <h1>{{ $paymentSetting->page_title ?? 'Payment Information' }}</h1>
        </div>
    </div>

    <div class="container payment-container">
        
        @if(isset($paymentSetting->heading))
            <h2 class="payment-heading">{{ $paymentSetting->heading }}</h2>
        @endif

        <div class="row g-4">
            <!-- Bank Account Column -->
            <div class="col-md-6 d-flex">
                <div class="payment-card w-100">
                    <h3><i class="fas fa-building-columns me-2 text-muted"></i> Bank Details</h3>
                    <ul class="bank-details-list">
                        <li>
                            <span class="label">Bank Name</span>
                            <span class="value">{{ $paymentSetting->bank_name ?? 'N/A' }}</span>
                        </li>
                        <li>
                            <span class="label">Account Name</span>
                            <span class="value">{{ $paymentSetting->account_name ?? 'N/A' }}</span>
                        </li>
                        <li>
                            <span class="label">Account Number</span>
                            <span class="value text-primary fs-5">{{ $paymentSetting->account_number ?? 'N/A' }}</span>
                        </li>
                        <li>
                            <span class="label">IFSC Code</span>
                            <span class="value">{{ $paymentSetting->ifsc_code ?? 'N/A' }}</span>
                        </li>
                        <li>
                            <span class="label">Branch Name</span>
                            <span class="value">{{ $paymentSetting->branch_name ?? 'N/A' }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- GPay Column -->
            <div class="col-md-6 d-flex">
                <div class="payment-card w-100">
                    <h3><i class="fab fa-google-pay me-2" style="font-size: 32px; vertical-align: middle;"></i> GPay Address</h3>
                    
                    <div class="gpay-number d-flex align-items-center justify-content-center">
                        <i class="fas fa-mobile-screen-button me-3 text-dark"></i>
                        {{ $paymentSetting->gpay_number ?? 'N/A' }}
                    </div>

                    <div class="qr-wrapper mt-4">
                        <p class="text-muted fw-bold mb-3 small text-uppercase">Scan QR to Pay</p>
                        @if(isset($paymentSetting->gpay_qr_code))
                            <img src="{{ asset($paymentSetting->gpay_qr_code) }}" alt="GPay QR Code">
                        @else
                            <div class="text-muted py-5 border rounded" style="background:#fff;">No QR Code Uploaded</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Notes -->
        @if(isset($paymentSetting->additional_notes) && !empty($paymentSetting->additional_notes))
        <div class="notes-box">
            <strong><i class="fas fa-circle-info"></i> Note:</strong> {{ $paymentSetting->additional_notes }}
        </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
