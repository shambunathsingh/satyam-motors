@extends('admin.layout.app')

@section('content')
    <form action="{{ route('admin.ecommerce.update_product_tags', ['id' => $tag->id]) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="main-panel">
            <div class="pagesbodyarea">
                <div class="pageinfo">
                    <ul class="d-flex">
                        <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="fa-solid fa-house"> </i>
                                Dashboard
                                /</a>
                        </li>
                        <li><a href="#" class="breadcrumb-item">Ecommerce
                                /</a>
                        </li>
                        <li><a href="#" class="breadcrumb-item">Product Tags
                                /</a>
                        </li>
                        <li><a href="#" class="breadcrumb-item">Edit Product Tag</a>
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
                            {{-- <ul class="nav nav-tabs ">
                                <li class="nav-item">
                                    <a href="#tab_detail" class="nav-link active" data-bs-toggle="tab">Detail </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab_history" class="nav-link" data-bs-toggle="tab">Revision
                                        History </a>
                                </li>

                            </ul> --}}
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_detail">
                                    <div class="form-group mb-3">

                                        <label for="name" class="control-label required"
                                            aria-required="true">Name</label>
                                        <input class="form-control is-valid" placeholder="Name" value="{{ $tag->name }}"
                                            v-pre="" name="name" type="text" id="name" aria-invalid="false"
                                            aria-describedby="name-error">
                                        {{-- <span id="name-error"
                                            class="invalid-feedback" style="display: inline;"></span><small
                                            class="charcounter">(117 character(s) remain)</small> --}}



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
                                            name="description" cols="50" spellcheck="false">{{ $tag->description }}</textarea>

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
                                            <option value="published" {{ $tag->status == 'published' ? 'selected' : '' }}>
                                                Published</option>
                                            <option value="draft" {{ $tag->status == 'draft' ? 'selected' : '' }}>Draft
                                            </option>
                                            <option value="pending" {{ $tag->status == 'pending' ? 'selected' : '' }}>Pending
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
