@extends('front.layout.app')

@section('content')
    <div class="error-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-wrapper">
                        <div class="error-content-area text-center">
                            <h1>Opps, Page Not Found</h1>
                            <p>Something went wrong, web page that is displayed to the user when the server cannot find
                                the requested page.</p>
                            <div class="error-img mb-50">
                                <img class="img-fluid" src="assets/img/inner-page/404.svg" alt>
                            </div>
                            <div class="error-btn">
                                <a class="primary-btn3" href="{{ route('front_home') }}">Back To Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
