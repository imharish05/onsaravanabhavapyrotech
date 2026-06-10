<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Price List - Shyam Crackers</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #2c3e50;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        .header {
            background: #111;
            background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
            color: #D4860A;
            padding: 50px 30px;
            text-align: center;
            border-bottom: 5px solid #D4860A;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        h1 {
            margin: 0;
            font-size: 32px;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-weight: 800;
            color: #fff;
        }
        .date {
            font-size: 14px;
            opacity: 0.8;
            margin-top: 10px;
            color: #D4860A;
            font-weight: 600;
        }
        .container {
            padding: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        th {
            background-color: #B86E00;
            color: #ffffff;
            text-align: left;
            padding: 14px 15px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #edf2f7;
            font-size: 12px;
        }
        tr:nth-child(even) {
            background-color: #fffaf0;
        }
        .product-name {
            font-weight: 500;
            color: #4a5568;
        }
        .price {
            text-align: right;
            font-weight: 700;
            color: #2d3748;
            width: 120px;
        }
        .footer {
            background-color: #f7fafc;
            text-align: center;
            padding: 30px;
            font-size: 11px;
            color: #718096;
            border-top: 1px solid #e2e8f0;
        }
        .footer-brand {
            font-size: 16px;
            font-weight: 700;
            color: #B86E00;
            margin-bottom: 5px;
        }
        .symbol {
            font-family: 'DejaVu Sans', sans-serif;
        }
    </style>
</head>
<body>
    <div class="header">
        @php 
            $theme = \App\Models\ThemeSetting::first();
            $global = \App\Models\GlobalSetting::first();
        @endphp
        @if($theme && $theme->logo)
            <img src="{{ public_path($theme->logo) }}" class="logo">
        @endif
        <h1>{{ $global->company_name ?? 'Shyam Crackers' }}</h1>
        <div class="date">Official Price List &bull; {{ date('d M Y, h:i A') }}</div>
    </div>

    <div class="container">
        @foreach($categories as $category)
            @if($category->products->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">{{ $category->category_name }}</th>
                            <th style="text-align: right;">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->products as $product)
                            <tr>
                                <td style="width: 30px; color: #a0aec0;">{{ $loop->iteration }}</td>
                                <td class="product-name">{{ $product->product_name }}</td>
                                <td class="price">
                                    <span class="symbol">₹</span>{{ number_format($product->product_regular_price, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endforeach
    </div>

    @php 
        $global = \App\Models\GlobalSetting::first();
    @endphp

    <div class="footer">
        <div class="footer-brand">{{ $global->company_name ?? 'Shyam Crackers' }}</div>
        <p>{{ $global->footer_content ?? 'Premium Sivakasi Fireworks • Pan India Delivery' }}</p>
        @if($global && $global->address)
            <p>{{ $global->address }}</p>
        @endif
        <p>Thank you for choosing us for your festive celebrations!</p>
        <p>&copy; {{ date('Y') }} {{ $global->company_name ?? 'Shyam Crackers' }}. All Rights Reserved.</p>
    </div>
</body>
</html>
