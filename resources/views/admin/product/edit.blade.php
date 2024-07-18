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
                    <li><a class="breadcrumb-item">Edit Product '{{ $product->name }}'</a>
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
                <form action="{{ route('admin.ecommerce.update_product', ['id' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- <input name="" type="hidden" value=""> --}}

                    <div class="row">
                        <div class="col-md-9">
                            <div class="main-form">
                                <div class="form-body">
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Name</label>
                                        <input class="form-control " name="name" type="text" id="name"
                                            value="{{ $product->name }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Registration No.</label>
                                        <input class="form-control " name="reg_no" type="text" id="reg_no"
                                            value="{{ $product->reg_no }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Registered RTO</label>
                                        <input class="form-control " name="reg_rto" type="text" id="reg_rto"
                                            value="{{ $product->reg_rto }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Manufacturing Date.</label>
                                        <input class="form-control " name="manfacture_date" type="date"
                                            id="manfacture_date" value="{{ $product->manfacture_date }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Registration Date.</label>
                                        <input class="form-control " name="reg_date" type="date" id="reg_date"
                                            value="{{ $product->reg_date }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required" aria-required="true">Owner
                                            Name</label>
                                        <input class="form-control " name="owner_name" type="text" id="owner_name"
                                            value="{{ $product->owner_name }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required" aria-required="true">RC
                                            Blacklist Status</label>
                                        <input class="form-control " name="rc_blacklist_status" type="text"
                                            id="rc_blacklist_status" value="{{ $product->rc_blacklist_status }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Make</label>
                                        <input class="form-control " name="make" type="text" id="make"
                                            value="{{ $product->make }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Model</label>
                                        <input class="form-control " name="model" type="text" id="model"
                                            value="{{ $product->model }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Vehicle Class</label>
                                        <input class="form-control " name="vehicle_class" type="text"
                                            id="vehicle_class" value="{{ $product->vehicle_class }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Wheel Base</label>
                                        <input class="form-control " name="wheel_base" type="text" id="wheel_base"
                                            value="{{ $product->wheel_base }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Chasis Number</label>
                                        <input class="form-control " name="chasis_no" type="text" id="chasis_no"
                                            value="{{ $product->chasis_no }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Engine Number</label>
                                        <input class="form-control " name="engine_no" type="text" id="engine_no"
                                            value="{{ $product->engine_no }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required" aria-required="true">Fuel
                                            Type</label>
                                        <select name="fuel_type" id="fuel_type" class="form-control ">
                                            <option>--Select--</option>
                                            <option value="Diesel"
                                                {{ $product->fuel_type == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                            <option value="Petrol"
                                                {{ $product->fuel_type == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="text-title-field required" aria-required="true">Fuel
                                            Norms</label>
                                        <input class="form-control " name="fuel_norm" type="text" id="fuel_norm"
                                            value="{{ $product->fuel_norm }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="images[]" class="control-label">Images</label>
                                        <div class="gallery-images-wrapper list-images">
                                            <div class="images-wrapper">
                                                <div data-name="images[]"
                                                    class="text-center cursor-pointer js-btn-trigger-add-image default-placeholder-gallery-image hidden">
                                                    @foreach ($productImages as $image)
                                                        <div class="image-container"
                                                            style="display: inline-block; margin-right: 10px;">
                                                            <img src="{{ asset('uploads/' . $image->images) }}"
                                                                alt="Product Image" width="100" height="100">
                                                            <div class="image-actions">
                                                                <!-- Hidden input field for image ID -->
                                                                <input type="hidden" class="image-id"
                                                                    value="{{ $image->id }}">
                                                                <!-- Delete Button -->
                                                                <button type="button" style="background:darkred;"
                                                                    class="btn btn-sm btn-danger mt-2 delete-image">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                    {{-- <img src="" alt="Image" width="120"> --}}
                                                    <br>
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

                                    <div class="form-group mb-3">
                                        <label for="images[]" class="control-label">Exterior Images</label>
                                        <div class="gallery-images-wrapper list-images">
                                            <div class="images-wrapper">
                                                <div data-name="images[]"
                                                    class="text-center cursor-pointer js-btn-trigger-add-image default-placeholder-gallery-image hidden">
                                                    @foreach ($extproductImages as $image)
                                                        <div class="image-container"
                                                            style="display: inline-block; margin-right: 10px;">
                                                            <img src="{{ asset('uploads/' . $image->images) }}"
                                                                alt="Product Image" width="100" height="100">
                                                            <div class="image-actions">
                                                                <!-- Hidden input field for image ID -->
                                                                <input type="hidden" class="image-id"
                                                                    value="{{ $image->id }}">
                                                                <!-- Delete Button -->
                                                                <button type="button" style="background:darkred;"
                                                                    class="btn btn-sm btn-danger mt-2 delete-image">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <p style="color: rgb(195, 207, 216);">Using button <strong>Select
                                                            image</strong> to add more images.</p>
                                                </div>
                                                <input type="file" name="ext_images[]" multiple
                                                    style="display: none;">
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
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="status" class="control-label required"
                                                aria-required="true">Status</label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group ">
                                            <select class="form-control ui-select" id="status" name="status">
                                                <option value="published"
                                                    {{ $product->status == 'published' ? 'selected' : '' }}>Published
                                                </option>
                                                <option value="draft"
                                                    {{ $product->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                                <option value="pending"
                                                    {{ $product->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            </select>
                                            <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                    </path>
                                                </svg></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="is_featured" class="control-label">Is
                                                featured?</label></h4>
                                    </div>
                                    <div class="m-1 form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" value="1"
                                            {{ $product->is_featured == '1' ? 'checked' : '' }} id="flexSwitchCheckChecked"
                                            name="is_featured">
                                    </div>
                                </div>
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
                                                                        <input type="checkbox"
                                                                            value="{{ $cat->id }}" name="categories"
                                                                            {{ $product->categories == $cat->id ? 'checked' : '' }}>
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
                                        <h4><label for="categories[]" class="control-label">Documents</label></h4>
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
                                                            @foreach ($documents as $doc)
                                                                <li value="{{ $doc->id }}">
                                                                    <label class="mb-2">
                                                                        <input type="checkbox"
                                                                            value="{{ $doc->id }}" name="documents"
                                                                            {{ $product->documents == $doc->id ? 'checked' : '' }}>
                                                                        {{ $doc->name }}
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
                                                    <option value="{{ $bitem->id }}"
                                                        {{ $product->brand_id == $bitem->id ? 'selected' : '' }}>
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
                                                <img src="{{ asset('uploads/' . $product->featured_image) }}"
                                                    alt="Preview image" width="150" height="150"
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

    {{-- product Images deleting --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete-image').click(function() {
                var $container = $(this).closest('.image-container');
                var imageId = $container.find('.image-id').val();

                // Confirm deletion (optional)
                if (!confirm("Are you sure you want to delete this image?")) {
                    return false;
                }

                // AJAX request
                $.ajax({
                    url: '{{ route('admin.ecommerce.delete_productImage') }}', // Replace with your Laravel route
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'image_id': imageId
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the image container from the UI
                            $container.remove();

                            // Show success message (optional)
                            alert('Image deleted successfully!');
                        } else {
                            alert('Failed to delete image.');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error deleting image: ' + error);
                    }
                });
            });
        });
    </script>
@endsection
