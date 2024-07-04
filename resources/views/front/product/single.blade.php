@extends('front.layout.app')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <main class="snglcver">


        <!-- todo single product area -->

        <section>
            <div class="container-xxl singlpdimgarea mt-5">
                <div class="row flex">
                    <div class="col-md-4">
                        <div class="snglpzmimg">
                            <div class="xzoom-container">
                                <a data-fancybox-trigger="gallery" href="javascript:;">
                                    <img class="xzoom" id="xzoom-default"
                                        src="{{ asset('uploads/' . $product->featured_image) }}"
                                        xoriginal="{{ asset('uploads/' . $product->featured_image) }}"
                                        title="{{ $product->name }}" />
                                </a>

                                <div class="xzoom-thumbs">
                                    @foreach ($productImages as $pimage)
                                        <a class="popup" data-fancybox="gallery"
                                            href="{{ asset('uploads/' . $pimage->images) }}"><img class="xzoom-gallery"
                                                src="{{ asset('uploads/' . $pimage->images) }}" title="{{ $product->name }}"
                                                width="80" /></a>
                                    @endforeach
                                    {{-- <a class="popup" data-fancybox="gallery" href="/assets/img/blog/blog-big3.jpg"><img
                                            class="xzoom-gallery" src="/assets/img/blog/blog-big3.jpg"
                                            xpreview="/assets/img/blog/blog-big3.jpg" title="Product 2 is awesome"
                                            width="80" /></a>

                                    <a class="popup" data-fancybox="gallery" href="/assets/img/blog/blog-big4.jpg"><img
                                            class="xzoom-gallery" src="/assets/img/blog/blog-big4.jpg"
                                            title="Product 3 is awesome" width="80" /></a>
                                    <a class="popup" data-fancybox="gallery" href="/assets/img/blog/blog-big1.jpg"><img
                                            class="xzoom-gallery" src="/assets/img/blog/blog-big1.jpg"
                                            title="Product 4 is awesome" width="80" /></a>
                                    <a class="popup" data-fancybox="gallery" href="/assets/img/blog/blog-big3.jpg"><img
                                            class="xzoom-gallery" src="/assets/img/blog/blog-big3.jpg"
                                            xpreview="/assets/img/blog/blog-big3.jpg" title="Product 2 is awesome"
                                            width="80" /></a>
                                    <a class="popup" data-fancybox="gallery" href="/assets/img/blog/blog-big3.jpg"><img
                                            class="xzoom-gallery" src="/assets/img/blog/blog-big3.jpg"
                                            xpreview="/assets/img/blog/blog-big3.jpg" title="Product 2 is awesome"
                                            width="80" /></a> --}}
                                </div>
                                <div class="ppppp">
                                    <p><span>Disclaimer</span></p>
                                    <p class="lkp1">Product color may slightly change due to screen resolution of your
                                        computer
                                        or mobile*</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="snglproductdtls">
                            <div class="pdtls">
                                <div class="pnme">
                                    <a>
                                        {{ $product->name }}
                                    </a>
                                    <p><span style="color: #ee8e2d; font-size: 17px;">{{ $product->quantity }} left in
                                            stock</span></p>
                                    <p style="color: #2777d0; font-size: 17px; margin-top: -8px;">SKU: <span
                                            style="color: #2777d0; font-size: 17px; margin-top: -8px;">{{ $product->sku }}</span>
                                    </p>
                                    <hr>
                                    <div class="stara">
                                        <div class="str">
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                            <span><i class="fa-solid fa-star"></i></span>
                                        </div>
                                        <a href="#"> ( Be the first to review this product. )</a>
                                    </div>
                                    <hr>
                                    <div class="spprice">
                                        @php
                                            // Calculate the MRP with 30% increase
                                            $mrp = $product->sale_price * 1.3;
                                            // Calculate the savings
                                            $savings = $mrp - $product->sale_price;
                                        @endphp

                                        <p style="color: #2777d0; text-decoration: line-through; font-size: 17px;">
                                            MRP: ₹{{ number_format($mrp, 2) }}
                                        </p>
                                        <p style="color: #aa1900; font-weight: 700;">
                                            Price: ₹{{ number_format($product->sale_price, 2) }}
                                        </p>
                                        <p style="color: gray; font-size: 16px!important;">
                                            You Save: ₹{{ number_format($savings, 2) }} (30%)
                                        </p>

                                    </div>
                                    <hr>
                                    <div class="dvlryinstuction mb-2">
                                        <div class="row flex">
                                            <div class="col-md-3 col-sm-6 clkjhgf">
                                                <div class="dvnt">
                                                    <img src="/assets/img/s-product/icon-shipping-charges.png"
                                                        alt="">
                                                    <p>COD Not Available.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 clkjhgf">
                                                <div class="dvnt">
                                                    <img src="/assets/img/s-product/icon-shipping-days.png" alt="">
                                                    <p>Delivery within 4-7 working days.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 clkjhgf">
                                                <div class="dvnt">
                                                    <img src="/assets/img/s-product/icon-return.png" alt="">
                                                    <p>15 Day Return Period.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 clkjhgf">
                                                <div class="dvnt">
                                                    <img src="/assets/img/s-product/icon-warranty.png" alt="">
                                                    <p>No Warranty.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="prdrdc">
                                        <h5>Product Highlight</h5>
                                        {{-- <li>Key Features – Android system || Bluetooth|| Mirror Link|| Voice Calling via
                                            Bluetooth|| MosFet Output 54 watts x 4 || 7 inch HD Touch Screen (1024 x
                                            600) , 1080P High Definition FM Range 87.5MHZ-108.,Power Off With Auto
                                            Memory Store Function , Reverse Parking Input Function, Bass & Treble LSR
                                            Channel Stabilizer |</li>
                                        <li>2 GB RAM || 32GB ROM || 2 USB Port || Mirror link Supported (Androids/Apple)
                                            || Google Play Store, Youtube || Online & Offline Maps || Video Output ||
                                            Amplifier Support</li>
                                        <li>Our Premium Feature- It comes with IPS Display. This means you can enjoy the
                                            same display quality from any angle, Better Contrast, and Better Display.
                                            Gorilla Glass makes it scratch resistant</li>
                                        <li>Compatible For:- Universal Car || Screen Size:- 7 Inch HD || Storage: 16 GB
                                            ROM || Screen Type:- 1080×720 px Full HD Capacitive Touch</li> --}}
                                        {!! $product->post_excerpt !!}
                                    </div>

                                    <div class="pdshare">
                                        <p><span>Share:</span></p>
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                        <a href=""><i class="fa-brands fa-square-twitter"></i></a>
                                        <a href=""><i class="fa-brands fa-square-instagram"></i></a>
                                        <a href=""><i class="fa-brands fa-square-whatsapp"></i></a>
                                        <a href=""><i class="fa-regular fa-copy"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 etamobileoff">
                        <div class="crtsticky">
                            <div class="qnttyarea">
                                <span>Quantity:</span>
                                <div class="quantity">
                                    <a href="#" class="quantity__minus"><span>-</span></a>
                                    <input name="quantity" type="text" class="quantity__input" value="1">
                                    <a href="#" class="quantity__plus"><span>+</span></a>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('.quantity__minus').click(function(e) {
                                            e.preventDefault();
                                            var quantityInput = $(this).siblings('.quantity__input');
                                            var currentValue = parseInt(quantityInput.val());
                                            if (currentValue > 1) {
                                                quantityInput.val(currentValue - 1);
                                            }
                                        });

                                        $('.quantity__plus').click(function(e) {
                                            e.preventDefault();
                                            var quantityInput = $(this).siblings('.quantity__input');
                                            var currentValue = parseInt(quantityInput.val());
                                            quantityInput.val(currentValue + 1);
                                        });
                                    });
                                </script>
                            </div>
                            <div class="btnarea ">
                                <a href="{{ route('add_to_cart', ['id' => $product->id]) }}">
                                    <button class="btn btimary">Add to Cart</button></a>

                                <a href="{{ route('add_to_cart', ['id' => $product->id]) }}">
                                    <button class="btn btimary">Buy Now</button></a>
                                <button class="btn whlst" id="wishlist">Add to wishlist</button>
                                <input type="hidden" name="productid" id="productid" value="{{ $product->id }}">
                            </div>
                            <div class="chkdvlyavbl">
                                <div class="d-flex align-items-center">
                                    <span><i class="fa-solid fa-location-dot"></i></span>
                                    <input type="text" placeholder="Enter Pin Code">
                                </div>
                                <div class="btn btn-primary mt-1">Check</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--product info start-->
        <div class="product_d_info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist" id="nav-tab">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#info" role="tab"
                                            aria-controls="info" aria-selected="false">Description</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                            aria-selected="false">TECHNICAL SPECIFICATION</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#sheet1" role="tab" aria-controls="sheet"
                                            aria-selected="false">ADDITIONAL INFORMATION</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                            aria-selected="false">Reviews (1)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <p>{!! $product->description !!}</p>
                                        {{-- <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem,
                                            quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies
                                            massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero
                                            hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus
                                            nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus,
                                            consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in
                                            imperdiet ligula euismod eget.</p> --}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sheet" role="tabpanel">
                                    {{-- <div class="product_d_table">
                                        <form action="#">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="first_child">Compositions</td>
                                                        <td>Polyester</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Styles</td>
                                                        <td>Girly</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Properties</td>
                                                        <td>Short Dress</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div> --}}
                                    <div class="product_info_content">
                                        <p>
                                            {!! $product->content !!}
                                        </p>
                                        {{-- <p>
                                            Fashion has been creating well-designed collections since 2010. The brand
                                            offers feminine designs delivering stylish separates and statement dresses
                                            which have since evolved into a full ready-to-wear collection in which every
                                            item is a vital part of a woman's wardrobe. The result? Cool, easy, chic
                                            looks with youthful elegance and unmistakable signature style. All the
                                            beautiful pieces are made in Italy and manufactured with the greatest
                                            attention. Now Fashion extends to a range of accessories including shoes,
                                            hats, belts and more!
                                        </p> --}}
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="sheet1" role="tabpanel">
                                    <div class="product_d_table">

                                    </div>
                                    <div class="product_info_content">
                                        <p><span>NOTE:</span></p>
                                        <p>Fashion has been creating well-designed collections since 2010. The brand
                                            offers feminine designs delivering stylish separates and statement dresses
                                            which have since evolved into a full ready-to-wear collection in which every
                                            item is a vital part of a woman's wardrobe. The result? Cool, easy, chic
                                            looks with youthful elegance and unmistakable signature style. All the
                                            beautiful pieces are made in Italy and manufactured with the greatest
                                            attention. Now Fashion extends to a range of accessories including shoes,
                                            hats, belts and more!</p>
                                    </div>
                                </div>



                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="reviews_wrapper">
                                        <h2>1 review for Donec eu furniture</h2>
                                        <div class="reviews_comment_box">
                                            <div class="comment_thmb">
                                                <img src"assets/img/blog/comment2.jpg" alt="">
                                            </div>
                                            <div class="comment_text">
                                                <div class="reviews_meta">
                                                    <div class="star_rating">
                                                        <ul>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p><strong>admin </strong>- September 12, 2018</p>
                                                    <span>roadthemes</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="comment_title">
                                            <h2>Add a review </h2>
                                            <p>Your email address will not be published. Required fields are marked </p>
                                        </div>
                                        <div class="product_ratting mb-10">
                                            <h3>Your rating</h3>
                                            <ul class="d-flex">
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_review_form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="review_comment">Your review </label>
                                                        <textarea name="comment" id="review_comment"></textarea>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="author">Name</label>
                                                        <input id="author" type="text">

                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="email">Email </label>
                                                        <input id="email" type="text">
                                                    </div>
                                                </div>
                                                <button type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product info end-->

        <!-- Related Products Section -->
        <section class="product_area mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2><span><strong>Related</strong> Products</span></h2>
                        </div>
                        <div class="product_carousel product_column4 owl-carousel">
                            {{-- @foreach ($relatedProducts as $relatedProduct)
                            <div class="single_product22">
                                <div class="">
                                    <div class="card" aria-hidden="true">
                                        <div class="img-wrapper">
                                            <span class="badge rounded-pill text-bg-primary">-{{ $relatedProduct->discount ?? 30 }}%</span>
                                            <img class="xzoom" id="xzoom-default" src="{{ asset($relatedProduct->images) }}"
                                        xoriginal="{{ asset($relatedProduct->images) }}" title="Product 1 is awesome" />
                                        </div>
                                        <div class="card-body ">
                                            <h5 class="card-title"><a href="{{ url('product/'.$relatedProduct->id) }}">
                                                {{ $relatedProduct->name }}
                                            </a></h5>
                                            <p class="caxt">
                                            <div class="str">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                            </div>
                                            </p>
                                            <div class="productprice">
                                                @if ($relatedProduct->sale_price)
                                                    <p><span>MRP:</span> <span class="fdsm" style="text-decoration-line: line-through; color: gray;">₹{{ number_format($relatedProduct->sale_price * 1.30, 2) }}</span></p>
                                                @endif
                                                <p><span>Price:</span> <span class="fdsm" style="color:#01a9f3;">₹{{ number_format($relatedProduct->sale_price, 2) }}</span></p>
                                            </div>
                                            <div class="adtbynbtn">
                                <a href="{{ route('add_to_cart', ['id' => $relatedProduct->id]) }}">

                                                <button>Add To Cart</button></a>
                                <a href="{{ route('add_to_cart', ['id' => $relatedProduct->id]) }}">

                                                <button>Buy Now</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Recently Viewed Products Section -->
        <section class="product_area mb-50 mt-5 mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2><span><strong>Recently</strong> Viewed Products</span></h2>
                        </div>
                        <div class="product_carousel product_column4 owl-carousel">
                            {{-- @foreach ($recentlyViewedProducts as $recentlyViewedProduct)
                                <div class="single_product22">
                                    <div class="">
                                        <div class="card" aria-hidden="true">
                                            <div class="img-wrapper">
                                                <span
                                                    class="badge rounded-pill text-bg-primary">-{{ $recentlyViewedProduct->discount ?? 30 }}%</span>
                                                <img class="xzoom" id="xzoom-default"
                                                    src="{{ asset($recentlyViewedProduct->images) }}"
                                                    xoriginal="{{ asset($recentlyViewedProduct->images) }}"
                                                    title="Product 1 is awesome" />
                                            </div>
                                            <div class="card-body ">
                                                <h5 class="card-title"><a
                                                        href="{{ url('product/' . $recentlyViewedProduct->id) }}">
                                                        {{ $recentlyViewedProduct->name }}
                                                    </a></h5>
                                                <p class="caxt">
                                                <div class="str">
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                    <span><i class="fa-solid fa-star"></i></span>
                                                </div>
                                                </p>
                                                <div class="productprice">
                                                    @if ($recentlyViewedProduct->sale_price)
                                                        <p><span>MRP:</span> <span class="fdsm"
                                                                style="text-decoration-line: line-through; color: gray;">₹{{ number_format($recentlyViewedProduct->sale_price * 1.3, 2) }}
                                                            </span></p>
                                                    @endif
                                                    <p><span>Price:</span> <span class="fdsm"
                                                            style="color:#01a9f3;">₹{{ number_format($recentlyViewedProduct->sale_price, 2) }}</span>
                                                    </p>
                                                </div>
                                                <div class="adtbynbtn">
                                                    <a
                                                        href="{{ route('add_to_cart', ['id' => $recentlyViewedProduct->id]) }}">

                                                        <button>Add To Cart</button></a>
                                                    <a
                                                        href="{{ route('add_to_cart', ['id' => $recentlyViewedProduct->id]) }}">

                                                        <button>Buy Now</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>

    <div class="mbileadcrtbubtn">
        <div class="d-flex">
            <a href="" type="button" class="btnrgbt adcrt">Add To Cart</a>
            <a href="" type="button" class="btnrgbt bynw">Buy Now</a>
        </div>
    </div>
    @endsection
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/elevatezoom/jquery.elevatezoom.min.js"></script>

<script>
    $(document).ready(function() {
        $('#wishlist').click(function(e) {
            e.preventDefault();

            var pid = $("#productid").val();

            $.ajax({
                type: "POST",
                url: "{{ route('add_wishlist', ['id' => ':pid']) }}".replace(':pid', pid),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    product_id: pid
                },
                success: function(response) {
                    alert(response.message); // Show success message in an alert
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // alert("Error: " + errorThrown); 
                    alert("Login First!");
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Initialize zoom effect on the image
        $('.xzoom').elevateZoom({
            zoomType: 'inner', // Set zoom type to inner
            cursor: 'crosshair' // Set cursor type
        });
    });
</script>
