@extends('admin.layout.app')

@section('content')
    <form action="{{ route('admin.ecommerce.save_product_attributes') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="main-panel">

            <ol class="breadcrumb">
                <li class="breadcrumb-item "><span style="color: black; margin-right: 3px;"><i
                            class="fa fa-home"></i></span>Dashboard</li>

                <li class="breadcrumb-item"><a href="blog-posts.html" style="color: black; margin-right: 3px;">Ecommerce</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.ecommerce.product_attributes') }}"
                        style="color: black; margin-right: 3px;">Product
                        attributes


                    </a></li>
                <li class="breadcrumb-item active">New Product attributes


                </li>
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
                {{-- <form method="POST" action="" class="update-attribute-set-form dirty-check" novalidate="novalidate"> --}}
                {{-- <input name="_token" type="hidden" value=""> --}}


                <div class="row">
                    <div class="col-md-9">
                        <div class="main-form">
                            <div class="form-body">
                                <div class="form-group mb-3">

                                    <label for="title" class="control-label required" aria-required="true">Title</label>
                                    <input class="form-control" data-counter="120" v-pre="" name="title"
                                        type="text" id="title">



                                </div>

                                <div class="form-group mb-3">

                                    <label for="slug" class="control-label required" aria-required="true">Slug</label>
                                    <input class="form-control" data-counter="120" v-pre="" name="slug"
                                        type="text" id="slug">



                                </div>

                                <div class="form-group mb-3">



                                    <div class="form-check form-switch ">
                                        <input type="hidden" name="use_image_from_product_variation" value="0"
                                            class="form-check-input">
                                        <input class="form-check-input" type="checkbox"
                                            name="use_image_from_product_variation" value="1"
                                            id="flexSwitchCheckDefault">
                                        <label for="use_image_from_product_variation" class="control-label">Use image
                                            from product variation (for
                                            Visual Swatch only)</label>
                                    </div>



                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4>
                                    <span> Attributes list</span>
                                </h4>
                            </div>
                            <div class="widget-body">

                                <p class="d-inline-flex gap-1">
                                    <a class="btn btn-info" data-bs-toggle="collapse" href="#collapseExample" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Add New Attributes
                                    </a>

                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <div class="cardtablearea">
                                            <table class="table table-striped table-hover table-bordered">
                                                <thead class="table-dark fghnht">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Is default?</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Slug</th>
                                                        <th scope="col">Color</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="exampleRadios" id="exampleRadios1" value="option1">

                                                        </td>
                                                        <td>
                                                            <input type="email" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </td>

                                                        <td>
                                                            <input type="email" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </td>

                                                        <td>
                                                            <input type="color" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </td>
                                                        <td>
                                                            <input type="file" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </td>
                                                        <td>
                                                            <a href="#" class="font-red"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
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
                                <div class="widget-body">
                                    <div class="btn-set">
                                        <button type="submit" name="submit" value="save" class="btn btn-info">
                                            <i class="fa fa-save"></i> Save &amp; Exit
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
                                    <h4><label for="status" class="control-label required"
                                            aria-required="true">Status</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="ui-select-wrapper form-group ">
                                        <select class="form-control ui-select" v-pre="" id="status"
                                            name="status">
                                            <option value="published">Published</option>
                                            <option value="draft">Draft</option>
                                            <option value="pending">Pending</option>
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
                                    <h4><label for="display_layout" class="control-label required"
                                            aria-required="true">Display Layout</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="ui-select-wrapper form-group ">
                                        <select class="form-control ui-select" v-pre="" id="display_layout"
                                            name="display_layout">
                                            <option value="dropdown">Dropdown Swatch</option>
                                            <option value="visual">Visual Swatch</option>
                                            <option value="text">Text Swatch</option>
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
                                    <h4><label for="is_searchable" class="control-label">Searchable</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="hidden" name="is_searchable"
                                            value="0" id="flexSwitchCheckDefault">
                                        <input class="form-check-input" type="checkbox" name="is_searchable"
                                            value="1" id="flexSwitchCheckDefault">

                                    </div>


                                </div>
                            </div>
                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="is_comparable" class="control-label">Comparable</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="hidden" name="is_comparable"
                                            value="0" id="flexSwitchCheckDefault">
                                        <input class="form-check-input" type="checkbox" name="is_comparable"
                                            value="1" id="flexSwitchCheckDefault">
                                        <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                                    </div>




                                </div>
                            </div>
                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="is_use_in_product_listing" class="control-label">Used in product
                                            listing</label>
                                    </h4>
                                </div>
                                <div class="widget-body">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="hidden" name="is_use_in_product_listing"
                                            value="0" id="flexSwitchCheckDefault">
                                        <input class="form-check-input" type="checkbox" name="is_use_in_product_listing"
                                            value="1" id="flexSwitchCheckDefault">
                                        <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                                    </div>



                                </div>
                            </div>
                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="order" class="control-label">Order</label></h4>
                                </div>
                                <div class="widget-body">
                                    <input class="form-control" placeholder="Order by" v-pre="" name="order"
                                        type="number" value="0" id="order">




                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- </form> --}}
            </div>
        </div>
    </form>
@endsection

@section('scripts')
@endsection
