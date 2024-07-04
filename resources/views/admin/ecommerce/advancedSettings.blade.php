@extends('admin.layout.app')

@section('content')
<style>
    .preview-image {
        width: 100%;
        max-width: 150px;
        height: auto;
        margin-bottom: 10px;
    }
</style>
<form action="" method="post" enctype="multipart/form-data">
    @csrf

    <div class="main-panel">
        <div class="pagesbodyarea">
            <div class="pageinfo">
                <ul class="d-flex">
                    <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="fa-solid fa-house">
                            </i>
                            Dashboard
                            /</a>
                    </li>
                    <li><a class="breadcrumb-item">Ecommerce
                            /</a>
                    </li>
                    <li><a href="{{ route('admin.ecommerce.settings') }}" class="breadcrumb-item">Settings
                            /</a>
                    </li>
                    <li><a class="breadcrumb-item">Basic settings</a>
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


            <!-- todo edit main body ara -->

            <div class="row">
                <div class="col-4">
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <h2 class="fs-4" style="font-size: 16px;">Advanced settings</h2>
                        <p class="color-note">Settings for cart, review...</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="custom p-4">
                        <div class="tab-content">
                            <div class="wrapper-content pd-all-20">

                                <div class="form-group">
                                    <label>Enable shopping cart?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="shoppingCart"
                                            id="shoppingCartYes" value="yes">
                                        <label class="form-check-label" for="shoppingCartYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="shoppingCart"
                                            id="shoppingCartNo" value="no" checked>
                                        <label class="form-check-label" for="shoppingCartNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable wishlist?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wishlist" id="wishlistYes"
                                            value="yes">
                                        <label class="form-check-label" for="wishlistYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wishlist" id="wishlistNo"
                                            value="no" checked>
                                        <label class="form-check-label" for="wishlistNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable compare?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="compare" id="compareYes"
                                            value="yes">
                                        <label class="form-check-label" for="compareYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="compare" id="compareNo"
                                            value="no" checked>
                                        <label class="form-check-label" for="compareNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable tax?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tax" id="taxYes" value="yes">
                                        <label class="form-check-label" for="taxYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tax" id="taxNo" value="no"
                                            checked>
                                        <label class="form-check-label" for="taxNo">No</label>
                                    </div>
                                    <div
                                        class="review-settings-container mb-4 border rounded-top rounded-bottom p-3 bg-light">

                                        <div class="form-group mt-2">
                                            <label for="taxRate">Default tax rate</label>
                                            <select class="form-control" id="taxRate">
                                                <option value="0" selected>Select tax rate</option>
                                                <option value="1">VAT</option>
                                                <option value="2">None</option>
                                                <option value="3">Import Tax</option>
                                            </select>
                                        </div>
                                        <label>Display product price including taxes?</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="displayTax"
                                                id="displayTaxYes" value="yes">
                                            <label class="form-check-label" for="displayTaxYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="displayTax"
                                                id="displayTaxNo" value="no" checked>
                                            <label class="form-check-label" for="displayTaxNo">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable order tracking?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="orderTracking"
                                            id="orderTrackingYes" value="yes">
                                        <label class="form-check-label" for="orderTrackingYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="orderTracking"
                                            id="orderTrackingNo" value="no" checked>
                                        <label class="form-check-label" for="orderTrackingNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Auto confirm order?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="autoConfirmOrder"
                                            id="autoConfirmOrderYes" value="yes">
                                        <label class="form-check-label" for="autoConfirmOrderYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="autoConfirmOrder"
                                            id="autoConfirmOrderNo" value="no" checked>
                                        <label class="form-check-label" for="autoConfirmOrderNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable review?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="review" id="reviewYes"
                                            value="yes">
                                        <label class="form-check-label" for="reviewYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="review" id="reviewNo"
                                            value="no" checked>
                                        <label class="form-check-label" for="reviewNo">No</label>
                                    </div>
                                    <div
                                        class="review-settings-container mb-4 border rounded-top rounded-bottom p-3 bg-light">
                                        <div class="form-group mt-2">
                                            <label for="reviewMaxFileSize">Review max file size (MB)</label>
                                            <input type="number" class="form-control" id="reviewMaxFileSize" value="2">
                                        </div>
                                        <div class="form-group">
                                            <label for="reviewMaxFileNumber">Review max file number</label>
                                            <input type="number" class="form-control" id="reviewMaxFileNumber"
                                                value="6">
                                        </div>
                                        <label>Only customers who have purchased the product can review the
                                            product?</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="purchaseReview"
                                                id="purchaseReviewYes" value="yes">
                                            <label class="form-check-label" for="purchaseReviewYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="purchaseReview"
                                                id="purchaseReviewNo" value="no" checked>
                                            <label class="form-check-label" for="purchaseReviewNo">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable quick buy button?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="quickBuy" id="quickBuyYes"
                                            value="yes">
                                        <label class="form-check-label" for="quickBuyYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="quickBuy" id="quickBuyNo"
                                            value="no" checked>
                                        <label class="form-check-label" for="quickBuyNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Quick buy target page?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="quickBuyTarget"
                                            id="quickBuyTargetCheckout" value="checkout">
                                        <label class="form-check-label" for="quickBuyTargetCheckout">Checkout
                                            page</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="quickBuyTarget"
                                            id="quickBuyTargetCart" value="cart" checked>
                                        <label class="form-check-label" for="quickBuyTargetCart">Cart page</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable Zip Code?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="zipCode" id="zipCodeYes"
                                            value="yes">
                                        <label class="form-check-label" for="zipCodeYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="zipCode" id="zipCodeNo"
                                            value="no" checked>
                                        <label class="form-check-label" for="zipCodeNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable billing address?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="billingAddress"
                                            id="billingAddressYes" value="yes">
                                        <label class="form-check-label" for="billingAddressYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="billingAddress"
                                            id="billingAddressNo" value="no" checked>
                                        <label class="form-check-label" for="billingAddressNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Verify customer's email?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="verifyEmail"
                                            id="verifyEmailYes" value="yes">
                                        <label class="form-check-label" for="verifyEmailYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="verifyEmail"
                                            id="verifyEmailNo" value="no" checked>
                                        <label class="form-check-label" for="verifyEmailNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable Recaptcha in the registration page?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="recaptcha" id="recaptchaYes"
                                            value="yes">
                                        <label class="form-check-label" for="recaptchaYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="recaptcha" id="recaptchaNo"
                                            value="no" checked>
                                        <label class="form-check-label" for="recaptchaNo">No</label>
                                    </div>
                                    <div class="help-ts">
                                        <i class="fa fa-info-circle"></i>
                                        <span>Need to setup Captcha in Admin -&gt; Settings -&gt; General first.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable Math captcha in the registration page?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mathCaptcha"
                                            id="mathCaptchaYes" value="yes">
                                        <label class="form-check-label" for="mathCaptchaYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mathCaptcha"
                                            id="mathCaptchaNo" value="no" checked>
                                        <label class="form-check-label" for="mathCaptchaNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable guest checkout?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="guestCheckout"
                                            id="guestCheckoutYes" value="yes">
                                        <label class="form-check-label" for="guestCheckoutYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="guestCheckout"
                                            id="guestCheckoutNo" value="no" checked>
                                        <label class="form-check-label" for="guestCheckoutNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>How to display product variation images?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="variationImages"
                                            id="variationImagesOnly" value="only">
                                        <label class="form-check-label" for="variationImagesOnly">Only variation
                                            images</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="variationImages"
                                            id="variationImagesBoth" value="both" checked>
                                        <label class="form-check-label" for="variationImagesBoth">Variation images +
                                            main product
                                            images</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Show number of products in the product single</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="showProductNumber"
                                            id="showProductNumberYes" value="yes">
                                        <label class="form-check-label" for="showProductNumberYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="showProductNumber"
                                            id="showProductNumberNo" value="no" checked>
                                        <label class="form-check-label" for="showProductNumberNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Show out of stock products?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="showOutOfStock"
                                            id="showOutOfStockYes" value="yes">
                                        <label class="form-check-label" for="showOutOfStockYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="showOutOfStock"
                                            id="showOutOfStockNo" value="no" checked>
                                        <label class="form-check-label" for="showOutOfStockNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="minOrderAmount">Minimum order amount to place an order (INR)</label>
                                    <input type="number" class="form-control" id="minOrderAmount" value="0">
                                </div>
                                <div class="form-group">
                                    <label>Make phone field at the checkout optional?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="phoneOptional"
                                            id="phoneOptionalYes" value="yes">
                                        <label class="form-check-label" for="phoneOptionalYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="phoneOptional"
                                            id="phoneOptionalNo" value="no" checked>
                                        <label class="form-check-label" for="phoneOptionalNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Available countries</label><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="allCountries" value="all"
                                            checked>
                                        <label class="form-check-label" for="allCountries">All</label>
                                    </div>
                                    <!-- Add checkboxes for each country -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="afghanistan"
                                            value="afghanistan" checked>
                                        <label class="form-check-label" for="afghanistan">Afghanistan</label>
                                    </div>
                                    <!-- Continue for each country... -->
                                </div>
                                <div class="form-group">
                                    <label>Load countries, states, cities from plugin location?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="loadLocations"
                                            id="loadLocationsYes" value="yes">
                                        <label class="form-check-label" for="loadLocationsYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="loadLocations"
                                            id="loadLocationsNo" value="no" checked>
                                        <label class="form-check-label" for="loadLocationsNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable customer recently viewed products?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="recentlyViewed"
                                            id="recentlyViewedYes" value="yes">
                                        <label class="form-check-label" for="recentlyViewedYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="recentlyViewed"
                                            id="recentlyViewedNo" value="no" checked>
                                        <label class="form-check-label" for="recentlyViewedNo">No</label>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="maxRecentlyViewed">Maximum number of customer recently viewed
                                            products</label>
                                        <input type="number" class="form-control" id="maxRecentlyViewed" value="24">
                                    </div>
                                    <div class="help-ts">
                                        <i class="fa fa-info-circle"></i>
                                        <span>If you set 0, it will save all products.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <h2 class="fs-4" style="font-size: 16px;">Shipping</h2>
                        <p class="color-note">Settings for shipping</p>
                    </div>
                </div>


                <div class="col-md-8">
                    <div class="custom p-4">
                        <div class="tab-content">
                            <div class="wrapper-content pd-all-20">
                                <div class="form-group mb-3">
                                    <label class="text-title-field"
                                        for="hide_other_shipping_options_if_it_has_free_shipping">Hide other shipping
                                        options if it has free shipping in the list?</label>
                                    <label class="me-2">
                                        <input type="radio" name="hide_other_shipping_options_if_it_has_free_shipping"
                                            value="1">Yes
                                    </label>
                                    <label class="">
                                        <input type="radio" name="hide_other_shipping_options_if_it_has_free_shipping"
                                            value="0" checked="">No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-4">
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <h2 class="fs-4">Company settings</h2>
                        <p class="color-note">Settings Company information for invoicing</p>
                    </div>
                </div>
                <div class="col-8">
                    <div class="custom p-4">
                        <div class="tab-content">
                            <div class="wrapper-content pd-all-20">
                                <div class="form-group mb-3">
                                    <label for="company_name">Company name</label>
                                    <input type="text" class="form-control" id="company_name" value="Nest">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="company_address">Company address</label>
                                    <input type="text" class="form-control" id="company_address"
                                        value="North Link Building, 10 Admiralty Street, Singapore, Singapore, Singapore">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="company_email">Company email</label>
                                    <input type="email" class="form-control" id="company_email">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="company_phone">Company phone</label>
                                    <input type="tel" class="form-control" id="company_phone" value="18006268">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="company_tax_id">Company tax ID</label>
                                    <input type="text" class="form-control" id="company_tax_id">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="company_logo">Company logo</label>
                                    <div class="mb-2">
                                        <img src="https://via.placeholder.com/150" alt="Preview image"
                                            class="preview-image" id="company_logo_preview">
                                    </div>
                                    <input type="file" class="form-control-file" id="company_logo">
                                    <small class="form-text text-muted">Choose image</small>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Using custom font for invoice?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="custom_font"
                                            id="custom_font_yes" value="yes">
                                        <label class="form-check-label" for="custom_font_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="custom_font"
                                            id="custom_font_no" value="no" checked>
                                        <label class="form-check-label" for="custom_font_no">No</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Support Arabic language in invoice?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="arabic_support"
                                            id="arabic_support_yes" value="yes">
                                        <label class="form-check-label" for="arabic_support_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="arabic_support"
                                            id="arabic_support_no" value="no" checked>
                                        <label class="form-check-label" for="arabic_support_no">No</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Enable invoice stamp?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="invoice_stamp"
                                            id="invoice_stamp_yes" value="yes" checked>
                                        <label class="form-check-label" for="invoice_stamp_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="invoice_stamp"
                                            id="invoice_stamp_no" value="no">
                                        <label class="form-check-label" for="invoice_stamp_no">No</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="invoice_prefix">Invoice code prefix</label>
                                    <input type="text" class="form-control" id="invoice_prefix" value="INV-">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Disable order invoice until order confirmed?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="disable_invoice"
                                            id="disable_invoice_yes" value="yes">
                                        <label class="form-check-label" for="disable_invoice_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="disable_invoice"
                                            id="disable_invoice_no" value="no" checked>
                                        <label class="form-check-label" for="disable_invoice_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-4">
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <h2 class="fs-4">Search products</h2>

                        <p class="color-note">Config rules to search products</p>
                    </div>
                </div>
                <div class="col-8">
                    <div class="custom p-4">
                        <div class="tab-content">
                            <div class="flexbox-annotated-section-content">
                                <div class="wrapper-content pd-all-20">
                                    <div class="form-group">
                                        <label>Search for an exact phrase?</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exact_phrase"
                                                id="exact_phrase_yes" value="yes">
                                            <label class="form-check-label" for="exact_phrase_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exact_phrase"
                                                id="exact_phrase_no" value="no" checked>
                                            <label class="form-check-label" for="exact_phrase_no">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Search products by:</label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="search_name"
                                                value="name" checked>
                                            <label class="form-check-label" for="search_name">Name</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="search_sku" value="sku"
                                                checked>
                                            <label class="form-check-label" for="search_sku">SKU</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="search_variation_sku"
                                                value="variation_sku" checked>
                                            <label class="form-check-label" for="search_variation_sku">Variation
                                                SKU</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="search_description"
                                                value="description" checked>
                                            <label class="form-check-label" for="search_description">Description</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="search_brand"
                                                value="brand" checked>
                                            <label class="form-check-label" for="search_brand">Brand</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="search_tags"
                                                value="tags" checked>
                                            <label class="form-check-label" for="search_tags">Tags</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <h2 class="fs-4">Webhook</h2>

                        <p class="color-note">end webhook when order placed.</p>
                    </div>
                </div>
                <div class="col-8">
                    <div class="custom p-4">
                        <div class="tab-content">
                            <div class="flexbox-annotated-section-content">
                                <div class="wrapper-content pd-all-20">
                                   <div class="form-group mb-3">
                                        <label for="order_placed_webhook_url" class="text-title-field">Order placed webhook URL (method: POST)</label>
                                        <input type="text" class="next-input" name="order_placed_webhook_url" id="order_placed_webhook_url" value=""
                                             placeholder="https://..." spellcheck="false" data-ms-editor="true">
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <h2 class="fs-4">Return Request</h2>

                        <p class="color-note">Number of days a customer can request a return after the order is completed.</p>
                    </div>
                </div>
                <div class="col-8">
                    <div class="custom p-4">
                        <div class="tab-content">
                            <div class="flexbox-annotated-section-content">
                               <div class="wrapper-content pd-all-20">
                                   <div class="form-group mb-3">
                                        <label class="text-title-field" for="is_enabled_order_return">Is enabled order return?</label>
                                        <label class="me-2">
                                             <input type="radio" name="is_enabled_order_return" value="1" checked="" class="trigger-input-option"
                                                  data-setting-container=".order-returns-settings-container">Yes
                                        </label>
                                        <label class="">
                                             <input type="radio" name="is_enabled_order_return" value="0" class="trigger-input-option"
                                                  data-setting-container=".order-returns-settings-container">No
                                        </label>
                                   </div>

                                   <div class="order-returns-settings-container mb-4 border rounded-top rounded-bottom p-3 bg-light">
                                        <div class="form-group mb-3">
                                             <label class="text-title-field" for="can_custom_return_product_quantity">Allow partial return?</label>
                                             <label class="me-2">
                                                  <input type="radio" name="can_custom_return_product_quantity" value="1"
                                                       helper-text="Customer can return a few products, do not need to return all products in an order.">Yes
                                             </label>
                                             <label class="">
                                                  <input type="radio" name="can_custom_return_product_quantity" value="0" checked=""
                                                       helper-text="Customer can return a few products, do not need to return all products in an order.">No
                                             </label>

                                             <div class="help-ts">
                                                  <i class="fa fa-info-circle"></i>
                                                  <span>Customer can return a few products, do not need to return all products in an order.</span>
                                             </div>
                                        </div>

                                        <div class="form-group mb-3">
                                             <label for="returnable_days" class="text-title-field">Refundable days</label>
                                             <input type="number" class="next-input" name="returnable_days" id="returnable_days" min="0" value=""
                                                  placeholder="Refundable days">
                                        </div>
                                   </div>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="annotated-section-description pd-all-20 p-none-t">
                        <h2 class="fs-4">Digital product</h2>
                    </div>
                </div>
                <div class="col-8">
                    <div class="custom p-4">
                        <div class="tab-content">
                            <div class="flexbox-annotated-section-content">
                               <div class="wrapper-content pd-all-20">
                                   <div class="form-group mb-3">
                                        <label class="text-title-field" for="is_enabled_support_digital_products">Is enabled to support the digital
                                             products?</label>
                                        <label class="me-2">
                                             <input type="radio" name="is_enabled_support_digital_products" value="1" checked=""
                                                  class="trigger-input-option" data-setting-container=".digital-products-settings-container">Yes
                                        </label>
                                        <label class="">
                                             <input type="radio" name="is_enabled_support_digital_products" value="0" class="trigger-input-option"
                                                  data-setting-container=".digital-products-settings-container">No
                                        </label>
                                   </div>

                                   <div class="digital-products-settings-container mb-4 border rounded-top rounded-bottom p-3 bg-light">
                                        <div class="form-group mb-3">
                                             <label class="text-title-field" for="allow_guest_checkout_for_digital_products">Allow guest checkout for
                                                  digital products?</label>
                                             <label class="me-2">
                                                  <input type="radio" name="allow_guest_checkout_for_digital_products" value="1">Yes
                                             </label>
                                             <label class="">
                                                  <input type="radio" name="allow_guest_checkout_for_digital_products" value="0" checked="">No
                                             </label>
                                        </div>
                                   </div>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-4">
                </div>
                <div class="col-8">
                    <button class="btn btn-info" type="submit">Save settings</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Script to handle image preview
    document.getElementById('company_logo').addEventListener('change', function (event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('company_logo_preview');
            preview.src = URL.createObjectURL(file);
        }
    });
</script>
@endsection