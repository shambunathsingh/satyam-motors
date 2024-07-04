@extends('admin.layout.app')

@section('content')
@php    
 $total = 0; // Initialize total
@endphp
<div class="page-content" style="min-height: 758px;">
    {{-- {{$shipments}} --}}
    <div id="main">

        <div class="breadcambarea">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><span style="color: black; margin-right: 3px;"><i class="fa fa-home"></i></span>Dashboard</li>
                <li class="breadcrumb-item">SHIPMENTS</li>
                <li class="breadcrumb-item">EDIT SHIPPING #100000{{ $shipment->id }}</li>
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

            <style>
                .container {
                    padding: 20px;
                    margin-top: 20px;
                }

                .order-header,
                .order-footer {
                    border-bottom: 1px solid #e0e0e0;
                    padding-bottom: 10px;
                }

                .order-header {
                    margin-bottom: 20px;
                }

                .order-items table {
                    width: 100%;
                }

                .order-items th,
                .order-items td {
                    padding: 10px;
                }

                .maitabu {
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

                }

                .card {
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

                }
            </style>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="maitabu bg-white mb-3 p-3">
                            <div class="order-items mb-4">
                                <div class="order-items mb-4">
                                    @if($products->isEmpty())
                                    <p>No products found.</p>
                                    @else
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><i class="fa fa-image" aria-hidden="true"></i> Image</th>
                                                <th><i class="fa fa-product-hunt" aria-hidden="true"></i> Product</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" width="50"><br>
                                                </td>
                                                <td>
                                                    <a href="">{{ $product->name }}</a><br>
                                                    @if(isset($product->color))
                                                    (Color: {{ $product->color }}, Size: {{ $product->size }})<br>
                                                    @endif
                                                    SKU: {{ $product->sku }}
                                                </td>
                                                @foreach($orderItems as $orderItem)
                                                @if($orderItem->product_id == $product->id)
                                                <td>{{ $orderItem->quantity }}</td>
                                                <td> ₹{{ $product->price }}</td>
                                                <td> ₹{{ $orderItem->quantity * $product->price }}</td>
                                                @php
                                                $total += $orderItem->quantity * $product->price; // Accumulate total price for all order items
                                                @endphp
                                                @endif
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="text-end px-3 fs-5">
                                        <strong>Total:</strong> ₹ {{ number_format($total, 2) }}
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-center py-2">
                            <a href="#" target="_blank">
                                View Order #100000{{ $shipment->order_id }}
                                <i class="fas fa-external-link-alt"></i></a>
                        </div>
                        <div class="maitabu bg-white my-3 p-3">
                            <div class="shipment-info mb-4">
                                <h5>Additional shipment information</h5>
                                @if($shipment)
                                <form>
                                    <div class="form-group">
                                        <label for="shippingCompany">Shipping Company Name</label>
                                        <input type="text" class="form-control" id="shippingCompany" value="{{ $shipment->shipping_company_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="trackingId">Tracking ID</label>
                                        <input type="text" class="form-control" id="trackingId" value="{{ $shipment->tracking_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="trackingLink">Tracking Link</label>
                                        <input type="text" class="form-control" id="trackingLink" value="{{ $shipment->tracking_link }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="shipDate">Estimate Date Shipped</label>
                                        {{-- <input type="date" class="form-control" id="shipDate" value="{{ $shipment->estimate_date_shipped }}"> --}}
                                        <input type="date" class="form-control" id="shipDate" value="{{ $shipment->estimate_date_shipped ? \Carbon\Carbon::parse($shipment->estimate_date_shipped)->format('Y-m-d') : '' }}">

                                    </div>
                                    <div class="form-group">
                                        <label for="note">Note</label>
                                        <textarea class="form-control mb-4" placeholder="Add note .." id="note" rows="3">{{ $shipment->note }}</textarea>
                                        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-circle-check"></i> Save</button>
                                    </div>
                                </form>
                                @else
                                <p>No shipment found.</p>
                                @endif

                            </div>
                        </div>

                        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Product Traking</h4>
                                    <ul class="list-unstyled activity-wid mb-0">
                                        <li class="activity-list activity-border">
                                            <div class="activity-icon avatar-sm">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar-sm rounded-circle" alt="">
                                            </div>
                                            <div class="media">
                                                <div class="me-3">
                                                    <h5 class="font-size-15 mb-1">Your Manager Posted</h5>
                                                    <p class="text-muted font-size-14 mb-0">James Raphael</p>
                                                </div>

                                                <div class="media-body">
                                                    <div class="text-end d-none d-md-block">
                                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                                            3 days</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>

                                        <li class="activity-list activity-border">
                                            <div class="activity-icon avatar-sm">
                                                <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="fa fa-shopping-cart font-size-16"></i>
                                                </span>
                                            </div>
                                            <div class="media">
                                                <div class="me-3">
                                                    <h5 class="font-size-15 mb-1">You have 5 pending order.</h5>
                                                    <p class="text-muted font-size-14 mb-0">America</p>
                                                </div>

                                                <div class="media-body">
                                                    <div class="text-end d-none d-md-block">
                                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                                            1 days</p>
                                                    </div>
                                                </div>


                                            </div>
                                        </li>

                                        <li class="activity-list activity-border">
                                            <div class="activity-icon avatar-sm">
                                                <span class="avatar-title bg-soft-success text-success rounded-circle">
                                                    <i class="fa fa-user font-size-16"></i>
                                                </span>
                                            </div>
                                            <div class="media">
                                                <div class="me-3">
                                                    <h5 class="font-size-15 mb-1">New Order Received</h5>
                                                    <p class="text-muted font-size-14 mb-0">Thank You</p>
                                                </div>

                                                <div class="media-body">
                                                    <div class="text-end d-none d-md-block">
                                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                                            Today</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="activity-list activity-border">
                                            <div class="activity-icon avatar-sm">

                                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="avatar-sm rounded-circle" alt="">

                                            </div>
                                            <div class="media">
                                                <div class="me-3">
                                                    <h5 class="font-size-15 mb-1">Your Manager Posted</h5>
                                                    <p class="text-muted font-size-14 mb-0">James Raphael</p>
                                                </div>

                                                <div class="media-body">
                                                    <div class="text-end d-none d-md-block">
                                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                                            3 days</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>

                                        <li class="activity-list activity-border">
                                            <div class="activity-icon avatar-sm">
                                                <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="fa fa-shopping-cart font-size-16"></i>
                                                </span>
                                            </div>
                                            <div class="media">
                                                <div class="me-3">
                                                    <h5 class="font-size-15 mb-1">You have 1 pending order.</h5>
                                                    <p class="text-muted font-size-14 mb-0">Dubai</p>
                                                </div>

                                                <div class="media-body">
                                                    <div class="text-end d-none d-md-block">
                                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                                            1 days</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>

                                        <li class="activity-list">
                                            <div class="activity-icon avatar-sm">
                                                <span class="avatar-title bg-soft-success text-success rounded-circle">
                                                    <i class="fa fa-user font-size-16"></i>
                                                </span>
                                            </div>
                                            <div class="media">
                                                <div class="me-3">
                                                    <h5 class="font-size-15 mb-1">New Order Received</h5>
                                                    <p class="text-muted font-size-14 mb-0">Thank You</p>
                                                </div>

                                                <div class="media-body">
                                                    <div class="text-end d-none d-md-block">
                                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                                            Today</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>


                                    </ul>

                                </div>
                            </div>
                        </div>
                        <style>
                            .card {
                                margin-bottom: 24px;
                                -webkit-box-shadow: 0 2px 4px rgb(126 142 177 / 10%);
                                box-shadow: 0 2px 4px rgb(126 142 177 / 10%);
                            }

                            .card {
                                position: relative;
                                display: -webkit-box;
                                display: -ms-flexbox;
                                display: flex;
                                -webkit-box-orient: vertical;
                                -webkit-box-direction: normal;
                                -ms-flex-direction: column;
                                flex-direction: column;
                                min-width: 0;
                                word-wrap: break-word;
                                background-color: #fff;
                                background-clip: border-box;
                                border: 0 solid #eaedf1;
                                border-radius: .25rem;
                            }

                            .activity-wid {
                                margin-left: 16px;
                            }

                            /* .mb-0 {
        margin-bottom: 0 !important;
    } */

                            .list-unstyled {
                                padding-left: 0;
                                list-style: none;
                            }

                            .activity-wid .activity-list {
                                position: relative;
                                padding: 0 0 33px 30px;
                            }

                            .activity-border:before {
                                content: "";
                                position: absolute;
                                height: 38px;
                                border-left: 3px dashed #eaedf1;
                                top: 40px;
                                left: 0;
                            }

                            .activity-wid .activity-list .activity-icon {
                                position: absolute;
                                left: -20px;
                                top: 0;
                                z-index: 2;
                            }

                            .avatar-sm {
                                height: 2.5rem;
                                width: 2.5rem;
                            }

                            .media {
                                display: -webkit-box;
                                display: -ms-flexbox;
                                display: flex;
                                -webkit-box-align: start;
                                -ms-flex-align: start;
                                align-items: flex-start;
                            }

                            .me-3 {
                                margin-right: 1rem !important;
                            }

                            .font-size-15 {
                                font-size: 15px !important;
                            }

                            .font-size-14 {
                                font-size: 14px !important;
                            }

                            .text-muted {
                                color: #74788d !important;
                            }

                            .text-end {
                                text-align: right !important;
                            }

                            .font-size-13 {
                                font-size: 13px !important;
                            }

                            .avatar-title {
                                -webkit-box-align: center;
                                -ms-flex-align: center;
                                align-items: center;
                                display: -webkit-box;
                                display: -ms-flexbox;
                                display: flex;
                                height: 100%;
                                -webkit-box-pack: center;
                                -ms-flex-pack: center;
                                justify-content: center;
                                width: 100%;
                            }

                            .bg-soft-primary {
                                background-color: rgba(82, 92, 229, .25) !important;
                            }

                            .bg-soft-success {
                                background-color: rgba(35, 197, 143, .25) !important;
                            }
                        </style>
                    </div>




                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-header bg-white">
                                <h4 class="card-title">
                                    Shipment information
                                </h4>
                            </div>
                            <div class="card-body">
                                <dl class="d-flex flex-column gap-3">
                                    <div class="row">
                                        <dt class="col">
                                            Order number <a href=""><strong class="tex-right">#100000{{ $shipment->order_id }}</strong></a>
                                        </dt>
                                    </div>
                                    <div class="row">
                                        <dt class="col">
                                            Shipping method
                                        </dt>
                                        <dd class="col-auto">
                                            Default (Free delivery)
                                        </dd>
                                    </div>
                                    <div class="row">
                                        <dt class="col">
                                            Shipping fee
                                        </dt>
                                        <dd class="col-auto">
                                            ₹0.00
                                        </dd>
                                    </div>
                                    <div class="row">
                                        <dt class="col">
                                            Cash on delivery amount (COD)
                                        </dt>
                                        <dd class="col-auto">
                                            <strong>Total:</strong> ₹ {{ number_format($total, 2) }}

                                        </dd>
                                    </div>
                                    <div class="row">
                                        <dt class="col">
                                            COD status
                                        </dt>
                                        <dd class="col-auto">
                                            @if ($shipment->cod_status == 'completed')
                                            <span class="badge bg-success text-success-fg">Completed</span>
                                            @else
                                            <span class="label-warning bg-warning status-label px-3">Pending</span>
                                            @endif
                                        </dd>
                                    </div>
                                    <div class="row">
                                        <dt class="col">
                                            Shipping status
                                        </dt>
                                        <dd class="col-auto">
                                            @if ($shipment->status == 'delivered')
                                            <span class="badge bg-success text-success-fg">Delivered</span>
                                            @else
                                            <span class="label-warning bg-warning status-label">Approved</span>
                                            @endif
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-white">
                                <h4 class="card-title">
                                    Customer information
                                </h4>
                            </div>
                            <div class="card-body">
                                <dl class="shipping-address-info">
                                    <dd>{{ $customer->name }}</dd>
                                    <dd>
                                        <a href="tel:+{{ $customer->phone }}">
                                            <i class="fa fa-volume-control-phone fa-lg" aria-hidden="true"></i>
                                            <span dir="ltr">+{{ $customer->phone }}</span>
                                        </a>
                                    </dd>
                                    <dd><a href="mailto:fweber@example.org">{{ $customer->email }}</a></dd>

                                    <dd>{{ $shipment->order->street_address }}</dd>
                                    <dd>{{ $shipment->order->street_address2 }}</dd>
                                    <dd>{{ $shipment->order->town_city }}</dd>
                                    <dd>{{ $shipment->order->state }}</dd>
                                    <dd>{{ $shipment->order->country }}</dd>

                                    <dd>
                                        <a href="https://maps.google.com/?q={{ urlencode($shipment->order->street_address . ' ' . $shipment->order->street_address2 . ', ' . $shipment->order->town_city . ', ' . $shipment->order->state . ', ' . $shipment->order->country) }}" target="_blank">
                                            See on maps
                                        </a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header bg-white">
                                <h4 class="card-title">
                                    Shipping label
                                </h4>
                            </div>
                            <div class="card-body">
                                <a type="button" href="#" target="_blank">
                                    <i class="fa-solid fa-print fa-2xl" style="color: #020fc5;"></i>
                                    Print
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection