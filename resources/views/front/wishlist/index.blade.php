@extends('front.layout.app')

@section('content')
    @extends('front.layout.app')

@section('content')
    <main>
        <section class="wishlist">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wishhead">
                            <h4>My wishlist</h4>
                        </div>
                    </div>

                    @if (Auth::guard('customer')->check())
                        <table>
                            <tr>
                                <th class="product-thumbnail"></th>
                                <th>product</th>
                                <th>price</th>
                                <th>stock status</th>
                                <th>actions</th>
                            </tr>

                            @foreach ($wishlistItems as $item)
                                <tr>
                                    <td data-cell="image">
                                        <a href="{{ route('delete_wishlist', ['id' => $item->id]) }}">
                                            <div class="product-img">
                                                <img src="{{ asset($item->images) }}" alt="{{ $item->name }}">
                                            </div>
                                        </a>
                                    </td>
                                    <td data-cell="details">{{ $item->name }}</td>
                                    <td data-cell="price">
                                        <div class="mrp d-flex pb-1">
                                            <span style="color: #777777;">MRP :</span>
                                            <p class="text-decoration-line-through mrpPrice">&#8377; {{ $item->price }}/-
                                            </p>
                                        </div>
                                        <div class="price d-flex">
                                            <span style="color: #777777;">Price :</span>
                                            <p class="text-decoration discount">&#8377; {{ $item->sale_price }}/-</p>
                                        </div>
                                    </td>
                                    <td data-cell="stock"> {{ $item->stock_status }}</td>
                                    <td data-cell="actions">
                                        <!-- <button class="cartbtn1">Quick view</button> -->
                                        <button class="cartbtn2">Add to cart</button>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    @else
                        <div class="u-columns col2-set" id="customer_login">

                            <div class="row">
                                <div class=" col-md-6 col-12">

                                    <form action="{{ route('login_newUser') }}" method="post"
                                        class="woocommerce-form woocommerce-form-login login pr-lg-4 pe-0"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <h3 class="account-sub-title mb-2 font-weight-bold text-capitalize text-v-dark">
                                            Login</h3>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label class="mb-1 font-weight-medium" for="username">Email
                                                address&nbsp;<span class="required">*</span></label>
                                            <input type="text"
                                                class="woocommerce-Input woocommerce-Input--text input-text line-height-xl"
                                                name="email" id="username" autocomplete="" value="" required>
                                        </p>
                                        <p
                                            class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-2">
                                            <label class="mb-1 font-weight-medium" for="password">Password&nbsp;<span
                                                    class="required">*</span>
                                            </label>
                                            <span class="password-input">
                                                <input
                                                    class="woocommerce-Input woocommerce-Input--text input-text line-height-xl"
                                                    type="password" name="password" id="password" autocomplete="" required>
                                                <span class="show-password-input"></span>
                                            </span>

                                        <div class="twy_signup_otp_mobile_form">
                                            <label class="twy_label twy_mobile_label" for="twy_mobile">Mobile <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="twy_mobile_field_container">
                                                <input type="text" name="twy_mobile" class="twy_mobile_field twy_mobile"
                                                    required="" required>
                                            </div>
                                            <div class="twy_otp_message"></div>
                                        </div>
                                        </p>


                                        <p class="status" style="display: none;"></p>

                                        <div
                                            class="woocommerce-LostPassword lost_password d-flex flex-column flex-sm-row justify-content-between mb-4">
                                            <div class="porto-checkbox my-2 my-sm-0">
                                                <input type="checkbox" name="rememberme" id="rememberme" value=""
                                                    class="porto-control-input woocommerce-form__input woocommerce-form__input-checkbox">
                                                <label class="porto-control-label no-radius" for="rememberme">Remember
                                                    me</label>
                                            </div>
                                            <a href="#" class="text-v-dark font-weight-semibold">Forgot
                                                Password?</a>
                                        </div>
                                        <p class="form-row mb-3 mb-lg-0 pb-1 pb-lg-0">
                                            <button type="submit"
                                                class="woocommerce-Button button login-btn btn-v-dark py-3 text-md w-100"
                                                name="login" value="Login">Login</button>
                                        </p>


                                    </form>
                                    <p class="form-row mb-3 mb-lg-0 pb-1 pb-lg-0">

                                        <button type="submit"
                                            class="woocommerce-Button button login-btn-otp btn-v-dark py-3 text-md w-100"
                                            name="login" value="">Login with
                                            Phone</button>
                                    </p>

                                </div>
                                <div class=" col-md-6 col-12">

                                    <form action="{{ route('register_newUser') }}" method="post"
                                        enctype="multipart/form-data"
                                        class="woocommerce-form woocommerce-form-register register pl-lg-4 pe-0">
                                        @csrf
                                        @method('post')
                                        <h3 class="account-sub-title mb-2 font-weight-bold">
                                            Register
                                        </h3>

                                        <div class="clear"></div>


                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label class="font-weight-medium mb-1" for="reg_username">Name&nbsp;<span
                                                    class="required">*</span>
                                            </label>
                                            <input type="text"
                                                class="woocommerce-Input woocommerce-Input--text line-height-xl input-text"
                                                name="name" id="reg_username" autocomplete="" value="">
                                        </p>


                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label class="font-weight-medium mb-1" for="reg_email">Email
                                                address&nbsp;<span class="required">*</span>
                                            </label>
                                            <input type="email"
                                                class="woocommerce-Input woocommerce-Input--text line-height-xl input-text"
                                                name="email" id="reg_email" autocomplete="" value="">
                                        <div class="twy_signup_otp_mobile_form">
                                            <label class="twy_label twy_mobile_label" for="twy_mobile">Mobile <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="twy_mobile_field_container">
                                                <input type="text" name="phone" class="twy_mobile_field twy_mobile"
                                                    required="">

                                            </div>
                                            <div class="twy_otp_message"></div>
                                        </div>
                                        <div class="twy_signup_otp_mobile_form">
                                            <label class="twy_label twy_mobile_label" for="twy_mobile">Password <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="twy_mobile_field_container">
                                                <input type="password" name="password"
                                                    class="twy_mobile_field twy_mobile" required="">

                                            </div>
                                            <div class="twy_otp_message"></div>
                                        </div>
                                        </p>


                                        <p class="emil-last">A password will be sent to
                                            your
                                            email
                                            address.</p>


                                        <div class="woocommerce-privacy-policy-text">
                                            <p>Your personal data will be used to support
                                                your
                                                experience throughout this website, to
                                                manage
                                                access
                                                to your account, and for other purposes
                                                described in
                                                our <a href="#" target="_blank">privacy
                                                    policy</a>.</p>
                                        </div>
                                        <p class="status" style="display: none;"></p>

                                        <p class="woocommerce-form-row form-row mb-0">

                                            <button type="submit"
                                                class="woocommerce-Button button register-btn btn-v-dark text-md py-3 w-100"
                                                name="" value="">Register</button>
                                        </p>


                                    </form>

                                </div>
                            </div>
                        </div>
                    @endif



                    <div class="col-md-12 col-12">
                        <div class="share d-flex align-items-center">
                            <div class="share-icon d-flex align-items-center">
                                <i class="fa-solid fa-share"></i>
                                <h3>Share on:</h3>
                            </div>
                            <div class="social">
                                <ul class="d-flex">
                                    <li><a href="#" class="fb"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twt"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#" class="pint"><i class="fa-brands fa-pinterest"></i></a></li>
                                    <li><a href="#" class="enve"><i class="fa-regular fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
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

@endsection
