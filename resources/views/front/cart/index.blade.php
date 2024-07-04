@extends('front.layout.app')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <main>
        <section class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="cart-header">
                            <ul class="item-header d-flex justify-content-center">
                                <li class="current"><a href="#">Shopping Cart</a></li>
                                <li class="cart-nxt"><a href="#"><i class="fa-solid fa-chevron-right"></i>Checkout</a>
                                </li>
                                <li class="disable"><a href="#"><i class="fa-solid fa-chevron-right"></i>Order
                                        Complete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="cartHolder" class="row mt-5 p-3">

                    <div class="col-md-8 m-0 p-0 ">
                        @foreach ($products as $cartItem)
                            <div class="border-box shadow p-3">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <!-- Product Details -->
                                    <div class="col-md-6">
                                        <h4 class="text-center">Product</h4>
                                        <div class="d-flex justify-content-between">
                                            <div class="col-md-4">
                                                <a href="{{ route('single_product', ['id' => $cartItem->product->id]) }}"><img
                                                        class="img-fluid img-responsive"
                                                        src="{{ asset($cartItem->product->images) }}"
                                                        alt="{{ $cartItem->product->name }}"></a>
                                            </div>
                                            <div class="col-md-8 p-3">
                                                <a href="{{ route('single_product', ['id' => $cartItem->product->id]) }}">
                                                    <p class="product-details">{{ $cartItem->product->name }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Quantity and Price -->
                                    <div class="col-md-6 d-flex justify-content-between">
                                        <div class="col-md-4 text-center">
                                            <h4>Price</h4>
                                            <p class="priceTag pt-3 rupess" id="price_{{ $cartItem->product->id }}">
                                                {{ $cartItem->product->sale_price }}</p>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <h4>Quantity</h4>
                                            <div class="form-group d-flex justify-content-center pt-3">
                                                <div class="quantity">
                                                    <a class="quantity__minus"
                                                        data-id="{{ $cartItem->product->id }}"><span>-</span></a>
                                                    <input name="quantity" type="text" class="quantity__input"
                                                        id="quantity_{{ $cartItem->product->id }}" value="1"
                                                        data-price="{{ $cartItem->product->sale_price }}">
                                                    <a class="quantity__plus"
                                                        data-id="{{ $cartItem->product->id }}"><span>+</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center mb-3">
                                            <h4>Subtotal</h4>
                                            <p class="priceTag pt-3 rupess" id="subtotal_{{ $cartItem->product->id }}">
                                                {{ $cartItem->product->sale_price }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div id="couponHolder" class="col-md-12 mt-5 d-flex justify-content-between align-items-center p-3">
                            <div class="col-md-6 d-flex">
                                <div class="form-group">
                                    <input type="text" name="" id=""
                                        class="d-inline-block form-control shadow-sm" value="Coupon code">
                                </div>
                                <input type="button" class="btn ms-2" value="Apply Coupon">
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn Update">Update Cart</button>
                            </div>
                        </div>
                    </div>


                    <!-- Cart Summary -->
                    <div id="rightCartDiv" class="col-md-4 col-12 rounder p-3 shadow">
                        <div class="">
                            <div class="cart-total">
                                <h4>cart total</h4>
                            </div>
                            <div class="sub d-flex justify-content-between">
                                <div class="total">
                                    <h6>subtotal</h6>
                                </div>
                                <div class="amount">
                                    <p><span>₹</span><span id="subtotalAmount">0</span></p>
                                </div>
                            </div>
                            <div class="shipping">
                                <h6>shipping</h6>
                                <p>free shipping</p>
                                <!-- Shipping Form -->
                                <!-- ... -->
                            </div>
                            <div class="amount d-flex justify-content-between">
                                <div class="total">
                                    <h4>total</h4>
                                </div>
                                <div class="price">
                                    <h6><span>₹</span><span id="totalAmount">0</span></h6>
                                </div>
                            </div>
                            <div class="checkout">
                                <a href="{{ route('checkout') }}">proceed to checkout<i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Add event listener for quantity minus
        $('.quantity__minus').on('click', function(e) {
            e.preventDefault();
            const productId = $(this).data('id');
            const quantityInput = $(`#quantity_${productId}`);
            let quantity = parseInt(quantityInput.val(), 10);
            const price = parseFloat(quantityInput.data('price'));

            if (quantity > 1) {
                quantity--;
                quantityInput.val(quantity);
                updateSubtotal(productId, quantity, price);
            }
        });

        // Add event listener for quantity plus
        $('.quantity__plus').on('click', function(e) {
            e.preventDefault();
            const productId = $(this).data('id');
            const quantityInput = $(`#quantity_${productId}`);
            let quantity = parseInt(quantityInput.val(), 10);
            const price = parseFloat(quantityInput.data('price'));

            quantity+1;
            quantityInput.val(quantity);
            updateSubtotal(productId, quantity, price);
        });

        // Function to update subtotal
        function updateSubtotal(productId, quantity, price) {
            const subtotal = quantity * price;
            $(`#subtotal_${productId}`).text(subtotal.toFixed(2));
        }

        // Function to update total
        function updateTotal() {
            let subtotal = 0;
            $('[id^="subtotal_"]').each(function() {
                subtotal += parseFloat($(this).text());
            });

            $('#subtotalAmount, #totalAmount').text(subtotal.toFixed(2));
        }

        // Update total when page loads
        updateTotal();

        // Update total when quantity changes
        $('.quantity__input').on('input', function() {
            updateTotal();
        });

        // Update total when Update Cart button is clicked
        $('.Update').on('click', function() {
            updateTotal();
            const cartItems = [];
            $('[id^="subtotal_"]').each(function() {
                const productId = this.id.split('_')[1];
                const price = parseFloat($(`#price_${productId}`).text());
                const quantity = parseInt($(`#quantity_${productId}`).val(), 10);
                const subtotal = price * quantity;

                cartItems.push({
                    productId: productId,
                    quantity: quantity,
                    subtotal: subtotal,
                    price: price
                });
            });

            sessionStorage.setItem('cart', JSON.stringify(cartItems));

            // Log the session data to the console
            console.log('Cart Items stored in session:', JSON.parse(sessionStorage.getItem('cart')));
            // Retrieve cart data from sessionStorage
            const allCartItems = JSON.parse(sessionStorage.getItem('cart'));

            // Send cart data to Laravel
            $.ajax({
                url: '/store-cart',
                method: 'POST',
                data: {
                    allCartItems: allCartItems
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Cart data sent to Laravel:', response);
                },
                error: function(error) {
                    console.error('Error sending cart data to Laravel:', error);
                }
            });
        });

    });
</script>
