@extends('admin.layout.app')

@section('content')
    <form action="{{ route('admin.blog.tag.save_tags') }}" method="post" enctype="multipart/form-data">
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
                <li><a href="{{ route('admin.blog.tag.tags') }}" class="breadcrumb-item">Tags
                        /</a>
                </li>
                <li><a class="breadcrumb-item">Create new tag</a>
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
                            {{-- <li class="nav-item">
                                <a href="#tab_detail" class="nav-link active" data-bs-toggle="tab">Detail
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_history" class="nav-link" data-bs-toggle="tab">Revision
                                    History </a>
                            </li> --}}

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
