@extends('front.layout.app')

@section('content')
    <main>

        <section class="Return-policy">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="loca">
                            <h6>HOME > <span>RETURN POLICY</span></h6>
                        </div>
                        <div class="return">
                            <div class="Return-Warranty-head">
                                <h1>{{ $pages->name }}</h1>
                            </div>
                            <div class="Return-Warranty-inner">
                                <p>
                                    {!! $page_info->info !!}
                                </p>
                            </div>
                        </div>
                        {{-- <div class="Terms">
                            <div class="Terms-head">
                                <h5>Terms & Conditions</h5>
                            </div>
                            <div class="Terms-inner">
                                <p>All Returns/Refunds related to damage/defect/Qty issue/description mismatch are
                                    eligible
                                    for return but within 15 Days from Delivery. Make Sure you Inform us via Email or
                                    Whatsapp first. <br>
                                    <span>The product should be one time tried and not be used on regular basis.</span>
                                    <br>
                                    All Replacement/Refunds will be processed only after the product is received back to
                                    us
                                    in our warehouse and the quality check is cleared. <br>
                                    Any product returned that shows improper use, improper handling, or physical damage;
                                    damaged/torn out the box, missing manuals, parts, and accessories will not be
                                    Replaced/Refunded and will be returned back to the buyer without rendering a reason.
                                </p>
                                <p class="note">Note:- Carzex team has the right to accept or reject the return request
                                    on
                                    case to case
                                    basis depending upon the supporting information shared by the customer.
                                </p>
                            </div>
                        </div>
                        <div class="Return">
                            <div class="Return-head">
                                <h5>Return Procedure</h5>
                            </div>
                            <div class="return-inner">
                                <p><span class="note">For all returns, You can reach us by Call: at +91-9711393973
                                        (Mon-Sat
                                        11 AM – 7 PM)
                                        or Email at: returns@carzex.com</span> <br>Providing a specific valid reason for
                                    your
                                    return. Include a copy of the original invoice in the package. <br>
                                    You will have to send the package back to us Via India Post Parcel Service. The
                                    amount
                                    paid for Return Package will be refunded to you along with the order amount. <br>If
                                    you
                                    choose to return the package through any other source of Courier Delivery, You will
                                    have
                                    to bear the charges for the return package, the amount will not be paid.
                                </p>
                            </div>
                        </div>
                        <div class="Warranty">
                            <div class="Warranty-head">
                                <h5>Warranty Procedure</h5>
                            </div>
                            <div class="Warranty-inner">
                                <p>Claims for defective merchandise must be made within the SPECIFIED WARRANTY PERIOD
                                    from
                                    invoice date only. Claims for missing parts must be made within 15 calendar days
                                    after
                                    the merchandise is received. <br>For any claim for defective merchandise, returns
                                    must
                                    be packed in proper packaging. <br>We reserve the right to specify that items be
                                    returned to the original warehouse for inspection. The Customer will have to send
                                    the
                                    defective merchandise at his own expense and will have to take responsibility till
                                    the
                                    delivery of merchandise in our warehouse. <br>Pictures are required to claim
                                    defective
                                    merchandise, along with a copy of the original invoice
                                    If the claim is justified, the item(s) or part(s) will be repaired or replaced or a
                                    credit will be issued. It is our policy to replace parts whenever possible.
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
