@extends('admin.layout.app')

@section('content')
    <div class="main-panel">
        <div class="pagesbodyarea">
            <div class="pageinfo">
                <ul class="d-flex">
                    <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="fa-solid fa-house"> </i>
                            Dashboard
                            /</a>
                    </li>
                    <li><a href="{{ route('admin.ecommerce.product') }}" class="breadcrumb-item">Products
                            /</a>
                    </li>
                    <li><a class="breadcrumb-item">New Product</a>
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




            <div id="main">
                <form action="{{ route('admin.ecommerce.save_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <input name="" type="hidden" value=""> --}}

                    <div class="row">
                        <div class="col-md-9">
                            <div class="main-form">
                                <div class="form-body">
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Name</label>
                                        <input class="form-control " name="name" type="text" id="name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Registration No.</label>
                                        <input class="form-control " name="reg_no" type="text" id="reg_no">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Registered RTO</label>
                                        <input class="form-control " name="reg_rto" type="text" id="reg_rto">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Manufacturing Date.</label>
                                        <input class="form-control " name="manfacture_date" type="date"
                                            id="manfacture_date">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Registration Date.</label>
                                        <input class="form-control " name="reg_date" type="date" id="reg_date">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required" aria-required="true">Owner
                                            Name</label>
                                        <input class="form-control " name="owner_name" type="text" id="owner_name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required" aria-required="true">RC
                                            Blacklist Status</label>
                                        <input class="form-control " name="rc_blacklist_status" type="text"
                                            id="rc_blacklist_status">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Make</label>
                                        <input class="form-control " name="make" type="text" id="make">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Model</label>
                                        <input class="form-control " name="model" type="text" id="model">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Vehicle Class</label>
                                        <input class="form-control " name="vehicle_class" type="text"
                                            id="vehicle_class">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Wheel Base</label>
                                        <input class="form-control " name="wheel_base" type="text" id="wheel_base">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Chasis Number</label>
                                        <input class="form-control " name="chasis_no" type="text" id="chasis_no">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Engine Number</label>
                                        <input class="form-control " name="engine_no" type="text" id="engine_no">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required" aria-required="true">Fuel
                                            Type</label>
                                        <select name="fuel_type" id="fuel_type" class="form-control ">
                                            <option>--Select--</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Petrol">Petrol</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required" aria-required="true">Fuel
                                            Norms</label>
                                        <input class="form-control " name="fuel_norm" type="text" id="fuel_norm">
                                    </div>

                                    {{-- <div class="form-group mb-3">
                                        <label for="description">Description</label><br>
                                        <textarea name="description" id="description" cols="30" rows="50" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="content">Content</label><br>
                                        <textarea name="content" id="content" cols="30" rows="50" class="form-control"></textarea>
                                    </div> --}}


                                    <div class="form-group mb-3">
                                        <label for="images[]" class="control-label">Images</label>
                                        <div class="gallery-images-wrapper list-images">
                                            <div class="images-wrapper">
                                                <div data-name="images[]"
                                                    class="text-center cursor-pointer js-btn-trigger-add-image default-placeholder-gallery-image hidden">
                                                    <p style="color: rgb(195, 207, 216);">Using button <strong>Select
                                                            image</strong> to add more images.</p>
                                                </div>
                                                <input type="file" name="images[]" multiple style="display: none;">
                                                <ul data-name="images[]" data-allow-thumb="1"
                                                    class="list-unstyled list-gallery-media-images ui-sortable">
                                                    <!-- Existing images go here -->
                                                </ul>
                                            </div>
                                            <a data-name="images[]" style="cursor: pointer;"
                                                class="add-new-gallery-image js-btn-trigger-add-image">Add image</a>
                                        </div>
                                    </div>

                                    {{-- <input class="form-control" name="product_type" type="hidden" value="physical"> --}}
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>



                        <!-- todo right part start==================================================================================== -->

                        <div class="col-md-3 right-sidebar d-flex flex-column-reverse flex-md-column">
                            <div class="form-actions-wrapper">
                                <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
                                    <div class="widget-title">
                                        <h4><span>Publish</span></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="btn-set"><button type="submit" name="submit" value="save"
                                                class="btn btn-info"><i class="fa fa-save"></i> Save &amp; Exit
                                            </button>
                                            &nbsp;
                                            <button type="submit" name="submit" value="apply"
                                                class="btn btn-success"><i class="fa fa-check-circle"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="waypoint"></div>

                            </div>
                            <div class="form-side-meta-boxes">
                                {{-- <div id="top-sortables" class="meta-box-sortables">
                                    <div id="additional_product_fields" class="widget meta-boxes">
                                        <div class="widget-title">
                                            <h4><span>Addition Information</span></h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="form-group"><label for="layout"
                                                    class="control-label">Layout</label>
                                                <div class="ui-select-wrapper form-group ">
                                                    <select name="layout" class="form-control ui-select">
                                                        <option value="inherit" selected="selected">Inherit
                                                        </option>
                                                        <option value="product-right-sidebar">Product
                                                            Right Sidebar</option>
                                                        <option value="product-left-sidebar">Product
                                                            Left Sidebar</option>
                                                        <option value="product-full-width">Product Full
                                                            Width</option>
                                                    </select>
                                                    <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                            </path>
                                                        </svg></svg>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        value="1" id="flexSwitchCheckChecked" name="is_popular">
                                                    <label class="form-check-label control-label"
                                                        for="flexSwitchCheckChecked">Is Popular? </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="status" class="control-label required"
                                                aria-required="true">Status</label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group ">
                                            <select class="form-control ui-select" id="status" name="status">
                                                <option value="published" selected="selected">Published
                                                </option>
                                                <option value="draft">Draft</option>
                                                <option value="pending">Pending</option>
                                            </select>
                                            <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                    </path>
                                                </svg></svg>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="store_id" class="control-label">Store</label>
                                        </h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group ">
                                            <select class="form-control ui-select" id="store_id" name="store_id">
                                                <option value="0" selected="selected">Select a store...
                                                </option>
                                                <option value="1">GoPro</option>
                                                <option value="2">Global Office</option>
                                                <option value="3">Young Shop</option>
                                                <option value="4">Global Store</option>
                                                <option value="5">Robert’s Store</option>
                                                <option value="6">Stouffer</option>
                                                <option value="7">Asa</option>
                                                <option value="8">Dustin</option>
                                                <option value="9">UHzVjYoibdmFwT</option>
                                                <option value="10">CRzpPsvt</option>
                                            </select>
                                            <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                    </path>
                                                </svg></svg>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="is_featured" class="control-label">Is
                                                featured?</label></h4>
                                    </div>
                                    <div class="m-1 form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" value="1"
                                            id="flexSwitchCheckChecked" name="is_featured">
                                    </div>
                                </div> --}}
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="categories[]" class="control-label">Vehicle Category</label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="form-group form-group-no-margin ">
                                            <div class="multi-choices-widget list-item-checkbox mCustomScrollbar _mCS_1"
                                                style="padding: 0px;">
                                                <div id="mCSB_1"
                                                    class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside"
                                                    style="max-height: 320px;" tabindex="0">
                                                    <div id="mCSB_1_container" class="mCSB_container"
                                                        style="position:relative; top:0; left:0;" dir="ltr">
                                                        <ul>
                                                            @foreach ($category as $cat)
                                                                <li value="{{ $cat->id }}">
                                                                    <label class="mb-2">
                                                                        <input type="checkbox" value="{{ $cat->id }}"
                                                                            name="categories">
                                                                        {{ $cat->name }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div id="mCSB_1_scrollbar_vertical"
                                                        class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical"
                                                        style="display: block;">
                                                        <div class="mCSB_draggerContainer">
                                                            <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                                                style="position: absolute; min-height: 30px; display: block; height: 66px; max-height: 310px; top: 0px;">
                                                                <div class="mCSB_dragger_bar" style="line-height: 30px;">
                                                                </div>
                                                            </div>
                                                            <div class="mCSB_draggerRail"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="brand_id" class="control-label">Brand</label>
                                        </h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group ">
                                            <select class="form-control ui-select" id="brand_id" name="brand_id">
                                                <option value="0"> No Brand </option>
                                                @foreach ($brands as $bitem)
                                                    <option value="{{ $bitem->id }}">
                                                        {{ $bitem->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <svg class="svg-next-icon svg-next-icon-size-16">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                    </path>
                                                </svg>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="image" class="control-label">Featured image
                                                (optional)</label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="image-box">
                                            <div class="preview-image-wrapper">
                                                <img src="" alt="Preview image" width="150" height="150"
                                                    class="preview_image">
                                                <a title="Remove image" class="btn_remove_image"><i
                                                        class="fa fa-times"></i></a>
                                                <input type="file" name="featured_image" class="featured_image_input"
                                                    style="display: none">
                                            </div>
                                            <div class="image-box-actions">
                                                <a style="cursor: pointer;" data-result="image"
                                                    data-action="select-image" data-allow-thumb="1" class="btn_gallery">
                                                    Choose image
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="product_collections[]" class="control-label">Product
                                                collections</label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="form-group mb-3 form-group-no-margin ">
                                            <div class="multi-choices-widget list-item-checkbox mCustomScrollbar _mCS_2"
                                                style="padding: 0px;">
                                                <div id="mCSB_2"
                                                    class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside"
                                                    style="max-height: none;" tabindex="0">
                                                    <div id="mCSB_2_container"
                                                        class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                                        style="position:relative; top:0; left:0;" dir="ltr">
                                                        <ul>
                                                            @foreach ($collections as $colitem)
                                                                <li>
                                                                    <input type="checkbox" name="product_collections"
                                                                        value="{{ $colitem->id }}"
                                                                        id="product_collections[]-{{ $colitem->id }}"
                                                                        class="styled">
                                                                    <label
                                                                        for="product_collections[]-{{ $colitem->id }}">
                                                                        {{ $colitem->name }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div id="mCSB_2_scrollbar_vertical"
                                                        class="mCSB_scrollTools mCSB_2_scrollbar mCS-dark mCSB_scrollTools_vertical"
                                                        style="display: none;">
                                                        <div class="mCSB_draggerContainer">
                                                            <div id="mCSB_2_dragger_vertical" class="mCSB_dragger"
                                                                style="position: absolute; min-height: 30px; height: 0px; top: 0px;">
                                                                <div class="mCSB_dragger_bar" style="line-height: 30px;">
                                                                </div>
                                                            </div>
                                                            <div class="mCSB_draggerRail"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="product_labels[]" class="control-label">Labels</label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="form-group mb-3 form-group-no-margin ">
                                            <div class="multi-choices-widget list-item-checkbox mCustomScrollbar _mCS_3"
                                                style="padding: 0px;">
                                                <div id="mCSB_3"
                                                    class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside"
                                                    style="max-height: none;" tabindex="0">
                                                    <div id="mCSB_3_container"
                                                        class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                                        style="position:relative; top:0; left:0;" dir="ltr">
                                                        <ul>
                                                            @foreach ($labels as $labitem)
                                                                <li>
                                                                    <input type="checkbox" name="product_labels"
                                                                        value="{{ $labitem->id }}"
                                                                        id="product_labels[]-{{ $labitem->id }}"
                                                                        class="styled">
                                                                    <label for="product_labels[]-{{ $labitem->id }}">
                                                                        {{ $labitem->name }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div id="mCSB_3_scrollbar_vertical"
                                                        class="mCSB_scrollTools mCSB_3_scrollbar mCS-dark mCSB_scrollTools_vertical"
                                                        style="display: none;">
                                                        <div class="mCSB_draggerContainer">
                                                            <div id="mCSB_3_dragger_vertical" class="mCSB_dragger"
                                                                style="position: absolute; min-height: 30px; height: 0px; top: 0px;">
                                                                <div class="mCSB_dragger_bar" style="line-height: 30px;">
                                                                </div>
                                                            </div>
                                                            <div class="mCSB_draggerRail"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="taxes[]" class="control-label">Taxes</label>
                                        </h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="form-group mb-3 form-group-no-margin ">
                                            <div class="multi-choices-widget list-item-checkbox mCustomScrollbar _mCS_4"
                                                style="padding: 0px;">
                                                <div id="mCSB_4"
                                                    class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside"
                                                    style="max-height: none;" tabindex="0">
                                                    <div id="mCSB_4_container"
                                                        class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                                        style="position:relative; top:0; left:0;" dir="ltr">

                                                        <ul>
                                                            @foreach ($taxes as $tax_item)
                                                                <li>
                                                                    <input type="checkbox" name="taxes"
                                                                        value="{{ $tax_item->id }}"
                                                                        id="taxes[]-item-{{ $tax_item->id }}"
                                                                        class="styled">
                                                                    <label for="taxes[]-item-1">{{ $tax_item->title }}
                                                                        ({{ $tax_item->percentage }}%)
                                                                    </label>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                    <div id="mCSB_4_scrollbar_vertical"
                                                        class="mCSB_scrollTools mCSB_4_scrollbar mCS-dark mCSB_scrollTools_vertical"
                                                        style="display: none;">
                                                        <div class="mCSB_draggerContainer">
                                                            <div id="mCSB_4_dragger_vertical" class="mCSB_dragger"
                                                                style="position: absolute; min-height: 30px; height: 0px; top: 0px;">
                                                                <div class="mCSB_dragger_bar" style="line-height: 30px;">
                                                                </div>
                                                            </div>
                                                            <div class="mCSB_draggerRail"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <!-- todo main body part close -->


        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>


    {{-- Add images --}}
    <script>
        $(document).ready(function() {
            // When the add image button is clicked
            $('.js-btn-trigger-add-image').on('click', function() {
                // Trigger the file input
                $(this).siblings('.images-wrapper').find('input[type="file"]').click();
            });

            // When file input changes (i.e., files are selected)
            $('input[type="file"]').on('change', function() {
                // Get the selected files
                var files = this.files;
                var $ul = $(this).siblings('ul');
                $ul.empty(); // Clear the current list

                // Loop through each file and create a preview
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // Create an li element for each image
                        var $li = $('<li></li>');
                        var $img = $('<img>').attr('src', e.target.result).css({
                            'width': '120px',
                            'margin': '5px'
                        });
                        $li.append($img);
                        $ul.append($li);
                    };

                    reader.readAsDataURL(file); // Convert the file to a data URL
                }
            });
        });
    </script>

    {{-- Featured Image --}}
    <script>
        $(document).ready(function() {
            // Trigger file input when "Choose image" is clicked
            $('.btn_gallery').on('click', function() {
                $(this).closest('.image-box').find('.featured_image_input').click();
            });

            // Show preview image after file selection
            $('.featured_image_input').on('change', function() {
                const input = this;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $(input).closest('.image-box').find('.preview_image').attr('src', e.target
                            .result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });

            // Remove image and reset file input
            $('.btn_remove_image').on('click', function() {
                const imageBox = $(this).closest('.image-box');
                imageBox.find('.preview_image').attr('src', '');
                imageBox.find('.featured_image_input').val('');
            });
        });
    </script>
@endsection
