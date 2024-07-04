@extends('admin.layout.app')

@section('content')
    <form method="POST" action="{{ route('admin.ecommerce.save_discounts') }}" enctype="multipart/form-data">
        @csrf
        <div class="main-panel">

            <ol class="breadcrumb">
                <li class="breadcrumb-item "><span style="color: black; margin-right: 3px;"><i
                            class="fa fa-home"></i></span>Dashboard</li>

                <li class="breadcrumb-item"><a href="blog-posts.html" style="color: black; margin-right: 3px;">Ecommerce</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.ecommerce.discounts') }}"
                        style="color: black; margin-right: 3px;">Discount</a></li>
                <li class="breadcrumb-item active">Create Discount</li>
            </ol>



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




            <div id="main">
                {{-- <form method="POST" action="{{ route('admin.ecommerce.save_discounts') }}" enctype="multipart/form-data"> --}}
                {{-- <input name="_token" type="hidden" value="RxnfRuRWTt7jb3DUVWBxGhDOC7G8jamTQBoIAcW5"> --}}
                <div id="main-discount">
                    <div class="max-width-1200">
                        <div class="flexbox-grid no-pd-none">
                            <div class="flexbox-content">
                                <div class="wrapper-content">
                                    <div class="pd-all-20 ws-nm">
                                        <label class="title-product-main text-no-bold"><span>Create coupon
                                                code</span></label>
                                        <a class="btn-change-link float-end" style="cursor: pointer;"
                                            onclick="generateCoupon()">Generate coupon code</a>
                                        <div class="form-group mt15 mb0">
                                            <input type="text" id="coupon-input" name="code"
                                                class="next-input coupon-code-input" style="">
                                            <input type="text" name="title" placeholder="Enter promotion name"
                                                class="next-input" style="display: none;">
                                            <p class="type-subdued mt5 mb0">
                                                Customers will enter this coupon code when they checkout.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="pd-all-20 border-top-color">
                                        <label class="title-product-main text-no-bold block-display">Select type of
                                            discount</label>
                                        <div class="ui-select-wrapper width-200-px-rsp-768 mt15">
                                            <select id="select-promotion" name="discount_type" class="ui-select"
                                                aria-invalid="false">
                                                <option value="coupon">Coupon code</option>
                                                <option value="promotion">Promotion</option>
                                            </select>
                                            <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                                </svg></svg>
                                        </div>
                                        <div class="form-group mt15 mb0" style="">
                                            <label class="next-label">
                                                <input type="checkbox" value="1" name="can_use_with_promotion"
                                                    class="hrv-checkbox">
                                                <span class="pre-line">Can be used with promotion</span>
                                            </label>
                                        </div>
                                        <div class="form-group mb0 mt15" style="">
                                            <label><input type="checkbox" name="is_unlimited" value="1"
                                                    class="hrv-checkbox" checked>Unlimited coupon</label>
                                        </div>
                                        <div class="form-group mb0 mt15" style="display: none;">
                                            <label class="text-title-field">Enter number</label>
                                            <div class="limit-input-group">
                                                <input type="text" name="quantity" autocomplete="off"
                                                    class="form-control pl5 p-r5" disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pd-all-20 border-top-color"><label
                                            class="title-product-main text-no-bold block-display">Coupon
                                            type</label>
                                        <div class="form-inline form-group discount-input mt15 mb0 ws-nm">
                                            <div class="ui-select-wrapper inline_block mb5" style="min-width: 200px;">
                                                <select id="discount-type-option" name="type_option" class="ui-select"
                                                    aria-invalid="false" aria-describedby="discount-type-option-error">
                                                    <option value="amount">₹</option>
                                                    <option value="percentage">Percentage discount
                                                        (%)</option>
                                                    <option value="shipping">Free shipping
                                                    </option>
                                                    <option value="same-price">Same price</option>
                                                </select><span id="discount-type-option-error" class="invalid-feedback"
                                                    style="display: inline;"></span> <svg
                                                    class="svg-next-icon svg-next-icon-size-16"><svg
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                        </path>
                                                    </svg></svg>
                                            </div> <span class="lb-dis"><span>Discount</span></span>
                                            <div class="inline width20-rsp-768 mb5">
                                                <div class="next-input--stylized"><input type="text" name="value"
                                                        autocomplete="off" placeholder="0"
                                                        class="next-input next-input--invisible">
                                                    <span class="next-input-add-on next-input__add-on--after">₹</span>
                                                </div>
                                            </div> <span class="lb-dis"> apply for</span>
                                            <div class="inline width20-rsp-768 mb5">
                                                <div class="ui-select-wrapper inline_block mb5 min-width-150-px"
                                                    style="margin-right: 10px;"><select id="select-offers" name="target"
                                                        class="ui-select" aria-invalid="false"
                                                        aria-describedby="select-offers-error">
                                                        <option value="all-orders">
                                                            All orders
                                                        </option>
                                                        <option value="amount-minimum-order">
                                                            Order amount from
                                                        </option>
                                                        <option value="group-products">Product
                                                            collection</option>
                                                        <option value="specific-product">Product
                                                        </option>
                                                        <option value="customer">
                                                            Customer
                                                        </option>
                                                        <option value="product-variant">Variant
                                                        </option>
                                                        <option value="once-per-customer">
                                                            Once per customer
                                                        </option>
                                                    </select><span id="select-offers-error" class="invalid-feedback"
                                                        style="display: inline;"></span> <svg
                                                        class="svg-next-icon svg-next-icon-size-16"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                            </path>
                                                        </svg></svg></div> <!----> <!----> <!---->
                                                <!----> <!----> <!---->
                                            </div>
                                            <div style="margin: 10px 0px; display: none;"><span class="lb-dis"> Number
                                                    of products required to
                                                    apply: </span> <input type="text" name="product_quantity"
                                                    id="product-quantity" class="form-control width-100-px p-none-r">
                                            </div>
                                        </div> <!----> <!----> <!---->
                                    </div>
                                </div>
                            </div>
                            <div class="flexbox-content flexbox-right">
                                <div class="wrapper-content">
                                    <div class="pd-all-20">
                                        <label class="title-product-main text-no-bold">Time</label>
                                    </div>
                                    <div class="pd-all-10-20 form-group mb0 date-time-group martpt-15">
                                        <label class="text-title-field">Start date</label>
                                        <div class="next-field__connected-wrapper z-index-9 d-flex">
                                            <div class="input-group datepicker">
                                                <input type="date" placeholder="Y-m-d" data-date-format="Y-m-d"
                                                    name="start_date" data-input=""
                                                    class="next-field--connected next-input flatpickr-input"
                                                    style="min-width: 0px;">
                                            </div>
                                            {{-- <label class="text-title-field mt-2">Start Time</label> --}}
                                            <div class="input-group">
                                                <input type="time" placeholder="hh:mm" name="start_time"
                                                    class="next-field--connected next-input z-index-9 time-picker timepicker timepicker-24"
                                                    style="min-width: 0px;">
                                                {{-- <span class="input-group-prepend"><button type="button"
                                                            class="btn default"><i
                                                                class="fa fa-clock"></i></button></span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pd-all-10-20 form-group mb0 date-time-group martpt-15">
                                        <label class="text-title-field">End date</label>
                                        <div class="next-field__connected-wrapper z-index-9 d-flex">
                                            <div class="input-group datepicker">
                                                <input type="date" placeholder="Y-m-d" data-date-format="Y-m-d"
                                                    name="end_date" data-input=""
                                                    class="next-field--connected next-input flatpickr-input"
                                                    style="min-width: 0px;">
                                            </div>
                                            {{-- <label class="text-title-field mt-2">End Time</label> --}}
                                            <div class="input-group">
                                                <input type="time" placeholder="hh:mm" name="end_time"
                                                    class="next-field--connected next-input z-index-9 time-picker timepicker timepicker-24"
                                                    style="min-width: 0px;">
                                                {{-- <span class="input-group-prepend"><button type="button"
                                                            class="btn default"><i
                                                                class="fa fa-clock"></i></button></span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pd-all-10-20 martpt-15">
                                        <label class="next-label disable-input-date-discount">
                                            <input type="checkbox" name="unlimited_time" value="1"
                                                class="hrv-checkbox">Never expired
                                        </label>
                                    </div>
                                </div>

                                <br>
                                <div class="wrapper-content">
                                    <div class="pd-all-20"><button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    {{-- coupon code generate script --}}
    <script>
        function generateCoupon() {
            // Define all possible characters for the coupon code
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const length = 10; // Length of the coupon code

            let couponCode = '';
            // Generate random characters to form the coupon code
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                couponCode += characters.charAt(randomIndex);
            }

            // Set the generated coupon code to the input field
            document.getElementById('coupon-input').value = couponCode;
        }
    </script>



    {{-- End date selection script --}}
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const neverExpiredCheckbox = document.querySelector('input[name="unlimited_time"]');
            const endDateInput = document.querySelector('input[name="end_date"]');
            const endTimeInput = document.querySelector('input[name="end_time"]');

            // Function to handle checkbox change event
            neverExpiredCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    endDateInput.disabled = true;
                    endTimeInput.disabled = true;
                } else {
                    endDateInput.disabled = false;
                    endTimeInput.disabled = false;
                }
            });

            // Trigger the change event initially to set the initial state
            neverExpiredCheckbox.dispatchEvent(new Event('change'));
        });
    </script>




    {{-- number of coupon  --}}
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const unlimitedCouponCheckbox = document.querySelector('input[name="is_unlimited"]');
            const enterNumberField = document.querySelector('.form-group[style="display: none;"]');

            // Function to handle checkbox change event
            unlimitedCouponCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    enterNumberField.style.display = 'none';
                    enterNumberField.querySelector('input[name="quantity"]').disabled = true;
                } else {
                    enterNumberField.style.display = 'block';
                    enterNumberField.querySelector('input[name="quantity"]').disabled = false;
                }
            });

            // Trigger the change event initially to set the initial state
            unlimitedCouponCheckbox.dispatchEvent(new Event('change'));
        });
    </script>
@endsection
