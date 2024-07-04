@extends('front.layout.app')

@section('content')
    <div class="inner-page-banner">
        <div class="banner-wrapper">
            <div class="container-fluid">
                <ul class="breadcrumb-list">
                    <li><a href="index.html">Home</a></li>
                    <li>FAQ’s</li>
                </ul>
                <div class="banner-main-content-wrap">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                            <div class="banner-content">
                                <span class="sub-title">Frequently</span>
                                <h1>Answer & Questions</h1>
                                <div class="customar-review">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="review-top">
                                                    <div class="logo">
                                                        <img src="assets/img/home1/icon/trstpilot-logo.svg" alt>
                                                    </div>
                                                    <div class="star">
                                                        <img src="assets/img/home1/icon/trustpilot-star.svg" alt>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <ul>
                                                        <li>Trust Rating <span>5.0</span></li>
                                                        <li><span>2348</span> Reviews</li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="review-top">
                                                    <div class="logo">
                                                        <img src="assets/img/home1/icon/google-logo.svg" alt>
                                                    </div>
                                                    <div class="star">
                                                        <ul>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                            <li><i class="bi bi-star-fill"></i></li>
                                                            <li><i class="bi bi-star-half"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <ul>
                                                        <li>Trust Rating <span>5.0</span></li>
                                                        <li><span>2348</span> Reviews</li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 d-lg-flex d-none align-items-center justify-content-end">
                            <div class="banner-img">
                                <img src="assets/img/inner-page/inner-banner-img.png" alt>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="faq-page-wrap pt-100 mb-100">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-4 d-lg-flex d-none">
                    <div class="faq-img">
                        <img src="assets/img/inner-page/faq-img.png" alt>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="faq-area">
                        <div class="section-title-and-filter mb-40">
                            <div class="section-title">
                                <h4>FAQ’s & Latest Answer</h4>
                            </div>
                        </div>
                        <div class="faq-wrap">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            How often should I get my car serviced?
                                        </button>
                                    </h5>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Follow your car's owner's manual for recommended service intervals based on
                                            mileage and time. Consider driving conditions and habits for adjustments.
                                            Address warning signs promptly.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                            aria-controls="flush-collapseTwo">
                                            How often should I change my car's oil?
                                        </button>
                                    </h5>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">It's always a good idea to research and read
                                            reviews specific to the dealership you're interested in, as
                                            experiences can vary even within the same dealership chain.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                                            aria-controls="flush-collapseThree">
                                            What type of fuel should I use for my car?
                                        </button>
                                    </h5>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">It's always a good idea to research and read
                                            reviews specific to the dealership you're interested in, as
                                            experiences can vary even within the same dealership chain.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseFour" aria-expanded="false"
                                            aria-controls="flush-collapseFour">
                                            What is the recommended tire pressure for my car?
                                        </button>
                                    </h5>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">It's always a good idea to research and read
                                            reviews specific to the dealership you're interested in, as
                                            experiences can vary even within the same dealership chain.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive"
                                            aria-expanded="false" aria-controls="flush-collapseFive">
                                            Can I trade in my old car at a dealership?
                                        </button>
                                    </h5>
                                    <div id="flush-collapseFive" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">It's always a good idea to research and read
                                            reviews specific to the dealership you're interested in, as
                                            experiences can vary even within the same dealership chain.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="flush-headingSix">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseSix"
                                            aria-expanded="false" aria-controls="flush-collapseSix">
                                            Can I test drive a vehicle before purchasing it?
                                        </button>
                                    </h5>
                                    <div id="flush-collapseSix" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">It's always a good idea to research and read
                                            reviews specific to the dealership you're interested in, as
                                            experiences can vary even within the same dealership chain.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="flush-headingSeven">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven"
                                            aria-expanded="false" aria-controls="flush-collapseSeven">
                                            Can I negotiate the price of a car at a dealership?
                                        </button>
                                    </h5>
                                    <div id="flush-collapseSeven" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">It's always a good idea to research and read
                                            reviews specific to the dealership you're interested in, as
                                            experiences can vary even within the same dealership chain.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="faq-inquiery-form pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-20">
                        <h4>If Any Inquirey, To Do Ask Somethings </h4>
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-30">
                                <div class="form-inner">
                                    <label>Your Name* :</label>
                                    <input type="text" placeholder="Jackson Mile">
                                </div>
                            </div>
                            <div class="col-md-6 mb-30">
                                <div class="form-inner">
                                    <label>Your Email* :</label>
                                    <input type="text" placeholder="example@gamil.com">
                                </div>
                            </div>
                            <div class="col-md-12 mb-30">
                                <div class="select-category">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Used Car
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            New Car
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault3" checked>
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Auction Car
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-30">
                                <div class="form-inner">
                                    <label>Type Your Question*</label>
                                    <textarea placeholder="Type Your Question*"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-inner">
                                    <button type="submit" class="primary-btn3">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
