@extends('front.layout.app')
<style>
    #loginButton {
        display: none;
    }
</style>
@section('content')
    <main>

        <section class="sign-up-in">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="contact-detils">
                            <div class="loca">
                                <h6>HOME > <span>MY ACCOUNT</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="main-content col-lg-12">


                        <div id="content" role="main">

                            <article class="post-2171 page type-page status-publish hentry">

                                <h2 class="entry-title" style="display: none;">My Account</h2><span class="vcard"
                                    style="display: none;"><span class="fn"><a href="#"
                                            title="Posts by Kumar Rajeev" rel="author">Kumar Rajeev</a></span></span><span
                                    class="updated" style="display:none">2022-12-13T10:57:49+05:30</span>
                                <div class="page-content">
                                    <div class="woocommerce">
                                        <div class="col-lg-10 mx-auto mb-4">
                                            <div class="align-left ">
                                                <div class="box-content">
                                                    <div class="woocommerce-notices-wrapper"></div>
                                                    {{-- Display user information if logged in --}}
                                                    @if (Auth::guard('customer')->check())
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('post')
                                                            <div class="account-info">
                                                                <div class="col-md-4">
                                                                    <label class="control-label required" for="name"
                                                                        aria-required="true">Name:</label>
                                                                    <input type="text" name="name"
                                                                        class="form-control"
                                                                        value="{{ Auth::guard('customer')->user()->name }}">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="control-label required" for="email"
                                                                        aria-required="true">Email:</label>
                                                                    <input type="text" name="email"
                                                                        class="form-control"
                                                                        value="{{ Auth::guard('customer')->user()->email }}">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="control-label required" for="phone"
                                                                        aria-required="true">Phone:</label>
                                                                    <input type="text" name="phone"
                                                                        class="form-control"
                                                                        value="{{ Auth::guard('customer')->user()->phone }}">
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="control-label required" for="address"
                                                                        aria-required="true">Address:</label>
                                                                    <textarea name="address" class="form-control" style="width: 30vw; height:20vh;">{{ Auth::guard('customer')->user()->address }}</textarea>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        {{-- Display login form if not logged in --}}
                                                    @else
                                                        <div class="u-columns col2-set" id="customer_login">

                                                            <div class="row">
                                                                <div class=" col-md-6 col-12">

                                                                    <form action="{{ route('login_newUser') }}"
                                                                        method="post"
                                                                        class="woocommerce-form woocommerce-form-login login pr-lg-4 pe-0"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('post')
                                                                        <h3
                                                                            class="account-sub-title mb-2 font-weight-bold text-capitalize text-v-dark">
                                                                            Login</h3>
                                                                        <p
                                                                            class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                                            <label class="mb-1 font-weight-medium"
                                                                                for="username">Email
                                                                                address&nbsp;<span
                                                                                    class="required">*</span></label>
                                                                            <input type="text"
                                                                                class="woocommerce-Input woocommerce-Input--text input-text line-height-xl"
                                                                                name="email" id="username"
                                                                                autocomplete="" value="" required>
                                                                        </p>
                                                                        <p
                                                                            class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-2">
                                                                            <label class="mb-1 font-weight-medium"
                                                                                for="password">Password&nbsp;<span
                                                                                    class="required">*</span>
                                                                            </label>
                                                                            <span class="password-input">
                                                                                <input
                                                                                    class="woocommerce-Input woocommerce-Input--text input-text line-height-xl"
                                                                                    type="password" name="password"
                                                                                    id="password" autocomplete="" required>
                                                                                <span class="show-password-input"></span>
                                                                            </span>

                                                                        <div class="twy_signup_otp_mobile_form">
                                                                            <label class="twy_label twy_mobile_label"
                                                                                for="twy_mobile">Mobile <span
                                                                                    class="required">*</span>
                                                                            </label>
                                                                            <div class="twy_mobile_field_container">
                                                                                <input type="text" name="twy_mobile"
                                                                                    class="twy_mobile_field twy_mobile"
                                                                                    required="" required>
                                                                                {{-- <input type="button"
                                                                                class="twy_send_otp_button" data-index=""
                                                                                value="Send OTP"> --}}
                                                                            </div>
                                                                            <div class="twy_otp_message"></div>
                                                                        </div>
                                                                        </p>


                                                                        <p class="status" style="display: none;"></p>

                                                                        <div
                                                                            class="woocommerce-LostPassword lost_password d-flex flex-column flex-sm-row justify-content-between mb-4">
                                                                            <div class="porto-checkbox my-2 my-sm-0">
                                                                                <input type="checkbox" name="rememberme"
                                                                                    id="rememberme" value=""
                                                                                    class="porto-control-input woocommerce-form__input woocommerce-form__input-checkbox">
                                                                                <label
                                                                                    class="porto-control-label no-radius"
                                                                                    for="rememberme">Remember me</label>
                                                                            </div>
                                                                            <a href="#"
                                                                                class="text-v-dark font-weight-semibold">Forgot
                                                                                Password?</a>
                                                                        </div>
                                                                        <p class="form-row mb-3 mb-lg-0 pb-1 pb-lg-0">
                                                                            <!-- <input type="hidden" id="woocommerce-login-nonce"
                                                                                                                                                                                                                                        name="woocommerce-login-nonce" value=""><input
                                                                                                                                                                                                                                        type="" name="_wp_http_referer" value=""> -->
                                                                            <button type="submit"
                                                                                class="woocommerce-Button button login-btn btn-v-dark py-3 text-md w-100"
                                                                                name="login"
                                                                                value="Login">Login</button>
                                                                        </p>


                                                                    </form>
                                                                    <p class="form-row mb-3 mb-lg-0 pb-1 pb-lg-0">

                                                                        {{-- <button type="submit"
                                                                            class="woocommerce-Button button login-btn-otp btn-v-dark py-3 text-md w-100"
                                                                            name="login" value="">Login with
                                                                            Phone</button> --}}

                                                                        <button type="button"
                                                                            class="woocommerce-Button button login-btn-otp btn-v-dark py-3 text-md w-100"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#registerModal">
                                                                            Login with Phone
                                                                        </button>
                                                                    </p>

                                                                </div>
                                                                <div class=" col-md-6 col-12">

                                                                    <form action="{{ route('register_newUser') }}"
                                                                        method="post" enctype="multipart/form-data"
                                                                        class="woocommerce-form woocommerce-form-register register pl-lg-4 pe-0">
                                                                        @csrf
                                                                        @method('post')
                                                                        <h3
                                                                            class="account-sub-title mb-2 font-weight-bold">
                                                                            Register
                                                                        </h3>

                                                                        {{-- <p class="form-row form-row-first">
                                                                        <label for="reg_billing_first_name"
                                                                            class="name">First
                                                                            name<span class="required">*</span></label>
                                                                        <input type="text" class="input-text"
                                                                            name="billing_first_name"
                                                                            id="reg_billing_first_name" value="">
                                                                    </p> --}}
                                                                        {{-- <p class="form-row form-row-last">
                                                                        <label for="reg_billing_last_name"
                                                                            class="name">Last
                                                                            name<span class="required">*</span></label>
                                                                        <input type="text" class="input-text"
                                                                            name="billing_last_name"
                                                                            id="reg_billing_last_name" value="">
                                                                    </p> --}}
                                                                        <!-- <p class="form-row form-row-wide">-->
                                                                        <!--<label for="reg_billing_phone">Phone<span class="required">*</span></label>-->
                                                                        <!--<input type="text" class="input-phone" name="billing_phone" id="reg_billing_phone" value="" />-->
                                                                        <!--</p>-->
                                                                        <div class="clear"></div>


                                                                        <p
                                                                            class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                                            <label class="font-weight-medium mb-1"
                                                                                for="reg_username">Name&nbsp;<span
                                                                                    class="required">*</span>
                                                                            </label>
                                                                            <input type="text"
                                                                                class="woocommerce-Input woocommerce-Input--text line-height-xl input-text"
                                                                                name="name" id="reg_username"
                                                                                autocomplete="" value="">
                                                                        </p>


                                                                        <p
                                                                            class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                                            <label class="font-weight-medium mb-1"
                                                                                for="reg_email">Email address&nbsp;<span
                                                                                    class="required">*</span>
                                                                            </label>
                                                                            <input type="email"
                                                                                class="woocommerce-Input woocommerce-Input--text line-height-xl input-text"
                                                                                name="email" id="reg_email"
                                                                                autocomplete="" value="">
                                                                        <div class="twy_signup_otp_mobile_form">
                                                                            <label class="twy_label twy_mobile_label"
                                                                                for="twy_mobile">Mobile <span
                                                                                    class="required">*</span>
                                                                            </label>
                                                                            <div class="twy_mobile_field_container">
                                                                                <input type="text" name="phone"
                                                                                    class="twy_mobile_field twy_mobile"
                                                                                    required="">
                                                                                {{-- <input type="button"
                                                                                class="twy_send_otp_button" data-index=""
                                                                                value="Send OTP"> --}}
                                                                            </div>
                                                                            <div class="twy_otp_message"></div>
                                                                        </div>
                                                                        <div class="twy_signup_otp_mobile_form">
                                                                            <label class="twy_label twy_mobile_label"
                                                                                for="twy_mobile">Password <span
                                                                                    class="required">*</span>
                                                                            </label>
                                                                            <div class="twy_mobile_field_container">
                                                                                <input type="password" name="password"
                                                                                    class="twy_mobile_field twy_mobile"
                                                                                    required="">
                                                                                {{-- <input type="button"
                                                                                class="twy_send_otp_button" data-index=""
                                                                                value="Send OTP"> --}}
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
                                                                                our <a href="#"
                                                                                    target="_blank">privacy
                                                                                    policy</a>.</p>
                                                                        </div>
                                                                        <p class="status" style="display: none;"></p>

                                                                        <p class="woocommerce-form-row form-row mb-0">
                                                                            {{-- <input type="hidden"
                                                                            id="woocommerce-register-nonce"
                                                                            name="woocommerce-register-nonce"
                                                                            value=""> --}}
                                                                            {{-- <input type="hidden" name="_wp_http_referer"
                                                                            value=""> --}}
                                                                            <button type="submit"
                                                                                class="woocommerce-Button button register-btn btn-v-dark text-md py-3 w-100"
                                                                                name=""
                                                                                value="">Register</button>
                                                                        </p>


                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>


                        <script nitro-exclude="">
                            document.cookie = 'nitroCachedPage=' + (!window.NITROPACK_STATE ? '0' : '1') + '; path=/; SameSite=Lax';
                        </script>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Guest Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('guest_login') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        <!-- Add your registration form fields here -->
                        <div class="form-group">
                            <label for="phone">Mob no.</label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                placeholder="Enter phone">
                            <button type="button" id="otpButton" class="btn btn-primary">OTP</button>
                        </div>
                        <div class="form-group">
                            <label for="otp">OTP</label>
                            <input type="number" class="form-control" id="otp" name="otp"
                                placeholder="Enter OTP">
                        </div>
                        <!-- Add more form fields as needed -->
                        <p id="otpMessage" style="color: green; font-weight: 500; display: none;">OTP sent!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="loginButton" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Password generate script --}}
    <script>
        function generatePassword() {
            // Define characters to be used in the generated password
            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%^&*()_+";

            // Define password length
            var passwordLength = 12;

            // Initialize empty password string
            var password = "";

            // Generate password randomly
            for (var i = 0; i < passwordLength; i++) {
                var randomIndex = Math.floor(Math.random() * chars.length);
                password += chars[randomIndex];
            }

            // Display generated password using innerText
            document.getElementById("password").innerText = password;
        }
    </script>

    {{-- Otp sent script --}}
    <script>
        $(document).ready(function() {
            $("#otpButton").click(function(e) {
                // Prevent the form from submitting
                // e.preventDefault();

                // Get the phone number from the input field
                var phoneNumber = $("#phone").val();

                // Check if the phone number is entered
                if (phoneNumber === '') {
                    alert('Please enter your phone number.');
                    return;
                }

                // Simulate sending OTP (you can replace this with an actual OTP sending code)
                alert('OTP sent to ' + phoneNumber);

                // Hide the OTP button
                $("#otpButton").hide();

                // Show the login button
                $("#loginButton").show();

                // Show the "OTP sent" message
                $("#otpMessage").show();
            });
        });
    </script>
@endsection
