@extends('admin.layout.app')

@section('content')
<form action="{{ route('admin.ecommerce.save_flash_sales') }} " method="Post" enctype="multipart/form-data">
    @csrf
    <div class="main-panel">
        <style>
            .suggestion-item-container {
                display: flex;
                align-items: center;
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }
        
            .suggestion-item {
                display: flex;
                align-items: center;
                text-decoration: none;
                color: inherit;
                width: 100%;
            }
        
            .suggestion-item-image {
                width: 50px;
                height: 50px;
                margin-right: 10px;
            }
        
            .suggestion-item-details {
                display: flex;
                flex-direction: column;
            }
        
            .suggestion-item-name {
                font-weight: bold;
            }
        
            .suggestion-item-description {
                color: #555;
            }
        
            .suggestion-item-price {
                color: #007bff;
            }
        </style>
        
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
                    <li><a href="{{ route('admin.ecommerce.flash_sales') }}" class="breadcrumb-item">Flash Sales
                            /</a>
                    </li>
                    <li><a class="breadcrumb-item">New Flash Sales</a>
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
                <div class="col-md-9">
                    <div class="tabbable-custom">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_detail">
                                <div class="form-group mb-3">

                                    <label for="name" class="control-label required" aria-required="true">Name</label>
                                    <input class="form-control" placeholder="Name" data-counter="120" v-pre=""
                                        name="name" type="text" id="name" aria-invalid="false"
                                        aria-describedby="name-error">
                                </div>
                               <div class="form-group mb-3">
                                    <label for="subtitle" class="control-label">Subtitle</label>
                                    <input class="form-control" placeholder="Text to highlight" v-pre="" name="subtitle" type="text" value=""
                                        id="subtitle" spellcheck="false" data-ms-editor="true" autocomplete="off">
                                </div>
                              
                            </div>
                            
                        </div>
                        </div>
                        <div class="widget meta-boxes">
                        <div class="widget-title">
                            <h4>Products</h4>
                        </div>
                    <div class="widget-body">
                        <div class="form-group mb-3">
                            <div class="box-search-advance product">
                                <input type="text" name="query" class="next-input textbox-advancesearch" id="product-search" placeholder="Search products" autocomplete="off" value="{{ request('query') }}">
                                <ul id="suggestions" class="list-group" style="position: absolute; z-index: 1000;"></ul>
                            </div>
                        </div>
                        <div id="flash-sale-form" style="display: none;">
                            <input type="hidden" name="product_id" id="product_id">
                            <div class="form-group mb-3">
                                <label for="product_price" class="control-label required" aria-required="true">Product Price</label>
                                <input type="number" name="price" class="next-input" id="product_price" placeholder="Enter Price">
                            </div>
                            <div class="form-group mb-3">
                                <label for="product_quantity" class="control-label required" aria-required="true">Product Quantity</label>
                                <input type="number" name="quantity" class="next-input" id="product_quantity" placeholder="Enter Quantity">
                            </div>
                        </div>
                    </div>
                </div>
                                       
                </div>
                <div class="col-md-3 right-sidebar d-flex flex-column-reverse flex-md-column">
                    <div class="form-actions-wrapper">
                        <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
                            <div class="widget-title">
                                <h4>
                                    <span>Publish</span>
                                </h4>
                            </div>
                            <div id="flash-sale-form" class="widget-body">
                                <div class="btn-set">
                                    <button type="submit" name="submit" value="save" class="btn btn-info">
                                        <i class="fa fa-save"></i> Save &amp; Exit
                                    </button> &nbsp;
                                    <button type="submit" name="submit" value="apply" class="btn btn-success">
                                        <i class="fa fa-check-circle"></i> Save
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-side-meta-boxes">
                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4><label for="status" class="control-label required"
                                        aria-required="true">Status</label></h4>
                            </div>
                            <div class="widget-body">
                                <div class="ui-select-wrapper form-group ">
                                    <select class="form-control ui-select" v-pre="" id="status" name="status">
                                        <option value="published" selected="selected">Published</option>
                                        <option value="draft">Draft</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                    <svg class="svg-next-icon svg-next-icon-size-16">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                        </svg>
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="widget meta-boxes">
                        <div class="widget-title">
                            <h4>
                                <label for="end_date" class="control-label required" aria-required="true">End date</label>
                            </h4>
                        </div>
                        <div class="widget-body">
                            <div class="input-group datepicker">
                                <input class="form-control flatpickr-input" data-date-format="Y-m-d" placeholder="Y-m-d"
                                    name="end_date" type="date" id="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="form-side-meta-boxes">
                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4><label for="image" class="control-label">Logo</label></h4>
                            </div>
                            <div class="widget-body">
                                <div class="image-box">
                                    {{-- <input type="hidden" name="logo" class="image-data"> --}}
                                    <div class="preview-image-wrapper">
                                        <img src="/images/placeholder.png" data-default="/images/placeholder.png"
                                            alt="Preview image" width="150" class="preview_image">
                                        <a title="Remove image" class="btn_remove_image"><i class="fa fa-times"></i></a>
                                    </div>
                                    <div class="image-box-actions">
                                        <a href="#" id="choose_image_btn" data-result="image" data-action="select-image"
                                            data-allow-thumb="1" class="btn_gallery">
                                            Choose image
                                        </a>
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
@endsection
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@section('scripts')
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // When "Choose image" is clicked, trigger the file input click event
        document.getElementById("choose_image_btn").addEventListener("click", function(e) {
            e.preventDefault(); // Prevent the default action of the link
            document.getElementById("logo_input").click(); // Simulate a click on the file input
        });
    });

  $(document).ready(function() {
    const today = new Date().toISOString().split('T')[0];
    $('#end_date').val(today);

    function fetchSuggestions(query) {
        $.ajax({
            url: "{{ route('admin.ecommerce.search_flash_sales_products') }}",
            type: "GET",
            data: {'query': query},
            success: function(data) {
                let suggestions = $('#suggestions');
                suggestions.empty();
                data.forEach(product => {
                    suggestions.append(`
                        <div class="list-group-item suggestion-item-container">
                            <a href="#" class="suggestion-item" data-id="${product.id}">
                                <img src="${product.images}" alt="${product.name}" class="suggestion-item-image">
                                <div class="suggestion-item-details">
                                    <span class="suggestion-item-name">${product.name}</span>
                                    <span class="suggestion-item-description">${product.description}</span>
                                    <span class="suggestion-item-price">${product.sale_price}</span>
                                </div>
                            </a>
                        </div>
                    `);
                });
            }
        });
    }

    $('#product-search').on('keyup', function() {
        let query = $(this).val();
        fetchSuggestions(query);
    });

    $('#product-search').on('focus', function() {
        fetchSuggestions(''); // Fetch all products when the input is focused
    });

    $(document).on('click', '.suggestion-item', function(e) {
        e.preventDefault();
        let productId = $(this).data('id');
        
        // Fetch product details
        $.ajax({
            url: '/admin/ecommerce/product/' + productId,
            type: 'GET',
            success: function(product) {
                $('#product_id').val(product.id);
                $('#product_price').val(product.sale_price);
                $('#product_quantity').val(product.quantity);
                $('#product-search').val(product.name);
                $('#suggestions').empty();
                $('#flash-sale-form').show();
            }
        });
    });

    $('#flash-sale-form').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: "{{ route('admin.ecommerce.save_flash_sales') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if(response.success) {
                    alert('Product added to flash sale successfully!');
                    $('#flash-sale-form')[0].reset();
                    $('#flash-sale-form').hide();
                }
            }
        });
    });
});

</script>
@endsection