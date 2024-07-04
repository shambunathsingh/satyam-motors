@extends('admin.layout.app')

@section('content')
    <form action="{{ route('admin.blog.save_posts') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="main-panel">
            <ol class="breadcrumb" v-pre="">
                <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="fa-solid fa-house"> </i>
                        Dashboard
                        /</a>
                </li>
                <li><a href="{{ route('admin.blog.posts') }}" class="breadcrumb-item">Blog
                        /</a>
                </li>
                <li><a class="breadcrumb-item">Create new post</a>
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




            <div class="row">
                <div class="col-md-9">
                    <div class="tabbable-custom">
                        <ul class="nav nav-tabs ">
                            <li class="nav-item">
                                <a href="#tab_detail" class="nav-link active" data-bs-toggle="tab">Detail
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_history" class="nav-link" data-bs-toggle="tab">Revision
                                    History </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_detail">
                                <div class="form-group mb-3">

                                    <label for="name" class="control-label required" aria-required="true">Name</label>
                                    <input class="form-control" placeholder="Name" data-counter="120" v-pre=""
                                        name="name" type="text" id="name" aria-invalid="false"
                                        aria-describedby="name-error"><span id="name-error" class="invalid-feedback"
                                        style="display: inline;"></span>
                                    {{-- <small
                                        class="charcounter">(117
                                        character(s) remain)</small> --}}



                                </div>

                                <div class="form-group mb-3 ">
                                    <div id="edit-slug-box" data-field-name="name">

                                        <label class="control-label" for="current-slug"
                                            aria-required="true">Description:</label>
                                        <textarea class="form-control" rows="4" placeholder="Short description" data-counter="400" v-pre=""
                                            name="description" cols="50" id="description" spellcheck="false"></textarea>
                                        <small class="charcounter">(400
                                            character(s) remain)</small>
                                    </div>


                                </div>

                                <div class="form-group mb-3 ">
                                    <div id="edit-slug-box" data-field-name="name">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="hidden" name="is_featured" value="0"
                                                id="flexSwitchCheckDefault">
                                            <input class="form-check-input" type="checkbox" name="is_featured"
                                                value="1" id="flexSwitchCheckDefault">

                                            <label for="is_featured" class="control-label">Is featured?</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mb-3">

                                    <label for="description" class="control-label">Content</label>
                                    <textarea class="form-control" rows="4" placeholder="Short description" data-counter="400" v-pre=""
                                        name="content" cols="50" id="content" spellcheck="false"></textarea>
                                    {{-- <small class="charcounter">(400
                                        character(s) remain)</small> --}}



                                </div>



                                <div class="clearfix"></div>
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
                        <div id="waypoint"></div>


                    </div>


                    <div class="form-side-meta-boxes">
                        <div id="top-sortables" class="meta-box-sortables">
                            <div id="additional_post_fields" class="widget meta-boxes">
                                <div class="widget-title">
                                    <h4><span>Addition Information</span></h4>
                                </div>
                                <div class="widget-body">
                                    <div class="form-group">
                                        <label for="time_to_read" class="control-label">Time to read
                                            (minute)</label>
                                        <input class="form-control" id="time_to_read" name="time_to_read"
                                            type="number">
                                    </div>

                                    <div class="form-group">
                                        <label for="layout" class="control-label">Layout</label>
                                        <div class="ui-select-wrapper form-group ">
                                            <select class="form-control ui-select" id="layout" name="layout">
                                                <option value="inherit" selected="selected">Inherit</option>
                                                <option value="blog-post-right-sidebar">Post Right Sidebar
                                                </option>
                                                <option value="blog-post-left-sidebar">Post Left Sidebar
                                                </option>
                                                <option value="blog-post-full-width">Post Full Width
                                                </option>
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
                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4><label for="categories" class="control-label required"
                                        aria-required="true">Categories</label></h4>
                            </div>
                            <div class="widget-body">
                                <div class="form-group form-group-no-margin ">
                                    <div class="multi-choices-widget list-item-checkbox mCustomScrollbar _mCS_1"
                                        style="padding: 0px;">
                                        <div id="mCSB_1" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside"
                                            style="max-height: none;" tabindex="0">
                                            <div id="mCSB_1_container"
                                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                                style="position:relative; top:0; left:0;" dir="ltr">
                                                <ul>
                                                    @foreach ($categorys as $item)
                                                        <li value="{{ $item->id }}">
                                                            <label class="mb-2">
                                                                <input type="checkbox" value="{{ $item->id }}"
                                                                    name="categories">
                                                                {{ $item->name }}
                                                            </label>

                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div id="mCSB_1_scrollbar_vertical"
                                                class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical"
                                                style="display: none;">
                                                <div class="mCSB_draggerContainer">
                                                    <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                                        style="position: absolute; min-height: 30px; height: 0px; top: 0px;">
                                                        <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
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
                                <h4><label for="image" class="control-label">Image</label></h4>
                            </div>
                            <div class="widget-body">
                                <div class="image-box">
                                    <input type="file" name="image" style="display: none;" class="image-data"
                                        id="icon_image_input">
                                    <div class="preview-image-wrapper ">
                                        <img src="/images/placeholder.png" data-default="/images/placeholder.png"
                                            alt="Preview image" class="preview_image" width="150">
                                        <a class="btn_remove_image" title="Remove image">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                    <div class="image-box-actions">
                                        <a style="cursor: pointer;" type="file" class="btn_gallery "
                                            data-result="image" data-action="select-image" data-allow-thumb="1"
                                            id="choose_image_button">
                                            Choose image
                                        </a>
                                    </div>
                                </div>




                            </div>
                        </div>
                        <div class="widget meta-boxes">
                            <div class="widget-title">
                                <h4><label for="tag" class="control-label">Tags</label></h4>
                            </div>
                            <div class="widget-body">
                                <tags class="tagify tags tagify--noTags tagify--empty" tabindex="-1">
                                    <span contenteditable="" tabindex="0" data-placeholder="Write some tags"
                                        aria-placeholder="Write some tags" class="tagify__input" role="textbox"
                                        aria-autocomplete="both" aria-multiline="false"></span> &ZeroWidthSpace;
                                </tags>
                                <input class="tags" placeholder="Write some tags" data-url="" v-pre=""
                                    name="tag" type="text" value="" id="tag" tabindex="-1">



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
    </script>

    {{-- Image upload trigger --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("choose_image_button").addEventListener("click", function() {

                document.getElementById("icon_image_input").click();

            });
        });
    </script>
@endsection
