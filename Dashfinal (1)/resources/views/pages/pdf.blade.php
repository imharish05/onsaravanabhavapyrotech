<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $globalSetting->company_name ?? 'Sri Shyam Crackers' }} - Estimate</title>
    <link rel="icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('/img/favicon/mexi_fav_icon.png') }}"
        sizes="196x196" />
    <link rel="icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('/img/favicon/mexi_fav_icon.png') }}"
        sizes="96x96" />
    <link rel="icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('/img/favicon/mexi_fav_icon.png') }}"
        sizes="32x32" />
    <link rel="icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('/img/favicon/mexi_fav_icon.png') }}"
        sizes="16x16" />
    <link rel="icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('/img/favicon/mexi_fav_icon.png') }}"
        sizes="128x128" />
    {{--
    <link rel="stylesheet" href="assets/style.css"> --}}


</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ffffff;
        margin: 0;
        padding: 0;
    }

    th {
        height: 30px;
    }

    .quotation-container {
        width: 850px;
        margin: 20px auto;
        /* padding: 20px; */
        border: 1px solid #ccc;

    }

    @media print {
        .quotation-container {
            height: 95vh;
        }

        .print_btn {
            display: none;
        }
    }

    .logo-section {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .logo {
        width: 38%;
    }

    .logo img {
        /* width: 100%; */
        height: 130px;
    }

    .header-text {
        width: 62%;
        /* background-color: #00a76c; */
        color: #090909;
        padding: 10px 70px;
        font-size: 13px;
        box-sizing: border-box;
        line-height: 1.5;
        height: 118px;
        border: 1px solid black;
    }

    h1 {
        padding-bottom: 5px;
        font-size: 32px;
        font-weight: 700;
        color: #579742;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .td_font {
        font-weight: bold;
    }

    .details-section {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;

    }

    .td_bg {
        background: #f3f3f3;
        font-weight: bold;

    }

    .left,
    .right {
        width: 48%;
        font-size: 14px;
    }

    .bill-section {
        display: flex;
        justify-content: space-between;
        margin: 30px 0;

    }

    .bill-box {
        width: 40%;
    }

    .bill-box button {
        /*background-color: #00a76c;*/

        color: black;
        border: none;
        padding: 8px 20px;
        font-weight: bold;
        margin-bottom: 10px;
        cursor: default;
        width: 200px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table th,
    table td {
        border: 1px solid #626868;
        /* padding: 10px; */
        text-align: center;
        font-size: 11px;
    }


    thead th {
        background-color: #f0f0f0;
        ;
        color: black;
    }

    .totals {
        text-align: right;
        font-size: 14px;
        margin-top: 10px;
    }

    .totals .total {
        background-color: #00a76c;
        ;
        color: white;
        display: inline-block;
        padding: 5px 15px;
        margin-top: 10px;
        font-weight: bold;
    }

    .terms {
        font-size: 13px;
        margin-top: 30px;
    }

    footer {
        text-align: center;
        margin-top: 40px;
        font-size: 14px;
    }

    .rup td,
    .rup th {
        border: none !important;
        font-size: 11px;
        padding: 4px 6px;
        text-align: justify;
    }

    .page-break {
        page-break-before: always;
    }

    .print_btn {
        position: fixed;
        top: 15px;
        right: 15px;
        background: #00a76c;
        padding: 10px 15px;
        border: none;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        z-index: 999;
    }
</style>

<body>
    <button class="print_btn" onclick="window.print()"><i class="fa-solid fa-print" style="color: white"></i>
        Print</button>
    <div class="quotation-container">
        <!-- Header -->
        <header>
            <div class="logo-section">
                <div class="logo">

                    <img src="{{ $globalSetting && $globalSetting->logo ? asset($globalSetting->logo) : asset('assets/images/logo/ram_logo1.png') }}"
                        alt="{{ $globalSetting->company_name ?? 'Logo' }}">
                </div>
                <div class="header-text">
                    <h1>Estimate</h1>
                    {{-- Lorem ipsum dolor sit amet. Et doloribus molestiae quo velit consectetur sed obcaecati dicta
                    aut
                    ipsum placeat et corporis blanditiis et laudantium ducimus aut enim nemo. Ut molestiae --}}
                </div>
            </div>


        </header>
        <div style="padding: 0px 40px;">
            {{-- <h1>SALES QUOTATION</h1> --}}
            <!-- Company Info and Quotation Info -->
            <section class="details-section">
                <div class="left">
                    <strong style="padding-right: 50px;">Quotation Date:
                        {{ date('d-m-Y', strtotime($productord->created_at)) }}</strong>

                </div>
                <div class="right" style="text-align: end">
                    <p><strong style="padding-right: 50px;">Quotation No.</strong>{{ $productord->oeder_id }}<br>
                        <!--<strong style="padding-right: 50px;">Quotation Date:</strong>-->
                        <!--{{ date('d-m-Y', strtotime($productord->created_at)) }}<br>-->
                        {{-- <strong style="padding-right: 50px;">Valid Date:</strong> {{ date('d-m-Y',
                        strtotime($quotdetail->quot_date)) }} --}}
                    </p>
                </div>
            </section>

            <hr>


            <section class="bill-section">
                <div class="bill-box">
                    <button>BILL TO</button>
                    <p><strong>{{ $productord->name }}</strong><br>
                        {{ $productord->address }}, {{ $productord->area_name ?? '' }} {{ $productord->area_name ? ',' : '' }} {{ $productord->city_name ?? $productord->city }}, {{ $productord->state_name ?? $productord->state }} - {{ $productord->pincode }}<br></p>
                    <p>{{ $customer->phone_number }}</p>
                </div>
                <div class="bill-box">
                    <button>SHIP TO</button>
                    <p><strong>{{ $productord->name }}</strong><br>
                        {{ $productord->address }}, {{ $productord->area_name ?? '' }} {{ $productord->area_name ? ',' : '' }} {{ $productord->city_name ?? $productord->city }}, {{ $productord->state_name ?? $productord->state }} - {{ $productord->pincode }}<br></p>
                    <p>{{ $customer->phone_number }}</p>
                </div>
            </section>

            <table class="">
                <thead>
                    <tr class="border">
                        <th rowspan="2">S.NO</th>
                        <th rowspan="2">Product Name</th>
                        <th rowspan="2">Rate</th>

                        <th rowspan="2">Qty</th>




                        <th rowspan="2">Amount</th>
                    </tr>

                </thead>
                <tbody>
                    @php
                        $calculatedSubTotal = 0;
                    @endphp
                    @foreach ($slot as $prod)
                        @php
                            $lineTotal = $prod->product_regular_price * $prod->qty;
                            $calculatedSubTotal += $lineTotal;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-start" style="padding-left: 15px;">
                                {{ $prod->product_name }}
                            </td>
                            <td class="text-end" style="padding-right: 15px;">{{ number_format($prod->product_regular_price, 2) }}</td>
                            <td class="text-center">{{ $prod->qty }}</td>
                            <td class="text-end" style="padding-right: 15px;">{{ number_format($lineTotal, 2) }}</td>
                        </tr>
                    @endforeach

                    <tr class="totals-row">
                        <td colspan="3" style="border: none;"></td>
                        <td class="td_font text-end" style="padding-right: 15px; border-top: 2px solid #626868;">Sub Total:</td>
                        <td class="text-end fw-bold" style="padding-right: 15px; border-top: 2px solid #626868;">{{ number_format($calculatedSubTotal, 2) }}</td>
                    </tr>
                    @if($productord->shipping > 0)
                    <tr class="totals-row">
                        <td colspan="3" style="border: none;"></td>
                        <td class="td_font text-end" style="padding-right: 15px;">Shipping:</td>
                        <td class="text-end" style="padding-right: 15px;">{{ number_format($productord->shipping, 2) }}</td>
                    </tr>
                    @endif
                    @if($productord->discount > 0)
                    <tr class="totals-row">
                        <td colspan="3" style="border: none;"></td>
                        <td class="td_font text-end" style="padding-right: 15px;">Discount:</td>
                        <td class="text-end text-danger" style="padding-right: 15px;">-{{ number_format($productord->discount, 2) }}</td>
                    </tr>
                    @endif
                    @php
                        $calculatedGrandTotal = $calculatedSubTotal + ($productord->shipping ?? 0) - ($productord->discount ?? 0);
                    @endphp
                    <tr class="grand-total-row">
                        <td colspan="3" style="border: none;"></td>
                        <td class="td_bg text-end fw-bold" style="padding-right: 15px; background: #579742; color: white;">Grand Total:</td>
                        <td class="td_bg text-end fw-bold" style="padding-right: 15px; background: #579742; color: white;">{{ number_format($calculatedGrandTotal, 2) }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="row total-row" style="margin-top: 20px;width:50%;position:relative;">
                <div class="col-lg-8" style="position: absolute;top:-119px;">
                    {{-- <p style="font-size:11px;"><strong>Total In Words</strong></p>
                    <p class="bot" style="font-size:11px;"><strong>Indian Rupee: <span id="words"
                                style="font-size:11px;"></span> only</strong></p> --}}

                    <!--<p class="bot" style='margin-top:30px;font-size:11px;'><b>Bank Details (NEFT/IMPS):</b></p>-->
                    <!--<table class="rup">-->
                    <!--    <tr>-->
                    <!--        <td><b>Bank Name & Branch</b></td>-->
                    <!--        <td><b>-</b></td>-->
                    <!--        <td>Axis & Sivakasi Branch</td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--        <td><b>Account Name</b></td>-->
                    <!--        <td><b>-</b></td>-->
                    <!--        <td>PRAKASH</td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--        <td><b>Account Type</b></td>-->
                    <!--        <td><b>-</b></td>-->
                    <!--        <td>Current Account</td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--        <td><b>Account Number</b></td>-->
                    <!--        <td><b>-</b></td>-->
                    <!--        <td>922020057877047</td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--        <td><b>IFS Code</b></td>-->
                    <!--        <td><b>-</b></td>-->
                    <!--        <td>UTIB0000089</td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--        <td><b>Google Pay</b></td>-->
                    <!--        <td><b>-</b></td>-->
                    <!--        <td>9087980098</td>-->
                    <!--    </tr>-->
                    <!--</table>-->
                </div>

            </div>

            <div class="signature" style="margin-top: 35px;text-align: end;">
                <img src="{{ $globalSetting && $globalSetting->logo ? asset($globalSetting->logo) : asset('assets/images/logo/ram_logo1.png') }}"
                    style="width: 25%" alt="{{ $globalSetting->company_name ?? 'Logo' }}">
                <h5 style="margin: 4px 0;font-size: 14px;color: #579742;">
                    {{ $globalSetting->company_name ?? 'Sri Shyam Crackers' }}
                </h5>
            </div>


        </div>

    </div>

    <script>
        var a = ['', 'One ', 'Two ', 'Three ', 'Four ', 'Five ', 'Six ', 'Seven ', 'Eight ', 'Nine ', 'Ten ', 'Eleven ',
            'Twelve ', 'Thirteen ', 'Fourteen ', 'Fifteen ', 'Sixteen ', 'Seventeen ', 'Eighteen ', 'Nineteen '
        ];
        var b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

        function inWords(num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return;
            var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + ' ' :
                '';
            return str;
        }

        var a1 = "{{ number_format($productord->total, 2, '.', '') }}";

        console.log(a1)
        var len = a1.toString().length
        len = len - 3
        var res = a1.substring(0, len);
        //alert(len);

        document.getElementById('words').innerHTML = inWords(res);
    </script>
</body>


</html>