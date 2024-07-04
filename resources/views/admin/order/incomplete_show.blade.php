@extends('admin.layout.app')

@section('content')
<style>
    .headersdf {
        background-color: #eaf6f6;
        /* border-radius: 5px; */
        margin-bottom: 20px;
    }

    .order-link input {
        border: 1px solid #ccc;
        /* border-radius: 3px; */
        margin-right: 10px;
    }

    .order-link button {
        /* border-radius: 3px; */
    }

    .incompletetext {
        line-height: 20px;
        font-weight: 600;
        font-size: 16px;
    }

    .ui-banner--status-info {
        background-color: #e0f5f5;
        box-shadow: inset 0 3px 0 0 #47c1bf, inset 0 0 0 0 transparent, 0 0 0 1px rgba(63, 63, 68, .05), 0 1px 3px 0 rgba(63, 63, 68, .15);
        color: #212b35;
        position: relative;
    }

    .sdfgh {
        margin: 60px 50px !important;
    }

    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, .1);
    }
</style>

<div class="main-panel">
    <div class="pagesbodyarea">
        <div class="pageinfo">
            <ul class="d-flex">
                <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="fa-solid fa-house"> </i>
                        Dashboard
                        /</a>
                </li>
                <li><a href="#" class="breadcrumb-item">Ecommerce
                        /</a>
                </li>
                <li><a href="#" class="breadcrumb-item">Order
                        /</a>
                </li>
                <li><a href="#" class="breadcrumb-item">Incomplete Product</a>
                </li>
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
        <div class="sdfgh px-5">
            <div class="headersdf">
                <div class="order-info card mb-4 rounded-0">
                    <div class="ui-banner--status-info p-3">

                        <p class="incompletetext pb-2">An incomplete order is when a potential customer places items in their shopping cart, and goes all the
                            way through to the payment page, but then doesn't complete the transaction.</p>
                        <p class="incompletetext">If you have contacted customers and they want to continue buying, you can help them complete their order
                            by following the link:</p>
                        <div class="order-link form-inline mt-2">
                            <input type="text next-input " class="form-control rounded-0 border-0 btn-light text-dark bg-white" value="https://carzextest.uma.net.in/checkout/58eeefe2a4be57f144a4e80b6d183b4f/recover" readonly>
                            <button class="btn btn-light text-dark rounded-0 border-0 bg-white mt-2 ml-2">Send an email to customer to recover this order</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="order-info card mb-4 rounded-0">
                        <div class="pd-all-20 border-bottom ">
                        <label class="title-product-main fs-5 text-no-bold">Order information</label>
                    </div>
                        <div class="card-body">
                              
                            <div class="order-item">
                                @php
                                $totalAmount = 0;
                                 $productCount = 0;
                                @endphp
                                @foreach ($cartItems as $cartItem)
                                @php
                                $product = $products->firstWhere('id', $cartItem->product_id);
                                @endphp
                                @if ($product)
                                <div class="row">
                                    <div class="col-md-4 px-5 p-3">
                                        <img src="https://via.placeholder.com/60" alt="Product Image">
                                    </div>
                                    <div class="col-md-8">
                                        <a href="">
                                            <p>{{ $product->name }}</p>
                                        </a>
                                        <p>SKU: {{ $product->sku }}</p>
                                        <p class="text-bold">PRICE: ₹{{ $product->sale_price }}.00</p>
                                    </div>
                                </div>
                                <hr>
                                @php
                                $totalAmount += $product->sale_price;
                                $productCount++;
                                @endphp
                                @endif
                                @endforeach
                            </div>
                            <div class="order-summary text-end p-3 mt-3 row">
                                <div class="col-6">
                                    <strong>
                                        <p class="h6 mb-0">ORDER AMOUNT:</p>
                                    </strong>
                                    <strong>
                                        <p class="h6 mb-0">TOTAL AMOUNT:</p>
                                    </strong>

                                </div>
                                <div class="col-6 px-5">
                                    <p class="mb-0"><b>₹{{ $totalAmount }}.00</b></p>
                                    <p class="mb-0"><b>₹{{ $totalAmount }}.00</b></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="additional-info">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <p class="border-bottom p-2 mb-4 fs-6"><strong>Additional information</strong></p>
                                <input type="text" class="form-control" placeholder="Note about order, ex: time or shipping instruction.">
                                <button class="btn btn-primary rounded-0 float-end mt-2">Save note</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="customer-info mb-4 rounded-0">
                        <div class="card rounded-0">
                        
                         <div class=" cart-header pd-all-20 border-bottom ">
                        <label class="title-product-main fs-5 text-no-bold">Customer</label>
                        <div class="float-end rounded-circle bg-primary p-2">
                              <i class="fa-solid fa-a fa-2xl" style="color: #ffffff;"></i>
                                {{-- <img src="https://via.placeholder.com/30" class="float-end rounded-circle" alt="Customer Image"> --}}
</div>
                    </div>
                            <div class="card-body rounded-0">
                                {{-- <p><strong>Customer</strong></p> --}}
                                <p>{{ $customer->name }}</p>
                                <p>{{ $productCount }} order(s)</p>
                                <p><a href="#">admin@gmail.com</a></p>
                                <p>Have an account already</p>
                              <div class="flexbox-auto-content mt-5">
                                   <div class="next-card-section pb-3 border-bottom">
                                        <label class="title-text-second"><strong>Shipping Address</strong></label>
                                    </div>
                                <div class="mt-3">
                                        <a target="_blank" class="hover-underline" href="https://maps.google.com/?q=">See maps</a>
                                    </div>
                                </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection