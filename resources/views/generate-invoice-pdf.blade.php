<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carzex - Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        ded,
        to get the result that you can see in the preview selection body {
            margin-top: 20px;
            background-color: #f7f7ff;
        }

        #invoice {
            padding: 0px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #0d6efd
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #0d6efd
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #0d6efd;
            background: #e7f2ff;
            padding: 10px;
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,
        .invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #0d6efd;
            font-size: 1.2em
        }

        .invoice table .qty,
        .invoice table .total,
        .invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #0d6efd
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #0d6efd;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid rgba(0, 0, 0, 0);
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .invoice table tfoot tr:last-child td {
            color: #0d6efd;
            font-size: 1.4em;
            border-top: 1px solid #0d6efd
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px !important;
                overflow: hidden !important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #0d6efd;
            background: #e7f2ff;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div id="invoice">
                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <header>
                                <div class="row">
                                    <div class="col">
                                        <a href="javascript:;">
                                            <img src="assets/img/logo/logo.png" width="80" alt="">
                                        </a>
                                    </div>
                                    <div class="col company-details">
                                        <h2 class="name">
                                            <a target="_blank" href="javascript:;">
                                                Carzex
                                            </a>
                                        </h2>
                                        <div>NW—1111, Vishnu Garden New Delhi-110018</div>
                                        <div>+91 97113 93973</div>
                                        <div>care@carzex.com</div>
                                    </div>
                                </div>
                            </header>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">INVOICE TO:</div>
                                        <h2 class="to">{{ $name }}</h2>
                                        <div class="address">{{ $address }}</div>
                                        <div class="phone"><a href="tel:{{ $phone }}">{{ $phone }}</a>
                                            <div class="email"><a
                                                    href="mailto:{{ $email }}">{{ $email }}</a>
                                            </div>
                                        </div>
                                        <div class="col invoice-details">
                                            <h1 class="invoice-id">INVOICE {{ $invoice }}</h1>
                                            <div class="date">Date of Invoice: {{ $date }}</div>
                                            {{-- <div class="date">Due Date: 30/10/2018</div> --}}
                                        </div>
                                    </div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="text-left">DESCRIPTION</th>
                                                <th class="text-right"></th>
                                                <th class="text-right">QUANTITY</th>
                                                <th class="text-right">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pdetails as $item)
                                                @php
                                                    $i = '01';
                                                @endphp
                                                <tr>
                                                    <td class="no">{{ $i++ }}</td>
                                                    <td class="text-left">
                                                        <h3>
                                                            <a target="_blank" href="javascript:;">
                                                                {{ $item->name }}
                                                            </a>
                                                        </h3>
                                                        {{-- <a target="_blank" href="javascript:;">
                                                            Useful videos
                                                        </a> --}}
                                                        {{ $item->description }}
                                                    </td>
                                                    <td class=""></td>
                                                    <td class="qty">{{ $item->quantity }}</td>
                                                    <td class="total">Rs. {{ number_format($subtotal, 2) }}</td>
                                                </tr>
                                            @endforeach

                                            {{-- <tr>
                                                <td class="no">01</td>
                                                <td class="text-left">
                                                    <h3>Website Design</h3>Creating a recognizable design solution based
                                                    on
                                                    the company's existing visual identity
                                                </td>
                                                <td class="unit">Rs. 40.00</td>
                                                <td class="qty">30</td>
                                                <td class="total">Rs. 1,200.00</td>
                                            </tr>
                                            <tr>
                                                <td class="no">02</td>
                                                <td class="text-left">
                                                    <h3>Website Development</h3>Developing a Content Management
                                                    System-based
                                                    Website
                                                </td>
                                                <td class="unit">Rs. 40.00</td>
                                                <td class="qty">80</td>
                                                <td class="total">Rs. 3,200.00</td>
                                            </tr>
                                            <tr>
                                                <td class="no">03</td>
                                                <td class="text-left">
                                                    <h3>Search Engines Optimization</h3>Optimize the site for search
                                                    engines
                                                    (SEO)
                                                </td>
                                                <td class="unit">Rs. 40.00</td>
                                                <td class="qty">20</td>
                                                <td class="total">Rs. 800.00</td>
                                            </tr> --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">SUBTOTAL</td>
                                                <td>Rs. {{ number_format($subtotal, 2) }}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">TAX 25%</td>
                                                <td>Rs. {{ number_format($subtotal, 2) }}</td>
                                            </tr> --}}
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">GRAND TOTAL</td>
                                                <td>Rs. {{ number_format($subtotal, 2) }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="thanks">Thank you!</div>
                                    <div class="notices">
                                        <div>NOTICE:</div>
                                        <div class="notice">A finance charge of 1.5% will be made on unpaid balances
                                            after
                                            30 days.</div>
                                    </div>
                            </main>
                            <footer>Invoice was created on a computer and is valid without the signature and seal.
                            </footer>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
