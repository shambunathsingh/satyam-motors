@extends('admin.layout.app')
@section('content')
    <style>
        .modal-header {
            background-color: #00bcd4;
            color: white;
        }
        .modal-body {
            padding: 2rem;
        }
        .form-group img {
            width: 100px;
            height: 100px;
        }
    </style>
<form action="{{ route('admin.update_banner', ['id' => $banner->id]) }}) }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="main-panel">
            <div class="pagesbodyarea">
                <div class="pageinfo">
                    <ul class="d-flex">
                        <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="fa-solid fa-house"> </i>
                                Dashboard
                                /</a>
                        </li>
                        <li><a href="#" class="breadcrumb-item">Simple Sliders
                                /</a>
                        </li>
                        <li><a href="#" class="breadcrumb-item">New Slider</a>
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
                                        <input class="form-control is-valid" placeholder="Name" data-counter="120"
                                            v-pre="" name="name" type="text" value="{{ $banner->name }}"
                                            id="name" aria-invalid="false" aria-describedby="name-error">
                                    </div>
                                    <div class="form-group mb-3">

                                        <label for="banner" class="control-label required"
                                            aria-required="true">Image</label>
                                        <input type="file" name="banner" class="form-control"
                                            placeholder="Upload image here">
                                       <img class="mt-3" src="{{ asset('storage/' . $banner->banner) }}" alt="" style="width: 50px;height:50px;">
                                    </div>

                                    <div class="form-group mb-3">
                                        <grammarly-extension data-grammarly-shadow-root="true"
                                            style="position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                            class="dnXmp"></grammarly-extension>
                                        <grammarly-extension data-grammarly-shadow-root="true"
                                            style="position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                            class="dnXmp"></grammarly-extension>

                                        <label for="description" class="control-label">Description</label>
                                        <textarea class="form-control" rows="" placeholder="Short description" data-counter="400" v-pre=""
                                            name="description" cols="50" id="description" spellcheck="false">{{ $banner->description}}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4>
                                    <span> Slide Items</span>
                                </h4>
                            </div>
                            <div class="widget-body">
                                <div class="float-start">
                                      <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createSlideModal">
                                        Create New Slide
                                    </button>
                                    <button class="btn-success btn btn-save-sort-order" style="display: none;"><i
                                            class="fa fa-save"></i> Save sorting</button>
                                </div>
                                <div class="clearfix"></div>
                                <br>

                                <div class="table-wrapper">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover vertical-middle"
                                            id="simple-slider-items-table">
                                            <thead>
                                                <tr>
                                                    <th title="ID" width="20px">ID</th>
                                                    <th title="Image" class="text-center">Image</th>
                                                    <th title="Title" class="text-start">Title</th>
                                                    <th title="Order" class="text-start order-column">Order</th>
                                                    <th title="Created At" class="text-center">Created At</th>
                                                    <th title="Operations" class="text-center order-column">Operations</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd">
                                                    <td class="column-key-id sorting_1">{{ $banner->id }}</td>
                                                    <td class=" text-center column-key-template">
                                                        <img src="{{ asset('storage/' . $banner->banner) }}"
                                                            width="50" height="50" alt="Banner Image">
                                                    </td>
                                                    <td class=" text-start column-key-name">
                                                       {{$banner->name}}
                                                    </td>
                                                    <td>
                                                        0
                                                    </td>
                                                    <td class=" text-center column-key-created_at" style="">
                                                        {{ $banner->created_at->format('d-m-Y') }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="table-actions">

                                                            <a href="#" class="btn btn-icon btn-sm btn-primary"
                                                                data-bs-toggle="tooltip" data-bs-original-title="Edit"><i
                                                                    class="fa fa-edit"></i></a>

                                                            <a class="btn btn-icon btn-sm btn-danger bg-danger deleteDialog"
                                                                data-bs-toggle="tooltip" data-section="" role="button"
                                                                data-bs-original-title="Delete">
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
                                    <h4><label for="languages" class="control-label required"
                                            aria-required="true">Languages</label></h4>
                                </div>
                                <div class="widget-body">
                                    <img src="{{ asset('storage/posts/us.png') }}"
                                                    title="English" width="30" alt="English">
                                                    <div class="ui-select-wrapper form-group ">
                                        <select class="form-control ui-select" v-pre="" id="languages" name="languages">
                                            <option value="english" selected="selected">English</option>
                                        </select>
                                        <svg class="svg-next-icon svg-next-icon-size-16">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                            </svg>
                                        </svg>
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
                                       <select name="status" id="status" class="form-control ui-select" v-pre>
                                            <option value="published" {{ old('status', $homepage->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
                                            <option value="draft" {{ old('status', $homepage->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                                            <option value="pending" {{ old('status', $homepage->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        </select>   
                                        <svg class="svg-next-icon svg-next-icon-size-16">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                            </svg>
                                        </svg>
                                    </div>




                                </div>
                            </div>
                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="template" class="control-label required"
                                            aria-required="true">Style</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="ui-select-wrapper form-group ">
                                        <select class="form-control ui-select" v-pre="" id="template" name="template">
                                            <option value="default" selected="selected">Default</option>
                                            <option value="full-width">Full width</option>
                                            <option value="homepage">Homepage</option>
                                            <option value="right-sidebar">Page Right Sidebar</option>
                                            <option value="blog-grid">Blog Grid</option>
                                            <option value="blog-list">Blog List</option>
                                            <option value="blog-big">Blog Big</option>
                                            <option value="blog-wide">Blog Wide</option>
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
                    </div>
                </div>
            </div>
        </div>
    </form>
 

    <!-- The Modal -->
    <div class="modal fade" id="createSlideModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create a new slide</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="url" class="form-control" id="link" placeholder="http://">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" placeholder="Short description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="order">Order</label>
                            <input type="number" class="form-control" id="order" value="0">
                        </div>
                        <div class="form-group">
                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="image" class="control-label">Image</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="image-box">
                                        <input type="hidden" name="image" value="" class="image-data">
                                        <div class="preview-image-wrapper ">
                                            <img src="/images/placeholder.png" data-default="images/placeholder.png"
                                                alt="Preview image" class="preview_image" width="150">
                                            <a class="btn_remove_image" title="Remove image">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                        <div class="image-box-actions">
                                            <a href="#" class=" btn_gallery " data-result="image"
                                                data-action="select-image" data-allow-thumb="1">
                                                Choose image
                                            </a>
                                        </div>
                                    </div>





                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
