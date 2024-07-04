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
                    <li><a href="{{ route('admin.ecommerce.product') }}" class="breadcrumb-item">Ecommerce
                            /</a>
                    </li>
                    <li><a class="breadcrumb-item">Edit Product</a>
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
                                        <input class="form-control " placeholder="Name" data-counter="150" name="name"
                                            type="text" id="name" aria-invalid="false" value="{{ $product->name }}"
                                            aria-describedby="name-error">
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="description">Description</label><br>
                                        <textarea name="description" id="description" cols="30" rows="50" class="form-control">{{ $product->description }}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="content">Content</label><br>
                                        <textarea name="content" id="content" cols="30" rows="50" class="form-control">{{ $product->content }}</textarea>
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="images[]" class="control-label">Images</label>
                                        <div class="gallery-images-wrapper list-images">
                                            <div class="images-wrapper">
                                                <div data-name="images[]"
                                                    class="text-center cursor-pointer js-btn-trigger-add-image default-placeholder-gallery-image hidden ">
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

                                    {{-- <input class="form-control" name="product_type" type="hidden" value="physical"> --}}
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div id="main-manage-product-type">
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><span> Overview</span></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="row price-group"><input type="hidden" value="0" name="sale_type"
                                                class="detect-schedule hidden">
                                            <div class="col-md-4">
                                                <div class="form-group mb-3 "><label class="text-title-field">SKU</label>
                                                    <input id="sku" name="sku" type="text"
                                                        class="next-input" value="{{ $product->sku }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-3"><label class="text-title-field">Price</label>
                                                    <div class="next-input--stylized"><span
                                                            class="next-input-add-on next-input__add-on--before">₹</span>
                                                        <input name="price" data-thousands-separator=","
                                                            data-decimal-separator="." step="any" value="0"
                                                            value="{{ $product->price }}" type="text"
                                                            class="next-input input-mask-number regular-price next-input--invisible"
                                                            im-insert="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label class="text-title-field">
                                                        <span>Price sale</span>
                                                        <a href="javascript:;" class="turn-on-schedule" id="period"
                                                            onclick="showPeriod();">Choose Discount Period</a>
                                                        <a href="javascript:;" class="turn-on-schedule" id="cancel"
                                                            onclick="hidePeriod();" style="display: none;">Cancel</a>
                                                    </label>
                                                    <div class="next-input--stylized"><span
                                                            class="next-input-add-on next-input__add-on--before">₹</span>
                                                        <input name="sale_price" data-thousands-separator=","
                                                            data-decimal-separator="." type="text"
                                                            value="{{ $product->sale_price }}"
                                                            class="next-input input-mask-number sale-price next-input--invisible"
                                                            im-insert="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3"><label class="text-title-field">Cost per
                                                            item</label>
                                                        <div class="next-input--stylized"><span
                                                                class="next-input-add-on next-input__add-on--before">₹</span>
                                                            <input name="cost_per_item" step="any" value="0"
                                                                type="text" placeholder="Enter cost per item"
                                                                value="{{ $product->cost_per_item }}"
                                                                class="next-input input-mask-number regular-price next-input--invisible"
                                                                im-insert="true">
                                                        </div>
                                                        <div class="help-ts"><i class="fa fa-info-circle"></i>
                                                            <span>Customers won't see this price.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3"><label class="text-title-field">Barcode
                                                            (ISBN, UPC,
                                                            GTIN, etc.) </label>
                                                        <div class="next-input--stylized">
                                                            <input name="barcode" step="any"
                                                                value="{{ $product->barcode }}" type="text"
                                                                placeholder="Enter barcode"
                                                                class="next-input next-input--invisible">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 scheduled-time" id="fromdate">
                                                <div class="form-group mb-3">
                                                    <label class="text-title-field">From date</label>
                                                    <input name="start_date" value="{{ $product->start_date }}"
                                                        type="date" class="next-input form-date-time">
                                                </div>
                                            </div>
                                            <div class="col-md-6 scheduled-time" id="todate" style="display: none;">
                                                <div class="form-group mb-3">
                                                    <label class="text-title-field">To date</label>
                                                    <input name="end_date" value="{{ $product->end_date }}"
                                                        type="date" class="next-input form-date-time">
                                                </div>
                                            </div>
                                        </div>



                                        <hr>
                                        <div class="form-group mb-3">
                                            <div class="storehouse-management">
                                                <div class="mt5">
                                                    {{-- <input type="hidden"
                                                        name="with_storehouse_management" value="0"> --}}
                                                    <label>
                                                        <input type="checkbox"
                                                            value="{{ $product->with_storehouse_management }}"
                                                            name="with_storehouse_management"
                                                            class="storehouse-management-status">
                                                        With
                                                        storehouse management
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="storehouse-info  hidden ">
                                            <div class="form-group mb-3"><label class="text-title-field">Quantity</label>
                                                <input type="text" value="{{ $product->quantity }}" name="quantity"
                                                    class="next-input input-mask-number input-medium" im-insert="true">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="text-title-field">
                                                    <input type="checkbox" name="allow_checkout_when_out_of_stock"
                                                        value="{{ $product->allow_checkout_when_out_of_stock }}">
                                                    &nbsp;Allow customer checkout when this product out
                                                    of stock
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group stock-status-wrapper ">
                                            <label class="text-title-field">Stock status</label>
                                            <div class="ui-select-wrapper form-group ">
                                                <select name="stock_status" class=" ui-select">
                                                    <option value="in_stock"
                                                        {{ $product->status == 'in_stock' ? 'selected' : '' }}>
                                                        In
                                                        stock</option>
                                                    <option value="out_of_stock"
                                                        {{ $product->status == 'out_of_stock' ? 'selected' : '' }}>Out of
                                                        stock
                                                    </option>
                                                    <option value="on_backorder"
                                                        {{ $product->status == 'on_backorder' ? 'selected' : '' }}>
                                                        On backorder
                                                    </option>
                                                </select>
                                                <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                        </path>
                                                    </svg></svg>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="shipping-management "><label class="text-title-field">Shipping</label>
                                            <div class="row">
                                                <div class="col-md-3 col-md-6">
                                                    <div class="form-group mb-3"><label>Weight
                                                            (g)</label>
                                                        <div class="next-input--stylized"><span
                                                                class="next-input-add-on next-input__add-on--before">g</span>
                                                            <input type="text" name="weight"
                                                                value="{{ $product->weight }}"
                                                                class="next-input input-mask-number next-input--invisible"
                                                                im-insert="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div class="form-group mb-3"><label>Length
                                                            (cm)</label>
                                                        <div class="next-input--stylized"><span
                                                                class="next-input-add-on next-input__add-on--before">cm</span>
                                                            <input type="text" name="length"
                                                                value="{{ $product->length }}"
                                                                class="next-input input-mask-number next-input--invisible"
                                                                im-insert="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div class="form-group mb-3"><label>Wide
                                                            (cm)</label>
                                                        <div class="next-input--stylized"><span
                                                                class="next-input-add-on next-input__add-on--before">cm</span>
                                                            <input type="text" name="wide"
                                                                value="{{ $product->wide }}"
                                                                class="next-input input-mask-number next-input--invisible"
                                                                im-insert="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div class="form-group mb-3"><label>Height
                                                            (cm)</label>
                                                        <div class="next-input--stylized"><span
                                                                class="next-input-add-on next-input__add-on--before">cm</span>
                                                            <input type="text" name="height"
                                                                value="{{ $product->height }}"
                                                                class="next-input input-mask-number next-input--invisible"
                                                                im-insert="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><span> Attributes</span></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="add-new-product-attribute-wrap">
                                            <input type="hidden" name="is_added_attributes" id="is_added_attributes"
                                                value="0">
                                            <a style="cursor: pointer;" class="btn-trigger-add-attribute"
                                                onclick="addRow()">
                                                Add new attributes
                                            </a>
                                            <p>Adding new attributes helps the product to have many options, such as size or
                                                color.</p>
                                            <div class="list-product-attribute-values-wrap hidden">
                                                <div class="product-select-attribute-item-template"></div>
                                            </div>
                                        </div>
                                        <div id="attributes_container_show">
                                            @if ($product->attr_name && $product->attr_value)
                                                @foreach (array_map(null, explode(',', $product->attr_name), explode(',', $product->attr_value)) as [$attrname, $attrvalue])
                                                    <div
                                                        class="add-new-product-attribute-wrap d-flex bg-default mt-3 attribute-row">
                                                        <div class="col-md-5">
                                                            <p>Attribute name</p>
                                                            <select name="attr_name[]" id="attr_name[]"
                                                                class="form-control ui-select attr-name">
                                                                <option value="weight"
                                                                    {{ $attrname == 'weight' ? 'selected' : '' }}>Weight
                                                                </option>
                                                                <option value="boxes"
                                                                    {{ $attrname == 'boxes' ? 'selected' : '' }}>Boxes
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <p>Value</p>
                                                            <div class="attr-value-container">
                                                                <select name="attr_value[]" id="attr_value_kg[]"
                                                                    class="form-control ui-select attr-value attr_value_kg"
                                                                    style="display: {{ $attrname == 'weight' ? 'block' : 'none' }}">
                                                                    <option value="1 kg"
                                                                        {{ $attrvalue == '1 kg' ? 'selected' : '' }}>1 KG
                                                                    </option>
                                                                    <option value="2 kg"
                                                                        {{ $attrvalue == '2 kg' ? 'selected' : '' }}>2 KG
                                                                    </option>
                                                                    <option value="3 kg"
                                                                        {{ $attrvalue == '3 kg' ? 'selected' : '' }}>3 KG
                                                                    </option>
                                                                    <option value="4 kg"
                                                                        {{ $attrvalue == '4 kg' ? 'selected' : '' }}>4 KG
                                                                    </option>
                                                                    <option value="5 kg"
                                                                        {{ $attrvalue == '5 kg' ? 'selected' : '' }}>5 KG
                                                                    </option>
                                                                </select>
                                                                <select name="attr_value[]" id="attr_value_boxes[]"
                                                                    class="form-control ui-select attr-value attr_value_boxes"
                                                                    style="display: {{ $attrname == 'boxes' ? 'block' : 'none' }}">
                                                                    <option value="1 Box"
                                                                        {{ $attrvalue == '1 Box' ? 'selected' : '' }}>1 Box
                                                                    </option>
                                                                    <option value="2 Boxes"
                                                                        {{ $attrvalue == '2 Boxes' ? 'selected' : '' }}>2
                                                                        Boxes</option>
                                                                    <option value="3 Boxes"
                                                                        {{ $attrvalue == '3 Boxes' ? 'selected' : '' }}>3
                                                                        Boxes</option>
                                                                    <option value="4 Boxes"
                                                                        {{ $attrvalue == '4 Boxes' ? 'selected' : '' }}>4
                                                                        Boxes</option>
                                                                    <option value="5 Boxes"
                                                                        {{ $attrvalue == '5 Boxes' ? 'selected' : '' }}>5
                                                                        Boxes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="btn btn-danger delete-row"
                                                                style="background: darkred"><i class="fas fa-bin"></i>
                                                                Delete</button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <script>
                                            $(document).ready(function() {
                                                // Show and hide attribute value select based on attribute name select
                                                $(document).on('change', '.attr-name', function() {
                                                    var $attrValueKg = $(this).closest('.attribute-row').find('.attr_value_kg');
                                                    var $attrValueBoxes = $(this).closest('.attribute-row').find('.attr_value_boxes');
                                                    if ($(this).val() == 'weight') {
                                                        $attrValueKg.show();
                                                        $attrValueBoxes.hide();
                                                    } else if ($(this).val() == 'boxes') {
                                                        $attrValueKg.hide();
                                                        $attrValueBoxes.show();
                                                    }
                                                }).trigger('change'); // Trigger change event to set initial state

                                                // Delete row
                                                $(document).on('click', '.delete-row', function() {
                                                    $(this).closest('.attribute-row').remove();
                                                });
                                            });
                                        </script>
                                        {{-- <div id="attributes_container"></div> --}}
                                    </div>
                                </div>
                            </div>


                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><span>Product options</span></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="product-option-form-wrap">
                                        <div class="product-option-form-group">
                                            <div class="product-option-form-body mt-3 mb-3">
                                                <input type="hidden" name="has_product_options" value="1">
                                                <div id="accordion-product-option" class="accordion">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <button type="button" id="add-new-option"
                                                        class="btn btn-info add-new-option">Add new option</button>
                                                </div>
                                                <div class="col-12 col-md-6 d-flex justify-content-end">
                                                    <div class="ui-select-wrapper d-inline-block" style="width: 200px;">
                                                        <select id="global-option" class="form-control ui-select is-valid"
                                                            name="global_option" aria-invalid="false">
                                                            <option value="-1"
                                                                {{ $product->global_option == '-1' ? 'selected' : '' }}>
                                                                Select Global Option</option>
                                                            <option value="1"
                                                                {{ $product->global_option == '1' ? 'selected' : '' }}>
                                                                Warranty</option>
                                                            <option value="2"
                                                                {{ $product->global_option == '2' ? 'selected' : '' }}>RAM
                                                            </option>
                                                            <option value="3"
                                                                {{ $product->global_option == '3' ? 'selected' : '' }}>CPU
                                                            </option>
                                                            <option value="4"
                                                                {{ $product->global_option == '4' ? 'selected' : '' }}>HDD
                                                            </option>
                                                        </select>
                                                        <svg class="svg-next-icon svg-next-icon-size-16">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                                            </svg>
                                                        </svg>
                                                    </div>
                                                    <button type="button" role="button"
                                                        class="btn btn-info add-from-global-option ms-3">Add Global
                                                        Option</button>
                                                </div>
                                            </div>
                                            <div id="new-option-container-show" class="mt-3">
                                                @if ($product->option_name && $product->option_value)
                                                    @foreach (array_map(null, explode(',', $product->option_name), explode(',', $product->option_value)) as [$optionname, $optionvalue])
                                                        <div class="row mt-3">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Option Name" name="option_name[]"
                                                                    value="{{ $optionname }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Option Value" name="option_value[]"
                                                                    value="{{ $optionvalue }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            {{-- <div id="new-option-container" class="mt-3"></div> --}}
                                            <!-- Container for new options -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div data-target="" class="wrap-relation-product" style="position: relative; zoom: 1;">
                                <div id="product-extras" class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><span>Related products</span></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="form-group mb-3">
                                            <label class="control-label">Related products</label>
                                            {{-- <input type="hidden" name="related_products" value="  "> --}}
                                            <div class="box-search-advance product">
                                                <div>
                                                    <input type="text" class="next-input textbox-advancesearch"
                                                        placeholder="Search products" name="related_products"
                                                        value="{{ $product->related_products }}">
                                                </div>
                                                <div class="panel panel-default hidden">

                                                </div>
                                            </div>
                                            <div class="list-selected-products  hidden ">
                                                <div class="mt20"><label class="text-title-field">Selected
                                                        products:</label></div>
                                                <div class="table-wrapper p-none mt10 mb20 ps-relative">
                                                    <table class="table-normal">
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Cross-selling products</label>
                                            {{-- <input type="hidden" name="cross_sale_products" value="  "> --}}
                                            <div class="box-search-advance product">
                                                <div>
                                                    <input type="text" class="next-input textbox-advancesearch"
                                                        name="cross_sale_products" placeholder="Search products"
                                                        value="{{ $product->cross_sale_products }}">
                                                </div>
                                                <div class="panel panel-default hidden">

                                                </div>
                                            </div>
                                            <div class="list-selected-products  hidden ">
                                                <div class="mt20"><label class="text-title-field">Selected
                                                        products:</label></div>
                                                <div class="table-wrapper p-none mt10 mb20 ps-relative">
                                                    <table class="table-normal">
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="advanced-sortables" class="meta-box-sortables">
                                <div id="faq_schema_config_wrapper" class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><span>Product FAQs</span></h4>
                                    </div>
                                    <div class="widget-body">
                                        <a style="cursor:pointer;" class="add-faq-schema-items" id="add_faq_item">Add
                                            item</a>
                                        <div class="faq-schema-items" id="faq_section_show">
                                            @if ($product->faq_question && $product->faq_answer)
                                                @foreach (array_map(null, explode(',', $product->faq_question), explode(',', $product->faq_answer)) as [$faqquestion, $faqanswer])
                                                    <div class="repeater-group">
                                                        <div class="form-group mb-3">
                                                            <div>
                                                                <div class="repeater-item-group form-group mb-3">
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label required"
                                                                            aria-required="true"
                                                                            for="faq_question">Question</label>
                                                                        <textarea class="form-control" data-counter="1000" rows="1" name="faq_question[]" id="faq_question"
                                                                            cols="50">{{ $faqquestion }}</textarea>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label class="control-label required"
                                                                            aria-required="true"
                                                                            for="faq_answer">Answer</label>
                                                                        <textarea class="form-control" data-counter="1000" rows="1" name="faq_answer[]" id="faq_answer"
                                                                            cols="50">{{ $faqanswer }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span type="button" class="remove-item-button"
                                                                id="remove_faq">
                                                                <i class="fa fa-times"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        {{-- <div class="faq-schema-items" id="faq_section">
                                            <!-- FAQ items will be added here dynamically -->
                                        </div> --}}
                                        <button type="button" class="btn btn-info" id="add_faq">
                                            Add new
                                        </button>
                                    </div>
                                </div>
                                <div id="seo_wrap" class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><span>Search Engine Optimize</span></h4>
                                    </div>
                                    <div class="widget-body"><a href="#" class="btn-trigger-show-seo-detail">Edit
                                            SEO meta</a>
                                        {{-- <div class="seo-preview">
                                                        <p class="default-seo-description hidden">Lorem ipsum dolor sit amet
                                                            consectetur adipisicing elit. Facilis, consequatur!
                                                            &amp; degle</p>
                                                        <div class="existed-seo-meta"><span class="page-title-seo">Lorem ipsum dolor
                                                                sit amet, consectetur adipisicing elit. Porro nisi corrupti
                                                                laborum.</span>
                                                            <div class="page-url-seo ws-nm">
                                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt?
                                                                </p>
                                                            </div>
                                                            <div class="ws-nm"><span style="color: #70757a;">Feb 01,
                                                                    2024 - </span> <span class="page-description-seo"></span></div>
                                                        </div>
                                                    </div> --}}
                                        <div class="seo-edit-section hidden">
                                            <hr>
                                            <div class="form-group mb-3">
                                                <label for="seo_title" class="control-label">SEO Title</label>
                                                <input class="form-control" id="seo_title" placeholder="SEO Title"
                                                    data-counter="120" name="seo_title" type="text"
                                                    value="{{ $product->seo_title }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="seo_description" class="control-label">SEO description</label>
                                                <textarea class="form-control" rows="3" id="seo_description" placeholder="SEO description" data-counter="160"
                                                    name="seo_description" cols="50">{{ $product->seo_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
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
                                <div id="top-sortables" class="meta-box-sortables">
                                    <div id="additional_product_fields" class="widget meta-boxes">
                                        <div class="widget-title">
                                            <h4><span>Addition Information</span></h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="form-group"><label for="layout"
                                                    class="control-label">Layout</label>
                                                <div class="ui-select-wrapper form-group ">
                                                    <select name="layout" class="form-control ui-select">
                                                        <option value="inherit"
                                                            {{ $product->layout == 'inherit' ? 'selected' : '' }}>Inherit
                                                        </option>
                                                        <option value="product-right-sidebar"
                                                            {{ $product->layout == 'product-right-sidebar' ? 'selected' : '' }}>
                                                            Product
                                                            Right Sidebar</option>
                                                        <option value="product-left-sidebar"
                                                            {{ $product->layout == 'product-left-sidebar' ? 'selected' : '' }}>
                                                            Product
                                                            Left Sidebar</option>
                                                        <option value="product-full-width"
                                                            {{ $product->layout == 'product-full-width' ? 'selected' : '' }}>
                                                            Product Full
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
                                                        id="flexSwitchCheckChecked" name="is_popular" value="1"
                                                        {{ $product->is_popular == '1' ? 'checked' : '' }}>
                                                    <label class="form-check-label control-label"
                                                        for="flexSwitchCheckChecked">Is Popular? </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <h4><label for="store_id" class="control-label">Store</label>
                                        </h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group ">
                                            <select class="form-control ui-select" id="store_id" name="store_id">
                                                <option value="0" {{ $product->store_id == '0' ? 'selected' : '' }}>
                                                    Select a store...
                                                </option>
                                                <option value="1" {{ $product->store_id == '1' ? 'selected' : '' }}>
                                                    GoPro</option>
                                                <option value="2" {{ $product->store_id == '2' ? 'selected' : '' }}>
                                                    Global Office
                                                </option>
                                                <option value="3" {{ $product->store_id == '3' ? 'selected' : '' }}>
                                                    Young Shop
                                                </option>
                                                <option value="4" {{ $product->store_id == '4' ? 'selected' : '' }}>
                                                    Global Store
                                                </option>
                                                <option value="5" {{ $product->store_id == '5' ? 'selected' : '' }}>
                                                    Robert’s Store
                                                </option>
                                                <option value="6" {{ $product->store_id == '6' ? 'selected' : '' }}>
                                                    Stouffer</option>
                                                <option value="7" {{ $product->store_id == '7' ? 'selected' : '' }}>
                                                    Asa</option>
                                                <option value="8" {{ $product->store_id == '8' ? 'selected' : '' }}>
                                                    Dustin</option>
                                                <option value="9" {{ $product->store_id == '9' ? 'selected' : '' }}>
                                                    UHzVjYoibdmFwT
                                                </option>
                                                <option value="10" {{ $product->store_id == '10' ? 'selected' : '' }}>
                                                    CRzpPsvt
                                                </option>
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
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked" name="is_featured" value="1"
                                            {{ $product->is_featured == '1' ? 'checked' : '' }}>
                                        <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Is Popular? </label> -->
                                    </div>
                                </div>
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="categories[]" class="control-label">Categories</label></h4>
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
                                        <h4><label for="brand_id" class="control-label">Brand</label>
                                        </h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group ">
                                            <select class="form-control ui-select" id="brand_id" name="brand_id">
                                                <option value="0" {{ $product->brand_id == 0 ? 'selected' : '' }}> No
                                                    Brand </option>
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
                                <div class="widget meta-boxes">
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
                                                                        {{ $product->product_collections == $colitem->id ? 'checked' : '' }}
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
                                </div>
                                <div class="widget meta-boxes">
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
                                                                        {{ $product->product_labels == $labitem->id ? 'checked' : '' }}
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
                                </div>
                                <div class="widget meta-boxes">
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
                                                                        {{ $product->taxes == $tax_item->id ? 'checked' : '' }}
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
            // Trigger file input click on "Add image" link click
            $('.js-btn-trigger-add-image').on('click', function() {
                $(this).siblings('input[type="file"]').trigger('click');
            });

            // Handle file input change event
            $('input[type="file"]').on('change', function(event) {
                let input = event.target;
                let files = input.files;
                let $ul = $(this).siblings('ul');

                // Loop through selected files
                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    let reader = new FileReader();

                    // Closure to capture the file information
                    reader.onload = (function(theFile) {
                        return function(e) {
                            // Create a new list item and append to the ul
                            let $li = $('<li></li>');
                            let $img = $('<img>').attr('src', e.target.result).css({
                                'width': '150px',
                                'height': '100px'
                            });
                            let $deleteBtn = $(
                                '<button class="js-delete-image btn btn-danger" type="button" style="background:darkred;"><i class="fa fa-trash"></button>'
                            );
                            $li.append($img).append($deleteBtn);
                            $ul.append($li);
                        };
                    })(file);

                    // Read in the image file as a data URL
                    reader.readAsDataURL(file);
                }
            });

            // Handle delete button click event
            $(document).on('click', '.js-delete-image', function() {
                $(this).closest('li').remove();
            });

        });
    </script>


    {{-- <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const addImageButton = document.querySelector('.js-btn-trigger-add-image');
            
                        addImageButton.addEventListener('click', function() {
                            const input = this.previousElementSibling;
                            input.click();
                        });
            
                        document.querySelector('input[name="images[]"]').addEventListener('change', function() {
                            const previewWrapper = document.querySelector('.preview-image-wrapper');
                            const files = this.files;
            
                            for (let i = 0; i < files.length; i++) {
                                const file = files[i];
                                if (!file.type.startsWith('image/')) {
                                    continue;
                                }
            
                                const reader = new FileReader();
            
                                reader.onload = function(e) {
                                    const img = document.createElement('img');
                                    img.src = e.target.result;
                                    img.alt = 'Preview Image';
                                    img.classList.add('preview_image');
                                    previewWrapper.appendChild(img);
                                };
            
                                reader.readAsDataURL(file);
                            }
                        });
                    });
                </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.js-btn-trigger-add-image').forEach(function(element) {
                element.addEventListener('click', function() {
                    var input = this.parentElement.querySelector('input[type="file"]');
                    if (input) {
                        input.click();
                    }
                });
            });
        });
    </script>


    <script>
        let optionCounter = 0;

        $(document).ready(function() {
            $('#add-new-option').on('click', function() {
                optionCounter++;

                var newRow = `
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Option Name" name="option_name[${optionCounter}]">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Option Value" name="option_value[${optionCounter}]">
                                    </div>
                                </div>
                            `;
                $('#new-option-container').append(newRow);
            });
        });
    </script>

    {{-- Overview discount period --}}
    <script>
        function showPeriod() {
            document.getElementById('period').style.display = 'none';
            document.getElementById('cancel').style.display = 'block';
            document.getElementById('fromdate').style.display = 'block';
            document.getElementById('todate').style.display = 'block';
        }

        function hidePeriod() {
            document.getElementById('period').style.display = 'block';
            document.getElementById('cancel').style.display = 'none';
            document.getElementById('fromdate').style.display = 'none';
            document.getElementById('todate').style.display = 'none';
        }
    </script>


    {{-- Add attributes --}}
    <script>
        let attributeCounter = 0;

        function addRow() {
            attributeCounter++;
            const row = `
                            <div class="add-new-product-attribute-wrap d-flex bg-default mt-3 attribute-row">
                                <div class="col-md-5">
                                    <p>Attribute name</p>
                                    <select name="attr_name[${attributeCounter}]" id="attr_name_${attributeCounter}" class="form-control ui-select attr-name">
                                        <option value="weight">Weight</option>
                                        <option value="boxes">Boxes</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <p>Value</p>
                                    <div class="attr-value-container">
                                        <select name="attr_value[${attributeCounter}]" id="attr_value_kg_${attributeCounter}" class="form-control ui-select attr-value attr_value_kg">
                                            <option value="1 kg">1 KG</option>
                                            <option value="2 kg">2 KG</option>
                                            <option value="3 kg">3 KG</option>
                                            <option value="4 kg">4 KG</option>
                                            <option value="5 kg">5 KG</option>
                                        </select>
                                        <select name="attr_value[${attributeCounter}]" id="attr_value_boxes_${attributeCounter}" class="form-control ui-select attr-value attr_value_boxes" style="display:none;">
                                            <option value="1 Box">1 Box</option>
                                            <option value="2 Boxes">2 Boxes</option>
                                            <option value="3 Boxes">3 Boxes</option>
                                            <option value="4 Boxes">4 Boxes</option>
                                            <option value="5 Boxes">5 Boxes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger delete-row" style="background: darkred"><i class="fas fa-bin"></i> Delete</button>
                                </div>
                            </div>`;
            $('#attributes_container').append(row);
        }

        $(document).ready(function() {
            $('#add_row').click(function() {
                addRow();
            });

            $(document).on('change', '.attr-name', function() {
                const attrName = $(this).val();
                const container = $(this).closest('.attribute-row').find('.attr-value-container');

                if (attrName === 'weight') {
                    container.find('.attr_value_kg').show();
                    container.find('.attr_value_boxes').hide();
                } else if (attrName === 'boxes') {
                    container.find('.attr_value_kg').hide();
                    container.find('.attr_value_boxes').show();
                }
            });

            $(document).on('click', '.delete-row', function() {
                $(this).closest('.attribute-row').remove();
            });
        });
    </script>



    {{-- FAQ items script --}}
    <script>
        let faqCounter = 0;

        function getFaqItem(counter) {
            return `
                            <div class="repeater-group">
                                <div class="form-group mb-3">
                                    <div>
                                        <div class="repeater-item-group form-group mb-3">
                                            <div class="form-group mb-3">
                                                <label class="control-label required" aria-required="true" for="faq_question_${counter}">Question</label>
                                                <textarea class="form-control" data-counter="1000" rows="1" name="faq_question[${counter}]" id="faq_question_${counter}" cols="50"></textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label required" aria-required="true" for="faq_answer_${counter}">Answer</label>
                                                <textarea class="form-control" data-counter="1000" rows="1" name="faq_answer[${counter}]" id="faq_answer_${counter}" cols="50"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <span type="button" class="remove-item-button" id="remove_faq">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                            </div>`;
        }

        function addFaqSection() {
            faqCounter++;
            $('#faq_section').append(getFaqItem(faqCounter));
        }

        $(document).ready(function() {
            $('#add_faq, #add_faq_item').click(function() {
                addFaqSection();
            });

            $(document).on('click', '#remove_faq', function() {
                $(this).closest('.repeater-group').remove();
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
