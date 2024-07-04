@extends('admin.layout.app')

@section('content')

<div class="page-content " style="min-height: 758px;">

    <div id="main">


        <div class="breadcambarea">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><span style="color: black; margin-right: 3px;"><i class="fa fa-home"></i></span>Dashboard</li>
                <li class="breadcrumb-item ">Payment</li>
                <li class="breadcrumb-item ">methods</li>
            </ol>
            <div class="table-wrapper">
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

            <div class="row my-5 d-block d-md-flex">
                <div class="col-12 col-md-3">
                    <div class="titlepay p-3">
                        <h2 class="fs-3">Payment methods</h2>
                    <p class="text-muted">Setup payment methods for website</p>
                    </div>
                </div>

                <div class="col-12 col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 position-relative">
                                <label for="default_payment_method" class="form-label">Default payment method</label>
                                <select class="form-control form-select is-valid" id="default_payment_method"
                                    name="default_payment_method" aria-invalid="false"
                                    aria-describedby="default_payment_method-error">
                                    <option value="cod" selected="selected">Cash on delivery (COD)</option>
                                    <option value="bank_transfer">Bank transfer</option>
                                    <option value="stripe">Stripe</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="razorpay">Razorpay</option>
                                    <option value="paystack">Paystack</option>
                                    <option value="mollie">Mollie</option>
                                    <option value="sslcommerz">SslCommerz</option>
                                </select>
                                <div id="default_payment_method-error" class="invalid-feedback" style="display: block;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-9 offset-md-3">
                    <button class="btn btn-primary btn-lg" type="submit"
                        form="botble-payment-forms-settings-payment-method-setting-form"><i
                            class="fa-regular fa-floppy-disk fa-lg"></i>
                        Save settings
                    </button>
                </div>
            </div>

        </div>
    </div>
    @endsection