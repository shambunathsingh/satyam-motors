@extends('front.layout.app')

@section('content')
    <main>

        <section class="Shipping">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="loca">
                            <h6>HOME > <span>{{ $pages->name }}</span></h6>
                        </div>
                        <div class="shipping-policy">
                            <h2>
                                <h1>{{ $pages->name }}</h1>
                            </h2>
                            <p>
                                {!! $page_info->info !!}
                            </p>
                        </div>
                        {{-- <div class="policy">
                            <ul>
                                <li>The delivery time frame mentioned in product details is estimated. Actual delivery time
                                    depends upon availability, the address where the order needs to be delivered and courier
                                    issues, and other circumstances that might affect delivery. You can rest assured that
                                    you are completely protected as a shopper at <span>carzex.com</span>
                                </li>
                                <li>Each order would be shipped only to a single destination address specified at the time
                                    of payment for that order. If you wish to ship products to different addresses, you
                                    shall need to place multiple orders.
                                </li>
                            </ul>
                            <p>This policy has been drafted for a better understanding of the shipping terms and conditions
                                for the customers.
                            </p>
                            <p>All orders are processed within business days – Monday to Saturday (excluding weekends and
                                holidays) after receiving your order confirmation email. You will receive another
                                notification when your order has shipped with the details of the carrier and tracking
                                number.
                            </p>


                            <p><span class="underline">Domestic Shipping:</span></p>
                            <p>WE OFFER FREE SHIPPING ANYWHERE IN INDIA Please allow 24-72 hrs for your order to be
                                dispatched. Normally orders placed before 1 pm on a business day, we aim to ship the same
                                day, providing card security checks are complete, the payment is received and stock
                                availability is confirmed. Orders placed after 1 pm will be shipped the next business day.
                                Orders Received on Sunday or during Holidays are dispatched the following Monday or the next
                                working day. During busy times, such as holiday periods, there can be processing and
                                shipping delays.
                            </p>


                            <p><span class="underline">Delivery Duration</span></p>
                            <p>Once the order gets dispatched from our hub, It takes 7 – 10 working days to reach your
                                destination.
                            </p>


                            <p><span class="underline">International Shipping</span></p>
                            <p>We do not offer International Shipping.</p>


                            <p><span class="underline">How to check the status of the order</span></p>
                            <p>When your order has shipped, you will receive an email notification from us which will
                                include a tracking number that you can use to check its status.
                            </p>
                            <p>If you haven’t received your order within 7-10 days of receiving your shipping confirmation
                                email, please contact us at carrzex@yahoo.com with your name and order number, and we will
                                look into it for you.
                            </p>


                            <p><span class="underline">Shipping Serviceability</span></p>
                            <p>We ship to more than 18-Thousand pin codes by working with multiple reliable shipping
                                partners and we keep adding to the list in an endeavor to provide our services to the
                                maximum areas of India. The serviceability of your PIN Code can be checked on the product
                                detail page
                            </p>


                            <p><span class="underline">Refunds, returns, and exchanges</span></p>
                            <p>We have a strict no-cash return policy. We try that you receive the right product in safe
                                packaging. However, if we fail to deliver our promise, we will exchange the wrong/defective
                                products as per the clauses of the return policy.
                            </p>
                            <p>In the event we have to cancel any items in your order, if you have paid using a credit card,
                                your credit card shall not be charged for the above-canceled item(s). If you have paid using
                                a debit card/net banking, your bank shall be instructed to refund the amount within 3
                                working days. However, the actual credit to your account will depend on your bank’s
                                processing time, which may be 7-15 days. If you do not receive a credit within this time,
                                please check with your bank and let us know if you face any issues with the same.
                            </p>


                            <p><span class="underline">Force Majeure</span></p>
                            <p>
                                We ensure while onboarding a shipping partner that it follows the best shipping practices
                                and has the highest level of commitment to delivering the order. However, during unforeseen
                                circumstances, the order may be held/undelivered and will be attempted later as the
                                situation may permit; the same is listed but not limited to the list below
                            </p>
                            <ul>
                                <li>Natural Calamity – Floods, earthquakes, etc</li>
                                <li>Transport Strike – Rail/Road/Air-Travel Strike</li>
                                <li>Legal Restrictions – Curfew, Emergency Etc</li>
                                <li>Epidemic /Pandemic – Mass medical breakout</li>
                                <li>Information System Breakdown – Cyber Attack, Internet outage, etc</li>
                            </ul>


                            <p><span class="underline">Changes to the terms of the Shipping Policy</span></p>
                            <p> You can review the most current version of the Shipping Policy at any time on this page.</p>
                            <p>Carzex.com reserves the right, at our sole discretion, to update, change or replace any part
                                of these Terms of this policy by posting updates and changes to our website. It is your
                                responsibility to check our website periodically for changes. Your continued use of or
                                access to our website or the Service following the posting of any changes to this policy
                                constitutes acceptance of those changes.
                            </p>


                            <p><span class="underline">Customer Support:</span></p>
                            <p>If you have any questions or concerns about your shipment, our dedicated customer support
                                team is here to assist you. Feel free to contact us via <span>carrzex@yahoo.com</span>, and
                                we’ll be happy to help.
                            </p>
                            <div class="italic">
                                <p>Thank you for choosing Carzex for your automotive needs. We look forward to delivering a
                                    top-notch shopping experience from our website to your doorstep.
                                </p>
                            </div>
                        </div> --}}
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
