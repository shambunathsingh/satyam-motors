@extends('admin.layout.app')

@section('content')
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
                        <h2 class="fs-4" style="font-size: 16px;">Tracking settings</h2>
                        <p class="color-note">Manage tracking: UTM, Facebook, Google Tag Manager...</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="custom p-4">
                        <div class="tab-content">
                            <div class="wrapper-content pd-all-20">
                                <div class="form-group">
                                    <label>Enable Facebook Pixel (Meta Pixel)?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="facebookPixel"
                                            id="facebookPixelYes" value="yes">
                                        <label class="form-check-label" for="facebookPixelYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="facebookPixel"
                                            id="facebookPixelNo" value="no" checked>
                                        <label class="form-check-label" for="facebookPixelNo">No</label>
                                    </div>
                                    <div class="help-ts">
                                        <i class="fa fa-info-circle"></i>
                                        <span>Go to <a href="https://developers.facebook.com/docs/meta-pixel"
                                                target="_blank">https://developers.facebook.com/docs/meta-pixel</a> to
                                            create Facebook Pixel.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Enable Google Tag Manager?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="googleTagManager"
                                            id="googleTagManagerYes" value="yes">
                                        <label class="form-check-label" for="googleTagManagerYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="googleTagManager"
                                            id="googleTagManagerNo" value="no" checked>
                                        <label class="form-check-label" for="googleTagManagerNo">No</label>
                                    </div>
                                    <div class="help-ts">
                                        <i class="fa fa-info-circle"></i>
                                        <span>Go to <a href="https://ads.google.com/aw/conversions"
                                                target="_blank">https://ads.google.com/aw/conversions</a> to create
                                            Google Ads Conversions.</span>
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
@endsection