@extends('admin.layout.app')

@section('content')
    <form action="{{ route('admin.ecommerce.save_pcategories') }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="main-panel">

            <ol class="breadcrumb">
                <li class="breadcrumb-item "><span style="color: black; margin-right: 3px;"><i
                            class="fa fa-home"></i></span>Dashboard</li>

                <li class="breadcrumb-item"><a href="blog-posts.html" style="color: black; margin-right: 3px;">Ecommerce</a>
                </li>
                <li class="breadcrumb-item active">Categories</li>

            </ol>


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


            <div id="main">
                <div class="row">
                    <div class="col-12">
                        <div class="my-2 text-end">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card tree-categories-container position-relative">
                            <div class="tree-loading d-none">
                                <div class="half-circle-spinner loading-spinner">
                                    <div class="circle circle-1">
                                    </div>
                                    <div class="circle circle-2">
                                    </div>
                                </div>
                            </div>
                            <div class="tree-categories-body card-body">
                                <div class="mb-3 d-flex">
                                    <button class="btn btn-primary toggle-tree" type="button" data-expand="Expand all"
                                        data-collapse="Collapse all">
                                        Collapse all
                                    </button>
                                    <a class="tree-categories-create btn btn-info mx-2"
                                        href="{{ route('admin.ecommerce.create_pcategory') }}">
                                        <i class="fa fa-plus"></i> Create </a>
                                </div>

                                <div class="file-tree-wrapper" data-url="" style="cursor: auto;">
                                    <ul class="file-tree file-list">
                                        @php
                                            use App\Models\Category\Category;
                                        @endphp

                                        @foreach ($categories as $item)
                                            <li class="folder-root open" data-id="{{ $item->id }}">
                                                <a onclick="test('{{ $item->id }}')" class="fetch-data category-name"
                                                    style="cursor: pointer;">
                                                    <i class="far fa-file"></i>
                                                    <span>{{ $item->name }}</span>
                                                    @php
                                                        $totalPosts = 0;
                                                        if ($item->parent_id == $item->id) {
                                                            echo $totalPosts = 'yes';

                                                            //     $totalPosts = Category::where(
                                                            //         'parent_id',
                                                            //     $item->parent_id,
                                                            // )->count();
                                                        }
                                                    @endphp
                                                    {{-- <span class="badge font-weight-bold bg-success" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Total posts: {{ $totalPosts }}">{{ $totalPosts }}</span> --}}
                                                </a>
                                                <a href="#" target="_blank" class="text-info" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Open in new tab">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                                {{-- <ul class="">
                                                    <li class="folder-root open" data-id="17">
                                                        <a href="https://carzex.in/admin/ecommerce/product-categories/edit/17"
                                                            class="fetch-data category-name">
                                                            <i class="far fa-file"></i>
                                                            <span>CAR PERFUMES</span>
                                                        </a><a
                                                            href="https://carzex.in/admin/ecommerce/products?filter_table_id=botble-ecommerce-tables-product-table&amp;class=Botble%5CEcommerce%5CModels%5CProduct&amp;filter_columns%5B0%5D=category&amp;filter_operators%5B0%5D=%3D&amp;filter_values%5B0%5D=17"
                                                            class="badge font-weight-bold bg-success"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="Total products: 0">0</a>

                                                        <a href="https://carzex.in/product-categories/car-perfumes"
                                                            target="_blank" class="text-info" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Open in new tab">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-danger deleteDialog"
                                                            data-section="https://carzex.in/admin/ecommerce/product-categories/17"
                                                            role="button" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul> --}}
                                            </li>
                                        @endforeach



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card tree-form-container position-relative">
                            <div class="tree-loading d-none">
                                <div class="half-circle-spinner loading-spinner">
                                    <div class="circle circle-1">
                                    </div>
                                    <div class="circle circle-2">
                                    </div>
                                </div>
                            </div>
                            <div class="tree-form-body card-body p-3">
                                {{-- <form method="POST" action="#" accept-charset="UTF-8"
                                    id="botble-blog-forms-category-form" class="js-base-form dirty-check"
                                    createroute="categories.create" editroute="categories.edit"
                                    deleteroute="categories.destroy" novalidate="novalidate"> --}}
                                {{-- <form action="{{ route('admin.ecommerce.save_pcategories') }}" method="post"
                                    enctype="multipart/form-data">

                                    @csrf --}}



                                <div class="form-group mb-3">

                                    <label for="name" class="control-label required" aria-required="true">Name</label>
                                    <input class="form-control" placeholder="Name" data-counter="120" v-pre=""
                                        name="name" type="text" value="" id="name">



                                </div>


                                <div class="form-group mb-3">

                                    <label for="parent_id" class="control-label required"
                                        aria-required="true">Parent</label>

                                    <div class="ui-select-wrapper form-group ">
                                        <select class="form-control ui-select is-valid" v-pre="" id="parent_id"
                                            name="parent_id" data-select2-id="select2-data-parent_id" tabindex="-1"
                                            aria-hidden="true">
                                            <option value="0" data-select2-id="select2-data-2-kpq3">
                                                None
                                            </option>
                                            @foreach ($categories as $option)
                                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="select2-data-1-4vrt"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-parent_id-container"
                                                        aria-controls="select2-parent_id-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-parent_id-container" role="textbox"
                                                            aria-readonly="true" title="None">None</span>
                                                        <span class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span>
                                                    </span>
                                                </span>
                                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                                            </span> --}}
                                        {{-- <svg class="svg-next-icon svg-next-icon-size-16">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                    </path>
                                                </svg>
                                            </svg> --}}
                                    </div>
                                </div>

                                <div class="form-group mb-3">

                                    <label for="description" class="control-label">Description</label>
                                    <textarea class="form-control" rows="4" placeholder="Short description" data-counter="400" v-pre=""
                                        name="description" cols="50" id="description"></textarea>



                                </div>

                                <div class="form-group mb-3">

                                    <label for="icon" class="control-label">Icon</label>
                                    <input class="form-control" placeholder="Ex: fa fa-home" data-counter="60"
                                        v-pre="" name="icon" type="text" id="icon">



                                </div>

                                <div class="form-group mb-3">

                                    <label for="order" class="control-label">Order</label>
                                    <input class="form-control" placeholder="Order by" v-pre="" name="order"
                                        type="number" value="0" id="order">



                                </div>


                                <div id="advanced-sortables" class="meta-box-sortables">
                                    <div id="additional_product_category_fields" class="widget meta-boxes">
                                        <div class="widget-title">
                                            <h4><span>Addition Information</span></h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="form-group" data-select2-id="select2-data-413-bwp7">
                                                <label class="control-label" for="icon">Font Icon</label>
                                                <div class="ui-select-wrapper form-group "
                                                    data-select2-id="select2-data-412-hysc">
                                                    <select class="form-control ui-select is-valid" id="icon-select"
                                                        data-empty="None" name="icon" tabindex="-1"
                                                        aria-hidden="true" data-select2-id="select2-data-icon-select">
                                                        <option value="fi-rs-zoom-in"
                                                            data-select2-id="select2-data-766-06i8">fi-rs-zoom-in
                                                        </option>
                                                        <option value="fi-rs-zoom-out"
                                                            data-select2-id="select2-data-767-t3ch">fi-rs-zoom-out
                                                        </option>
                                                    </select>
                                                    {{-- <span
                                                            class="select2 select2-container select2-container--default select2-container--below"
                                                            dir="ltr" data-select2-id="select2-data-360-kqzd"
                                                            style="width: 100%;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-icon-select-container"
                                                                    aria-controls="select2-icon-select-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-icon-select-container" role="textbox"
                                                                        aria-readonly="true"
                                                                        title="fi-rs-align-center"><span><i
                                                                                class="fi-rs-align-center"></i></span>&nbsp;
                                                                        fi-rs-align-center</span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper" aria-hidden="true"></span>
                                                        </span> --}}
                                                    {{-- <svg class="svg-next-icon svg-next-icon-size-16">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                                            </svg>
                                                        </svg> --}}
                                                </div>



                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="icon_image">Icon Image (It will replace
                                                    Font Icon if it is present)</label>
                                                <div class="image-box">
                                                    <input type="file" name="icon_image" style="display: none;"
                                                        class="image-data" id="icon_image_input">
                                                    <div>
                                                        <img src="" data-default="" alt="Preview image"
                                                            class="preview_image" width="150" height="150"
                                                            id="image">
                                                        <a class="btn_remove_image" title="Remove image">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    <div class="image-box-actions">
                                                        <a style="cursor: pointer;" class="btn_gallery"
                                                            id="choose_image_button">
                                                            Choose image
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="background_image">Background
                                                    Image</label>
                                                <div class="image-box">
                                                    <input type="file" name="background_image" style="display: none;"
                                                        class="image-data" id="icon_background_image_input">
                                                    <div>
                                                        <img src="" data-default="" alt="Preview image"
                                                            class="preview_image" width="450" height="250"
                                                            id="background_image">
                                                        <a class="btn_remove_background_image" title="Remove image">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    <div class="image-box-actions">
                                                        <a style="cursor: pointer;" class="btn_gallery"
                                                            id="choose_background_image_button">
                                                            Choose image
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="control-label" for="background_color">Background
                                                    color</label>
                                                <div class="input-group color-picker colorpicker-element"
                                                    data-color="#f4f6fa" data-colorpicker-id="1">
                                                    <input class="form-control is-valid" name="background_color"
                                                        type="text" value="#000" id="input_color">
                                                    <span class="input-group-text">
                                                        <input type="color" id="colorPicker">
                                                    </span>

                                                </div>

                                            </div>

                                        </div>
                                    </div>


                                </div>



                                <div class="form-group mb-3">



                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="is_main"
                                            id="is_main">
                                        <label class="form-check-label control-label" for="flexSwitchCheckDefault">Is
                                            main? (for menu section)</label>
                                    </div>



                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            name="is_featured" id="flexSwitchCheckDefault">
                                        <label class="form-check-label control-label" for="flexSwitchCheckDefault">Is
                                            featured?</label>
                                    </div>


                                </div>
                                <div class="form-group mb-3">

                                    <label for="status" class="control-label required"
                                        aria-required="true">Status</label>

                                    <div class="ui-select-wrapper form-group ">
                                        <select class="form-control ui-select is-valid" v-pre="" id="status"
                                            name="status" aria-invalid="false" aria-describedby="status-error">
                                            <option value="published">Published</option>
                                            <option value="draft">Draft</option>
                                            <option value="pending">Pending</option>
                                        </select><span id="status-error" class="invalid-feedback"
                                            style="display: inline;"></span>
                                        <svg class="svg-next-icon svg-next-icon-size-16">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                            </svg>
                                        </svg>
                                    </div>



                                </div>
                                <div class="clearfix">
                                </div>


                                <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
                                    <div class="widget-title">
                                        <h4>
                                            <span>Publish</span>
                                        </h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="btn-set">
                                            <button type="submit" name="submit" value="save" class="btn btn-info">
                                                <i class="fa fa-save"></i>
                                                Save
                                                &amp;
                                                Exit
                                            </button> &nbsp;
                                            <button type="submit" name="submit" value="apply"
                                                class="btn btn-success">
                                                <i class="fa fa-check-circle"></i>
                                                Save
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div id="waypoint">
                                </div>


                                {{-- </form> --}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('scripts')
    {{-- fetch category data --}}
    <script>
        function test(id) {
            // Send AJAX request to fetch details from the database
            $.ajax({
                url: '{{ route('admin.ecommerce.fetch.category.data', ['id' => ':id']) }}'.replace(':id', id),
                type: 'GET',
                success: function(response) {
                    // Populate form fields with fetched data
                    $('#name').val(response.name);
                    $('#description').val(response.description);
                    $('#icon').val(response.icon);
                    $('#order').val(response.order);
                    $('#status').val(response.status);
                    $('#input_color').val(response.background_color);
                    $('#colorPicker').val(response.background_color);

                    // Check the checkbox if 'is_main' is true
                    $('#is_main').prop('checked', response.is_main);

                    // Check the checkbox if 'is_featured' is true
                    $('#flexSwitchCheckDefault').prop('checked', response.is_featured);

                    // Set selected parent category
                    $('#parent_id').val(response.parent_id).change();

                    // Set selected image
                    var imageSrc = '{{ asset('uploads') }}' + '/' + response.image;
                    $('#image').attr('src', imageSrc);

                    // Set selected background image
                    var bgImageSrc = '{{ asset('uploads') }}' + '/' + response.background_image;
                    $('#background_image').attr('src', bgImageSrc);

                    // Update form action URL
                    var updateUrl = '{{ route('admin.ecommerce.update_pcategory', ['id' => ':id']) }}'.replace(
                        ':id', id);
                    $('form').attr('action', updateUrl);

                    // Show success message or any additional logic
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        }
    </script>




    {{-- color picker --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colorInput = document.querySelector('#colorPicker');
            const nameInput = document.querySelector('#input_color');

            colorInput.addEventListener('input', function() {
                const selectedColor = this.value;
                nameInput.value = selectedColor;
            });
        });
    </script>

    {{-- Image preview --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const chooseImageButton = document.getElementById('choose_image_button');
            const iconImageInput = document.getElementById('icon_image_input');
            const previewImage = document.getElementById('image');
            const removeImageButton = document.querySelector('.btn_remove_image');

            if (chooseImageButton && iconImageInput && previewImage && removeImageButton) {
                chooseImageButton.addEventListener('click', function() {
                    iconImageInput.click();
                });

                iconImageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                removeImageButton.addEventListener('click', function() {
                    iconImageInput.value = '';
                    previewImage.src = '';
                });
            }
        });
    </script>


    {{-- Background Image preview --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const chooseBackgroundImageButton = document.getElementById('choose_background_image_button');
            const iconBackgroundImageInput = document.getElementById('icon_background_image_input');
            const previewBackgroundImage = document.getElementById('background_image');
            const removeBackgroundImageButton = document.querySelector('.btn_remove_background_image');

            if (chooseBackgroundImageButton && iconBackgroundImageInput && previewBackgroundImage &&
                removeBackgroundImageButton) {
                chooseBackgroundImageButton.addEventListener('click', function() {
                    iconBackgroundImageInput.click();
                });

                iconBackgroundImageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewBackgroundImage.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                removeBackgroundImageButton.addEventListener('click', function() {
                    iconBackgroundImageInput.value = '';
                    previewBackgroundImage.src = '';
                });
            }
        });
    </script>
@endsection
