@extends('front.layout.app')

@section('content')
    <main>
        <section class="check-out">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="cart-header">
                            <ul class="item-header d-flex justify-content-center">
                                <li class="cart-nxt"><a href="#">Shopping Cart</a></li>
                                <li class="current"><a href="#"><i class="fa-solid fa-chevron-right"></i>Checkout</a>
                                </li>
                                <li class="disable"><a href="#"><i class="fa-solid fa-chevron-right"></i>Order
                                        Complete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    @if ($errors->any())
                     <div class="alert alert-danger text-start" role="alert">
                          <strong>Opps!</strong> Something went wrong<br>
                          <ul>
                          @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                          @endforeach
                          </ul>
                     </div>
                     @endif
                     
                    <form action="{{ route('payment') }}" class="needs-validation" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="col-md-7 col-12 Billing py-5">

                            @if (Auth::guard('customer')->check() && Auth::guard('customer')->id())
                                <a><span>{{ Auth::guard('customer')->user()->name }}</span></a>
                            @else
                                <a href="{{ route('myaccount') }}">Returning customer? <span>Login</span></a>
                            @endif
                            <a href="#">Have a coupon? <span>ENTER YOUR CODE</span></a>
                            <h4 class="mb-3 mt-3">Billing details</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="fristName" class="form-label">Frist name <span>*</span></label>
                                    <input type="text" name="firstName" id="firstName" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback">Valid frist name is required</div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="fristName" class="form-label">Last name <span>*</span></label>
                                    <input type="text" name="laststName" id="laststName" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback">Valid frist name is required</div>
                                </div>
                                <div class="col-12">
                                    <label for="Company name (optional)" class="form-label">Company name
                                        (optional)
                                    </label>
                                    <input type="text" name="companyName" id="companyName" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="billing_country" class="form-label">Country / Region&nbsp;<abbr
                                            class="required" title="required">*</abbr>
                                    </label>
                                    <span class="country"><strong>India</strong><input type="hidden" name="billing_country"
                                            id="billing_country" value="India" autocomplete="country"
                                            class="country_to_state" readonly="readonly">
                                    </span>
                                </div>
                                <div class="col-12">
                                    <label for="Street address" class="form-label">Street address <span>*</span></label>
                                    <input type="text" name="streetAdress" id="streetAdress" class="form-control"
                                        placeholder="House number and street name">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="Street address" class="form-label"><span></span></label>
                                    <input type="text" name="streetAdress2" id="streetAdress2" class="form-control"
                                        placeholder="Apartment, suite, unit, etc. (optional)">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="Town/City" class="form-label">Town / City <span>*</span></label>
                                    <input type="text" name="townCity" id="townCity" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select" id="state" name="state">
                                        <option value="Choose">Choose</option>
                                        <option value="AP">Andhra Pradesh</option>
                                        <option value="AR">Arunachal Pradesh</option>
                                        <option value="AS">Assam</option>
                                        <option value="BR">Bihar</option>
                                        <option value="CT">Chhattisgarh</option>
                                        <option value="GA">Goa</option>
                                        <option value="GJ">Gujarat</option>
                                        <option value="HR">Haryana</option>
                                        <option value="HP">Himachal Pradesh</option>
                                        <option value="JK">Jammu and Kashmir</option>
                                        <option value="JH">Jharkhand</option>
                                        <option value="KA">Karnataka</option>
                                        <option value="KL">Kerala</option>
                                        <option value="LA">Ladakh</option>
                                        <option value="MP">Madhya Pradesh</option>
                                        <option value="MH">Maharashtra</option>
                                        <option value="MN">Manipur</option>
                                        <option value="ML">Meghalaya</option>
                                        <option value="MZ">Mizoram</option>
                                        <option value="NL">Nagaland</option>
                                        <option value="OR">Odisha</option>
                                        <option value="PB">Punjab</option>
                                        <option value="RJ">Rajasthan</option>
                                        <option value="SK">Sikkim</option>
                                        <option value="TN">Tamil Nadu</option>
                                        <option value="TS">Telangana</option>
                                        <option value="TR">Tripura</option>
                                        <option value="UK">Uttarakhand</option>
                                        <option value="UP">Uttar Pradesh</option>
                                        <option value="WB">West Bengal</option>
                                        <option value="AN">Andaman and Nicobar Islands</option>
                                        <option value="CH">Chandigarh</option>
                                        <option value="DN">Dadra and Nagar Haveli</option>
                                        <option value="DD">Daman and Diu</option>
                                        <option value="DL" selected="selected">Delhi</option>
                                        <option value="LD">Lakshadeep</option>
                                        <option value="PY">Pondicherry (Puducherry)</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="PIN Code" class="form-label">PIN Code <span>*</span></label>
                                    <input type="text" name="pinCode" id="pinCode" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone <span>*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="" value="{{ Auth::guard('customer')->user()->phone }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="emailAdress" class="form-label">Email Adress <span>*</span></label>
                                    <input type="text" name="emailAdress" id="emailAdress" class="form-control"
                                        placeholder="" value="{{ Auth::guard('customer')->user()->email }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="Account username" class="form-label">Account
                                        username<span>*</span></label>
                                    <input type="text" name="accountUsername" id="accountUsername"
                                        class="form-control" placeholder=""
                                        value="{{ Auth::guard('customer')->user()->name ? Auth::guard('customer')->user()->name : Auth::guard('customer')->user()->guest_id }}">

                                    <div class="invalid-feedback"></div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <label for="form-check-label" class="check-item">Ship to a different
                                            address?</label>
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <div class="row another-adress">
                                <div class="col-sm-6">
                                    <label for="fristName" class="form-label">Frist name <span>*</span></label>
                                    <input type="text" name="" id="firstName" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback">Valid frist name is required</div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="fristName" class="form-label">Last name <span>*</span></label>
                                    <input type="text" name="" id="firstName" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback">Valid frist name is required</div>
                                </div>
                                <div class="col-12">
                                    <label for="Company name (optional)" class="form-label">Company name
                                        (optional)
                                    </label>
                                    <input type="text" name="" id="companyName" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="billing_country" class="form-label">Country / Region&nbsp;<abbr
                                            class="required" title="required">*</abbr>
                                    </label>
                                    <span class="country"><strong>India</strong><input type="hidden"
                                            name="billing_country" id="billing_country" value=""
                                            autocomplete="country" class="country_to_state" readonly="readonly">
                                    </span>
                                </div>
                                <div class="col-12">
                                    <label for="Street address" class="form-label">Street address <span>*</span></label>
                                    <input type="text" name="" id="streetAdress" class="form-control"
                                        placeholder="House number and street name">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="Street address" class="form-label"><span></span></label>
                                    <input type="text" name="" id="streetAdress" class="form-control"
                                        placeholder="Apartment, suite, unit, etc. (optional)">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="Town/City" class="form-label">Town / City <span>*</span></label>
                                    <input type="text" name="" id="townCity" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select" id="state">
                                        <option value="Choose">Choose</option>
                                        <option value="AP">Andhra Pradesh</option>
                                        <option value="AR">Arunachal Pradesh</option>
                                        <option value="AS">Assam</option>
                                        <option value="BR">Bihar</option>
                                        <option value="CT">Chhattisgarh</option>
                                        <option value="GA">Goa</option>
                                        <option value="GJ">Gujarat</option>
                                        <option value="HR">Haryana</option>
                                        <option value="HP">Himachal Pradesh</option>
                                        <option value="JK">Jammu and Kashmir</option>
                                        <option value="JH">Jharkhand</option>
                                        <option value="KA">Karnataka</option>
                                        <option value="KL">Kerala</option>
                                        <option value="LA">Ladakh</option>
                                        <option value="MP">Madhya Pradesh</option>
                                        <option value="MH">Maharashtra</option>
                                        <option value="MN">Manipur</option>
                                        <option value="ML">Meghalaya</option>
                                        <option value="MZ">Mizoram</option>
                                        <option value="NL">Nagaland</option>
                                        <option value="OR">Odisha</option>
                                        <option value="PB">Punjab</option>
                                        <option value="RJ">Rajasthan</option>
                                        <option value="SK">Sikkim</option>
                                        <option value="TN">Tamil Nadu</option>
                                        <option value="TS">Telangana</option>
                                        <option value="TR">Tripura</option>
                                        <option value="UK">Uttarakhand</option>
                                        <option value="UP">Uttar Pradesh</option>
                                        <option value="WB">West Bengal</option>
                                        <option value="AN">Andaman and Nicobar Islands</option>
                                        <option value="CH">Chandigarh</option>
                                        <option value="DN">Dadra and Nagar Haveli</option>
                                        <option value="DD">Daman and Diu</option>
                                        <option value="DL" selected="selected">Delhi</option>
                                        <option value="LD">Lakshadeep</option>
                                        <option value="PY">Pondicherry (Puducherry)</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="PIN Code" class="form-label">PIN Code <span>*</span></label>
                                    <input type="text" name="" id="pinCode" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone <span>*</span></label>
                                    <input type="text" name="" id="phone" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="emailAdress" class="form-label">Email Adress <span>*</span></label>
                                    <input type="text" name="" id="emailAdress" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <label for="Account username" class="form-label">Account
                                        username<span>*</span></label>
                                    <input type="text" name="" id="accountUsername" class="form-control"
                                        placeholder="">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div> --}}
                            <div class="col-md-8 col-12">
                                <label for="Order notes (optional)" class="form-label">Order notes (optional)</label>
                                <textarea name="orderNotes" id="" cols="30" rows="4"
                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                        <div class="col-md-5 col-12 py-5">
                            <div class="order-summery">
                                <div class="order">
                                    <h5>Your Order</h5>
                                </div>
                                <div class="product">
                                    <h6>product</h6>
                                    @foreach ($cartItems as $item)
                                        <div class="product-inner d-flex align-items-center">
                                            <p>
                                                {{ $productNames[$item['productId']] }} x {{ $item['quantity'] }}
                                            </p>
                                            <p class="priceTag price">{{ $item['subtotal'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <hr class="w-100">
                                <div class="subtotal d-flex justify-content-between">
                                    <h6>subtotal</h6>
                                    <p class="priceTag price">{{ $subtotal }}</p>
                                </div>
                                <hr class="w-100">
                                <div class="shippingFee">
                                    <h6>shipping</h6>
                                    <p>free shipping</p>
                                </div>
                                <hr class="w-100">
                                <div class="total d-flex justify-content-between">
                                    <h4>total</h4>
                                    <p class="priceTag totalprice">{{ $total }}</p>
                                </div>
                                <div id="payment" class="">


                                    <div class="porto-separator m-b-md">
                                        <hr class="separator-line  align_center">
                                    </div>
                                    <h4 class="px-2">Payment methods</h4>
                                    <ul class="wc_payment_methods payment_methods methods px-2">
                                        <li class="wc_payment_method payment_method_cashfree">
                                            <div class="porto-radio">
                                                <input id="payment_method_cashfree" type="radio"
                                                    class="input-radio porto-control-input" name="is_paid" value="1"
                                                    checked data-order_button_text="" style="">

                                                <label class="porto-control-label" for="payment_method_cashfree">
                                                    Cashfree
                                                    <img src="https://cashfreelogo.cashfree.com/cashfreepayments/logopng1x/Cashfree_Payments_Logo.png"
                                                        alt="Cashfree">
                                                </label>
                                            </div>
                                            <div class="payment_box payment_method_cashfree">

                                                <p></p>
                                                <p>Pay securely via Card/Net Banking/Wallet via Cashfree.</p>
                                                <p></p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="porto-separator m-b-lg">
                                        <hr class="separator-line  align_center">
                                    </div>
                                    <div class="form-row place-order">
                                        <noscript>
                                            Since your browser does not support JavaScript, or it is disabled, please ensure
                                            you click the <em>Update Totals</em> button before placing your order. You may
                                            be charged more than the amount stated above if you fail to do so. <br /><button
                                                type="" class="button alt" name="" value="">Update
                                                totals</button>
                                        </noscript>

                                        <div class="">
                                            <div class="">
                                                <p>Your personal data will be used to process your order, support your
                                                    experience throughout this website, and for other purposes described in
                                                    our <a href="#" class="" target="_blank"
                                                        style="color: #000;">privacy
                                                        policy</a>.</p>
                                            </div>
                                        </div>




                                        <button type="submit" class="button alt btn-v-dark w-100 mt-3 py-3"
                                            name="woocommerce_checkout_place_order" id="place_order" value=""
                                            data-value="">Pay Now</button>

                                        {{-- <input type="hidden" id="" name="" value=""><input
                                        type="hidden" name="" value=""> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </section>

        <!--  todo modal area start-->
        <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="modal_tab">
                                        <div class="tab-content product-details-large">
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product1.jpg"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product2.jpg"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product3.jpg"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab4" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product5.jpg"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal_tab_button">
                                            <ul class="nav product_navactive owl-carousel" role="tablist">
                                                <li>
                                                    <a class="nav-link active" data-toggle="tab" href="#tab1"
                                                        role="tab" aria-controls="tab1" aria-selected="false"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                                        aria-controls="tab2" aria-selected="false"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                                        role="tab" aria-controls="tab3" aria-selected="false"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                                        aria-controls="tab4" aria-selected="false"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="modal_right">
                                        <div class="modal_title mb-10">
                                            <h2>Handbag feugiat</h2>
                                        </div>
                                        <div class="modal_price mb-10">
                                            <span class="new_price">$64.99</span>
                                            <span class="old_price">$78.99</span>
                                        </div>
                                        <div class="modal_description mb-15">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                                laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti
                                                nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam,
                                                rerum vel recusandae </p>
                                        </div>
                                        <div class="variants_selects">
                                            <div class="variants_size">
                                                <h2>size</h2>
                                                <select class="select_option">
                                                    <option selected value="1">s</option>
                                                    <option value="1">m</option>
                                                    <option value="1">l</option>
                                                    <option value="1">xl</option>
                                                    <option value="1">xxl</option>
                                                </select>
                                            </div>
                                            <div class="variants_color">
                                                <h2>color</h2>
                                                <select class="select_option">
                                                    <option selected value="1">purple</option>
                                                    <option value="1">violet</option>
                                                    <option value="1">black</option>
                                                    <option value="1">pink</option>
                                                    <option value="1">orange</option>
                                                </select>
                                            </div>
                                            <div class="modal_add_to_cart">
                                                <form action="#">
                                                    <input min="1" max="100" step="2" value="1"
                                                        type="number">
                                                    <button type="submit">add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal_social">
                                            <h2>Share this product</h2>
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li class="pinterest"><a href="#"><i
                                                            class="fa fa-pinterest"></i></a>
                                                </li>
                                                <li class="google-plus"><a href="#"><i
                                                            class="fa fa-google-plus"></i></a></li>
                                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  todo modal area end-->

    </main>
@endsection
