@extends('admin.layout.app')

@section('content')
<form action="{{ route('admin.marketplaces.datastore') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="main-panel">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <span style="color: black; margin-right: 3px;"><i class="fa fa-home"></i></span>Dashboard
            </li>
            <li class="breadcrumb-item">
                <a href="blog-posts.html" style="color: black; margin-right: 3px;">Ecommerce</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('admin.ecommerce.product_attributes') }}" style="color: black; margin-right: 3px;">Product attributes</a>
            </li>
            <li class="breadcrumb-item active">New Product attributes</li>
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
                <div class="col-md-9">
                    <div class="main-form">
                        <div class="form-body">
                            <div class="form-group mb-3">
                                <label for="name" class="control-label required">Name</label>
                                <input class="form-control" placeholder="Name" name="name" type="text" id="name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="company" class="control-label required">Company</label>
                                <input class="form-control" placeholder="Company" name="company" type="text" id="company">
                            </div>
                            <div class="row">
                                <div class="form-group col-4 mb-3">
                                    <label for="country" class="control-label required">Country</label>
                                    <select name="country" class="form-control" id="country">
                                        <option value="">Select Country</option>
                                        @foreach ($countryList as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4 mb-3">
                                    <label for="state" class="control-label required">State</label>
                                    <input class="form-control" placeholder="State" name="state" type="text" id="state">
                                </div>
                                <div class="form-group col-4 mb-3">
                                    <label for="city" class="control-label required">City</label>
                                    <input class="form-control" placeholder="City" name="city" type="text" id="city">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="address" class="control-label required">Address</label>
                                <input class="form-control" placeholder="Address" name="address" type="text" id="address">
                            </div>
                            <div class="row">
                                <div class="form-group col-4 mb-3">
                                    <label for="zip_code" class="control-label required">Zip Code</label>
                                    <input class="form-control" placeholder="Zip" name="zip_code" type="text" id="zip_code">
                                </div>
                                <div class="form-group col-4 mb-3">
                                    <label for="email" class="control-label required">Email</label>
                                    <input class="form-control" placeholder="Ex: xy@mail.com" name="email" type="text" id="email">
                                </div>
                                <div class="form-group col-4 mb-3">
                                    <label for="phone" class="control-label required">Phone</label>
                                    <input class="form-control" placeholder="Phone" name="phone" type="text" id="phone">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="control-label required">Description</label>
                                <textarea class="form-control" placeholder="Description" name="description" id="description"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="content" class="control-label">Content</label>
                                <textarea class="form-control" placeholder="Short Content" name="content" id="content"></textarea>
                                <small class="charcounter">(400 character(s) remain)</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 right-sidebar d-flex flex-column-reverse flex-md-column">
                    <div class="form-actions-wrapper">
                        <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
                            <div class="widget-title">
                                <h4><span>Publish</span></h4>
                            </div>
                            <div class="widget-body">
                                <div class="btn-set">
                                    <button type="submit" name="submit" value="save" class="btn btn-info">
                                        <i class="fa fa-save"></i> Save & Exit
                                    </button>
                                    &nbsp;
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
                                <h4><label for="status" class="control-label required">Status</label></h4>
                            </div>
                            <div class="widget-body">
                                <div class="ui-select-wrapper form-group">
                                    <select class="form-control ui-select" id="status" name="status">
                                        <option value="published">Published</option>
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
                            <h4><label for="customer_id" class="control-label required">Store owner</label></h4>
                        </div>
                        <div class="widget-body">
                            <div class="ui-select-wrapper form-group">
                                <select class="form-control ui-select" id="customer_id" name="customer_id">
                                    <option value="0">Select a store owner...</option>
                                    {{-- @foreach ($storeOwners as $owner)
                                    <option value="{{$owner->id}}">{{$owner->name}}</option>
                                    @endforeach --}}
                                </select>
                                <span id="customer_id-error" class="invalid-feedback" style="display: inline;"></span>
                                <svg class="svg-next-icon svg-next-icon-size-16">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                    </svg>
                                </svg>
                            </div>
                        </div>
                    </div>
                  <div class="form-side-meta-boxes">
                         <div class="widget meta-boxes">
                        <div class="form-side-meta-boxes">
    <div class="widget meta-boxes">
        <div class="widget-title">
            <h4><label for="logo" class="control-label">Logo</label></h4>
        </div>
        <div class="widget-body">
            <div class="image-box">
                <div class="preview-image-wrapper">
                    <img id="preview_image" src="/images/placeholder.png" alt="Preview image" class="preview_image" style="width: 100%;">
                    <a title="Remove image" id="remove_image_btn" class="btn_remove_image"><i class="fa fa-times"></i></a>
                </div>
                <div class="image-box-actions">
                    <a href="#" id="choose_image_btn" class="btn_gallery">Choose image</a>
                </div>
            </div>
            <input type="file" name="logo" class="image-data" id="logo_input" style="display:none;">
        </div>
    </div>
</div>



                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("choose_image_btn").addEventListener("click", function(e) {
        e.preventDefault();
        document.getElementById("logo_input").click();
    });

    document.getElementById('logo_input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById("remove_image_btn").addEventListener("click", function(e) {
        e.preventDefault();
        document.getElementById('preview_image').src = '/images/placeholder.png';
        document.getElementById('logo_input').value = ''; // Clear the file input value
    });
});
</script>

<style>
.preview_image {
    width: 100%;
}
</style>
@endsection
