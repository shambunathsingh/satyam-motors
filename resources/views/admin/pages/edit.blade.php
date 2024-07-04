@extends('admin.layout.app')

@section('content')
    <form action="{{ route('admin.page.page_update', $page->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="main-panel">
            <div class="pagesbodyarea">
                <div class="pageinfo">
                    <ul class="d-flex">
                        <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="fa-solid fa-house"> </i>
                                Dashboard
                                /</a>
                        </li>
                        <li><a href="#" class="breadcrumb-item">Pages
                                /</a>
                        </li>
                        <li><a href="#" class="breadcrumb-item">Edit</a>
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
                            <ul class="nav nav-tabs ">
                                <li class="nav-item">
                                    <a href="#tab_detail" class="nav-link active" data-bs-toggle="tab">Detail </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab_history" class="nav-link" data-bs-toggle="tab">Revision
                                        History </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_detail">
                                    <div class="form-group mb-3">

                                        <label for="name" class="control-label required"
                                            aria-required="true">Name</label>
                                        <input class="form-control is-valid" placeholder="Name" data-counter="120"
                                            v-pre="" name="name" type="text" value="{{ $page->name }}"
                                            id="name" aria-invalid="false" aria-describedby="name-error"><span
                                            id="name-error" class="invalid-feedback" style="display: inline;"></span><small
                                            class="charcounter">(117 character(s) remain)</small>



                                    </div>

                                    <div class="form-group mb-3 ">
                                        <div id="edit-slug-box" data-field-name="name">

                                            <label class="control-label  required " for="current-slug"
                                                aria-required="true">Permalink:</label>
                                            <span id="sample-permalink" class="d-inline-block" dir="ltr">
                                                <a class="permalink" target="_blank" href="https://carzex.in/faq">
                                                    <span class="default-slug">https:.................<span
                                                            id="editable-post-name">edit</span></span>
                                                </a>
                                            </span>

                                            <span id="edit-slug-buttons">
                                                <button type="button" class="btn btn-sm btn-secondary"
                                                    id="change_slug">Edit</button>

                                            </span>

                                            <input type="hidden" id="current-slug" name="slug" value="faq">
                                            <div data-url="" data-view="" id="slug_id" data-id="0">
                                            </div>
                                            <input type="hidden" name="slug_id" value="0">
                                            <input type="hidden" name="is_slug_editable" value="1">
                                        </div>


                                    </div>
                                    <input type="hidden" name="model" value="Botble\Page\Models\Page">

                                    <div class="form-group mb-3">
                                        <grammarly-extension data-grammarly-shadow-root="true"
                                            style="position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                            class="dnXmp"></grammarly-extension>
                                        <grammarly-extension data-grammarly-shadow-root="true"
                                            style="position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                            class="dnXmp"></grammarly-extension>

                                        <label for="description" class="control-label">Description</label>
                                        <textarea class="form-control" rows="" placeholder="Short description" data-counter="400" v-pre=""
                                            name="description" cols="50" id="description" spellcheck="false">{{ $pageInfo->info }}</textarea><small class="charcounter">(400
                                            character(s) remain)</small>



                                    </div>



                                    <div class="clearfix"></div>


                                    @if ($page->name === 'Homepage')
                                        <div id="main-manage-product-type">
                                            <div class="widget meta-boxes">
                                                <div class="widget-title">
                                                    <h4><span> Video Link</span></h4>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="row price-group">
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3 "><label
                                                                    class="text-title-field">Video
                                                                    1</label>
                                                                <input id="video1" name="video1" type="text"
                                                                    value="{{ $pageInfo->video1 }}"
                                                                    placeholder="YoutubeID 1" class="next-input">
                                                                <iframe
                                                                    src="https://www.youtube.com/embed/{{ $pageInfo->video1 }}"
                                                                    frameborder="0"></iframe>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label class="text-title-field">Video 2</label>
                                                                <input id="video2" name="video2" type="text"
                                                                    value="{{ $pageInfo->video2 }}"
                                                                    placeholder="YoutubeID 2" class="next-input">
                                                                <iframe
                                                                    src="https://www.youtube.com/embed/{{ $pageInfo->video2 }}"
                                                                    frameborder="0"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="tab-pane" id="tab_history">
                                    <div class="form-group mb-3" style="min-height: 400px;">
                                        <table class="table table-bordered table-striped mrtryh" id="table">
                                            <thead>
                                                <tr>
                                                    <th>Author</th>
                                                    <th>Column</th>
                                                    <th>Origin</th>
                                                    <th>After changes</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <td colspan="5">No record</td>
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
                            <!-- <div id="waypoint"></div>
                                                                                    <div class="form-actions form-actions-fixed-top hidden">
                                                                                        <ol class="breadcrumb" v-pre="">
                                                                                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                                                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                                                                            <li class="breadcrumb-item active">Edit "Faq"</li>
                                                                                        </ol>

                                                                                        <div class="btn-set mb-1">
                                                                                            <button type="submit" name="submit" value="save" class="btn btn-info">
                                                                                                <i class="fa fa-save"></i> Save &amp; Exit
                                                                                            </button> &nbsp;
                                                                                            <button type="submit" name="submit" value="apply" class="btn btn-success">
                                                                                                <i class="fa fa-check-circle"></i> Save
                                                                                            </button>
                                                                                        </div>
                                                                                    </div> -->

                        </div>
                        <div class="form-side-meta-boxes">
                            <div id="top-sortables" class="meta-box-sortables">
                                <div id="additional_page_fields" class="widget meta-boxes">
                                    <div class="widget-title">
                                        <h4><span>Appearance</span></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="form-group">
                                            <label for="header_style" class="control-label">Header
                                                style</label>
                                            <div class="ui-select-wrapper form-group ">
                                                <select class="form-control ui-select" id="header_style"
                                                    name="header_style">
                                                    <option value="" selected="selected">Default</option>
                                                    <option value="header-style-5">Header style 5</option>
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
                                </div>

                            </div>

                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="status" class="control-label required"
                                            aria-required="true">Status</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="ui-select-wrapper form-group ">
                                        <select class="form-control ui-select" v-pre="" id="status"
                                            name="status">
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
                            <div class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><label for="template" class="control-label required"
                                            aria-required="true">Template</label></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="ui-select-wrapper form-group ">
                                        <select class="form-control ui-select" v-pre="" id="template"
                                            name="template">
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
@endsection
