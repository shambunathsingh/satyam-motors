@extends('front.layout.app')

@section('content')
    <div class="inner-page-banner">
        <div class="banner-wrapper">
            <div class="container-fluid">
                <ul class="breadcrumb-list">
                    <li><a href="{{ route('front_home') }}">Home</a></li>
                    <li>Customer Reviews</li>
                </ul>
                <div class="banner-main-content-wrap">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                            <div class="banner-content">
                                <span class="sub-title">Customer Reviews</span>
                                <h1>Customer Feedback</h1>
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

    <div class="customer-feedback-pages pt-100 pb-100">
        <div class="container">
            <div class="row mb-40 g-4">
                <div class="col-lg-4">
                    <div class="feedback-card">
                        <div class="feedback-top">
                            <div class="stat-area">
                                <img src="assets/img/home1/icon/trustpilot-star.svg" alt>
                                <span>Trusted Company</span>
                            </div>
                            <div class="logo">
                                <img src="assets/img/home1/icon/trustpilot-log3.svg" alt>
                            </div>
                        </div>
                        <p>Drivco-Agency, to the actively encourage customers to leave reviews to the help promote their
                            products and services.”</p>
                        <div class="author-name">
                            <h6>Jhon Abraham,</h6>
                            <span>25 minutes ago</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feedback-card">
                        <div class="feedback-top">
                            <div class="stat-area">
                                <div class="star">
                                    <ul>
                                        <li class="active"><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li class><i class="bi bi-star-half"></i></li>
                                    </ul>
                                </div>
                                <span>Great Services!</span>
                            </div>
                            <div class="logo">
                                <img src="assets/img/home1/icon/google3.svg" alt>
                            </div>
                        </div>
                        <p>Drivco-Agency, to the actively encourage customers to leave reviews to the help promote their
                            products and services.”</p>
                        <div class="author-name">
                            <h6>Franqkly Jui,</h6>
                            <span>25 minutes ago</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feedback-card">
                        <div class="feedback-top">
                            <div class="stat-area">
                                <img src="assets/img/home1/icon/trustpilot-star.svg" alt>
                                <span>Trusted Company</span>
                            </div>
                            <div class="logo">
                                <img src="assets/img/home1/icon/trustpilot-log3.svg" alt>
                            </div>
                        </div>
                        <p>Drivco-Agency, to the actively encourage customers to leave reviews to the help promote their
                            products and services.”</p>
                        <div class="author-name">
                            <h6>Robert Smith,</h6>
                            <span>25 minutes ago</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feedback-card">
                        <div class="feedback-top">
                            <div class="stat-area">
                                <div class="star">
                                    <ul>
                                        <li class="active"><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li class><i class="bi bi-star-half"></i></li>
                                    </ul>
                                </div>
                                <span>Great Services!</span>
                            </div>
                            <div class="logo">
                                <img src="assets/img/home1/icon/google3.svg" alt>
                            </div>
                        </div>
                        <p>Drivco-Agency, to the actively encourage customers to leave reviews to the help promote their
                            products and services.”</p>
                        <div class="author-name">
                            <h6>Mannu Moris,</h6>
                            <span>25 minutes ago</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feedback-card">
                        <div class="feedback-top">
                            <div class="stat-area">
                                <img src="assets/img/home1/icon/trustpilot-star.svg" alt>
                                <span>Trusted Company</span>
                            </div>
                            <div class="logo">
                                <img src="assets/img/home1/icon/trustpilot-log3.svg" alt>
                            </div>
                        </div>
                        <p>Drivco-Agency, to the actively encourage customers to leave reviews to the help promote their
                            products and services.”</p>
                        <div class="author-name">
                            <h6>Rakhab Uddin,</h6>
                            <span>25 minutes ago</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feedback-card">
                        <div class="feedback-top">
                            <div class="stat-area">
                                <div class="star">
                                    <ul>
                                        <li class="active"><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li class><i class="bi bi-star-half"></i></li>
                                    </ul>
                                </div>
                                <span>Great Services!</span>
                            </div>
                            <div class="logo">
                                <img src="assets/img/home1/icon/google3.svg" alt>
                            </div>
                        </div>
                        <p>Drivco-Agency, to the actively encourage customers to leave reviews to the help promote their
                            products and services.”</p>
                        <div class="author-name">
                            <h6>Daniel Scoot,</h6>
                            <span>25 minutes ago</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feedback-card">
                        <div class="feedback-top">
                            <div class="stat-area">
                                <img src="assets/img/home1/icon/trustpilot-star.svg" alt>
                                <span>Trusted Company</span>
                            </div>
                            <div class="logo">
                                <img src="assets/img/home1/icon/trustpilot-log3.svg" alt>
                            </div>
                        </div>
                        <p>Drivco-Agency, to the actively encourage customers to leave reviews to the help promote their
                            products and services.”</p>
                        <div class="author-name">
                            <h6>Willium Jhon,</h6>
                            <span>25 minutes ago</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feedback-card">
                        <div class="feedback-top">
                            <div class="stat-area">
                                <div class="star">
                                    <ul>
                                        <li class="active"><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li class><i class="bi bi-star-half"></i></li>
                                    </ul>
                                </div>
                                <span>Great Services!</span>
                            </div>
                            <div class="logo">
                                <img src="assets/img/home1/icon/google3.svg" alt>
                            </div>
                        </div>
                        <p>Drivco-Agency, to the actively encourage customers to leave reviews to the help promote their
                            products and services.”</p>
                        <div class="author-name">
                            <h6>Jacoline Harry,</h6>
                            <span>25 minutes ago</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feedback-card">
                        <div class="feedback-top">
                            <div class="stat-area">
                                <img src="assets/img/home1/icon/trustpilot-star.svg" alt>
                                <span>Trusted Company</span>
                            </div>
                            <div class="logo">
                                <img src="assets/img/home1/icon/trustpilot-log3.svg" alt>
                            </div>
                        </div>
                        <p>Drivco-Agency, to the actively encourage customers to leave reviews to the help promote their
                            products and services.”</p>
                        <div class="author-name">
                            <h6>Smith Jonson,</h6>
                            <span>25 minutes ago</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="load-more-btn">
                        <a href="#" class="primary-btn3">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
