@extends('admin.layout.app')

<style>
    .toggle-container {
        display: inline-block;
        margin-right: 10px;
        /* Add some space between buttons */
    }

    .toggle-input {
        display: none;
    }

    .toggle-label {
        display: block;
        width: 60px;
        height: 30px;
        background-color: #ccc;
        border-radius: 15px;
        position: relative;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .toggle-input:checked+.toggle-label {
        background-color: #4CAF50;
    }

    .toggle-label:before {
        content: '';
        position: absolute;
        width: 25px;
        height: 25px;
        background-color: white;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        transition: transform 0.3s;
    }

    .toggle-input:checked+.toggle-label:before {
        transform: translateX(30px) translateY(-50%);
    }
</style>

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        {{-- <h3 class="m-0">Add Category</h3> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.category') }}">Categories</a></li>
                            <li class="breadcrumb-item active">Edit Categories</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Category Details</h4>
                            </div>

                            <div class="card-body p-0">
                                <form action="{{ route('admin.update_category', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="cat_name" placeholder="Name"
                                                value="{{ $category->cat_name }}">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Parent</label>
                                            <input type="text" class="form-control" name="cat_parent" placeholder="None"
                                                value="{{ $category->cat_parent }}">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Description</label><br>
                                            <textarea name="cat_desc" id="" cols="30" class="form-control">{{ $category->cat_desc }}</textarea>
                                        </div>
                                        {{-- <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Is default?</label><br>
                                            <div class="toggle-container mb-4">
                                                <input type="hidden" name="cat_default" value="0">
                                                <!-- Hidden field for false value -->
                                                <input type="checkbox" id="toggle1" class="toggle-input"
                                                    name="cat_default" value="1"> <!-- Checkbox for true value -->
                                                <label for="toggle1" class="toggle-label"></label>
                                            </div>
                                        </div> --}}
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Is default?</label><br>
                                            <div class="radio-container">
                                                <input type="radio" id="yesRadioDefault" name="cat_default" value="1"
                                                    {{ $category->cat_default == 1 ? 'checked' : '' }}>
                                                <label for="yesRadioDefault">Yes</label>

                                                <input type="radio" id="noRadioDefault" name="cat_default" value="0"
                                                    {{ $category->cat_default == 0 ? 'checked' : '' }}>
                                                <label for="noRadioDefault">No</label>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Icon</label>
                                            <input type="text" class="form-control" name="cat_icon"
                                                placeholder="{{ $category->cat_icon }}">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Order</label>
                                            <input type="text" class="form-control" name="cat_order"
                                                placeholder="{{ $category->cat_order }}">
                                        </div>
                                        {{-- <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Is featured?</label><br>
                                            <div class="toggle-container mb-4">
                                                <input type="hidden" name="cat_isfeatured" value="0">
                                                <!-- Hidden field for false value -->
                                                <input type="checkbox" id="toggle2" class="toggle-input"
                                                    name="cat_isfeatured" value="1"> <!-- Checkbox for true value -->
                                                <label for="toggle2" class="toggle-label"></label>
                                            </div>
                                        </div> --}}
                                        <div class="form-group mb-4">
                                            <label for="exampleInputEmail1">Is featured?</label><br>
                                            <div class="radio-container">
                                                <input type="radio" id="yesRadio" name="cat_isfeatured" value="1"
                                                    {{ $category->cat_isfeatured == 1 ? 'checked' : '' }}>
                                                <label for="yesRadio">Yes</label>

                                                <input type="radio" id="noRadio" name="cat_isfeatured" value="0"
                                                    {{ $category->cat_isfeatured == 0 ? 'checked' : '' }}>
                                                <label for="noRadio">No</label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="statusDropdown">Status</label>
                                            <select class="form-control" id="statusDropdown" name="cat_status">
                                                <option value="published">Published</option>
                                                <option value="draft">Draft</option>
                                                <option value="pending">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

