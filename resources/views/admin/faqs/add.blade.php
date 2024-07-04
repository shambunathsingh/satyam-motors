@extends('admin.layout.app')

@section('content')
    <form action="{{ route('admin.faq.save_faqs') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="main-panel">
            <div class="pagesbodyarea">
                <div class="pageinfo">
                    <ul class="d-flex">
                        <li><a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="fa-solid fa-house"> </i>
                                Dashboard
                                /</a>
                        </li>
                        <li><a href="{{ route('admin.faq.faqs') }}" class="breadcrumb-item">FAQ
                                /</a>
                        </li>
                        <li><a class="breadcrumb-item">Create New faq</a>
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

                                        <label for="category" class="control-label required"
                                            aria-required="true">Category</label>

                                        <div class="ui-select-wrapper form-group ">
                                            <select name="category" class="form-control" id="category">
                                                <option value="0">Select a category</option>
                                                @foreach ($faqcats as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <svg class="svg-next-icon svg-next-icon-size-16">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M10 16l-4-4h8l-4 4zm0-12L6 8h8l-4-4z"></path>
                                                </svg>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 ">
                                        <div id="edit-slug-box" data-field-name="name">

                                            <label class="control-label  required " for="question"
                                                aria-required="true">Question:</label>
                                            <input type="text" name="question" class="form-control">
                                        </div>


                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="answer" class="control-label">Answer</label>
                                        <textarea class="form-control" rows="" name="answer" cols="50" id="answer"></textarea>

                                    </div>



                                    <div class="clearfix"></div>
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
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#answer'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
