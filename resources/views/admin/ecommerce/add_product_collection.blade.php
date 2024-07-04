@extends('admin.layout.app')

@section('content')
    <form action="{{ route('admin.ecommerce.store_product_collection') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="main-panel">
            <div class="pagesbodyarea">
                <div class="pageinfo">
                    <ul class="d-flex">
                        <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="fa-solid fa-house"> </i>
                                Dashboard
                                /</a>
                        </li>
                        <li><a class="breadcrumb-item">Ecommerce
                                /</a>
                        </li>
                        <li><a href="{{ route('admin.ecommerce.product_collection') }}" class="breadcrumb-item">Product
                                Collection
                                /</a>
                        </li>
                        <li><a class="breadcrumb-item">New Product Collection</a>
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

                                        <label for="name" class="control-label required"
                                            aria-required="true">Name</label>
                                        <input class="form-control" placeholder="Name" data-counter="120" v-pre=""
                                            name="name" type="text" id="name" aria-invalid="false"
                                            aria-describedby="name-error">

                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name" class="control-label required"
                                            aria-required="true">Slug</label>
                                        <input type="text" class="form-control" name="slug">
                                        <small class="charcounter">
                                            (120 character(s) remain)
                                        </small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <grammarly-extension data-grammarly-shadow-root="true"
                                            style="position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                            class="dnXmp"></grammarly-extension>
                                        <grammarly-extension data-grammarly-shadow-root="true"
                                            style="position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                            class="dnXmp"></grammarly-extension>

                                        <label for="description" class="control-label">Description</label>
                                        <textarea class="form-control" rows="10" placeholder="Short description" data-counter="400" v-pre=""
                                            name="description" cols="50" spellcheck="false"></textarea>
                                        {{-- <small class="charcounter">
                                            (400 character(s) remain)
                                        </small> --}}
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

                        <div class="form-side-meta-boxes">
                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="is_featured" class="control-label">Is
                                            featured?</label></h4>
                                </div>
                                <div class="m-1 form-check form-switch">
                                    <input type="hidden" name="featured" value="0">
                                    <input type="checkbox" class="form-check-input" name="featured" value="1">
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
                                            <a title="Remove image" class="btn_remove_image"><i
                                                    class="fa fa-times"></i></a>
                                        </div>
                                        <div class="image-box-actions">
                                            <a href="#" id="choose_image_btn" data-result="image"
                                                data-action="select-image" data-allow-thumb="1" class="btn_gallery">
                                                Choose image
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Hidden file input -->
                                    <input type="file" name="image" class="image-data" id="logo_input"
                                        style="display:none;">
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
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // When "Choose image" is clicked, trigger the file input click event
            document.getElementById("choose_image_btn").addEventListener("click", function(e) {
                e.preventDefault(); // Prevent the default action of the link
                document.getElementById("logo_input").click(); // Simulate a click on the file input
            });
        });
    </script>
@endsection
