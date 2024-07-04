@extends('front.layout.app')
<style>
    #loginButton {
        display: none;
    }
</style>
<style>
    .nav-link {
        color: #7E7E7E !important;
        font-size: 16px !important;
        font-weight: 700 !important;
        padding: 15px 30px !important;
        margin: 5px 0px;
        border: 0.2px solid #b2b0b07f !important;
        border-radius: 10px !important;


    }

    .nav-link1 {
        display: block;
       color: #7E7E7E !important;
        font-size: 16px !important;
        font-weight: 700 !important;
        padding: 15px 30px !important;
        margin: 5px 0px;
           border: 0.2px solid #b2b0b07f !important;
        border-radius: 10px !important;


    }

    .nav-link.active {
        background-color: #3BB77E;
        color: white !important;
        border-radius: 10px;
    }

    .avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: #00bcd4;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        font-weight: bold;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info div {
        margin-left: 10px;
    }

    .user-info h5 {
        margin: 0;
    }

    .user-info p {
        margin: 0;
    }

    td a::before {
        content: "" !important;
        position: fixed !important;
       }
</style>
@section('content')

<div class="breadcambarea py-3 px-4">
    {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item text-success h5">Home</li>
        <li class="breadcrumb-item ">My Account</li>
    </ol> --}}
       <ol class="breadcrumb">
            <li class="breadcrumb-item text-success h5">Home</li>
            <li class="breadcrumb-item" id="breadcrumbCurrent">My Account</li>
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
</div>
<div class="container p-5">
    <div class="row">
                    <nav class="col-md-3 d-none d-md-block">
                        <div class="sidebar-sticky">
                            <div class="avatardive">
                    <div id="userAvatar" class="user-info">
                        <div class="avatar" id="avatarLetter">
                            @if (Auth::guard('customer')->check())
                            {{ strtoupper(substr(Auth::guard('customer')->user()->name, 0, 1)) }}
                            @else
                            G
                            @endif
                        </div>
                        <div>
                            @if (Auth::guard('customer')->check())
                            <h5 id="userName">{{ Auth::guard('customer')->user()->name }}</h5>
                            <p id="userEmail">{{ Auth::guard('customer')->user()->email }}</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-section="overview">
                            <i class="fas fa-tachometer-alt"></i> Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="profile">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="orders">
                            <i class="fas fa-box"></i> Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="downloads">
                            <i class="fas fa-download"></i> Downloads
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="return-requests">
                            <i class="fas fa-undo-alt"></i> Order Return Requests
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="address-books">
                            <i class="fas fa-address-book"></i> Address Books
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (Auth::guard('customer')->check())

                        <a class="nav-link1" href="{{ route('show_wishlist') }}" data-section="wishlist">
                            <i class="fas fa-heart"></i> Wishlist
                        </a>
                        @endif

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="change-password">
                            <i class="fas fa-key"></i> Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-section="become-vendor">
                            <i class="fas fa-store"></i> Become a Vendor
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (Auth::guard('customer')->check())
                        <a class="nav-link1" href="{{ route('myaccount_logout') }}" data-section="logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
            <div id="overview" class="section">
                <h5 class="h3">Overview</h5>
                <p class="fs-6 bg-light text-dark p-3 rounded-2">Hello  @if (Auth::guard('customer')->check())
                            {{ Auth::guard('customer')->user()->name }}
                            @endif
                             From your account dashboard, you can easily check & view your recent orders, manage
                    your shipping and billing addresses and edit your password and account details.</p>
            </div>
            <div id="profile" class="section" style="display:none;">
                <h2>Profile</h2>

                <div class="container">
                   <form action="{{ route('updateprofile', ['id' => Auth::guard('customer')->user()->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::guard('customer')->user()->name) }}" placeholder="Enter your name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::guard('customer')->user()->email) }}" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', Auth::guard('customer')->user()->phone) }}" placeholder="Enter your phone number">
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', Auth::guard('customer')->user()->dob) }}" placeholder="Enter your date of birth">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', Auth::guard('customer')->user()->address) }}" placeholder="Enter your address">
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="active" {{ Auth::guard('customer')->user()->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ Auth::guard('customer')->user()->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="privatenotes">Private Notes:</label>
                        <textarea class="form-control" id="privatenotes" name="privatenotes" placeholder="Enter any private notes">{{ old('privatenotes', Auth::guard('customer')->user()->privatenotes) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                </div>
            </div>
            <div id="orders" class="section" style="display:none;">
                <h2>Orders</h2>
                <div class="container">
                    @if($orders->isEmpty())
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td class="bg-danger p-3 text-white fs-4 text-center" colspan="5"> You have no orders.</td>
                            </tr>
                        </tbody>
                    </table>
                        @else
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        @if ($order->is_paid == 1)
                                        <span class="label-warning p-2 bg-warning status-label">Pending</span>
                                        @else
                                        <span class="label-success status-label">Completed</span>
                                        @endif
                                    </td>
                                    <td><strong>{{ $order->total_subtotal }}</strong></td>
                                    <td><a href="#">
                                            <p>View</p>
                                        </a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <div id="downloads" class="section" style="display:none;">
                <h2>Downloads</h2>
            </div>
            <div id="return-requests" class="section" style="display:none;">
                <h2>Order Return Requests</h2>
                <p>Order return requests section content here...</p>
                    @if($orders->isEmpty())

                   <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td class="bg-danger p-3 text-white fs-4 text-center" colspan="5"> You have no orders.</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif

            </div>
            <div id="address-books" class="section" style="display:none;">
                <h2>Address Books</h2>
                <form id="orderForm" action="" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="order_id" id="order_id" value="{{ old('order_id', $order->id ?? '') }}">

                    {{-- <div class="form-group">
                        <label for="customer_id">Customer ID:</label>
                        <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ old('customer_id', $order->customer_id ?? '') }}" required>
                    </div> --}}
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $order->first_name ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $order->last_name ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="company_name">Company Name:</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $order->company_name ?? '') }}">
                    </div>
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $order->country ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="street_address">Street Address:</label>
                        <input type="text" class="form-control" id="street_address" name="street_address" value="{{ old('street_address', $order->street_address ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="street_address2">Street Address 2:</label>
                        <input type="text" class="form-control" id="street_address2" name="street_address2" value="{{ old('street_address2', $order->street_address2 ?? '') }}">
                    </div>
                    <div class="form-group">
                        <label for="town_city">Town/City:</label>
                        <input type="text" class="form-control" id="town_city" name="town_city" value="{{ old('town_city', $order->town_city ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $order->state ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="pin_code">PIN Code:</label>
                        <input type="text" class="form-control" id="pin_code" name="pin_code" value="{{ old('pin_code', $order->pin_code ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $order->phone ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $order->email ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="account_username">Account Username:</label>
                        <input type="text" class="form-control" id="account_username" name="account_username" value="{{ old('account_username', $order->account_username ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="order_notes">Order Notes:</label>
                        <textarea class="form-control" id="order_notes" name="order_notes">{{ old('order_notes', $order->order_notes ?? '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="is_paid">Is Paid:</label>
                        <select class="form-control" id="is_paid" name="is_paid">
                            <option value="1" {{ old('is_paid', $order->is_paid ?? '') == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('is_paid', $order->is_paid ?? '') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            {{-- <div id="wishlist" class="section" style="display:none;">
                    <h2>Wishlist</h2>
                    <p>Wishlist section content here...</p>
                </div> --}}
            <div id="change-password" class="section" style="display:none;">
                <h5 class="fs-3">Change Password</h5>
                <form action="">
                     <div class="form-group">
                            <label for="newpassword">New Password:</label>
                            <input type="newpassword" class="form-control" id="newpassword" name="newpassword" placeholder="Enter a new password if you want to change it">
                        </div>
                        <div class="form-group">
                            <label for="Repeatpassword"><i class="fa fa-repeat" aria-hidden="true"></i>  Repeat Password:</label>
                            <input type="Repeatpassword" class="form-control" id="Repeatpassword" name="Repeatpassword" placeholder="Enter a Repeat password if you want to change it">
                        </div>
                </form>
            </div>
                    <div id="become-vendor" class="section" style="display:none;">
                        <div class="container">
                <h1 class="mb-4">Become Vendor</h1>
                <form>
                    <div class="form-group">
                        <label for="shopName">Shop Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="shopName" name="shopName" placeholder="Shop Name" required>
                    </div>
                    <div class="form-group">
                        <label for="shopUrl">Shop URL <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="shopUrl" name="shopUrl" placeholder="Shop URL" required>
                        <small class="form-text text-muted">https://luxxport.com//stores</small>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Shop phone" required>
                    </div>
                    <button type="submit" class="btn btn-info text-center btn-block">Register</button>
                </form>
            </div>
            </div>
            {{-- <div id="logout" class="section" style="display:none;">
                    @if (Auth::guard('customer')->check())
                        <div class="header_wishlist">
                            <a href="{{ route('myaccount_logout') }}">
            </a>
    </div>
    @endif
</div> --}}
</main>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        $(".nav-link").click(function(e) {
            e.preventDefault();
            $(".nav-link").removeClass("active");
            $(this).addClass("active");
            $(".section").hide();
            $("#" + $(this).data("section")).show();
             const sectionName = $(this).text();
                $('#breadcrumbCurrent').text(sectionName);
        });
    });
</script>
<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
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
                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter phone">
                        <button type="button" id="otpButton" class="btn btn-primary">OTP</button>
                    </div>
                    <div class="form-group">
                        <label for="otp">OTP</label>
                        <input type="number" class="form-control" id="otp" name="otp" placeholder="Enter OTP">
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