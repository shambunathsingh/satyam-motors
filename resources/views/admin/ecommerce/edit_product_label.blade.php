@extends('admin.layout.app')

@section('content')
    <form action="{{ route('admin.ecommerce.update_product_label', ['id' => $plabel->id]) }}" method="post"
        enctype="multipart/form-data">
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
                        <li><a href="{{ route('admin.ecommerce.product_label') }}" class="breadcrumb-item">Product Label
                                /</a>
                        </li>
                        <li><a class="breadcrumb-item">Edit Product Label</a>
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
                                            aria-describedby="name-error" value="{{ $plabel->name }}">
                                    </div>

                                    <div class="form-group mb-3">

                                        <label for="name" class="control-label" aria-required="true">Color</label>

                                        <div class="input-group color-picker" data-color="#000">
                                            <input class="form-control" placeholder="Example: #f0f0f0" v-pre name="color"
                                                type="text" value="{{ $plabel->color }}" id="input_color">
                                            <span class="input-group-text">
                                                <input type="color" id="colorPicker" value="{{ $plabel->color }}">
                                            </span>
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
                                            <option value="published"
                                                {{ $plabel->status == 'published' ? 'selected' : '' }}>
                                                Published</option>
                                            <option value="draft" {{ $plabel->status == 'draft' ? 'selected' : '' }}>
                                                Draft
                                            </option>
                                            <option value="pending" {{ $plabel->status == 'pending' ? 'selected' : '' }}>
                                                Pending
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
        document.addEventListener('DOMContentLoaded', function() {
            const colorInput = document.querySelector('#colorPicker');
            const nameInput = document.querySelector('#input_color');

            colorInput.addEventListener('input', function() {
                const selectedColor = this.value;
                nameInput.value = selectedColor;
            });
        });
    </script>
@endsection
