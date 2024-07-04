@extends('front.layout.app')

@section('content')
    <main>

        <section class="sign-up-in">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="contact-detils">
                            <div class="loca">
                                <h6>HOME > <span>MY ORDERS</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="main-content col-lg-12">


                        <div id="content" role="main">

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        @foreach ($order->productOrders as $productOrder)
                                            <tr>
                                                <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    <img src="{{ asset($productOrder->product->images) }}"
                                                        alt="{{ $productOrder->product->name }}" width="100">
                                                </td>
                                                <td>{{ $productOrder->product->name }}</td>
                                                <td>{{ $productOrder->quantity }}</td>
                                                <td>{{ $productOrder->subtotal }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>

                            <p>
                                <a href="{{ route('home') }}">
                                    <button class="btn btn-dark">Continue shopping</button>
                                </a>
                            </p>

                        </div>


                        <script nitro-exclude="">
                            document.cookie = 'nitroCachedPage=' + (!window.NITROPACK_STATE ? '0' : '1') + '; path=/; SameSite=Lax';
                        </script>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
