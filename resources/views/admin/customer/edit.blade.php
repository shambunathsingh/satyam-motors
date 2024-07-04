@extends('admin.layout.app')

<style>
    .password-fields {
        display: none;
    }
</style>
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
                    <li><a class="breadcrumb-item">Edit Customer "{{ $customer->name }}"</a>
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
                <form action="{{ route('admin.ecommerce.update_customers', ['id' => $customer->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- <input name="" type="hidden" value=""> --}}

                    <div class="row">
                        <div class="col-md-9">
                            <div class="main-form">
                                <div class="form-body">
                                    <div class="d-flex">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="name" class="text-title-field required"
                                                    aria-required="true">Name</label>
                                                <input class="form-control " name="name" type="text" id="name"
                                                    value="{{ $customer->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 mx-3">
                                                <label for="name" class="text-title-field required"
                                                    aria-required="true">Email</label>
                                                <input class="form-control " name="email" type="text" id="email"
                                                    value="{{ $customer->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="name" class="text-title-field required"
                                                    aria-required="true">Phone</label>
                                                <input class="form-control " name="phone" type="text" id="phone"
                                                    value="{{ $customer->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 mx-3">
                                                <label for="name" class="text-title-field required"
                                                    aria-required="true">Date of Birth</label>
                                                <input class="form-control " name="dob" type="date" id="dob"
                                                    value="{{ $customer->dob }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked" name="is_popular" value="1">
                                        <label class="form-check-label control-label" for="flexSwitchCheckChecked">Change
                                            Password?</label>
                                    </div>

                                    <div class="d-flex password-fields">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="password" class="text-title-field required"
                                                    aria-required="true">Password</label>
                                                <input class="form-control" name="password" type="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3 mx-3">
                                                <label for="cpassword" class="text-title-field required"
                                                    aria-required="true">Password Confirmation</label>
                                                <input class="form-control" name="cpassword" type="password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 mx-3">
                                        <label for="name" class="text-title-field required"
                                            aria-required="true">Private notes</label>
                                        <textarea name="privatenotes" id="" rows="5" class="form-control "></textarea>
                                    </div>


                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div id="main-manage-product-type">
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><span> Address</span></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="row">
                                            <table
                                                class="table table-striped table-hover vertical-middle dataTable no-footer dtr-inline"
                                                id="botble-page-tables-page-table" role="grid"
                                                aria-describedby="botble-page-tables-page-table_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th title="ID" width="20px"
                                                            class="column-key-id sorting_desc" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" style="width: 20px;" aria-sort="descending"
                                                            aria-label="IDorderby asc">#
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">Address
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">Zipcode
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">
                                                            Country
                                                        </th>
                                                        <th title="Created At" width="100px"
                                                            class="text-center column-key-created_at sorting"
                                                            tabindex="0" aria-controls="botble-page-tables-page-table"
                                                            rowspan="1" colspan="1" style="width: 100px;"
                                                            aria-label="Created Atorderby asc">
                                                            State</th>
                                                        <th title="Status" width="100px"
                                                            class="text-center column-key-status sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" style="width: 100px;"
                                                            aria-label="Statusorderby asc">
                                                            City</th>
                                                        <th title="Operations" width="134px"
                                                            class="text-center sorting_disabled" rowspan="1"
                                                            colspan="1" style="width: 134px;" aria-label="Operations">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr role="row" class="odd">
                                                        <td class="column-key-id sorting_1">{{ $customer->id }}</td>
                                                        <td class=" text-start column-key-name">
                                                            {{ $customer->address }}
                                                        </td>
                                                        <td class=" text-start column-key-template" style="">
                                                        </td>
                                                        <td class=" text-center column-key-created_at" style="">
                                                        </td>
                                                        <td class=" text-center column-key-status" style="">
                                                        </td>
                                                        <td class=" text-center language-header no-sort" style="">
                                                        </td>
                                                        <td class=" text-center">
                                                            <div class="table-actions">

                                                                <a href="" class="btn btn-icon btn-sm btn-primary"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-original-title="Edit"><i
                                                                        class="fa fa-edit"></i></a>

                                                                <a href=""
                                                                    class="btn btn-icon btn-sm btn-danger deleteDialog"
                                                                    data-bs-toggle="tooltip" data-section=""
                                                                    role="button" data-bs-original-title="Delete"
                                                                    onclick="return confirm('Are you sure you want to delete this option?');">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div id="main-manage-product-type">
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><span> Wishlist</span></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="row">
                                            <table
                                                class="table table-striped table-hover vertical-middle dataTable no-footer dtr-inline"
                                                id="botble-page-tables-page-table" role="grid"
                                                aria-describedby="botble-page-tables-page-table_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th title="ID" width="20px"
                                                            class="column-key-id sorting_desc" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" style="width: 20px;" aria-sort="descending"
                                                            aria-label="IDorderby asc">#
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">Product
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">Created at
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr role="row" class="odd">
                                                        <td class="column-key-id sorting_1"></td>
                                                        <td class=" text-start column-key-template" style="">
                                                        </td>
                                                        <td class=" text-center column-key-created_at" style="">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div id="main-manage-product-type">
                                <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><span> Payments</span></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="row">
                                            <table
                                                class="table table-striped table-hover vertical-middle dataTable no-footer dtr-inline"
                                                id="botble-page-tables-page-table" role="grid"
                                                aria-describedby="botble-page-tables-page-table_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th title="ID" width="20px"
                                                            class="column-key-id sorting_desc" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" style="width: 20px;" aria-sort="descending"
                                                            aria-label="IDorderby asc">#
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">Order
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">Charge ID
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">Amount
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">Payment Methods
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">Status
                                                        </th>
                                                        <th title="Template"
                                                            class="text-start column-key-template sorting" tabindex="0"
                                                            aria-controls="botble-page-tables-page-table" rowspan="1"
                                                            colspan="1" aria-label="Templateorderby asc"
                                                            style="">Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr role="row" class="odd">
                                                        <td class="column-key-id sorting_1"></td>
                                                        <td class=" text-start column-key-template" style="">
                                                        </td>
                                                        <td class=" text-center column-key-created_at" style="">
                                                        </td>
                                                        <td class=" text-center column-key-created_at" style="">
                                                        </td>
                                                        <td class=" text-center column-key-created_at" style="">
                                                        </td>
                                                        <td class=" text-center column-key-created_at" style="">
                                                        </td>
                                                        <td class=" text-center column-key-created_at" style="">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                {{-- <div id="top-sortables" class="meta-box-sortables">
                                    <div id="additional_product_fields" class="widget meta-boxes">
                                        <div class="widget-title">
                                            <h4><span>Addition Information</span></h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="form-group"><label for="layout"
                                                    class="control-label">Layout</label>
                                                <div class="ui-select-wrapper form-group "><select name="layout"
                                                        class="form-control ui-select">
                                                        <option value="inherit"
                                                            {{ $customer->layout == 'inherit' ? 'selected' : '' }}>Inherit
                                                        </option>
                                                        <option value="product-right-sidebar"
                                                            {{ $customer->layout == 'product-right-sidebar' ? 'selected' : '' }}>
                                                            Product
                                                            Right Sidebar</option>
                                                        <option value="product-left-sidebar"
                                                            {{ $customer->layout == 'product-left-sidebar' ? 'selected' : '' }}>
                                                            Product
                                                            Left Sidebar</option>
                                                        <option value="product-full-width"
                                                            {{ $customer->layout == 'product-full-width' ? 'selected' : '' }}>
                                                            Product Full
                                                            Width</option>
                                                    </select> <svg class="svg-next-icon svg-next-icon-size-16"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                            </path>
                                                        </svg></svg></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="flexSwitchCheckChecked" name="is_popular" value="1"
                                                        {{ $customer->is_popular == '1' ? 'checked' : '' }}>
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
                                        <div class="ui-select-wrapper form-group "><select class="form-control ui-select"
                                                id="status" name="status">
                                                <option value="activated"
                                                    {{ $customer->status == 'activated' ? 'selected' : '' }}>Activated
                                                </option>
                                                <option value="locked"
                                                    {{ $customer->status == 'locked' ? 'selected' : '' }}>Locked</option>
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
                                {{-- <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="store_id" class="control-label">Store</label>
                                        </h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group "><select class="form-control ui-select"
                                                id="store_id" name="store_id">
                                                <option value="0" {{ $customer->store_id == '0' ? 'selected' : '' }}>
                                                    Select a store...
                                                </option>
                                                <option value="1" {{ $customer->store_id == '1' ? 'selected' : '' }}>
                                                    GoPro</option>
                                                <option value="2" {{ $customer->store_id == '2' ? 'selected' : '' }}>
                                                    Global Office
                                                </option>
                                                <option value="3" {{ $customer->store_id == '3' ? 'selected' : '' }}>
                                                    Young Shop
                                                </option>
                                                <option value="4" {{ $customer->store_id == '4' ? 'selected' : '' }}>
                                                    Global Store
                                                </option>
                                                <option value="5" {{ $customer->store_id == '5' ? 'selected' : '' }}>
                                                    Robert’s Store
                                                </option>
                                                <option value="6" {{ $customer->store_id == '6' ? 'selected' : '' }}>
                                                    Stouffer</option>
                                                <option value="7" {{ $customer->store_id == '7' ? 'selected' : '' }}>
                                                    Asa</option>
                                                <option value="8" {{ $customer->store_id == '8' ? 'selected' : '' }}>
                                                    Dustin</option>
                                                <option value="9" {{ $customer->store_id == '9' ? 'selected' : '' }}>
                                                    UHzVjYoibdmFwT
                                                </option>
                                                <option value="10"
                                                    {{ $customer->store_id == '10' ? 'selected' : '' }}>
                                                    CRzpPsvt
                                                </option>
                                            </select>
                                            <svg class="svg-next-icon svg-next-icon-size-16">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z">
                                                    </path>
                                                </svg>
                                            </svg>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="is_featured" class="control-label">Is
                                                featured?</label></h4>
                                    </div>
                                    <div class="m-1 form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked" name="is_featured" value="1"
                                            {{ $customer->is_featured == '1' ? 'checked' : '' }}>
                                        <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Is Popular? </label> -->
                                    </div>
                                </div> --}}
                                {{-- <div class="widget meta-boxes">
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
                                                                            {{ $customer->categories == $cat->id ? 'checked' : '' }}>
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
                                </div> --}}
                                {{-- <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="brand_id" class="control-label">Brand</label>
                                        </h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="ui-select-wrapper form-group ">
                                            <select class="form-control ui-select" id="brand_id" name="brand_id">
                                                <option value="0" {{ $customer->brand_id == 0 ? 'selected' : '' }}> No
                                                    Brand </option>
                                                @foreach ($brands as $bitem)
                                                    <option value="{{ $bitem->id }}"
                                                        {{ $customer->brand_id == $bitem->id ? 'selected' : '' }}>
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
                                </div> --}}
                                {{-- <div class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><label for="image" class="control-label">Featured image
                                                (optional)</label></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="image-box"><input type="hidden" name="featured_image"
                                                value="blogs/drill-camera-1.jpg" class="image-data">
                                            <div class="preview-image-wrapper ">
                                                <a title="Remove image" class="btn_remove_image"><i
                                                        class="fa fa-times"></i></a>
                                            </div>
                                            <div class="image-box-actions"><a href="#" data-result="image"
                                                    data-action="select-image" data-allow-thumb="1"
                                                    class=" btn_gallery ">
                                                    Choose image
                                                </a></div>
                                        </div>
                                    </div>
                                </div> --}}
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
                                                                        {{ $customer->product_collections == $colitem->id ? 'checked' : '' }}
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
                                                                        {{ $customer->product_labels == $labitem->id ? 'checked' : '' }}
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
                                                                        {{ $customer->taxes == $tax_item->id ? 'checked' : '' }}
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

    {{-- change password script show hide --}}
    <script>
        $(document).ready(function() {
            // Initially hide the password fields by setting display to none
            $('.password-fields').css('display', 'none');

            // Toggle visibility when the checkbox state changes
            $('#flexSwitchCheckChecked').change(function() {
                if ($(this).is(':checked')) {
                    $('.password-fields').css('display', 'flex');
                } else {
                    $('.password-fields').css('display', 'none');
                }
            });
        });
    </script>



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



    <script>
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
    </script>



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
@endsection
