@extends('admin.layout.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css">

<form action="" method="post" enctype="multipart/form-data">
    @csrf

    <div class="main-panel">
        <div class="pagesbodyarea">
            <div class="pageinfo">
                <ul class="d-flex">
                    <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i
                                class="fa-solid fa-house"></i> Dashboard /</a></li>
                    <li><a class="breadcrumb-item">Ecommerce /</a></li>
                    <li><a href="{{ route('admin.ecommerce.settings') }}" class="breadcrumb-item">Settings /</a></li>
                    <li><a class="breadcrumb-item">Invoices template</a></li>
                </ul>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="row">
                <div class="col-4">
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <h2 class="fs-4" style="font-size: 16px;">Invoice Settings</h2>
                        <p class="color-note">Settings for Invoice template</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="custom p-4">
                        <div class="tab-content">
                            <div class="wrapper-content pd-all-20">
                                <div class="contain">
                                    <style>
                                        .contain {
                                            padding: 5px 10px;
                                            font-size: 16px;
                                        }

                                        .contain p {
                                            font-size: 16px;
                                            font-family: Arial, Helvetica, sans-serif;
                                        }

                                        .dropdown-menu li {
                                            background: #ffffff;
                                        }
                                    </style>
                                    <p>Contain</p>
                                </div>
                                <div class="contain-buttom d-flex">
                                    <div class="dropdown mx-2">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-code" aria-hidden="true"></i> Variables
                                        </button>
                                        <div class="dropdown-menu p-3" aria-labelledby="triggerId">
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">invoice.*</span>: Invoice information from
                                                database, ex: invoice.code, invoice.amount, ...
                                            </a></p>
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">logo_full_path</span>: The site logo with full
                                                URL
                                            </a></p>
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">company_logo_full_path</span>: The company
                                                logo of invoice with full URL
                                            </a></p>
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">payment_status</span>: Payment status
                                            </a></p>
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">payment_description</span>: Payment
                                                description
                                            </a></p>
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">get_ecommerce_setting('key')</span>: Get the
                                                e-commerce setting from the database
                                            </a></p>
                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-code" aria-hidden="true"></i> Functions
                                        </button>
                                             <div class="dropdown-menu p-3" aria-labelledby="triggerId">
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">invoice.*</span>: Invoice information from
                                                database, ex: invoice.code, invoice.amount, ...
                                            </a></p>
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">logo_full_path</span>: The site logo with full
                                                URL
                                            </a></p>
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">company_logo_full_path</span>: The company
                                                logo of invoice with full URL
                                            </a></p>
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">payment_status</span>: Payment status
                                            </a></p>
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">payment_description</span>: Payment
                                                description
                                            </a></p>
                                            <p class="border-bottom"><a href="#" class="p-4" data-key="invoice.*"
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                                <span class="text-danger">get_ecommerce_setting('key')</span>: Get the
                                                e-commerce setting from the database
                                            </a></p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="code-editor">
                                    <textarea id="code" placeholder="Write your code here...">
@php
    echo' 
    @extends("admin.layout.app")

    @section("content")
    <style>
        tr th {
        color: #696969;
        font-size: 14px;
        font-weight: 100;
    }
    </style>
    <div id="main">
        <div class="card">
            <div class="card-body">
                <div class="invoice-info">
                    <div class="mb-3">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <!-- Empty div for potential future content -->
                            </div>
                            <div class="col-md-6 text-end">
                                <h2 class="mb-0 uppercase">Invoice</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Empty div for potential future content -->
                            </div>
                            <div class="col-md-6 text-end">
                                <ul class="mb-0">
                                    <li>{{ $edit_invoices->first_name }} {{ $edit_invoices->last_name }}</li>
                                    <li>{{ $edit_invoices->email }}</li>
                                    <li>{{ $edit_invoices->phone }}</li>
                                    <li>{{ $edit_invoices->street_address }}, {{ $edit_invoices->town_city }}, {{ $edit_invoices->state }}, {{ $edit_invoices->pin_code }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <strong class="text-brand">Invoice Code:</strong> INV{{ $edit_invoices->id }}
                        </div>
                        <div class="col-lg-4">
                            <strong class="text-brand">Issue At:</strong> {{ $edit_invoices->created_at->format("d M, Y") }}
                        </div>
                        <div class="col-lg-4">
                            <strong class="text-brand">Payment Method:</strong> COD
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>
                    <table class="table table-striped mb-3">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Qty</th>
                                <th class="text-center">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($edit_invoices->productOrders as $productOrder)
                                <tr>
                                    <td style="width: 70%">
                                        <p class="mb-0">{{ $productOrder->description }}</p>
                                    </td>
                                    <td style="width: 5%">{{ $productOrder->quantity }}</td>
                                    <td style="width: 25%" class="text-center">₹{{ number_format($productOrder->subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-end">Sub Total:</th>
                                <th class="text-center">₹{{ number_format($edit_invoices->productOrders->sum("subtotal"), 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-end">Grand Total:</th>
                                <th class="text-center">₹{{ number_format($edit_invoices->productOrders->sum("subtotal"), 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Invoice For</h5>
                            <p class="font-sm">
                                <strong>Issue At:</strong> {{ $edit_invoices->created_at->format("d M, Y") }}<br>
                            </p>
                        </div>
                        <div class="col-md-6 text-end">
                            <h5>Total Amount</h5>
                            <h3 class="mt-0 mb-0 text-danger">₹{{ number_format($edit_invoices->productOrders->sum("subtotal"), 2) }}</h3>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="#" target="_blank" class="btn btn-icon btn-sm btn-danger bg-danger deleteDialog">
                    <i class="fas fa-print"></i> Print Invoice
                </a>
                <a href="#" target="_blank" class="btn bg-primary btn-success">
                    <i class="fas fa-download"></i> Download Invoice
                </a>
            </div>
        </div>
    </div>
    @endsection  '
@endphp 
                                    </textarea>
                                </div>
                                <div class="help-ts">
                                    <i class="fa fa-info-circle"></i>
                                    <span>Learn more about Twig template: <a href="https://twig.symfony.com/doc/3.x/"
                                            target="_blank">https://twig.symfony.com/doc/3.x/</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-4"></div>
                <div class="col-8">
                    <div class="flexbox-annotated-section-content">
                        <button type="button" class="btn btn-warning bg-warning btn-trigger-reset-to-default">
                            Reset to default
                        </button>
                        <a target="_blank" class="btn btn-primary btn-trigger-preview-invoice-template">
                            Preview
                            <i class="fa fa-external-link"></i>
                        </a>
                        <button class="btn btn-info" type="submit" name="submit">
                            Save settings
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/htmlmixed/htmlmixed.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/javascript/javascript.min.js"></script>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById('code'), {
        lineNumbers: true,
        mode: 'htmlmixed',
        theme: 'default'
    });
</script>
@endsection